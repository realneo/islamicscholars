$(function(){
    // Biography Section
    $('#bio_section_pic').hover(function(){
        
    });

    $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });

    // var $bgElement = $('#bio_section_bg');
    // setInterval(function () {
    //     $bgElement.fadeTo(5000,0.25, function () {
    //        $bgElement.fadeTo(3000, 1)
    //     });
    // }, 10000);

    $('#bio_section_bg').jqFancyTransitions({ 
        width: 955, 
        height: 275,
        delay: 20000
    });

    $('#overlay').click(function(){
        $('#biography').fadeOut(500);
        $('.page').fadeOut();
        $(this).delay(500).fadeOut(500);
    });
    
    // Popup
     $('#bio_section_pic').click(function () {
        //single book
        $('#bio_book').booklet({width:940, height:600, closed: true, autoCenter: true}).slideDown();
        $('#close_bio_book').fadeIn();
    });
    
    $('#close_bio_book').click(function(){
        $('#bio_book').slideUp();
        $('#close_bio_book').delay(500).fadeOut();
    });
    
    $(document).ready(function(){
        $('#msg_body').delay(500).effect( "slide", {direction:'up'}, "slow");
        $('#advertising_spot').delay(1000).effect( "slide", "slow" );
        $('#footer').delay(1500).effect( "slide", "slow" );
        $('#sponsors').delay(2000).effect( "slide", "slow" );
    });
});