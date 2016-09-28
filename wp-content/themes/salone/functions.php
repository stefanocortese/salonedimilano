<?php
/**
 * Salone Milano functions and definitions
 *
 *
 * @link http://www.bitmama.it
 * @package WordPress
 * @subpackage Salone_Milano
 * @since Salone Milano 1.0
 */

/**
 * Set up the content width value based on the theme's design.
 *
 * @see salone_content_width()
 *
 * @since Salone Milano 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 767;
}

if ( ! function_exists( 'salone_setup' ) ) :
/**
 * Salone Milano setup.
 *
 * @since Salone Milano 1.0
 */
function salone_setup() {

	/*
	 * Salone Milano available for translation.
	 *
	 */
	load_theme_textdomain( 'salone', get_template_directory() . '/languages' );

	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( array( 'css/editor-style.css', salone_font_roboto(), 'genericons/genericons.css' ) );

	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 672, 372, true );
	add_image_size( 'salone-bg', 1038, 576, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Top primary menu', 'salone' ),
		'secondary' => __( 'Top secondary menu', 'salone' ),
		'social' => __( 'Top social menu', 'salone' ),
		) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
		) );

	/*
	 * Enable support for Post Formats.
	 */
	
	// Add support for featured content.
	add_theme_support( 'featured-content', array(
		'featured_content_filter' => 'salone_get_featured_posts',
		'max_posts' => 5,
		) );

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}
endif; // salone_setup

add_action( 'after_setup_theme', 'salone_setup' );

/**
 * Adjust content_width value for image attachment template.
 *
 * @since Salone Milano 1.0
 */
function salone_content_width() {
	if ( is_attachment() && wp_attachment_is_image() ) {
		$GLOBALS['content_width'] = 1200;
	}
}
add_action( 'template_redirect', 'salone_content_width' );

/**
 * Getter function for Featured Content Plugin.
 *
 * @since Salone Milano 1.0
 *
 * @return array An array of WP_Post objects.
 */
function salone_get_featured_posts() {
	/**
	 * Filter the featured posts to return in Salone Milano.
	 *
	 * @since Salone Milano 1.0
	 *
	 * @param array|bool $posts Array of featured posts, otherwise false.
	 */
	return apply_filters( 'salone_get_featured_posts', array() );
}

/**
 * A helper conditional function that returns a boolean value.
 *
 * @since Salone Milano 1.0
 *
 * @return bool Whether there are featured posts.
 */
function salone_has_featured_posts() {
	return ! is_paged() && (bool) salone_get_featured_posts();

}

/**
 * Register widget areas.
 *
 * @since Salone Milano 1.0
 */
function salone_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'salone' ),
		'id'            => 'languages',
		'description'   => __( 'Language Module', 'salone' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
		) );
}
add_action( 'widgets_init', 'salone_widgets_init' );

/**
 * Register Lato Google Fonts.
 *
 * @since Salone Milano 1.0
 *
 * @return string
 */
function salone_font_roboto() {
	$font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Lato, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'salone' ) ) {
		$query_args = array(
			'family' => urlencode( 'Roboto:400,500' ),
			'subset' => urlencode( 'latin,latin-ext' ),
			);
	}
	if ( 'off' !== _x( 'on', 'Playfair Display font: on or off', 'salone' ) ) {
		$query_args = array(
			'family' => urlencode( 'Playfair+Display:400,700' ),
			'subset' => urlencode( 'latin,latin-ext' ),
			);
		$font_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	}

	return $font_url;
}

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since Salone Milano 1.0
 */
