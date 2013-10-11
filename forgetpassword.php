<?php include('template/header.php'); ?>  
<title>Forgot Password ?</title>
<?php
if (!isset($_SESSION["userlogin"])) {
    echo "";
}
else
{
    echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php\">";	
}
?>
<?php
	include("classes/config.php");
	
?>
<div class='row'>
    <div class='span8 temp_place_holder' style='padding:210px 0px;'><h1 align="center">Advert</h1></div>
    <div class='span4'>
        <div class='title_bar_brown'>Forgot Password ?</div><!-- title_bar_brown -->
        <div class='msg_body'>
            <form name='register_form' action='' method='post'>
                    <h2>Forgot Password ?</h2>
                    <input type='email' class='input-medium' placeholder='Email' name='email'>
                    <input type="submit" value="Submit" class="btn btn-success pull-right">
					<?php echo $msg; ?>
                    <div class="clearfix"></div>
            </form>
        </div><!-- msg_body --> 
    </div>
</div>


<?php include('template/footer.php');?> 
<?php include('template/sponsors.php');?>