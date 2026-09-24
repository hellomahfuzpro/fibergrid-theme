<?php
/**
 * FiberGrid — Theme Footer
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$footer_tagline   = get_theme_mod( 'fg_footer_tagline', 'Ultra Low-Latency IP Transit & Global Data Center Infrastructure.' );
$footer_noc_phone = get_theme_mod( 'fg_footer_noc_phone', '+27 (0) 11 000 0000' );
$footer_noc_email = get_theme_mod( 'fg_footer_noc_email', 'noc@fibergrid.co.za' );
$footer_copyright = get_theme_mod( 'fg_footer_copyright', '© 2026 FiberGrid (Pty) Ltd. All rights reserved.' );
?>
</main><!-- #content -->

<footer style="background:var(--fg-color-secondary, #0C2340);color:#FFFFFF;padding:80px 0 32px;border-top:1px solid rgba(255,255,255,0.08);">
    <div class="fg-container">
        <div style="display:grid;grid-template-columns:1.5fr 1fr 1fr 1.2fr;gap:48px;margin-bottom:64px;">
            <!-- Col 1: Brand & NOC Hotline -->
            <div>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="display:flex;align-items:center;gap:10px;text-decoration:none;font-family:var(--fg-font-headline);font-weight:900;font-size:24px;color:#FFFFFF;letter-spacing:-0.03em;margin-bottom:16px;">
                    <span style="width:32px;height:32px;background:var(--fg-color-primary);border-radius:6px;display:flex;align-items:center;justify-content:center;color:#FFFFFF;font-size:16px;">⚡</span>
                    <span>FIBER<span style="color:var(--fg-color-primary);">GRID</span></span>
                </a>
                <p style="color:#94A3B8;font-size:14px;line-height:1.6;margin-bottom:20px;max-width:320px;">
                    <?php echo esc_html( $footer_tagline ); ?>
                </p>
                <div style="font-family:var(--fg-font-mono);font-size:13px;color:#38BDF8;margin-bottom:6px;">
                    📞 <strong>Emergency NOC:</strong> <?php echo esc_html( $footer_noc_phone ); ?>
                </div>
                <div style="font-family:var(--fg-font-mono);font-size:13px;color:#94A3B8;">
                    ✉️ <strong>Support Email:</strong> <?php echo esc_html( $footer_noc_email ); ?>
                </div>
            </div>

            <!-- Col 2: Services -->
            <div>
                <h4 style="color:#FFFFFF;font-size:14px;font-family:var(--fg-font-mono);text-transform:uppercase;letter-spacing:0.08em;margin-bottom:18px;"><?php esc_html_e( 'Infrastructure', 'fibergrid' ); ?></h4>
                <ul style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:10px;font-size:14px;">
                    <li><a href="/ip-transit/" style="color:#94A3B8;text-decoration:none;">High-Speed IP Transit</a></li>
                    <li><a href="/colocation/" style="color:#94A3B8;text-decoration:none;">Global Colocation Racks</a></li>
                    <li><a href="/virtual-data-center/" style="color:#94A3B8;text-decoration:none;">Virtual Data Center & Cloud</a></li>
                    <li><a href="/ip-transit/#looking-glass" style="color:#94A3B8;text-decoration:none;">Looking Glass Diagnostic</a></li>
                </ul>
            </div>

            <!-- Col 3: Network & Standards -->
            <div>
                <h4 style="color:#FFFFFF;font-size:14px;font-family:var(--fg-font-mono);text-transform:uppercase;letter-spacing:0.08em;margin-bottom:18px;"><?php esc_html_e( 'Company & Trust', 'fibergrid' ); ?></h4>
                <ul style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:10px;font-size:14px;">
                    <li><a href="/about-us/" style="color:#94A3B8;text-decoration:none;">About FiberGrid</a></li>
                    <li><a href="/blog/" style="color:#94A3B8;text-decoration:none;">Engineering Insights</a></li>
                    <li><a href="/about-us/#compliance" style="color:#94A3B8;text-decoration:none;">Tier III Compliance</a></li>
                    <li><a href="/contact/" style="color:#94A3B8;text-decoration:none;">Global PoP Facilities</a></li>
                </ul>
            </div>

            <!-- Col 4: Operations Status Card -->
            <div style="background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.08);border-radius:12px;padding:24px;">
                <div style="display:flex;align-items:center;gap:8px;margin-bottom:10px;">
                    <span class="fg-pulse-dot pulse"></span>
                    <span style="font-family:var(--fg-font-mono);font-size:12px;color:#A7F3D0;font-weight:700;">ALL SYSTEMS NOMINAL</span>
                </div>
                <p style="color:#94A3B8;font-size:13px;line-height:1.5;margin-bottom:16px;">
                    Continuous DWDM optical wavelength monitoring and BGP route health across Johannesburg, London, and Frankfurt PoPs.
                </p>
                <a href="/contact/#quote" class="fg-btn fg-btn-primary" style="font-size:13px;padding:8px 16px;width:100%;text-align:center;">
                    Open Support Ticket
                </a>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div style="border-top:1px solid rgba(255,255,255,0.08);padding-top:28px;display:flex;flex-wrap:wrap;justify-content:space-between;align-items:center;gap:16px;font-size:13px;color:#64748B;">
            <div>
                <?php echo esc_html( $footer_copyright ); ?>
            </div>
            <div style="display:flex;gap:20px;">
                <a href="#" style="color:#64748B;text-decoration:none;">BGP Peering Policy</a>
                <a href="#" style="color:#64748B;text-decoration:none;">SLA Agreement</a>
                <a href="#" style="color:#64748B;text-decoration:none;">Privacy Policy</a>
                <a href="#" style="color:#64748B;text-decoration:none;">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
