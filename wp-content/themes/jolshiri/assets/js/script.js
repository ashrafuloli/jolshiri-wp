(function ($) {

    'use strict';

    $('.main-menu').meanmenu({
        meanMenuContainer: '.mobile-menu', meanScreenWidth: "1199", meanExpand: '', meanContract: '',
    });

    $(".menu-bar").on("click", function (e) {
        e.preventDefault();
        $(".mobile-menu-wrapper").toggleClass("active");
        $('.menu-overlay').addClass('active');
        $(this).addClass('active');
    });

    $(".menu-close").on("click", function (e) {
        e.preventDefault();
        $(".mobile-menu-wrapper").removeClass("active");
        $('.menu-overlay').removeClass('active');
        $('.menu-bar').removeClass('active');
    });

    $('.menu-overlay').on('click', function () {
        $(this).removeClass('active');
        $(".mobile-menu-wrapper").removeClass("active");
        $('.menu-bar').removeClass('active');
    });


    $('.welcome-overlay,.welcome-close').on('click', function (e) {
        e.preventDefault();
        $('.welcome-area').removeClass('active');
    });

    $(window).on("load", function () {
        let result = $('.wpcf7-response-output');
        if (result.text() != ''){
            $('.welcome-area').addClass('active');
        }
    });

    // Enable popovers
    const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
    const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))


    // nice select

    // $('.contact-form select').niceSelect();

    if (jQuery(".my-popup-link").length > 0) {
        new VenoBox({
            selector: '.my-popup-link',
            numeration: true,
            infinigall: true,
            share: true,
            spinner: 'rotating-plane'
        });
    }


    /*-------------------------------------------
        Sticky Header
    --------------------------------------------- */

    let win = $(window);
    let sticky_id = $(".header-area");
    win.on('scroll', function () {
        let scroll = win.scrollTop();
        if (scroll < 245) {
            sticky_id.removeClass("sticky-header");
        } else {
            sticky_id.addClass("sticky-header");
        }
    });

    /*------------------------------------
        Data-Background
    --------------------------------------*/
    $("[data-background]").each(function () {
        $(this).css("background-image", "url(" + $(this).attr("data-background") + ")")
    });

    $("[data-bg-color]").each(function () {
        $(this).css("background", $(this).attr("data-bg-color"))
    });

    if (jQuery(".hero-slider").length > 0) {
        var BasicSlider = $('.hero-slider');
        BasicSlider.on('init', function (e, slick) {
            var $firstAnimatingElements = $('.single-slide:first-child').find('[data-animation]');
            doAnimations($firstAnimatingElements);
        });
        BasicSlider.on('beforeChange', function (e, slick, currentSlide, nextSlide) {
            var $animatingElements = $('.single-slide[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
            doAnimations($animatingElements);
        });
        BasicSlider.slick({
            autoplay: true,
            autoplaySpeed: 10000,
            dots: false,
            fade: true,
            arrows: true,
            prevArrow: '<button type="button" class="slick-prev"><i class="fa-solid fa-angle-left"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="fa-solid fa-angle-right"></i></button>',
            responsive: [
                {breakpoint: 992, settings: {dots: false, arrows: false}}
            ]
        });

        function doAnimations(elements) {
            var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
            elements.each(function () {
                var $this = $(this);
                var $animationDelay = $this.data('delay');
                var $animationType = 'animated ' + $this.data('animation');
                $this.css({
                    'animation-delay': $animationDelay,
                    '-webkit-animation-delay': $animationDelay
                });
                $this.addClass($animationType).one(animationEndEvents, function () {
                    $this.removeClass($animationType);
                });
            });
        }
    }


    function startAos() {
        AOS.init({
            // Global settings:
            disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
            startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
            initClassName: 'aos-init', // class applied after initialization
            animatedClassName: 'aos-animate', // class applied on animation
            useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
            disableMutationObserver: false, // disables automatic mutations' detections (advanced)
            debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
            throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)


            // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
            offset: 120, // offset (in px) from the original trigger point
            delay: 0, // values from 0 to 3000, with step 50ms
            duration: 400, // values from 0 to 3000, with step 50ms
            easing: 'ease', // default easing for AOS animations
            once: false, // whether animation should happen only once - while scrolling down
            mirror: false, // whether elements should animate out while scrolling past them
            anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation
        });
    }

    startAos();


    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/hero.default', startAos);
        elementorFrontend.hooks.addAction('frontend/element_ready/featured_list.default', startAos);
        elementorFrontend.hooks.addAction('frontend/element_ready/service.default', startAos);
        elementorFrontend.hooks.addAction('frontend/element_ready/cta.default', startAos);
        elementorFrontend.hooks.addAction('frontend/element_ready/testimonial.default', startAos);
        // elementorFrontend.hooks.addAction('frontend/element_ready/testimonial.default', testimonialSliderActive);
    });




})(jQuery);
