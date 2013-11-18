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
        $('.carousel').carousel({
            interval:4000
        });
    });
    

    $('.msg_read_btn').click(function() {
        if($('#msg_body').hasClass('two_lines')) {
            $('#msg_body').removeClass('two_lines', 1000, "easeInBack" );
            $(this).html('Close');
        } else {
            $('#msg_body').addClass('two_lines', 1000, "easeOutBack" );
            $(this).html('Read More');
        }
    });
    
    // Login Process
    $('#signin_btn').click(function(){
        // Getting the Form Data
        var email = $('#email').val();
        var password = $('#password').val();
        // Checking if both are set
        if(email == '' || password == ''){
            $('#login_msg').hide().html("<div class='alert alert-block'><button type='button' class='close' data-dismiss='alert'>&times;</button>Please Fill in both fields.</div>").fadeIn(400);
        }else{
            $.ajax({
                type:'POST',
                url:'includes/login_process.php',
                data: {email : email, password : password},
                beforeSend: function(){
                    $('#login_msg').html("<img src='images/loader.gif' alt='Loading...' />");
                },
                success: function(){
                    $('#login_msg').html("<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button>Alhamdulillah! You are Signed In</div>");
                },
                error: function(){
                    $('#login_msg').html("<div class='alert alert-error'><button type='button' class='close' data-dismiss='alert'>&times;</button>There was an error . Please try again later. Jazakallah Kheir</div>");
                }
            });
        }
        
        return false;
    });
    // Add New Scholar From Homepage
    $('#q_btn').click(function(){
        // Check if the Field is Empty
        if($('#question').val() == ""){
            $('#msg').html("<div class='alert alert-block'><button type='button' class='close' data-dismiss='alert'>&times;</button>The Question Field is Empty, Please Fill it before Submitting.</div>");
        }else{
            var form_data = {question : $('#question').val()}
            
            $.ajax({
                type:'POST',
                url: 'includes/new_question_process.php',
                data: form_data,
                beforeSend: function(){
                    $('#msg').html("<img src='images/loader.gif' alt='Loading...' />");
                },
                success: function(){
                    $('#msg').html("<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button>Your Post has been successfully posted. It will be answered very soon InshaAllah.</div>");
                },
                error: function(){
                    $('#msg').html("<div class='alert alert-error'><button type='button' class='close' data-dismiss='alert'>&times;</button>There was an error posting your question. Please try again later. Jazakallah Kheir</div>");
                }
            });
        }
        return false;
    });
    
});
   