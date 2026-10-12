<?php
/**
 * Header template
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800;900&family=Space+Mono:wght@500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <style>
        @layer base {
            html, body { margin: 0; padding: 0; }
            body { overscroll-behavior: none; }
            main > :first-child { margin-top: 0 !important; }
            main > :last-child { margin-bottom: 0 !important; }
        }
        ::-webkit-scrollbar { display: none; }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "route-orange": "#FF5E14",
                        "surface-container-low": "#eff4ff",
                        "on-secondary-fixed-variant": "#334766",
                        "on-surface": "#0b1c30",
                        "inverse-on-surface": "#eaf1ff",
                        "primary-fixed-dim": "#b3c5ff",
                        "surface-variant": "#d3e4fe",
                        "slate-surface": "#0F172A",
                        "midnight-bg": "#0A1128",
                        "on-background": "#0b1c30",
                        "on-primary-container": "#f8f7ff",
                        "on-secondary-fixed": "#031c38",
                        "primary-fixed": "#dae1ff",
                        "tertiary": "#006274",
                        "signal-amber": "#F59E0B",
                        "on-error": "#ffffff",
                        "outline-variant": "#c2c6d8",
                        "outline": "#727687",
                        "primary": "#0050cb",
                        "secondary-fixed": "#d5e3ff",
                        "on-tertiary": "#ffffff",
                        "surface-container-lowest": "#ffffff",
                        "on-primary": "#ffffff",
                        "status-healthy": "#10B981",
                        "surface-container-highest": "#d3e4fe",
                        "grid-line": "#E2E8F0",
                        "tertiary-container": "#007d92",
                        "on-surface-variant": "#424656",
                        "surface-container-high": "#dce9ff",
                        "on-tertiary-fixed-variant": "#004e5c",
                        "on-secondary-container": "#4a5e7e",
                        "optical-blue": "#0066FF",
                        "surface-ice": "#F4F8FF",
                        "on-error-container": "#93000a",
                        "cyan-pulse": "#06B6D4",
                        "secondary": "#4b5f7f",
                        "secondary-container": "#c3d8fe",
                        "error": "#ba1a1a",
                        "on-tertiary-container": "#edfaff",
                        "surface-dim": "#cbdbf5",
                        "on-secondary": "#ffffff",
                        "on-primary-fixed": "#001849",
                        "sky-bright": "#38BDF8",
                        "on-tertiary-fixed": "#001f26",
                        "primary-container": "#0066ff",
                        "surface-bright": "#f8f9ff",
                        "tertiary-fixed": "#acedff",
                        "secondary-fixed-dim": "#b3c7ec",
                        "deep-navy": "#0C2340",
                        "background": "#f8f9ff",
                        "error-container": "#ffdad6",
                        "inverse-surface": "#213145",
                        "on-primary-fixed-variant": "#003fa4",
                        "tertiary-fixed-dim": "#4cd7f6",
                        "inverse-primary": "#b3c5ff",
                        "surface": "#f8f9ff",
                        "surface-container": "#e5eeff",
                        "surface-tint": "#0054d6"
                    },
                    borderRadius: {
                        "DEFAULT": "0.125rem",
                        "lg": "0.25rem",
                        "xl": "0.5rem",
                        "full": "0.75rem"
                    },
                    spacing: {
                        "space-2xl": "4rem",
                        "gutter": "1.5rem",
                        "space-3xl": "6rem",
                        "space-xs": "0.25rem",
                        "gutter-mobile": "1rem",
                        "space-md": "1rem",
                        "space-xl": "2.5rem",
                        "space-lg": "1.5rem",
                        "margin-mobile": "1.25rem",
                        "margin": "2rem",
                        "space-sm": "0.5rem",
                        "margin-desktop": "3rem"
                    },
                    fontFamily: {
                        "headline-xl-mobile": ["Plus Jakarta Sans"],
                        "display-hero-mobile": ["Plus Jakarta Sans"],
                        "body-sm": ["Inter"],
                        "tech-metric-lg": ["Space Mono"],
                        "headline-lg": ["Plus Jakarta Sans"],
                        "headline-sm": ["Plus Jakarta Sans"],
                        "headline-xl": ["Plus Jakarta Sans"],
                        "body-md": ["Inter"],
                        "display-hero": ["Plus Jakarta Sans"],
                        "label-mono": ["Space Mono"],
                        "tech-metric-md": ["Space Mono"],
                        "headline-md": ["Plus Jakarta Sans"],
                        "body-lg": ["Inter"],
                        "label-ui": ["Inter"]
                    },
                    fontSize: {
                        "headline-xl-mobile": ["28px", { lineHeight: "36px", letterSpacing: "-0.02em", fontWeight: "700" }],
                        "display-hero-mobile": ["36px", { lineHeight: "44px", letterSpacing: "-0.02em", fontWeight: "800" }],
                        "body-sm": ["13px", { lineHeight: "20px", fontWeight: "400" }],
                        "tech-metric-lg": ["32px", { lineHeight: "36px", letterSpacing: "-0.03em", fontWeight: "700" }],
                        "headline-lg": ["32px", { lineHeight: "40px", letterSpacing: "-0.02em", fontWeight: "700" }],
                        "headline-sm": ["20px", { lineHeight: "28px", letterSpacing: "-0.01em", fontWeight: "600" }],
                        "headline-xl": ["40px", { lineHeight: "48px", letterSpacing: "-0.025em", fontWeight: "700" }],
                        "body-md": ["15px", { lineHeight: "24px", fontWeight: "400" }],
                        "display-hero": ["56px", { lineHeight: "64px", letterSpacing: "-0.03em", fontWeight: "800" }],
                        "label-mono": ["12px", { lineHeight: "16px", letterSpacing: "0.06em", fontWeight: "500" }],
                        "tech-metric-md": ["20px", { lineHeight: "26px", letterSpacing: "-0.02em", fontWeight: "700" }],
                        "headline-md": ["24px", { lineHeight: "32px", letterSpacing: "-0.015em", fontWeight: "600" }],
                        "body-lg": ["18px", { lineHeight: "28px", fontWeight: "400" }],
                        "label-ui": ["13px", { lineHeight: "18px", letterSpacing: "0.01em", fontWeight: "600" }]
                    }
                }
            }
        };
    </script>
    <?php wp_head(); ?>
    <style id="fg-stitch-typography">
        /* Master Stitch Typography Rules: Override Elementor Kit styles */
        html, body, .elementor-kit-5, .elementor-page {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif !important;
            font-size: 15px !important;
            line-height: 24px !important;
        }
        h1, h2, h3, h4, h5, h6,
        .elementor-kit-5 h1, .elementor-kit-5 h2, .elementor-kit-5 h3,
        .elementor-kit-5 h4, .elementor-kit-5 h5, .elementor-kit-5 h6,
        .elementor-widget-container h1, .elementor-widget-container h2,
        .elementor-widget-container h3, .elementor-widget-container h4,
        .elementor-widget-container h5, .elementor-widget-container h6 {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif !important;
        }
        .font-display-hero, [class*="font-display-hero"] {
            font-family: 'Plus Jakarta Sans', sans-serif !important;
            font-size: 56px !important;
            line-height: 64px !important;
            letter-spacing: -0.03em !important;
            font-weight: 800 !important;
        }
        .font-headline-xl, [class*="font-headline-xl"] {
            font-family: 'Plus Jakarta Sans', sans-serif !important;
            font-size: 40px !important;
            line-height: 48px !important;
            letter-spacing: -0.025em !important;
            font-weight: 700 !important;
        }
        .font-headline-lg, [class*="font-headline-lg"] {
            font-family: 'Plus Jakarta Sans', sans-serif !important;
            font-size: 32px !important;
            line-height: 40px !important;
            letter-spacing: -0.02em !important;
            font-weight: 700 !important;
        }
        .font-headline-md, [class*="font-headline-md"] {
            font-family: 'Plus Jakarta Sans', sans-serif !important;
            font-size: 24px !important;
            line-height: 32px !important;
            letter-spacing: -0.015em !important;
            font-weight: 600 !important;
        }
        .font-headline-sm, [class*="font-headline-sm"] {
            font-family: 'Plus Jakarta Sans', sans-serif !important;
            font-size: 20px !important;
            line-height: 28px !important;
            letter-spacing: -0.01em !important;
            font-weight: 600 !important;
        }
        .font-body-lg, [class*="font-body-lg"] {
            font-family: 'Inter', sans-serif !important;
            font-size: 18px !important;
            line-height: 28px !important;
            font-weight: 400 !important;
        }
        .font-body-md, [class*="font-body-md"] {
            font-family: 'Inter', sans-serif !important;
            font-size: 15px !important;
            line-height: 24px !important;
            font-weight: 400 !important;
        }
        .font-body-sm, [class*="font-body-sm"] {
            font-family: 'Inter', sans-serif !important;
            font-size: 13px !important;
            line-height: 20px !important;
            font-weight: 400 !important;
        }
        .font-label-ui, [class*="font-label-ui"] {
            font-family: 'Inter', sans-serif !important;
            font-size: 13px !important;
            line-height: 18px !important;
            letter-spacing: 0.01em !important;
            font-weight: 600 !important;
        }
        .font-tech-metric-lg, [class*="font-tech-metric-lg"] {
            font-family: 'Space Mono', monospace !important;
            font-size: 32px !important;
            line-height: 36px !important;
            letter-spacing: -0.03em !important;
            font-weight: 700 !important;
        }
        .font-tech-metric-md, [class*="font-tech-metric-md"] {
            font-family: 'Space Mono', monospace !important;
            font-size: 20px !important;
            line-height: 26px !important;
            letter-spacing: -0.02em !important;
            font-weight: 700 !important;
        }
        .font-label-mono, [class*="font-label-mono"] {
            font-family: 'Space Mono', monospace !important;
            font-size: 12px !important;
            line-height: 16px !important;
            letter-spacing: 0.06em !important;
            font-weight: 500 !important;
        }
        /* FAQ Question Typography Override */
        .fg-faq-question,
        #faq h3,
        .fg-faq-item h3,
        [data-faq-trigger] h3 {
            font-family: 'Plus Jakarta Sans', sans-serif !important;
            font-size: 16px !important;
            line-height: 24px !important;
            font-weight: 600 !important;
            letter-spacing: -0.01em !important;
            margin: 0 !important;
        }
        @media (min-width: 640px) {
            .fg-faq-question,
            #faq h3,
            .fg-faq-item h3,
            [data-faq-trigger] h3 {
                font-size: 17px !important;
                line-height: 25px !important;
            }
        }
    </style>
