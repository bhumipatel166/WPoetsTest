/*----------------------------------------------
Index Of Script
------------------------------------------------

Page Loader
Owl Carousel

------------------------------------------------
Index Of Script
----------------------------------------------*/

(function(jQuery) {

    "use strict";
    jQuery(document).ready(function() {

        jQuery(window).on('load', function(e) {

            /*------------------------
            Page Loader
            --------------------------*/
            jQuery("#load").fadeOut();
            jQuery("#loading").delay(0).fadeOut("slow");

            /*------------------------
            Owl Carousel
            --------------------------*/
            jQuery('.owl-carousel').each(function() {
                var jQuerycarousel = jQuery(this);
                jQuerycarousel.owlCarousel({
                    items: jQuerycarousel.data("items"),
                    loop: jQuerycarousel.data("loop"),
                    margin: jQuerycarousel.data("margin"),
                    stagePadding: jQuerycarousel.data("padding"),
                    nav: jQuerycarousel.data("nav"),
                    dots: jQuerycarousel.data("dots"),
                    autoplay: jQuerycarousel.data("autoplay"),
                    autoplayTimeout: jQuerycarousel.data("autoplay-timeout"),
                    navText: ["<i class='fa fa-angle-left fa-2x'></i>", "<i class='fa fa-angle-right fa-2x'></i>"],
                    responsiveClass: true,
                    responsive: {
                        // breakpoint from 0 up
                        0: {
                            items: jQuerycarousel.data("items-mobile-sm"),
                            nav: false,
                            dots: true
                        },
                        // breakpoint from 480 up
                        480: {
                            items: jQuerycarousel.data("items-mobile"),
                            nav: false,
                            dots: true
                        },
                        // breakpoint from 786 up
                        768: {
                            items: jQuerycarousel.data("items-tab")
                        },
                        // breakpoint from 1023 up
                        1023: {
                            items: jQuerycarousel.data("items-laptop")
                        },
                        1199: {
                            items: jQuerycarousel.data("items")
                        }
                    }
                });
            });
        });

    });

})(jQuery);