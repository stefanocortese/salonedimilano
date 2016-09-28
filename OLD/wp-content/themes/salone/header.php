<?php

/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Salone_Milano
 * @since Salone Milano 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!-- if page is content page -->

<meta property="og:url" content=""/>
<meta property="og:type" content="article" />
<meta property="og:image" content="<?php if (function_exists('wp_get_attachment_thumb_url')) {echo wp_get_attachment_thumb_url(get_post_thumbnail_id($post->ID)); }?>" />
 

	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<script type="text/javascript">
		var templateUrl = '<?= get_template_directory_uri(); ?>';
	</script>
	<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	ga('create', 'UA-39646642-3', 'auto');
	ga('send', 'pageview');
	</script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!--[if lte IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!--[if lte IE 8]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- <div id="page" class="hfeed site">-->
	<?php if ( get_header_image() ) : ?>
	
	<?php endif; ?>

	<header id="masthead" class="header_main site-header" role="header">
		<div class="header-main">
			
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

			<div class="mobile">

				<span class="hamb">Menu</span>

			</div>

			<div id="main-menu" class="main_menu blocchettino-overlay">
			<video autoplay loop poster="<?php echo get_template_directory_uri(); ?>/public/images/bgVideo.jpg" id="bgvid">
				<source src="<?php echo get_template_directory_uri(); ?>/public/images/video.mp4" type="video/mp4">
			</video>

			<!-- LOGO IN MENU -->
			<div id="logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img src="<?php header_image(); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
				</a>
			</div>

			<nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">
				
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
				
			</nav>
			<?php if ( has_nav_menu( 'social' ) ) : ?>
			<nav id="social-navigation" class="navigation site-navigation social-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'social' ) ); ?>
			</nav>
			<?php endif; ?>
			</div>

		

			<div id="logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">

			<?php if(is_page( 'Inspiration' ) ):
			?>

				<img src="<?php echo get_template_directory_uri() ?>/public/images/logo-negativo.png" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
				
			<?php
			else:
			?>
				<img src="<?php header_image(); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
				
			<?php

			endif;

			?>
				</a>
			</div>

			

			<?php if ( has_nav_menu( 'secondary' ) ) : ?>
			<nav id="secondary-navigation" class="navigation site-navigation secondary-navigation" role="navigation">
				
				<?php wp_nav_menu( array( 'theme_location' => 'secondary' ) ); ?>

				<?php if ( is_active_sidebar( 'languages' ) ) : ?>
				<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
					<?php dynamic_sidebar( 'Primary Sidebar' ); ?>
				</div><!-- #primary-sidebar -->
				<?php endif; ?>
			</nav>
			<?php endif; ?>

		</div>

		<?php if(is_tax() || is_post_type_archive()): ?>

			<?php if ( have_posts() ) : ?>

			<header class="line-header">
				<h1 class="category-title animated fadeIn">
					<?php

					//RECUPERO IL NOME DEL CUSTOM POST DI APPARTENENZA 

					$post_type = get_post_type_object( get_post_type($post) );
						
						echo $post_type->label ;

					?>
				</h1>
				<h2 class="line-title animated fadeIn">

					<?php 
					
					//RECUPERO LA CATEGORIA (GAMMA) DI APPARTENENZA
					//the_terms( $post->ID, $post_type->label.'-line', ' ', ' / ' ); -> GENERA UN LINK!

					$taxonomy_ar = get_the_terms($post->ID,  $post_type->label.'-line');
					foreach ($taxonomy_ar as $taxonomy_term) {
					    $gamma =  $taxonomy_term->name ;
					    $description = $taxonomy_term->description;
					   	$image = get_field('bg', $taxonomy_term);
					  }

					  

					if(is_post_type_archive()):

					  $tax = get_query_var( 'tax' );  

						$output = str_replace('-', ' ', $tax);
						echo $output;
			
					else:
						
					//STAMPO IL NOME DELLA GAMMA (CATEGORIA)
						
						echo $gamma;
					?>

					</h2>
					<?php
					//STAMPO L'IMMAGINE DI SFONDO
					  echo '<img src='.$image[url].' class="bgHeader">';

					//STAMPO LA DESCRIZIONE DELLA GAMMA (CATEGORIA)

						if($post_type->label == 'coloring'){

							echo '<p class="category-description animated fadeIn ">'.$description.'</p>';
						
						}
					  
					endif; 

					?>
				
			</header><!-- .archive-header -->
		<?php endif; endif; ?>

		
	</header><!-- #masthead -->



	<div id="main" class=" <?php if ( is_front_page()  ) {echo "home wrapper";}?>">
