<?php
/**
 * NowForm Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package NowForm_Theme
 */

if (!function_exists('nowform_theme_setup')):
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function nowform_theme_setup()
{
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on NowForm Theme, use a find and replace
         * to change 'nowform-theme' to the name of your theme in all the template files.
         */
        load_theme_textdomain('nowform-theme', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'menu-1' => esc_html__('Primary', 'nowform-theme'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('nowform_theme_custom_background_args', array(
            'default-color' => 'ffffff',
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
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ));
    }
endif;
add_action('after_setup_theme', 'nowform_theme_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function nowform_theme_content_width()
{
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('nowform_theme_content_width', 640);
}
add_action('after_setup_theme', 'nowform_theme_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function nowform_theme_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'nowform-theme'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'nowform-theme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'nowform_theme_widgets_init');

/*
Work Posts
 */

// function custom_post_type_work()
// {

// // Set UI labels for Custom Post Type
//     $labels = array(
//         'name' => _x('Work', 'Post Type General Name', 'nowform-theme'),
//         'singular_name' => _x('Work', 'Post Type Singular Name', 'nowform-theme'),
//         'menu_name' => __('Work', 'nowform-theme'),
//         'parent_item_colon' => __('Parent Work', 'nowform-theme'),
//         'all_items' => __('All Work', 'nowform-theme'),
//         'view_item' => __('View Work', 'nowform-theme'),
//         'add_new_item' => __('Add New Work', 'nowform-theme'),
//         'add_new' => __('Add New', 'nowform-theme'),
//         'edit_item' => __('Edit Work', 'nowform-theme'),
//         'update_item' => __('Update Work', 'nowform-theme'),
//         'search_items' => __('Search Work', 'nowform-theme'),
//         'not_found' => __('Not Found', 'nowform-theme'),
//         'not_found_in_trash' => __('Not found in Trash', 'nowform-theme'),
//     );

// // Set other options for Custom Post Type

//     $args = array(
//         'label' => __('work', 'nowform-theme'),
//         'description' => __('Work posts'),
//         'labels' => $labels,
//         // Features this CPT supports in Post Editor
//         'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
//         // You can associate this CPT with a taxonomy or custom taxonomy.
//         'taxonomies' => array('category'),
//         /* A hierarchical CPT is like Pages and can have
//          * Parent and child items. A non-hierarchical CPT
//          * is like Posts.
//          */
//         'hierarchical' => false,
//         'public' => true,
//         'show_ui' => true,
//         'show_in_menu' => true,
//         'show_in_nav_menus' => true,
//         'show_in_admin_bar' => true,
//         'show_in_rest' => true,
//         'menu_position' => 5,
//         'can_export' => true,
//         'has_archive' => false,
//         'exclude_from_search' => false,
//         'publicly_queryable' => true,
//         'capability_type' => 'page',
//     );

//     // Registering your Custom Post Type
//     register_post_type('work', $args);

// }

/* Hook into the 'init' action so that the function
 * Containing our post type registration is not
 * unnecessarily executed.
 */

add_action('init', 'custom_post_type_work', 0);

/*
Journal Posts
 */

// function custom_post_type_journal()
// {

//     // Set UI labels for Custom Post Type
//     $labels = array(
//         'name' => _x('Journals', 'Post Type General Name', 'nowform-theme'),
//         'singular_name' => _x('Journal', 'Post Type Singular Name', 'nowform-theme'),
//         'menu_name' => __('Journal', 'nowform-theme'),
//         'parent_item_colon' => __('Parent Journal', 'nowform-theme'),
//         'all_items' => __('All Journals', 'nowform-theme'),
//         'view_item' => __('View Journals', 'nowform-theme'),
//         'add_new_item' => __('Add New Journal', 'nowform-theme'),
//         'add_new' => __('Add New', 'nowform-theme'),
//         'edit_item' => __('Edit Journal', 'nowform-theme'),
//         'update_item' => __('Update Journal', 'nowform-theme'),
//         'search_items' => __('Search Journals', 'nowform-theme'),
//         'not_found' => __('Not Found', 'nowform-theme'),
//         'not_found_in_trash' => __('Not found in Trash', 'nowform-theme'),
//     );

//     // Set other options for Custom Post Type

//     $args = array(
//         'label' => __('journal', 'nowform-theme'),
//         'description' => __('Journal posts'),
//         'labels' => $labels,
//         // Features this CPT supports in Post Editor
//         'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
//         // You can associate this CPT with a taxonomy or custom taxonomy.
//         'taxonomies' => array('category'),
//         /* A hierarchical CPT is like Pages and can have
//          * Parent and child items. A non-hierarchical CPT
//          * is like Posts.
//          */
//         'hierarchical' => false,
//         'public' => true,
//         'show_ui' => true,
//         'show_in_menu' => true,
//         'show_in_nav_menus' => true,
//         'show_in_admin_bar' => true,
//         'show_in_rest' => true,
//         'menu_position' => 5,
//         'can_export' => true,
//         'has_archive' => false,
//         'exclude_from_search' => false,
//         'publicly_queryable' => true,
//         'capability_type' => 'page',
//     );

//     // Registering your Custom Post Type
//     register_post_type('journal', $args);

// }
/*
Opinions Posts
 */

// function custom_post_type_opinions()
// {

//     // Set UI labels for Custom Post Type
//     $labels = array(
//         'name' => _x('Opinions', 'Post Type General Name', 'nowform-theme'),
//         'singular_name' => _x('Opinions', 'Post Type Singular Name', 'nowform-theme'),
//         'menu_name' => __('Opinions', 'nowform-theme'),
//         'parent_item_colon' => __('Parent Opinions', 'nowform-theme'),
//         'all_items' => __('All Opinions', 'nowform-theme'),
//         'view_item' => __('View Opinions', 'nowform-theme'),
//         'add_new_item' => __('Add New Opinions', 'nowform-theme'),
//         'add_new' => __('Add New', 'nowform-theme'),
//         'edit_item' => __('Edit Opinions', 'nowform-theme'),
//         'update_item' => __('Update Opinions', 'nowform-theme'),
//         'search_items' => __('Search Opinions', 'nowform-theme'),
//         'not_found' => __('Not Found', 'nowform-theme'),
//         'not_found_in_trash' => __('Not found in Trash', 'nowform-theme'),
//     );

//     // Set other options for Custom Post Type

//     $args = array(
//         'label' => __('opinions', 'nowform-theme'),
//         'description' => __('Opinions posts'),
//         'labels' => $labels,
//         // Features this CPT supports in Post Editor
//         'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
//         // You can associate this CPT with a taxonomy or custom taxonomy.
//         'taxonomies' => array('category'),
//         /* A hierarchical CPT is like Pages and can have
//          * Parent and child items. A non-hierarchical CPT
//          * is like Posts.
//          */
//         'hierarchical' => false,
//         'public' => true,
//         'show_ui' => true,
//         'show_in_menu' => true,
//         'show_in_nav_menus' => true,
//         'show_in_admin_bar' => true,
//         'show_in_rest' => true,
//         'menu_position' => 5,
//         'can_export' => true,
//         'has_archive' => false,
//         'exclude_from_search' => false,
//         'publicly_queryable' => true,
//         'capability_type' => 'page',
//     );

//     // Registering your Custom Post Type
//     register_post_type('opinions', $args);

// }

/* Hook into the 'init' action so that the function
 * Containing our post type registration is not
 * unnecessarily executed.
 */

// add_action('init', 'custom_post_type_journal', 0);
// add_action('init', 'custom_post_type_opinions', 0);

/*
Team Posts
 */

function custom_post_type_team()
{

// Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('Team', 'Post Type General Name', 'nowform-theme'),
        'singular_name' => _x('Teammate', 'Post Type Singular Name', 'nowform-theme'),
        'menu_name' => __('Team', 'nowform-theme'),
        'parent_item_colon' => __('Parent Teammate', 'nowform-theme'),
        'all_items' => __('All Teammates', 'nowform-theme'),
        'view_item' => __('View Team', 'nowform-theme'),
        'add_new_item' => __('Add New Teammate', 'nowform-theme'),
        'add_new' => __('Add New', 'nowform-theme'),
        'edit_item' => __('Edit Teammate', 'nowform-theme'),
        'update_item' => __('Update Teammate', 'nowform-theme'),
        'search_items' => __('Search Teammate', 'nowform-theme'),
        'not_found' => __('Not Found', 'nowform-theme'),
        'not_found_in_trash' => __('Not found in Trash', 'nowform-theme'),
    );

// Set other options for Custom Post Type

    $args = array(
        'label' => __('team', 'nowform-theme'),
        'description' => __('Team posts'),
        'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
        // You can associate this CPT with a taxonomy or custom taxonomy.
        'taxonomies' => array('category'),
        /* A hierarchical CPT is like Pages and can have
         * Parent and child items. A non-hierarchical CPT
         * is like Posts.
         */
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );

    // Registering your Custom Post Type
    register_post_type('team', $args);

}

/* Hook into the 'init' action so that the function
 * Containing our post type registration is not
 * unnecessarily executed.
 */

add_action('init', 'custom_post_type_team', 0);

// function additional_active_item_classes($classes = array(), $menu_item = false)
// {
//     // custom taxonomy
//     if ($menu_item->title == 'Work' && is_tax('work')) {
//         $classes[] = 'current-menu-item';
//     }
//     // custom post type single
//     if ($menu_item->title == 'Work' && is_singular('work')) {
//         $classes[] = 'current-menu-item';
//     }
//     if ($menu_item->title == 'Journal' && is_tax('journal')) {
//         $classes[] = 'current-menu-item';
//     }
//     // custom post type single
//     if ($menu_item->title == 'Journal' && is_singular('journal')) {
//         $classes[] = 'current-menu-item';
//     }
//     // blog post single
//     if ($menu_item->title == 'Blog Page' && is_singular('post')) {
//         $classes[] = 'current-menu-item';
//     }
//     return $classes;
// }
add_filter('nav_menu_css_class', 'additional_active_item_classes', 10, 2);

add_post_type_support('page', 'excerpt');

add_filter('rest_journal_collection_params', 'my_prefix_add_rest_orderby_params', 10, 1);
add_filter('rest_post_collection_params', 'my_prefix_add_rest_orderby_params', 10, 1);
add_filter('rest_work_collection_params', 'my_prefix_add_rest_orderby_params', 10, 1);
function my_prefix_add_rest_orderby_params($params)
{
    $params['orderby']['enum'][] = 'menu_order';

    return $params;
}

/**
 * Enqueue scripts and styles.
 */
function nowform_theme_scripts()
{
    wp_enqueue_style('nowform-theme-style', get_stylesheet_uri());

    wp_enqueue_script('nowform-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);

    wp_enqueue_script('nowform-theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'nowform_theme_scripts');

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
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
    require get_template_directory() . '/inc/woocommerce.php';
}
