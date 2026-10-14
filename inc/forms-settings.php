<?php
/**
 * FiberGrid Theme & Form Email Settings
 *
 * Provides a dedicated WordPress Admin settings page to configure
 * form recipient emails, sender names, notification routing, and auto-responders.
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register Settings
 */
function fg_register_form_settings() {
    register_setting( 'fg_forms_settings_group', 'fg_form_email_enabled', array(
        'type'              => 'string',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '1',
    ) );

    register_setting( 'fg_forms_settings_group', 'fg_form_recipient_email', array(
        'type'              => 'string',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'netabuse@fibergrid.co.za',
    ) );

    register_setting( 'fg_forms_settings_group', 'fg_form_sender_name', array(
        'type'              => 'string',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'FiberGrid',
    ) );

    register_setting( 'fg_forms_settings_group', 'fg_form_sender_email', array(
        'type'              => 'string',
        'sanitize_callback' => 'sanitize_email',
        'default'           => 'netabuse@fibergrid.co.za',
    ) );

    register_setting( 'fg_forms_settings_group', 'fg_form_email_subject', array(
        'type'              => 'string',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '[FiberGrid Lead] New {form_type} Inquiry from {company}',
    ) );

    register_setting( 'fg_forms_settings_group', 'fg_form_autoresponder_enabled', array(
        'type'              => 'string',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '0',
    ) );

    register_setting( 'fg_forms_settings_group', 'fg_form_autoresponder_subject', array(
        'type'              => 'string',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'FiberGrid: We have received your inquiry',
    ) );

    register_setting( 'fg_forms_settings_group', 'fg_form_autoresponder_body', array(
        'type'              => 'string',
        'sanitize_callback' => 'sanitize_textarea_field',
        'default'           => "Hello {name},\n\nThank you for reaching out to FiberGrid. We have received your inquiry regarding {requirement}.\n\nA member of our Network Architecture / NOC team will review your specifications and follow up with you shortly.\n\nBest regards,\nFiberGrid Operations Desk",
    ) );
}
add_action( 'admin_init', 'fg_register_form_settings' );

/**
 * Handle Test Email Dispatch
 */
function fg_handle_test_email() {
    if ( isset( $_POST['fg_action'] ) && 'send_test_email' === $_POST['fg_action'] ) {
        check_admin_referer( 'fg_test_email_nonce' );

        $target = sanitize_email( $_POST['fg_test_recipient'] ?? get_option( 'admin_email' ) );
        if ( ! is_email( $target ) ) {
            add_settings_error( 'fg_settings_notices', 'invalid_email', __( 'Please provide a valid test recipient email address.', 'fibergrid' ), 'error' );
            return;
        }

        $sender_name  = get_option( 'fg_form_sender_name', 'FiberGrid Inquiries' );
        $sender_email = get_option( 'fg_form_sender_email', get_option( 'admin_email' ) );

        $subject = 'FiberGrid Test Notification: Email Subsystem Verified';
        $body  = "<h2>FiberGrid Email Notification Test</h2>";
        $body .= "<p>This is a test notification dispatched from your <strong>FiberGrid WordPress Theme</strong> settings page.</p>";
        $body .= "<table style='border-collapse:collapse;width:100%;max-width:500px;'>";
        $body .= "<tr><td style='padding:6px;border-bottom:1px solid #ddd;'><strong>Timestamp:</strong></td><td style='padding:6px;border-bottom:1px solid #ddd;'>" . current_time( 'mysql' ) . "</td></tr>";
        $body .= "<tr><td style='padding:6px;border-bottom:1px solid #ddd;'><strong>Sender:</strong></td><td style='padding:6px;border-bottom:1px solid #ddd;'>" . esc_html( "$sender_name <$sender_email>" ) . "</td></tr>";
        $body .= "<tr><td style='padding:6px;border-bottom:1px solid #ddd;'><strong>Recipient:</strong></td><td style='padding:6px;border-bottom:1px solid #ddd;'>" . esc_html( $target ) . "</td></tr>";
        $body .= "<tr><td style='padding:6px;border-bottom:1px solid #ddd;'><strong>WordPress URL:</strong></td><td style='padding:6px;border-bottom:1px solid #ddd;'>" . esc_html( home_url() ) . "</td></tr>";
        $body .= "</table>";
        $body .= "<p style='margin-top:16px;color:#666;font-size:12px;'>If you received this message, your WordPress mail routing (wp_mail / SMTP) is functioning correctly.</p>";

        $headers = array(
            'Content-Type: text/html; charset=UTF-8',
            'From: ' . $sender_name . ' <' . $sender_email . '>',
        );

        $sent = wp_mail( $target, $subject, $body, $headers );

        if ( $sent ) {
            add_settings_error( 'general', 'test_sent', sprintf( __( 'Test email sent successfully to %s. Please check your inbox (and spam folder).', 'fibergrid' ), esc_html( $target ) ), 'success' );
        } else {
            add_settings_error( 'general', 'test_failed', __( 'WordPress wp_mail() returned false. Please verify your SMTP settings (WP Mail SMTP plugin).', 'fibergrid' ), 'error' );
        }
    }
}
add_action( 'admin_init', 'fg_handle_test_email' );

