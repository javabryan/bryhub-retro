<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bryhub-retro
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php get_template_part('template-parts/global', 'svg'); ?>
	<div class="front-col-image" style='background:url("<?php echo esc_url( get_theme_mod( 'customizer_setting_one' ) ); ?>"'></div>

<div id="page">
	<?php if (!is_front_page() && !is_home()) : ?>
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'bryhub-retro' ); ?></a>
		<nav class="navbar navbar-expand-md">
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
	<?php endif; ?>
	<header id="masthead" class="site-header">
			
	</header><!-- #masthead -->

	<div id="content" class="site-content">
