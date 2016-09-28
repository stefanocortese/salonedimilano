// @codekit-prepend "plugins.js"; 
// @codekit-prepend "vendor/jquery.event.move.js"; 
// @codekit-prepend "vendor/jquery.twentytwenty.js"; 




jQuery(function($) {

  $( document ).ready(function() {
    
    // fb
 $('.mobile').on('click', function(e){
        $('.main_menu').toggleClass('open')
        e.preventDefault();

    });


    // -------------------------
    $('#fb #fb-status #fb-like-box-launcher').on('click', function(e) {

      e.preventDefault();
      e.stopPropagation();

      $('#fb').toggleClass('active');


      return false;

    });

    $('main_menu a').on('click', function(e) {

      e.preventDefault();
      e.stopPropagation();

      $('this').toggleClass('active');


      return false;

    });




    // Product
  // -------------------------
  if ($('body').hasClass('product')) {

    $('.related').mouseover(function() {
      var number = $(this).find('.img_related').attr('data-number');
      $('.img_related').removeClass('active');
      $('.img_related').removeClass('active2');
      $(this).find('.img_related').addClass('active');

      switch (number) {
        case '1':
          $('.img_related[data-number="2"]').addClass('active2');
           $('.img_related[data-number="4"]').addClass('active2');
          //console.log('case 1');
          break;
        case '2':
           $('.img_related[data-number="4"]').addClass('active2');
        case '3':
          $('.img_related[data-number="2"]').addClass('active2');
           $('.img_related[data-number="4"]').addClass('active2');
        case '4':
          $('.img_related[data-number="2"]').addClass('active2');
          break;
      }

      $('.img_related').removeClass('active');
      $(this).find('.img_related').addClass('active');
    });



    imageresize();

  }
    

    
    


  $(window).load(function() {
    
  
  });

  $(window).scroll(function(){
  });

  $(window).resize(function(){
    
    imageresize();
    
  }); 


  
  });


  function imageresize() {
    var contentwidth = $(window).width();

    if ((contentwidth) < '740'){
        $('.fluidimage').each(function(){
            var thisImg = $(this);
            var newSrc = thisImg.attr('src').replace('big-', 'small-');
            thisImg.attr('src', newSrc);
        });
    } else {
        $('.fluidimage').each(function(){
            var thisImg = $(this);
            var newSrc = thisImg.attr('src').replace('small-', 'big-');
            thisImg.attr('src', newSrc);
        });
    }
  }

  

  

}); // jQuery conflicts