function salone_scripts() {
	// Add Lato font, used in the main stylesheet.
	wp_enqueue_style( 'salone-lato', salone_font_roboto(), array(), null );

	// Add Genericons font, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.0.3' );

	// Load our main stylesheet.
	wp_enqueue_style( 'salone-style', get_stylesheet_uri() );

	if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' )  ) {
		// Load owl stylesheet.
		wp_enqueue_style( 'salone-owl-carousel', get_template_directory_uri() . '/js/owl-carousel/owl.carousel.css' );
		wp_enqueue_style( 'salone-owl-theme', get_template_directory_uri() . '/js/owl-carousel/owl.theme.css' );
		wp_enqueue_style( 'salone-owl-transition', get_template_directory_uri() . '/js/owl-carousel/owl.transitions.css' );

		
		//Load owl script
		wp_enqueue_script( 'salone-slider', get_template_directory_uri() . '/js/owl-carousel/owl.carousel.min.js', array( 'jquery' ), '20131205', true );

		//aggiungo lo script OWL nel FOOTER solo per la HOMEPAGE
		add_action('wp_footer', 'add_script_owl');


	}

	if (  is_page_template()=='Caring Page') {
		// Load owl stylesheet.
		wp_enqueue_style( 'salone-owl-carousel', get_template_directory_uri() . '/js/owl-carousel/owl.carousel.css' );
		wp_enqueue_style( 'salone-owl-theme', get_template_directory_uri() . '/js/owl-carousel/owl.theme.css' );
		wp_enqueue_style( 'salone-owl-transition', get_template_directory_uri() . '/js/owl-carousel/owl.transitions.css' );

		
		//Load owl script
		wp_enqueue_script( 'salone-slider', get_template_directory_uri() . '/js/owl-carousel/owl.carousel.min.js', array( 'jquery' ), '20131205', true );

		//aggiungo lo script OWL nel FOOTER solo per la HOMEPAGE
		add_action('wp_footer', 'add_script_owl');


	}

	/*

	if ( !is_front_page() ) {
		wp_enqueue_script( 'salone-keyboard-image-navigation', get_template_directory_uri() . '/js/loading.js', array( 'jquery' ), '20130402' );
		add_action('wp_footer', 'add_script_swiper');
	
	}

	*/
	if (is_page_template('page-templates/store-locator.php')) {
		wp_enqueue_script( 'salone-storelocator-it', get_template_directory_uri() . '/js/storelocator-it.js', array( 'jquery' ), '20140619', true );
		
	}

	if (is_page_template('page-templates/heritage.php')) {

		wp_enqueue_style( 'salone-multiscroll', get_template_directory_uri() . '/css/jquery.multiscroll.css' );
		wp_enqueue_script( 'salone-multiscroll2', get_template_directory_uri() . '/js/multiscroll/vendors/jquery.easings.min.js', array( 'jquery' ), '20140618', true );
		
		wp_enqueue_script( 'salone-multiscroll', get_template_directory_uri() . '/js/multiscroll/jquery.multiscroll.min.js', array( 'jquery' ), '20140617', true );
		add_action('wp_footer', 'add_script_multiscroll');
	}

	if (!is_page_template('page-templates/heritage.php') && is_page_template() || is_tax() || is_post_type_archive()) {

		wp_enqueue_style( 'salone-wow', get_template_directory_uri() . '/css/animate.css' );
		//Load owl script
		//wp_enqueue_script( 'salone-wow', get_template_directory_uri() . '/js/wow.min.js', array( 'jquery' ), '20131205', true );

		//add_action('wp_footer', 'add_script_wow');
		wp_enqueue_style( 'salone-swiper', get_template_directory_uri() . '/css/swiper.min.css' );
			//Load owl script
		wp_enqueue_script( 'salone-swiper', get_template_directory_uri() . '/js/swiper/swiper.min.js', array( 'jquery' ), '20140617', true );
			//aggiungo lo script Swiper nel FOOTER
		add_action('wp_footer', 'add_script_swiper');

	}

	wp_enqueue_style( 'salone-core', get_template_directory_uri() . '/public/css/core.css' );
	wp_enqueue_style( 'salone-application', get_template_directory_uri() . '/public/css/application.css' );
	wp_enqueue_style( 'salone-cookie', get_template_directory_uri() . '/public/css/cookie.css' );
	wp_enqueue_script( 'salone-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20140616', true );
}
add_action( 'wp_enqueue_scripts', 'salone_scripts' );