/**
 * Render Theme & Form Settings Page
 */
function fg_render_form_settings_page() {
    $email_enabled      = get_option( 'fg_form_email_enabled', '1' );
    $recipient_email    = get_option( 'fg_form_recipient_email', get_option( 'admin_email' ) );
    $sender_name        = get_option( 'fg_form_sender_name', 'FiberGrid Inquiries' );
    $sender_email       = get_option( 'fg_form_sender_email', get_option( 'admin_email' ) );
    $email_subject      = get_option( 'fg_form_email_subject', '[FiberGrid Lead] New {form_type} Inquiry from {company}' );
    $autoresponder_en   = get_option( 'fg_form_autoresponder_enabled', '0' );
    $autoresponder_sub  = get_option( 'fg_form_autoresponder_subject', 'FiberGrid: We have received your inquiry' );
    $autoresponder_body = get_option( 'fg_form_autoresponder_body', "Hello {name},\n\nThank you for reaching out to FiberGrid. We have received your inquiry regarding {requirement}.\n\nA member of our Network Architecture / NOC team will review your specifications and follow up with you shortly.\n\nBest regards,\nFiberGrid Operations Desk" );
    ?>
    <div class="wrap">
        <h1 style="display:flex;align-items:center;gap:10px;margin-bottom:12px;">
            <span style="color:#0066FF;">⚡</span> <?php esc_html_e( 'FiberGrid Theme &amp; Form Email Settings', 'fibergrid' ); ?>
        </h1>
        <p style="color:#64748B;font-size:14px;margin-bottom:24px;">
            <?php esc_html_e( 'Configure where incoming website inquiries (Contact, IP Transit, Colocation tours) are sent via email, sender credentials, and visitor confirmations.', 'fibergrid' ); ?>
        </p>

        <?php settings_errors(); ?>

        <div style="display:grid;grid-template-columns:1fr 340px;gap:24px;align-items:start;">
            <!-- Left Column: Settings Form -->
            <div style="background:#FFFFFF;border:1px solid #E2E8F0;border-radius:10px;padding:24px;box-shadow:0 1px 3px rgba(0,0,0,0.05);">
                <form method="post" action="options.php">
                    <?php settings_fields( 'fg_forms_settings_group' ); ?>

                    <h2 style="font-size:17px;font-weight:700;color:#0F172A;border-bottom:1px solid #F1F5F9;padding-bottom:10px;margin-top:0;">
                        <?php esc_html_e( '1. Notification Email Dispatch', 'fibergrid' ); ?>
                    </h2>
                    <p style="color:#64748B;font-size:13px;margin-bottom:16px;">
                        <?php esc_html_e( 'Control whether submitted forms send an email notification immediately to your operations/sales desk.', 'fibergrid' ); ?>
                    </p>

                    <table class="form-table" role="presentation" style="margin-top:0;">
                        <tr>
                            <th scope="row" style="width:220px;padding-top:10px;">
                                <label for="fg_form_email_enabled"><?php esc_html_e( 'Enable Email Notifications', 'fibergrid' ); ?></label>
                            </th>
                            <td style="padding-top:10px;">
                                <label style="display:flex;align-items:center;gap:8px;font-weight:600;color:#0F172A;">
                                    <input type="checkbox" id="fg_form_email_enabled" name="fg_form_email_enabled" value="1" <?php checked( $email_enabled, '1' ); ?>>
                                    <?php esc_html_e( 'Send email notification whenever a form is submitted', 'fibergrid' ); ?>
                                </label>
                                <p class="description" style="margin-top:4px;color:#64748B;">
                                    <?php esc_html_e( 'All submissions are also automatically recorded in your FiberGrid Leads database.', 'fibergrid' ); ?>
                                </p>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">
                                <label for="fg_form_recipient_email"><?php esc_html_e( 'Recipient Email Address(es)', 'fibergrid' ); ?> <span style="color:#DC2626;">*</span></label>
                            </th>
                            <td>
                                <input type="text" id="fg_form_recipient_email" name="fg_form_recipient_email" value="<?php echo esc_attr( $recipient_email ); ?>" class="regular-text" style="width:100%;max-width:480px;" required>
                                <p class="description" style="color:#64748B;">
                                    <?php esc_html_e( 'Where form submissions should be sent. Separate multiple recipient email addresses with commas (e.g. sales@fibergrid.co.za, ops@fibergrid.co.za).', 'fibergrid' ); ?>
                                </p>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">
                                <label for="fg_form_sender_name"><?php esc_html_e( 'Sender "From" Name', 'fibergrid' ); ?> <span style="color:#DC2626;">*</span></label>
                            </th>
                            <td>
                                <input type="text" id="fg_form_sender_name" name="fg_form_sender_name" value="<?php echo esc_attr( $sender_name ); ?>" class="regular-text" style="width:100%;max-width:480px;" required>
                                <p class="description" style="color:#64748B;">
                                    <?php esc_html_e( 'Name displayed in the "From" header (e.g. FiberGrid Inquiries or FiberGrid NOC Dispatch).', 'fibergrid' ); ?>
                                </p>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">
                                <label for="fg_form_sender_email"><?php esc_html_e( 'Sender "From" Email', 'fibergrid' ); ?> <span style="color:#DC2626;">*</span></label>
                            </th>
                            <td>
                                <input type="email" id="fg_form_sender_email" name="fg_form_sender_email" value="<?php echo esc_attr( $sender_email ); ?>" class="regular-text" style="width:100%;max-width:480px;" required>
                                <p class="description" style="color:#64748B;">
                                    <?php esc_html_e( 'Email address in the "From" header (should match your domain, e.g. dispatch@fibergrid.co.za or noreply@fibergrid.co.za, to comply with SPF/DKIM).', 'fibergrid' ); ?>
                                </p>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">
                                <label for="fg_form_email_subject"><?php esc_html_e( 'Email Subject Template', 'fibergrid' ); ?></label>
                            </th>
                            <td>
                                <input type="text" id="fg_form_email_subject" name="fg_form_email_subject" value="<?php echo esc_attr( $email_subject ); ?>" class="regular-text" style="width:100%;max-width:480px;">
                                <p class="description" style="color:#64748B;">
                                    <?php esc_html_e( 'Available tags: {form_type}, {name}, {company}, {requirement}, {id}', 'fibergrid' ); ?>
                                </p>
                            </td>
                        </tr>
                    </table>

                    <h2 style="font-size:17px;font-weight:700;color:#0F172A;border-bottom:1px solid #F1F5F9;padding-bottom:10px;margin-top:28px;">
                        <?php esc_html_e( '2. Visitor Auto-Responder Confirmation', 'fibergrid' ); ?>
                    </h2>
                    <p style="color:#64748B;font-size:13px;margin-bottom:16px;">
                        <?php esc_html_e( 'Optionally send an automatic receipt acknowledgement back to the corporate email submitted by the visitor.', 'fibergrid' ); ?>
                    </p>

                    <table class="form-table" role="presentation" style="margin-top:0;">
                        <tr>
                            <th scope="row" style="width:220px;">
                                <label for="fg_form_autoresponder_enabled"><?php esc_html_e( 'Enable Auto-Responder', 'fibergrid' ); ?></label>
                            </th>
                            <td>
                                <label style="display:flex;align-items:center;gap:8px;font-weight:600;color:#0F172A;">
                                    <input type="checkbox" id="fg_form_autoresponder_enabled" name="fg_form_autoresponder_enabled" value="1" <?php checked( $autoresponder_en, '1' ); ?>>
                                    <?php esc_html_e( 'Send immediate receipt confirmation email to the visitor', 'fibergrid' ); ?>
                                </label>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">
                                <label for="fg_form_autoresponder_subject"><?php esc_html_e( 'Confirmation Subject', 'fibergrid' ); ?></label>
                            </th>
                            <td>
                                <input type="text" id="fg_form_autoresponder_subject" name="fg_form_autoresponder_subject" value="<?php echo esc_attr( $autoresponder_sub ); ?>" class="regular-text" style="width:100%;max-width:480px;">
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">
                                <label for="fg_form_autoresponder_body"><?php esc_html_e( 'Confirmation Message Body', 'fibergrid' ); ?></label>
                            </th>
                            <td>
                                <textarea id="fg_form_autoresponder_body" name="fg_form_autoresponder_body" rows="6" style="width:100%;max-width:480px;font-family:sans-serif;"><?php echo esc_textarea( $autoresponder_body ); ?></textarea>
                                <p class="description" style="color:#64748B;">
                                    <?php esc_html_e( 'Available tags: {name}, {company}, {requirement}, {id}', 'fibergrid' ); ?>
                                </p>
                            </td>
                        </tr>
                    </table>

                    <div style="margin-top:24px;padding-top:16px;border-top:1px solid #F1F5F9;">
                        <?php submit_button( __( 'Save Form & Email Settings', 'fibergrid' ), 'primary', 'submit', false, array( 'style' => 'background:#0066FF;border-color:#0050CB;padding:6px 20px;font-size:14px;font-weight:600;box-shadow:0 1px 2px rgba(0,0,0,0.1);' ) ); ?>
                    </div>
                </form>
            </div>

            <!-- Right Column: Test Email Utility & Quick Links -->
            <div style="display:flex;flex-col:column;flex-direction:column;gap:20px;">
                <!-- Test Email Card -->
                <div style="background:#FFFFFF;border:1px solid #E2E8F0;border-radius:10px;padding:20px;box-shadow:0 1px 3px rgba(0,0,0,0.05);">
                    <h3 style="margin-top:0;font-size:15px;font-weight:700;color:#0F172A;display:flex;align-items:center;gap:8px;">
                        <span>✉️</span> <?php esc_html_e( 'Test Email Dispatch', 'fibergrid' ); ?>
                    </h3>
                    <p style="color:#64748B;font-size:12px;line-height:1.5;">
                        <?php esc_html_e( 'Verify that your WordPress email delivery and SMTP configuration are actively sending messages.', 'fibergrid' ); ?>
                    </p>
                    <form method="post" action="">
                        <?php wp_nonce_field( 'fg_test_email_nonce' ); ?>
                        <input type="hidden" name="fg_action" value="send_test_email">
                        <label for="fg_test_recipient" style="display:block;font-size:12px;font-weight:600;color:#334155;margin-bottom:6px;">
                            <?php esc_html_e( 'Send Test To:', 'fibergrid' ); ?>
                        </label>
                        <input type="email" id="fg_test_recipient" name="fg_test_recipient" value="<?php echo esc_attr( get_option( 'admin_email' ) ); ?>" style="width:100%;margin-bottom:12px;padding:6px 10px;border-radius:6px;border:1px solid #CBD5E1;" required>
                        <button type="submit" class="button" style="width:100%;background:#F8FAFC;border-color:#CBD5E1;color:#0F172A;font-weight:600;text-align:center;padding:6px;">
                            <?php esc_html_e( 'Send Verification Email', 'fibergrid' ); ?>
                        </button>
                    </form>
                </div>

                <!-- Database Status Card -->
                <div style="background:#FFFFFF;border:1px solid #E2E8F0;border-radius:10px;padding:20px;box-shadow:0 1px 3px rgba(0,0,0,0.05);">
                    <h3 style="margin-top:0;font-size:15px;font-weight:700;color:#0F172A;display:flex;align-items:center;gap:8px;">
                        <span>📊</span> <?php esc_html_e( 'Database Logging', 'fibergrid' ); ?>
                    </h3>
                    <p style="color:#64748B;font-size:12px;line-height:1.5;">
                        <?php esc_html_e( 'All inquiries submitted on the frontend are automatically saved to your database and can be reviewed at any time.', 'fibergrid' ); ?>
                    </p>
                    <a href="<?php echo esc_url( admin_url( 'admin.php?page=fibergrid-leads' ) ); ?>" class="button button-secondary" style="width:100%;text-align:center;font-weight:600;">
                        <?php esc_html_e( 'View Submissions Log →', 'fibergrid' ); ?>
                    </a>
                </div>

                <!-- Live Customizer Card -->
                <div style="background:#FFFFFF;border:1px solid #E2E8F0;border-radius:10px;padding:20px;box-shadow:0 1px 3px rgba(0,0,0,0.05);">
                    <h3 style="margin-top:0;font-size:15px;font-weight:700;color:#0F172A;display:flex;align-items:center;gap:8px;">
                        <span>🎨</span> <?php esc_html_e( 'Theme Customizer', 'fibergrid' ); ?>
                    </h3>
                    <p style="color:#64748B;font-size:12px;line-height:1.5;">
                        <?php esc_html_e( 'Header logo, navigation links, colors, typography, and layout settings can be styled live.', 'fibergrid' ); ?>
                    </p>
                    <a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-secondary" style="width:100%;text-align:center;font-weight:600;">
                        <?php esc_html_e( 'Open Customizer →', 'fibergrid' ); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php
}
