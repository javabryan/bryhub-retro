<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bryhub-retro
 *
 *TODO This page is a friggin mess. Will definately refactor this by properly structuring template parts.
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if (is_singular()) : ?>
			<header class="entry-header">
				<div class="post-card-body">
        <?php
                the_title('<h1 class="entry-title">', '</h1>');
        else : ?>
				<div class="post-card-body">
				<header class="entry-header" style="background-image:url(' <?php echo esc_url(the_post_thumbnail_url()); ?> ')">
				<div class="post-title-container">
					<?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
			<?php endif;

        if ('post' === get_post_type()) :
            ?>
			<div class="entry-meta">
				<?php
                bryhub_retro_posted_on();
                bryhub_retro_posted_by();
        ?>
			</div><!-- .entry-meta -->
		</div>
		<?php endif; ?>
	</header><!-- .entry-header -->
	<?php if (!is_singular()) : ?>
		<div class="post-card-content">
			<div class="entry-content">
				<?php the_excerpt(); ?>
					</div><!-- .entry-content -->
			<footer class="entry-footer">
				<?php bryhub_retro_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		</div><!-- .post-card-content -->
	</div><!-- .post-card-body -->
<?php else: ?>
	<div class="post-card-content">
		<div class="entry-content">
			<?php
          the_content(sprintf(
              wp_kses(
                      /* translators: %s: Name of current post. Only visible to screen readers */
                      __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'bryhub-retro'),
                      [
                              'span' => [
                                      'class' => [],
                              ],
                      ]
              ),
              get_the_title()
          ));
        ?>
				</div><!-- .entry-content -->
	</div><!-- .post-card-content -->
	<footer class="entry-footer">
			<?php bryhub_retro_entry_footer(); ?>
		</footer><!-- .entry-footer -->
<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
