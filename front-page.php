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
            <h1 class="bryhub-site-title"><?php esc_html(bloginfo( 'name' )); ?></h1>
            <nav class="navbar navbar-expand-md">
					<div class="site-branding">
					<?php
					if (!is_front_page() && !is_home() ) : ?>
						<p class="site-title"><a class="sr-only" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html(bloginfo( 'name' )); ?></a></p>
						<?php
					endif; ?>
				</div><!-- .site-branding -->
				<?php
				wp_nav_menu( array(
					'theme_location'  => 'primary',
					'depth'           => 1,
					'container'       => 'div',
					'container_class' => 'navbar-container',
                    'container_id'    => 'primary-navbar-container',
					'menu_class'      => 'navbar-nav w-100',
					'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
					'walker'          => new WP_Bootstrap_Navwalker()
				) );
				?>
			</nav>
        </div>
    </main>
</div>


<?php get_footer(); ?>