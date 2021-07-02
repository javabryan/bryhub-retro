<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bryhub-retro
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header><!-- .entry-header -->

    <div class="post-card-content">
        <div class="entry-content">
			<?php
			the_content( sprintf(
					wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'bryhub-retro' ),
						[
							'span' => [
								'class' => [],
							],
						] ), get_the_title() )
			);
			?>
        </div><!-- .entry-content -->
    </div><!-- .post-card-content -->

    <footer class="entry-footer">
		<?php bryhub_retro_entry_footer(); ?>
    </footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
