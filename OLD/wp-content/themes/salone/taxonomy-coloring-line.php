<?php
/**
 * The template for displaying Custom Posts Coloring line
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
			  

			  //GENERO IL LINK PER IL TASTO BACK ( PLUGIN LINGUE )

			  $page = get_page_by_title( 'Coloring' );

						if(function_exists('icl_object_id')) {
						   $post = get_page_by_path($page->post_name);
						   $id = icl_object_id($post->ID,'page',true);
						   $link = get_permalink($id);
						}

			?>

			<span class="back-category"><a href="<?php echo $link; ?>"><?php echo $post_type->label; ?></a></span>

			
			<?php
			
			global $wp_query;
			$args = array_merge( $wp_query->query_vars, array( 'order'=>'ASC','orderby'=> 'menu_order' ) );
			query_posts( $args );


			/* Start the Loop Article*/
			while ( have_posts() ) : the_post();

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

			
			<article id="post-<?php the_title(); ?>" <?php post_class('animated fadeInDown'); ?> >
			<?php

				if(wpmd_is_phone()){ 
					
					$switch = get_permalink();
				
				} 
				else{

					$switch = $link.$anchor;

				} 

				?>
			
			<?php 		
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'salone-bg');
			?>	

			  <a href="<?php echo $switch; ?>" title="view the product">

			    <img class="color-thumb" src="<?php echo $image[0]; ?>" alt="<?php the_field('sottotitolo_prodotto'); ?>">	
				
			  </a>
			  
				<div class="product-content">

				<header class="product-header"><h1 class="product-title">
				<?php the_field('titolo_prodotto'); ?>
				</h1></header><!-- .entry-header -->


				<a class="pulsante" href="<?php echo $switch; ?>"title= "view the product"><?php echo icl_t('Caring-Straightening', 'View the products', $value);  ?></a>
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