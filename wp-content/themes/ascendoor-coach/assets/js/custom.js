jQuery(function($) {

    /* -----------------------------------------
    Preloader
    ----------------------------------------- */
    $('#preloader').delay(1000).fadeOut();
    $('#loader').delay(1000).fadeOut("slow");

    /* -----------------------------------------
    Navigation
    ----------------------------------------- */
    $('.menu-toggle').click(function() {
        $(this).toggleClass('open');
    });

    /* -----------------------------------------
    Keyboard Navigation
    ----------------------------------------- */
    $(window).on('load resize', function() {
        if ($(window).width() < 992 && $(window).width() >= 768) {
            $('.main-navigation').find("a").unbind('keydown');
            $('.main-navigation').find("li").last().bind('keydown', function(e) {
                if (e.which === 9) {
                    e.preventDefault();
                    $('#masthead').find('.menu-toggle').focus();
                }
            });
        } else if ($(window).width() < 768) {
            $('.main-navigation').find("li").unbind('keydown');
            $('.main-navigation').find("a").last().bind('keydown', function(e) {
                if (e.which === 9) {
                    e.preventDefault();
                    $('#masthead').find('.menu-toggle').focus();
                }
            });
        } else {
            $('.main-navigation').find("li").unbind('keydown');
            $('.main-navigation').find("a").unbind('keydown');
        }
    });

    var primary_menu_toggle = $('#masthead .menu-toggle');
    primary_menu_toggle.on('keydown', function(e) {
        var tabKey = e.keyCode === 9;
        var shiftKey = e.shiftKey;

        if (primary_menu_toggle.hasClass('open')) {
            if (shiftKey && tabKey) {
                e.preventDefault();
                $('.main-navigation').toggleClass('toggled');
                primary_menu_toggle.removeClass('open');
            };
        }
    });

    $('.header-search-wrap').find(".search-submit").bind('keydown', function(e) {
        var tabKey = e.keyCode === 9;
        if (tabKey) {
            e.preventDefault();
            $('.header-search-icon').focus();
        }
    });

    $('.header-search-icon').on('keydown', function(e) {
        var tabKey = e.keyCode === 9;
        var shiftKey = e.shiftKey;
        if ($('.header-search-wrap').hasClass('show')) {
            if (shiftKey && tabKey) {
                e.preventDefault();
                $('.header-search-wrap').removeClass('show');
                $('.header-search-icon').focus();
            }
        }
    });

    /* -----------------------------------------
    Search
    ----------------------------------------- */
    var searchWrap = $('.header-search-wrap');
    $(".header-search-icon").click(function(e) {
        e.preventDefault();
        searchWrap.toggleClass("show");
        searchWrap.find('input.search-field').focus();
    });
    $(document).click(function(e) {
        if (!searchWrap.is(e.target) && !searchWrap.has(e.target).length) {
            $(".header-search-wrap").removeClass("show");
        }
    });

    /* -----------------------------------------
    Main Slider
    ----------------------------------------- */
    $('.banner-style-1 .main-slider').slick({
        autoplay: false,
        dots: false,
        nextArrow: '<button class="carousel-next ascendoor-carousel-btn"></button>',
        prevArrow: '<button class="carousel-prev ascendoor-carousel-btn"></button>',
        adaptiveHeight: true,
    });

    /* -----------------------------------------
    Brands Slider
    ----------------------------------------- */
    $('.ascendoor-coach-brands-slider.style-1 .brand-slider').slick({
        autoplay: true,
        arrows: false,
        adaptiveHeight: true,
        slidesToShow: 5,
        responsive: [{
                breakpoint: 1025,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });

    /* -----------------------------------------
    Testimonial slider
    ----------------------------------------- */
    $('.testimonial-style-1 .ascendoor-coach-testimonial-slider').slick({
        autoplay: false,
        nextArrow: '<button class="fas fa-angle-right slick-next"></button>',
        prevArrow: '<button class="fas fa-angle-left slick-prev"></button>',
        adaptiveHeight: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [{
                breakpoint: 1025,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    arrows: false,
                    dots: true,
                }
            }
        ]
    });

    /* -----------------------------------------
    About style 1 has background
    ----------------------------------------- */
    if ( $(".about-style-1").hasClass("has-primary-background") ){
        $(document).ready(function() {
            var divHeight = $('.ascendoor-coach-text-image-section-text').outerHeight();
            $('.about-style-1').css('--before-height', divHeight + 'px');
        });
    }

    /* -----------------------------------------
    Magnific Pop
    ----------------------------------------- */
    $('.image-popup').magnificPopup({
        type: 'image',
    });
    /* -----------------------------------------
    Wow js
    ----------------------------------------- */
    wow = new WOW(
        {
        boxClass:     'wow',      // default
        animateClass: 'animated', // default
        offset:       100,          // default
        mobile:       true,       // default
        live:         true        // default
    }
    )
    wow.init();
    /* -----------------------------------------
    Splitting
    ----------------------------------------- */
    Splitting();
    /* -----------------------------------------
    Scroll Top
    ----------------------------------------- */
    var scrollToTopBtn = $('.ascendoor-coach-scroll-to-top');

    $(window).scroll(function() {
        if ($(window).scrollTop() > 400) {
            scrollToTopBtn.addClass('show');
        } else {
            scrollToTopBtn.removeClass('show');
        }
    });

    scrollToTopBtn.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, '300');
    });

});