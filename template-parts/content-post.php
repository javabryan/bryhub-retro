<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bryhub-retro
 */
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bryhub-retro
 */
$categories     = get_the_category();
$category       = $categories[0];
$category_image = get_field( 'category_featured', 'category_' . $category->term_id );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div
            class="article-featured"
            style="background-image:url('<?php
			if ( has_post_thumbnail() ) {
				echo esc_attr( get_the_post_thumbnail_url() );
			} elseif ($category_image != '') {
				echo $category_image;
			} else {
			    echo get_template_directory_uri() . '/inc/img/bryhub-fallback.jpg';
            }
			?>')">
    </div>
    <div class="post-card-body">
        <header class="entry-header">
            <div class="post-title-container">
				<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				if ( 'post' === get_post_type() ) : ?>
                    <div class="entry-meta">
                        <span class="modified-date">Updated on <?php esc_html( the_modified_date() ); ?></span>
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
