<?php
/**
 * Footer template
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
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
            </div>
            <div class="lg:col-span-3 flex flex-col gap-3">
                <h4 class="text-sm font-bold text-[#0b1c30]">Core Solutions</h4>
                <nav class="flex flex-col gap-2.5 text-sm text-on-surface-variant">
                    <a class="hover:text-primary transition-colors" href="<?php echo esc_url( home_url( '/ip-transit/' ) ); ?>">IP Transit (AS328224)</a>
                    <a class="hover:text-primary transition-colors" href="<?php echo esc_url( home_url( '/colocation/' ) ); ?>">Enterprise Colocation</a>
                    <a class="hover:text-primary transition-colors" href="<?php echo esc_url( home_url( '/#global-presence' ) ); ?>">Global Network Reach</a>
                    <a class="hover:text-primary transition-colors" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Custom Bandwidth Commit</a>
                    <a class="hover:text-primary transition-colors" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">24/7 Operations Desk</a>
                </nav>
            </div>
            <div class="lg:col-span-3 flex flex-col gap-3">
                <h4 class="text-sm font-bold text-[#0b1c30]">Network &amp; Resources</h4>
                <nav class="flex flex-col gap-2.5 text-sm text-on-surface-variant">
                    <a class="hover:text-primary transition-colors flex items-center gap-1.5" href="https://www.peeringdb.com/net/328224" target="_blank" rel="noopener noreferrer">
                        <span>PeeringDB</span>
                        <span class="material-symbols-outlined text-[13px] text-outline">open_in_new</span>
                    </a>
                    <a class="hover:text-primary transition-colors" href="<?php echo esc_url( home_url( '/ip-transit/#looking-glass' ) ); ?>">Looking Glass</a>
                    <a class="hover:text-primary transition-colors" href="<?php echo esc_url( home_url( '/ip-transit/#peering-policy' ) ); ?>">Peering Policy</a>
                    <a class="hover:text-primary transition-colors" href="<?php echo esc_url( home_url( '/ip-transit/#bgp-communities' ) ); ?>">BGP Communities</a>
                    <a class="hover:text-primary transition-colors" href="<?php echo esc_url( home_url( '/aup/' ) ); ?>">Acceptable Use Policy (AUP)</a>
                    <a class="hover:text-primary transition-colors" href="<?php echo esc_url( home_url( '/contact/#abuse' ) ); ?>">Abuse Contact</a>
                    <a class="hover:text-primary transition-colors flex items-center gap-1.5" href="https://status.fibergrid.co.za" target="_blank" rel="noopener noreferrer">
                        <span class="w-1.5 h-1.5 rounded-full bg-status-healthy"></span>
                        <span>Network Status</span>
                    </a>
                </nav>
            </div>
            <div class="lg:col-span-2 flex flex-col gap-3">
                <h4 class="text-sm font-bold text-[#0b1c30]">Company &amp; Access</h4>
                <nav class="flex flex-col gap-2.5 text-sm text-on-surface-variant">
                    <a class="hover:text-primary transition-colors" href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>">Company Overview</a>
                    <a class="hover:text-primary transition-colors" href="<?php echo esc_url( home_url( '/about-us/#presence' ) ); ?>">Data Centers &amp; PoPs</a>
                    <a class="hover:text-primary transition-colors" href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">Engineering Blog</a>
                    <a class="hover:text-primary transition-colors" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact Engineering</a>
                    <a class="hover:text-primary transition-colors font-semibold text-deep-navy" href="<?php echo esc_url( get_theme_mod( 'fg_header_client_portal_url', home_url( '/contact/#portal' ) ) ); ?>">Customer Portal</a>
                </nav>
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
