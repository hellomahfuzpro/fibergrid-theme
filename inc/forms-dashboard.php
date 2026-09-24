<?php
/**
 * FiberGrid — Admin Form Submissions Dashboard
 *
 * Dedicated dashboard interface to review leads, view technical inquiry details,
 * toggle response status, export CSVs, and configure email settings.
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * 1. Register Admin Menu with Unread Badge
 */
function fg_register_forms_admin_menu() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'fibergrid_submissions';

    $unread_count = 0;
    if ( $wpdb->get_var( "SHOW TABLES LIKE '$table_name'" ) === $table_name ) {
        $unread_count = (int) $wpdb->get_var( "SELECT COUNT(*) FROM $table_name WHERE status = 'new'" );
    }

    $menu_title = __( 'FiberGrid Forms', 'fibergrid' );
    if ( $unread_count > 0 ) {
        $menu_title .= sprintf( ' <span class="update-plugins count-%1$d"><span class="plugin-count">%1$d</span></span>', $unread_count );
    }

    add_menu_page(
        __( 'Form Submissions', 'fibergrid' ),
        $menu_title,
        'manage_options',
        'fibergrid-forms',
        'fg_render_submissions_page',
        'dashicons-email-alt2',
        28
    );

    add_submenu_page(
        'fibergrid-forms',
        __( 'All Submissions', 'fibergrid' ),
        __( 'All Submissions', 'fibergrid' ),
        'manage_options',
        'fibergrid-forms',
        'fg_render_submissions_page'
    );

    add_submenu_page(
        'fibergrid-forms',
        __( 'Export CSV', 'fibergrid' ),
        __( 'Export CSV', 'fibergrid' ),
        'manage_options',
        'fibergrid-forms-export',
        'fg_render_csv_export_page'
    );
}
add_action( 'admin_menu', 'fg_register_forms_admin_menu' );

/**
 * 2. Enqueue Admin Assets for Submissions Dashboard
 */
function fg_admin_submissions_assets( $hook ) {
    if ( strpos( $hook, 'fibergrid-forms' ) === false ) {
        return;
    }
    wp_enqueue_style( 'fg-admin-submissions', FG_URI . '/assets/css/admin-submissions.css', array(), FG_VERSION );
    wp_enqueue_script( 'fg-admin-submissions', FG_URI . '/assets/js/admin-submissions.js', array( 'jquery' ), FG_VERSION, true );
    wp_localize_script( 'fg-admin-submissions', 'fgAdminVars', array(
        'ajax_url' => admin_url( 'admin-ajax.php' ),
        'nonce'    => wp_create_nonce( 'fg_admin_nonce' ),
    ) );
}
add_action( 'admin_enqueue_scripts', 'fg_admin_submissions_assets' );

/**
 * 3. Render All Submissions Page
 */
