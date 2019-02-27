<?php
/**
 * Template part for displaying posts.
 *
 * @package QOD_Starter_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<i class="fas fa-quote-left"></i>
<header class="entry-header">
    <?php the_excerpt(); ?>

    </header><i class="fas fa-quote-right"></i><!-- .entry-header -->

    <div class="entry-content">

      <?php the_title(sprintf('<h2 class="entry-title">&#8211; ', esc_url(get_permalink())), '</h2>'); ?>
    </div><!-- .entry-content -->
</article><!-- #post-## --> 