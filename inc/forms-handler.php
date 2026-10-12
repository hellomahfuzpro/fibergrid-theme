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

    $wpdb->insert(
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

    wp_send_json_success( array(
        'message' => 'Facility audit request received. Security clearance protocol initiated.',
    ) );
}
add_action( 'wp_ajax_fg_submit_facility_tour', 'fg_handle_facility_tour_submission' );
add_action( 'wp_ajax_nopriv_fg_submit_facility_tour', 'fg_handle_facility_tour_submission' );
