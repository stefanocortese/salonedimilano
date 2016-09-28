<?php

/*
------------------------------------------

	HERITAGE

------------------------------------------
*/

add_action( 'init', 'create_post_type_heritage' );
function create_post_type_heritage() {
  register_post_type( 'heritage',
    array(
      'labels' => array(
        'name' => __( 'Heritage' ),
        'singular_name' => __( 'Heritage' ),
        'menu_name' => __( 'Heritage' ),
        'menu_icon' => '',
        'all_items'           => __( 'All Sections' ),
        'add_new' => __( 'Add Section' ),
        'add_new_item' => __( 'Add New Section' ),
        'edit_item' => __( 'Edit Section' ),
        'new_item' => __( 'New Section' ),
        'view' => __( 'View Section' ),
        'view_item' => __( 'View Section' ),
        'search_items' => __( 'Search Section' ),
      ),
      
      'show_in_menu'        => true,
      'show_in_nav_menus'   => true,
	  'show_in_admin_bar'   => true,
	  'menu_position'       => 11,
      'show_ui' => true,
      'exclude_from_search' => true,
      'hierarchical' => true,
      'supports' => array( 'title', 'page-attributes' ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'heritage'),
      'query_var' => true,
	  'can_export' => true,
	  'exclude_from_search' => false,
	  'publicly_queryable'  => true,
	  'with_front' => true
    )
  );
}


add_action( 'pre_get_posts', 'add_heritage_post_types_to_query' );



/* AGGIUNGO IL CUSTOM POST ALLA GLOBAL QUERY */

function add_heritage_post_types_to_query( $query ) {
  if ( is_home() && $query->is_main_query() )
    $query->set( 'Heritage', array( 'post', 'page', 'movie' ) );
  return $query;
}


/* Costruisco le colonne del pannello lista sezioni lato back-office*/


function add_new_heritage_columns($heritage_columns) {
    $new_columns['cb'] = '<input type="checkbox" />';

    $new_columns['title'] = _x('Title', 'column name');
     
    $new_columns['menu_order'] = __('Order');
 
    $new_columns['date'] = _x('Date', 'column name');
 
    return $new_columns;
}

add_filter('manage_edit-heritage_columns', 'add_new_heritage_columns');

/* Gestisco la visualizzazione dell'ordine delle sezioni e delle categorie di appartenenza*/

function show_order_column_heritage($name){
  global $post;

  switch ($name) {
    case 'menu_order':
      $order = $post->menu_order;
      echo $order;
      break;
    
    default:
      break;
   }
}

add_action('manage_heritage_posts_custom_column', 'show_order_column_heritage', 10, 2);

/* Gestisco l'hendler per ordinare via Order (default ASC)*/

function order_column_register_sortable_heritage($columns){
 
  $columns['menu_order'] = 'Order';
  return $columns;
}
add_filter('manage_edit-heritage_sortable_columns','order_column_register_sortable_heritage');




/*
------------------------------------------

	CARING

------------------------------------------
*/

/* CREO IL CUSTOM POST TYPE CARING */

add_action( 'init', 'create_post_type_caring' );
function create_post_type_caring() {
  register_post_type( 'caring',
    array(
      'labels' => array(
        'name' => __( 'Caring' ),
        'singular_name' => __( 'Caring' ),
        'menu_name' => __( 'Caring' ),
        'menu_icon' => '',
        'all_items'           => __( 'All Products' ),
        'add_new' => __( 'Add Product' ),
        'add_new_item' => __( 'Add New Product' ),
        'edit_item' => __( 'Edit Product' ),
        'new_item' => __( 'New Product' ),
        'view' => __( 'View Product' ),
        'view_item' => __( 'View Product' ),
        'search_items' => __( 'Search Product' ),
      ),
      
      'show_in_menu'        => true,
      'show_in_nav_menus'   => true,
	  'show_in_admin_bar'   => true,
	  'menu_position'       => 12,
      'show_ui' => true,
      'exclude_from_search' => true,
      'hierarchical' => true,
      'supports' => array( 'title', 'page-attributes' ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'caring'),
      'query_var' => true,
	  'can_export' => true,
	  'exclude_from_search' => false,
	  'publicly_queryable'  => true,
	  'with_front' => true
    )
  );
}


add_action( 'pre_get_posts', 'add_caring_post_types_to_query' );



/* AGGIUNGO IL CUSTOM POST ALLA GLOBAL QUERY */

function add_caring_post_types_to_query( $query ) {
  if ( is_home() && $query->is_main_query() )
    $query->set( 'Caring', array( 'post', 'page', 'movie' ) );
  return $query;
}


/* Costruisco le colonne del pannello lista sezioni lato back-office*/


function add_new_caring_columns($heritage_columns) {
    $new_columns['cb'] = '<input type="checkbox" />';

    $new_columns['title'] = _x('Title', 'column name');
     
    $new_columns['menu_categories'] = __('Categories');
    $new_columns['menu_order'] = __('Order');
 
    $new_columns['date'] = _x('Date', 'column name');
 
    return $new_columns;
}

