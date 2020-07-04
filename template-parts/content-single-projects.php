<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bryhub-retro
 */
 ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-12'); ?>>
	<div class="article-card">
		<header class="entry-header">
      <?php the_title('<h1 class="entry-title">', '</h1>') ?>
		</header><!-- .entry-header -->
			<div class="entry-content">
				<?php
            the_content();
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
