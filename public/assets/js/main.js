(function ($) {
    "user strict";

    $(document).ready(function () {
        // Nice Select
        $('.select-bar').niceSelect();
        // Lightcase
        $('.video-popup').magnificPopup({
            type: 'iframe',
        });
        $('.img-popup').magnificPopup({
            type: 'image'
        });


        // Toggle serch
        $('.serch-icon').on('click', function () {
            $('.search-overlay').show('slow');
        });

        $('.search-overlay .close').on('click', function () {
            $('.search-overlay').hide('slow');
        })


        $("body").each(function () {
            $(this).find(".img-pop").magnificPopup({
                type: "image",
                gallery: {
                    enabled: true
                }
            });
        });

        //Faq
        $('.faq-wrapper .faq-title').on('click', function (e) {
            var element = $(this).parent('.faq-item');
            if (element.hasClass('open')) {
                element.removeClass('open');
                element.find('.faq-content').removeClass('open');
                element.find('.faq-content').slideUp(300, "swing");
            } else {
                element.addClass('open');
                element.children('.faq-content').slideDown(300, "swing");
                element.siblings('.faq-item').children('.faq-content').slideUp(300, "swing");
                element.siblings('.faq-item').removeClass('open');
                element.siblings('.faq-item').find('.faq-title, .faq-title-two').removeClass('open');
                element.siblings('.faq-item').find('.faq-content').slideUp(300, "swing");
            }
        });

        //MenuBar
        $('.header-bar').on('click', function () {
            $(".menu").toggleClass("active");
            $(".header-bar").toggleClass("active");
            $('.overlay').toggleClass('active');
        });
        $('.overlay').on('click', function () {
            $(".menu").removeClass("active");
            $(".header-bar").removeClass("active");
            $('.overlay').removeClass('active');
        });
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
        // Scroll To Top
        var scrollTop = $(".scrollToTop");
        $(window).on('scroll', function () {
            if ($(this).scrollTop() < 500) {
                scrollTop.removeClass("active");
            } else {
                scrollTop.addClass("active");
            }
        });
        
        //Click event to scroll to top
        $('.scrollToTop').on('click', function () {
            $('html, body').animate({
                scrollTop: 0
            }, 500);
            return false;
        });
        // Header Sticky Here
        var headerOne = $(".header-section");
        if ($(this).scrollTop() < 1) {
            headerOne.removeClass("header-active");
        } else {
            headerOne.addClass("header-active");
        }
        $(window).on('scroll', function () {
            if ($(this).scrollTop() < 1) {
                headerOne.removeClass("header-active");
            } else {
                headerOne.addClass("header-active");
            }
        });

    

    // var fixed_top = $(".header-section");
    // if ($(window).scrollTop() > 50) {
    //     fixed_top.addClass("animateda fadeInDowna header-active");
    // }
    // else {
    //     fixed_top.removeClass("animateda fadeInDowna header-active");
    // }
    // $(window).on("scroll", function () {
    //   if ($(window).scrollTop() > 50) {
    //     fixed_top.addClass("animateda fadeInDowna header-active");
    //   }
    //   else {
    //     fixed_top.removeClass("animateda fadeInDowna header-active");
    //   }
    // });



        $('.window-warning .lay').on('click', function () {
            $('.window-warning').addClass('inActive');
        })
        $('.seat-plan-wrapper li .movie-schedule .item').on('click', function () {
            $('.window-warning').removeClass('inActive');
        })

        //Odometer
        $(".counter-item").each(function () {
            $(this).isInViewport(function (status) {
                if (status === "entered") {
                    for (var i = 0; i < document.querySelectorAll(".odometer").length; i++) {
                        var el = document.querySelectorAll('.odometer')[i];
                        el.innerHTML = el.getAttribute("data-odometer-final");
                    }
                }
            });
        });


        //Count Down JAva Script
        // $('.countdown').countdown({
        //         date: '10/15/2022 05:00:00',
        //         offset: +2,
        //         day: 'Day',
        //         days: 'Days'
        //     },
        //     function () {
        //         alert('Done!');
        //     });

        // Registered Slider
        $('.registered-slider').owlCarousel({
            loop: true,
            responsiveClass: true,
            nav: false,
            dots: false,
            margin: 30,
            autoplay: true,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
            smartSpeed: 2000,
            responsive: {
                0: {
                    items: 1,
                },
                576: {
                    items: 2,
                },
                768: {
                    items: 3,
                },
                992: {
                    items: 4,
                },
                1200: {
                    items: 4,
                }
            }
        });

        // Registered Slider two
        $('.registered-slider2').owlCarousel({
            loop:true,
            responsiveClass:true,
            nav:false,
            dots:false,
            margin: 30,
            autoplay:true,
            autoplayTimeout:2000,
            autoplayHoverPause:true,
            smartSpeed: 2000,
            responsive:{
                0:{
                    items:1,
                },
                576:{
                    items:2,
                },
                768:{
                    items:2,
                },
                992:{
                    items:3,
                },
                1200:{
                    items:3,
                }
            }
          });
          
        // You may like Slider
        $('.p-u-p-list-slider').owlCarousel({
            loop: true,
            responsiveClass: true,
            nav: true,
            dots: false,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            margin: 30,
            autoplay: false,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
            smartSpeed: 2000,
            center: true,
            responsive: {
                0: {
                    items: 1,
                }
            }
        });

        /** Product Details  carousel **/
        var $product_slider = $('.all-slider');
        $product_slider.owlCarousel({
            loop: false,
            dots: false,
            nav: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            margin: 0,
            autoplay: false,
            items: 4,
            autoplayTimeout: 6000,
            smartSpeed: 1000,
            responsive: {
                0: {
                    items: 4
                },
                768: {
                    items: 4
                }
            }
        });

        /** Product Details  carousel **/
        var $related_product_slider = $('.related-product-slider');
        $related_product_slider.owlCarousel({
            loop: true,
            dots: false,
            nav: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            margin: 30,
            autoplay: false,
            items: 4,
            autoplayTimeout: 6000,
            smartSpeed: 1000,
            responsive: {
                0: {
                    items: 1,
                },
                576: {
                    items: 2,
                },
                768: {
                    items: 3,
                },
                992: {
                    items: 3,
                },
                1200: {
                    items: 4,
                }
            }
        });
        //Widget Slider
        $('.widget-slider').owlCarousel({
            loop:true,
            nav:false,
            dots: false,
            items:1,
            autoplay:true,
            autoplayTimeout:2500,
            autoplayHoverPause:true,
            margin: 30,
        });

        var width = $(window).width()
        if (width <= 991) {

            $(document).on('mouseover', function (e) {
                var container = $(".xzoom-preview");

                // if the target of the click isn't the container nor a descendant of the container
                if (!container.is(e.target) && container.has(e.target).length === 0) {
                    $(".xzoom-preview").css('display', 'none');
                }
            });

        }
    });

    // Preloader Js
    $(window).on('load', function () {
        $('.preloader').fadeOut(1000);
        var img = $('.bg_img');
        img.css('background-image', function () {
            var bg = ('url(' + $(this).data('background') + ')');
            return bg;
        });

        // Wow js active
        new WOW().init();

    });


})(jQuery);
