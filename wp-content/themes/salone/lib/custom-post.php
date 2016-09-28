<?php

/* CUSTOM POST WITHOUT CATEGORIES */

//HERITAGE
add_action( 'init', 'register_heritage_sections', 20 );
function register_heritage_sections() {
    $labels = array(
		'name' => __( 'heritage'),
		'singular_name' => __( 'Heritage'),
		'add_new' => __( 'Add New Section'),
		'add_new_item' => __( 'Add New Section'),
		'all_items'    => __( 'All Sections' ),
		'edit_item' => __( 'Edit Heritage Section'),
		'new_item' => __( 'New Heritage Section' ),
		'view_item' => __( 'View Heritage Section' ),
		'search_items' => __( 'Search Heritage Section' ),
		'not_found' => __( 'No Heritage Section found' ),
		'not_found_in_trash' => __( 'No Heritage Section found in Trash' ),
		'parent_item_colon' => __( 'Parent Heritage Section:' ),
		'menu_name' => __( 'Heritage' ),
    );

    $args = array(
		'labels' => $labels,
		'hierarchical' => false,
		'description' => 'Heritage Sections',
		'supports' => array( 'title', 'page-attributes' ),
		'show_ui' => true,
		'show_in_menu' => true,
	    'show_in_admin_bar'   => true,
		'menu_position' => 11,
		'menu_icon' => get_stylesheet_directory_uri() . 'images/catchinternet-small.png',
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'query_var' => true,
		'can_export' => true,
		'public' => true,
		'has_archive' => 'heritage',
		'capability_type' => 'post'
    );
	register_post_type( 'heritage', $args );
}

//INSPIRATION
add_action( 'init', 'register_inspiration_sections', 20 );
function register_inspiration_sections() {
    $labels = array(
		'name' => __( 'inspiration'),
		'singular_name' => __( 'Inspiration'),
		'add_new' => __( 'Add New Section'),
		'add_new_item' => __( 'Add New Section'),
		'all_items'    => __( 'All Sections' ),
		'edit_item' => __( 'Edit Inspiration Section'),
		'new_item' => __( 'New Inspiration Section' ),
		'view_item' => __( 'View Inspiration Section' ),
		'search_items' => __( 'Search Inspiration Section' ),
		'not_found' => __( 'No Inspiration Section found' ),
		'not_found_in_trash' => __( 'No Inspiration Section found in Trash' ),
		'parent_item_colon' => __( 'Parent Inspiration Section:' ),
		'menu_name' => __( 'Inspiration' ),
    );

    $args = array(
		'labels' => $labels,
		'hierarchical' => false,
		'description' => 'Inspiration Sections',
		'supports' => array( 'title', 'page-attributes' ),
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_admin_bar'   => true,
		'menu_position' => 12,
		'menu_icon' => get_stylesheet_directory_uri() . 'images/catchinternet-small.png',
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'query_var' => true,
		'can_export' => true,
		'public' => true,
		'has_archive' => 'inspiration',
		'capability_type' => 'post'
    );
	register_post_type( 'inspiration', $args );
}


/* CUSTOM POST WITH CATEGORIES */


//CARING
add_action( 'init', 'register_caring_products', 20 );
function register_caring_products() {
    $labels = array(
		'name' => __( 'caring'),
		'singular_name' => __( 'Caring'),
		'add_new' => __( 'Add New Product'),
		'add_new_item' => __( 'Add New Product'),
		'all_items'    => __( 'All Products' ),
		'edit_item' => __( 'Edit Caring Product'),
		'new_item' => __( 'New Caring Product' ),
		'view_item' => __( 'View Caring Product' ),
		'search_items' => __( 'Search Caring Product' ),
		'not_found' => __( 'No Caring Product found' ),
		'not_found_in_trash' => __( 'No Caring Product found in Trash' ),
		'parent_item_colon' => __( 'Parent Caring Product:' ),
		'menu_name' => __( 'Caring' ),
    );

    $args = array(
		'labels' => $labels,
		'hierarchical' => false,
		'description' => 'Caring Products',
		'supports' => array( 'title', 'page-attributes' ),
		'taxonomies' => array('caring-line'),
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_admin_bar'   => true,
		'menu_position' => 13,
		'menu_icon' => get_stylesheet_directory_uri() . 'images/catchinternet-small.png',
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => array('slug' => 'caring/%caring-line%','with_front' => FALSE),
		'public' => true,
		'has_archive' => 'caring',
		'capability_type' => 'post'
    );
	register_post_type( 'caring', $args );
}

//Color
add_action( 'init', 'register_coloring_products', 20 );
function register_coloring_products() {
    $labels = array(
		'name' => __( 'coloring'),
		'singular_name' => __( 'Coloring'),
		'add_new' => __( 'Add New Product'),
		'add_new_item' => __( 'Add New Product'),
		'all_items'    => __( 'All Products' ),
		'edit_item' => __( 'Edit Coloring Product'),
		'new_item' => __( 'New Coloring Product' ),
		'view_item' => __( 'View Coloring Product' ),
		'search_items' => __( 'Search Coloring Product' ),
		'not_found' => __( 'No Coloring Product found' ),
		'not_found_in_trash' => __( 'No Coloring Product found in Trash' ),
		'parent_item_colon' => __( 'Parent Coloring Product:' ),
		'menu_name' => __( 'Coloring' ),
    );

    $args = array(
		'labels' => $labels,
		'hierarchical' => false,
		'description' => 'Coloring Products',
		'supports' => array( 'title', 'page-attributes', 'thumbnail' ),
		'taxonomies' => array('coloring-line'),
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_admin_bar'   => true,
		'menu_position' => 14,
		'menu_icon' => get_stylesheet_directory_uri() . '/functions/panel/images/catchinternet-small.png',
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => array('slug' => 'coloring/%coloring-line%','with_front' => FALSE),
		'public' => true,
		'has_archive' => 'coloring',
		'capability_type' => 'post'
    );
	register_post_type( 'coloring', $args );
}

//straightening

add_action( 'init', 'register_straightening_products', 20 );
function register_straightening_products() {
    $labels = array(
		'name' => __( 'straightening'),
		'singular_name' => __( 'Straightening'),
		'add_new' => __( 'Add New Product'),
		'add_new_item' => __( 'Add New Product'),
		'all_items'    => __( 'All Products' ),
		'edit_item' => __( 'Edit Atraightening Product'),
		'new_item' => __( 'New Atraightening Product' ),
		'view_item' => __( 'View Straightening Product' ),
		'search_items' => __( 'Search Straightening Product' ),
		'not_found' => __( 'No Straightening Product found' ),
		'not_found_in_trash' => __( 'No Straightening Product found in Trash' ),
		'parent_item_colon' => __( 'Parent Straightening Product:' ),
		'menu_name' => __( 'Straightening' ),
    );

    $args = array(
		'labels' => $labels,
		'hierarchical' => false,
		'description' => 'Straightening Products',
		'supports' => array( 'title', 'page-attributes' ),
		'taxonomies' => array('straightening-line'),
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_admin_bar'   => true,
		'menu_position' => 13,
		'menu_icon' => get_stylesheet_directory_uri() . 'images/catchinternet-small.png',
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => array('slug' => 'straightening/%straightening-line%','with_front' => FALSE),
		'public' => true,
		'has_archive' => 'straightening',
		'capability_type' => 'post'
    );
	register_post_type( 'straightening', $args );
}