add_filter('manage_edit-caring_columns', 'add_new_caring_columns');

/* Gestisco la visualizzazione dell'ordine delle sezioni e delle categorie di appartenenza*/

function show_order_column_caring($name){
  global $post;

  switch ($name) {
  	case 'menu_categories':
      echo get_the_term_list($post->ID, 'caring_categories', '', ', ','');
      break;
    case 'menu_order':
      $order = $post->menu_order;
      echo $order;
      break;
    
    default:
      break;
   }
}

add_action('manage_caring_posts_custom_column', 'show_order_column_caring', 10, 2);

/* Gestisco l'hendler per ordinare via Order (default ASC)*/

function order_column_register_sortable_caring($columns){
 
  $columns['menu_order'] = 'Order';
  return $columns;
}
add_filter('manage_edit-caring_sortable_columns','order_column_register_sortable_caring');


/*
------------------------------------------

	Couloring

------------------------------------------
*/


add_action( 'init', 'create_post_type_color' );
function create_post_type_color() {
  register_post_type( 'color',
    array(
      'labels' => array(
        'name' => __( 'Color' ),
        'singular_name' => __( 'Color' ),
        'menu_name' => __( 'Couloring' ),
        'menu_icon' => '',
        'all_items'           => __( 'All Products' ),
        'add_new' => __( 'Add Product' ),
        'add_new_item' => __( 'Add New Product' ),
        'edit_item' => __( 'Edit Product' ),
        'new_item' => __( 'New Product' ),
        'view' => __( 'View Product' ),
        'view_item' => __( 'View Product' ),
        'search_items' => __( 'Search Product' ),
      ),
      
      'show_in_menu'        => true,
      'show_in_nav_menus'   => true,
	  'show_in_admin_bar'   => true,
	  'menu_position'       => 13,
      'show_ui' => true,
      'exclude_from_search' => true,
      'hierarchical' => true,
      'supports' => array( 'title', 'page-attributes' ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'color'),
      'query_var' => true,
	  'can_export' => true,
	  'exclude_from_search' => false,
	  'publicly_queryable'  => true,
	  'with_front' => true
    )
  );
}


add_action( 'pre_get_posts', 'add_color_post_types_to_query' );



/* AGGIUNGO IL CUSTOM POST ALLA GLOBAL QUERY */

function add_color_post_types_to_query( $query ) {
  if ( is_home() && $query->is_main_query() )
    $query->set( 'Color', array( 'post', 'page', 'movie' ) );
  return $query;
}


/* Costruisco le colonne del pannello lista sezioni lato back-office*/


function add_new_color_columns($color_columns) {
    $new_columns['cb'] = '<input type="checkbox" />';

    $new_columns['title'] = _x('Title', 'column name');
     
    $new_columns['menu_categories'] = __('Categories');
    $new_columns['menu_order'] = __('Order');
 
    $new_columns['date'] = _x('Date', 'column name');
 
    return $new_columns;
}

add_filter('manage_edit-color_columns', 'add_new_color_columns');

/* Gestisco la visualizzazione dell'ordine delle sezioni e delle categorie di appartenenza*/

function show_order_column_color($name){
  global $post;

  switch ($name) {
  	case 'menu_categories':
      echo get_the_term_list($post->ID, 'color_categories', '', ', ','');
      break;
    case 'menu_order':
      $order = $post->menu_order;
      echo $order;
      break;
    
    default:
      break;
   }
}

add_action('manage_color_posts_custom_column', 'show_order_column_color', 10, 2);

/* Gestisco l'handler per ordinare via Order (default ASC)*/

function order_column_register_sortable_color($columns){
 
  $columns['menu_order'] = 'Order';
  return $columns;
}
add_filter('manage_edit-color_sortable_columns','order_column_register_sortable_color');

/*
------------------------------------------

	Straightening

------------------------------------------
*/


add_action( 'init', 'create_post_type_straightening' );
function create_post_type_straightening() {
  register_post_type( 'straightening',
    array(
      'labels' => array(
        'name' => __( 'Straightening' ),
        'singular_name' => __( 'Straightening' ),
        'menu_name' => __( 'Straightening' ),
        'menu_icon' => '',
        'all_items'           => __( 'All Products' ),
        'add_new' => __( 'Add Product' ),
        'add_new_item' => __( 'Add New Product' ),
        'edit_item' => __( 'Edit Product' ),
        'new_item' => __( 'New Product' ),
        'view' => __( 'View Product' ),
        'view_item' => __( 'View Product' ),
        'search_items' => __( 'Search Product' ),
      ),
      
      'show_in_menu'        => true,
      'show_in_nav_menus'   => true,
	  'show_in_admin_bar'   => true,
	  'menu_position'       => 14,
      'show_ui' => true,
      'exclude_from_search' => true,
      'hierarchical' => true,
      'supports' => array( 'title', 'page-attributes' ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'straightening'),
      'query_var' => true,
	  'can_export' => true,
	  'exclude_from_search' => false,
	  'publicly_queryable'  => true,
	  'with_front' => true
    )
  );
}


