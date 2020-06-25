<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bryhub-retro
 */
 // Will eventually create a new template part to eliminate these conditional variables
 if (is_singular()) {
     $article_bootstrap_classes = 'col-12';
     $title_markup_open = '<h1 class="entry-title">';
     $title_markup_close = '</h1>';
     $entry_content = 'the_content';
 } else {
     $article_bootstrap_classes = 'col-12 col-md-6 col-lg-4 col-xl-3';
     $title_markup_open = '<h2 class="entry-title">';
     $title_markup_close = '</h2>';
     $entry_content = 'the_excerpt';
 }
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($article_bootstrap_classes); ?>>
	<div class="article-card">
		<header class="entry-header">
      <?php if (!is_singular()) : ?>
			<a href='<?php echo esc_url(get_permalink()) ?>' rel="bookmark">
					<div class="project-post-thumbnail-container">
						<div class="project-post-thumbnail" style="background-image:url(' <?php echo esc_url(the_post_thumbnail_url()); ?> ')"></div>
					</div>
				<?php the_title($title_markup_open, $title_markup_close) ?>
			</a>
    <?php else : ?>
      <?php the_title($title_markup_open, $title_markup_close) ?>
    <?php endif; ?>
		</header><!-- .entry-header -->
			<div class="entry-content">
				<?php
                    $entry_content();
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
	</a>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
