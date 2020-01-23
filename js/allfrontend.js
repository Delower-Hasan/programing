// sticky
$(window).on('scroll',function() {
 if ($(this).scrollTop() > 1){  
    $('.main-manu').addClass("sticky");
    }
    else{
    $('.main-manu').removeClass("sticky");
    }
}); 

// owl carousel
$('.section-wrapper').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    dots:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})

// magnify popup
$(document).ready(function() {
    $('.mag-play').magnificPopup({type:'iframe'});
  });

//   scrolltop
$(document).ready(function(){
    var s = skrollr.init();
})
$(function () {
    $.scrollUp({
        scrollName: 'ScrollUp',      // Element ID
        scrollDistance: 900,         // Distance from top/bottom before showing element (px)
        scrollFrom: 'top',           // 'top' or 'bottom'
        scrollSpeed: 800,            // Speed back to top (ms)
        easingType: 'linear',        // Scroll to top easing (see http://easings.net/)
        animation: 'fade',           // Fade, slide, none
        animationSpeed: 500,         // Animation speed (ms)
        scrollTrigger: false,        // Set a custom triggering element. Can be an HTML string or jQuery object
        scrollTarget: false,         // Set a custom target element for scrolling to. Can be element or number
        scrollText: '<i class="fas fa-chevron-up"></i>', // Text for element, can contain HTML
        scrollTitle: false,          // Set a custom <a> title if required.
        scrollImg: false,            // Set true to use image
        activeOverlay: false,        // Set CSS color to display scrollUp active point, e.g '#00FFFF'
        zIndex: 2147483647           // Z-Index for the overlay
    });
});


// perfect scrool
const container = document.querySelector('.nav-section-all');
const ps = new PerfectScrollbar(container);
// or just with selector string
const as = new PerfectScrollbar('.nav-section-all');

// countdoun js

jQuery(document).ready(function(){
    var countDownDate = new Date("Jan 5, 2021 15:37:25").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {
    
      // Get today's date and time
      var now = new Date().getTime();
    
      // Find the distance between now and the count down date
      var distance = countDownDate - now;
    
      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
      // Display the result in the element with id="demo"
      document.getElementById("demo").innerHTML = '<p class="day">'+days+'day'+'</p>'  + '<p class="hours">'+hours+'hours'+'</p>' + '<p class="minutes">'+minutes+'minutes'+'</p>' + '<p class="seconds">'+seconds+'seconds'+'</p>';
    
      // If the count down is finished, write some text 
      if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
      }
    }, 1000);
})

