<?php
/**
 * The template for displaying Custom Posts Caring line
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Salone_Milano
 * @since Salone Milano 1.0
 */

get_header(); ?>

	<section id="primary" class="site-content">
		<div id="content" class="content-tax" role="main">
		

		<?php if ( have_posts() ) : ?> 

			<?php
			  //RECUPERO IL NOME DEL CUSTOM POST DI APPARTENENZA 
			  $post_type = get_post_type_object( get_post_type($post) );
			  $page = get_page_by_title( 'Caring' );

						if(function_exists('icl_object_id')) {
						   $post = get_page_by_path($page->post_name);
						   $id = icl_object_id($post->ID,'page',true);
						   $link = get_permalink($id);
						}

			?>

			<span class="back-category"><a href="<?php echo $link; ?>"><?php echo $post_type->label; ?></a></span>

			
			<?php
			
			/* COUNT POST PER PAGE */

			$count = 0;

			$tot_span = 12;

			

			while ( have_posts() ) :  the_post();

				$count++;

			endwhile;
			
			//Aggiugno la classe span alla funzione post_class per dare la dmensione esatta alla griglia
			$span = $tot_span / $count;

			if($span > 12):
				$span = 12;
			else:
				if($span ==6):
					$span = $span.'tax';
				else:
					$span = $span;
				endif;
			endif;

			global $wp_query;
			$args = array_merge( $wp_query->query_vars, array( 'order'=>'ASC','orderby'=> 'menu_order' ) );
			query_posts( $args );

			/* Start the Loop Article*/
			while ( have_posts() ) :  the_post();

			?>

			    <?php
					$taxonomy_ar = get_the_terms($post->ID,  $post_type->label.'-line');

					  foreach ($taxonomy_ar as $taxonomy_term) {
					    $gamma =  $taxonomy_term->slug;
					  }
					  //STAMPO IL NOME DELLA GAMMA (CATEGORIA)
	
					//STAMPO IL LINK DEL PRODOTTO PER SINGLE.PHP
					$anchor = '#post-'.get_the_ID();
					$args = array('tax' => $gamma);
					$link = add_query_arg( $args, get_post_type_archive_link( $post_type->label ));
					
				?>

			
			<article id="post-<?php the_title(); ?>" <?php post_class('animated fadeIn span'.$span); ?>>
			<?php

				if(wpmd_is_phone()){ 
					
					$switch = get_permalink();
				
				} 
				else{

					$switch = $link.$anchor;

				} 

				?>
			
			<?php 

			$image = get_field('immagine_prodotto');

			if($image){
			?>
			<a href="<?php echo $witch; ?>" title="view the product">
			
			  <img src="<?php echo $image[url]; ?>" alt="<?php the_title(); ?>" class="product-img">

			</a>

			<?php
			}
			?>
				<div class="product-content">

				<header class="product-header"><h1 class="product-title">
				<?php the_field('titolo_prodotto'); ?>
				</h1></header><!-- .entry-header -->

				
				<div class="product-description">	
				  <?php the_field('sottotitolo_prodotto'); ?>

				  <span class="detail"><?php the_field('dettaglio_prodotto'); ?></span>
				
				</div>
				
				<div>
				
				
				<a class="pulsante" href="<?php echo $switch; ?>"title= "view the product"><?php echo icl_t('Caring-Straightening', 'View the products', $value);  ?></a>

				</div>
				
				</div><!-- .entry-content -->

			</article><!-- #post-## -->
		
		<?php
			
			endwhile;

		wp_reset_query();
		?>
			<?php
					
				endif;
			?>
		</div><!-- #content -->
	</section><!-- #primary -->
<?php get_footer(); ?>