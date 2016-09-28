function removeHoverCSSRule(){if("createTouch"in document)try{for(var e=/:hover/,t=0;t<document.styleSheets.length;t++){var a=document.styleSheets[t];if(a.cssRules)for(var i=a.cssRules.length-1;i>=0;i--){var r=a.cssRules[i];r.type===CSSRule.STYLE_RULE&&e.test(r.selectorText)&&a.deleteRule(i)}}}catch(n){}}!function($){var e=$("body"),t=$(window);if(t.width()<768){var a=$("#main-menu").find(".nav-menu"),i=$("body").find("#secondary-navigation >div>ul");a.append(i.children()),i.parent().parent().hide(),$(".hamb").css("font-size",0)}t.width()<=1024&&removeHoverCSSRule(),t.load(function(){function a(e){var t=e.coords.latitude+","+e.coords.longitude,a=new google.maps.LatLng(e.coords.latitude,e.coords.longitude);r(t,a)}function i(e){1===e.code?$("#status").html("<span>Non hai autorizzato la geolocalizzazione</span>").fadeOut(400,function(){$(this).children().remove()}):2===e.code?$("#status").html("<span>Posizione non disponibile</span>").fadeIn(400,function(){$(this).delay(2e3).fadeOut(400,function(){$(this).children().remove()})}):3===e.code?$("#status").html("<span>Timeout</span>").fadeIn(400,function(){$(this).delay(2e3).fadeOut(400,function(){$(this).children().remove()})}):$("#status").html("<span>"+e.message+"</span>").fadeIn(400,function(){$(this).delay(2e3).fadeOut(400,function(){$(this).children().remove()})})}function r(e,a,i){var r=a;i?(geocoder=new google.maps.Geocoder,geocoder.geocode({address:i},function(e,a){if(a==google.maps.GeocoderStatus.OK){if(t.width()>767)var s=$(window).height()-280;else var s=$(window).height()-180;$(".store-locator-content").css("height",s+"px"),$(".store-details").append().fadeOut(),$(".store-details").empty(),$(".store-locator-content").removeClass("left").addClass("center"),$(".storelocator-form").removeClass("right").addClass("center"),r=new google.maps.LatLng(e[0].geometry.location.lat(),e[0].geometry.location.lng());var o=e[0].geometry.location.lat()+","+e[0].geometry.location.lng(),l=i.split("+"),d="";d=l.length>1?18:10,n(o,r,d)}else $("#status").append("<span>Nessun centro nelle vicinanze</span>").fadeIn(400,function(){$(this).delay(2e3).fadeOut(400,function(){$(this).children().remove()}).insertBefore($("form #address"))})})):n(e,r)}function n(e,a,i){var r="";r=i?i:10;var n={zoom:r,center:a,mapTypeId:google.maps.MapTypeId.ROADMAP},s=new google.maps.Map(document.getElementById("map_canvas"),n),o=new google.maps.InfoWindow({content:""});s.set("styles",[{featureType:"road.highway",elementType:"geometry.fill",stylers:[{color:"#81764e"}]},{featureType:"landscape.natural",elementType:"geometry.fill",stylers:[{lightness:68},{gamma:.45},{color:"#4af3ea"}]},{featureType:"water",elementType:"geometry.fill",stylers:[{color:"#808080"}]},{featureType:"poi.park",stylers:[{color:"#d5d3cc"},{lightness:15}]},{featureType:"poi.medical",elementType:"geometry.fill",stylers:[{color:"#dcdcdc"}]},{featureType:"poi.government",elementType:"geometry.fill",stylers:[{color:"#cecece"}]},{featureType:"road",elementType:"geometry.fill",stylers:[{color:"#81764e"},{weight:.3}]},{featureType:"road.arterial",elementType:"geometry.stroke",stylers:[{color:"#81764e"}]},{featureType:"poi.school",elementType:"geometry.fill",stylers:[{color:"#8a8686"}]},{featureType:"landscape.natural",stylers:[{color:"#ffffff"}]},{featureType:"poi",elementType:"geometry.stroke",stylers:[{color:"#dcdcdc"},{lightness:37}]},{featureType:"landscape.natural",stylers:[{color:"#fafafa"}]},{},{},{featureType:"road.arterial",stylers:[{color:"#81764e"},{weight:.5}]},{featureType:"road.highway",elementType:"geometry.stroke",stylers:[{color:"#81764e"},{weight:.7}]},{featureType:"road",elementType:"geometry.stroke",stylers:[{color:"#81764e"},{weight:.1},{visibility:"simplified"}]},{featureType:"road",elementType:"labels",stylers:[{color:"#f9f9fa"},{visibility:"off"}]},{featureType:"poi",elementType:"geometry.fill",stylers:[{color:"#c6c6c6"}]},{featureType:"transit.line",stylers:[{visibility:"off"}]},{featureType:"water",elementType:"geometry.fill",stylers:[{color:"#dddddd"}]},{featureType:"administrative",stylers:[{visibility:"on"}]},{featureType:"road",elementType:"geometry.fill",stylers:[{color:"#81764e"},{visibility:"simplified"},{weight:.5}]},{featureType:"landscape",stylers:[{color:"#eff0f0"}]}]);var l="brands=836&coords="+e+"&distance=25";$.ajax({url:"http://yourbeautysite.it/api/stores/search.json",dataType:"json",data:l,async:!0,beforeSend:function(){$(".searchTitle").fadeOut(),$("form").fadeOut(200,function(){$(this).removeClass("center").addClass("right").fadeIn(400)}),$(".geolocalBtn").fadeOut(50),$(".overlayMap").fadeIn(150)},success:function(e){$.each(e,function(e,t){var a=new google.maps.Marker({position:new google.maps.LatLng(t.latitudine,t.longitudine),map:s,title:t.nome,icon:templateUrl+"/public/images/marker.png"});google.maps.event.addListener(a,"click",function(){if(void 0!==t.orario){var e="";$.each(t.orario,function(t,a){e+=t+" Mattina: "+a.am+" - Pomeriggio: "+a.pm+" <br>"})}o.setContent('<span class="nameStore">'+t.nome+"</span><br>"+t.indirizzo+'<span class="dettaglio"><a class="pulsante" data-id="'+t.uid+'" data-lat="'+t.latitudine+'" data-lng="'+t.longitudine+'" data-nome="'+t.nome+'" data-indirizzo="'+t.indirizzo+'" data-tel="'+t.telefono+'"data-email="'+t.referente_email+'" data-orario="'+e+'" data-url="'+t.url+'" href="#">Dettaglio</a></span>'),o.setPosition(this.getPosition()),o.setMap(s)}),$("<div/>",{"class":"store-grid-item span3"}).appendTo(".store-grid").html('<span class="title">'+t.nome+'<span class="address">'+t.indirizzo+'<span class="dettaglio"><a class="pulsante" data-id="'+t.uid+'" data-lat="'+t.latitudine+'" data-lng="'+t.longitudine+'" data-nome="'+t.nome+'" data-indirizzo="'+t.indirizzo+'" data-orario="'+t.orario+'" data-url="'+t.url+'" href="#">Dettaglio</a></span>')})},complete:function(){$(".overlayMap").fadeOut(150),$("body").delegate(".dettaglio .pulsante","click",function(){o.close();var e=$(this).data("id"),a=$(this).data("orario"),i=$(this).data("nome"),r=$(this).data("indirizzo"),n=$(this).data("tel"),l=$(this).data("email"),d=$(this).data("url"),c=$(this).data("lat"),g=$(this).data("lng");$(".page-template-store-locator").css({backgroundImage:"none",backgroundColor:"#000"}),$(".store-locator-content").removeClass("center").addClass("left"),$("form").addClass("details"),google.maps.event.trigger(s,"resize"),s.setZoom(17),s.setCenter({lat:c,lng:g}),$(".store-details").empty(),$(".store-details").append($("<div />").attr("class","store-name").text(i)).append($("<div />").attr("class","store-address").text(r)),"undefined"!==n&&$(".store-details").append($("<a />").attr("href","tel:"+n).attr("class","store-tel").text("tel: "+n)),null!=l&&$(".store-details").append($("<a />").attr("class","store-email").attr("href","mailto:"+l).text(l)),"undefined"!==a&&$(".store-details").append($("<div />").attr("class","store-orario").html('<span class="store-orario-title">Orario apertura:</span>'+a)),"undefined"!==d&&$(".store-details").append($("<div />").attr("class","span12 store-url").html('<a class="pulsante" href="'+d+'">visit the site</a>')),t.width()<768?$(".store-details").insertAfter($("#storelocator-form")).fadeIn():$(".store-details").append().fadeIn()}),$("body").delegate(".backMap","click",function(){$(".store-details").empty(),$(".store-locator-content").removeClass("left").addClass("center"),$(".storelocator-form").removeClass("right").addClass("center"),$(".store-details").append().fadeOut(),google.maps.event.trigger(s,"resize"),s.setZoom(10)})},error:function(){$("#status").html("<span>error</span>").fadeOut(400,function(){$(this).children().remove()})}})}function s(e,t,a,i){var r,n;r=window.screen.width/2-(e/2+10),n=window.screen.height/2-(t/2+50);var s="status=no,height="+t+",width="+e+",resizable=yes,left="+r+",top="+n+",screenX="+r+",screenY="+n+",toolbar=no,menubar=no,scrollbars=no,location=no,directories=no";return window.open("https://twitter.com/share?display_url="+i+"&t="+encodeURIComponent(a),"sharer",s),!1}function o(e,t,a,i){var r,n;r=window.screen.width/2-(e/2+10),n=window.screen.height/2-(t/2+50);var s="status=no,height="+t+",width="+e+",resizable=yes,left="+r+",top="+n+",screenX="+r+",screenY="+n+",toolbar=no,menubar=no,scrollbars=no,location=no,directories=no";return window.open("http://www.facebook.com/sharer.php?u="+i+"&t="+encodeURIComponent(a),"sharer",s),!1}function l(e,t,a,i){var r,n;r=window.screen.width/2-(e/2+10),n=window.screen.height/2-(t/2+50);var s="status=no,height="+t+",width="+e+",resizable=yes,left="+r+",top="+n+",screenX="+r+",screenY="+n+",toolbar=no,menubar=no,scrollbars=no,location=no,directories=no";return window.open("http://pinterest.com/pin/create/link/?url="+i+"&t="+encodeURIComponent(a),"sharer",s),!1}if(e.is(".page-template-heritage")){var d=$("article");d.each(function(){var e=$(this).find("img").attr("src");$(this).css({backgroundImage:"url("+e+")"}),$(this).find("img").remove()})}if(e.is(".page-template-caring, .page-template-coloring, .page-template-straightening")){var c=$(".page-template-caring .main-content .site-content >div, .page-template-coloring .main-content .site-content .coloring-content>div, .page-template-straightening .main-content .site-content > div");c.each(function(){var a=$(this).find("img").attr("src");e.is(".page-template-coloring")?$(this).css({backgroundImage:"linear-gradient(rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.0)), url("+a+")"}):$(this).css({height:t.height(),backgroundImage:"linear-gradient(rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.0)), url("+a+")"});var i=$(this);setTimeout(function(){for(var e=0;8>=e;e++)!function(e){setTimeout(function(){$(i).css({backgroundImage:"linear-gradient(rgba(0, 0, 0, 0."+e+"), rgba(0, 0, 0, 0."+e+")), url("+a+")"})},50*e)}(e)},1500),$(this).find("img").remove()})}if(e.is(".tax-caring-line")){var g=$(".tax-caring-line .header_main"),u=$(g).css("background-image");$(g).css({backgroundImage:"linear-gradient(rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.0)), "+u}),setTimeout(function(){for(var e=0;8>=e;e++)!function(e){setTimeout(function(){$(g).css({backgroundImage:"linear-gradient(rgba(0, 0, 0, 0."+e+"), rgba(0, 0, 0, 0."+e+")), "+u})},50*e)}(e)},1500),$(g).find("img.bgHeader").remove()}if(e.is(".tax-coloring-line, .tax-straightening-line")){var f=$(".tax-coloring-line .header_main,  .tax-straightening-line .header_main"),m=$(f).find("img.bgHeader").attr("src");$(f).css({backgroundImage:"linear-gradient(rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.0)), url("+m+")"}),setTimeout(function(){for(var e=0;8>=e;e++)!function(e){setTimeout(function(){$(f).css({backgroundImage:"linear-gradient(rgba(0, 0, 0, 0."+e+"), rgba(0, 0, 0, 0."+e+")), url("+m+")"})},50*e)}(e)},1500),$(f).find("img.bgHeader").remove()}if(e.is(".post-type-archive")||e.is(".single")||e.is(".tax-straightening-line")){var d=$("article");d.each(function(){var e=this;t.width()>767&&$(e).css({height:t.height()});var a=$(".extras>div>.benefit_1",e).find("img.benefit_1").attr("src"),i=$(".extras>div>.benefit_2",e).find("img.benefit_2").attr("src"),r=$(".extras>div>.benefit_3",e).find("img.benefit_3").attr("src"),n=$(".extras>div>.kit",e).css("background-image");if(t.width()>767)$(".extras>div>div>div,.extras>div>div>img ",e).css("opacity",0);else{$(".extras .close").fadeOut(0),$(".extras>div> .benefit_1",e).css({backgroundImage:"linear-gradient(rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.0)),url("+a+")"}),$(".extras>div> .benefit_2",e).css({backgroundImage:"linear-gradient(rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.0)),url("+i+")"}),$(".extras>div> .benefit_3",e).css({backgroundImage:"linear-gradient(rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.0)),url("+r+")"}),$(".extras>div> .kit",e).css({backgroundImage:""+n});var s=$(this).parent().parent().parent().find(".extras");s.css("visibility","visible").fadeIn(400),setTimeout(function(){for(var t=0;8>=t;t++)!function(t){setTimeout(function(){$(".extras>div> .benefit_1",e).css({backgroundImage:"linear-gradient(rgba(0, 0, 0, 0."+t+"), rgba(0, 0, 0, 0."+t+")),url("+a+")"}),$(".extras>div> .benefit_2",e).css({backgroundImage:"linear-gradient(rgba(0, 0, 0, 0."+t+"), rgba(0, 0, 0, 0."+t+")),url("+i+")"}),$(".extras>div> .benefit_3",e).css({backgroundImage:"linear-gradient(rgba(0, 0, 0, 0."+t+"), rgba(0, 0, 0, 0."+t+")),url("+r+")"})},50*t)}(t);$(".extras>div>div>div, .extras>div>div>img",e).addClass("animated fadeIn")},1500)}$(".show-benefit",e).on("click",function(t){t.preventDefault(),$(".back-category").hide(10),$("nav.nav").hide(10),$(".share").hide(10),$(".extras>div> .benefit_1",e).css({backgroundImage:"linear-gradient(rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.0)),url("+a+")"}),$(".extras>div> .benefit_2",e).css({backgroundImage:"linear-gradient(rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.0)),url("+i+")"}),$(".extras>div> .benefit_3",e).css({backgroundImage:"linear-gradient(rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.0)),url("+r+")"}),$(".extras>div> .kit",e).css({backgroundImage:""+n});var s=$(this).parent().parent().parent().find(".extras");s.css("visibility","visible").fadeIn(400),setTimeout(function(){for(var t=0;8>=t;t++)!function(t){setTimeout(function(){$(".extras>div> .benefit_1",e).css({backgroundImage:"linear-gradient(rgba(0, 0, 0, 0."+t+"), rgba(0, 0, 0, 0."+t+")),url("+a+")"}),$(".extras>div> .benefit_2",e).css({backgroundImage:"linear-gradient(rgba(0, 0, 0, 0."+t+"), rgba(0, 0, 0, 0."+t+")),url("+i+")"}),$(".extras>div> .benefit_3",e).css({backgroundImage:"linear-gradient(rgba(0, 0, 0, 0."+t+"), rgba(0, 0, 0, 0."+t+")),url("+r+")"})},50*t)}(t);$(".extras>div>div>div, .extras>div>div>img",e).addClass("animated fadeIn")},1500)}),$(".extras>div> .benefit_1",this).find("img.benefit_1").remove(),$(".extras>div> .benefit_2",this).find("img.benefit_2").remove(),$(".extras>div> .benefit_3",this).find("img.benefit_3").remove(),$(".extras .close").on("click",function(a){a.preventDefault(),t.width()>767&&($("nav.nav").show(10),$(".back-category").show(10),$(".share").show(10)),$(".extras>div>div>div, .extras>div>div>img",e).removeClass("animated fadeIn");var i=$(".extras");i.fadeOut(800).css("visibility","hidden")})})}(e.is(".page-template-heritage")||e.is(".page-template-front-page")||e.is(".home"))&&$("#wV").on("click",function(e){e.preventDefault(),$("<div></div>").attr("class","overlayVideo").css({position:"absolute",width:"100%",height:"100%",left:0,top:0,zIndex:1e6,background:"rgba(0,0,0,0.9)"}).append($("<div />").attr("class","videoWrapper").css("position","relative").html('<div class="video"><iframe id="ytplayer" type="text/html"  width="560" height="315" src="https://www.youtube.com/embed/ll-6OFqdKns?autoplay=1&disablekb=1&enablejsapi=1&fs=1&showinfo=0&color=white&rel=0" frameborder="0" allowfullscreen></iframe></div><span class="close"></span>')).delegate(".close","click",function(e){e.preventDefault(),$(".overlayVideo").fadeOut(),$("#ytplayer").attr("src",""),$(".overlayVideo").remove()}).fadeIn().appendTo($("body"))});var p=!1;$(".mobile >span").on("click",function(){return p?($("#main-menu").fadeOut(50),p=!1,$(this).removeClass("closeHamb").addClass("hamb"),$("#main-menu ul ul").hide(),void $("body").unbind("touchmove")):($("#main-menu").css({height:t.height()}).fadeIn(100),p=!0,$(this).removeClass("hamb").addClass("closeHamb"),void $("body").bind("touchmove",function(e){e.preventDefault()}))});var h=$("#main-menu").find('a[href$="#"]');$(h).on("click",function(){$("#main-menu ul ul").slideToggle()}),e.is(".tax-caring-line, .tax-coloring-line, .tax-straightening-line")&&$("article").each(function(e){$(this).css({"-webkit-animation-duration":"0.5s","-webkit-animation-delay":""+(.5*e+3)+"s","animation-delay":""+(.5*e+3)+"s"})}),e.is(".page-template-store-locator")&&($("#geolocalBtn").on("click",function(){if(t.width()>767)var e=$(window).height()-280;else var e=$(window).height()-180;$(".store-locator-content").css("height",e+"px"),navigator.geolocation.getCurrentPosition(a,i,{enableHighAccuracy:!0,timeout:1e4,maximumAge:0})}),$("#storelocator-form").submit(function(e){e.preventDefault();var t=$(this).serialize();if("address="!==t){var a="brands=836&coords=";r(a,null,t)}else $("#status").append("<span>Inserisci la città</span>").fadeIn(400,function(){$(this).delay(2e3).fadeOut(400,function(){$(this).children().remove()})})})),$(".share").on("click",function(e){e.preventDefault(),$(".socialBtn").is(":visible")?$(".socialBtn",this).fadeOut():$(".socialBtn").fadeIn(400,function(){var e=$(this).parent().parent().find("article.swiper-slide-active").find("img").attr("src");$('meta[property="og:image"]').attr("content",e),$(".fb",this).on("click",function(){var e=$(this).data("url")+"#"+$(this).parent().parent().parent().find("article.swiper-slide-active").data("hash");e.replace("#","%23"),$('meta[property="og:url"]').attr("content",e),o(400,300,"satuweb",e),$(".socialBtn").fadeOut()}),$(".tw",this).on("click",function(){var e=$(this).data("url")+"#"+$(this).parent().parent().parent().find("article.swiper-slide-active").data("hash");e.replace("#","%23"),s(400,300,"satuweb",e),$(".socialBtn").fadeOut()}),$(".pn",this).on("click",function(){var e=$(this).data("url")+"#"+$(this).parent().parent().parent().find("article.swiper-slide-active").data("hash");e.replace("#","%23"),l(400,300,"satuweb",e),$(".socialBtn").fadeOut()})})})})}(jQuery);