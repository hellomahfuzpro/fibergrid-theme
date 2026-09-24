<?php
/**
 * FiberGrid — Customizer Live CSS Engine
 *
 * Injects dynamic CSS variables into <head> based on Customizer settings.
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function fg_customizer_css_output() {
    $primary           = get_theme_mod( 'fg_color_primary', '#0066FF' );
    $primary_container = get_theme_mod( 'fg_color_primary_container', '#0050CB' );
    $secondary         = get_theme_mod( 'fg_color_secondary', '#0C2340' );
    $midnight          = get_theme_mod( 'fg_color_midnight', '#0A1128' );
    $cyan_pulse        = get_theme_mod( 'fg_color_cyan_pulse', '#06B6D4' );
    $signal_amber      = get_theme_mod( 'fg_color_signal_amber', '#F59E0B' );
    $route_orange      = get_theme_mod( 'fg_color_route_orange', '#FF5E14' );
    $surface_ice       = get_theme_mod( 'fg_color_surface_ice', '#F4F8FF' );
    $grid_line         = get_theme_mod( 'fg_color_grid_line', '#E2E8F0' );
    $status_healthy    = get_theme_mod( 'fg_color_status_healthy', '#10B981' );

    $font_headline = get_theme_mod( 'fg_font_headline', 'Plus Jakarta Sans' );
    $font_body     = get_theme_mod( 'fg_font_body', 'Inter' );
    $font_mono     = get_theme_mod( 'fg_font_mono', 'Space Mono' );
    ?>
    <style id="fibergrid-customizer-variables">
        :root {
            --fg-color-primary: <?php echo esc_attr( $primary ); ?>;
            --fg-color-primary-container: <?php echo esc_attr( $primary_container ); ?>;
            --fg-color-secondary: <?php echo esc_attr( $secondary ); ?>;
            --fg-color-midnight: <?php echo esc_attr( $midnight ); ?>;
            --fg-color-cyan-pulse: <?php echo esc_attr( $cyan_pulse ); ?>;
            --fg-color-signal-amber: <?php echo esc_attr( $signal_amber ); ?>;
            --fg-color-route-orange: <?php echo esc_attr( $route_orange ); ?>;
            --fg-color-surface-ice: <?php echo esc_attr( $surface_ice ); ?>;
            --fg-color-grid-line: <?php echo esc_attr( $grid_line ); ?>;
            --fg-color-status-healthy: <?php echo esc_attr( $status_healthy ); ?>;

            --fg-font-headline: '<?php echo esc_attr( $font_headline ); ?>', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            --fg-font-body: '<?php echo esc_attr( $font_body ); ?>', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            --fg-font-mono: '<?php echo esc_attr( $font_mono ); ?>', 'SFMono-Regular', Consolas, Menlo, monospace;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'fg_customizer_css_output', 100 );
