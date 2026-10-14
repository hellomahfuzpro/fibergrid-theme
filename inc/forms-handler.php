<?php
/**
 * Forms Submissions Handler
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Create submissions database table if not exists
 */
function fg_create_submissions_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'fibergrid_submissions';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id bigint(20) NOT NULL AUTO_INCREMENT,
        form_type varchar(50) NOT NULL,
        name varchar(255) NOT NULL DEFAULT '',
        email varchar(255) NOT NULL DEFAULT '',
        phone varchar(100) NOT NULL DEFAULT '',
        company varchar(255) NOT NULL DEFAULT '',
        department varchar(100) NOT NULL DEFAULT '',
        requirement varchar(255) NOT NULL DEFAULT '',
        message text NOT NULL,
        data longtext NOT NULL,
        created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta( $sql );
}
add_action( 'after_setup_theme', 'fg_create_submissions_table' );

/**
 * Handle AJAX contact inquiry
 */
function fg_handle_inquiry_submission() {
    check_ajax_referer( 'fg_form_nonce', 'nonce', false );

    global $wpdb;
    $table_name = $wpdb->prefix . 'fibergrid_submissions';

    $name        = sanitize_text_field( $_POST['name'] ?? '' );
    $email       = sanitize_email( $_POST['email'] ?? '' );
    $phone       = sanitize_text_field( $_POST['phone'] ?? '' );
    $company     = sanitize_text_field( $_POST['company'] ?? '' );
    $department  = sanitize_text_field( $_POST['department'] ?? 'General NOC' );
    $requirement = sanitize_text_field( $_POST['requirement'] ?? 'IP Transit' );
    $message     = sanitize_textarea_field( $_POST['message'] ?? '' );

    if ( empty( $email ) ) {
        wp_send_json_error( array( 'message' => 'Please provide a valid business email address.' ) );
    }

    $ip_address  = sanitize_text_field( $_SERVER['REMOTE_ADDR'] ?? '' );

    $inserted = $wpdb->insert(
        $table_name,
        array(
            'form_type'   => 'contact',
            'name'        => $name,
            'email'       => $email,
            'phone'       => $phone,
            'company'     => $company,
            'service'     => $department,
            'requirement' => $requirement,
            'message'     => $message,
            'ip_address'  => $ip_address,
            'status'      => 'new',
            'created_at'  => current_time( 'mysql' ),
        ),
        array( '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s' )
    );

    if ( false === $inserted ) {
        wp_send_json_error( array( 'message' => 'Database error: ' . $wpdb->last_error ) );
    }

    $lead_id = $wpdb->insert_id;

    // Dispatch email notification according to Theme Form Settings
    fg_dispatch_submission_email( $lead_id, array(
        'form_type'   => 'contact',
        'name'        => $name,
        'email'       => $email,
        'phone'       => $phone,
        'company'     => $company,
        'service'     => $department,
        'requirement' => $requirement,
        'message'     => $message,
        'ip_address'  => $ip_address,
    ) );

    wp_send_json_success( array(
        'message' => 'Inquiry received. NOC ticket dispatched. Target SLA: < 15 min.',
    ) );
}
add_action( 'wp_ajax_fg_submit_inquiry', 'fg_handle_inquiry_submission' );
add_action( 'wp_ajax_nopriv_fg_submit_inquiry', 'fg_handle_inquiry_submission' );

/**
 * Handle Facility Tour Submission
 */
function fg_handle_facility_tour_submission() {
    check_ajax_referer( 'fg_form_nonce', 'nonce', false );

    global $wpdb;
    $table_name = $wpdb->prefix . 'fibergrid_submissions';

    $name        = sanitize_text_field( $_POST['name'] ?? '' );
    $email       = sanitize_email( $_POST['email'] ?? '' );
    $company     = sanitize_text_field( $_POST['company'] ?? '' );
    $location    = sanitize_text_field( $_POST['location'] ?? '' );
    $footprint   = sanitize_text_field( $_POST['footprint'] ?? '' );
    $date        = sanitize_text_field( $_POST['date'] ?? '' );
    $message     = sanitize_textarea_field( $_POST['message'] ?? '' );
    $ip_address  = sanitize_text_field( $_SERVER['REMOTE_ADDR'] ?? '' );

    if ( empty( $email ) ) {
        wp_send_json_error( array( 'message' => 'Please provide a valid corporate email.' ) );
    }

    $inserted = $wpdb->insert(
        $table_name,
        array(
            'form_type'   => 'tour',
            'name'        => $name,
            'email'       => $email,
            'phone'       => '',
            'company'     => $company,
            'service'     => $location,
            'requirement' => $footprint,
            'message'     => "Date: $date | Notes: $message",
            'ip_address'  => $ip_address,
            'status'      => 'new',
            'created_at'  => current_time( 'mysql' ),
        ),
        array( '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s' )
    );

    if ( false !== $inserted ) {
        $lead_id = $wpdb->insert_id;
        fg_dispatch_submission_email( $lead_id, array(
            'form_type'   => 'tour',
            'name'        => $name,
            'email'       => $email,
            'phone'       => '',
            'company'     => $company,
            'service'     => $location,
            'requirement' => $footprint,
            'message'     => "Date: $date | Notes: $message",
            'ip_address'  => $ip_address,
        ) );
    }

    wp_send_json_success( array(
        'message' => 'Facility audit request received. Security clearance protocol initiated.',
    ) );
}
add_action( 'wp_ajax_fg_submit_facility_tour', 'fg_handle_facility_tour_submission' );
add_action( 'wp_ajax_nopriv_fg_submit_facility_tour', 'fg_handle_facility_tour_submission' );

