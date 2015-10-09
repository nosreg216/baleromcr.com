/* Slick Sliders Initializacion */

$(document).ready(function(){


	/* Initialize Thumbnail sliders*/
	$('.thumnb-slider').slick({
	  centerMode: false,
	  centerPadding: '5%',
	  pauseOnHover:true,
	  autoplay: true,
	  arrows: true,
	  responsive: [
	    {
	      breakpoint: 480,
	      settings: {
	        centerMode: false,
			arrows: true,
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    }
	  ]
	});
});//EOF