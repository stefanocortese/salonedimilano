<?php
/**
 * The template for displaying Post Format pages
 *
 * Used to display archive-type pages for posts with a post format.
 * If you'd like to further customize these Post Format views, you may create a
 * new template file for each specific one.
 *
 * @todo https://core.trac.wordpress.org/ticket/23257: Add plural versions of Post Format strings
 * and remove plurals below.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Salone_Milano
 * @since Salone Milano 1.0
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php if ( have_posts() ) : ?>

			<header class="list-products-header">
				<h1 class="products-description">
					
					<?php
						
					 if ( is_tax('caring_categories', 'normal-dry') ) {
					        echo "Normal Dry";
					        $tax = "normal-dry";
					    }
					 else if ( is_tax( 'caring_categories', 'dry-demage' ) ) {
					        echo "Dry Demage";
					        $tax = "dry-demage";
					    }
					?>
				</h1>
			</header><!-- .archive-header -->

			<?php

			$args = array( 'post_type' => 'caring' );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();

			?>
			<article id="post-<?php the_title(); ?>" <?php post_class(); ?>>
			
			<?php 

			$image = get_field('immagine_prodotto'); 
			//$url = $image['url'];
			

			?>
			
			<img src="<?php echo $image[url]; ?>" alt="<?php the_title(); ?>" class="bg">

				<header class="entry-header"><h1 class="entry-title">
				<?php the_field('titolo_prodotto'); ?>
				</h1></header><!-- .entry-header -->

				<div class="entry-content">
					
				<?php 

					the_field('sottotitolo_prodotto');
					echo '<a class="pulsante" href="'. get_permalink(the_title())  . '" title= "Go to the section">Clicca</a>';

				?>
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

<?php
get_footer();
