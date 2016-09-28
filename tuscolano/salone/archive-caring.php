<?php
/**
 * The template for displaying Archive Custom Posts Caring line
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Salone_Milano
 * @since Salone Milano 1.0
 */
get_header(); ?>

	<?php if ( have_posts() ) : ?>

			<?php	require 'lib/tax-function.php'; ?>
			<header class="archive-header">
				<h1 class="archive-title">
					<?php

					//RECUPERO IL NOME DEL CUSTOM POST DI APPARTENENZA 

					$post_type = get_post_type_object( get_post_type($post) );
						
						$post_type_name = $post_type->label ;

					?>
				</h1>

				<h2>

					<?php 
					
					//RECUPERO LA CATEGORIA (GAMMA) DI APPARTENENZA
					the_terms( $post->ID, $post_type->label.'-line', ' ', ' / ' ); 

					?>
				</h2>
				
			</header><!-- .archive-header -->

	<section id="primary" class="site-content swiper-container">
		<div id="content" class="swiper-wrapper" role="main">

		

		

			<?php 
			$tax = get_query_var( 'tax' );
		    
			$args = array(
			    'post_type' => ''.$post_type_name.'',
			    ''.$post_type_name.'-line' => ''.$tax.'',
			    'order'=>'ASC',
			    'orderby'=> 'menu_order'
			);

			$wp_query = new WP_Query( $args );

			?>

			<?php
			/* Start the Loop */
			while ( $wp_query->have_posts() ) : $wp_query->the_post();
			?>

			<article id="post-<?php the_title(); ?> " data-hash="post-<?php echo get_the_ID(); ?>" <?php post_class('swiper-slide'); ?>>


				<?php

					$image = get_field('immagine_prodotto'); 
			
				?>

				<div class="product-image">
					<div class="vCenter">
						<img src="<?php echo $image[url]; ?>" alt="<?php the_title(); ?>">
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
						<a class="pulsante show-benefit" href="#"> <?php echo icl_t('Benefit-button', 'Check the benefit', $value); ?></a>
					<?php endif; ?>

				</div><!-- vCenter -->
				
				</div><!-- .product-content -->

					<div class="extras">

					    <span class="close"></span>

					    <div class="benefits">

						<?php echo count_group_fields($tot_span); ?>

						</div>

					</div>

				</article><!-- #post-## -->

		
		<?php
			endwhile;
		wp_reset_query();
		?>
			<?php
					
				endif;
			?>

		</div><!-- #content -->

		

		<nav class="nav">

			<div class="swiper-button-prev"></div>
			<div class="swiper-pagination"></div>
			<div class="swiper-button-next"></div>

	    </nav>

	    <div class="back-category">

			<?php $url = get_term_link( $tax, $post_type->label.'-line' ); ?>
			<a rel="tag" href="<?php echo $url; ?>"><?php echo $output; ?></a>
		
		</div>

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

	</section><!-- #primary -->

<?php get_footer(); ?>