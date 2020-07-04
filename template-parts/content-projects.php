<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bryhub-retro
 */
 // Handles archive-content-projects AND single-content-projects

//Checks ACF for a custom link destination
$card_url = get_permalink();
if (get_field('card_url', $post->post_id)) {
    $card_url = get_field('card_url', $post->post_id);
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-12 col-md-6 col-lg-4 col-xl-3'); ?>>
	<div class="article-card">
		<header class="entry-header">
			<a href="<?php echo esc_url($card_url); ?>" rel="bookmark">
					<div class="project-post-thumbnail-container">
						<div class="project-post-thumbnail" style="background-image:url(' <?php echo esc_url(the_post_thumbnail_url()); ?> ')"></div>
					</div>
				<?php the_title('<h2 class="entry-title">', '</h2>') ?>
			</a>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
          the_excerpt();
          wp_link_pages([
              'before' => '<div class="page-links">' . esc_html__('Pages:', 'bryhub-retro'),
              'after' => '</div>',
          ]);
      ?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php
          $categories = get_the_category();
            if (sizeof($categories) > 0) :
      ?>
			<ul class="category-list">
				<?php
            foreach ($categories as $category) {
                echo '<li><a href="' . get_category_link($category) . '">' . $category->name . '</a></li>';
            }
        ?>
			</ul>
			<?php endif; ?>
		</footer><!-- .entry-footer -->
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
