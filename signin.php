<?php include('template/header.php'); ?>  
<title>Sign In</title>
<?php
if (!isset($_SESSION["userlogin"])) {
    echo "";
}
else
{
    echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php\">";	
}
?>
<div class='row'>
    <div class='span8 temp_place_holder' style='padding:210px 0px;'><h1 align="center">Advert</h1></div>
    <div class='span4'>
        <div class='title_bar_brown'>Login</div><!-- title_bar_brown -->
        <div class='msg_body'>
		<div id='register_now' style="color:black;">Don't have an account? <a href='register.php' class='btn btn-primary btn-mini'>Register Now</a></div>
            <form name='register_form' action='includes/login_process.php' method='post'>
                    <h2>Login</h2>
                    <input type='email' class='input-medium' placeholder='Email' name='email'>
                    <input type='password' class='input-medium' placeholder='Password' name='password'><br>
					<a href="forgetpassword.php" style="color:blue;">Forgot Password ?</a>
                    <input type="submit" value="Sign In" class="btn btn-success pull-right">
					<?php	
						// Debug the $msg variable
						if(isset($_SESSION['msg'])){
							echo $_SESSION['msg'];
						}else{
							// Do nothing
						}
					?>
                    <div class="clearfix"></div>
            </form>
        </div><!-- msg_body --> 
    </div>
</div>


<?php include('template/footer.php');?> 
<?php include('template/sponsors.php');?>