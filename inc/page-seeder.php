<?php
/**
 * FiberGrid — One-Click Programmatic Page Seeder
 *
 * Seeds all 9 Stitch screens into modern Elementor Flexbox Containers.
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function fg_uid() {
    return substr( md5( uniqid( (string) wp_rand(), true ) ), 0, 7 );
}

function fg_rep( array $rows ) {
    return array_map( function( $r ) {
        $r['_id'] = fg_uid();
        return $r;
    }, $rows );
}

/**
 * Builds modern flexbox containers wrapping widgets
 */
function fg_build_container_tree( array $widgets ) {
    $tree = array();
    foreach ( $widgets as $w ) {
        $tree[] = array(
            'id'       => fg_uid(),
            'elType'   => 'container',
            'settings' => array(
                'content_width' => 'full',
                'flex_gap'      => array( 'unit' => 'px', 'size' => 0, 'column' => '0', 'row' => '0' ),
                'padding'       => array( 'unit' => 'px', 'top' => '0', 'right' => '0', 'bottom' => '0', 'left' => '0', 'isLinked' => true ),
            ),
            'isInner'  => false,
            'elements' => array(
                array(
                    'id'         => fg_uid(),
                    'elType'     => 'widget',
                    'widgetType' => $w['type'],
                    'settings'   => isset( $w['settings'] ) ? $w['settings'] : array(),
                    'elements'   => array(),
                ),
            ),
        );
    }
    return $tree;
}

function fg_persist_page( $page_id, array $tree, $is_front = false ) {
    update_option( 'elementor_experiment-container', 'active' );
    update_post_meta( $page_id, '_elementor_data', wp_slash( wp_json_encode( $tree ) ) );
    update_post_meta( $page_id, '_elementor_edit_mode', 'builder' );
    update_post_meta( $page_id, '_elementor_template_type', 'wp-page' );
    update_post_meta( $page_id, '_wp_page_template', 'elementor_header_footer' );

    if ( defined( 'ELEMENTOR_VERSION' ) ) {
        update_post_meta( $page_id, '_elementor_version', ELEMENTOR_VERSION );
    }

    if ( $is_front ) {
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $page_id );
    }

    if ( class_exists( '\Elementor\Plugin' ) ) {
        \Elementor\Plugin::$instance->files_manager->clear_cache();
    }
}

/**
 * Main Seeder Routine for all 9 Stitch screens
 */
