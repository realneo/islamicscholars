<?php include('template/header.php'); ?>
<title>Activate Your Account</title>
<div class='row'>
    
    <div id="welcome_msg" class="span12">
		<div class="title_bar">ACCOUNT ACTIVATED</div>
        <div class="msg_body">
		<?php
			if (isset($_GET['email']) && preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/', $_GET['email'])) {
				$email = $_GET['email'];
			}
			if (isset($_GET['key']) && (strlen($_GET['key']) >= 30))
			{
				$key = $_GET['key'];
			}
			if (isset($email) && isset($key)) {
			 
				$activate_account = "UPDATE h_usertb SET user_activation=NULL WHERE (user_email ='$email' AND user_activation='$key') LIMIT 1";
				$result_activate_account = mysql_query($activate_account);
			
				echo '<div class="success">Your account is now Activated. You may now <a href="http://localhost/chatters/index.php">Log in</a></div>';
					
			}else {
				echo '<div class="warning">Oops! Your account could not be activated. Please recheck the link or contact the system administrator.</div>';
			}
			mysql_close();
		?>
		</div>
	</div>    
</div>

<?php include('template/footer.php');?> 
<?php include('template/sponsors.php');?>