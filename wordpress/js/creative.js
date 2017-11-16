var HOME_URL = "http://ijus.org.br/novo/";
var BLOG_URL = HOME_URL + "wp-content/themes/ijus2017/";

(function($) {
    "use strict"; // Start of use strict

    // jQuery for page scrolling feature - requires jQuery Easing plugin
    $(document).on('click', 'a.page-scroll', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top - 50)
        }, 1250, 'easeInOutExpo');
        event.preventDefault();
    });

    // Highlight the top nav as scrolling occurs
    $('body').scrollspy({
        target: '.navbar-fixed-top',
        offset: 51
    });

    // Closes the Responsive Menu on Menu Item Click
    $('.navbar-collapse ul li a').click(function() {
        $('.navbar-toggle:visible').click();
    });

    // Offset for Main Navigation
    $('#mainNav').affix({
        offset: {
            top: 100
        }
    })

    // Initialize and Configure Scroll Reveal Animation
    window.sr = ScrollReveal();
    sr.reveal('.sr-icons', {
        duration: 600,
        scale: 0.3,
        distance: '0px'
    }, 200);
    sr.reveal('.sr-button', {
        duration: 1000,
        delay: 200
    });
    sr.reveal('.sr-contact', {
        duration: 600,
        scale: 0.3,
        distance: '0px'
    }, 300);
    sr.reveal('.img-destaques', {
        duration: 1000,
        delay: 200
    });

    // Initialize and Configure Magnific Popup Lightbox Plugin
    $('.popup-gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
        },
        image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
        }
    });
    var navBar = document.getElementsByClassName('navbar')[0];
    var logo = document.getElementById('logo');
    var navBarNav = document.getElementsByClassName('navbar-nav')[0];
    var navBarNav = document.getElementsByClassName('navbar-nav')[0];

    var windowHeight = $(window).height();
    var windowWidth = $(window).width();
    console.log(windowWidth);
    window.onresize = function(){
        windowHeight = $(window).height();
        windowWidth = $(window).width();
        console.log(windowWidth);
    };
    var w = window.innerWidth;
    if (w > 700) {
        window.onscroll = function(event){
            let scroll = document.body.scrollTop;

            //Definir classe
            if (scroll > 100) {
                navBar.style="height:5px;min-height: 66px;";
                //logo.src=BLOG_URL+"img/logotipo-passaro-verde.png";
                logo.style = "margin-top: -6px;";
                navBarNav.style="margin-top: 0px;";
            } else{
                navBar.style = "height:130px;min-height: 100px;";
                //logo.src=BLOG_URL+"img/logotipo.png";
                navBarNav.style="margin-top: 36px;";
            }
        }
    }


    $('[data-slide="prev"]').click(function(){
        $('#myCarousel').carousel('prev');
        $('#myCarousel').carousel('pause');
    });
    $('[data-slide="next"]').click(function(){
        $('#myCarousel').carousel('next');
        $('#myCarousel').carousel('pause');
    });
    $('#myCarousel').carousel('pause');
    $('#myCarouselMain').carousel('start');
})(jQuery); // End of use strict