/* AUTOPLAY OWL CAROUSEL  */
function add_script_owl(){

	if(is_front_page()){
		$singleItem = 'true';
		$items = '1';
		$scopri = 'false';
	}
	else if (  is_page_template()=='Caring Page') {
		$singleItem = 'false';
		$items = '2';
		$scopri = 'true';
	}
	else{
		$singleItem = 'true';
		$items = '1';
		$scopri = 'false';
	}
	?>

	<script type="text/javascript" charset="utf-8">

		var GLOBALCURRENT = 0;
		var NEXT_GLOBALCURRENT = 1;
		jQuery(document).ready(function() {
			jQuery('html, body').css('height','100%');
		var time = 7; // time in secondds
		var //$progressBar,
		  //$bar, 
		$elem, 
		isPause, 
		tick,
		tick2,
		percentTime;
        //Init the carousel
		jQuery("#featured-content").owlCarousel({
			autoPlay: true,
			slideSpeed : 1500,
			paginationSpeed : 1200,
			itemsDesktop : [1024,2],
			itemsDesktopSmall : [900,2], 
			itemsTablet: [600,1], 
			singleItem : <? echo $singleItem; ?>,
			items : <? echo $items; ?>,
			afterInit : start,
			afterMove : moved,
			startDragging : pauseOnDragging,
			afterAction : afterAction,
			navigation: true
		});

		function loading(){
			$divLoad = jQuery("<div>", {
				id:"loading"
			});

			$imgLogo = jQuery('<div class="logoIntro"></div>');
			$titleIntro = jQuery('<h2>Your hair salon in a bottle.</h2>');
			$textIntro = jQuery('<p>Made in Italy.</p>');
			$spinner = jQuery('<div class="spinner"><div></div></div>');

			$divLoad.prependTo('#main').append($imgLogo).append($titleIntro).append($textIntro).append($spinner);
			$spinner.find('div').animate({ width: 100 * $spinner.width() / 100 }, 3000); 

		}

		function removeLoad (elem){
			setTimeout(function(){ 
       		//jQuery('#loading').fadeOut(500, function() { jQuery(this).remove(); });
       		//progressBar(elem);
			}, 3000);
		}

        //Init progressBar where elem is $("#owl-demo")
		/*
		function progressBar(elem){
			$elem = elem;
			buildProgressBar();  
		}
        */
		var scopri = '<? echo $scopri;?>';
		if (scopri == 'true'){
			
			if (!(jQuery('html').attr('lang')=='en-US'))
				var elementToInsert = '<span class="scopri">   scopri le nostre '+jQuery(".item").length+' linee  </span>';
			else
				var elementToInsert = '<span class="scopri">   discover our '+jQuery(".item").length+' lines  </span>';	
			jQuery(elementToInsert).insertAfter( '.owl-prev' );
		}else{
			jQuery('.owl-pagination').css('display','block');
			jQuery('.owl-buttons').css('display','none');

		}

		

		function afterAction(){

			jQuery(".next").off().click(function(){
				jQuery("#featured-content").trigger('owl.next');
			})
			jQuery(".prev").off().click(function(){
				jQuery("#featured-content").trigger('owl.prev');
			})


			GLOBALCURRENT =this.owl.currentItem;


			if (GLOBALCURRENT < (this.owl.owlItems.length)+1){
				NEXT_GLOBALCURRENT = GLOBALCURRENT +1 ; 
			}
			else
			{
				NEXT_GLOBALCURRENT = 0;
			}
		}
        //create div#progressBar and div#bar then prepend to $("#owl-demo")
		/*
		function buildProgressBar(){
			$progressBar = jQuery("<div>",{
				id:"progressBar"
			});
			$bar = jQuery("<div>",{
				id:"bar"
			});
			$progressBar.append($bar).prependTo($elem);
		}
        */

		function start() {
			jQuery('.next, .prev, .scopri').css('display','inline-block');
          //reset timer
			percentTime = 0;
			isPause = false;
          //run interval every 0.01 second
          //tick = setInterval(interval, 10);
			tick2 = setTimeout(tra, 1200);
		};
		function tra(){
			var scopri2 = '<? echo $scopri;?>';
			jQuery('.blackVeil').removeClass('moved');
			jQuery('.owl-item').eq(GLOBALCURRENT).find('.blackVeil').addClass('moved');
			if (scopri2 == 'true'){
				jQuery('.owl-item').eq(NEXT_GLOBALCURRENT).find('.blackVeil').addClass('moved');
			}
		}
		/*
		function interval() {
			if(isPause === false){
				percentTime += 1 / time;
				$bar.css({
					width: percentTime+"%"
				});
            //if percentTime is equal or greater than 100
				if(percentTime >= 100){
					$elem.trigger('owl.next')
				}
			}
		}
*/
        //pause while dragging 
		function pauseOnDragging(){
			isPause = true;
		}

        //moved callback
		function moved(){
          //clear interval
          //clearTimeout(tick);
			clearTimeout(tick2);
          //start again
			start();
		}


	});

	</script>

	<?php
}
function add_script_swiper(){
	?>

	<script>
		jQuery(document).ready(function() {
			var _width = jQuery(window).width();
			if(_width>767){
				if (jQuery("body").hasClass("post-type-archive")) {
		//SETTO L'ALTEZZA DEL DOCUMENTO AL 100% per lo slider
					jQuery('html, body').css('height','100%');
					var swiper = new Swiper('.swiper-container', {
						pagination: '.swiper-pagination',
						direction: 'vertical',
						slidesPerView: 1,
						paginationClickable: true,
						spaceBetween: 0,
						mousewheelControl: true,
						speed: 1000,
						nextButton: '.swiper-button-next',
						prevButton: '.swiper-button-prev',
						hashnav: true,
						paginationBulletRender: function (index, className) {
							return '<span class="' + className +'">' + (index + 1) + '/' + jQuery('.swiper-pagination-bullet').length +'</span> ';

						},

					});

					jQuery('.show-benefit').on('click', function(e){
						e.preventDefault();
						swiper.lockSwipes();
						swiper.disableMousewheelControl();

					});

					jQuery('.extras .close').on('click', function(e){
						e.preventDefault();
						swiper.enableMousewheelControl();
						swiper.unlockSwipes();
					});
				}
			}

			if (jQuery("body").hasClass("page-template-inspiration")) {

				var swiper = new Swiper('.swiper-container', {
					pagination: '.swiper-pagination',
					direction: 'vertical',
					slidesPerView: 1,
					paginationClickable: true,
					spaceBetween: 0,
					mousewheelControl: true,
					parallax: true,
					speed: 1500,
					hashnav: true,
				});
			}
		});
	</script>
	<?php

}
function add_script_multiscroll(){
	?>
	<script>
		jQuery(document).ready(function() {
			jQuery('#primary').multiscroll({
				anchors: [],
				menu: false,
				css3: true,
				easing: 'easeInQuart',
				verticalCentered : false,
				scrollingSpeed: 700,
				navigation: true,
				navigationPosition: 'left',
				navigationColor: '#81764e',
				afterRender: function(){
					jQuery('.scrollIcon').fadeIn();
					jQuery('article .blackVeilMotiv').addClass('blackVeilMotivBlack animated fadeIn');
					jQuery('article .entry-header').addClass('animated fadeIn');
					jQuery('article .entry-content').addClass('animated fadeIn');
				},
				afterLoad: function(){
					jQuery('article .blackVeilMotiv').removeClass('blackVeilMotivBlack animated fadeIn').delay(1000).queue(function(){
						jQuery(this).addClass("blackVeilMotivBlack animated fadeIn").dequeue();
					});

					jQuery('article .pulsante').removeClass('animated fadeIn').delay(1000).queue(function(){
						jQuery(this).addClass("animated fadeIn").dequeue();
					});
					jQuery('article .entry-header').removeClass('animated fadeIn').delay(1000).queue(function(){
						jQuery(this).addClass("animated fadeIn").dequeue();
					});
					jQuery('article .entry-content').removeClass('animated fadeIn').delay(1000).queue(function(){
						jQuery(this).addClass("animated fadeIn").dequeue();
					});
					jQuery('article .puls-group').removeClass('animated fadeIn').delay(1000).queue(function(){
						jQuery(this).addClass("animated fadeIn").dequeue();
					});
					jQuery('article .pulsante').removeClass('animated fadeIn').delay(1000).queue(function(){
						jQuery(this).addClass("animated fadeIn").dequeue();
					});


				},
				onLeave: function(index, nextIndex, direction){

					if(index == '1' && direction =='down'){
						jQuery('.scrollIcon').fadeOut();
					}
					else if(index == '2' && direction == 'up'){
						jQuery('.scrollIcon').fadeIn();
					}
					jQuery('article .blackVeilMotiv').removeClass('blackVeilMotivBlack animated fadeIn');
					jQuery('article .pulsante').removeClass('animated fadeIn');
					jQuery('article .entry-header').removeClass('animated fadeIn');
					jQuery('article .entry-content').removeClass('animated fadeIn');
					jQuery('article .puls-group').removeClass('animated fadeIn');
					jQuery('article .pulsante').removeClass('animated fadeIn');
				}
			});	

		});


	</script>

	<?php

}
/**
 * Enqueue Google fonts style to admin screen for custom header display.
 *
 * @since Salone Milano 1.0
 */
