<?php
/**
 * FiberGrid — Theme Header
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
$telemetry_enable = get_theme_mod( 'fg_header_telemetry_enable', true );
$telemetry_text   = get_theme_mod( 'fg_header_telemetry_text', 'All Systems Operational | 99.999% Core Uptime' );
$header_cta_text  = get_theme_mod( 'fg_header_cta_text', 'Request Quote' );
$header_cta_url   = get_theme_mod( 'fg_header_cta_url', '/contact/#quote' );
?>

<?php if ( $telemetry_enable ) : ?>
    <!-- Top Telemetry & SLA Bar -->
    <div style="background:var(--fg-color-secondary, #0C2340);color:#FFFFFF;padding:8px 0;font-size:12px;font-family:var(--fg-font-mono, monospace);border-bottom:1px solid rgba(255,255,255,0.08);">
        <div class="fg-container" style="display:flex;justify-content:space-between;align-items:center;">
            <div style="display:flex;align-items:center;gap:8px;">
                <span class="fg-pulse-dot pulse"></span>
                <span><?php echo esc_html( $telemetry_text ); ?></span>
            </div>
            <div style="display:flex;align-items:center;gap:18px;">
                <a href="/ip-transit/#looking-glass" style="color:#94A3B8;text-decoration:none;">Looking Glass</a>
                <span style="color:#475569;">|</span>
                <a href="tel:+27110000000" style="color:#38BDF8;text-decoration:none;font-weight:700;">NOC: +27 (0) 11 000 0000</a>
            </div>
        </div>
    </div>
<?php endif; ?>

<!-- Main Navigation Header -->
<header style="position:sticky;top:0;z-index:9999;background:rgba(255,255,255,0.96);backdrop-filter:blur(16px);border-bottom:1px solid var(--fg-color-grid-line, #E2E8F0);box-shadow:0 1px 10px rgba(12,35,64,0.04);">
    <div class="fg-container" style="display:flex;align-items:center;justify-content:space-between;height:76px;">
        <!-- Logo -->
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="display:flex;align-items:center;gap:10px;text-decoration:none;font-family:var(--fg-font-headline);font-weight:900;font-size:24px;color:var(--fg-color-secondary);letter-spacing:-0.03em;">
            <span style="width:34px;height:34px;background:var(--fg-color-primary);border-radius:8px;display:flex;align-items:center;justify-content:center;color:#FFFFFF;font-size:18px;font-weight:bold;">
                ⚡
            </span>
            <span>FIBER<span style="color:var(--fg-color-primary);">GRID</span></span>
        </a>

        <!-- Desktop Navigation -->
        <nav style="display:flex;align-items:center;gap:32px;">
            <?php
            if ( has_nav_menu( 'primary' ) ) {
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'fg-nav-menu',
                    'fallback_cb'    => false,
                ) );
            } else {
                ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="text-decoration:none;color:var(--fg-color-secondary);font-size:14px;font-weight:600;">Home</a>
                <a href="/ip-transit/" style="text-decoration:none;color:var(--fg-color-secondary);font-size:14px;font-weight:600;">IP Transit</a>
                <a href="/colocation/" style="text-decoration:none;color:var(--fg-color-secondary);font-size:14px;font-weight:600;">Colocation</a>
                <a href="/virtual-data-center/" style="text-decoration:none;color:var(--fg-color-secondary);font-size:14px;font-weight:600;">Virtual Cloud</a>
                <a href="/about-us/" style="text-decoration:none;color:var(--fg-color-secondary);font-size:14px;font-weight:600;">About Us</a>
                <a href="/blog/" style="text-decoration:none;color:var(--fg-color-secondary);font-size:14px;font-weight:600;">Engineering Blog</a>
                <a href="/contact/" style="text-decoration:none;color:var(--fg-color-secondary);font-size:14px;font-weight:600;">Contact</a>
                <?php
            }
            ?>
        </nav>

        <!-- Right Action Button -->
        <div style="display:flex;align-items:center;gap:16px;">
            <a href="<?php echo esc_url( $header_cta_url ); ?>" class="fg-btn fg-btn-primary" style="padding:10px 20px;font-size:13px;">
                <?php echo esc_html( $header_cta_text ); ?>
            </a>
        </div>
    </div>
</header>
<main id="content" class="site-content">
