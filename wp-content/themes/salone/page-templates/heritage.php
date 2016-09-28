<?php
/**
 * Template Name: Heritage Page
 *
 * @package WordPress
 * @subpackage Salone_Milano
 * @since Salone Milano 1.0
 */

get_header(); ?>

<div id="main-content" class="main-content">

	<div id="primary" class="content-area">
		<div id="content" class="site-content ms-left" role="main">
		<?php

		$args = array( 'post_type' => 'heritage', 'orderby' => 'menu_order', 'order' => 'ASC' );
		$loop = new WP_Query( $args );
		$count = 0;
		$tot_post = $loop->post_count;
		while ( $loop->have_posts() ) : $loop->the_post();

		$count++;

			$image = get_field('bg_img_heritage_sx'); 
			$url = $image['url'];
			$alt = $image['alt'];

		?>

			<article id="post-<?php the_title(); ?>" <?php post_class('ms-section'); ?> >
			
			<div class="blackVeilMotiv" ></div>  
			
			<img src="<?php echo $url; ?>" alt="<?php echo $alt  ?>" class="bg">

			<div class="content-canvas">

				<header class="entry-header animated"><h1 class="entry-title">
				<?php the_field('titolo_heritage'); ?>
				</h1></header><!-- .entry-header -->

				<div class="entry-content animated">
					<?php the_field('paragrafo_heritage'); ?>
				</div><!-- .entry-content -->


			<?php

			if($count === 1):
			
			?>

			<!--<a class="pulsante animated fadeIn" id="wV"  href="#">Watch the video</a>-->


			<?php

			endif;

			if($count == $tot_post):

			    $page_caring = get_page_by_title( 'Caring' );

				if(function_exists('icl_object_id')) {
				   $post_caring = get_page_by_path($page_caring->post_name);
				   $id_caring = icl_object_id($post_caring->ID,'page',true);
				   $link_caring = get_permalink($id_caring);
				}
				$page_coloring = get_page_by_title( 'Coloring' );

				if(function_exists('icl_object_id')) {
				   $post_coloring = get_page_by_path($page_coloring->post_name);
				   $id_coloring = icl_object_id($post_coloring->ID,'page',true);
				   $link_coloring = get_permalink($id_coloring);
				}
				$page_straightening = get_page_by_title( 'Straightening' );

				if(function_exists('icl_object_id')) {
				   $post_straightening = get_page_by_path($page_straightening->post_name);
				   $id_straightening = icl_object_id($post_straightening->ID,'page',true);
				   $link_straightening = get_permalink($id_straightening);
				}


			?>

			<div class="puls-group">

				<a class="pulsante inline animated"  href="<?php echo $link_caring; ?>">Caring</a>

				<a class="pulsante inline animated"  href="<?php echo $link_coloring; ?>">Coloring</a>

				<a class="pulsante inline animated"  href="<?php echo $link_straightening; ?>">Straightening</a>
			
			</div>
			<?php

			endif;

			?>

			</div>

			</article><!-- #post-## -->
		
		<?php
		endwhile;
		wp_reset_query();
		?>

		</div><!-- LEFT -->
		<div id="content" class="site-content ms-right" role="main">
		<?php

		$args = array( 'post_type' => 'heritage', 'orderby' => 'menu_order', 'order' => 'ASC' );
		$loop = new WP_Query( $args );
		$count = 0;
		$tot_post = $loop->post_count;
		while ( $loop->have_posts() ) : $loop->the_post();

		$count++;

			$image = get_field('bg_img_heritage_dx'); 
			$url = $image['url'];
			$alt = $image['alt'];

		?>

			<article id="post-<?php the_title(); ?>" <?php post_class('ms-section'); ?>>
			
			<div class="blackVeilMotiv" ></div>  
			
			<img src="<?php echo $url; ?>" alt="<?php echo $alt  ?>" class="bg">

			<div class="content-canvas">

				<header class="entry-header animated"><h1 class="entry-title">
				<?php the_field('titolo_heritage'); ?>
				</h1></header><!-- .entry-header -->

				<div class="entry-content animated">
					<?php the_field('paragrafo_heritage'); ?>
				</div><!-- .entry-content -->
			<?php
			if($count === 1):
			?>
			<a class="pulsante animated fadeIn" id="wV"  href="#">Watch the video</a>
			<?php
			endif;
			if($count == $tot_post):

			    $page_caring = get_page_by_title( 'Caring' );

				if(function_exists('icl_object_id')) {
				   $post_caring = get_page_by_path($page_caring->post_name);
				   $id_caring = icl_object_id($post_caring->ID,'page',true);
				   $link_caring = get_permalink($id_caring);
				}
				$page_coloring = get_page_by_title( 'Coloring' );

				if(function_exists('icl_object_id')) {
				   $post_coloring = get_page_by_path($page_coloring->post_name);
				   $id_coloring = icl_object_id($post_coloring->ID,'page',true);
				   $link_coloring = get_permalink($id_coloring);
				}
				$page_straightening = get_page_by_title( 'Straightening' );

				if(function_exists('icl_object_id')) {
				   $post_straightening = get_page_by_path($page_straightening->post_name);
				   $id_straightening = icl_object_id($post_straightening->ID,'page',true);
				   $link_straightening = get_permalink($id_straightening);
				}
			?>
			<?php if(ICL_LANGUAGE_CODE=='en'): ?>
			<div class="puls-group">
				<a class="pulsante inline animated"  href="<?php echo $link_caring; ?>">Caring</a>
				<a class="pulsante inline animated"  href="<?php echo $link_coloring; ?>">Coloring</a>
				<a class="pulsante inline animated"  href="<?php echo $link_straightening; ?>">Straightening</a>
			</div>

			<?php elseif(ICL_LANGUAGE_CODE=='it'): ?>
			<div class="puls-group">

				<a class="pulsante inline animated"  href="<?php echo $link_caring; ?>">Caring</a>

			</div>
			

			<?php endif; ?>
			
			<?php

			endif;

			?>

			</div>

			</article><!-- #post-## -->
		
		<?php
		endwhile;
		wp_reset_query();
		?>

		</div><!-- #right -->

	  <div class="scrollIcon"></div>

	</div><!-- #primary -->
</div><!-- #main-content -->

<?php

get_footer();
