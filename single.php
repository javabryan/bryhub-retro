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

<div id="primary" class="content-area">
	<main id="main" class="site-main container">
	<?php
      while (have_posts()) :
          the_post();
      ?>
	<?php
      get_template_part('template-parts/content-single', get_post_type());

      the_post_navigation();

      endwhile; // End of the loop.
  ?>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
