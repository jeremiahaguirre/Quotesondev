<?php
/**
 * The template for displaying all pages.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php while (have_posts()): the_post(); ?>
        <?php get_template_part('template-parts/content', 'page'); ?>
        <?php endwhile; ?>
        <?php while (have_posts()): the_post(); ?>
        <?php $terms = wp_list_categories(array(
            'title_li' => ''
        )); ?>
        <ul class="tags">

            <?php $tags = get_tags('post_tag'); ?>
            <?php if ($tags): ?>
            <?php foreach ($tags as $tag): ?>
            <li><a class="tag" href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>">
                    <?php echo esc_html($tag->name); ?></a></li>
            <?php endforeach; ?>
            <?php endif; ?>
        </ul>
        <?php return $terms; ?>
        <?php endwhile; ?>

    </main><!-- #main -->
</div><!-- #primary -->
<?php get_footer(); ?> 