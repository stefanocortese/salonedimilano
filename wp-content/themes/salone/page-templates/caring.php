<?php
/**
 * Template Name: Caring Page
 *
 * @package WordPress
 * @subpackage Salone_Milano
 * @since Salone Milano 1.0
 */

get_header(); ?>

<div id="featured-content" class="featured-content owl-carousel">
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
	$customPostTaxonomies = get_object_taxonomies('caring');
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
				$output = '<div class="item" style="background:url('.$image[url].') no-repeat scroll center center / cover  #fff">
				<div class="blackVeil">
					<div class="containerCaption">
						<div class="content-range animated fadeIn">
							<h1 class="range-name animated fadeIn"> CARING </h1>
							<h2 class="category-name animated fadeIn">';
								$output .= $category->name;
								$output .= '</h2>';
								$output .= '<a class="pulsante animated fadeIn" href="'. get_term_link( $category )  . '" title= "Go to the section '. $category->name .'">' . icl_t('Caring-Straightening', 'View the products', $value) .'</a>';
				$output .= '</div>';//end content range
				$output .= '</div>';//end containerCaption
				$output .= '</div>';//end blackVeil
				$output .= '</div>';//end item
				echo  $output;
			}
		}
	}
	wp_reset_query();
	?>
</div> <!--featured-content -->

</div>


<?php

get_footer();
