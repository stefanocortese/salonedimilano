if (jQuery("body").hasClass("page-template-heritage")) {

	 var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        direction: 'vertical',
        slidesPerView: 1,
        paginationClickable: true,
        spaceBetween: 0,
        mousewheelControl: true,
        speed: 1500,
    	onSlideChangeStart: function(swiper){

    		console.log(swiper.activeIndex);
    		
    		if (swiper.activeIndex == 0) {

	 		jQuery('.scrollIcon').fadeIn();

		 	}

		 	else{

		 		jQuery('.scrollIcon').fadeOut(600);
		 	}

    		jQuery('article.swiper-slide-prev .blackVeilMotiv').removeClass('blackVeilMotivBlack animated fadeIn').delay(1000).queue(function(){
			    jQuery(this).addClass("blackVeilMotivBlack animated fadeIn").dequeue();
			});
            jQuery('article.swiper-slide-next .blackVeilMotiv').removeClass('blackVeilMotivBlack animated fadeIn').delay(1000).queue(function(){
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
            jQuery('article .pulsante').removeClass('animated fadeIn').delay(1000).queue(function(){
			    jQuery(this).addClass("animated fadeIn").dequeue();
			});

        }
    	
	 });
	 	

	 	if (swiper.activeIndex == 0) {

	 		jQuery('.scrollIcon').fadeIn();
	 		jQuery('article.swiper-slide-active .blackVeilMotiv').addClass('blackVeilMotivBlack animated fadeIn');
	 		jQuery('article.swiper-slide-active .entry-header').addClass('animated fadeIn');
        	jQuery('article.swiper-slide-active .entry-content').addClass('animated fadeIn');
        	


		 	}

		 	else{

		 	jQuery('.scrollIcon').fadeOut(600);
		 }
            

	
	}