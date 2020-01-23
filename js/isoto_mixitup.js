// isotop
(function($){
    "use strict";

    jQuery(document).ready(function($){

        $('li').on('click',function(){
            $('li').removeClass('active');
            $(this).addClass('active');
            var select = $(this).attr('data-filter');
            $('.isotop-active').isotope({
                filter: select
            });
        }) 

    })

    $('.isotop-active').isotope();
    
    
}(jQuery))

// mixitup
var mixer = mixitup('.filter');