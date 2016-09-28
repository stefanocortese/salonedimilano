<?php
/**
 * Template Name: Homepage
 *
 * @package WordPress
 * @subpackage Salone_Milano
 * @since Salone Milano 1.0
 */

get_header(); ?>



<?php
	if ( is_front_page()) {?>
		<div id="featured-content" class="featured-content owl-carousel">
	
	<?php
		/**
		 *
		 * @since Salone Milano 1.0
		 */
		//do_action( 'salone_featured_posts_before' );

		// RECUPERO L'IMMAGINE IN EVIDENZA DELLE PAGINE E LA STAMPO NELLO SLIDER FILTRANDO PER CUSTOM_FIELD = SLIDER

		$featured_posts = get_pages(array('sort_column'=>'menu_order', 'sort_order' => 'ASC','meta_value' => 'slider', 'post-type' => 'page'));

		foreach ( (array) $featured_posts as $order => $post ) :
			setup_postdata( $post );

			?>

			<?php
					// Output the featured image.
					if ( has_post_thumbnail() ) :
						
						 $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'salone-bg');
				?>		
					

			<div class="item" style="background:url('<?php echo $image[0]; ?>') no-repeat scroll center center / cover  #fff">

				
				<div class="blackVeil">
                  <div class="containerCaption">

				<h2 ><?php the_field('titolo-canvas'); ?></h2>
				  <p><?php the_field('sottotitolo-canvas'); ?></p>
				  <?php if(the_title('','', false) == 'Yellow Remover'):?>
				  	<a class="pulsante" href="http://www.ilsalonemilano.com/coloring-line/yellow-remover/" rel="bookmark"><?php the_field('pulsante-canvas') ?></a>
				  <?php elseif(the_title('','', false) == 'Video'):?>
				  	<a href="#" class="pulsante" id="wV" rel="bookmark"><?php the_field('pulsante-canvas') ?></a>
				  <?php else: ?>	
					<a class="pulsante" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php the_field('pulsante-canvas') ?></a> 
				  <?php endif; ?>

				</div>
				</div>
				</div>
				
				<?php
					endif;
				?>
			  
			

		
		<?php
			
		endforeach;
		 
		wp_reset_postdata();
	?>
	
</div><!-- #featured-content .featured-content -->

<?php
	}
?>

<?php
get_footer();
