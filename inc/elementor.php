<?php
/**
 * Elementor Integration & Autoloader
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register FiberGrid custom widget category
 */
add_action( 'elementor/elements/categories_registered', function( $elements_manager ) {
    $elements_manager->add_category(
        'fibergrid',
        array(
            'title' => esc_html__( 'FiberGrid Infrastructure', 'fibergrid' ),
            'icon'  => 'fa fa-bolt',
        )
    );
} );

/**
 * Autoload and register all widgets
 */
add_action( 'elementor/widgets/register', function( $widgets_manager ) {
    require_once get_template_directory() . '/widgets/class-base-widget.php';

    $widget_files = glob( get_template_directory() . '/widgets/class-*.php' );
    if ( ! $widget_files ) {
        return;
    }

    foreach ( $widget_files as $file ) {
        if ( basename( $file ) === 'class-base-widget.php' ) {
            continue;
        }

        require_once $file;

        $slug = preg_replace( '/^class-|\.php$/', '', basename( $file ) );
        $parts = explode( '-', $slug );
        $studly = implode( '', array_map( 'ucfirst', $parts ) );
        $class_name = 'FiberGrid_Widget_' . $studly;

        if ( class_exists( $class_name ) ) {
            $widgets_manager->register( new $class_name() );
        }
    }
} );
