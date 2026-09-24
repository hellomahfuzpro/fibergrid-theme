<?php
/**
 * FiberGrid — Main Index Template
 *
 * @package FiberGrid
 */

get_header(); ?>

<div class="fg-container" style="padding-top:60px;padding-bottom:80px;">
    <?php if ( have_posts() ) : ?>
        <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(320px, 1fr));gap:32px;">
            <?php while ( have_posts() ) : the_post(); ?>
                <article class="fg-card" style="display:flex;flex-direction:column;justify-content:space-between;">
                    <div>
                        <div style="font-family:var(--fg-font-mono);font-size:12px;color:var(--fg-color-primary);margin-bottom:8px;">
                            <?php echo esc_html( get_the_date( 'M j, Y' ) ); ?>
                        </div>
                        <h2 style="font-size:22px;font-weight:800;margin:0 0 12px;">
                            <a href="<?php the_permalink(); ?>" style="color:var(--fg-color-secondary);text-decoration:none;">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                        <div style="color:var(--fg-color-text-muted);font-size:15px;line-height:1.6;margin-bottom:20px;">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
                    <div>
                        <a href="<?php the_permalink(); ?>" class="fg-btn fg-btn-secondary" style="font-size:13px;padding:8px 16px;">
                            <?php esc_html_e( 'Read Article &rarr;', 'fibergrid' ); ?>
                        </a>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>
        <div style="margin-top:40px;">
            <?php the_posts_pagination(); ?>
        </div>
    <?php else : ?>
        <p><?php esc_html_e( 'No posts found.', 'fibergrid' ); ?></p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
