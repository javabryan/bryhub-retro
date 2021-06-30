<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bryhub_retro
 */
?>

</div><!-- #content -->

<?php if ( ! is_front_page() ) : ?>
    <footer class="site-footer">
		<?php get_template_part( 'template-parts/footer', 'site-info' ) ?>
    </footer>
<?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
