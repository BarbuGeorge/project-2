// Initiate Owl Carousel

jQuery(document).ready(function($){

	$(".owl-carousel").owlCarousel({
        rtl:true,
        loop:false,
        nav:true,
        dots:false,
        navText: ["<i class='fa-solid fa-angle-right'></i>","<i class='fa-solid fa-angle-left'></i>"],
        navClass: ['owl-prev', 'owl-next'],
        responsiveClass: true,
        stagePadding: 0,
        startPosition:-1,
        responsive : {

            //  from 0 up
            0 : {
            stagePadding: 0,
            loop: false,
            responsiveClass: true,
            dots: false,
            nav: false,
            items: 1

            },

            // from 768 up
            768 : {

            items: 2
            },

            // from 992 up
            992 : {
            items: 3
            }
        }
	});
});
