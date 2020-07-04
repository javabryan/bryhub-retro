<?php
/**
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bryhub-retro
 */
get_header();
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main container">

		<?php
        while (have_posts()) :
            the_post();

            get_template_part('template-parts/content', 'page');
        endwhile; // End of the loop.
        ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
