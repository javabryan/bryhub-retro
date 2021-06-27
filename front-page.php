<?php
/**
 * The template for displaying the front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bryhub-retro
 */
get_header();
?>
    <main>
        <div class="sprites-container">
            <div class="sprites sprite-rocket">
                <svg focusable="false">
                        <use href="#rocket"></use>
                </svg>
                <div class="sprites rocket-fire">
                    <svg focusable="false">
                            <use href="#rocket-fire"></use>
                    </svg>
                </div>
                <div class="sprites sprite-boom">
                    <svg focusable="false">
                        <use href="#boom"></use>
                    </svg>
                </div>
            </div>
            <div class="sprites sprite-enemy" style="background:url('<?php echo esc_url(get_template_directory_uri() . '/inc/img/spaceship.png')?>')"></div>
            <div class="sprites sprite-enemy-laser"></div>
        </div>
        <div class="title-container">
            <h1 class="bryhub-site-title"><?php esc_html(bloginfo('name')); ?></h1>
            <div class="bryhub-tagline"><?php esc_html(bloginfo('description')); ?></div>
            <nav class="navbar">
      				<?php
                      wp_nav_menu([
                          'theme_location' => 'primary',
                          'depth' => 1,
                          'container' => 'div',
                          'container_class' => 'navbar-container',
                          'container_id' => 'primary-navbar-container'
                      ]);
                      ?>
      			</nav>
        </div>
    </main>
</div>


<?php get_footer(); ?>
