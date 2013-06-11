<?php include('template/header.php'); ?>     

<div class='row'>
    <div class='span8 temp_place_holder' style='padding:210px 0px;'><h1 align="center">Advert</h1></div>
    
    <div class='span4'>
        
         <div class='title_bar_brown'>Please fill in the form to Register</div><!-- title_bar_brown -->
        <div class='msg_body'>
            <form name='register_form' action='' method='post'>
                    <h2>Sign Up</h2>
                    <label>First Name</label>
                    <input type="text" name="firstname" class="span3">
                    <label>Last Name</label>
                    <input type="text" name="lastname" class="span3">
                    <label>Email Address</label>
                    <input type="email" name="email" class="span3">
                    <label>Re-Enter Email</label>
                    <input type="text" name="username" class="span3">
                    <label>Password</label>
                    <input type="password" name="password" class="span3">
                    <label><input type="checkbox" name="terms"> I agree with the <a href="#">Terms and Conditions</a>.</label>
                    <input type="submit" value="Sign up" class="btn btn-success pull-right">
                    <div class="clearfix"></div>
                </form>
        </div><!-- msg_body --> 
    </div>
</div>


<?php include('template/footer.php');?> 
<?php include('template/sponsors.php');?>