<?php

//HERITAGE

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


//CARING

function add_new_caring_columns($heritage_columns) {
    $new_columns['cb'] = '<input type="checkbox" />';

    $new_columns['title'] = _x('Title', 'column name');
     
    $new_columns['menu_categories'] = __('Lines');
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
      echo get_the_term_list($post->ID, 'caring-line', '', ', ','');
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

//COLOR

function add_new_coloring_columns($color_columns) {
    $new_columns['cb'] = '<input type="checkbox" />';

    $new_columns['title'] = _x('Title', 'column name');
     
    $new_columns['menu_categories'] = __('Lines');
    $new_columns['menu_order'] = __('Order');
 
    $new_columns['date'] = _x('Date', 'column name');
 
    return $new_columns;
}

add_filter('manage_edit-coloring_columns', 'add_new_coloring_columns');

/* Gestisco la visualizzazione dell'ordine delle sezioni e delle categorie di appartenenza*/

function show_order_column_coloring($name){
  global $post;

  switch ($name) {
    case 'menu_categories':
      echo get_the_term_list($post->ID, 'coloring-line', '', ', ','');
      break;
    case 'menu_order':
      $order = $post->menu_order;
      echo $order;
      break;
    
    default:
      break;
   }
}
add_action('manage_coloring_posts_custom_column', 'show_order_column_coloring', 10, 2);
/* Gestisco l'hendler per ordinare via Order (default ASC)*/

function order_column_register_sortable_coloring($columns){
 
  $columns['menu_order'] = 'Order';
  return $columns;
}
add_filter('manage_edit-coloring_sortable_columns','order_column_register_sortable_coloring');


//STRAIGTHNESS

function add_straightening_post_types_to_query( $query ) {
  if ( is_home() && $query->is_main_query() )
    $query->set( 'Straightening', array( 'post', 'page', 'movie' ) );
  return $query;
}


/* Costruisco le colonne del pannello lista sezioni lato back-office*/


function add_new_straightening_columns($straightening_columns) {
    $new_columns['cb'] = '<input type="checkbox" />';

    $new_columns['title'] = _x('Title', 'column name');
     
    $new_columns['menu_categories'] = __('Lines');
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
      echo get_the_term_list($post->ID, 'straightening-line', '', ', ','');
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

//INSPIRATION

function add_new_inspiration_columns($inspiration_columns) {
    $new_columns['cb'] = '<input type="checkbox" />';

    $new_columns['title'] = _x('Title', 'column name');
     
    $new_columns['menu_order'] = __('Order');
 
    $new_columns['date'] = _x('Date', 'column name');
 
    return $new_columns;
}

add_filter('manage_edit-inspiration_columns', 'add_new_inspiration_columns');

/* Gestisco la visualizzazione dell'ordine delle sezioni e delle categorie di appartenenza*/

function show_order_column_inspiration($name){
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

add_action('manage_inspiration_posts_custom_column', 'show_order_column_inspiration', 10, 2);

/* Gestisco l'hendler per ordinare via Order (default ASC)*/

function order_column_register_sortable_inspiration($columns){
 
  $columns['menu_order'] = 'Order';
  return $columns;
}
add_filter('manage_edit-inspiration_sortable_columns','order_column_register_sortable_inspiration');