function salone_admin_fonts() {
	wp_enqueue_style( 'salone-roboto', salone_font_roboto(), array(), null );
}
add_action( 'admin_print_scripts-appearance_page_custom-header', 'salone_admin_fonts' );

if ( ! function_exists( 'salone_the_attached_image' ) ) :
/**
 * Print the attached image with a link to the next attached image.
 *
 * @since Twenty Fourteen 1.0
 */
function salone_the_attached_image() {
	$post                = get_post();
	/**
	 * Filter the default Twenty Fourteen attachment size.
	 *
	 * @since Salone Milano 1.0
	 *
	 * @param array $dimensions {
	 *     An array of height and width dimensions.
	 *
	 *     @type int $height Height of the image in pixels. Default 810.
	 *     @type int $width  Width of the image in pixels. Default 810.
	 * }
	 */
	$attachment_size     = apply_filters( 'salone_attachment_size', array( 1200, 1200 ) );
	$next_attachment_url = wp_get_attachment_url();

	/*
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL
	 * of the next adjacent image in a gallery, or the first image (if we're
	 * looking at the last image in a gallery), or, in a gallery of one, just the
	 * link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID',
		) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id ) {
			$next_attachment_url = get_attachment_link( $next_id );
		}

		// or get the URL of the first image attachment.
		else {
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
		}
	}

	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
		);
}
endif;



/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Presence of header image except in Multisite signup and activate pages.
 * 3. Index views.
 * 4. Full-width content layout.
 * 5. Presence of footer widgets.
 * 6. Single views.
 * 7. Featured content layout.
 *
 * @since Salone Milano 1.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */
function salone_body_classes( $classes ) {
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	if ( get_header_image() ) {
		$classes[] = 'header-image';
	} elseif ( ! in_array( $GLOBALS['pagenow'], array( 'wp-activate.php', 'wp-signup.php' ) ) ) {
		$classes[] = 'masthead-fixed';
	}

	if ( is_archive() || is_search() || is_home() ) {
		$classes[] = 'list-view';
	}

	if ( ( ! is_active_sidebar( 'sidebar-2' ) )
		|| is_page_template( 'page-templates/full-width.php' )
		|| is_page_template( 'page-templates/contributors.php' )
		|| is_attachment() ) {
		$classes[] = 'full-width';
}

if ( is_active_sidebar( 'sidebar-3' ) ) {
	$classes[] = 'footer-widgets';
}

if ( is_singular() && ! is_front_page() ) {
	$classes[] = 'singular';
}

if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' ) ) {
	$classes[] = 'slider';
} elseif ( is_front_page() ) {
	$classes[] = 'grid';
}

return $classes;
}
add_filter( 'body_class', 'salone_body_classes' );

