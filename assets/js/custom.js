(function ($) {
    "use strict";
    $(window).on('load', function () {
        $('.preloader').fadeOut(1000);
    })

    // load more for blog
    // ;(function($){
    // $(document).ready(function(){
    //     $("#loadmore").on('click', function(e){
    //         var nexturl = $(this).attr('href');
    //         $.get(nexturl,{},function(data){
    //             var posts = $(data).find("#posts-container").html();
    //             $("#posts-container").append(posts);

    //             var newpagelink = $(data).find("#loadmore").attr('href');
    //             if(newpagelink){
    //                 $("#loadmore").attr('href', newpagelink);
    //             }
    //             else{
    //                 $("#loadmore").hide('slow');
    //             }
    //         });
    //         return false;
    //     });

    //     var newpagelink = $("#loadmore").attr('href');
    //     if(!newpagelink){
    //         $("#loadmore").hide();
    //     }

    // });
    // })(jQuery);




    //load more button for custom wp query 
    ;(function($){
    $(document).ready(function(){
        $("#loadmores").on('click', function(e){
            var nexturl = $(this).attr('href');
            $.get(nexturl,{},function(data){
                var posts = $(data).find("#loademoreposts").html();
                $("#loademoreposts").append(posts);

                var newpagelink = $(data).find("#loadmores").attr('href');
                if(newpagelink){
                    $("#loadmores").attr('href', newpagelink);
                }
                else{
                    $("#loadmores").hide('slow');
                }
            });
            return false;
        });

        var newpagelink = $("#loadmores").attr('href');
        if(!newpagelink){
            $("#loadmores").hide();
        }

    });
    })(jQuery);
    //load more button for custom wp query 


    
    //portfolio
    // ;(function($){
    // $(document).ready(function(){
    //     $("#loadmoresbtn").on('click', function(e){
    //         var nexturl = $(this).attr('href');
    //         $.get(nexturl,{},function(data){
    //             var posts = $(data).find("#loademorepostsrap").html();
    //             $("#loademorepostsrap").append(posts);

    //             var newpagelink = $(data).find("#loadmoresbtn").attr('href');
    //             if(newpagelink){
    //                 $("#loadmoresbtn").attr('href', newpagelink);
    //             }
    //             else{
    //                 $("#loadmoresbtn").hide('slow');
    //             }
    //         });
    //         return false;
    //     });

    //     var newpagelink = $("#loadmoresbtn").attr('href');
    //     if(!newpagelink){
    //         $("#loadmoresbtn").hide();
    //     }

    // });
    // })(jQuery);
    




    $(document).ready(function () {
        /*==== header Section Start here =====*/
        $('.header-bar').on('click', function () {
            $(this).toggleClass('active');
            $('.menu').toggleClass('active');
        })

        var fixed_top = $("header");
        $(window).on('scroll', function () {
            if ($(this).scrollTop() > 300) {
                fixed_top.addClass("header-fixed fadeInUp");
            } else {
                fixed_top.removeClass("header-fixed fadeInUp");
            }
        });
        /*==== header Section End here =====*/


        /*==== add class remove class for portfolio=====*/
        $("button.addremove").click(function(){
            $(".button-group").addClass("page-header");
            $("button.addremove").addClass("hideme");
        });

        $("span.hideme").click(function(){
            $(".button-group").removeClass("page-header");
        });

        // header search
        $(".search-cart").click(function(){
            $(".popup").addClass("show-search");
        });
        $("span.hide-search").click(function(){
            $(".popup").removeClass("show-search");
        });


        // social share hide show 
        $("h6.show-social").click(function(){
            $(".hsocial-share").addClass("show-social");
            $("h6.show-social").addClass("hide-share");
        });

        $("span.hidethis").click(function(){
            $(this).removeClass("hsocial-share");
        });





        // external js: isotope.pkgd.js
        var $grid = $('.grid').isotope({
          itemSelector: '.element-item',
          // layoutMode: 'fitRows'
        });
        // filter functions
        var filterFns = {
          // show if number is greater than 50
          numberGreaterThan50: function() {
            var number = $(this).find('.number').text();
            return parseInt( number, 10 ) > 50;
          },
          // show if name ends with -ium
          ium: function() {
            var name = $(this).find('.name').text();
            return name.match( /ium$/ );
          }
        };
        // bind filter button click
        $('.filters-button-group').on( 'click', 'button', function() {
          var filterValue = $( this ).attr('data-filter');
          // use filterFn if matches value
          filterValue = filterFns[ filterValue ] || filterValue;
          $grid.isotope({ filter: filterValue });
        });
        // change is-checked class on buttons
        $('.button-group').each( function( i, buttonGroup ) {
          var $buttonGroup = $( buttonGroup );
          $buttonGroup.on( 'click', 'button', function() {
            $buttonGroup.find('.is-checked').removeClass('is-checked');
            $( this ).addClass('is-checked');
          });
        });
    });


  //scroll up start here
    $(function () {
        //Check to see if the window is top if not then display button
        $(window).scroll(function () {
            if ($(this).scrollTop() > 300) {
                $('.scrollToTop').css({
                    'bottom': '2%',
                    'opacity': '1',
                    'transition': 'all .5s ease'
                });
            } else {
                $('.scrollToTop').css({
                    'bottom': '-30%',
                    'opacity': '0',
                    'transition': 'all .5s ease'
                })
            }
        });
        //Click event to scroll to top
        $('.scrollToTop').on('click', function () {
            $('html, body').animate({
                scrollTop: 0
            }, 500);
            return false;
        });

        //preloader script here
        var img = $('.bg-img');
        img.css('background-image', function () {
            var bg = ('url(' + $(this).data('background') + ')');
            return bg;
        });
        $('.preloader').fadeOut(1000);

    });


    //$('.blog-thumb').parallax("50%", 0.2);





    //Menu Dropdown Icon Adding
    $("ul>li>.submenu").parent("li").addClass("menu-item-has-children");
    // drop down menu width overflow problem fix
    $('ul').parent('li').hover(function () {
      var menu = $(this).find("ul");
      var menupos = $(menu).offset();
      if (menupos.left + menu.width() > $(window).width()) {
        var newpos = -$(menu).width();
        menu.css({
          left: newpos
        });
      }
    });
    $('.menu li a').on('click', function (e) {
      var element = $(this).parent('li');
      if (element.hasClass('open')) {
        element.removeClass('open');
        element.find('li').removeClass('open');
        element.find('ul').slideUp(300, "swing");
      } else {
        element.addClass('open');
        element.children('ul').slideDown(300, "swing");
        element.siblings('li').children('ul').slideUp(300, "swing");
        element.siblings('li').removeClass('open');
        element.siblings('li').find('li').removeClass('open');
        element.siblings('li').find('ul').slideUp(300, "swing");
      }
    })





}(jQuery));