<?php include('template/header.php'); ?>  
<title>Settings</title>
<?php
if (!isset($_SESSION["userlogin"])) {
    echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php\">";
}
else
{
    echo "";	
}
?>
<?php
session_start();
if (isset($_SESSION["userlogin"])) {
    $user = $_SESSION["userlogin"];
}
else
{
    $user = "";	
}
?>
<?php

	include("classes/config.php");
	//$senddata = $_POST['senddata'];
	$msg = "";
	$old_password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST['oldpassword']);
	//$encrypted_md5_oldpassword = md5($old_password);
	$new_password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST['newpassword']);
	//$encrypted_md5_newpassword = md5($new_password);
	$repeat_password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST['newpassword2']);

	if (isset($_POST['senddata'])) {
	$password_query = mysql_query("SELECT * FROM h_usertb WHERE user_email='$user'");
	while ($row = mysql_fetch_assoc($password_query)) {
		$db_password = $row['user_password'];
        
        if ($old_password == $db_password) {
			if ($new_password == $repeat_password) {
				if (strlen($new_password) <= 4) {
					$msg = "<div style='color:red;' class='pull-left'>Sorry! But your password must be more than 4 character long!</div>";
				}
				else
				{
				   $password_update_query = mysql_query("UPDATE h_usertb SET user_password='$new_password' WHERE user_email='$user'");
				   $msg = "<div style='color:green;' class='pull-left'>Success! Your password has been updated!</div>";
				}
			}
			else
			{
				$msg = "<div style='color:red;' class='pull-left'>Your two new passwords don't match!</div>";
			}
		}
        else
        {
         $msg = "<div style='color:red;' class='pull-left'>The old password is incorrect!</div>";
        }
	}
	}
	else
	{
		echo "";
	}
?>
<div class="row">
    <div class="span8 temp_place_holder" style="padding:210px 0px;"><h1 align="center">Advert</h1></div>
    <div class="span4">
        <div class="title_bar_brown">Settings</div><!-- title_bar_brown -->
        <div class="msg_body">
            <form name="register_form" action="" method="post">
                    <h2>Change Password</h2>
                    <input type="password" class="input-medium" placeholder="Old Password" name="oldpassword">
                    <input type="password" class="input-medium" placeholder="New Password" name="newpassword"><br>
					<input type="password" class="input-medium" placeholder="Confirm Password" name="newpassword2"><br>
                    <input type="submit" value="Update Password" class="btn btn-success pull-right" name="senddata">
					<?php echo $msg; ?>
                    <div class="clearfix"></div>
            </form>
        </div><!-- msg_body --> 
    </div>
</div>


<?php include('template/footer.php');?> 
<?php include('template/sponsors.php');?>