function fg_render_submissions_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'fibergrid_submissions';

    $active_tab = isset( $_GET['tab'] ) ? sanitize_key( $_GET['tab'] ) : 'all';
    $search     = isset( $_GET['s'] ) ? sanitize_text_field( wp_unslash( $_GET['s'] ) ) : '';

    $where = 'WHERE 1=1';
    if ( 'all' !== $active_tab ) {
        $where .= $wpdb->prepare( ' AND form_type = %s', $active_tab );
    }
    if ( ! empty( $search ) ) {
        $like = '%' . $wpdb->esc_like( $search ) . '%';
        $where .= $wpdb->prepare( ' AND (name LIKE %s OR email LIKE %s OR company LIKE %s OR message LIKE %s)', $like, $like, $like, $like );
    }

    $submissions = $wpdb->get_results( "SELECT * FROM $table_name $where ORDER BY created_at DESC LIMIT 100" );
    $total_count = (int) $wpdb->get_var( "SELECT COUNT(*) FROM $table_name" );
    ?>
    <div class="wrap fg-admin-wrap">
        <div class="fg-admin-header">
            <div>
                <h1 class="wp-heading-inline"><?php esc_html_e( 'Enterprise Form Inquiries & Submissions', 'fibergrid' ); ?></h1>
                <p class="description"><?php esc_html_e( 'Live telemetry of all quotes, capacity requests, and contact forms submitted across the FiberGrid portal.', 'fibergrid' ); ?></p>
            </div>
            <div class="fg-header-actions">
                <a href="<?php echo esc_url( admin_url( 'admin.php?page=fibergrid-forms-export' ) ); ?>" class="button button-primary">
                    <span class="dashicons dashicons-download" style="vertical-align: middle; margin-top: -2px;"></span>
                    <?php esc_html_e( 'Export to CSV', 'fibergrid' ); ?>
                </a>
            </div>
        </div>

        <nav class="nav-tab-wrapper fg-tabs">
            <a href="?page=fibergrid-forms&tab=all" class="nav-tab <?php echo 'all' === $active_tab ? 'nav-tab-active' : ''; ?>">
                <?php esc_html_e( 'All Inquiries', 'fibergrid' ); ?> (<?php echo esc_html( $total_count ); ?>)
            </a>
            <a href="?page=fibergrid-forms&tab=contact" class="nav-tab <?php echo 'contact' === $active_tab ? 'nav-tab-active' : ''; ?>">
                <?php esc_html_e( 'Contact & Support', 'fibergrid' ); ?>
            </a>
            <a href="?page=fibergrid-forms&tab=transit_quote" class="nav-tab <?php echo 'transit_quote' === $active_tab ? 'nav-tab-active' : ''; ?>">
                <?php esc_html_e( 'IP Transit Quotes', 'fibergrid' ); ?>
            </a>
            <a href="?page=fibergrid-forms&tab=colocation" class="nav-tab <?php echo 'colocation' === $active_tab ? 'nav-tab-active' : ''; ?>">
                <?php esc_html_e( 'Colocation / Racks', 'fibergrid' ); ?>
            </a>
            <a href="?page=fibergrid-forms&tab=cloud_vdc" class="nav-tab <?php echo 'cloud_vdc' === $active_tab ? 'nav-tab-active' : ''; ?>">
                <?php esc_html_e( 'Virtual Data Center', 'fibergrid' ); ?>
            </a>
            <a href="?page=fibergrid-forms&tab=newsletter" class="nav-tab <?php echo 'newsletter' === $active_tab ? 'nav-tab-active' : ''; ?>">
                <?php esc_html_e( 'Newsletter', 'fibergrid' ); ?>
            </a>
        </nav>

        <form method="get" class="fg-search-bar">
            <input type="hidden" name="page" value="fibergrid-forms">
            <input type="hidden" name="tab" value="<?php echo esc_attr( $active_tab ); ?>">
            <input type="search" name="s" value="<?php echo esc_attr( $search ); ?>" placeholder="<?php esc_attr_e( 'Search by name, email, company...', 'fibergrid' ); ?>">
            <button type="submit" class="button"><?php esc_html_e( 'Search', 'fibergrid' ); ?></button>
            <?php if ( $search ) : ?>
                <a href="?page=fibergrid-forms&tab=<?php echo esc_attr( $active_tab ); ?>" class="button button-link"><?php esc_html_e( 'Clear Search', 'fibergrid' ); ?></a>
            <?php endif; ?>
        </form>

        <table class="wp-list-table widefat fixed striped table-view-list fg-submissions-table">
            <thead>
                <tr>
                    <th style="width: 85px;"><?php esc_html_e( 'Status', 'fibergrid' ); ?></th>
                    <th style="width: 140px;"><?php esc_html_e( 'Date & Time', 'fibergrid' ); ?></th>
                    <th><?php esc_html_e( 'Submitter', 'fibergrid' ); ?></th>
                    <th><?php esc_html_e( 'Category / Service', 'fibergrid' ); ?></th>
                    <th><?php esc_html_e( 'Message / Specs', 'fibergrid' ); ?></th>
                    <th style="width: 160px; text-align: right;"><?php esc_html_e( 'Quick Actions', 'fibergrid' ); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php if ( empty( $submissions ) ) : ?>
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 32px;">
                            <strong><?php esc_html_e( 'No submissions found.', 'fibergrid' ); ?></strong>
                        </td>
                    </tr>
                <?php else : ?>
                    <?php foreach ( $submissions as $row ) : ?>
                        <tr id="fg-row-<?php echo esc_attr( $row->id ); ?>" class="fg-status-<?php echo esc_attr( $row->status ); ?>">
                            <td>
                                <span class="fg-status-badge fg-badge-<?php echo esc_attr( $row->status ); ?>">
                                    <?php echo esc_html( strtoupper( $row->status ) ); ?>
                                </span>
                            </td>
                            <td>
                                <?php echo esc_html( date_i18n( 'M j, Y H:i', strtotime( $row->created_at ) ) ); ?>
                            </td>
                            <td>
                                <strong><?php echo esc_html( $row->name ? $row->name : 'N/A' ); ?></strong><br>
                                <a href="mailto:<?php echo esc_attr( $row->email ); ?>"><?php echo esc_html( $row->email ); ?></a>
                                <?php if ( $row->company ) : ?>
                                    <div class="fg-company-label">🏢 <?php echo esc_html( $row->company ); ?></div>
                                <?php endif; ?>
                                <?php if ( $row->phone ) : ?>
                                    <div class="fg-phone-label">📞 <?php echo esc_html( $row->phone ); ?></div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <span class="fg-pill-type"><?php echo esc_html( str_replace( '_', ' ', $row->form_type ) ); ?></span>
                                <?php if ( $row->service ) : ?>
                                    <div style="font-size: 12px; color: #4b5563; margin-top: 4px;">
                                        <strong><?php esc_html_e( 'Plan/Capacity:', 'fibergrid' ); ?></strong> <?php echo esc_html( $row->service ); ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ( $row->requirement ) : ?>
                                    <div style="font-size: 12px; font-family: monospace; background: #f3f4f6; padding: 4px 8px; border-radius: 4px; margin-bottom: 4px;">
                                        <?php echo esc_html( $row->requirement ); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="fg-message-preview">
                                    <?php echo esc_html( wp_trim_words( $row->message, 15, '...' ) ); ?>
                                </div>
                            </td>
                            <td style="text-align: right;">
                                <button type="button" class="button button-small fg-view-btn" data-id="<?php echo esc_attr( $row->id ); ?>" data-json='<?php echo esc_attr( wp_json_encode( $row ) ); ?>'>
                                    <?php esc_html_e( 'View Details', 'fibergrid' ); ?>
                                </button>
                                <button type="button" class="button button-small fg-action-btn" data-action="toggle_read" data-id="<?php echo esc_attr( $row->id ); ?>" title="Toggle Read/Unread">
                                    ✓
                                </button>
                                <button type="button" class="button button-small fg-delete-btn" data-id="<?php echo esc_attr( $row->id ); ?>" title="Delete" style="color: #ba1a1a;">
                                    ✕
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal for Detailed Inspection -->
    <div id="fg-modal" class="fg-modal-overlay" style="display:none;">
        <div class="fg-modal-content">
            <div class="fg-modal-header">
                <h2 id="fg-modal-title"><?php esc_html_e( 'Submission Details', 'fibergrid' ); ?></h2>
                <button type="button" class="fg-modal-close">&times;</button>
            </div>
            <div class="fg-modal-body" id="fg-modal-body">
                <!-- Injected dynamically via JS -->
            </div>
            <div class="fg-modal-footer">
                <button type="button" class="button button-primary fg-mark-replied-btn"><?php esc_html_e( 'Mark as Replied', 'fibergrid' ); ?></button>
                <button type="button" class="button fg-modal-close"><?php esc_html_e( 'Close', 'fibergrid' ); ?></button>
            </div>
        </div>
    </div>
    <?php
}

