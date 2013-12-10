<?php
	session_start();
	
	// Includes the Database Settings
    include("classes/config.php");
    
	if (isset($_SESSION["userlogin"])) 
	{
		$member = $_SESSION["userlogin"];
	}
	else 
	{
		$member = "";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include 'header_tag.php'; ?>
    </head>
    <body>
    	<div class='container'>
            <div class='row'>
                <?php include('calendar.php'); ?>
                <div id='header'class='span8'>
				<?php
				if(!isset($_SESSION["userlogin"]))
				{
					echo '<div id="row" style="margin-bottom:70px;margin-top:10px;">
                        <div class="span6 offset3">
                            <div class="pull-right" style="color:white;">
                                Welcome Guest
                                <a href="register.php" class="btn btn-inverse btn-mini">Register Now</a> -
                                <a href="signin.php" class="btn btn-inverse btn-mini">Sign In</a>
                            </div>
                        </div>
                    </div>';
				}
				else
				{
					echo '<div id="row" style="margin-bottom:70px;margin-top:10px;">
                        <div class="span6 offset3">
                            <div class="pull-right" style="color:white;">
                            Welcome '.$member.' <br>
                            <a href="settings.php" class="btn btn-mini">
                                <i class="icon icon-wrench" title="Settings"></i>
                                Settings</a>&nbsp;<a href="logout.php" class="btn btn-mini">
                                <i class="icon icon-off" ></i> Logout</a>
                            </div>
                        </div>
                    </div>';
				}
				?>
             	<div id='green_strip'></div><!-- green_strip -->
                <h3 class='span9 top_heading'>The Foundation of Sheikhs and Islamic Scholars of Tanzania</h3>
                <div id='logo'><a href="index.php"><img src='img/logo.png' alt='logo' width='120'/></a></div><!-- logo -->
                    <a href="donate.php" class="btn btn-warning span2 offset7">Donate Now</a>
                    <div id='nav' class="nav nav-tabs span8 lead">
                            <li class="active"><a href="index.php">Home</a></li>
                            <li><a href="about.php">About Us</a></li>
                            <li><a href="scholars.php">Imams & Scholars</a></li>
                            <li><a href="events.php">Events</a></li>
                            <li><a href="library.php">Library</a></li>
                            <li><a href="questions.php">Q & A</a></li>
                            <li><a href="contacts.php">Contact Us</a></li>
                    </div><!-- nav -->
                </div><!-- header -->
            </div><!-- row [top_content] -->