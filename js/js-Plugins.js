Jquery-2

/*CSS*/
/* back to top btn */
.back-to-top {
	position: fixed;
	bottom:  20px;
	right: 20px;
	z-index: 9999;
	display: none;
}
.back-to-top i {
	width: 40px;
	height: 40px;
	background: red;
	color: #fff;
	border-radius: 50%;
	line-height: 40px;
	text-align: center;
	font-size: 24px;
}



Back to top

$(function(){
// sticky menu
$(window).on('scroll', function(){
var scrolling = $(this).scrollTop();
if(scrolling > 620){
	$(".header").addClass("menu-bg");	
}
else {
	$(".header").removeClass("menu-bg");
}
if(scrolling > 100){
back2top.fadeIn(500);	
}
else {
	back2top.fadeOut(500);
}	
});	
	
	
// back to top
var back2top = $(".back-to-top");
var html_body = $('html, body');
back2top.on('click', function(){
html_body.animate({scrollTop:0},1000);	
});
	
	
// smooth scroll
//animation scroll js
    var html_body = $('html, body');
    $('.menu a').on('click', function () {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                html_body.animate({
                    scrollTop: target.offset().top - 0
                }, 1500);
                return false;
            }
        }
    });	
});


Jquery-3
LightBox (similar to magnific popup)
venobox (similar to magnific popup)



Jquery-4
/%Isotop
Preloader
Counterup
Countdown */


$(function(){
// init Isotope
var $grid = $('.grid').isotope({
  itemSelector: '.element-item',
  layoutMode: 'fitRows'
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

Preloader

$(function(){
    $(window).on('load', function(){
        $("#preloader").delay(500).fadeOut(500);
    });

counterUp
    
    $('.counter').counterUp({
    delay: 10,
    time: 2000
});
});


jQuery-5
YT-player
TypeJs
particles


YT Player

//video bg
jQuery(function(){
      jQuery(".player").YTPlayer();
    });  
    

//type js
$(".typer").typed({
        strings: ["Web Designer", "Web Developer"],
        typeSpeed: 150,
        contentType: 'html',
        loop:true
      }); 


//particles js
particlesJS("particles-js", {
  "particles": {
    "number": {
      "value": 400,
      "density": {
        "enable": true,
        "value_area": 800
      }
    },
    "color": {
      "value": "#ffffff"
    },
    "shape": {
      "type": "image",
      "stroke": {
        "width": 3,
        "color": "#fff"
      },
      "polygon": {
        "nb_sides": 5
      },
      "image": {
        "src": "http://www.dynamicdigital.us/wp-content/uploads/2013/02/starburst_white_300_drop_2.png",
        "width": 100,
        "height": 100
      }
    },
    "opacity": {
      "value": 0.7,
      "random": false,
      "anim": {
        "enable": false,
        "speed": 1,
        "opacity_min": 0.1,
        "sync": false
      }
    },
    "size": {
      "value": 5,
      "random": true,
      "anim": {
        "enable": false,
        "speed": 20,
        "size_min": 0.1,
        "sync": false
      }
    },
    "line_linked": {
      "enable": false,
      "distance": 50,
      "color": "#ffffff",
      "opacity": 0.6,
      "width": 1
    },
    "move": {
      "enable": true,
      "speed": 5,
      "direction": "bottom",
      "random": true,
      "straight": false,
      "out_mode": "out",
      "bounce": false,
      "attract": {
        "enable": true,
        "rotateX": 300,
        "rotateY": 1200
      }
    }
  },
  "interactivity": {
    "detect_on": "canvas",
    "events": {
      "onhover": {
        "enable": true,
        "mode":  "bubble"
      },
      "onclick": {
        "enable": true,
        "mode": "repulse"
      },
      "resize": true
    },
    "modes": {
      "grab": {
        "distance": 150,
        "line_linked": {
          "opacity": 1
        }
      },
      "bubble": {
        "distance": 200,
        "size": 40,
        "duration": 2,
        "opacity": 8,
        "speed": 3
      },
      "repulse": {
        "distance": 200,
        "duration": 0.2
      },
      "push": {
        "particles_nb": 4
      },
      "remove": {
        "particles_nb": 2
      }
    }
  },
  "retina_detect": true
});