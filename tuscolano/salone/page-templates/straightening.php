<?php
/**
 * Template Name: Straightening Page
 *
 * @package WordPress
 * @subpackage Salone_Milano
 * @since Salone Milano 1.0
 */

get_header(); ?>

<div id="main-content" class="main-content">

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

		<?php

		function my_sort_terms_function($a, $b) {
		  if ($a->sort_order == $b->sort_order) {
		    return 0;
		  } elseif ($a->sort_order < $b->sort_order) {
		    return -1;
		  } else {
		    return 1;
		  }
		}

		$customPostTaxonomies = get_object_taxonomies('straightening');

		if(count($customPostTaxonomies) > 0)
		{
			
		     foreach($customPostTaxonomies as $tax)
		     {
			     
			     $args = array(
			     	'fields' => 'all'
		        	);

			    $categories  = get_terms($tax, $args);

			    $count = count($categories);
				for ($i=0; $i<$count; $i++) {
				 if($categories[$i] != null){
				  	$categories[$i]->sort_order = get_field('order', $tax.'_'.$categories[$i]->term_id);
				  }
				}
				usort($categories, 'my_sort_terms_function');
			     
			     foreach ((array)$categories as $category) {

			     	$image = get_field('bg', $category);

				     $output = '<div class="';

				     $output .= $category->slug;

				     $output .= '">';

				     $output .= '<img src='.$image[url].' class="bgCat">';

				     $output .= '<div class="content-range animated fadeIn">';

				     $output .= '<h1 class="range-name animated fadeIn"> STRAIGHTENING </h1>';

				     $output .= '<h2 class="category-name animated fadeIn">';

				     $output .= $category->name;

				     $output .= '</h2>';
				     /*

				     $output .= '<p class="category-description">';

				     // DESCRIZIONE SOLO PER COLORING INTERNO GAMMA

				     //$output .= $category->description;

				     $output .= '</p>';
					*/
				    
				     $output .= '<a class="pulsante animated fadeIn" href="'. get_term_link( $category )  . '" title= "Go to the section '. $category->name .'">'. icl_t('Caring-Straightening', 'View the products', $value) .'</a>';
				    
				     $output .= '</div>';//end content range

				     $output .= '</div>';

			         echo  $output;
			     	
			     }
			    
		     }

		}
		
		wp_reset_query();

		?>

		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php

get_footer();