/**
 * Extend the default WordPress post classes.
 *
 * Adds a post class to denote:
 * Non-password protected page with a post thumbnail.
 *
 * @since Salone Milano 1.0
 *
 * @param array $classes A list of existing post class values.
 * @return array The filtered post class list.
 */
function salone_post_classes( $classes ) {
	if ( ! post_password_required() && ! is_attachment() && has_post_thumbnail() ) {
		$classes[] = 'has-post-thumbnail';
	}

	return $classes;
}
add_filter( 'post_class', 'salone_post_classes' );

/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since Salone Milano 1.0
 *
 * @global int $paged WordPress archive pagination page count.
 * @global int $page  WordPress paginated post page count.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function salone_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'salone' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'salone_wp_title', 10, 2 );

// Implement Custom Header features.
require get_template_directory() . '/inc/custom-header.php';

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Add Customizer functionality.
require get_template_directory() . '/inc/customizer.php';

/*
 * Add Featured Content functionality.
 *
 * To overwrite in a plugin, define your own Featured_Content class on or
 * before the 'setup_theme' hook.
 */
if ( ! class_exists( 'Featured_Content' ) && 'plugins.php' !== $GLOBALS['pagenow'] ) {
	require get_template_directory() . '/inc/featured-content.php';
}
function add_query_vars_filter( $vars ){
	$vars[] = "tax";
	$vars[] = "product";
	return $vars;
}
add_filter( 'query_vars', 'add_query_vars_filter' );

//TRADUZIONE CUSTOM STRING

icl_register_string('Caring-Straightening', 'View the products', 'View the products');
icl_register_string('Coloring', 'Discover', 'Discover');
icl_register_string('Inspiration', 'Get the inspiration', 'Get the inspiration');
icl_register_string('Benefit-button', 'Check the benefit', 'Check the benefit');
icl_register_string('Find-store', 'Find a store', 'Find a store');
icl_register_string('Share-button', 'Share', 'Share');
icl_register_string('Watch-video', 'Watch the video', 'Watch the video');




require 'lib/custom-post.php';
require 'lib/custom-taxonomy.php';
require 'lib/custom_fields.php';
require 'lib/custom-order-admin-table.php';


