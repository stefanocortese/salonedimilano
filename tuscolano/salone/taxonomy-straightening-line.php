<?php
/**
 * The template for displaying Custom Posts Straightening line
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Salone_Milano
 * @since Salone Milano 1.0
 */

get_header(); ?>

	<section id="primary" class="site-content">
		<div id="content"  class="content-tax " role="main">

		<?php if ( have_posts() ) : ?> 

			<?php	require 'lib/tax-function.php'; ?>

			<?php
			  //RECUPERO IL NOME DEL CUSTOM POST DI APPARTENENZA 
			  $post_type = get_post_type_object( get_post_type($post) );
			?>
			<?php 
				
				if(ICL_LANGUAGE_CODE=='it'):

					$ancor_str = "/it";
				
				elseif(ICL_LANGUAGE_CODE=='pl'):
					
					$ancor_str = "/pl";
				
				else:

					$ancor_str = "";

				endif;

			?>


			<span class="back-category"><a href="<?php echo get_site_url().$ancor_str; ?>/straightening-page"><?php echo $post_type->label; ?></a></span>

			
			<?php

			$tot_span = 12;

			global $wp_query;
			$args = array_merge( $wp_query->query_vars, array( 'order'=>'ASC','orderby'=> 'menu_order' ) );
			query_posts( $args );

			/* Start the Loop Article*/
			while ( have_posts() ) :  the_post();

			?>

			
			<article id="post-<?php the_title(); ?>" data-hash="post-<?php echo get_the_ID(); ?>" <?php post_class('swiper-slide'); ?>>
			

				<?php

					$image = get_field('immagine_prodotto'); 
			
				?>

				<div class="product-image">
					<div class="vCenter">
						<img src="<?php echo $image[url]; ?>" alt="<?php the_title(); ?>" class="bg">
						
						<?php if(ICL_LANGUAGE_CODE=='it'): ?>
							
							<a class="pulsante" href="<?php echo get_site_url(); ?>/store-locator"> <?php echo icl_t('Find-store', 'Find a store', $value);  ?></a>

						<?php endif; ?>
						
					</div>
				</div>

				<div class="product-content">
				<div class="vCenter">

				<?php $post_type = get_post_type_object( get_post_type($post) ); ?>

				<span class="group-name">
				 <?php echo $cpt = $post_type->label; ?>
				</span>

				<?php 
				
				//RECUPERO LA CATEGORIA (GAMMA) DI APPARTENENZA
				if (get_the_terms($post->ID,  $post_type->label.'-line')) {
				  $taxonomy_ar = get_the_terms($post->ID,  $post_type->label.'-line');

				  foreach ($taxonomy_ar as $taxonomy_term) {
				    $output =  $taxonomy_term->name ;
				  }
				  ?>
				  
				  <span class="sub-group-name">
				    <?php echo $output; ?>
				  </span>

				  <?php
				
				}

				?>

					<header class="product-header">

						<h1 class="product-title">

						<?php the_field('titolo_prodotto'); ?>
						
						</h1>

					</header><!-- .entry-header -->

					<div class="product-description">
						
					<?php the_field('sottotitolo_prodotto'); ?>

					  <span class="paragraph-title"><?php the_field('titolo_paragrafo_1_prodotto'); ?></span>

					    <span class="paragraph"><?php the_field('paragrafo_1_prodotto'); ?></span>

					  <span class="sub-paragraph-title"><?php the_field('titolo_paragrafo_2_prodotto'); ?></span>

					    <span class="sub-paragraph"><?php the_field('paragrafo_2_prodotto'); ?></span>

					  <span class="size-title"><?php the_field('titolo_size_prodotto'); ?></span>

					    <span class="size-text"><?php the_field('testo_size_prodotto'); ?></span>

					</div><!-- .product-description -->

					<?php if(exist_ACF_group_by_title('Benefit 1') && get_field('titolo_benefit_1')!=""):?>
					<a class="pulsante show-benefit" href="#"> <?php echo icl_t('Benefit-button', 'Check the benefit', $value);  ?></a>
					<?php endif; ?>
				
				</div><!-- .vCenter -->
				</div><!-- .product-content -->

					<div class="extras">

						<span class="close"></span>

						<div class="benefits">

						<?php echo count_group_fields($tot_span); ?>

						</div>

					</div>

				</article>
				<div class="share">

			<?php 
			$anchor = '#post-'.get_the_ID();
			function getAddress() {
    			$protocol = $_SERVER['HTTPS'] == 'on' ? 'https' : 'http';
    			return $protocol.'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
			}


			?>
			<a rel="tag" href="#"><?php echo icl_t('Share-button', 'Share', $value);  ?></a>
			<div class="socialBtn">
				<a href="#" class="fb" data-url="<?php echo getAddress(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/public/images/facebook.png" alt="share on facebook" /></a>
				<a href="#" class="tw" data-url="<?php echo getAddress(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/public/images/twitter.png" alt="share on twitter" /></a>
				<a href="#" class="pn" data-url="<?php echo getAddress(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/public/images/pinterest.png" alt="share on pinterest" /></a>
			</div>
		</div>
		
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