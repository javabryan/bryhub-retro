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
    <div class="post-card-body">
        <header class="entry-header">
            <div class="post-title-container">
				<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				if ( 'post' === get_post_type() ) : ?>
                    <div class="entry-meta">
						<?php bryhub_retro_posted_on(); ?>
                    </div><!-- .entry-meta -->
				<?php endif; ?>
            </div>
        </header><!-- .entry-header -->

        <div class="post-card-content">
            <div class="entry-content">
				<?php esc_html( the_excerpt() ); ?>
            </div><!-- .entry-content -->
            <footer class="entry-footer">
				<?php bryhub_retro_entry_footer(); ?>
            </footer><!-- .entry-footer -->
        </div><!-- .post-card-content -->
    </div><!-- .post-card-body -->
</article><!-- #post-<?php the_ID(); ?> -->
