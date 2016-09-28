<?php

/*
-------------------------------------------------

  SEZIONE CARING

-------------------------------------------------


*/


function my_taxonomies_caring() {
  $labels = array(
    'name'              => _x( 'Carings Categories', 'taxonomy general name' ),
    'singular_name'     => _x( 'Caring Category', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Caring Categories' ),
    'all_items'         => __( 'All Caring Categories' ),
    'parent_item'       => __( 'Parent Caring Category' ),
    'parent_item_colon' => __( 'Parent Caring Category:' ),
    'edit_item'         => __( 'Edit Caring Category' ), 
    'update_item'       => __( 'Update Caring Category' ),
    'add_new_item'      => __( 'Add New Caring Category' ),
    'new_item_name'     => __( 'New Caring Category' ),
    'menu_name'         => __( 'Caring Categories' ),
    'show_admin_column' => true,
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,

  );
  register_taxonomy( 'caring_categories', 'caring', $args );
}
add_action( 'init', 'my_taxonomies_caring', 0 );


/*
-------------------------------------------------

  SEZIONE COULORING

-------------------------------------------------


*/


function my_taxonomies_color() {
  $labels = array(
    'name'              => _x( 'Colors Categories', 'taxonomy general name' ),
    'singular_name'     => _x( 'Color Category', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Color Categories' ),
    'all_items'         => __( 'All Color Categories' ),
    'parent_item'       => __( 'Parent Color Category' ),
    'parent_item_colon' => __( 'Parent Color Category:' ),
    'edit_item'         => __( 'Edit Color Category' ), 
    'update_item'       => __( 'Update Color Category' ),
    'add_new_item'      => __( 'Add New Color Category' ),
    'new_item_name'     => __( 'New Color Category' ),
    'menu_name'         => __( 'Color Categories' ),
    'show_admin_column' => true,
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,

  );
  register_taxonomy( 'color_categories', 'color', $args );
}
add_action( 'init', 'my_taxonomies_color', 0 );

//************************
/*
-------------------------------------------------

  SEZIONE Straightening

-------------------------------------------------


*/


function my_taxonomies_straightening() {
  $labels = array(
    'name'              => _x( 'Straightenings Categories', 'taxonomy general name' ),
    'singular_name'     => _x( 'Straightening Category', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Straightening Categories' ),
    'all_items'         => __( 'All Straightening Categories' ),
    'parent_item'       => __( 'Parent Straightening Category' ),
    'parent_item_colon' => __( 'Parent Straightening Category:' ),
    'edit_item'         => __( 'Edit Straightening Category' ), 
    'update_item'       => __( 'Update Straightening Category' ),
    'add_new_item'      => __( 'Add New Straightening Category' ),
    'new_item_name'     => __( 'New Straightening Category' ),
    'menu_name'         => __( 'Straightening Categories' ),
    'show_admin_column' => true,
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,

  );
  register_taxonomy( 'straightening_categories', 'straightening', $args );
}
add_action( 'init', 'my_taxonomies_straightening', 0 );



?>
