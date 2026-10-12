<?php
/**
 * FiberGrid Theme Functions
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'FIBERGRID_VERSION', '2.0.2' );
define( 'FG_DIR', get_template_directory() );
define( 'FG_URI', get_template_directory_uri() );

/**
 * Theme Setup
 */
function fg_theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
    add_theme_support( 'align-wide' );
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 60,
            'width'       => 240,
            'flex-height' => true,
            'flex-width'  => true,
        )
    );

    register_nav_menus(
        array(
            'primary' => esc_html__( 'Primary Header Navigation', 'fibergrid' ),
            'footer'  => esc_html__( 'Footer Navigation', 'fibergrid' ),
        )
    );
}
add_action( 'after_setup_theme', 'fg_theme_setup' );

/**
 * Enqueue Frontend Scripts & Styles
 */
function fg_enqueue_scripts() {
    // Theme Core CSS
    wp_enqueue_style( 'fibergrid-main', get_stylesheet_uri(), array(), FIBERGRID_VERSION );

    // Client Interactions JS
    wp_enqueue_script(
        'fibergrid-interactions',
        get_template_directory_uri() . '/assets/js/theme-interactions.js',
        array(),
        FIBERGRID_VERSION,
        true
    );

    wp_localize_script(
        'fibergrid-interactions',
        'fgData',
        array(
            'ajaxUrl' => admin_url( 'admin-ajax.php' ),
            'nonce'   => wp_create_nonce( 'fg_form_nonce' ),
        )
    );
}
add_action( 'wp_enqueue_scripts', 'fg_enqueue_scripts' );

/**
 * Elementor preview iframe styling
 */
add_action( 'elementor/preview/enqueue_styles', function() {
    wp_enqueue_style( 'fibergrid-main', get_stylesheet_uri(), array(), FIBERGRID_VERSION );
} );

/**
 * Include Subsystems
 */
require_once get_template_directory() . '/inc/updater.php';
require_once get_template_directory() . '/inc/elementor.php';
require_once get_template_directory() . '/inc/forms-handler.php';
require_once get_template_directory() . '/inc/forms-dashboard.php';
require_once get_template_directory() . '/inc/forms-settings.php';
require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/page-seeder.php';

/**
 * 301 Permanent Redirects for Legacy Host, Server & VDC Endpoints
 */
add_action( 'template_redirect', function() {
    $uri = isset( $_SERVER['REQUEST_URI'] ) ? strtolower( trim( (string) wp_parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ), '/' ) ) : '';
    $legacy_paths = array(
        'virtual-data-center',
        'services/cloud',
        'services/virtual-data-center',
        'dedicated-servers',
        'dedicated-server',
        'vdc',
    );
    foreach ( $legacy_paths as $path ) {
        if ( $uri === $path || strpos( $uri, $path . '/' ) === 0 || is_page( $path ) ) {
            wp_safe_redirect( home_url( '/ip-transit/' ), 301 );
            exit;
        }
    }
} );

/**
 * Meta Robots Noindex for Legacy Endpoints
 */
add_action( 'wp_head', function() {
    if ( is_page( array( 'virtual-data-center', 'vdc', 'dedicated-servers', 'dedicated-server' ) ) ) {
        echo '<meta name="robots" content="noindex, nofollow" />' . "\n";
    }
}, 1 );

/**
 * Filter Document Title for Pure Network Operator Branding:
 * "IP Transit & Colocation | FiberGrid"
 */
add_filter( 'document_title_parts', function( $parts ) {
    $site_name = get_bloginfo( 'name' );
    if ( empty( $site_name ) ) {
        $site_name = 'FiberGrid';
    }
    if ( is_front_page() || is_home() ) {
        $parts['title'] = 'IP Transit & Colocation';
        $parts['site']  = $site_name;
    } else {
        $parts['site'] = 'IP Transit & Colocation | ' . $site_name;
    }
    return $parts;
}, 20 );

add_filter( 'pre_get_document_title', function( $title ) {
    $site_name = get_bloginfo( 'name' );
    if ( empty( $site_name ) ) {
        $site_name = 'FiberGrid';
    }
    if ( is_front_page() ) {
        return 'IP Transit & Colocation | ' . $site_name;
    }
    return $title;
}, 20 );