/**
 * 4. Render CSV Export Page
 */
function fg_render_csv_export_page() {
    if ( isset( $_POST['fg_download_csv'] ) && check_admin_referer( 'fg_export_csv_nonce' ) ) {
        fg_export_submissions_csv();
        exit;
    }
    ?>
    <div class="wrap fg-admin-wrap">
        <h1><?php esc_html_e( 'Export Form Submissions to CSV', 'fibergrid' ); ?></h1>
        <p><?php esc_html_e( 'Download a cleanly structured CSV file of customer inquiries for import into your CRM, ERP, or spreadsheet software.', 'fibergrid' ); ?></p>

        <form method="post" class="fg-export-form" style="background:#fff; padding:24px; border:1px solid #ccd0d4; border-radius:8px; max-width:500px; margin-top:20px;">
            <?php wp_nonce_field( 'fg_export_csv_nonce' ); ?>
            <p>
                <label for="fg_form_type_filter"><strong><?php esc_html_e( 'Filter by Form Category:', 'fibergrid' ); ?></strong></label><br>
                <select name="fg_form_type_filter" id="fg_form_type_filter" style="width: 100%; margin-top: 6px;">
                    <option value="all"><?php esc_html_e( 'All Categories', 'fibergrid' ); ?></option>
                    <option value="contact"><?php esc_html_e( 'Contact & Support', 'fibergrid' ); ?></option>
                    <option value="transit_quote"><?php esc_html_e( 'IP Transit Quotes', 'fibergrid' ); ?></option>
                    <option value="colocation"><?php esc_html_e( 'Colocation / Racks', 'fibergrid' ); ?></option>
                    <option value="cloud_vdc"><?php esc_html_e( 'Virtual Data Center', 'fibergrid' ); ?></option>
                    <option value="newsletter"><?php esc_html_e( 'Newsletter Signups', 'fibergrid' ); ?></option>
                </select>
            </p>
            <p style="margin-top:24px;">
                <button type="submit" name="fg_download_csv" class="button button-primary button-large">
                    <?php esc_html_e( 'Generate & Download CSV', 'fibergrid' ); ?>
                </button>
            </p>
        </form>
    </div>
    <?php
}

