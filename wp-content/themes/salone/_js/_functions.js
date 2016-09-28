/**
 * Theme functions file
 *
 * Contains handlers for navigation, accessibility, header sizing
 * footer widgets and Featured Content slider
 *
 */
( function( $ ) {

	var body    = $( 'body' ),
		_window = $( window );


	

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

				$(that).css({'height' : (_window.height())} );

				var bgUrlImage_1 = $('.extras>div>.benefit_1',that).find('img.benefit_1').attr('src');
				var bgUrlImage_2 = $('.extras>div>.benefit_2',that).find('img.benefit_2').attr('src');
				var bgUrlImage_3 = $('.extras>div>.benefit_3',that).find('img.benefit_3').attr('src');
				var bgUrlKit = $('.extras>div>.kit',that).css('background-image');

				$('.extras>div>div>div,.extras>div>div>img ', that).css('opacity', 0);

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

					$('.back-category').show(10);
					$('nav.nav').show(10);
					$('.share').show(10);
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
			$('#main-menu').css({'display':'none'});
			menuVisible = false;
			$(this).removeClass('closeHamb').addClass('hamb');
			$('#main-menu ul ul').hide();	
			return;
		}
		$('#main-menu').css({'display':'block', 'height' : _window.height()});
			menuVisible = true;
			$(this).removeClass('hamb').addClass('closeHamb');
		});
		
		var accordion = $('#main-menu').find('a[href$="#"]');

		$(accordion).on('click', function(){

			$('#main-menu ul ul').toggle();

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
	if(body.is('.page-template-store-locator')){

		function gotPosition(pos){

	        
	        var data_input = pos.coords.latitude+','+pos.coords.longitude;
			var latlng = new google.maps.LatLng(pos.coords.latitude, pos.coords.longitude);
			
			ajaxCall(data_input,latlng);

		}

		function errorGettingPosition(err){
		    if(err.code === 1) {
		    	$('#status').html("<span>Non hai autorizzato la geolocalizzazione</span>").fadeOut(400, function(){
			      	$(this).children().remove();
			    });
		     
		    } else if(err.code === 2) {
		    	$('#status').html("<span>Posizione non disponibile</span>").fadeIn(400, function(){

					$(this).delay( 2000 ).fadeOut(400, function(){
				      	$(this).children().remove();
					});

				});

		    } else if(err.code === 3) {
		    	$('#status').html("<span>Timeout</span>").fadeIn(400, function(){

					$(this).delay( 2000 ).fadeOut(400, function(){
				      	$(this).children().remove();
					});

				});
		    } else {
		    	$('#status').html('<span>'+err.message+'</span>').fadeIn(400, function(){

					$(this).delay( 2000 ).fadeOut(400, function(){
				      	$(this).children().remove();
					});

				});
		    }
		}

		

		

		function ajaxCall(data_input, _latlng, citta) {

			var latlng = _latlng;

			if(citta){

			    geocoder = new google.maps.Geocoder();
			    geocoder.geocode({
			        'address': citta
			    }, function(results, status) {
				    if (status == google.maps.GeocoderStatus.OK) {

				    latlng =  new google.maps.LatLng(results[0].geometry.location.lat(),results[0].geometry.location.lng());
				    
				    var data_input = results[0].geometry.location.lat()+','+results[0].geometry.location.lng();

				    console.log(data_input);
				    
				    createMap(data_input, latlng, 10);
				    
				    }


				        
			    });
			}
			else{

				createMap(data_input, latlng);

			}

			
		}


		function createMap(data_input, latlng){

			var myOptions = {
	            zoom: 10,
	            center: latlng,
	            mapTypeId: google.maps.MapTypeId.ROADMAP

		    };
	        
	        var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
	        // place the infowindow.  Invisible, without content.
	        var infowindow = new google.maps.InfoWindow({
	            content: '',
	        });

	        //STYLE MAP

	        map.set('styles', [ 
			  {
			    "featureType": "road.highway",
			    "elementType": "geometry.fill",
			    "stylers": [
			      { "color": "#81764e" }
			    ]
			  },{
			    "featureType": "landscape.natural",
			    "elementType": "geometry.fill",
			    "stylers": [
			      { "lightness": 68 },
			      { "gamma": 0.45 },
			      { "color": "#4af3ea" }
			    ]
			  },{
			    "featureType": "water",
			    "elementType": "geometry.fill",
			    "stylers": [
			      { "color": "#808080" }
			    ]
			  },{
			    "featureType": "poi.park",
			    "stylers": [
			      { "color": "#d5d3cc" },
			      { "lightness": 15 }
			    ]
			  },{
			    "featureType": "poi.medical",
			    "elementType": "geometry.fill",
			    "stylers": [
			      { "color": "#dcdcdc" }
			    ]
			  },{
			    "featureType": "poi.government",
			    "elementType": "geometry.fill",
			    "stylers": [
			      { "color": "#cecece" }
			    ]
			  },{
			    "featureType": "road",
			    "elementType": "geometry.fill",
			    "stylers": [
			      { "color": "#81764e" },
			      { "weight": 0.3 }
			    ]
			  },{
			    "featureType": "road.arterial",
			    "elementType": "geometry.stroke",
			    "stylers": [
			      { "color": "#81764e" }
			    ]
			  },{
			    "featureType": "poi.school",
			    "elementType": "geometry.fill",
			    "stylers": [
			      { "color": "#8a8686" }
			    ]
			  },{
			    "featureType": "landscape.natural",
			    "stylers": [
			      { "color": "#ffffff" }
			    ]
			  },{
			    "featureType": "poi",
			    "elementType": "geometry.stroke",
			    "stylers": [
			      { "color": "#dcdcdc" },
			      { "lightness": 37 }
			    ]
			  },{
			    "featureType": "landscape.natural",
			    "stylers": [
			      { "color": "#fafafa" }
			    ]
			  },{
			  },{
			  },{
			    "featureType": "road.arterial",
			    "stylers": [
			      { "color": "#81764e" },
			      { "weight": 0.5 }
			    ]
			  },{
			    "featureType": "road.highway",
			    "elementType": "geometry.stroke",
			    "stylers": [
			      { "color": "#81764e" },
			      { "weight": 0.7 }
			    ]
			  },
			  {
			    "featureType": "road",
			    "elementType": "geometry.stroke",
			    "stylers": [
			      { "color": "#81764e" },
			      { "weight": 0.1 },
			      { "visibility": "simplified" }
			    ]
			  },{
			    "featureType": "road",
			    "elementType": "labels",
			    "stylers": [
			      { "color": "#f9f9fa" },
			      { "visibility": "off" }
			    ]
			  },{
			    "featureType": "poi",
			    "elementType": "geometry.fill",
			    "stylers": [
			      { "color": "#c6c6c6" }
			    ]
			  },{
			    "featureType": "transit.line",
			    "stylers": [
			      { "visibility": "off" }
			    ]
			  },{
			    "featureType": "water",
			    "elementType": "geometry.fill",
			    "stylers": [
			      { "color": "#dddddd" }
			    ]
			  },{
			    "featureType": "administrative",
			    "stylers": [
			      { "visibility": "on" }
			    ]
			  },{
			    "featureType": "road",
			    "elementType": "geometry.fill",
			    "stylers": [
			      { "color": "#81764e" },
			      { "visibility": "simplified" },
			      { "weight": 0.5 }
			    ]
			  },{
			    "featureType": "landscape",
			    "stylers": [
			      { "color": "#eff0f0" }
			    ]
			  }
			]);

			var parameters = 'brands=836&coords='+data_input+'&distance=25';

			$.ajax({
			    url: "http://yourbeautysite.it/api/stores/search.json",
			    dataType: 'json',
			    data: parameters,
			    async : true,
			    beforeSend: function(){

			    	$('.searchTitle').fadeOut();

			    	$('form').fadeOut(200, function(){

			    		$(this).removeClass('center').addClass('right').fadeIn(400);

			    	});

			    	$('.geolocalBtn').fadeOut(50);
			    	
			    },
			    success: function(data) {
			    	//Visualizza il tasto show-grid
			    	//$('.show-grid').fadeIn();



			    	$.each(data, function(i,store){

			            //MARKERS
			            var marker = new google.maps.Marker({
		                position: new google.maps.LatLng(store.latitudine, store.longitudine),
		                map: map,
		                title: store.nome,
		                icon: templateUrl+'/public/images/marker.png'

			            });
			            // when the client clicks on a marker we set the content and bind the position to the marker
			            google.maps.event.addListener(marker, 'click', function() {

			            	if(store.orario !== undefined){
			            		var orario = "";
				            	$.each(store.orario, function(i, giorno){

					            	orario +=  i + " Mattina: "+ giorno.am + " - Pomeriggio: " + giorno.pm+" <br>";
					            		
					            });
				            }

			           
			              infowindow.setContent('<span class="nameStore">'+store.nome+'</span>' + '<br>'+store.indirizzo+
			              '<span class="dettaglio">'+
			              '<a class="pulsante" data-id="'+store.uid+'" '+
			              'data-lat="'+store.latitudine+'" '+
			              'data-lng="'+store.longitudine+'" '+
			              'data-nome="'+store.nome+'" '+
			              'data-indirizzo="'+store.indirizzo+'" '+
			              'data-orario="'+orario+'" '+
			              'data-url="'+store.url+'" '+
			              'href="#">Dettaglio</a>'+
			              '</span>');
			              infowindow.setPosition(this.getPosition())
			              infowindow.setMap(map);

			            });

						//APPENDO GLI ELEMNTI PER LA VISTA A GRID
						$('<div/>',{
						    'class'    : 'store-grid-item span3'
						}).appendTo('.store-grid').html(
						  '<span class="title">'+store.nome+''+
						  '<span class="address">'+store.indirizzo+''+
						  '<span class="dettaglio">'+
			              '<a class="pulsante" data-id="'+store.uid+'" '+
			              'data-lat="'+store.latitudine+'" '+
			              'data-lng="'+store.longitudine+'" '+
			              'data-nome="'+store.nome+'" '+
			              'data-indirizzo="'+store.indirizzo+'" '+
			              'data-orario="'+store.orario+'" '+
			              'data-url="'+store.url+'" '+
			              'href="#">Dettaglio</a>'+
			              '</span>'
						);

			        });
			      
			    },
			    complete: function(){

			    	

			    	$("body").delegate('.dettaglio .pulsante',"click", function(){

			    		infowindow.close();
						
						var id = $(this).data('id'),

						orario = $(this).data('orario'),

						nome = $(this).data('nome'),

						indirizzo = $(this).data('indirizzo'),

						sito = $(this).data('url'),

						lat = $(this).data('lat'),

						lng = $(this).data('lng');

						
						$('.page-template-store-locator').css({
							'backgroundImage' : 'none',
							'backgroundColor' : '#000'
						});

						$('.store-locator-content').removeClass('center').addClass('left');

						$('form').addClass('details');

						google.maps.event.trigger(map, 'resize');

						map.setZoom(17);

    					map.setCenter({lat : lat, lng : lng});

    					$('.store-details').empty();

			        	$('.store-details')
			        	.append($('<div />')
						.attr('class', 'store-name')
						.text(nome)
						)
						.append($('<div />')
						.attr('class', 'store-address')
						.text(indirizzo)
						);

						if(orario !== 'undefined'){
							
							$('.store-details')
							.append($('<div />')
							.attr('class', 'store-orario')
							.html('<span class="store-orario-title">Orario apertura:</span>'+orario)
							);
	
						}

						if(sito !== 'undefined'){
							$('.store-details')
							.append($('<div />')
							.attr('class', 'span12 store-url')
							.html('<a class="pulsante" href="'+sito+'">visit the site</a>')
							);
								/*				

							$('.store-details')
							.append($('<div />')
							.attr('class', 'site-link span12')
							.html('<a class="pulsante" href="http://www.tigota.it/" target="_blank" >Tigotà store</a>')
							);
						*/

						}

			        	$('.store-details').append().fadeIn();


					});
					
					$("body").delegate('.backMap','click', function(){

						$('.store-details').empty();

						$('.store-locator-content').removeClass('left').addClass('center');
						$('.storelocator-form').removeClass('right').addClass('center');

						$('.store-details').append().fadeOut();


						google.maps.event.trigger(map, 'resize');

						map.setZoom(10);


					});
		

			    },
			    error: function() {
			        $('#status').html("<span>error</span>").fadeOut(400, function(){
			      	  $(this).children().remove();
			        });
			    }
	  		});

		
		}

  		//GEOLOCAL HTML5

  		$('#geolocalBtn').on("click", function(){
  			var height = $(window).height() - 283;

			$('.store-locator-content').css('height', height+'px');

			navigator.geolocation.getCurrentPosition(gotPosition,errorGettingPosition,{'enableHighAccuracy':true,'timeout':10000,'maximumAge':0});	        

		});
		$("#storelocator-form").submit(function(e) {

			e.preventDefault();

			console.log($(this).serialize());

			var citta = $(this).serialize();

			if(citta !== "address="){

			var data_input = "brands=836&coords=";

			ajaxCall(data_input,null,citta);

			var height = $(window).height() - 280;

			$('.store-locator-content').css('height', height+'px');
		}
		else{

			$('#status').append("<span>Inserisci la città</span>").fadeIn(400, function(){

				$(this).delay( 2000 ).fadeOut(400, function(){
			      	$(this).children().remove();
				});

			});
		}

		});
	}

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
