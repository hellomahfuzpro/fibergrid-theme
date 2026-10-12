<?php
/**
 * Theme Customizer Options & Global Styling Engine
 *
 * Provides comprehensive global customizations:
 * 1. Logos & Branding (Header Logo, Footer Logo, Logo Heights)
 * 2. Brand Colors (Primary Optical Blue, Navy, Accents, Backgrounds)
 * 3. Typography (Heading font, Body font, Monospace font, Font sizes)
 * 4. Header & Navigation controls
 * 5. Footer & Copyright settings
 * 6. NOC & Support contact details
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register Customizer Settings, Controls & Sections
 */
add_action( 'customize_register', function( $wp_customize ) {

    // =========================================================================
    // MASTER PANEL: Global Customization
    // =========================================================================
    $wp_customize->add_panel(
        'fg_theme_customizer_panel',
        array(
            'title'       => esc_html__( 'FiberGrid Global Customization', 'fibergrid' ),
            'description' => esc_html__( 'Manage global brand logos, colors, typography, header, footer, and contacts.', 'fibergrid' ),
            'priority'    => 20,
        )
    );

    // =========================================================================
    // SECTION 1: Logos & Branding (Header & Footer Logos)
    // =========================================================================
    $wp_customize->add_section(
        'fg_logos_section',
        array(
            'title'       => esc_html__( 'Logos & Branding', 'fibergrid' ),
            'description' => esc_html__( 'Upload custom logos for the top header navigation and bottom footer.', 'fibergrid' ),
            'panel'       => 'fg_theme_customizer_panel',
            'priority'    => 5,
        )
    );

    // 1. Header Logo
    $wp_customize->add_setting(
        'fg_header_logo',
        array(
            'default'           => '',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'fg_header_logo',
            array(
                'label'       => esc_html__( 'Header Logo', 'fibergrid' ),
                'description' => esc_html__( 'Upload your main header logo (recommended SVG or transparent PNG, approx 240x60px). Falls back to default FiberGrid logo if empty.', 'fibergrid' ),
                'section'     => 'fg_logos_section',
            )
        )
    );

    // 2. Header Logo Height
    $wp_customize->add_setting(
        'fg_header_logo_height',
        array(
            'default'           => '48',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'fg_header_logo_height',
        array(
            'label'       => esc_html__( 'Header Logo Height (px)', 'fibergrid' ),
            'description' => esc_html__( 'Control the render height of the header logo in pixels (default 48px).', 'fibergrid' ),
            'section'     => 'fg_logos_section',
            'type'        => 'number',
            'input_attrs' => array(
                'min'  => 24,
                'max'  => 120,
                'step' => 1,
            ),
        )
    );

    // 3. Footer Logo
    $wp_customize->add_setting(
        'fg_footer_logo',
        array(
            'default'           => '',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'fg_footer_logo',
            array(
                'label'       => esc_html__( 'Footer Logo', 'fibergrid' ),
                'description' => esc_html__( 'Upload an alternate logo for the footer (e.g., white or monochrome). If left empty, the Header Logo will be used.', 'fibergrid' ),
                'section'     => 'fg_logos_section',
            )
        )
    );

    // 4. Footer Logo Height
    $wp_customize->add_setting(
        'fg_footer_logo_height',
        array(
            'default'           => '44',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'fg_footer_logo_height',
        array(
            'label'       => esc_html__( 'Footer Logo Height (px)', 'fibergrid' ),
            'description' => esc_html__( 'Control the render height of the footer logo in pixels (default 44px).', 'fibergrid' ),
            'section'     => 'fg_logos_section',
            'type'        => 'number',
            'input_attrs' => array(
                'min'  => 20,
                'max'  => 120,
                'step' => 1,
            ),
        )
    );

    // =========================================================================
    // SECTION 2: Brand Colors & Palette
    // =========================================================================
    $wp_customize->add_section(
        'fg_colors_section',
        array(
            'title'    => esc_html__( 'Brand Colors & Palette', 'fibergrid' ),
            'panel'    => 'fg_theme_customizer_panel',
            'priority' => 10,
        )
    );

    // 1. Primary Brand / Optical Blue
    $wp_customize->add_setting(
        'fg_color_primary',
        array(
            'default'           => '#0066FF',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'fg_color_primary',
            array(
                'label'       => esc_html__( 'Primary Brand Color', 'fibergrid' ),
                'description' => esc_html__( 'Used for buttons, optical accents, active states, and links.', 'fibergrid' ),
                'section'     => 'fg_colors_section',
            )
        )
    );

    // 2. Primary Dark / Hover Color
    $wp_customize->add_setting(
        'fg_color_primary_hover',
        array(
            'default'           => '#0050cb',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'fg_color_primary_hover',
            array(
                'label'       => esc_html__( 'Primary Hover Color', 'fibergrid' ),
                'description' => esc_html__( 'Hover state for primary buttons and interactive elements.', 'fibergrid' ),
                'section'     => 'fg_colors_section',
            )
        )
    );

    // 3. Deep Navy / Headings Color
    $wp_customize->add_setting(
        'fg_color_navy',
        array(
            'default'           => '#0b1c30',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'fg_color_navy',
            array(
                'label'       => esc_html__( 'Deep Navy (Headings & Dark Text)', 'fibergrid' ),
                'description' => esc_html__( 'Used for main titles, cards, and dark accents.', 'fibergrid' ),
                'section'     => 'fg_colors_section',
            )
        )
    );

    // 4. Secondary / Muted Text Color
    $wp_customize->add_setting(
        'fg_color_secondary',
        array(
            'default'           => '#4b5f7f',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'fg_color_secondary',
            array(
                'label'       => esc_html__( 'Secondary Text Color', 'fibergrid' ),
                'description' => esc_html__( 'Used for subtitles, descriptions, and muted labels.', 'fibergrid' ),
                'section'     => 'fg_colors_section',
            )
        )
    );

    // 5. Surface Ice / Light Card Tint
    $wp_customize->add_setting(
        'fg_color_surface_ice',
        array(
            'default'           => '#F4F8FF',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'fg_color_surface_ice',
            array(
                'label'       => esc_html__( 'Surface Ice (Light Background)', 'fibergrid' ),
                'description' => esc_html__( 'Used for alternating sections and subtle card backgrounds.', 'fibergrid' ),
                'section'     => 'fg_colors_section',
            )
        )
    );

    // 6. Grid Lines & Borders Color
    $wp_customize->add_setting(
        'fg_color_border',
        array(
            'default'           => '#E2E8F0',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'fg_color_border',
            array(
                'label'       => esc_html__( 'Grid Line & Border Color', 'fibergrid' ),
                'description' => esc_html__( 'Used for dividers, table borders, and card outlines.', 'fibergrid' ),
                'section'     => 'fg_colors_section',
            )
        )
    );

    // 7. Route Orange Accent
    $wp_customize->add_setting(
        'fg_color_route_orange',
        array(
            'default'           => '#FF5E14',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'fg_color_route_orange',
            array(
                'label'       => esc_html__( 'Route Orange Accent', 'fibergrid' ),
                'description' => esc_html__( 'Used for live telemetry indicators and high-priority badges.', 'fibergrid' ),
                'section'     => 'fg_colors_section',
            )
        )
    );

    // 8. Cyan Pulse Accent
    $wp_customize->add_setting(
        'fg_color_cyan_pulse',
        array(
            'default'           => '#06B6D4',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'fg_color_cyan_pulse',
            array(
                'label'       => esc_html__( 'Cyan Metric Pulse Accent', 'fibergrid' ),
                'description' => esc_html__( 'Used for network throughput and speed accents.', 'fibergrid' ),
                'section'     => 'fg_colors_section',
            )
        )
    );

    // =========================================================================
    // SECTION 3: Global Typography & Fonts
    // =========================================================================
    $wp_customize->add_section(
        'fg_typography_section',
        array(
            'title'    => esc_html__( 'Global Typography & Fonts', 'fibergrid' ),
            'panel'    => 'fg_theme_customizer_panel',
            'priority' => 20,
        )
    );

    $heading_fonts = array(
        'Plus Jakarta Sans' => 'Plus Jakarta Sans (Default Stitch Spec)',
        'Montserrat'       => 'Montserrat (Clean Geometric)',
        'Inter'             => 'Inter (Clean Technical)',
        'Poppins'           => 'Poppins (Bold Geometric)',
        'Roboto'            => 'Roboto (Universal Modern)',
        'Outfit'            => 'Outfit (Contemporary Tech)',
        'Space Grotesk'     => 'Space Grotesk (Cyber Tech)',
        'Manrope'           => 'Manrope (Corporate Modern)',
        'Urbanist'          => 'Urbanist (Minimal Sans)',
        'Cinzel'            => 'Cinzel (Editorial Serif)',
    );

    $body_fonts = array(
        'Inter'             => 'Inter (Default Stitch Spec)',
        'Montserrat'       => 'Montserrat (Geometric)',
        'Roboto'            => 'Roboto (Universal)',
        'Open Sans'         => 'Open Sans (Neutral)',
        'Plus Jakarta Sans' => 'Plus Jakarta Sans',
        'Poppins'           => 'Poppins',
        'Lato'              => 'Lato',
        'Nunito Sans'       => 'Nunito Sans',
    );

    $mono_fonts = array(
        'Space Mono'     => 'Space Mono (Default Tech Spec)',
        'Fira Code'      => 'Fira Code',
        'JetBrains Mono' => 'JetBrains Mono',
        'Roboto Mono'    => 'Roboto Mono',
        'Courier New'    => 'Courier New (System)',
    );

    // Heading Font Family
    $wp_customize->add_setting(
        'fg_font_heading',
        array(
            'default'           => 'Plus Jakarta Sans',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'fg_font_heading',
        array(
            'label'       => esc_html__( 'Headings Font Family', 'fibergrid' ),
            'description' => esc_html__( 'Applies to H1-H6, Hero banners, section titles, and card headers.', 'fibergrid' ),
            'section'     => 'fg_typography_section',
            'type'        => 'select',
            'choices'     => $heading_fonts,
        )
    );

    // Body Font Family
    $wp_customize->add_setting(
        'fg_font_body',
        array(
            'default'           => 'Inter',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'fg_font_body',
        array(
            'label'       => esc_html__( 'Body & Paragraph Font Family', 'fibergrid' ),
            'description' => esc_html__( 'Applies to body text, paragraphs, buttons, lists, and forms.', 'fibergrid' ),
            'section'     => 'fg_typography_section',
            'type'        => 'select',
            'choices'     => $body_fonts,
        )
    );

    // Monospace Font Family
    $wp_customize->add_setting(
        'fg_font_mono',
        array(
            'default'           => 'Space Mono',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'fg_font_mono',
        array(
            'label'       => esc_html__( 'Tech Metric & Monospace Font', 'fibergrid' ),
            'description' => esc_html__( 'Applies to ping stats, IP blocks, telemetry specs, and code.', 'fibergrid' ),
            'section'     => 'fg_typography_section',
            'type'        => 'select',
            'choices'     => $mono_fonts,
        )
    );

    // Base Body Font Size
    $wp_customize->add_setting(
        'fg_font_body_size',
        array(
            'default'           => '15px',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'fg_font_body_size',
        array(
            'label'       => esc_html__( 'Base Body Font Size', 'fibergrid' ),
            'description' => esc_html__( 'Default size for body text and paragraphs across the site.', 'fibergrid' ),
            'section'     => 'fg_typography_section',
            'type'        => 'select',
            'choices'     => array(
                '14px' => '14px (Compact)',
                '15px' => '15px (Stitch Default)',
                '16px' => '16px (Comfortable)',
                '17px' => '17px (Large)',
            ),
        )
    );

    // FAQ Question Size
    $wp_customize->add_setting(
        'fg_faq_question_size',
        array(
            'default'           => '17px',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'fg_faq_question_size',
        array(
            'label'       => esc_html__( 'FAQ Question Font Size', 'fibergrid' ),
            'description' => esc_html__( 'Desktop font size for FAQ questions across all section widgets.', 'fibergrid' ),
            'section'     => 'fg_typography_section',
            'type'        => 'select',
            'choices'     => array(
                '15px' => '15px (Compact)',
                '16px' => '16px (Standard)',
                '17px' => '17px (Proportional Default)',
                '18px' => '18px (Prominent)',
                '20px' => '20px (Large)',
            ),
        )
    );

    // =========================================================================
    // SECTION 4: Header & Navigation
    // =========================================================================
    $wp_customize->add_section(
        'fg_header_section',
        array(
            'title'    => esc_html__( 'Header & Navigation', 'fibergrid' ),
            'panel'    => 'fg_theme_customizer_panel',
            'priority' => 30,
        )
    );

    // Customer Portal Text
    $wp_customize->add_setting(
        'fg_header_client_portal_text',
        array(
            'default'           => 'Customer Portal',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'fg_header_client_portal_text',
        array(
            'label'   => esc_html__( 'Customer Portal Link Text', 'fibergrid' ),
            'section' => 'fg_header_section',
            'type'    => 'text',
        )
    );

    // Customer Portal URL
    $wp_customize->add_setting(
        'fg_header_client_portal_url',
        array(
            'default'           => home_url( '/contact/#portal' ),
            'transport'         => 'refresh',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        'fg_header_client_portal_url',
        array(
            'label'   => esc_html__( 'Customer Portal Link URL', 'fibergrid' ),
            'section' => 'fg_header_section',
            'type'    => 'url',
        )
    );

    // CTA Button Text
    $wp_customize->add_setting(
        'fg_header_quote_btn_text',
        array(
            'default'           => 'Request Quote',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'fg_header_quote_btn_text',
        array(
            'label'   => esc_html__( 'Header CTA Button Text', 'fibergrid' ),
            'section' => 'fg_header_section',
            'type'    => 'text',
        )
    );

    // CTA Button URL
    $wp_customize->add_setting(
        'fg_header_quote_btn_url',
        array(
            'default'           => home_url( '/contact/' ),
            'transport'         => 'refresh',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        'fg_header_quote_btn_url',
        array(
            'label'   => esc_html__( 'Header CTA Button URL', 'fibergrid' ),
            'section' => 'fg_header_section',
            'type'    => 'url',
        )
    );

    // Sticky Header
    $wp_customize->add_setting(
        'fg_header_sticky',
        array(
            'default'           => true,
            'transport'         => 'refresh',
            'sanitize_callback' => 'wp_validate_boolean',
        )
    );
    $wp_customize->add_control(
        'fg_header_sticky',
        array(
            'label'   => esc_html__( 'Enable Sticky Glassmorphism Header', 'fibergrid' ),
            'section' => 'fg_header_section',
            'type'    => 'checkbox',
        )
    );

    // =========================================================================
    // SECTION 5: Footer Settings & Copyright
    // =========================================================================
    $wp_customize->add_section(
        'fg_footer_section',
        array(
            'title'    => esc_html__( 'Footer Settings & Copyright', 'fibergrid' ),
            'panel'    => 'fg_theme_customizer_panel',
            'priority' => 40,
        )
    );

    // Footer Description Tagline
    $wp_customize->add_setting(
        'fg_footer_tagline',
        array(
            'default'           => 'We are a network operator providing high-throughput IP transit and carrier-grade colocation to ISPs, content providers, and enterprises worldwide.',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_textarea_field',
        )
    );
    $wp_customize->add_control(
        'fg_footer_tagline',
        array(
            'label'       => esc_html__( 'Footer Description / Tagline', 'fibergrid' ),
            'description' => esc_html__( 'Text displayed directly underneath the footer logo.', 'fibergrid' ),
            'section'     => 'fg_footer_section',
            'type'        => 'textarea',
        )
    );

    // Footer Copyright
    $wp_customize->add_setting(
        'fg_footer_copyright',
        array(
            'default'           => 'Copyright © 2007-2026 FiberGrid (Pty) Ltd. All Rights Reserved.',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'fg_footer_copyright',
        array(
            'label'   => esc_html__( 'Footer Copyright Notice', 'fibergrid' ),
            'section' => 'fg_footer_section',
            'type'    => 'text',
        )
    );

    // Footer Registered Subtext
    $wp_customize->add_setting(
        'fg_footer_subtext',
        array(
            'default'           => 'Registered in England and Wales / South Africa. All prices displayed exclude VAT.',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'fg_footer_subtext',
        array(
            'label'   => esc_html__( 'Footer Legal Subtext', 'fibergrid' ),
            'section' => 'fg_footer_section',
            'type'    => 'text',
        )
    );

    // =========================================================================
    // SECTION 6: Operations & Facility Dispatch
    // =========================================================================
    $wp_customize->add_section(
        'fg_contact_section',
        array(
            'title'    => esc_html__( 'Operations & Facility Dispatch', 'fibergrid' ),
            'panel'    => 'fg_theme_customizer_panel',
            'priority' => 50,
        )
    );

    // Primary Facility Address
    $wp_customize->add_setting(
        'fg_primary_address',
        array(
            'default'           => '77 Paul Kruger St, Pretoria, Gauteng, 0002',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'fg_primary_address',
        array(
            'label'   => esc_html__( 'Primary Facility Address', 'fibergrid' ),
            'section' => 'fg_contact_section',
            'type'    => 'text',
        )
    );

    // Customer Portal / Ticket Queue URL
    $wp_customize->add_setting(
        'fg_dispatch_portal_url',
        array(
            'default'           => home_url( '/contact/#portal' ),
            'transport'         => 'postMessage',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        'fg_dispatch_portal_url',
        array(
            'label'   => esc_html__( 'Customer Portal / Ticket Queue URL', 'fibergrid' ),
            'section' => 'fg_contact_section',
            'type'    => 'url',
        )
    );

} );

/**
 * Enqueue Live Preview JS in Customizer
 */
add_action( 'customize_preview_init', function() {
    wp_enqueue_script(
        'fg-customizer-preview',
        get_template_directory_uri() . '/assets/js/customizer-preview.js',
        array( 'customize-preview', 'jquery' ),
        FIBERGRID_VERSION,
        true
    );
} );

/**
 * Dynamically Enqueue Google Fonts based on Customizer Selections
 */
add_action( 'wp_enqueue_scripts', function() {
    $font_heading = get_theme_mod( 'fg_font_heading', 'Plus Jakarta Sans' );
    $font_body    = get_theme_mod( 'fg_font_body', 'Inter' );
    $font_mono    = get_theme_mod( 'fg_font_mono', 'Space Mono' );

    $fonts = array_unique( array_filter( array( $font_heading, $font_body, $font_mono ) ) );
    $system_fonts = array( 'Courier New', 'system-ui', 'monospace', 'sans-serif', 'serif' );

    $families = array();
    foreach ( $fonts as $font ) {
        if ( in_array( $font, $system_fonts, true ) ) {
            continue;
        }
        $name = str_replace( ' ', '+', $font );
        if ( stripos( $font, 'mono' ) !== false || stripos( $font, 'code' ) !== false ) {
            $families[] = 'family=' . $name . ':wght@400;500;700';
        } else {
            $families[] = 'family=' . $name . ':wght@400;500;600;700;800;900';
        }
    }

    if ( ! empty( $families ) ) {
        $google_url = 'https://fonts.googleapis.com/css2?' . implode( '&', $families ) . '&display=swap';
        wp_enqueue_style( 'fg-google-customizer-fonts', $google_url, array(), null );
    }
}, 5 );

/**
 * Output Dynamic Global CSS Overrides in wp_head
 */
add_action( 'wp_head', function() {
    // Values from Customizer
    $primary       = get_theme_mod( 'fg_color_primary', '#0066FF' );
    $primary_hover = get_theme_mod( 'fg_color_primary_hover', '#0050cb' );
    $navy          = get_theme_mod( 'fg_color_navy', '#0b1c30' );
    $secondary     = get_theme_mod( 'fg_color_secondary', '#4b5f7f' );
    $surface_ice   = get_theme_mod( 'fg_color_surface_ice', '#F4F8FF' );
    $border        = get_theme_mod( 'fg_color_border', '#E2E8F0' );
    $route_orange  = get_theme_mod( 'fg_color_route_orange', '#FF5E14' );
    $cyan_pulse    = get_theme_mod( 'fg_color_cyan_pulse', '#06B6D4' );

    $font_heading  = get_theme_mod( 'fg_font_heading', 'Plus Jakarta Sans' );
    $font_body     = get_theme_mod( 'fg_font_body', 'Inter' );
    $font_mono     = get_theme_mod( 'fg_font_mono', 'Space Mono' );
    $body_size     = get_theme_mod( 'fg_font_body_size', '15px' );
    $faq_size      = get_theme_mod( 'fg_faq_question_size', '17px' );

    $header_logo_h = get_theme_mod( 'fg_header_logo_height', '48' );
    $footer_logo_h = get_theme_mod( 'fg_footer_logo_height', '44' );

    ?>
    <style id="fg-global-customizer-css">
        :root {
            --fg-primary: <?php echo esc_attr( $primary ); ?>;
            --fg-primary-dark: <?php echo esc_attr( $primary_hover ); ?>;
            --fg-navy: <?php echo esc_attr( $navy ); ?>;
            --fg-secondary: <?php echo esc_attr( $secondary ); ?>;
            --fg-surface-ice: <?php echo esc_attr( $surface_ice ); ?>;
            --fg-border: <?php echo esc_attr( $border ); ?>;
            --fg-route-orange: <?php echo esc_attr( $route_orange ); ?>;
            --fg-cyan-pulse: <?php echo esc_attr( $cyan_pulse ); ?>;
            --fg-font-heading: '<?php echo esc_attr( $font_heading ); ?>', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            --fg-font-body: '<?php echo esc_attr( $font_body ); ?>', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            --fg-font-mono: '<?php echo esc_attr( $font_mono ); ?>', monospace;
            --fg-body-size: <?php echo esc_attr( $body_size ); ?>;
            --fg-faq-size: <?php echo esc_attr( $faq_size ); ?>;
            --fg-header-logo-height: <?php echo esc_attr( $header_logo_h ); ?>px;
            --fg-footer-logo-height: <?php echo esc_attr( $footer_logo_h ); ?>px;
        }

        /* Logo Sizing */
        .fg-header-logo {
            height: var(--fg-header-logo-height) !important;
            width: auto !important;
            max-width: 280px !important;
        }
        .fg-footer-logo {
            height: var(--fg-footer-logo-height) !important;
            width: auto !important;
            max-width: 280px !important;
        }

        /* 1. Global Headings Font Family Override */
        h1, h2, h3, h4, h5, h6,
        .font-headline-xl, [class*="font-headline-xl"],
        .font-headline-lg, [class*="font-headline-lg"],
        .font-headline-md, [class*="font-headline-md"],
        .font-headline-sm, [class*="font-headline-sm"],
        .font-display-hero, [class*="font-display-hero"],
        .elementor-kit-5 h1, .elementor-kit-5 h2, .elementor-kit-5 h3,
        .elementor-kit-5 h4, .elementor-kit-5 h5, .elementor-kit-5 h6,
        .elementor-widget-heading .elementor-heading-title {
            font-family: var(--fg-font-heading) !important;
        }

        /* 2. Global Body & Text Font Family & Size Override */
        html, body, .elementor-kit-5, .elementor-page,
        p, li, input, select, textarea, button,
        .font-body-lg, .font-body-md, .font-body-sm, .font-label-ui {
            font-family: var(--fg-font-body) !important;
        }
        body, p, li, .font-body-md {
            font-size: var(--fg-body-size) !important;
        }

        /* 3. Tech Metric & Monospace Font Family Override */
        .font-tech-metric-lg, [class*="font-tech-metric-lg"],
        .font-tech-metric-md, [class*="font-tech-metric-md"],
        .font-label-mono, [class*="font-label-mono"],
        .font-mono, code, pre {
            font-family: var(--fg-font-mono) !important;
        }

        /* 4. Global Brand Colors Overrides */
        .text-optical-blue,
        .text-primary,
        [class*="text-optical-blue"] {
            color: var(--fg-primary) !important;
        }
        .bg-optical-blue,
        .bg-primary,
        .bg-primary-container,
        [class*="bg-optical-blue"] {
            background-color: var(--fg-primary) !important;
        }
        .border-optical-blue,
        .border-primary {
            border-color: var(--fg-primary) !important;
        }
        .hover\:bg-primary:hover,
        .hover\:bg-optical-blue:hover {
            background-color: var(--fg-primary-dark) !important;
        }
        .text-deep-navy,
        .text-on-surface {
            color: var(--fg-navy) !important;
        }
        .bg-deep-navy {
            background-color: var(--fg-navy) !important;
        }
        .text-secondary,
        .text-on-surface-variant {
            color: var(--fg-secondary) !important;
        }
        .border-grid-line {
            border-color: var(--fg-border) !important;
        }
        .bg-surface-ice {
            background-color: var(--fg-surface-ice) !important;
        }

        /* 5. Scoped FAQ Question Size & Font Override */
        .fg-faq-question,
        #faq h3,
        .fg-faq-item h3,
        [data-faq-trigger] h3 {
            font-family: var(--fg-font-heading) !important;
            font-size: var(--fg-faq-size) !important;
            line-height: calc(var(--fg-faq-size) + 8px) !important;
            font-weight: 600 !important;
        }
    </style>
    <?php
}, 99 );
