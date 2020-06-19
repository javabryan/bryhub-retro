<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bryhub-retro
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('col-12 col-md-6 col-lg-3'); ?>>
	<div class="article-card">
		<header class="entry-header">
			<a href='<?php echo esc_url(get_permalink()) ?>' rel="bookmark">
				<div class="project-post-thumbnail" style="background-image:url(' <?php echo esc_url(the_post_thumbnail_url()); ?> ')"></div>
				<?php
              if (is_singular()) :
                      the_title('<h1 class="entry-title">', '</h1>');
              else :
                      the_title('<h2 class="entry-title">', '</h2>');
      endif; ?>
			</a>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
            the_excerpt(sprintf(
          wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                    __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'bryhub-retro'),
              array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
          ),
          get_the_title()
      ));

            wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'bryhub-retro'),
                'after'  => '</div>',
            ));
            ?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php bryhub_retro_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</a>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
