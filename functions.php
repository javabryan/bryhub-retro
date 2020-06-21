<?php
/**
 * bryhub-retro functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bryhub-retro
 */

if (! function_exists('bryhub_retro_setup')) :

    function bryhub_retro_setup()
    {
        load_theme_textdomain('bryhub-retro', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');


        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');
        add_theme_support('title-tag');
        add_theme_support('custom-post-thumbnail', array(
            'height' => 480,
            'width'  => 720,
        ));

        set_post_thumbnail_size(400, 400);

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'menu-1' => esc_html__('Primary', 'bryhub-retro'),
        ));


        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('bryhub_retro_custom_background_args', array(
            'default-color' => '#000',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ));
    }
endif;
add_action('after_setup_theme', 'bryhub_retro_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bryhub_retro_content_width()
{
    $GLOBALS['content_width'] = apply_filters('bryhub_retro_content_width', 640);
}
add_action('after_setup_theme', 'bryhub_retro_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bryhub_retro_widgets_init()
{
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'bryhub-retro'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'bryhub-retro'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'bryhub_retro_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function bryhub_retro_scripts()
{
    wp_register_style('googlefonts', 'https://fonts.googleapis.com/css?family=Acme|Architects+Daughter|Raleway:400,700&display=swap');
    wp_enqueue_style('bryhub-retro-style', get_stylesheet_uri(), array('googlefonts'));

    wp_enqueue_script('bryhub-retro-script', get_template_directory_uri() . '/index.js', array( "jquery" ), '20151215', true);

    wp_enqueue_script('bryhub-retro-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);

    wp_enqueue_script('bryhub-retro-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'bryhub_retro_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Add Navwalker
 */
function register_navwalker()
{
    require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}
add_action('after_setup_theme', 'register_navwalker');

register_nav_menus(array(
    'primary' => __('Primary Menu', 'bryhub-retro'),
));

// Adding menu icons to nav-walker
add_filter('wp_nav_menu_objects', 'bryhub_add_menu_icons', 10, 2);

function bryhub_add_menu_icons($items, $args)
{

        // loop
    foreach ($items as &$item) {

            // vars
        $icon = get_field('menu-item-icon', $item);


        // append icon
        if ($icon) {
            $bryhub_menu_post_title = $item->post_title; // Store current post title
            $bryhub_new_menu_title = '<svg class="menu-item-icon"><use href="' . esc_url($icon) . '" focusable="false"></use></svg><span>' . esc_html($bryhub_menu_post_title) . '</span>';

            $item->title = $bryhub_new_menu_title;
        }
    }

    // return
    return $items;
}

/**
* Add custom post type Projects
**/
// Register Custom Post Type project
// Register Custom Post Type Project
function create_projects_cpt()
{
    $labels = array(
        'name' => _x('Projects', 'Post Type General Name', 'bryhub'),
        'singular_name' => _x('Project', 'Post Type Singular Name', 'bryhub'),
        'menu_name' => _x('Projects', 'Admin Menu text', 'bryhub'),
        'name_admin_bar' => _x('Project', 'Add New on Toolbar', 'bryhub'),
        'archives' => __('Projects', 'bryhub'),
        'attributes' => __('Project Attributes', 'bryhub'),
        'parent_item_colon' => __('Parent Project:', 'bryhub'),
        'all_items' => __('All Projects', 'bryhub'),
        'add_new_item' => __('Add New Project', 'bryhub'),
        'add_new' => __('Add New', 'bryhub'),
        'new_item' => __('New Project', 'bryhub'),
        'edit_item' => __('Edit Project', 'bryhub'),
        'update_item' => __('Update Project', 'bryhub'),
        'view_item' => __('View Project', 'bryhub'),
        'view_items' => __('View Projects', 'bryhub'),
        'search_items' => __('Search Project', 'bryhub'),
        'not_found' => __('Not found', 'bryhub'),
        'not_found_in_trash' => __('Not found in Trash', 'bryhub'),
        'featured_image' => __('Featured Image', 'bryhub'),
        'set_featured_image' => __('Set featured image', 'bryhub'),
        'remove_featured_image' => __('Remove featured image', 'bryhub'),
        'use_featured_image' => __('Use as featured image', 'bryhub'),
        'insert_into_item' => __('Insert into Project', 'bryhub'),
        'uploaded_to_this_item' => __('Uploaded to this Project', 'bryhub'),
        'items_list' => __('Projects list', 'bryhub'),
        'items_list_navigation' => __('Projects list navigation', 'bryhub'),
        'filter_items_list' => __('Filter Projects list', 'bryhub'),
    );
    $args = array(
        'label' => __('Project', 'bryhub'),
        'description' => __('Hubble Bubble', 'bryhub'),
        'labels' => $labels,
        'menu_icon' => 'dashicons-lightbulb',
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author', 'trackbacks', 'page-attributes', 'post-formats', 'custom-fields'),
        'taxonomies' => array('category'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'hierarchical' => true,
        'exclude_from_search' => false,
        'show_in_rest' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post',
    );
    register_post_type('projects', $args);
}
add_action('init', 'create_projects_cpt', 0);
