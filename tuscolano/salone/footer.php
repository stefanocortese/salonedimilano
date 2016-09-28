<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Salone_Milano
 * @since Salone Milano 1.0
 */
?>

		<!--  </div> #main -->

		<footer id="colophon" class="site-footer" role="contentinfo">

			<div class="site-info">
				<a href="<?php echo esc_url( __( 'http://www.bitamama.it/', 'salone' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'salone' ), 'Bitamama' ); ?></a>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>


  <noscript>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-39646642-3', 'auto');
  ga('send', 'pageview');
  </noscript>


	<!-- start cookie law -->
      <script type="text/javascript">
          var _cookielaw = {};

           <?php  if(ICL_LANGUAGE_CODE=='it'): 
           $ancor_str = "it";
        
        elseif(ICL_LANGUAGE_CODE=='pl'):
          
           $ancor_str = "pl";
        
        else:

           $ancor_str = "en";

        endif; ?>;



      _cookielaw.language = "<?php echo $ancor_str; ?>"; // format recognize: en, de , fr , pl,  to multilanguages you can manage this parameter with your own custom code
      _cookielaw.hostCookie = "cookie_law.s3.amazonaws.com"; // this is a constant...don't change it, keep away from this parameter
      _cookielaw.customBannerText= "false";
      _cookielaw.urlDetail = "/<?php echo $ancor_str; ?>/cookie/"; //you can also use a pdf file, insert your name file here
      _cookielaw.position = "top"; //if you want to move your overlay on "bottom" page you must change this string with 'bottom'
      _cookielaw.backgroundColor = "#000"; //change your background color
      _cookielaw.color = "#FFF"; //change your font color
      _cookielaw.colorHover = "#999"; //change your font color hover 
      _cookielaw.opacity = "0.8"; //choose your best opacity

    (function() {
      var cl = document.createElement('script'); cl.type = 'text/javascript'; cl.async = true;
      cl.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://') +_cookielaw.hostCookie + '/cookielaw.js';
      var clS = document.getElementsByTagName('script')[0]; clS.parentNode.insertBefore(cl, clS);
    })();


      </script>
      <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ?>/js/cookies.js"></script>
       <!-- end cookie law -->
</body>
</html>