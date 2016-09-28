// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

// Place any jQuery/helper plugins in here.

// @codekit-prepend "vendor/jquery.fitvids.js";
// @codekit-prepend "vendor/jquery.bxslider.js";
// @codekit-prepend "fotorama.js";

jQuery(function($) {

  $( document ).ready(function() {


    // Video slider
    $('.video_slider').bxSlider({
      video: true,
      useCSS: false,  
      pagerCustom: '.video_pager',
      infiniteLoop: false,
      controls: false,
      onSlideAfter: function(slide, oldindex, currentSlide){
        var indice = oldindex + 1;
        var idvideo = "#video"+indice; 
        $(idvideo)[0].contentWindow.postMessage('{"event":"command","func":"' +'pauseVideo' + '","args":""}', '*');      
      }
    });

    // Dialetto slider
    $('.dialetto_slider').bxSlider({
        auto: true
    });
    

    // Backstage slider
    // $('.bk_slider').bxSlider({
    //     pagerCustom: '.bk_pager'
    // });


    // Prodotto slider
    $('.prodotto_slider').bxSlider({
        auto: true
    });

    // Spot slider
    $('.spot_slider').bxSlider({
      video: true,
      controls: false,
      pagerCustom: '.spot_pager',
      infiniteLoop: false,
      onSlideAfter: function(slide, oldindex, currentSlide){
        var indice = oldindex + 1;
        var idvideo = "#video"+indice; 
        $(idvideo)[0].contentWindow.postMessage('{"event":"command","func":"' +'pauseVideo' + '","args":""}', '*');      
      }
    });




  
  });



  

}); // jQuery conflicts