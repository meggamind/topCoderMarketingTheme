<?php
/**
 * Topcoder 2 Marketing functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Topcoder_2_Marketing
 */

if ( ! function_exists( 'topcoder2marketing_setup' ) ) :
	/**
	 * Global TC THEME CONFIG
	 * @var array
	 */
	$TC_THEME_CONF = array(
		'max_title_len' => 21,
		'max_excerpt_len' => 201
	);
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function topcoder2marketing_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Topcoder 2 Marketing, use a find and replace
		 * to change 'topcoder2marketing' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'topcoder2marketing', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary Menu', 'topcoder2marketing' ),
			'menu-2' => esc_html__( 'Category Archive Tabs Menu', 'topcoder2marketing' ),
			'menu-3' => esc_html__( 'Blog Tabs Menu', 'topcoder2marketing' ),
			'menu-4' => esc_html__( 'All New Tabs Menu', 'topcoder2marketing' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

	}
endif;
add_action( 'after_setup_theme', 'topcoder2marketing_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function topcoder2marketing_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'topcoder2marketing_content_width', 640 );
}
add_action( 'after_setup_theme', 'topcoder2marketing_content_width', 0 );

/**
 * Register widget areas.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function topcoder2marketing_widgets_init() {
	// Customer Stories Archive Widgets
	register_sidebar( array(
		'name'          => esc_html__( 'Customer Stories Archive Header', 'topcoder2marketing' ),
		'id'            => 'customer-stories-archive-header',
		'description'   => esc_html__( 'Add widgets here.', 'topcoder2marketing' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Customer Stories Archive Tabs', 'topcoder2marketing' ),
		'id'            => 'customer-stories-archive-tabs',
		'description'   => esc_html__( 'Add widgets here.', 'topcoder2marketing' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Customer Stories Archive Bottom Banner', 'topcoder2marketing' ),
		'id'            => 'customer-stories-archive-bottom-banner',
		'description'   => esc_html__( 'Add widgets here.', 'topcoder2marketing' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
	// Footer Widgets
	for ($i = 1; $i <= 6; $i++) {
		register_sidebar( array(
			'name'          => esc_html__( 'Footer '.$i, 'topcoder2marketing' ),
			'id'            => 'footer-'.$i,
			'description'   => esc_html__( 'Add widgets here.', 'topcoder2marketing' ),
			'before_widget' => '<div class="hide-for-tablet-mobile">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5>',
			'after_title'   => '</h5>',
		) );
	}
}
add_action( 'widgets_init', 'topcoder2marketing_widgets_init' );

/**
 * Allow SVG through WordPress Media Uploader
 */
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/**
 * Enqueue scripts and styles.
 */
function topcoder2marketing_scripts() {
  $version = '20180515';
	wp_enqueue_style( 'topcoder2marketing-style', get_stylesheet_uri(), false, $version );
	wp_enqueue_style( 'topcoder2marketing-main', get_template_directory_uri() . '/main.css', array('topcoder2marketing-style'), $version );

	wp_enqueue_script( 'topcoder2marketing-navigation', get_template_directory_uri() . '/js/navigation.js', array(), $version, true );

	wp_enqueue_script( 'topcoder2marketing-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), $version, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	global $wp_query;
	wp_enqueue_script( 'topcoder2marketing-prototype', get_template_directory_uri() . '/js/scripts.js', array('jquery', 'jquery-masonry'), '20180507', true );
	wp_localize_script( 'topcoder2marketing-prototype', 'tc_loadmore_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
		'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages
	) );

	wp_enqueue_script( 'topcoder2marketing-ie-fix', get_template_directory_uri() . '/js/ie-fix.js', array('jquery'), $version, true );
	wp_enqueue_script( 'topcoder2marketing-carousel', get_template_directory_uri() . '/js/carousel.js', array(), $version, true );
}
add_action( 'wp_enqueue_scripts', 'topcoder2marketing_scripts' );

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
 * Primary Menu Walker.
 */
require get_template_directory() . '/inc/primary_menu_walker.php';

/**
 * Mobile Menu Walker.
 */
require get_template_directory() . '/inc/mobile_menu_walker.php';

/**
 * Ajax handlers
 */
require get_template_directory() . '/inc/ajax.php';

/**
 * Custom Taxonomies
 */
require get_template_directory() . '/inc/tax.php';

/**
 * Custom Post Types
 */
require get_template_directory() . '/inc/custom_posts.php';

/**
 * Registering TC custom widgets folder
 */
function add_tc_widgets_collection($folders){
    $folders[] = get_template_directory() . '/widgets/';
    return $folders;
}
add_filter('siteorigin_widgets_widget_folders', 'add_tc_widgets_collection');

/**
 * Adding Class current_page_item
 */
function prefix_nav_menu_classes($items, $menu, $args) {
    _wp_menu_item_classes_by_context($items);
    return $items;
}
add_filter( 'wp_get_nav_menu_items', 'prefix_nav_menu_classes', 10, 3 );

/**
 * Constraint post title length
 */
function tc_max_title_length( $title ) {
	global $TC_THEME_CONF;
	$max = $TC_THEME_CONF['max_title_len'];
	if( strlen( $title ) > $max ) {
		echo substr( $title, 0, $max ). " &hellip;";
	} else {
		echo $title;
	}
}

/**
 * Constraint post content length
 */
function tc_excerpt_filter_function( $excerpt ) {
	global $TC_THEME_CONF;
	$max = $TC_THEME_CONF['max_excerpt_len'];
	if( strlen( $excerpt ) > $max ) {
		return substr( $excerpt, 0, $max ). " &hellip;";
	}
  return $excerpt;
}
add_filter( 'get_the_excerpt', 'tc_excerpt_filter_function' );

/**
 * Register custom query vars
 */
function tc_custom_query_vars_filter($vars) {
  $vars[] = 'ancestor_id';
  return $vars;
}
add_filter( 'query_vars', 'tc_custom_query_vars_filter' );

/**
 * Search
 */
function tc_search_filter($query) {
  if ( !is_admin() && $query->is_main_query() ) {
    if ($query->is_search) {
			$ancestor_id = get_query_var('ancestor_id');
			if( $ancestor_id ) {
				$page_for_posts = get_option('page_for_posts');
				if( $ancestor_id == $page_for_posts ) {
					$query->set('post_type', array( 'post', 'customerstory', 'inthenews' ) );
				} else {
					$query->set('post_parent', $ancestor_id);
				}
			}
    }
		if ($query->is_author) {
			$query->set('post_type', array( 'post', 'customerstory', 'inthenews' ) );
		}
  }
}
add_action('pre_get_posts','tc_search_filter');
