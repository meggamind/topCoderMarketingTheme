<?php
// Register Taxonomy Story Category
// Taxonomy Key: customerstorycategor
function create_customerstorycategory_tax() {

	$labels = array(
		'name'              => _x( 'Story Categories', 'taxonomy general name', 'topcoder2marketing' ),
		'singular_name'     => _x( 'Story Category', 'taxonomy singular name', 'topcoder2marketing' ),
		'search_items'      => __( 'Search Story Categories', 'topcoder2marketing' ),
		'all_items'         => __( 'All Story Categories', 'topcoder2marketing' ),
		'parent_item'       => __( 'Parent Story Category', 'topcoder2marketing' ),
		'parent_item_colon' => __( 'Parent Story Category:', 'topcoder2marketing' ),
		'edit_item'         => __( 'Edit Story Category', 'topcoder2marketing' ),
		'update_item'       => __( 'Update Story Category', 'topcoder2marketing' ),
		'add_new_item'      => __( 'Add New Story Category', 'topcoder2marketing' ),
		'new_item_name'     => __( 'New Story Category Name', 'topcoder2marketing' ),
		'menu_name'         => __( 'Story Category', 'topcoder2marketing' ),
	);
	$rewrite = array(
		'slug'                  => 'about-topcoder/customer-story-category',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'labels' => $labels,
		'description' => __( 'Custom Category Taxonomy for Story Post Type', 'topcoder2marketing' ),
		'hierarchical' => false,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_in_rest' => false,
		'show_tagcloud' => true,
		'show_in_quick_edit' => true,
		'show_admin_column' => true,
    'rewrite' => $rewrite,
	);
	register_taxonomy( 'customerstorycategor', array('customerstory', ), $args );

}
add_action( 'init', 'create_customerstorycategory_tax', 0 );

// Register Taxonomy In the News Category
// Taxonomy Key: inthenewscat
function create_inthenews_tax() {

	$labels = array(
		'name'              => _x( 'In The News Categories', 'taxonomy general name', 'topcoder2marketing' ),
		'singular_name'     => _x( 'In The News Category', 'taxonomy singular name', 'topcoder2marketing' ),
		'search_items'      => __( 'Search In The News Categories', 'topcoder2marketing' ),
		'all_items'         => __( 'All In The News Categories', 'topcoder2marketing' ),
		'parent_item'       => __( 'Parent In The News Category', 'topcoder2marketing' ),
		'parent_item_colon' => __( 'Parent In The News Category:', 'topcoder2marketing' ),
		'edit_item'         => __( 'Edit In The News Category', 'topcoder2marketing' ),
		'update_item'       => __( 'Update In The News Category', 'topcoder2marketing' ),
		'add_new_item'      => __( 'Add New In The News Category', 'topcoder2marketing' ),
		'new_item_name'     => __( 'New In The News Category Name', 'topcoder2marketing' ),
		'menu_name'         => __( 'In The News Category', 'topcoder2marketing' ),
	);
	$rewrite = array(
		'slug'                  => 'about-topcoder/in-the-news-category',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'labels' => $labels,
		'description' => __( 'Custom Category Taxonomy for In The News Post Type', 'topcoder2marketing' ),
		'hierarchical' => false,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_in_rest' => false,
		'show_tagcloud' => true,
		'show_in_quick_edit' => true,
		'show_admin_column' => true,
    'rewrite' => $rewrite,
	);
	register_taxonomy( 'inthenewscat', array('inthenews', ), $args );

}
add_action( 'init', 'create_inthenews_tax', 0 );
