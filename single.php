<?php
/**
 * FiberGrid — Single Technical Article Template
 *
 * @package FiberGrid
 */

get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'fg-single-article' ); ?>>
    <div style="background:var(--fg-color-surface-ice);border-bottom:1px solid var(--fg-color-grid-line);padding:60px 0 40px;">
        <div class="fg-container" style="max-width:860px;">
            <div style="font-family:var(--fg-font-mono);font-size:12px;color:var(--fg-color-primary);font-weight:700;margin-bottom:12px;">
                <?php echo esc_html( get_the_date( 'F j, Y' ) ); ?> &bull; 6 MIN READ
            </div>
            <h1 style="font-size:clamp(32px, 3.8vw, 48px);font-weight:800;color:var(--fg-color-secondary);line-height:1.2;margin:0 0 16px;">
                <?php the_title(); ?>
            </h1>
            <div style="display:flex;align-items:center;gap:12px;color:var(--fg-color-text-muted);font-size:14px;">
                <span>By <strong><?php the_author(); ?></strong></span>
                <span>&bull;</span>
                <span>NOC Engineering Directorate</span>
            </div>
        </div>
    </div>

    <div class="fg-container" style="max-width:860px;padding-top:48px;padding-bottom:80px;">
        <?php if ( has_post_thumbnail() ) : ?>
            <div style="margin-bottom:36px;border-radius:var(--fg-radius-lg);overflow:hidden;box-shadow:var(--fg-shadow-md);">
                <?php the_post_thumbnail( 'full', array( 'style' => 'width:100%;height:auto;display:block;' ) ); ?>
            </div>
        <?php endif; ?>

        <div class="entry-content" style="font-size:17px;line-height:1.75;color:var(--fg-color-text-main);">
            <?php the_content(); ?>
        </div>

        <div style="margin-top:48px;padding-top:32px;border-top:1px solid var(--fg-color-grid-line);display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:16px;">
            <a href="/blog/" class="fg-btn fg-btn-secondary">
                &larr; <?php esc_html_e( 'Back to Engineering Insights', 'fibergrid' ); ?>
            </a>
            <a href="/contact/#quote" class="fg-btn fg-btn-primary">
                <?php esc_html_e( 'Inquire with Engineering Team', 'fibergrid' ); ?>
            </a>
        </div>
    </div>
</article>

<?php get_footer(); ?>
