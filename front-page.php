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
    <div class="bryhub-background-1" style="background:url('<?php echo esc_url(get_template_directory_uri() . '/inc/img/background-1.jpg')?>')">
        <div class="bryhub-screen"></div>
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
            </div>
            <div class="sprites sprite-enemy" style="background:url('<?php echo esc_url(get_template_directory_uri() . '/inc/img/spaceship.png')?>')"></div>
            <div class="sprites"></div>
            <div class="sprites"></div>
            <div class="sprites"></div>
            <div class="sprites"></div>
            <div class="sprites"></div>
            <div class="sprites"></div>
        </div>
        <div class="title-container">
            <div class="bryhub-site-title d-flex pb-0 mb-0">
                <a class="sr-only" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
            </div>
            <div class="description-container">
                <span>Under construction, come back later!</span>
            </div>
        </div>
    </div>
</main>
</div>

<?php get_footer(); ?>