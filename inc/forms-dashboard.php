<?php
/**
 * Forms Submissions Admin Dashboard
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register Admin Menu & Submenus
 */
add_action( 'admin_menu', function() {
    // Top-Level FiberGrid Menu
    add_menu_page(
        __( 'FiberGrid', 'fibergrid' ),
        __( 'FiberGrid', 'fibergrid' ),
        'manage_options',
        'fibergrid-leads',
        'fg_render_leads_dashboard',
        'dashicons-networking',
        25
    );

    // Inquiries & Leads Submenu
    add_submenu_page(
        'fibergrid-leads',
        __( 'Inquiries & Leads', 'fibergrid' ),
        __( 'Inquiries & Leads', 'fibergrid' ),
        'manage_options',
        'fibergrid-leads',
        'fg_render_leads_dashboard'
    );

    // Theme & Form Email Settings Submenu
    add_submenu_page(
        'fibergrid-leads',
        __( 'Form & Email Settings', 'fibergrid' ),
        __( 'Form & Email Settings', 'fibergrid' ),
        'manage_options',
        'fibergrid-form-settings',
        'fg_render_form_settings_page'
    );

    // Also register under Appearance for quick discovery
    add_theme_page(
        __( 'FiberGrid Settings', 'fibergrid' ),
        __( 'FiberGrid Settings', 'fibergrid' ),
        'manage_options',
        'fibergrid-form-settings',
        'fg_render_form_settings_page'
    );
} );

/**
 * Render Leads Dashboard
 */
function fg_render_leads_dashboard() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'fibergrid_submissions';

    // Handle Delete
    if ( isset( $_GET['action'], $_GET['lead_id'] ) && 'delete' === $_GET['action'] && check_admin_referer( 'fg_delete_lead_' . intval( $_GET['lead_id'] ) ) ) {
        $wpdb->delete( $table_name, array( 'id' => intval( $_GET['lead_id'] ) ), array( '%d' ) );
        echo '<div class="notice notice-success is-dismissible"><p>Lead deleted successfully.</p></div>';
    }

    $leads = $wpdb->get_results( "SELECT * FROM $table_name ORDER BY created_at DESC LIMIT 100" );
    ?>
    <div class="wrap">
        <h1 style="display:flex;align-items:center;gap:10px;">
            <span style="color:#0066FF;">⚡</span> FiberGrid Inquiry &amp; Telemetry Submissions
        </h1>
        <p style="color:#64748B;">All incoming inquiries from the Contact, IP Transit, and Colocation forms.</p>

        <div style="background:#FFFFFF;border:1px solid #E2E8F0;border-radius:8px;padding:16px;margin-top:20px;box-shadow:0 1px 3px rgba(0,0,0,0.05);">
            <table class="wp-list-table widefat fixed striped">
                <thead>
                    <tr>
                        <th style="width:60px;">ID</th>
                        <th style="width:120px;">Type</th>
                        <th style="width:160px;">Name / Company</th>
                        <th style="width:180px;">Contact</th>
                        <th style="width:140px;">Requirement</th>
                        <th>Message / Specs</th>
                        <th style="width:140px;">Timestamp</th>
                        <th style="width:80px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ( empty( $leads ) ) : ?>
                        <tr>
                            <td colspan="8" style="text-align:center;padding:24px;color:#94A3B8;">No inquiries logged yet. All forms are active and monitored.</td>
                        </tr>
                    <?php else : ?>
                        <?php foreach ( $leads as $lead ) : ?>
                            <tr>
                                <td><strong>#<?php echo esc_html( $lead->id ); ?></strong></td>
                                <td>
                                    <span style="display:inline-block;padding:3px 8px;border-radius:4px;font-size:11px;font-weight:bold;background:#EFF4FF;color:#0066FF;text-transform:uppercase;">
                                        <?php echo esc_html( $lead->form_type ); ?>
                                    </span>
                                </td>
                                <td>
                                    <strong><?php echo esc_html( $lead->name ); ?></strong><br>
                                    <span style="color:#64748B;font-size:12px;"><?php echo esc_html( $lead->company ); ?></span>
                                </td>
                                <td>
                                    <a href="mailto:<?php echo esc_attr( $lead->email ); ?>"><?php echo esc_html( $lead->email ); ?></a><br>
                                    <span style="color:#64748B;font-size:12px;"><?php echo esc_html( $lead->phone ); ?></span>
                                </td>
                                <td>
                                    <span style="font-weight:600;color:#0C2340;"><?php echo esc_html( $lead->requirement ); ?></span>
                                </td>
                                <td>
                                    <div style="max-height:60px;overflow:auto;font-size:12px;color:#334155;">
                                        <?php echo esc_html( $lead->message ); ?>
                                    </div>
                                </td>
                                <td style="font-size:12px;color:#64748B;">
                                    <?php echo esc_html( $lead->created_at ); ?>
                                </td>
                                <td>
                                    <?php
                                    $del_url = wp_nonce_url( admin_url( 'admin.php?page=fibergrid-leads&action=delete&lead_id=' . $lead->id ), 'fg_delete_lead_' . $lead->id );
                                    ?>
                                    <a href="<?php echo esc_url( $del_url ); ?>" onclick="return confirm('Delete this record?');" style="color:#DC2626;font-size:12px;">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}
