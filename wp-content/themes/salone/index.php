<?php
/**
 *
 * @package WordPress
 * @subpackage Salone_milano
 * @since Salone Milano 1.0
 */

get_header(); ?>

<div id="main-content" class="main-content">

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

		<?php
			if ( have_posts() ) :
				// Start the Loop.
				while ( have_posts() ) : the_post();

					get_template_part( 'content', get_post_format() );

				endwhile;

			else :
				
				get_template_part( 'content', 'none' );

			endif;
		?>

		</div><!-- #content -->
	</div><!-- #primary -->

</div><!-- #main-content -->

<?php
get_footer();
