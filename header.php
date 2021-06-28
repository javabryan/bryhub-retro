<?php
/**
 * The header for bryhub-retro
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bryhub-retro
 */
$template_directory_uri = get_template_directory_uri();
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preload" href="<?php echo $template_directory_uri . '/inc/fonts/architects-daughter.woff2'?>" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="<?php echo $template_directory_uri . '/inc/fonts/montserrat-400.woff2'?>" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="<?php echo $template_directory_uri . '/inc/fonts/montserrat-700.woff2'?>" as="font" type="font/woff2" crossorigin>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php get_template_part( 'template-parts/global', 'svg' ); ?>

<div id="page">
	<?php if ( ! is_front_page() ) : ?>
        <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'bryhub-retro' ); ?></a>
        <nav class="navbar">
			<?php
			wp_nav_menu( [
				'theme_location'  => 'primary',
				'depth'           => 1,
				'container'       => 'div',
				'container_class' => 'navbar-container',
				'container_id'    => 'primary-navbar-container'
			] );
			?>
        </nav>
	<?php endif; ?>
    <header id="masthead" class="site-header">

    </header><!-- #masthead -->

    <div id="content" class="site-content">
