<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Salone_Milano
 * @since Salone Milano 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php
				
				while ( have_posts() ) : the_post();
			?>
				<article id="post-<?php the_title(); ?>" <?php post_class(); ?>>
			
			<?php 
					
				echo $tax = get_post_type();    	

			    
			
			$image = get_field('immagine_prodotto'); 
			
			?>
			
			<img src="<?php echo $image[url]; ?>" alt="<?php the_title(); ?>" class="bg">

				<header class="entry-header"><h1 class="entry-title">

				<?php the_field('titolo_prodotto'); ?>
				
				</h1></header><!-- .entry-header -->

				<div class="entry-content">
					
				<?php 

					the_field('sottotitolo_prodotto');

				?>
				</div><!-- .entry-content -->
			</article><!-- #post-## -->
		
			<?php		
				endwhile;
			?>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_footer();
