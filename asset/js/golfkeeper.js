//jQuery to collapse the navbar on scroll
//$(window).scroll(function() {
//    if ($(".navbar").offset().top > 50) {
//        $(".navbar-fixed-top").addClass("top-nav-collapse");
//    } else {
//        $(".navbar-fixed-top").removeClass("top-nav-collapse");
//    }
//});

//Trigger 
if (typeof jQuery === "undefined") { throw new Error("golfkeeper requires jQuery") }

;(function($, window){
    
    $(document).ready(function(){
        
        //Enabling Carousel
        $('#golfkeeper-carousel').carousel();

        
    });
    //Enabling Stellar Js
    $(window).load(function() {
        $.holdReady( true );
        if(!Modernizr.touch){ 
            $.getScript("asset/js/stellar/jquery.stellar.min.js", function(){
                $.stellar({
                    responsive: true
                });
            });
        }
    });
    
})(jQuery, window);