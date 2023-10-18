


$('.ouroffering_carousel').owlCarousel({
    loop:true,
    margin:30,
	stagePadding: 15,
	dots:true,
    autoplay:false,
    autoplayTimeout:5000,
    nav:true,
    responsive:{
        0:{
            items:1
        },
		480:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:4
        }
    }
})


$('.gallery_carousel').owlCarousel({
    loop:true,
    margin:0,
	dots:true,
    autoplay:false,
    autoplayTimeout:5000,
    nav:false,
    responsive:{
        0:{
            items:1
        },
		480:{
            items:1
        },
        600:{
            items:2
        },
        1024:{
            items:3
        },
        1025:{
            items:5
        }
    }
})





$('.testimonial_carousel').owlCarousel({
    loop:true,
    margin:30,
	stagePadding: 15,
	dots:false,
    autoplay:true,
    autoplayTimeout:6000,
    nav:true,
    responsive:{
        0:{
            items:1
        },
		480:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:2
        }
    }
})






	$(document).ready(function(){ 
    $(window).scroll(function(){ 
        if ($(this).scrollTop() > 100) { 
            $('#scroll').fadeIn(); 
        } else { 
            $('#scroll').fadeOut(); 
        } 
    }); 
    $('#scroll').click(function(){ 
        $("html, body").animate({ scrollTop: 0 }, 1500); 
        return false; 
    }); 
});









