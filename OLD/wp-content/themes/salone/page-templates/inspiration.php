<?php
/**
 * Template Name: Inspiration Page
 *
 * @package WordPress
 * @subpackage Salone_Milano
 * @since Salone Milano 1.0
 */

get_header(); ?>

<div id="main-content" class="main-content">

	<div id="primary" class="content-area swiper-container">

	  <div class="parallax-bg" style="background-image:url('<?php echo  get_stylesheet_directory_uri(); ?>/public/images/bg_generic_white.jpg')" data-swiper-parallax-y="-25%"></div>
	    
	    <div id="content" class="site-content swiper-wrapper" role="main">
		<?php

		$args = array( 'post_type' => 'inspiration', 'orderby' => 'menu_order', 'order' => 'ASC' );
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post();

		?>

			<?php $image = get_field('bg_img_inspiration');?>
			
			<article id="post-<?php the_title(); ?>" data-hash="post-<?php echo get_the_ID(); ?>" <?php post_class('swiper-slide'); ?>>

			<div class="share">

					<a rel="tag" href="<?php the_permalink(); ?>#post-<?php echo get_the_ID()?>"><?php echo icl_t('Share-button', 'Share', $value);  ?></a>
				
				</div>
			<?php $image = get_field('bg_img_inspiration'); ?>

			<?php $img_p = get_field('immagine_paragrafo_inspiration'); ?>

			<img src="<?php echo $image[url]; ?>" alt="<?php echo $image[alt]  ?>" class="bgSection" data-swiper-parallax="-100">

			<div class="inspiration-image">

				<h1 class="inspiration-title" data-swiper-parallax="-600">

					<?php the_title( '', '', true ); ?>

				</h1>
				
				<img src="<?php echo $img_p[url]; ?>" alt="<?php echo $img_p[alt]  ?>" class="imgSection" data-swiper-parallax="-400">	
			
			</div>

			<div class="inspiration-content">	
				
				<header class="entry-header" data-swiper-parallax="-200">
				  <h1 class="entry-title">
				    <?php the_field('titolo_inspiration'); ?>
				  </h1>
				</header><!-- .entry-header -->

				<p class="paragraph" data-swiper-parallax="-400">
					<?php the_field('paragrafo_inspiration',  false, false); ?>
				</p>
				<?php

				$post_object_caring = get_field('seleziona_prodotto_caring');
				$post_object_coloring = get_field('seleziona_prodotto_coloring');
				$post_object_straightening = get_field('seleziona_prodotto_straightening');


				$args = array('product' => get_the_ID());
				
				


				if( $post_object_caring ): 

					// override $post
					$post = $post_object_caring;
					setup_postdata( $post ); 
					$link = add_query_arg( $args, get_permalink());

				?>

				<a class="pulsante" data-swiper-parallax="-500" href="<?php echo $link; ?>">get the inspiration</a></h3>
				
				<?php

				elseif( $post_object_coloring ): 

					// override $post
					$post = $post_object_coloring;
					setup_postdata( $post );
					$link = add_query_arg( $args, get_permalink()); 

				?>

				<a class="pulsante" data-swiper-parallax="-500" href="<?php echo $link; ?>">get the inspiration</a></h3>
				
				<?php

				elseif( $post_object_straightening ): 

					// override $post
					$post = $post_object_straightening;
					setup_postdata( $post );
					$link = add_query_arg( $args, get_permalink());

				?>



				<a class="pulsante" data-swiper-parallax="-500" href="<?php echo $link; ?>"><?php echo icl_t('Inspiration', 'Get the inspiration', $value);  ?></a></h3>
				


				<?php wp_reset_postdata(); ?>

				<?php endif; ?>

				

			</div>	
	
			</article><!-- #post-## -->

		<?php
		endwhile;
		wp_reset_query();
		?>

		</div><!-- #content -->

		<div class="swiper-pagination"></div>

	</div><!-- #primary -->


	
</div><!-- #main-content -->

<?php

get_footer();
