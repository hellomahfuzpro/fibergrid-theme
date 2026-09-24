<?php
/**
 * FiberGrid — Front Page Template
 *
 * @package FiberGrid
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
    <div class="fg-front-page-content">
        <?php the_content(); ?>
    </div>
<?php endwhile; ?>

<?php get_footer(); ?>
