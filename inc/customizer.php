<?php
/**
 * FiberGrid — Theme Customizer Settings
 *
 * Provides comprehensive global color overrides, typography configuration,
 * header telemetry status, footer branding, and form routing settings.
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function fg_customize_register( $wp_customize ) {

    // 1. Panel: FiberGrid Theme Settings
    $wp_customize->add_panel( 'fg_theme_panel', array(
        'title'       => __( 'FiberGrid Theme Options', 'fibergrid' ),
        'description' => __( 'Manage global color tokens, typography, telemetry badges, and form notifications.', 'fibergrid' ),
        'priority'    => 25,
    ) );

    // -------------------------------------------------------------
    // SECTION: GLOBAL COLOR TOKENS
    // -------------------------------------------------------------
    $wp_customize->add_section( 'fg_colors_section', array(
        'title'    => __( 'Global Colors & Theme Accents', 'fibergrid' ),
        'panel'    => 'fg_theme_panel',
        'priority' => 10,
    ) );

    $color_controls = array(
        'fg_color_primary'           => array( 'label' => __( 'Primary Optical Blue', 'fibergrid' ), 'default' => '#0066FF' ),
        'fg_color_primary_container' => array( 'label' => __( 'Primary Container Dark', 'fibergrid' ), 'default' => '#0050CB' ),
        'fg_color_secondary'         => array( 'label' => __( 'Oceanic Navy (Headings/Cards)', 'fibergrid' ), 'default' => '#0C2340' ),
        'fg_color_midnight'          => array( 'label' => __( 'Midnight Dark Canvas', 'fibergrid' ), 'default' => '#0A1128' ),
        'fg_color_cyan_pulse'        => array( 'label' => __( 'Telemetry Cyan Pulse', 'fibergrid' ), 'default' => '#06B6D4' ),
        'fg_color_signal_amber'      => array( 'label' => __( 'Signal Amber (Alerts/Tiers)', 'fibergrid' ), 'default' => '#F59E0B' ),
        'fg_color_route_orange'      => array( 'label' => __( 'Route Orange (SLA Badges)', 'fibergrid' ), 'default' => '#FF5E14' ),
        'fg_color_surface_ice'       => array( 'label' => __( 'Surface Ice (Card Background)', 'fibergrid' ), 'default' => '#F4F8FF' ),
        'fg_color_grid_line'         => array( 'label' => __( 'Grid Lines & Hairline Borders', 'fibergrid' ), 'default' => '#E2E8F0' ),
        'fg_color_status_healthy'    => array( 'label' => __( 'Operational Green Pulse', 'fibergrid' ), 'default' => '#10B981' ),
    );

    foreach ( $color_controls as $id => $data ) {
        $wp_customize->add_setting( $id, array(
            'default'           => $data['default'],
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'refresh',
        ) );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $id, array(
            'label'   => $data['label'],
            'section' => 'fg_colors_section',
        ) ) );
    }

    // -------------------------------------------------------------
    // SECTION: GLOBAL TYPOGRAPHY
    // -------------------------------------------------------------
    $wp_customize->add_section( 'fg_typography_section', array(
        'title'    => __( 'Global Typography System', 'fibergrid' ),
        'panel'    => 'fg_theme_panel',
        'priority' => 15,
    ) );

    $wp_customize->add_setting( 'fg_font_headline', array(
        'default'           => 'Plus Jakarta Sans',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'fg_font_headline', array(
        'label'       => __( 'Headline Font Family', 'fibergrid' ),
        'description' => __( 'Default: Plus Jakarta Sans. Enter Google Font name.', 'fibergrid' ),
        'section'     => 'fg_typography_section',
        'type'        => 'text',
    ) );

    $wp_customize->add_setting( 'fg_font_body', array(
        'default'           => 'Inter',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'fg_font_body', array(
        'label'       => __( 'Body Prose Font Family', 'fibergrid' ),
        'description' => __( 'Default: Inter. Enter Google Font name.', 'fibergrid' ),
        'section'     => 'fg_typography_section',
        'type'        => 'text',
    ) );

    $wp_customize->add_setting( 'fg_font_mono', array(
        'default'           => 'Space Mono',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'fg_font_mono', array(
        'label'       => __( 'Telemetry / Monospace Font Family', 'fibergrid' ),
        'description' => __( 'Default: Space Mono (used for latency metrics, IP masks, uptime).', 'fibergrid' ),
        'section'     => 'fg_typography_section',
        'type'        => 'text',
    ) );

    // -------------------------------------------------------------
    // SECTION: HEADER & TELEMETRY STATUS PILL
    // -------------------------------------------------------------
    $wp_customize->add_section( 'fg_header_section', array(
        'title'    => __( 'Header & Navigation', 'fibergrid' ),
        'panel'    => 'fg_theme_panel',
        'priority' => 20,
    ) );

    $wp_customize->add_setting( 'fg_header_telemetry_enable', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ) );
    $wp_customize->add_control( 'fg_header_telemetry_enable', array(
        'label'   => __( 'Show Live Status Indicator Pill in Header', 'fibergrid' ),
        'section' => 'fg_header_section',
        'type'    => 'checkbox',
    ) );

    $wp_customize->add_setting( 'fg_header_telemetry_text', array(
        'default'           => 'All Systems Operational | 99.999% Core Uptime',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'fg_header_telemetry_text', array(
        'label'   => __( 'Status Text', 'fibergrid' ),
        'section' => 'fg_header_section',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'fg_header_cta_text', array(
        'default'           => 'Request Quote',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'fg_header_cta_text', array(
        'label'   => __( 'Header Primary CTA Label', 'fibergrid' ),
        'section' => 'fg_header_section',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'fg_header_cta_url', array(
        'default'           => '/contact/#quote',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'fg_header_cta_url', array(
        'label'   => __( 'Header Primary CTA URL', 'fibergrid' ),
        'section' => 'fg_header_section',
        'type'    => 'text',
    ) );

    // -------------------------------------------------------------
    // SECTION: FOOTER & NOC EMERGENCY INFO
    // -------------------------------------------------------------
    $wp_customize->add_section( 'fg_footer_section', array(
        'title'    => __( 'Footer & NOC Information', 'fibergrid' ),
        'panel'    => 'fg_theme_panel',
        'priority' => 25,
    ) );

    $wp_customize->add_setting( 'fg_footer_tagline', array(
        'default'           => 'Ultra Low-Latency IP Transit & Global Data Center Infrastructure.',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'fg_footer_tagline', array(
        'label'   => __( 'Footer Tagline', 'fibergrid' ),
        'section' => 'fg_footer_section',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'fg_footer_noc_phone', array(
        'default'           => '+27 (0) 11 000 0000',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'fg_footer_noc_phone', array(
        'label'   => __( '24/7/365 NOC Emergency Phone', 'fibergrid' ),
        'section' => 'fg_footer_section',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'fg_footer_noc_email', array(
        'default'           => 'noc@fibergrid.co.za',
        'sanitize_callback' => 'sanitize_email',
    ) );
    $wp_customize->add_control( 'fg_footer_noc_email', array(
        'label'   => __( 'NOC Support Email', 'fibergrid' ),
        'section' => 'fg_footer_section',
        'type'    => 'email',
    ) );

    $wp_customize->add_setting( 'fg_footer_copyright', array(
        'default'           => '© 2026 FiberGrid (Pty) Ltd. All rights reserved.',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'fg_footer_copyright', array(
        'label'   => __( 'Copyright Text', 'fibergrid' ),
        'section' => 'fg_footer_section',
        'type'    => 'text',
    ) );

    // -------------------------------------------------------------
    // SECTION: FORM SUBMISSIONS & EMAIL ROUTING
    // -------------------------------------------------------------
    $wp_customize->add_section( 'fg_forms_section', array(
        'title'    => __( 'Form Submissions & Email Notifications', 'fibergrid' ),
        'panel'    => 'fg_theme_panel',
        'priority' => 30,
    ) );

    $wp_customize->add_setting( 'fg_recipient_email', array(
        'default'           => 'noc@fibergrid.co.za',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'fg_recipient_email', array(
        'label'       => __( 'Recipient Email(s)', 'fibergrid' ),
        'description' => __( 'Where quotes, inquiries, and contact submissions are sent. Separate with commas.', 'fibergrid' ),
        'section'     => 'fg_forms_section',
        'type'        => 'text',
    ) );

    $wp_customize->add_setting( 'fg_sender_name', array(
        'default'           => 'FiberGrid NOC',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'fg_sender_name', array(
        'label'   => __( 'From Name for Notifications', 'fibergrid' ),
        'section' => 'fg_forms_section',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'fg_sender_email', array(
        'default'           => 'noc@fibergrid.co.za',
        'sanitize_callback' => 'sanitize_email',
    ) );
    $wp_customize->add_control( 'fg_sender_email', array(
        'label'   => __( 'From Email for Notifications', 'fibergrid' ),
        'section' => 'fg_forms_section',
        'type'    => 'email',
    ) );

    $wp_customize->add_setting( 'fg_auto_respond', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ) );
    $wp_customize->add_control( 'fg_auto_respond', array(
        'label'       => __( 'Send Instant Acknowledgment to Customer', 'fibergrid' ),
        'description' => __( 'Sends an automated confirmation email to the submitter with their ticket/inquiry reference.', 'fibergrid' ),
        'section'     => 'fg_forms_section',
        'type'        => 'checkbox',
    ) );

    $wp_customize->add_setting( 'fg_webhook_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'fg_webhook_url', array(
        'label'       => __( 'External Webhook URL (Optional)', 'fibergrid' ),
        'description' => __( 'Send instant JSON lead payload to Slack, Discord, Zapier, or CRM webhook.', 'fibergrid' ),
        'section'     => 'fg_forms_section',
        'type'        => 'url',
    ) );
}
add_action( 'customize_register', 'fg_customize_register' );
