// @codekit-prepend "plugins.js"; 
jQuery(function($) {

  $(document).ready(function() {


    $('.mobile').on('click', function(e){
        $('.main_menu').toggleClass('open')
        e.preventDefault();

    });

    var low_offset = '300';

    // WOW, animazioni storia solo se > di 880px
    if (Modernizr.mq('only screen and (min-width: 880px)')) {

        var low_offset = '300';
    }else{
        var low_offset = '30';
    }

       


   
    $('section').each(function( index ) {
      if( !$(this).hasClass('just_text') ){
        $(this).find('h2').addClass('fadeInUp');
        $(this).find('h3').addClass('fadeIn').attr('data-wow-delay', '.2s');
        $(this).find('p').addClass('fadeIn').attr('data-wow-delay', '.5s');
      }
    });

    if ((!Modernizr.touch )&& (!$('html').hasClass('lt-ie9'))     ) {
        //  Wow init!!
        new WOW().init();
    }


    // Posiziono la sidebar
    var sidebar_top =400;
    var side_left = $('.dark-wrapper').width() -50;



    if (Modernizr.mq('only screen and (max-width: 800px)')) 
         {
           var h = 480/320*$('.dark-wrapper').width();
            $('.slider').css('height',h+'px');
        }
        else{
            $('.slider').height($( window ).height()-200);
        }

    $('#dark_sidebar').css('top', sidebar_top).css('margin-left', side_left);


     var yBottom = $('.slide1').height()-80;
    if ( Modernizr.mq('only screen and (max-width: 1025px)')) 
        $('.goDown').hide();
    if ( Modernizr.mq('only screen and (max-width: 769px)')) 
        $('.goDown').show();
    else
        $('.goDown').show();
    
    $('.goDown').css('bottom',-yBottom);


    if (mobileCheckUserAgent()){
       $('.goDown').hide();
    }

    $(window).resize(function(){



       
         if (Modernizr.mq('only screen and (max-width: 800px)')) 
         {
           var h = 480/320*$('.dark-wrapper').width();
            $('.slider').css('height',h+'px');
          }
          else{

              if (Modernizr.mq('only screen and (max-width: 1024px)')) 
                  $('.slider').height($( window ).height()-200);
              else
                   $('.slider').height($( window ).height());
          }



         

        sidebar_top = 400;
        side_left = $('.dark-wrapper').width() -50;
        $('#dark_sidebar').css('top', sidebar_top).css('margin-left', side_left);
        var yBottom = $('.slide1').height()-100;
        
        $('.goDown').css('bottom',-yBottom);

        if (mobileCheckUserAgent()){
       $('.goDown').hide();
    }
    });


    /**
     * This part does the "fixed navigation after scroll" functionality
     * We use the jQuery function scroll() to recalculate our variables as the
     * page is scrolled/
     */
    // $(window).scroll(function(){
    //     var window_top = $(window).scrollTop() + 12; // the "12" should equal the margin-top value for nav.stick
    //     var div_top = $('#nav-anchor').offset().top;
    //         if (window_top > div_top) {
    //             $('nav').addClass('stick');
    //         } else {
    //             $('nav').removeClass('stick');
    //         }
    // });


    /**
     * This part causes smooth scrolling using scrollto.js
     * We target all a tags inside the nav, and apply the scrollto.js to it.
     */
     if (!mobileCheckUserAgent()){
    $("#dark_sidebar nav a").click(function(evn){
        // console.log('click');
        
        if (Modernizr.mq('only screen and (min-width: 680px)')) {
           
           
             $('html,body').stop().scrollTo(this.hash, 600);
            evn.preventDefault();
        }
        
    });
  }


     $(".goDown a").click(function(evn){
        // console.log('click');
        
         if (Modernizr.mq('only screen and (min-width: 1025px)')) {
             $('html,body').stop().scrollTo(this.hash, 600);
            evn.preventDefault();
        }
    });



    /**
     * This part handles the highlighting functionality.
     * We use the scroll functionality again, some array creation and
     * manipulation, class adding and class removing, and conditional testing
     */
    var aChildren = $("#dark_sidebar nav li").children(); // find the a children of the list items
    var aArray = []; // create the empty aArray
    for (var i=0; i < aChildren.length; i++) {
        var aChild = aChildren[i];
        var ahref = $(aChild).attr('href');
        aArray.push(ahref);
    } // this for loop fills the aArray with attribute href values

    $(window).scroll(function(){
        var windowPos = $(window).scrollTop(); // get the offset of the window from the top of page

        var windowHeight = $(window).height(); // get the height of the window
        var docHeight = $(document).height();

        for (var i=0; i < aArray.length; i++) {
            var theID = aArray[i];

            var divPos = $(theID).offset().top - 300; // get the offset of the div from the top of page
            var divHeight = $(theID).height(); // get the height of the div in question

            if (windowPos >= divPos && windowPos < (divPos + divHeight)) {
                $("a[href='" + theID + "']").addClass("nav-active");
            } else {
                $("a[href='" + theID + "']").removeClass("nav-active");
            }
        }

        if(windowPos + windowHeight == docHeight+37) {
            if (!$("#filo_sidebar nav li:last-child a").hasClass("nav-active")) {
                var navActiveCurrent = $(".nav-active").attr("href");
                $("a[href='" + navActiveCurrent + "']").removeClass("nav-active");
                $("#filo_sidebar nav li:last-child a").addClass("nav-active");
            }
        }
    });



  });


});


function mobileCheckUserAgent() {
  var check = false;
  if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    check = true;
  }
  /*(function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)))check = true;})(navigator.userAgent||navigator.vendor||window.opera);*/
  return check;
};

