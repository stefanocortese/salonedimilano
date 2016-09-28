( function( $ ) {

	var body    = $( 'body' ),
		_window = $( window );

	//GEOLOCAL HTML5
	$('#geolocalBtn').on("click", function(){
		if(_window.width() >767){
				var height = $(window).height() - 280;
		}
		else{
			var height = $(window).height() - 180;
		}
		$('.store-grid').empty();
		$('.store-locator-content').css('height', height+'px');
		navigator.geolocation.getCurrentPosition(gotPosition,errorGettingPosition,{'enableHighAccuracy':true,'timeout':10000,'maximumAge':0});	        
		ajaxCall(data_input,latlng);	
	});

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

	//INPUT ADDRESS
	$("#storelocator-form").submit(function(e) {

		e.preventDefault();

		$('.store-grid').empty();

		var citta = $(this).serialize();

		if(citta !== "address="){

			var data_input = "brands=836&coords=";

			ajaxCall(data_input,null,citta);
		
		}
		else{

			$('#status').append("<span>Inserisci la città</span>").fadeIn(400, function(){

				$(this).delay( 2000 ).fadeOut(400, function(){
			      	$(this).children().remove();
				});

			});
		}

	});

	//AJAX CALL
	function ajaxCall(data_input, _latlng, citta) {

		var latlng = _latlng;

		if(citta){

		    geocoder = new google.maps.Geocoder();
		    geocoder.geocode({
		        'address': citta
		    }, function(results, status) {

			    if (status == google.maps.GeocoderStatus.OK) {
			    	//ELIMINO GLI ELEMNTI DEL FORM E AGGIUNGO LA MAPPA

				    if(_window.width() >767){
						var height = $(window).height() - 280;
					}
					else{
						var height = $(window).height() - 180;
					}

				  $('.store-locator-content').css('height', height+'px');
					$('.store-details').append().fadeOut();
					$('.store-details').empty();
					$('.store-locator-content').removeClass('left').addClass('center');
					$('.storelocator-form').removeClass('right').addClass('center');
					

					
				    latlng =  new google.maps.LatLng(results[0].geometry.location.lat(),results[0].geometry.location.lng());
				    var data_input = results[0].geometry.location.lat()+','+results[0].geometry.location.lng();
				    var citta_address = citta.split('+');
				    var zoom = "";

				    if(citta_address.length>1){
				    	zoom = 18;
				    }
				    else{
				    	zoom = 10;
				    }
			    
			    	createMap(data_input, latlng, zoom);

			    }
			    else{
			    	$('#status').append("<span>Nessun centro nelle vicinanze</span>").fadeIn(400, function(){
						$(this).delay( 2000 ).fadeOut(400, function(){
			      		$(this).children().remove();
						}).insertBefore($('form #address'));

					});
			    }
			        
		    });
		}
		else{

			createMap(data_input, latlng);

		}
			
	}
	function createMap(data_input, latlng, zoom){
		//Lo zoom arriva solo con il form e non con geolocalizzazione
		var _zoom = "";
		if(zoom){
			 _zoom = zoom
		}else{
			_zoom = 10
		}

		var myOptions = {
            zoom: _zoom,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP

	    };
        
        var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);	        
        var infowindow = new google.maps.InfoWindow({
            content: '',
        });

        //MAP STYLE
        styleMap(map);

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
		    	$('.overlayMap').fadeIn(150);
		    	
		    },
		    success: function(data) {
		    	//Visualizza il tasto show-grid
		    	$('.show-grid').css('display', 'block');

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
		              'data-tel="'+store.telefono+'"'+
		              'data-email="'+store.referente_email+'" '+
		              'data-orario="'+orario+'" '+
		              'data-url="'+store.url+'" '+
		              'href="#">Dettaglio</a>'+
		              '</span>');
		              infowindow.setPosition(this.getPosition())
		              infowindow.setMap(map);

		            });

					//APPENDO GLI ELEMNTI PER LA VISTA A GRID
					if(store.orario !== undefined){
	            		var orario = "";
		            	$.each(store.orario, function(i, giorno){

			            	orario +=  i + " Mattina: "+ giorno.am + " - Pomeriggio: " + giorno.pm+" <br>";
			            		
			            });
			        }

					$('<div/>',{
					    'class'    : 'store-grid-item'
					}).appendTo('.store-grid').html(
					  '<span class="title">'+store.nome+'</span>'+
					  '<span class="address">'+store.indirizzo+'</span>'+
					  '<a href="tel:'+store.telefono+'" class="tel">'+store.telefono+'</a>'+
		              '<a href="mailto:'+store.referente_email+'" class="email">'+store.referente_email+'</a>'+
					  '<span class="dettaglio">'+
		              '<a class="pulsante" data-id="'+store.uid+'" '+
		              'data-lat="'+store.latitudine+'" '+
		              'data-lng="'+store.longitudine+'" '+
		              'data-nome="'+store.nome+'" '+
		              'data-indirizzo="'+store.indirizzo+'" '+
		              'data-tel="'+store.telefono+'"'+
		              'data-email="'+store.referente_email+'" '+

		              'data-orario="'+orario+'" '+
		              'data-url="'+store.url+'" '+
		              'href="#">Dettaglio</a>'+
		              '</span>'
					);

		        });
		      
		    },
		    complete: function(){

		    	$('.overlayMap').fadeOut(150);

		    	$("body").delegate('.dettaglio .pulsante',"click", function(){

		    		infowindow.close();
		    		
		    		$('.show-map').fadeOut();
		    		
		    		$('.show-grid').fadeOut();

		    		$('.store-grid').hide();
		    		
		    		$('#map_canvas').fadeIn(10);

		    		$('.page-template-store-locator').css({
						'backgroundImage' : 'none',
						'backgroundColor' : '#000'
					});

					var id = $(this).data('id'),

					orario = $(this).data('orario'),

					nome = $(this).data('nome'),

					indirizzo = $(this).data('indirizzo'),

					tel = $(this).data('tel'),

					email = $(this).data('email'),

					sito = $(this).data('url'),

					lat = $(this).data('lat'),

					lng = $(this).data('lng');


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

					if(tel !== 'undefined'){
						$('.store-details')
						.append($('<a />')
						.attr('href', 'tel:'+tel+'')
						.attr('class', 'store-tel')
						.text('tel: '+tel)
						);
						
					}
					if(email != null){
						$('.store-details')
						.append($('<a />')
						.attr('class', 'store-email')
						.attr('href', 'mailto:'+email+'')
						.text(email)
						);
						
					}

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
						LINK TIGOTA				

						$('.store-details')
						.append($('<div />')
						.attr('class', 'site-link span12')
						.html('<a class="pulsante" href="http://www.tigota.it/" target="_blank" >Tigotà store</a>')
						);
						*/

					}

					//APPENDO I CONTENUTI DETTAGLIO ALLA PAGINA, SE MOBILE DOPO IL FORM

					if(_window.width()<768){
						$('.store-details').insertAfter($('#storelocator-form')).fadeIn();
					}
					else{
						$('.store-details').append().fadeIn();
					}

				});
				
				$('.show-grid').bind('click', function(){

					$('.show-grid').css('display', 'none');

					$('.show-map').css('display', 'block');

					$('.page-template-store-locator #masthead, #storelocator-form').css({'position':'fixed',   'z-index' : '9999'});
					
					$('#map_canvas').fadeOut();

					$('.store-grid').fadeIn();

					$('.store-locator-content').removeClass('map').addClass('grid');

				});

				$('.show-map').bind('click', function(){

					$('.show-grid').css('display', 'block');

					$('.show-map').css('display', 'none');

					$('.page-template-store-locator #masthead, #storelocator-form').css({'position':'static',   'z-index' : '0'});
					
					$('#map_canvas').fadeIn();

					$('.store-grid').fadeOut();

					$('.store-locator-content').removeClass('grid').addClass('map');

					lastCenter=map.getCenter(); 
					google.maps.event.trigger(map, 'resize');
					map.setCenter(lastCenter);

				});
				
				$(".backMap").bind('click', function(){

					if($('.store-locator-content').hasClass('grid')){
						$('#map_canvas').hide();
						$('.store-grid').show();
						$('.show-map').show();
					}
					else if($('.store-locator-content').hasClass('map')){
						$('#map_canvas').show();
						$('.store-grid').hide();
						$('.show-grid').show();
					}

					
					$('.store-details').empty();
					$('.store-locator-content').removeClass('left').addClass('center');
					$('.storelocator-form').removeClass('right').addClass('center');
					$('.store-details').append().fadeOut();

					$('.page-template-store-locator').css({'backgroundImage' : 'url('+templateUrl+'/public/images/bg-store-locator.jpg)'});
					
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

	function styleMap(map){

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
	}

} )( jQuery );