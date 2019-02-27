<?php
/**
 * The main template file.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <img src="<?php echo get_template_directory_uri(); ?>/images/qod-logo.svg" alt="site logo">
        <?php if (have_posts()): ?>
        <?php  /* Start the Loop */ ?>
        <?php while (have_posts()): the_post(); ?>
        
        <?php get_template_part('template-parts/content'); ?>
        <?php endwhile; ?>

        <?php else: ?>

        <?php get_template_part('template-parts/content', 'none'); ?>

        <?php endif; ?>
        <button type="button" id="new-quote">Show me Another&#33;</button>
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?> 