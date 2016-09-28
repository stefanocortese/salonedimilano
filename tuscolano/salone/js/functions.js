/**
 * Theme functions file
 *
 * Contains handlers for navigation, accessibility, header sizing
 * footer widgets and Featured Content slider
 *
 */


function removeHoverCSSRule() {
  if ('createTouch' in document) {
    try {
      var ignore = /:hover/;
      for (var i = 0; i < document.styleSheets.length; i++) {
        var sheet = document.styleSheets[i];
        if (!sheet.cssRules) {
          continue;
        }
        for (var j = sheet.cssRules.length - 1; j >= 0; j--) {
          var rule = sheet.cssRules[j];
          if (rule.type === CSSRule.STYLE_RULE && ignore.test(rule.selectorText)) {
            sheet.deleteRule(j);
          }
        }
      }
    }
    catch(e) {
    }
  }
}
( function( $ ) {

	var body    = $( 'body' ),
		_window = $( window );


	if ( _window.width() < 768 ) {

		var mainMenu = $('#main-menu').find('.nav-menu');

		var secondaryNav = $('body').find('#secondary-navigation >div>ul');

		mainMenu.append(secondaryNav.children());
		secondaryNav.parent().parent().hide();
		$('.hamb').css('font-size', 0);
			
	}


	if ( _window.width() <= 1024 ) {

		removeHoverCSSRule();

	}



	_window.load( function() {

		if (body.is('.page-template-heritage')){
			var article = $('article');
			article.each(function(){
				var _urlImage = $(this).find('img').attr('src');
				$(this).css({'backgroundImage' : 'url('+ _urlImage+')'});
				$(this).find('img').remove();
			});
			
		}


		if (body.is('.page-template-caring, .page-template-coloring, .page-template-straightening')){

			var div = $('.page-template-caring .main-content .site-content >div, .page-template-coloring .main-content .site-content .coloring-content>div, .page-template-straightening .main-content .site-content > div');

	    
				div.each(function() {

					var urlImage = $(this).find('img').attr('src');

					if(body.is('.page-template-coloring')){

						//NO ADJUST HEIGHT

						$(this).css({'backgroundImage' : 'linear-gradient(rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.0)), url('+ urlImage+')'});

					}
					else{

						$(this).css({'height' : (_window.height() ), 'backgroundImage' : 'linear-gradient(rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.0)), url('+ urlImage+')'} );
					}	
						var that = $(this);

						setTimeout(function(){

							for(var i = 0; i <= 8; i++){
							    (function(i){
							        setTimeout(function(){

							        	$(that).css({'backgroundImage' : 'linear-gradient(rgba(0, 0, 0, 0.'+i+'), rgba(0, 0, 0, 0.'+i+')), url('+ urlImage +')'} );
							            
							        }, 50 * i);
							    }(i));
							}
						}, 1500);

					

					$(this).find('img').remove();


				});

		}

		//HEADER CARING 


		if (body.is('.tax-caring-line')){

			var _header =  $('.tax-caring-line .header_main');

			var _headerUrlImage = $(_header).css('background-image');

			$(_header).css({'backgroundImage' : 'linear-gradient(rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.0)), '+  _headerUrlImage +''} );

			setTimeout(function(){

				for(var i = 0; i <= 8; i++){
				    (function(i){
				        setTimeout(function(){

				        	$(_header).css({'backgroundImage' : 'linear-gradient(rgba(0, 0, 0, 0.'+i+'), rgba(0, 0, 0, 0.'+i+')), '+ _headerUrlImage +''} );

				        }, 50 * i);
				    }(i));
				}
			}, 1500);

			$(_header).find('img.bgHeader').remove();

		}


		if (body.is('.tax-coloring-line, .tax-straightening-line')){

			var header =  $('.tax-coloring-line .header_main,  .tax-straightening-line .header_main');

			var headerUrlImage = $(header).find('img.bgHeader').attr('src');

			$(header).css({'backgroundImage' : 'linear-gradient(rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.0)), url('+ headerUrlImage +')'} );

			setTimeout(function(){

				for(var i = 0; i <= 8; i++){
				    (function(i){
				        setTimeout(function(){

				        	$(header).css({'backgroundImage' : 'linear-gradient(rgba(0, 0, 0, 0.'+i+'), rgba(0, 0, 0, 0.'+i+')), url('+ headerUrlImage +')'} );

				        }, 50 * i);
				    }(i));
				}
			}, 1500);

			$(header).find('img.bgHeader').remove();

		}

		if (body.is('.post-type-archive') || body.is('.single') || body.is('.tax-straightening-line')){

			var article = $('article');

			
			article.each(function() {

				var that = this;

				if(_window.width()>767){

					$(that).css({'height' : (_window.height())} );

				}

				var bgUrlImage_1 = $('.extras>div>.benefit_1',that).find('img.benefit_1').attr('src');
				var bgUrlImage_2 = $('.extras>div>.benefit_2',that).find('img.benefit_2').attr('src');
				var bgUrlImage_3 = $('.extras>div>.benefit_3',that).find('img.benefit_3').attr('src');
				var bgUrlKit = $('.extras>div>.kit',that).css('background-image');

				if(_window.width()>767){
					$('.extras>div>div>div,.extras>div>div>img ', that).css('opacity', 0);
				}
				else{

					$('.extras .close').fadeOut(0);

					$('.extras>div> .benefit_1',that).css({'backgroundImage' : 'linear-gradient(rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.0)),url('+ bgUrlImage_1 +')'} );
					$('.extras>div> .benefit_2',that).css({'backgroundImage' : 'linear-gradient(rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.0)),url('+ bgUrlImage_2 +')'} );								
					$('.extras>div> .benefit_3',that).css({'backgroundImage' : 'linear-gradient(rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.0)),url('+ bgUrlImage_3 +')'} );
					$('.extras>div> .kit',that).css({'backgroundImage' : ''+ bgUrlKit +''} );
					
									
					var divExtras = $(this).parent().parent().parent().find('.extras');

					divExtras.css('visibility', 'visible').fadeIn(400);

					setTimeout(function(){

						for(var i = 0; i <= 8; i++){
						    (function(i){
							    setTimeout(function(){

									$('.extras>div> .benefit_1',that).css({'backgroundImage' : 'linear-gradient(rgba(0, 0, 0, 0.'+i+'), rgba(0, 0, 0, 0.'+i+')),url('+ bgUrlImage_1 +')'} );
									$('.extras>div> .benefit_2',that).css({'backgroundImage' : 'linear-gradient(rgba(0, 0, 0, 0.'+i+'), rgba(0, 0, 0, 0.'+i+')),url('+ bgUrlImage_2 +')'} );
									$('.extras>div> .benefit_3',that).css({'backgroundImage' : 'linear-gradient(rgba(0, 0, 0, 0.'+i+'), rgba(0, 0, 0, 0.'+i+')),url('+ bgUrlImage_3 +')'} );
									//$('.extras>div> .kit',that).css({'backgroundImage' : 'linear-gradient(rgba(0, 0, 0, 0.'+i+'), rgba(0, 0, 0, 0.'+i+')),'+ bgUrlKit +''} );

							    }, 50 * i);
							}(i));
						}

						$('.extras>div>div>div, .extras>div>div>img', that).addClass('animated fadeIn');

					}, 1500);
				}

				$('.show-benefit', that).on('click', function(e){

					e.preventDefault();

					$('.back-category').hide(10);
					$('nav.nav').hide(10);
					$('.share').hide(10);

					$('.extras>div> .benefit_1',that).css({'backgroundImage' : 'linear-gradient(rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.0)),url('+ bgUrlImage_1 +')'} );
					$('.extras>div> .benefit_2',that).css({'backgroundImage' : 'linear-gradient(rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.0)),url('+ bgUrlImage_2 +')'} );								
					$('.extras>div> .benefit_3',that).css({'backgroundImage' : 'linear-gradient(rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.0)),url('+ bgUrlImage_3 +')'} );
					$('.extras>div> .kit',that).css({'backgroundImage' : ''+ bgUrlKit +''} );
					
									
					var divExtras = $(this).parent().parent().parent().find('.extras');

					divExtras.css('visibility', 'visible').fadeIn(400);

					setTimeout(function(){

						for(var i = 0; i <= 8; i++){
						    (function(i){
							    setTimeout(function(){

									$('.extras>div> .benefit_1',that).css({'backgroundImage' : 'linear-gradient(rgba(0, 0, 0, 0.'+i+'), rgba(0, 0, 0, 0.'+i+')),url('+ bgUrlImage_1 +')'} );
									$('.extras>div> .benefit_2',that).css({'backgroundImage' : 'linear-gradient(rgba(0, 0, 0, 0.'+i+'), rgba(0, 0, 0, 0.'+i+')),url('+ bgUrlImage_2 +')'} );
									$('.extras>div> .benefit_3',that).css({'backgroundImage' : 'linear-gradient(rgba(0, 0, 0, 0.'+i+'), rgba(0, 0, 0, 0.'+i+')),url('+ bgUrlImage_3 +')'} );
									//$('.extras>div> .kit',that).css({'backgroundImage' : 'linear-gradient(rgba(0, 0, 0, 0.'+i+'), rgba(0, 0, 0, 0.'+i+')),'+ bgUrlKit +''} );

							    }, 50 * i);
							}(i));
						}

						$('.extras>div>div>div, .extras>div>div>img', that).addClass('animated fadeIn');

					}, 1500);

				});

				$('.extras>div> .benefit_1', this).find('img.benefit_1').remove();
				$('.extras>div> .benefit_2', this).find('img.benefit_2').remove();
				$('.extras>div> .benefit_3', this).find('img.benefit_3').remove();
				

				$('.extras .close').on('click', function(e){

					e.preventDefault();

					if(_window.width()>767){

						$('nav.nav').show(10);
						$('.back-category').show(10);
						$('.share').show(10);
					
					}

					

					$('.extras>div>div>div, .extras>div>div>img', that).removeClass('animated fadeIn');

					var divExtras = $('.extras');

					divExtras.fadeOut(800).css('visibility', 'hidden');
				});
			
			});
		


		}



		//HomePage & Heritage VIDEO


		if (body.is('.page-template-heritage') || body.is('.page-template-front-page') || body.is('.home')){

			$('#wV').on('click', function(e){

				e.preventDefault();

				$('<div></div>')
				.attr('class', 'overlayVideo')
				.css({
				    position: "absolute",
				    width: "100%",
				    height: "100%",
				    left: 0,
				    top: 0,
				    zIndex: 1000000,
				    background: "rgba(0,0,0,0.9)"
				})
				.append($('<div />')
					.attr('class', 'videoWrapper')
					.css('position', 'relative')
					.html('<div class="video"><iframe id="ytplayer" type="text/html"  width="560" height="315" src="https://www.youtube.com/embed/ll-6OFqdKns?autoplay=1&disablekb=1&enablejsapi=1&fs=1&showinfo=0&color=white&rel=0" frameborder="0" allowfullscreen></iframe></div><span class="close"></span>')
				)
				.delegate('.close', 'click', function(e){
					e.preventDefault(); 
            		$('.overlayVideo').fadeOut();
            		$('#ytplayer').attr('src', '');
            		$('.overlayVideo').remove();
				})
				.fadeIn()
				.appendTo($("body"));

			});
			

		}

		
		var menuVisible = false;
		
		$('.mobile >span').on('click',function() {
		if (menuVisible) {
			$('#main-menu').fadeOut(50);
			menuVisible = false;
			$(this).removeClass('closeHamb').addClass('hamb');
			$('#main-menu ul ul').hide();
			$('body').unbind('touchmove');	
			return;
		}
		$('#main-menu').css({'height' : _window.height()}).fadeIn(100);
			menuVisible = true;
			$(this).removeClass('hamb').addClass('closeHamb');
			$('body').bind('touchmove', function(e){e.preventDefault()})
		});
		
		var accordion = $('#main-menu').find('a[href$="#"]');

		$(accordion).on('click', function(){

			$('#main-menu ul ul').slideToggle();

		});	 


		//ANIMATED ARTICLE OF SINGLE CATEGORY


    if(body.is('.tax-caring-line, .tax-coloring-line, .tax-straightening-line')){

    	$('article').each(function(i) {
		  
		  $(this).css({

		  	'-webkit-animation-duration': '0.5s',
		  	'-webkit-animation-delay': ''+(i * 0.5 +3) +'s',
		  	'animation-delay': ''+(i * 0.5 +3 ) +'s',

		  });

		}); 

	}
	if(body.is('.page-template-store-locator')){}

	//SHARE BUTTON
	function tw_click(width, height,t,u) {
    var leftPosition, topPosition;
    //Allow for borders.
    leftPosition = (window.screen.width / 2) - ((width / 2) + 10);
    //Allow for title and status bars.
    topPosition = (window.screen.height / 2) - ((height / 2) + 50);
    var windowFeatures = "status=no,height=" + height + ",width=" + width + ",resizable=yes,left=" + leftPosition + ",top=" + topPosition + ",screenX=" + leftPosition + ",screenY=" + topPosition + ",toolbar=no,menubar=no,scrollbars=no,location=no,directories=no";
   
    window.open('https://twitter.com/share?display_url='+u+'&t='+encodeURIComponent(t),'sharer', windowFeatures);
    return false;
	}

	function fbs_click(width, height,t,u) {
    var leftPosition, topPosition;
    //Allow for borders.
    leftPosition = (window.screen.width / 2) - ((width / 2) + 10);
    //Allow for title and status bars.
    topPosition = (window.screen.height / 2) - ((height / 2) + 50);
    var windowFeatures = "status=no,height=" + height + ",width=" + width + ",resizable=yes,left=" + leftPosition + ",top=" + topPosition + ",screenX=" + leftPosition + ",screenY=" + topPosition + ",toolbar=no,menubar=no,scrollbars=no,location=no,directories=no";
    
   
    window.open('http://www.facebook.com/sharer.php?u='+u+'&t='+encodeURIComponent(t),'sharer', windowFeatures);
    return false;
	}

	function pnt_click(width, height,t,u) {
    var leftPosition, topPosition;
    //Allow for borders.
    leftPosition = (window.screen.width / 2) - ((width / 2) + 10);
    //Allow for title and status bars.
    topPosition = (window.screen.height / 2) - ((height / 2) + 50);
    var windowFeatures = "status=no,height=" + height + ",width=" + width + ",resizable=yes,left=" + leftPosition + ",top=" + topPosition + ",screenX=" + leftPosition + ",screenY=" + topPosition + ",toolbar=no,menubar=no,scrollbars=no,location=no,directories=no";
    
   
    window.open('http://pinterest.com/pin/create/link/?url='+u+'&t='+encodeURIComponent(t),'sharer', windowFeatures);
    return false;
	}

	$('.share').on('click', function(event){

		event.preventDefault();

		if($('.socialBtn').is(':visible')){
			$('.socialBtn', this).fadeOut();
		}
		else{

			$('.socialBtn').fadeIn(400, function(){

				var imgProperty = $(this).parent().parent().find('article.swiper-slide-active').find('img').attr('src'); 
					
					$('meta[property="og:image"]').attr('content', imgProperty);

				$('.fb', this).on('click', function(){

					var url = $(this).data('url') + "#" +  $(this).parent().parent().parent().find('article.swiper-slide-active').data('hash');
					url.replace('#', '%23');
					$('meta[property="og:url"]').attr('content', url);
					fbs_click(400, 300, 'satuweb', url);

					$('.socialBtn').fadeOut();

				});


				$('.tw', this).on('click', function(){

					var url = $(this).data('url') + "#" + $(this).parent().parent().parent().find('article.swiper-slide-active').data('hash');
					url.replace('#', '%23');
					tw_click(400, 300, 'satuweb', url);

					$('.socialBtn').fadeOut();

				});

				$('.pn', this).on('click', function(){

					var url = $(this).data('url') + "#" + $(this).parent().parent().parent().find('article.swiper-slide-active').data('hash');
					url.replace('#', '%23');
					pnt_click(400, 300, 'satuweb', url);

					$('.socialBtn').fadeOut();

				});



			});

		}

	});

	} );//END WINDOWLOAD
} )( jQuery );
