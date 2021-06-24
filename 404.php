<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package bryhub-retro
 */
get_header();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main container">

            <section class="error-404 not-found">
                <header class="page-header">
                    <h1 class="page-title"><?php esc_html_e( '404', 'bryhub-retro' ); ?></h1>
                </header><!-- .page-header -->

                <div class="page-content">
                    <p><?php esc_html_e( 'You have reached the end of spacetime, where all that remains is darkness and re-runs of Friends.', 'bryhub-retro' ); ?></p>

                </div><!-- .page-content -->
            </section><!-- .error-404 -->

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
