<?php
/**
 * Template part for displaying posts.
 *
 * @package QOD_Starter_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<i class="fas fa-quote-left"></i>
    <div class="entry-content">
        
        <header class="entry-header">
            <?php the_content(); ?>
        </header><!-- .entry-header -->
        <div class="meta">
            <?php the_title(sprintf('<h2 class="entry-title">&#8211; ', esc_url(get_permalink())), '</h2>'); ?>
            <span class="source"></span>
        </div>
        
    </div><i class="fas fa-quote-right"></i><!-- .entry-content -->
</article><!-- #post-## --> 