add_action( 'pre_get_posts', 'add_straightening_post_types_to_query' );



/* AGGIUNGO IL CUSTOM POST ALLA GLOBAL QUERY */

function add_straightening_post_types_to_query( $query ) {
  if ( is_home() && $query->is_main_query() )
    $query->set( 'Straightening', array( 'post', 'page', 'movie' ) );
  return $query;
}


/* Costruisco le colonne del pannello lista sezioni lato back-office*/


function add_new_straightening_columns($straightening_columns) {
    $new_columns['cb'] = '<input type="checkbox" />';

    $new_columns['title'] = _x('Title', 'column name');
     
    $new_columns['menu_categories'] = __('Categories');
    $new_columns['menu_order'] = __('Order');
 
    $new_columns['date'] = _x('Date', 'column name');
 
    return $new_columns;
}

add_filter('manage_edit-straightening_columns', 'add_new_straightening_columns');

/* Gestisco la visualizzazione dell'ordine delle sezioni e delle categorie di appartenenza*/

function show_order_column_straightening($name){
  global $post;

  switch ($name) {
  	case 'menu_categories':
      echo get_the_term_list($post->ID, 'straightening_categories', '', ', ','');
      break;
    case 'menu_order':
      $order = $post->menu_order;
      echo $order;
      break;
    
    default:
      break;
   }
}

add_action('manage_straightening_posts_custom_column', 'show_order_column_straightening', 10, 2);

/* Gestisco l'handler per ordinare via Order (default ASC)*/

function order_column_register_sortable_straightening($columns){
 
  $columns['menu_order'] = 'Order';
  return $columns;
}
add_filter('manage_edit-straightening_sortable_columns','order_column_register_sortable_straightening');

/*
------------------------------------------

	LookBook

------------------------------------------
*/

add_action( 'init', 'create_post_type_lookbook' );
function create_post_type_lookbook() {
  register_post_type( 'lookbook',
    array(
      'labels' => array(
        'name' => __( 'Lookbook' ),
        'singular_name' => __( 'Lookbook' ),
        'menu_name' => __( 'Lookbook' ),
        'menu_icon' => '',
        'all_items'           => __( 'All Sections' ),
        'add_new' => __( 'Add Section' ),
        'add_new_item' => __( 'Add New Section' ),
        'edit_item' => __( 'Edit Section' ),
        'new_item' => __( 'New Section' ),
        'view' => __( 'View Section' ),
        'view_item' => __( 'View Section' ),
        'search_items' => __( 'Search Section' ),
      ),
      
      'show_in_menu'        => true,
      'show_in_nav_menus'   => true,
	  'show_in_admin_bar'   => true,
	  'menu_position'       => 15,
      'show_ui' => true,
      'exclude_from_search' => true,
      'hierarchical' => true,
      'supports' => array( 'title', 'page-attributes' ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'lookbook'),
      'query_var' => true,
	  'can_export' => true,
	  'exclude_from_search' => false,
	  'publicly_queryable'  => true,
	  'with_front' => true
    )
  );
}


add_action( 'pre_get_posts', 'add_lookbook_post_types_to_query' );



/* AGGIUNGO IL CUSTOM POST ALLA GLOBAL QUERY */

function add_lookbook_post_types_to_query( $query ) {
  if ( is_home() && $query->is_main_query() )
    $query->set( 'lookbook', array( 'post', 'page', 'movie' ) );
  return $query;
}


/* Costruisco le colonne del pannello lista sezioni lato back-office*/


function add_new_lookbook_columns($lookbook_columns) {
    $new_columns['cb'] = '<input type="checkbox" />';

    $new_columns['title'] = _x('Title', 'column name');
     
    $new_columns['menu_order'] = __('Order');
 
    $new_columns['date'] = _x('Date', 'column name');
 
    return $new_columns;
}

add_filter('manage_edit-lookbook_columns', 'add_new_lookbook_columns');

/* Gestisco la visualizzazione dell'ordine delle sezioni e delle categorie di appartenenza*/

function show_order_column_lookbook($name){
  global $post;

  switch ($name) {
    case 'menu_order':
      $order = $post->menu_order;
      echo $order;
      break;
    
    default:
      break;
   }
}

add_action('manage_lookbook_posts_custom_column', 'show_order_column_lookbook', 10, 2);

/* Gestisco l'hendler per ordinare via Order (default ASC)*/

function order_column_register_sortable_lookbook($columns){
 
  $columns['menu_order'] = 'Order';
  return $columns;
}
add_filter('manage_edit-lookbook_sortable_columns','order_column_register_sortable_lookbook');


?>