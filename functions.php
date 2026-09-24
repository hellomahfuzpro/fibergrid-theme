<?php
/**
 * FiberGrid — Theme Setup & Core Bootstrap
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'FG_VERSION', '1.0.0' );
define( 'FG_DIR', get_template_directory() );
define( 'FG_URI', get_template_directory_uri() );

/**
 * 1. Theme Supports & Navigation Menus
 */
function fg_theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );

    register_nav_menus( array(
        'primary' => __( 'Primary Navigation Header', 'fibergrid' ),
        'footer'  => __( 'Footer Navigation', 'fibergrid' ),
    ) );
}
add_action( 'after_setup_theme', 'fg_theme_setup' );

/**
 * 2. Enqueue Front-End Stylesheets & Scripts
 */
function fg_enqueue_scripts() {
    // Google Fonts: Plus Jakarta Sans, Inter, Space Mono
    $fonts_url = 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800;900&family=Space+Mono:ital,wght@0,400;0,700;1,400&display=swap';
    wp_enqueue_style( 'fg-google-fonts', $fonts_url, array(), null );

    // Dashicons for buttons and icons
    wp_enqueue_style( 'dashicons' );

    // Design Tokens & Widgets CSS
    wp_enqueue_style( 'fg-tokens', FG_URI . '/assets/css/tokens.css', array(), FG_VERSION );
    wp_enqueue_style( 'fg-widgets', FG_URI . '/assets/css/widgets.css', array( 'fg-tokens' ), FG_VERSION );
    wp_enqueue_style( 'fg-style', get_stylesheet_uri(), array( 'fg-widgets' ), FG_VERSION );

    // Scripts
    wp_enqueue_script( 'fg-forms-ajax', FG_URI . '/assets/js/forms-ajax.js', array(), FG_VERSION, true );
    wp_enqueue_script( 'fg-telemetry-hud', FG_URI . '/assets/js/telemetry-hud.js', array(), FG_VERSION, true );

    // Localize variables for front-end AJAX form submissions
    wp_localize_script( 'fg-forms-ajax', 'fg_vars', array(
        'ajax_url' => admin_url( 'admin-ajax.php' ),
        'nonce'    => wp_create_nonce( 'fg_form_nonce' ),
        'home_url' => home_url( '/' ),
    ) );
}
add_action( 'wp_enqueue_scripts', 'fg_enqueue_scripts' );

/**
 * 3. Elementor Activation Notice
 */
function fg_check_elementor_active() {
    if ( ! did_action( 'elementor/loaded' ) ) {
        add_action( 'admin_notices', function() {
            ?>
            <div class="notice notice-warning is-dismissible">
                <p>
                    <strong><?php esc_html_e( 'FiberGrid Theme:', 'fibergrid' ); ?></strong>
                    <?php esc_html_e( 'Please install and activate the Elementor plugin to enable the custom telecom and telemetry section widgets.', 'fibergrid' ); ?>
                </p>
            </div>
            <?php
        } );
    }
}
add_action( 'admin_init', 'fg_check_elementor_active' );

/**
 * 4. Load Theme Core Modules
 */
require_once FG_DIR . '/inc/updater.php';
require_once FG_DIR . '/inc/customizer.php';
require_once FG_DIR . '/inc/customizer-css.php';
require_once FG_DIR . '/inc/forms-handler.php';
require_once FG_DIR . '/inc/forms-dashboard.php';
require_once FG_DIR . '/inc/elementor.php';
require_once FG_DIR . '/inc/page-seeder.php';
