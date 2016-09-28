<?php
/**
 * Template Name: Contact Page
 *
 * @package WordPress
 * @subpackage Salone_Milano
 * @since Salone Milano 1.0
 */

get_header(); ?>

<div id="main-content" class="main-content">

	<div id="primary" class="content-area">
	    
	    <div id="content" class="site-content contact" role="main">
	    <?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					?>
			
			<article id="post-<?php the_title(); ?>" <?php post_class('form'); ?>>
				<div class="titleContact"><?php the_title(); ?></div>
				<div class="form-content">	

					<?php
					
						the_content();
						
					?>

				</div>
			</article><!-- #post-## -->

		<?php
		endwhile;

		?>

		</div><!-- #content -->

	</div><!-- #primary -->


	
</div><!-- #main-content -->

<?php

get_footer();