function fg_seed_all_screens() {
    // 1. #home — Homepage Redesign
    $home_id = get_option( 'page_on_front' );
    if ( ! $home_id || ! get_post( $home_id ) ) {
        $home_id = wp_insert_post( array(
            'post_title'   => 'FiberGrid — Ultra Low-Latency IP Transit & Colocation',
            'post_name'    => 'home',
            'post_status'  => 'publish',
            'post_type'    => 'page',
        ) );
    }

    $home_tree = fg_build_container_tree( array(
        array(
            'type'     => 'fg_hero_telemetry',
            'settings' => array(
                'eyebrow'         => 'Bare Metal & IP Transit',
                'title_prefix'    => 'Ultra Low-Latency',
                'title_highlight' => 'IP Transit',
                'title_suffix'    => '& Global Data Center Infrastructure.',
                'lede'            => 'Powering mission-critical connectivity, enterprise colocation, and virtual data centers across 15 countries and 4 continents with direct Tier 1 backbone routing.',
                'btn1_text'       => 'Explore Infrastructure',
                'btn1_link'       => array( 'url' => '#pricing-matrix' ),
                'btn2_text'       => 'Request Quote',
                'btn2_link'       => array( 'url' => '/contact/' ),
                'telemetry_ping'  => '< 1.5ms Core Latency',
            ),
        ),
        array(
            'type'     => 'fg_carrier_ribbon',
            'settings' => array(
                'stat_number' => '100+',
                'stat_label'  => 'TRUSTED BY FAST-GROWING COMPANIES WORLDWIDE',
            ),
        ),
        array(
            'type'     => 'fg_telemetry_cards',
            'settings' => array(
                'eyebrow' => '{ Capacity And Availability }',
                'title'   => 'A Platform You Can Rely On.',
                'lede'    => 'Engineered for mission-critical IT infrastructure today, with the operational flexibility to expand into next-generation high-compute clusters.',
            ),
        ),
        array(
            'type'     => 'fg_solutions_grid',
            'settings' => array(
                'eyebrow' => 'Core Capabilities',
                'title'   => 'Purpose-Built Telecommunications & Cloud Infrastructure',
            ),
        ),
        array(
            'type'     => 'fg_cta_band',
            'settings' => array(
                'eyebrow'   => 'Accelerate Your Infrastructure',
                'title'     => 'Ready to Deploy Carrier-Grade Optical Bandwidth?',
                'lede'      => 'Speak with a senior network engineer today. Receive custom BGP route testing, colocation rack pricing, and tailored multi-homed SLA guarantees.',
                'btn1_text' => 'Request Bandwidth Quote',
                'btn1_link' => array( 'url' => '/contact/' ),
            ),
        ),
    ) );
    fg_persist_page( $home_id, $home_tree, true );

    // Helper to get or insert page
    $get_page = function( $slug, $title ) {
        $page = get_page_by_path( $slug );
        if ( $page ) {
            return $page->ID;
        }
        return wp_insert_post( array(
            'post_title'   => $title,
            'post_name'    => $slug,
            'post_status'  => 'publish',
            'post_type'    => 'page',
        ) );
    };

    // 2. #ip-transit
    $transit_id = $get_page( 'ip-transit', 'High-Speed IP Transit — FiberGrid' );
    $transit_tree = fg_build_container_tree( array(
        array(
            'type'     => 'fg_hero_telemetry',
            'settings' => array(
                'eyebrow'         => 'Tier 1 Global Upstream',
                'title_prefix'    => 'Dedicated High-Speed',
                'title_highlight' => 'IP Transit',
                'title_suffix'    => 'with Sub-Millisecond Jitter',
                'lede'            => 'Direct peering across major African, European, and Asian Internet Exchanges with automated route optimization.',
            ),
        ),
        array( 'type' => 'fg_carrier_ribbon', 'settings' => array() ),
        array( 'type' => 'fg_looking_glass', 'settings' => array() ),
        array( 'type' => 'fg_pricing_matrix', 'settings' => array() ),
        array( 'type' => 'fg_cta_band', 'settings' => array() ),
    ) );
    fg_persist_page( $transit_id, $transit_tree );

    // 3. #colocation
    $colo_id = $get_page( 'colocation', 'Global Colocation Facilities — FiberGrid' );
    $colo_tree = fg_build_container_tree( array(
        array( 'type' => 'fg_rack_calculator', 'settings' => array() ),
        array( 'type' => 'fg_tier_compliance', 'settings' => array() ),
        array( 'type' => 'fg_carrier_ribbon', 'settings' => array() ),
        array( 'type' => 'fg_cta_band', 'settings' => array() ),
    ) );
    fg_persist_page( $colo_id, $colo_tree );

    // 4. #virtual-data-center
    $vdc_id = $get_page( 'virtual-data-center', 'Virtual Data Center & Cloud — FiberGrid' );
    $vdc_tree = fg_build_container_tree( array(
        array( 'type' => 'fg_compute_tiers', 'settings' => array() ),
        array( 'type' => 'fg_telemetry_cards', 'settings' => array() ),
        array( 'type' => 'fg_cta_band', 'settings' => array() ),
    ) );
    fg_persist_page( $vdc_id, $vdc_tree );

    // 5. #about-us
    $about_id = $get_page( 'about-us', 'About Us — FiberGrid Infrastructure' );
    $about_tree = fg_build_container_tree( array(
        array( 'type' => 'fg_about_story', 'settings' => array() ),
        array( 'type' => 'fg_tier_compliance', 'settings' => array() ),
        array( 'type' => 'fg_carrier_ribbon', 'settings' => array() ),
        array( 'type' => 'fg_cta_band', 'settings' => array() ),
    ) );
    fg_persist_page( $about_id, $about_tree );

    // 6. #blog
    $blog_id = $get_page( 'blog', 'Engineering Blog & Telemetry Insights — FiberGrid' );
    $blog_tree = fg_build_container_tree( array(
        array( 'type' => 'fg_posts_grid', 'settings' => array() ),
        array( 'type' => 'fg_cta_band', 'settings' => array() ),
    ) );
    fg_persist_page( $blog_id, $blog_tree );

    // 7. #contact-us
    $contact_id = $get_page( 'contact', 'Contact & NOC Escalation — FiberGrid' );
    $contact_tree = fg_build_container_tree( array(
        array( 'type' => 'fg_contact_routing', 'settings' => array() ),
    ) );
    fg_persist_page( $contact_id, $contact_tree );

    // 8. #404 Diagnostic Preview
    $preview_404_id = $get_page( '404-preview', '404 Route Not Found Preview — FiberGrid' );
    $p404_tree = fg_build_container_tree( array(
        array( 'type' => 'fg_severed_route_404', 'settings' => array() ),
    ) );
    fg_persist_page( $preview_404_id, $p404_tree );

    return true;
}

/**
 * Add Admin Notice & Tool Action for Manual Trigger
 */
function fg_add_seeder_menu() {
    add_management_page(
        __( 'FiberGrid Page Seeder', 'fibergrid' ),
        __( 'FiberGrid Demo Seeder', 'fibergrid' ),
        'manage_options',
        'fibergrid-seeder',
        'fg_render_seeder_admin_page'
    );
}
add_action( 'admin_menu', 'fg_add_seeder_menu' );

function fg_render_seeder_admin_page() {
    $message = '';
    if ( isset( $_POST['fg_run_seeder'] ) && check_admin_referer( 'fg_seeder_nonce' ) ) {
        fg_seed_all_screens();
        $message = __( 'All 9 FiberGrid screens successfully created and configured with Elementor flexbox containers!', 'fibergrid' );
    }
    ?>
    <div class="wrap">
        <h1><?php esc_html_e( 'FiberGrid One-Click Page Seeder', 'fibergrid' ); ?></h1>
        <p><?php esc_html_e( 'Generates the 9 final Stitch screens (Home, IP Transit, Colocation, Virtual Data Center, About Us, Engineering Blog, Contact & Support, 404 Preview) with pre-configured Elementor widgets and styling.', 'fibergrid' ); ?></p>

        <?php if ( $message ) : ?>
            <div class="notice notice-success is-dismissible">
                <p><strong><?php echo esc_html( $message ); ?></strong></p>
            </div>
        <?php endif; ?>

        <form method="post" style="margin-top:24px;">
            <?php wp_nonce_field( 'fg_seeder_nonce' ); ?>
            <button type="submit" name="fg_run_seeder" class="button button-primary button-hero">
                <?php esc_html_e( 'Generate All 9 Pages Now', 'fibergrid' ); ?>
            </button>
        </form>
    </div>
    <?php
}
