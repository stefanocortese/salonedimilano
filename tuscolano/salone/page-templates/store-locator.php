<?php
/**
 * Template Name: Store-locator Page
 *
 * @package WordPress
 * @subpackage Salone_Milano
 * @since Salone Milano 1.0
 */

get_header(); ?>

<div id="main-content" class="main-content">

	<div id="primary" class="content-area">
	    
	    <div id="content" class="site-content store-locator" role="main">
	    
			
			<article id="post-<?php the_title(); ?>" <?php post_class(); ?>>
				<div class="searchTitle"><?php the_title(); ?></div>
					
					<div class="store-locator-content center map">

					<p class="geolocalBtn">
							<span class="paragraph"> Trova il Salone più vicino a te</span>
							
							<a class="pulsante" id="geolocalBtn"> La tua posizione </a>
							<span> oppure</span>
						</p>

						<form class="center" action="" id="storelocator-form">

							<div id="status"></div>

							<input type="text" name="address" id="address" placeholder="inserisci la città o indirizzo" value="" />

							<input type="submit" id="submit" value="cerca" />
							 <input name="invia il modulo" class="searchImg" type="image" src="<?php echo get_template_directory_uri(); ?>/public/images/searchImg.png" alt="invia il modulo" title="invia il modulo">

							<a href="#" class="backMap">Torna ai risultati</a>

						</form>
							
							<div class="overlayMap"></div>

							<div id="map_canvas"></div>
							<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>


						<div class="store-grid"></div>

					</div>

					<div class="store-details"></div>
					<a href="#" class="show-grid">Visualizza lista</a>
					<a href="#" class="show-map">Visualizza mappa</a>

				

			</article><!-- #post-## -->

			

		</div><!-- #content -->

	</div><!-- #primary -->


	
</div><!-- #main-content -->

<?php

get_footer();
