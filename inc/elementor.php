<?php
/**
 * FiberGrid — Elementor Integration & Widget Autoloader
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register FiberGrid Category in Elementor
 */
function fg_elementor_category( $elements_manager ) {
    $elements_manager->add_category( 'fibergrid', array(
        'title' => __( 'FiberGrid Telecom', 'fibergrid' ),
        'icon'  => 'eicon-network',
    ) );
}
add_action( 'elementor/elements/categories_registered', 'fg_elementor_category' );

/**
 * Glob Autoloader for widgets/class-*.php
 */
function fg_register_widgets( $widgets_manager ) {
    $base_widget = FG_DIR . '/inc/class-base-widget.php';
    if ( file_exists( $base_widget ) ) {
        require_once $base_widget;
    }

    $dir = FG_DIR . '/widgets/';
    if ( ! is_dir( $dir ) ) {
        return;
    }

    // 1. Require all widget files
    foreach ( glob( $dir . 'class-*.php' ) as $file ) {
        require_once $file;
    }

    // 2. Register widget classes
    foreach ( glob( $dir . 'class-*.php' ) as $file ) {
        $base = basename( $file, '.php' );
        $slug = substr( $base, strlen( 'class-' ) ); // e.g. hero-telemetry
        $class = 'FG_Widget_' . str_replace( ' ', '', ucwords( str_replace( '-', ' ', $slug ) ) );
        if ( class_exists( $class ) ) {
            $widgets_manager->register( new $class() );
        }
    }
}
add_action( 'elementor/widgets/register', 'fg_register_widgets' );
