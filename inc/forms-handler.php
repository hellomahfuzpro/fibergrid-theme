<?php
/**
 * FiberGrid — Native Form Submissions & Email Dispatcher
 *
 * Zero-plugin database storage, spam protection, and notification system.
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * 1. Ensure Submissions Database Table Exists
 */
function fg_create_submissions_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'fibergrid_submissions';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id bigint(20) NOT NULL AUTO_INCREMENT,
        form_type varchar(50) NOT NULL DEFAULT 'contact',
        name varchar(150) NOT NULL DEFAULT '',
        email varchar(150) NOT NULL DEFAULT '',
        company varchar(150) DEFAULT '',
        phone varchar(50) DEFAULT '',
        service varchar(100) DEFAULT '',
        requirement text DEFAULT '',
        message text DEFAULT '',
        ip_address varchar(45) DEFAULT '',
        status varchar(20) NOT NULL DEFAULT 'new',
        created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
        PRIMARY KEY  (id),
        KEY form_type (form_type),
        KEY status (status)
    ) $charset_collate;";

    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta( $sql );
}
add_action( 'after_switch_theme', 'fg_create_submissions_table' );

// Safety fallback check if table exists
function fg_maybe_create_table() {
    if ( is_admin() && get_option( 'fg_db_version' ) !== '1.0' ) {
        fg_create_submissions_table();
        update_option( 'fg_db_version', '1.0' );
    }
}
add_action( 'admin_init', 'fg_maybe_create_table' );

/**
 * 2. AJAX Endpoint for Secure Form Submissions
 */
