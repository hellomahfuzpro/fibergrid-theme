<?php
/**
 * FiberGrid — 404 Route Not Found Template
 *
 * @package FiberGrid
 */

get_header(); ?>

<div class="fg-wrap">
    <section class="fg-404-section" style="padding:100px 0;background:var(--fg-color-midnight, #0A1128);color:#FFFFFF;text-align:center;">
        <div class="fg-container" style="max-width:760px;">
            <div class="fg-404-illustration" style="margin-bottom:32px;">
                <img src="<?php echo esc_url( FG_URI . '/assets/images/80f65207fb4c438ab05f3cd8d2b1746e-bold_900_404_route_disconnect_graphic_icon__transparent_.svg' ); ?>" alt="Severed Optical Cable 404" style="max-width:280px;height:auto;margin:0 auto;display:block;">
            </div>

            <span class="fg-eyebrow" style="color:var(--fg-color-route-orange, #FF5E14);">
                <?php esc_html_e( 'BGP ROUTE UNREACHABLE // 404', 'fibergrid' ); ?>
            </span>

            <h1 style="font-size:clamp(32px, 4vw, 48px);font-weight:800;color:#FFFFFF;margin:12px 0 16px;">
                <?php esc_html_e( 'Optical Path Severed: Route Not Found', 'fibergrid' ); ?>
            </h1>

            <p style="color:#94A3B8;font-size:16px;line-height:1.6;margin-bottom:36px;max-width:600px;margin-left:auto;margin-right:auto;">
                <?php esc_html_e( 'The optical wavelength or routing path you requested does not exist on our global fiber backbone. Please reroute below or consult our Looking Glass.', 'fibergrid' ); ?>
            </p>

            <div style="display:flex;gap:16px;justify-content:center;flex-wrap:wrap;">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="fg-btn fg-btn-primary">
                    <?php esc_html_e( 'Return to Homepage', 'fibergrid' ); ?>
                </a>
                <a href="/ip-transit/#looking-glass" class="fg-btn fg-btn-secondary" style="border-color:#334155;color:#FFFFFF !important;">
                    <?php esc_html_e( 'Inspect Looking Glass', 'fibergrid' ); ?>
                </a>
                <a href="/contact/" class="fg-btn fg-btn-on-dark">
                    <?php esc_html_e( 'Contact 24/7 NOC', 'fibergrid' ); ?>
                </a>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>
