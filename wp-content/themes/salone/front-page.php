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

		<!-- -->
		<?
		$field_item_carousel = 'slider-item';
		if( have_rows($field_item_carousel) ):
			while ( have_rows($field_item_carousel) ) : the_row();
		?>
		<div class="item" style="background:url('<? the_sub_field('immagine_sfondo') ?>') no-repeat scroll center center / cover  #fff">

			
			<div class="blackVeil">
				<div class="containerCaption">

					<h2 ><? the_sub_field('titolo-slider') ?></h2>
					<p><? the_sub_field('sottotitolo_slider') ?></p>

					<? if(get_sub_field('isvideo')==true) {
						$class= 'wV';
						$href =  '#';
						$data_video_YT =  get_sub_field('id_video_youtube');
						
					}
					else{
						$class= '';
						$data_video_YT = '';
						$href =  get_sub_field('link_slider');
					} ?>
					<a href=" <?echo $href; ?>" class="pulsante <?echo $class?>" data-video-id='<? echo $data_video_YT?>' id="" rel="bookmark"><? the_sub_field('label_bottone') ?></a>
				</div>
			</div>
		</div> 

		<?
		endwhile;
		elseif(!have_rows($field_item_carousel)):


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
					<a class="pulsante" href="http://ilsalonemilano.phpstg.bitmama.it/coloring-line/yellow-remover/" rel="bookmark"><?php the_field('pulsante-canvas') ?></a>
				<?php elseif(the_title('','', false) == 'Video'):?>
				<a href="#" class="pulsante wV" data-video-id="_MDCFWyiMeI" id="wV" rel="bookmark"><?php the_field('pulsante-canvas') ?></a>
			<?php else: ?>	
			<a class="pulsante" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php the_field('pulsante-canvas') ?></a> 
		<?php endif; ?>

	</div>
</div>
</div>

<?php
endif;


endforeach;
endif;
wp_reset_postdata();
?>

?>
</div>
<?

}


get_footer();