function fg_handle_ajax_submission() {
    // 1. Anti-spam honeypot verification
    if ( ! empty( $_POST['fg_company_website_hp'] ) ) {
        // Silently exit for spambots
        wp_send_json_success( array( 'message' => __( 'Inquiry received.', 'fibergrid' ) ) );
    }

    // 2. Nonce verification
    check_ajax_referer( 'fg_form_nonce', 'security' );

    global $wpdb;
    $table_name = $wpdb->prefix . 'fibergrid_submissions';

    $form_type   = isset( $_POST['form_type'] ) ? sanitize_key( $_POST['form_type'] ) : 'contact';
    $name        = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
    $email       = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
    $company     = isset( $_POST['company'] ) ? sanitize_text_field( wp_unslash( $_POST['company'] ) ) : '';
    $phone       = isset( $_POST['phone'] ) ? sanitize_text_field( wp_unslash( $_POST['phone'] ) ) : '';
    $service     = isset( $_POST['service'] ) ? sanitize_text_field( wp_unslash( $_POST['service'] ) ) : '';
    $requirement = isset( $_POST['requirement'] ) ? sanitize_textarea_field( wp_unslash( $_POST['requirement'] ) ) : '';
    $message     = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';
    $ip_address  = sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ?? '' ) );

    if ( empty( $email ) || ! is_email( $email ) ) {
        wp_send_json_error( array( 'message' => __( 'Please provide a valid work email address.', 'fibergrid' ) ) );
    }

    // Insert record
    $inserted = $wpdb->insert(
        $table_name,
        array(
            'form_type'   => $form_type,
            'name'        => $name,
            'email'       => $email,
            'company'     => $company,
            'phone'       => $phone,
            'service'     => $service,
            'requirement' => $requirement,
            'message'     => $message,
            'ip_address'  => $ip_address,
            'status'      => 'new',
            'created_at'  => current_time( 'mysql' ),
        ),
        array( '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s' )
    );

    if ( ! $inserted ) {
        wp_send_json_error( array( 'message' => __( 'Unable to record submission. Please try again.', 'fibergrid' ) ) );
    }

    $submission_id = $wpdb->insert_id;

    // 3. Dispatch Staff Email Notifications
    $recipients_raw = get_theme_mod( 'fg_recipient_email', 'noc@fibergrid.co.za' );
    $recipients     = array_map( 'trim', explode( ',', $recipients_raw ) );
    $sender_name    = get_theme_mod( 'fg_sender_name', 'FiberGrid NOC' );
    $sender_email   = get_theme_mod( 'fg_sender_email', 'noc@fibergrid.co.za' );

    $subject = sprintf( '[FiberGrid Inquiry #%d] New %s from %s', $submission_id, strtoupper( str_replace( '_', ' ', $form_type ) ), ( $name ? $name : $email ) );

    $body  = "A new enterprise inquiry has been submitted via FiberGrid Portal:\n\n";
    $body .= "Reference ID: #" . $submission_id . "\n";
    $body .= "Form Category: " . esc_html( $form_type ) . "\n";
    $body .= "Submitter Name: " . esc_html( $name ) . "\n";
    $body .= "Work Email: " . esc_html( $email ) . "\n";
    $body .= "Company: " . esc_html( $company ) . "\n";
    $body .= "Phone: " . esc_html( $phone ) . "\n";
    if ( $service ) {
        $body .= "Requested Service: " . esc_html( $service ) . "\n";
    }
    if ( $requirement ) {
        $body .= "Technical Specs/Requirement: " . esc_html( $requirement ) . "\n";
    }
    if ( $message ) {
        $body .= "Message Narrative:\n" . esc_html( $message ) . "\n\n";
    }
    $body .= "---\n";
    $body .= "IP Address: " . esc_html( $ip_address ) . "\n";
    $body .= "Dashboard View: " . esc_url( admin_url( 'admin.php?page=fibergrid-forms' ) ) . "\n";

    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'From: ' . $sender_name . ' <' . $sender_email . '>',
        'Reply-To: ' . ( $name ? $name : 'Client' ) . ' <' . $email . '>',
    );

    foreach ( $recipients as $recipient ) {
        if ( is_email( $recipient ) ) {
            wp_mail( $recipient, $subject, $body, $headers );
        }
    }

    // 4. Client Auto-Responder
    if ( get_theme_mod( 'fg_auto_respond', true ) ) {
        $client_subject = 'Inquiry Received: FiberGrid Telecommunications [#REF-' . $submission_id . ']';
        $client_body  = "Dear " . ( $name ? esc_html( $name ) : 'Valued Customer' ) . ",\n\n";
        $client_body .= "Thank you for contacting FiberGrid. Your enterprise inquiry has been routed directly to our engineering and capacity provisioning team.\n\n";
        $client_body .= "Inquiry Reference: #REF-" . $submission_id . "\n";
        $client_body .= "Estimated Response Window: Under 2 hours during active NOC business operations.\n\n";
        $client_body .= "24/7/365 Emergency NOC Hotline: +27 (0) 11 000 0000\n";
        $client_body .= "Network Status & Looking Glass: https://status.fibergrid.co.za\n\n";
        $client_body .= "Warm regards,\nFiberGrid Operations Team";

        $client_headers = array(
            'Content-Type: text/plain; charset=UTF-8',
            'From: ' . $sender_name . ' <' . $sender_email . '>',
        );
        wp_mail( $email, $client_subject, $client_body, $client_headers );
    }

    // 5. External Webhook Dispatch (Optional)
    $webhook_url = get_theme_mod( 'fg_webhook_url', '' );
    if ( ! empty( $webhook_url ) ) {
        wp_remote_post( $webhook_url, array(
            'headers' => array( 'Content-Type' => 'application/json' ),
            'body'    => wp_json_encode( array(
                'ref_id'      => $submission_id,
                'form_type'   => $form_type,
                'name'        => $name,
                'email'       => $email,
                'company'     => $company,
                'service'     => $service,
                'message'     => $message,
                'created_at'  => current_time( 'mysql' ),
            ) ),
            'timeout' => 5,
        ) );
    }

    wp_send_json_success( array(
        'message' => __( 'Thank you! Your inquiry has been routed to our NOC team. A confirmation reference has been emailed to you.', 'fibergrid' ),
        'ref_id'  => $submission_id,
    ) );
}
add_action( 'wp_ajax_fg_submit_form', 'fg_handle_ajax_submission' );
add_action( 'wp_ajax_nopriv_fg_submit_form', 'fg_handle_ajax_submission' );
