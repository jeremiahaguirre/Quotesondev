<?php
/**
 * The template for displaying all pages.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <section class="archives-main">
            <?php while (have_posts()): the_post(); ?>
            <?php get_template_part('template-parts/content', 'page'); ?>
            <?php $args = array(
                'posts_per_page'   => -1,
            );
            $posts_array = get_posts($args);
            ?>

            <div class="authors">
                <h2>Quote Authors</h2>
                <p>
                    <?php foreach ($posts_array as $post): ?>
                    <a href="<?php echo get_permalink($post->ID) ?>">
                        <?php echo ($post->post_title); ?></a>
                    <?php endforeach; ?>
                </p>
            </div>
            <div class="categories">
                <h2>Categories</h2>
                <?php  wp_list_categories(array(
                    'title_li' => ''
                )); ?>
               
            </div>
            <div class="tags">
                <h2>Tags</h2>
                <?php $tags = get_tags('post_tag'); ?>
                <?php if ($tags): ?>
                <p>
                    <?php foreach ($tags as $tag): ?>
                    <a class="tag" href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>">
                        <?php echo esc_html($tag->name); ?></a>
                    <?php endforeach; ?>
                </p>
                <?php endif; ?>
            </div>
            <?php endwhile; ?>
        </section>
    </main><!-- #main -->
</div><!-- #primary -->
<?php get_footer(); ?> 