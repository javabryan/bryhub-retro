<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package bryhub-retro
 */

if (! function_exists("bryhub_retro_sitename")) :
    /**
     *   Outputs the site name as a <h1> or <p> depending on the context of the page (home page or not)
     */
    function bryhub_retro_sitename($echo = true)
    {
        $url  = esc_url(home_url('/'));
        $name = get_bloginfo('name');
        $tag  = is_front_page() && is_home() ? "h1" : "p";

        $sitename = sprintf('<%1$s class="navbar-brand"><a href="%2$s">%3$s</a></%1$s>', $tag, $url, $name);

        if ($echo) {
            echo $sitename;
        }

        return $sitename;
    }
endif;

if (! function_exists('bryhub_retro_posted_on')) :
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function bryhub_retro_posted_on()
    {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if (get_the_time('U') !== get_the_modified_time('U')) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf(
            $time_string,
            esc_attr(get_the_date(DATE_W3C)),
            esc_html(get_the_date()),
            esc_attr(get_the_modified_date(DATE_W3C)),
            esc_html(get_the_modified_date())
        );

        $posted_on = sprintf(
            /* translators: %s: post date. */
            esc_html_x('Posted on %s', 'post date', 'bryhub-retro'),
            '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
        );

        echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.
    }
endif;

if (! function_exists('bryhub_retro_posted_by')) :
    /**
     * Prints HTML with meta information for the current author.
     */
    function bryhub_retro_posted_by()
    {
        $byline = sprintf(
            /* translators: %s: post author. */
            esc_html_x('by %s', 'post author', 'bryhub-retro'),
            '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
        );

        echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
    }
endif;

if (! function_exists('bryhub_retro_entry_footer')) :
    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function bryhub_retro_entry_footer()
    {
        // Hide category and tag text for pages.
        if ('post' === get_post_type()) {
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list(esc_html__(', ', 'bryhub-retro'));
            if ($categories_list) {
                /* translators: 1: list of categories. */
                printf('<span class="cat-links">' . esc_html__('Posted in %1$s', 'bryhub-retro') . '</span>', $categories_list); // WPCS: XSS OK.
            }

            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'bryhub-retro'));
            if ($tags_list) {
                /* translators: 1: list of tags. */
                printf('<span class="tags-links">' . esc_html__('Tagged %1$s', 'bryhub-retro') . '</span>', $tags_list); // WPCS: XSS OK.
            }
        }

        if (! is_single() && ! post_password_required() && (comments_open() || get_comments_number())) {
            echo '<span class="comments-link">';
            comments_popup_link(
                sprintf(
                    wp_kses(
                        /* translators: %s: post title */
                        __('Leave a Comment<span class="screen-reader-text"> on %s</span>', 'bryhub-retro'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                )
            );
            echo '</span>';
        }

        edit_post_link(
            sprintf(
                wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                    __('Edit <span class="screen-reader-text">%s</span>', 'bryhub-retro'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            ),
            '<span class="edit-link">',
            '</span>'
        );
    }
endif;

if (! function_exists('bryhub_retro_post_thumbnail')) :
    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views.
     */
    function bryhub_retro_post_thumbnail()
    {
        if (post_password_required() || is_attachment() || ! has_post_thumbnail()) {
            return;
        }

        if (is_singular()) :
            ?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
            the_post_thumbnail('post-thumbnail', array(
                'alt' => the_title_attribute(array(
                    'echo' => false,
                )),
            )); ?>
		</a>

		<?php
        endif; // End is_singular().
    }
endif;

add_filter('get_the_archive_title', 'bryhub_archive_title');
/**
 * Remove archives labels.
 *
 * @param  string	 $title Current archive title to be displayed.
 * @return string        Modified archive title to be displayed.
 */
function bryhub_archive_title($title)
{
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_author()) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    } elseif (is_tax()) {
        $title = single_term_title('', false);
    } elseif (is_home()) {
        $title = single_post_title('', false);
    }

    return $title;
}
