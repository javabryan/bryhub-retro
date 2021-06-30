<?php
/**
 * The template for displaying all single types
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bryhub-retro
 */
get_header();
?>
I AM SINGLE.PHP
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
			<?php
			while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/content-single', get_post_type() );
				the_post_navigation();

			} // End of the loop.
			?>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
