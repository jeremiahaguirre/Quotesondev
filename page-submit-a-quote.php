<?php
/**
 * The template for displaying all pages.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

<div id="primary" class="content-area">
    <i class="fas fa-quote-left"></i>
    <main id="main" class="site-main" role="main">
        <?php while (have_posts()): the_post(); ?>
        <?php endwhile; ?>
        <?php if (is_user_logged_in() && current_user_can('edit_posts')): ?>
	   <div id="submit">
		<form id="form">
            <label>Author of Quote</label>
            <input type="text" name="Author" id="author" />
            <label>Quote</label> <textarea rows="7" cols="10" id="quote"></textarea>
            <label>Where did you find this quote? (e.g. book name)</label> <input type="text" name="Source" id="source" />
            <label>Provide the URL of the quote source, if availiable</label> <input type="url" name="url" id="url" />
            <input type="submit" value="Submit Quote">
		</form>
</div>
        <?php else: ?>
            <p>Sorry, you must be logged in to submit a quote!</p>
            <a href="<?php echo wp_login_url() ?>">Click here to login.</a>
        <?php endif; ?>
    </main><i class="fas fa-quote-right"></i><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?> 