/**
 * 5. Handle CSV Output Stream
 */
function fg_export_submissions_csv() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'fibergrid_submissions';

    $filter = isset( $_POST['fg_form_type_filter'] ) ? sanitize_key( $_POST['fg_form_type_filter'] ) : 'all';

    $where = 'WHERE 1=1';
    if ( 'all' !== $filter ) {
        $where .= $wpdb->prepare( ' AND form_type = %s', $filter );
    }

    $rows = $wpdb->get_results( "SELECT * FROM $table_name $where ORDER BY created_at DESC", ARRAY_A );

    $filename = 'fibergrid-inquiries-' . gmdate( 'Y-m-d' ) . '.csv';

    header( 'Content-Type: text/csv; charset=utf-8' );
    header( 'Content-Disposition: attachment; filename=' . $filename );

    $output = fopen( 'php://output', 'w' );
    fputcsv( $output, array( 'ID', 'Form Type', 'Full Name', 'Work Email', 'Company', 'Phone', 'Service / Plan', 'Specs & Requirement', 'Message', 'IP Address', 'Status', 'Timestamp' ) );

    if ( ! empty( $rows ) ) {
        foreach ( $rows as $row ) {
            fputcsv( $output, array(
                $row['id'],
                $row['form_type'],
                $row['name'],
                $row['email'],
                $row['company'],
                $row['phone'],
                $row['service'],
                $row['requirement'],
                $row['message'],
                $row['ip_address'],
                $row['status'],
                $row['created_at'],
            ) );
        }
    }
    fclose( $output );
    exit;
}

/**
 * 6. AJAX Action: Update Submission Status / Delete
 */
function fg_ajax_update_submission_status() {
    check_ajax_referer( 'fg_admin_nonce', 'security' );
    if ( ! current_user_can( 'manage_options' ) ) {
        wp_send_json_error( array( 'message' => 'Unauthorized' ) );
    }

    global $wpdb;
    $table_name = $wpdb->prefix . 'fibergrid_submissions';

    $id     = isset( $_POST['id'] ) ? absint( $_POST['id'] ) : 0;
    $action = isset( $_POST['sub_action'] ) ? sanitize_key( $_POST['sub_action'] ) : '';

    if ( ! $id ) {
        wp_send_json_error();
    }

    if ( 'delete' === $action ) {
        $wpdb->delete( $table_name, array( 'id' => $id ), array( '%d' ) );
        wp_send_json_success( array( 'deleted' => true ) );
    } elseif ( 'mark_replied' === $action ) {
        $wpdb->update( $table_name, array( 'status' => 'replied' ), array( 'id' => $id ), array( '%s' ), array( '%d' ) );
        wp_send_json_success( array( 'status' => 'replied' ) );
    } elseif ( 'toggle_read' === $action ) {
        $current = $wpdb->get_var( $wpdb->prepare( "SELECT status FROM $table_name WHERE id = %d", $id ) );
        $new_status = ( 'new' === $current ) ? 'read' : 'new';
        $wpdb->update( $table_name, array( 'status' => $new_status ), array( 'id' => $id ), array( '%s' ), array( '%d' ) );
        wp_send_json_success( array( 'status' => $new_status ) );
    }

    wp_send_json_error();
}
add_action( 'wp_ajax_fg_update_submission_status', 'fg_ajax_update_submission_status' );
