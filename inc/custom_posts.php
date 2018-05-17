<?php
// Register Custom Post Type Customer Story
// Post Type Key: customerstory
function create_customerstory_cpt() {

	$labels = array(
		'name' => __( 'Customer Stories', 'Post Type General Name', 'topcoder2marketing' ),
		'singular_name' => __( 'Customer Story', 'Post Type Singular Name', 'topcoder2marketing' ),
		'menu_name' => __( 'Customer Stories', 'topcoder2marketing' ),
		'name_admin_bar' => __( 'Customer Story', 'topcoder2marketing' ),
		'archives' => __( 'Customer Story Archives', 'topcoder2marketing' ),
		'attributes' => __( 'Customer Story Attributes', 'topcoder2marketing' ),
		'parent_item_colon' => __( 'Parent Customer Story:', 'topcoder2marketing' ),
		'all_items' => __( 'All Customer Stories', 'topcoder2marketing' ),
		'add_new_item' => __( 'Add New Customer Story', 'topcoder2marketing' ),
		'add_new' => __( 'Add New', 'topcoder2marketing' ),
		'new_item' => __( 'New Customer Story', 'topcoder2marketing' ),
		'edit_item' => __( 'Edit Customer Story', 'topcoder2marketing' ),
		'update_item' => __( 'Update Customer Story', 'topcoder2marketing' ),
		'view_item' => __( 'View Customer Story', 'topcoder2marketing' ),
		'view_items' => __( 'View Customer Stories', 'topcoder2marketing' ),
		'search_items' => __( 'Search Customer Story', 'topcoder2marketing' ),
		'not_found' => __( 'Not found', 'topcoder2marketing' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'topcoder2marketing' ),
		'featured_image' => __( 'Featured Image', 'topcoder2marketing' ),
		'set_featured_image' => __( 'Set featured image', 'topcoder2marketing' ),
		'remove_featured_image' => __( 'Remove featured image', 'topcoder2marketing' ),
		'use_featured_image' => __( 'Use as featured image', 'topcoder2marketing' ),
		'insert_into_item' => __( 'Insert into Customer Story', 'topcoder2marketing' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Customer Story', 'topcoder2marketing' ),
		'items_list' => __( 'Customer Stories list', 'topcoder2marketing' ),
		'items_list_navigation' => __( 'Customer Stories list navigation', 'topcoder2marketing' ),
		'filter_items_list' => __( 'Filter Customer Stories list', 'topcoder2marketing' ),
	);
  $rewrite = array(
		'slug'                  => 'about-topcoder/customer-stories',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label' => __( 'Customer Story', 'topcoder2marketing' ),
		'description' => __( 'Customer Story Post Type', 'topcoder2marketing' ),
		'labels' => $labels,
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'author' ),
		'taxonomies' => array('customerstorycategor', ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
    'menu_icon' => 'dashicons-format-aside',
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
    'rewrite' => $rewrite,
	);
	register_post_type( 'customerstory', $args );

}
add_action( 'init', 'create_customerstory_cpt', 0 );

// Register Custom Post Type In The News
// Post Type Key: inthenews
function create_inthenews_cpt() {

	$labels = array(
		'name' => __( 'In The News', 'Post Type General Name', 'topcoder2marketing' ),
		'singular_name' => __( 'In The News', 'Post Type Singular Name', 'topcoder2marketing' ),
		'menu_name' => __( 'In The News', 'topcoder2marketing' ),
		'name_admin_bar' => __( 'In The News', 'topcoder2marketing' ),
		'archives' => __( 'In The News Archives', 'topcoder2marketing' ),
		'attributes' => __( 'In The News Attributes', 'topcoder2marketing' ),
		'parent_item_colon' => __( 'Parent In The News:', 'topcoder2marketing' ),
		'all_items' => __( 'All In The News', 'topcoder2marketing' ),
		'add_new_item' => __( 'Add New In The News', 'topcoder2marketing' ),
		'add_new' => __( 'Add New', 'topcoder2marketing' ),
		'new_item' => __( 'New In The News', 'topcoder2marketing' ),
		'edit_item' => __( 'Edit In The News', 'topcoder2marketing' ),
		'update_item' => __( 'Update In The News', 'topcoder2marketing' ),
		'view_item' => __( 'View In The News', 'topcoder2marketing' ),
		'view_items' => __( 'View Customer Stories', 'topcoder2marketing' ),
		'search_items' => __( 'Search In The News', 'topcoder2marketing' ),
		'not_found' => __( 'Not found', 'topcoder2marketing' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'topcoder2marketing' ),
		'featured_image' => __( 'Featured Image', 'topcoder2marketing' ),
		'set_featured_image' => __( 'Set featured image', 'topcoder2marketing' ),
		'remove_featured_image' => __( 'Remove featured image', 'topcoder2marketing' ),
		'use_featured_image' => __( 'Use as featured image', 'topcoder2marketing' ),
		'insert_into_item' => __( 'Insert into In The News', 'topcoder2marketing' ),
		'uploaded_to_this_item' => __( 'Uploaded to this In The News', 'topcoder2marketing' ),
		'items_list' => __( 'Customer Stories list', 'topcoder2marketing' ),
		'items_list_navigation' => __( 'In The News list navigation', 'topcoder2marketing' ),
		'filter_items_list' => __( 'Filter In The News list', 'topcoder2marketing' ),
	);
  $rewrite = array(
		'slug'                  => 'about-topcoder/in-the-news',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label' => __( 'In The News', 'topcoder2marketing' ),
		'description' => __( 'In The News Post Type', 'topcoder2marketing' ),
		'labels' => $labels,
		'supports' => array('title', 'author'),
		'taxonomies' => array('inthenewscat', ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
    'menu_icon' => 'dashicons-megaphone',
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
    'rewrite' => $rewrite,
	);
	register_post_type( 'inthenews', $args );

}
add_action( 'init', 'create_inthenews_cpt', 0 );
