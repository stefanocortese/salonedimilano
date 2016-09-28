jQuery(document).ready(function() {

function loading(){

	var divLoad = jQuery("<div>", {
		id:"loading"
	});

	var imgLogo = jQuery('<div class="logoIntro"></div>');
	var spinner = jQuery('<div class="spinner"><div></div></div>');
	
	jQuery(divLoad).prependTo('#main').append(jQuery(imgLogo)).append(jQuery(spinner));
	jQuery(spinner).find('div').animate({ width: 100 * jQuery(spinner).width() / 100 }, 1000); 

	
}


loading();

setTimeout(function(){

	jQuery('#loading').fadeOut(500, function() { jQuery(this).remove(); });

}, 1000); 

});
