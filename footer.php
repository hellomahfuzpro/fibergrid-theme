<?php
/**
 * Footer template
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Helper function to render an editable footer column
 */
if ( ! function_exists( 'fg_render_footer_column' ) ) {
    function fg_render_footer_column( $col_index, $default_title, $default_links, $sidebar_id, $menu_location ) {
        // 1. If sidebar has active widgets, render sidebar
        if ( is_active_sidebar( $sidebar_id ) ) {
            dynamic_sidebar( $sidebar_id );
            return;
        }

        // 2. Output Column Title
        $title = get_theme_mod( "fg_footer_col{$col_index}_title", $default_title );
        echo '<h4 class="text-sm font-bold text-[#0b1c30]">' . esc_html( $title ) . '</h4>';

        // 3. If a custom WP menu is assigned to this location, render it
        if ( has_nav_menu( $menu_location ) ) {
            wp_nav_menu(
                array(
                    'theme_location' => $menu_location,
                    'container'      => 'nav',
                    'container_class'=> 'fg-footer-nav flex flex-col gap-2.5 text-sm text-on-surface-variant',
                    'menu_class'     => 'flex flex-col gap-2.5',
                    'fallback_cb'    => false,
                    'depth'          => 1,
                    'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                )
            );
            return;
        }

        // 4. If Customizer custom links textarea has content
        $custom_links_raw = get_theme_mod( "fg_footer_col{$col_index}_links" );
        if ( ! empty( $custom_links_raw ) ) {
            $lines = explode( "\n", str_replace( "\r", "", $custom_links_raw ) );
            echo '<nav class="fg-footer-nav flex flex-col gap-2.5 text-sm text-on-surface-variant">';
            foreach ( $lines as $line ) {
                $line = trim( $line );
                if ( empty( $line ) ) continue;
                $parts = explode( '|', $line );
                $label = trim( $parts[0] );
                $url   = isset( $parts[1] ) ? trim( $parts[1] ) : '#';
                if ( strpos( $url, 'http' ) !== 0 && strpos( $url, '/' ) !== 0 && strpos( $url, '#' ) !== 0 ) {
                    $url = home_url( '/' . ltrim( $url, '/' ) );
                }
                $is_external = strpos( $url, 'http' ) === 0 && strpos( $url, home_url() ) === false;
                echo '<a class="hover:text-primary transition-colors' . ( $is_external ? ' flex items-center gap-1.5' : '' ) . '" href="' . esc_url( $url ) . '"' . ( $is_external ? ' target="_blank" rel="noopener noreferrer"' : '' ) . '>';
                echo esc_html( $label );
                if ( $is_external ) {
                    echo '<span class="material-symbols-outlined text-[13px] text-outline">open_in_new</span>';
                }
                echo '</a>';
            }
            echo '</nav>';
            return;
        }

        // 5. Default curated fallback links
        echo '<nav class="fg-footer-nav flex flex-col gap-2.5 text-sm text-on-surface-variant">';
        foreach ( $default_links as $item ) {
            $is_external = ! empty( $item['external'] );
            $url = $item['url'];
            if ( strpos( $url, 'http' ) !== 0 ) {
                $url = home_url( $url );
            }
            echo '<a class="hover:text-primary transition-colors' . ( $is_external ? ' flex items-center gap-1.5' : '' ) . '" href="' . esc_url( $url ) . '"' . ( $is_external ? ' target="_blank" rel="noopener noreferrer"' : '' ) . '>';
            if ( ! empty( $item['status_dot'] ) ) {
                echo '<span class="w-1.5 h-1.5 rounded-full bg-status-healthy"></span>';
            }
            echo '<span>' . esc_html( $item['label'] ) . '</span>';
            if ( $is_external && empty( $item['status_dot'] ) ) {
                echo '<span class="material-symbols-outlined text-[13px] text-outline">open_in_new</span>';
            }
            echo '</a>';
        }
        echo '</nav>';
    }
}

$fg_col1_defaults = array(
    array( 'label' => 'IP Transit', 'url' => '/ip-transit/' ),
    array( 'label' => 'Enterprise Colocation', 'url' => '/colocation/' ),
    array( 'label' => 'Global Network Reach', 'url' => '/#global-presence' ),
    array( 'label' => 'Custom Bandwidth Commit', 'url' => '/contact/' ),
    array( 'label' => '24/7 Operations Desk', 'url' => '/contact/' ),
);

$fg_col2_defaults = array(
    array( 'label' => 'PeeringDB', 'url' => 'https://www.peeringdb.com/', 'external' => true ),
    array( 'label' => 'Looking Glass', 'url' => '/ip-transit/#looking-glass' ),
    array( 'label' => 'Peering Policy', 'url' => '/ip-transit/#peering-policy' ),
    array( 'label' => 'BGP Communities', 'url' => '/ip-transit/#bgp-communities' ),
    array( 'label' => 'Acceptable Use Policy (AUP)', 'url' => '/aup/' ),
    array( 'label' => 'Abuse Contact', 'url' => '/contact/#abuse' ),
    array( 'label' => 'Network Status', 'url' => 'https://status.fibergrid.co.za', 'external' => true, 'status_dot' => true ),
);

$fg_col3_defaults = array(
    array( 'label' => 'Company Overview', 'url' => '/about-us/' ),
    array( 'label' => 'Data Centers & PoPs', 'url' => '/about-us/#presence' ),
    array( 'label' => 'Engineering Blog', 'url' => '/blog/' ),
    array( 'label' => 'Contact Engineering', 'url' => '/contact/' ),
);
?>
</main>

<!-- Main Footer -->
<footer class="w-full bg-white pt-16 pb-12 text-[#0b1c30] border-t border-[#e2e8f0]">
    <div class="w-full px-margin-mobile lg:px-margin-desktop max-w-[1360px] mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10 lg:gap-8 mb-14">
            <div class="lg:col-span-4 flex flex-col gap-5">
                <?php
                $fg_footer_logo_url = get_theme_mod( 'fg_footer_logo' );
                if ( empty( $fg_footer_logo_url ) ) {
                    $fg_footer_logo_url = get_theme_mod( 'fg_header_logo' );
                }
                if ( empty( $fg_footer_logo_url ) && function_exists( 'has_custom_logo' ) && has_custom_logo() ) {
                    $custom_logo_id     = get_theme_mod( 'custom_logo' );
                    $fg_footer_logo_url = wp_get_attachment_image_url( $custom_logo_id, 'full' );
                }
                if ( empty( $fg_footer_logo_url ) ) {
                    $fg_footer_logo_url = get_template_directory_uri() . '/assets/images/logo.png';
                }
                $fg_footer_logo_h   = get_theme_mod( 'fg_footer_logo_height', '44' );
                $fg_footer_tagline  = get_theme_mod( 'fg_footer_tagline', "We are a network operator providing high-throughput IP transit and carrier-grade colocation to ISPs, content providers, and enterprises worldwide." );
                ?>
                <a class="flex items-center fg-footer-logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img alt="<?php bloginfo( 'name' ); ?>" class="fg-footer-logo object-contain" style="height: <?php echo esc_attr( $fg_footer_logo_h ); ?>px; width: auto;" src="<?php echo esc_url( $fg_footer_logo_url ); ?>">
                </a>
                <p class="fg-footer-tagline text-sm text-on-surface-variant leading-relaxed pr-4">
                    <?php echo esc_html( $fg_footer_tagline ); ?>
                </p>
                <div class="flex items-center gap-2.5 pt-2 flex-wrap">
                    <div class="h-8 w-12 rounded border border-[#e2e8f0] bg-white flex items-center justify-center shadow-sm">
                        <span class="font-black italic text-[#0050cb] text-xs tracking-tighter">VISA</span>
                    </div>
                    <div class="h-8 w-12 rounded border border-[#e2e8f0] bg-[#006fcf] text-white flex flex-col items-center justify-center shadow-sm leading-none p-0.5">
                        <span class="text-[7px] font-black uppercase tracking-tighter text-center">AMERICAN EXPRESS</span>
                    </div>
                    <div class="h-8 w-12 rounded border border-[#e2e8f0] bg-white flex items-center justify-center shadow-sm relative">
                        <span class="w-3.5 h-3.5 rounded-full bg-[#EB001B] opacity-90 -mr-1"></span>
                        <span class="w-3.5 h-3.5 rounded-full bg-[#F79E1B] opacity-90"></span>
                    </div>
                    <div class="h-8 w-12 rounded border border-[#e2e8f0] bg-white flex items-center justify-center shadow-sm p-1">
                        <div class="bg-[#e60012] text-white text-[8px] font-bold px-1 rounded-sm">UnionPay</div>
                    </div>
                    <div class="h-8 w-12 rounded border border-[#e2e8f0] bg-white flex items-center justify-center shadow-sm">
                        <div class="flex h-4 w-7 rounded overflow-hidden text-[7px] font-black leading-none">
                            <span class="bg-[#003B99] text-white flex-1 flex items-center justify-center">J</span>
                            <span class="bg-[#DA291C] text-white flex-1 flex items-center justify-center">C</span>
                            <span class="bg-[#007A3D] text-white flex-1 flex items-center justify-center">B</span>
                        </div>
                    </div>
                </div>
                <?php if ( is_active_sidebar( 'footer-brand' ) ) : ?>
                    <div class="fg-footer-brand-widget pt-2">
                        <?php dynamic_sidebar( 'footer-brand' ); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="lg:col-span-3 flex flex-col gap-3 fg-footer-col">
                <?php fg_render_footer_column( 1, 'Core Solutions', $fg_col1_defaults, 'footer-col-1', 'footer_col_1' ); ?>
            </div>
            <div class="lg:col-span-3 flex flex-col gap-3 fg-footer-col">
                <?php fg_render_footer_column( 2, 'Network & Resources', $fg_col2_defaults, 'footer-col-2', 'footer_col_2' ); ?>
            </div>
            <div class="lg:col-span-2 flex flex-col gap-3 fg-footer-col">
                <?php fg_render_footer_column( 3, 'Company', $fg_col3_defaults, 'footer-col-3', 'footer_col_3' ); ?>
            </div>
        </div>
        <div class="pt-8 border-t border-[#e2e8f0] flex flex-col items-center justify-center text-center gap-1.5 text-xs text-on-surface-variant">
            <div class="fg-footer-copyright"><?php echo esc_html( get_theme_mod( 'fg_footer_copyright', 'Copyright © 2007-' . date('Y') . ' FiberGrid (Pty) Ltd. All Rights Reserved.' ) ); ?></div>
            <div class="fg-footer-subtext text-outline"><?php echo esc_html( get_theme_mod( 'fg_footer_subtext', 'Registered in England and Wales / South Africa. All prices displayed exclude VAT.' ) ); ?></div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