</head>
<body <?php body_class( 'bg-background font-body-md text-on-surface antialiased' ); ?>>
<?php wp_body_open(); ?>

<!-- Header -->
<?php
$fg_sticky         = get_theme_mod( 'fg_header_sticky', true );
$fg_quote_text     = get_theme_mod( 'fg_header_quote_btn_text', 'Request Quote' );
$fg_quote_url      = get_theme_mod( 'fg_header_quote_btn_url', home_url( '/contact/' ) );

$fg_header_logo_url = get_theme_mod( 'fg_header_logo' );
if ( empty( $fg_header_logo_url ) && function_exists( 'has_custom_logo' ) && has_custom_logo() ) {
    $custom_logo_id     = get_theme_mod( 'custom_logo' );
    $fg_header_logo_url = wp_get_attachment_image_url( $custom_logo_id, 'full' );
}
if ( empty( $fg_header_logo_url ) ) {
    $fg_header_logo_url = get_template_directory_uri() . '/assets/images/logo.png';
}
$fg_header_logo_h   = get_theme_mod( 'fg_header_logo_height', '48' );
?>
<header class="<?php echo $fg_sticky ? 'fixed' : 'relative'; ?> top-0 left-0 right-0 z-50 bg-surface-container-lowest/95 backdrop-blur-xl border-b border-surface-container-high/60 shadow-[0_1px_8px_rgba(12,35,64,0.04)]">
    <div class="h-20 w-full px-margin-mobile lg:px-margin-desktop flex items-center justify-between gap-space-md">
        <div class="flex items-center gap-space-lg">
            <a class="flex items-center fg-header-logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <img alt="<?php bloginfo( 'name' ); ?>" class="fg-header-logo object-contain" style="height: <?php echo esc_attr( $fg_header_logo_h ); ?>px; width: auto;" src="<?php echo esc_url( $fg_header_logo_url ); ?>">
            </a>
        </div>
        <nav class="hidden lg:flex items-center gap-6 xl:gap-8">
            <a class="font-label-ui text-label-ui text-on-surface hover:text-primary transition-colors font-medium <?php echo is_front_page() ? 'text-primary font-bold border-b-2 border-primary pb-0.5' : ''; ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
            <a class="font-label-ui text-label-ui text-on-surface hover:text-primary transition-colors font-medium <?php echo is_page( 'ip-transit' ) ? 'text-primary font-bold border-b-2 border-primary pb-0.5' : ''; ?>" href="<?php echo esc_url( home_url( '/ip-transit/' ) ); ?>">IP Transit</a>
            <a class="font-label-ui text-label-ui text-on-surface hover:text-primary transition-colors font-medium <?php echo is_page( 'colocation' ) ? 'text-primary font-bold border-b-2 border-primary pb-0.5' : ''; ?>" href="<?php echo esc_url( home_url( '/colocation/' ) ); ?>">Colocation</a>
            <a class="font-label-ui text-label-ui text-on-surface hover:text-primary transition-colors font-medium <?php echo is_page( 'about-us' ) ? 'text-primary font-bold border-b-2 border-primary pb-0.5' : ''; ?>" href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>">About Us</a>
            <a class="font-label-ui text-label-ui text-on-surface hover:text-primary transition-colors font-medium <?php echo ( is_page( 'blog' ) || is_home() || is_singular( 'post' ) ) ? 'text-primary font-bold border-b-2 border-primary pb-0.5' : ''; ?>" href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">Blog</a>
            <a class="font-label-ui text-label-ui text-on-surface hover:text-primary transition-colors font-medium <?php echo is_page( 'contact' ) ? 'text-primary font-bold border-b-2 border-primary pb-0.5' : ''; ?>" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact</a>
        </nav>
        <div class="flex items-center gap-3 sm:gap-4">
            <a class="fg-quote-btn inline-flex items-center justify-center px-5 py-2.5 rounded-lg bg-optical-blue text-on-primary font-label-ui text-label-ui font-semibold shadow-md hover:bg-primary transition-all" href="<?php echo esc_url( $fg_quote_url ); ?>"><?php echo esc_html( $fg_quote_text ); ?></a>
            
            <!-- Mobile Menu Toggle Button -->
            <button id="fg-mobile-menu-btn" type="button" class="lg:hidden p-2 text-deep-navy hover:text-primary focus:outline-none" aria-label="Toggle navigation">
                <span class="material-symbols-outlined text-[28px]">menu</span>
            </button>
        </div>
    </div>

    <!-- Mobile Drawer Nav -->
    <div id="fg-mobile-menu" class="hidden lg:hidden bg-surface-container-lowest border-b border-surface-container-high px-margin-mobile py-4 space-y-3 shadow-xl">
        <a class="block font-label-ui text-base font-semibold text-on-surface hover:text-primary py-2" href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
        <a class="block font-label-ui text-base font-semibold text-on-surface hover:text-primary py-2" href="<?php echo esc_url( home_url( '/ip-transit/' ) ); ?>">IP Transit</a>
        <a class="block font-label-ui text-base font-semibold text-on-surface hover:text-primary py-2" href="<?php echo esc_url( home_url( '/colocation/' ) ); ?>">Colocation</a>
        <a class="block font-label-ui text-base font-semibold text-on-surface hover:text-primary py-2" href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>">About Us</a>
        <a class="block font-label-ui text-base font-semibold text-on-surface hover:text-primary py-2" href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">Blog</a>
        <a class="block font-label-ui text-base font-semibold text-on-surface hover:text-primary py-2" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact</a>
        <div class="pt-3 border-t border-surface-container-high flex flex-col gap-2">
            <a class="text-center py-2.5 font-label-ui text-sm font-semibold text-white bg-optical-blue rounded-lg" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Request Quote</a>
        </div>
    </div>
</header>

<main class="w-full pt-20 bg-background min-h-screen">