/**
 * Dispatch Email Notifications for Submissions
 */
function fg_dispatch_submission_email( $lead_id, $data ) {
    $email_enabled = get_option( 'fg_form_email_enabled', '1' );
    if ( '1' !== $email_enabled ) {
        return;
    }

    $raw_recipients = get_option( 'fg_form_recipient_email', get_option( 'admin_email' ) );
    $recipients     = array_filter( array_map( 'trim', explode( ',', $raw_recipients ) ) );
    if ( empty( $recipients ) ) {
        $recipients = array( get_option( 'admin_email' ) );
    }

    $sender_name  = get_option( 'fg_form_sender_name', 'FiberGrid Inquiries' );
    $sender_email = get_option( 'fg_form_sender_email', get_option( 'admin_email' ) );
    $subject_tpl  = get_option( 'fg_form_email_subject', '[FiberGrid Lead] New {form_type} Inquiry from {company}' );

    $replacements = array(
        '{id}'          => $lead_id,
        '{form_type}'   => strtoupper( $data['form_type'] ?? 'GENERAL' ),
        '{name}'        => $data['name'] ?? 'N/A',
        '{company}'     => ! empty( $data['company'] ) ? $data['company'] : 'Enterprise Client',
        '{email}'       => $data['email'] ?? 'N/A',
        '{phone}'       => $data['phone'] ?? 'N/A',
        '{service}'     => $data['service'] ?? 'N/A',
        '{requirement}' => $data['requirement'] ?? 'N/A',
        '{message}'     => $data['message'] ?? 'N/A',
    );

    $subject = str_replace( array_keys( $replacements ), array_values( $replacements ), $subject_tpl );

    // Build HTML email body
    $body  = '<!DOCTYPE html><html><body style="font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, sans-serif; line-height: 1.6; color: #0b1c30; background-color: #f8fafc; padding: 24px;">';
    $body .= '<div style="max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 12px; overflow: hidden; border: 1px solid #e2e8f0; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);">';
    $body .= '<div style="background: #0066ff; padding: 20px 24px; color: #ffffff;">';
    $body .= '<h2 style="margin: 0; font-size: 18px; font-weight: 700; letter-spacing: -0.02em;">⚡ FiberGrid Inquiry Notification</h2>';
    $body .= '<p style="margin: 4px 0 0 0; font-size: 13px; opacity: 0.9;">Lead #' . intval( $lead_id ) . ' • Type: ' . esc_html( strtoupper( $data['form_type'] ?? 'CONTACT' ) ) . '</p>';
    $body .= '</div>';
    $body .= '<div style="padding: 24px;">';
    $body .= '<table style="width: 100%; border-collapse: collapse; font-size: 14px;">';
    $body .= '<tr><td style="padding: 8px 0; border-bottom: 1px solid #f1f5f9; color: #64748b; width: 140px;"><strong>Full Name:</strong></td><td style="padding: 8px 0; border-bottom: 1px solid #f1f5f9; color: #0b1c30; font-weight: 600;">' . esc_html( $data['name'] ?? '' ) . '</td></tr>';
    $body .= '<tr><td style="padding: 8px 0; border-bottom: 1px solid #f1f5f9; color: #64748b;"><strong>Corporate Email:</strong></td><td style="padding: 8px 0; border-bottom: 1px solid #f1f5f9;"><a href="mailto:' . esc_attr( $data['email'] ?? '' ) . '" style="color: #0066ff; text-decoration: none; font-weight: 600;">' . esc_html( $data['email'] ?? '' ) . '</a></td></tr>';
    if ( ! empty( $data['phone'] ) ) {
        $body .= '<tr><td style="padding: 8px 0; border-bottom: 1px solid #f1f5f9; color: #64748b;"><strong>Phone / NOC:</strong></td><td style="padding: 8px 0; border-bottom: 1px solid #f1f5f9; color: #0b1c30;">' . esc_html( $data['phone'] ) . '</td></tr>';
    }
    $body .= '<tr><td style="padding: 8px 0; border-bottom: 1px solid #f1f5f9; color: #64748b;"><strong>Company / ASN:</strong></td><td style="padding: 8px 0; border-bottom: 1px solid #f1f5f9; color: #0b1c30;">' . esc_html( $data['company'] ?? 'N/A' ) . '</td></tr>';
    $body .= '<tr><td style="padding: 8px 0; border-bottom: 1px solid #f1f5f9; color: #64748b;"><strong>Service / Dept:</strong></td><td style="padding: 8px 0; border-bottom: 1px solid #f1f5f9; color: #0b1c30;">' . esc_html( $data['service'] ?? 'N/A' ) . '</td></tr>';
    $body .= '<tr><td style="padding: 8px 0; border-bottom: 1px solid #f1f5f9; color: #64748b;"><strong>Requirement:</strong></td><td style="padding: 8px 0; border-bottom: 1px solid #f1f5f9; color: #0b1c30; font-weight: 600;">' . esc_html( $data['requirement'] ?? 'N/A' ) . '</td></tr>';
    $body .= '<tr><td style="padding: 8px 0; border-bottom: 1px solid #f1f5f9; color: #64748b;"><strong>Timestamp:</strong></td><td style="padding: 8px 0; border-bottom: 1px solid #f1f5f9; color: #64748b; font-size: 13px;">' . current_time( 'mysql' ) . '</td></tr>';
    $body .= '<tr><td style="padding: 8px 0; border-bottom: 1px solid #f1f5f9; color: #64748b;"><strong>Remote IP:</strong></td><td style="padding: 8px 0; border-bottom: 1px solid #f1f5f9; color: #64748b; font-size: 13px;">' . esc_html( $data['ip_address'] ?? '' ) . '</td></tr>';
    $body .= '</table>';
    $body .= '<div style="margin-top: 20px; padding: 16px; background: #f8fafc; border-radius: 8px; border: 1px solid #e2e8f0;">';
    $body .= '<div style="font-size: 12px; font-weight: 700; color: #64748b; text-transform: uppercase; margin-bottom: 6px;">Message / Specifications:</div>';
    $body .= '<div style="white-space: pre-wrap; font-size: 13px; color: #1e293b;">' . esc_html( $data['message'] ?? 'No additional notes provided.' ) . '</div>';
    $body .= '</div>';
    $body .= '<div style="margin-top: 24px; text-align: center;">';
    $body .= '<a href="' . esc_url( admin_url( 'admin.php?page=fibergrid-leads' ) ) . '" style="display: inline-block; padding: 10px 20px; background: #0066ff; color: #ffffff; text-decoration: none; border-radius: 6px; font-size: 13px; font-weight: 600;">View in WordPress Leads Hub →</a>';
    $body .= '</div>';
    $body .= '</div>';
    $body .= '</div>';
    $body .= '</body></html>';

    $headers = array(
        'Content-Type: text/html; charset=UTF-8',
        'From: ' . $sender_name . ' <' . $sender_email . '>',
    );
    if ( ! empty( $data['email'] ) && is_email( $data['email'] ) ) {
        $headers[] = 'Reply-To: ' . ( ! empty( $data['name'] ) ? $data['name'] : 'Lead' ) . ' <' . $data['email'] . '>';
    }

    wp_mail( $recipients, $subject, $body, $headers );

    // Visitor Auto-Responder
    $autoresponder_en = get_option( 'fg_form_autoresponder_enabled', '0' );
    if ( '1' === $autoresponder_en && ! empty( $data['email'] ) && is_email( $data['email'] ) ) {
        $auto_sub_tpl = get_option( 'fg_form_autoresponder_subject', 'FiberGrid: We have received your inquiry' );
        $auto_body_tpl = get_option( 'fg_form_autoresponder_body', '' );

        $auto_sub = str_replace( array_keys( $replacements ), array_values( $replacements ), $auto_sub_tpl );
        $auto_body_text = str_replace( array_keys( $replacements ), array_values( $replacements ), $auto_body_tpl );

        $auto_body  = '<!DOCTYPE html><html><body style="font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, sans-serif; line-height: 1.6; color: #0b1c30; padding: 20px;">';
        $auto_body .= '<div style="max-width: 540px; margin: 0 auto; background: #ffffff; border-radius: 8px; border: 1px solid #e2e8f0; padding: 24px;">';
        $auto_body .= '<h3 style="margin-top: 0; color: #0066ff;">FiberGrid</h3>';
        $auto_body .= '<div style="white-space: pre-wrap; font-size: 14px; color: #334155;">' . esc_html( $auto_body_text ) . '</div>';
        $auto_body .= '<hr style="border: 0; border-top: 1px solid #e2e8f0; margin: 20px 0;">';
        $auto_body .= '<p style="font-size: 12px; color: #94a3b8; margin: 0;">FiberGrid Network Operations</p>';
        $auto_body .= '</div></body></html>';

        $auto_headers = array(
            'Content-Type: text/html; charset=UTF-8',
            'From: ' . $sender_name . ' <' . $sender_email . '>',
        );
        wp_mail( $data['email'], $auto_sub, $auto_body, $auto_headers );
    }
}
