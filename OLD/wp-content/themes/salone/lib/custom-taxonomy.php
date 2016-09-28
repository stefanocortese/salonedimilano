<?php

//CARING
function caring_taxonomy() {
	register_taxonomy(
		'caring-line',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
		'caring',   		 //post type name
		array(
			'hierarchical' 		=> true,
			'label' 			=> 'Gamma',  //Display name
			'query_var' 		=> true,
			'rewrite'			=> array(
					'slug' 			=> 'caring-line', // This controls the base slug that will display before each term
					'with_front' 	=> false // Don't display the category base before
					)
			)
		);
}
add_action( 'init', 'caring_taxonomy');


function filter_post_type_link_caring( $link, $post) {
    if ( $post->post_type != 'caring' )
        return $link;

    if ($cats = get_the_terms( $post->ID, 'caring-line' ))
        $link = str_replace( '%caring-line%', array_pop($cats)->slug, $link );
    return $link;
}
add_filter('post_type_link', 'filter_post_type_link_caring', 10, 2);


//COLOR
function coloring_taxonomy() {
	register_taxonomy(
		'coloring-line',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
		'coloring',   		 //post type name
		array(
			'hierarchical' 		=> true,
			'label' 			=> 'Gamma',  //Display name
			'query_var' 		=> true,
			'rewrite'			=> array(
					'slug' 			=> 'coloring-line', // This controls the base slug that will display before each term
					'with_front' 	=> false // Don't display the category base before
					)
			)
		);
}
add_action( 'init', 'coloring_taxonomy');


function filter_post_type_link_coloring( $link, $post) {
    if ( $post->post_type != 'coloring' )
        return $link;

    if ($cats = get_the_terms( $post->ID, 'coloring-line' ))
        $link = str_replace( '%coloring-line%', array_pop($cats)->slug, $link );
    return $link;
}
add_filter('post_type_link', 'filter_post_type_link_coloring', 10, 2);

//straightening
function straightening_taxonomy() {
	register_taxonomy(
		'straightening-line',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
		'straightening',   		 //post type name
		array(
			'hierarchical' 		=> true,
			'label' 			=> 'Gamma',  //Display name
			'query_var' 		=> true,
			'rewrite'			=> array(
					'slug' 			=> 'straightening-line', // This controls the base slug that will display before each term
					'with_front' 	=> false // Don't display the category base before
					)
			)
		);
}
add_action( 'init', 'straightening_taxonomy');


function filter_post_type_link_straightening( $link, $post) {
    if ( $post->post_type != 'straightening' )
        return $link;

    if ($cats = get_the_terms( $post->ID, 'straightening-line' ))
        $link = str_replace( '%straightening-line%', array_pop($cats)->slug, $link );
    return $link;
}
add_filter('post_type_link', 'filter_post_type_link_straightening', 10, 2);

