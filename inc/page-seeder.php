<?php
/**
 * Programmatic Page Seeder for Elementor Containers
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Page_Seeder {

    public static function get_pages_blueprint() {
        return array(
            'front-page' => array(
                'title'   => 'Home',
                'widgets' => array( 'fg_home_sec_1', 'fg_home_sec_4', 'fg_home_sec_6', 'fg_home_sec_7', 'fg_home_sec_9' ),
            ),
            'about-us' => array(
                'title'   => 'About Us',
                'widgets' => array( 'fg_about_sec_2', 'fg_about_sec_4', 'fg_about_sec_5', 'fg_about_sec_7' ),
            ),
            'ip-transit' => array(
                'title'   => 'High-Speed IP Transit',
                'widgets' => array( 'fg_transit_sec_1', 'fg_transit_sec_4', 'fg_transit_sec_5', 'fg_transit_sec_7', 'fg_transit_sec_10' ),
            ),
            'colocation' => array(
                'title'   => 'Global Colocation',
                'widgets' => array( 'fg_colo_sec_2', 'fg_colo_sec_4', 'fg_colo_sec_5', 'fg_colo_sec_9', 'fg_colo_sec_7' ),
            ),
            'blog' => array(
                'title'   => 'Engineering Blog',
                'widgets' => array( 'fg_blog_sec_1', 'fg_blog_sec_3', 'fg_blog_sec_5' ),
            ),
            'subsea-cable-expansion-2024' => array(
                'title'   => 'Subsea Cable Expansion 2024',
                'widgets' => array( 'fg_blog_single_sec_1', 'fg_blog_single_sec_2', 'fg_blog_single_sec_3', 'fg_blog_single_sec_4' ),
            ),
            'contact' => array(
                'title'   => 'Contact & Support',
                'widgets' => array( 'fg_contact_sec_1', 'fg_contact_sec_2' ),
            ),
        );
    }

    public static function build_pages() {
        // Ensure container experiment is active
        update_option( 'elementor_experiment-container', 'active' );

        $blueprint = self::get_pages_blueprint();
        $created_pages = array();

        foreach ( $blueprint as $slug => $data ) {
            $is_front = ( 'front-page' === $slug );
            $post_slug = $is_front ? 'home' : $slug;

            // Check if page exists
            $existing_page = get_page_by_path( $post_slug );
            $page_id = 0;

            if ( $existing_page ) {
                $page_id = $existing_page->ID;
                wp_update_post( array(
                    'ID'          => $page_id,
                    'post_title'  => $data['title'],
                    'post_status' => 'publish',
                    'post_type'   => 'page',
                ) );
            } else {
                $page_id = wp_insert_post( array(
                    'post_title'   => $data['title'],
                    'post_name'    => $post_slug,
                    'post_status'  => 'publish',
                    'post_type'    => 'page',
                    'post_content' => '',
                ) );
            }

            if ( ! $page_id || is_wp_error( $page_id ) ) {
                continue;
            }

            // Build Elementor Container tree
            $containers = array();
            foreach ( $data['widgets'] as $widget_name ) {
                $container_id = substr( md5( $slug . $widget_name . uniqid() ), 0, 7 );
                $widget_id    = substr( md5( $widget_name . $container_id ), 0, 7 );

                $containers[] = array(
                    'id'       => $container_id,
                    'elType'   => 'container',
                    'isInner'  => false,
                    'settings' => array(
                        'content_width' => 'full',
                        'flex_gap'      => array( 'unit' => 'px', 'size' => 0 ),
                        'padding'       => array(
                            'unit'   => 'px',
                            'top'    => '0',
                            'right'  => '0',
                            'bottom' => '0',
                            'left'   => '0',
                            'isLinked' => true,
                        ),
                    ),
                    'elements' => array(
                        array(
                            'id'         => $widget_id,
                            'elType'     => 'widget',
                            'isInner'    => false,
                            'widgetType' => $widget_name,
                            'settings'   => (object) array(),
                            'elements'   => array(),
                        ),
                    ),
                );
            }

            // Update Elementor post metadata
            update_post_meta( $page_id, '_elementor_edit_mode', 'builder' );
            update_post_meta( $page_id, '_elementor_template_type', 'wp-page' );
            update_post_meta( $page_id, '_elementor_version', defined( 'ELEMENTOR_VERSION' ) ? ELEMENTOR_VERSION : '3.20.0' );
            update_post_meta( $page_id, '_wp_page_template', 'elementor_header_footer' );
            update_post_meta( $page_id, '_elementor_data', wp_slash( wp_json_encode( $containers ) ) );

            if ( $is_front ) {
                update_option( 'show_on_front', 'page' );
                update_option( 'page_on_front', $page_id );
            }

            $created_pages[ $slug ] = $page_id;
        }

        // Flush rewrite rules
        flush_rewrite_rules();

        return $created_pages;
    }
}

/**
 * Register WP-CLI command
 */
if ( defined( 'WP_CLI' ) && WP_CLI ) {
    WP_CLI::add_command( 'fibergrid seed-pages', function( $args, $assoc_args ) {
        WP_CLI::line( 'Seeding all FiberGrid Elementor pages...' );
        $results = FiberGrid_Page_Seeder::build_pages();
        foreach ( $results as $slug => $id ) {
            WP_CLI::success( "Page '$slug' seeded successfully (ID: $id)" );
        }
        WP_CLI::success( 'All FiberGrid pages seeded perfectly with Elementor containers!' );
    } );
}

/**
 * Admin action trigger
 */
add_action( 'admin_init', function() {
    if ( isset( $_GET['fg_seed_pages'] ) && 'yes' === $_GET['fg_seed_pages'] && current_user_can( 'manage_options' ) ) {
        check_admin_referer( 'fg_seed_nonce' );
        FiberGrid_Page_Seeder::build_pages();
        wp_safe_redirect( admin_url( 'admin.php?page=fibergrid-leads&seeded=1' ) );
        exit;
    }
} );

/**
 * Add Seeder button to FiberGrid Leads menu
 */
add_action( 'admin_notices', function() {
    $screen = get_current_screen();
    if ( $screen && 'toplevel_page_fibergrid-leads' === $screen->id ) {
        if ( isset( $_GET['seeded'] ) ) {
            echo '<div class="notice notice-success is-dismissible"><p><strong>Success!</strong> All FiberGrid pages seeded with Elementor containers.</p></div>';
        }
        $seed_url = wp_nonce_url( admin_url( 'admin.php?page=fibergrid-leads&fg_seed_pages=yes' ), 'fg_seed_nonce' );
        echo '<div style="margin: 15px 0;"><a href="' . esc_url( $seed_url ) . '" class="button button-primary button-hero">⚡ Re-Seed All Elementor Pages</a></div>';
    }
} );
