     /**
     * Create cookie with javascript
     *
     * @param {string} name cookie name
     * @param {string} value cookie value
     * @param {int} expire
     * @param {string} path
     */
    function create_cookie(name, value, expire, path) {
      var date = new Date();
      date.setTime(date.getTime() + (expire * 24 * 60 * 60 * 1000));
      var expires = date.toUTCString();
      document.cookie = name + '=' + value + ';' +
                       'expires=' + expires + ';' +
                       'path=' + path + ';';
    }
      /**
      * Retrieve cookie with javascript
      *
      * @param {string} name cookie name
      */
      function retrieve_cookie(name) {
      var cookie_value = "",
        current_cookie = "",
        name_expr = name + "=",
        all_cookies = document.cookie.split(';'),
        n = all_cookies.length;

      for(var i = 0; i < n; i++) {
        current_cookie = all_cookies[i].trim();
        if(current_cookie.indexOf(name_expr) == 0) {
          cookie_value = current_cookie.substring(name_expr.length, current_cookie.length);
          break;
        }
      }
      return cookie_value;
      }

      /**
      * Delete cookie with javascript
      *
      * @param {string} name cookie name
      */
      function delete_cookie(name) {
      document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/";
      }
    
      jQuery(document).ready(function($) {

        var cookie_enable = 'cookieLawEnabled';
        var _ga = '_ga';
        var cookie_value_on = 1;
        var cookie_value_off = 0;
        var res_enable = retrieve_cookie(cookie_enable);
        var checkbox = $('.cookieCheck');
        var content_Analytics = $('.ga_activate').html();
        var videoUrl = $('iframe[src*="youtube"]').attr("src");
        var videoUrl2 = $('.various').attr("href");

        $.each(checkbox, function() {
          var cookie_name = $(this).attr('name');
          var res_cookie = retrieve_cookie(cookie_name);
          var warning = $(this).parent().parent().siblings('.alert').children();
          var that = $(this);
          warning.fadeOut(1);

          if(res_cookie==1) {
            that.prop( "checked", true);
          } else {
            if(res_enable && !res_cookie) {
              that.prop( "checked", true);
            } else if(res_cookie==0){
              that.prop( "checked", false);
            }else{
              that.prop( "disabled", true);
            }
          }

          if(that.is( ":checked" )){ 
            create_cookie(cookie_name, cookie_value_on, 365, "/");
          }
          if(res_enable){
            that.change(function() {   
              if(that.is( ":checked" )){
                create_cookie(cookie_name, cookie_value_on, 365, "/");
                warning.fadeOut(cookie_name);
                gaOptin(cookie_name);
              }
              else{
                create_cookie(cookie_name, cookie_value_off, 365, "/");
                warning.fadeIn();
                gaOptout(cookie_name);
              }
            }).change();
          }

          
        });//END EACH

        function youtubeOptin(_cookie_name, url){
          
          if(retrieve_cookie(_cookie_name) !=  0){
            $('#wV').show(1);
          }else if(!retrieve_cookie(_cookie_name)){
            $('#wV').show(1);
          }else{
            $('#wV').hide(1);
          }
        }
        youtubeOptin('Youtube', videoUrl2);

        function gaOptin(_cookie_name, content_Analytics){
          if(_cookie_name == "Analytics"){
            $('.ga_activate').html(content_Analytics);
          }
        }


        function gaOptout(_cookie_name){
          if(_cookie_name == "Analytics"){
            $('.ga_activate').empty();
          }
        }

      });//END D.READY
