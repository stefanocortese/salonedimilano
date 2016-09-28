<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Salone_Milano
 * @since Salone Milano 1.0
 */


get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
		
		<?php if ( have_posts() ) : ?>

			<?php	require 'lib/tax-function.php'; ?>

			<?php while ( have_posts() ) : the_post(); ?>
		

				<article id="post-<?php the_title(); ?>" <?php post_class(); ?>>

				


				<?php

					$image = get_field('immagine_prodotto'); 
			
				?>

				<div class="product-image">
					<img src="<?php echo $image[url]; ?>" alt="<?php the_title(); ?>" class="bg">
				</div>

				<div class="product-content">

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
				</div><!-- .product-content -->


					<div class="extras">

						<?php echo count_group_fields($tot_span); ?>

					</div>

				


				</article><!-- #post-## -->

				

				<nav class="nav-single">

					<div class="back-category">

						<?php the_terms( $post->ID, $post_type->label.'-line', ' ', ' / ' ); ?>

					</div>

					<div class="nav">

					<?php

					//NAV TRA I PRODOTTI DELLA STESSA GAMMA (CATEGORIA)

					$postlist_args = array(
					   'posts_per_page'  => -1,
					   'orderby'         => 'menu_order',
					   'order'           => 'ASC',
					   'post_type'       => $cpt,
					   $cpt.'-line'      => $output
					); 
					$postlist = get_posts( $postlist_args );

					// get ids of posts retrieved from get_posts
					$ids = array();
					$tot_elem = array();

					foreach ($postlist as $thepost) {
					   $ids[] = $thepost->ID;
					   $tot_elem[] = $thepost->menu_order;
					}
					echo '<span class="order-product" >'. $post->menu_order .'/'.count($tot_elem) .'</span>';

					// get and echo previous and next post in the same taxonomy        
					$thisindex = array_search($post->ID, $ids);
					$previd = $ids[$thisindex-1];
					$nextid = $ids[$thisindex+1];
					if ( !empty($previd) ) {
					   echo '<a class="prev" rel="prev" href="' . get_permalink($previd). '"></a>';
					}
					

					if ( !empty($nextid) ) {
					   echo '<a class="next" rel="next" href="' . get_permalink($nextid). '"></a>';
					}

					?>
				  </div>


				</nav><!-- .nav-single -->


			<?php endwhile; // end of the loop. ?>

		<?php endif; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_footer(); ?>