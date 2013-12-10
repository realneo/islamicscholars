<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php $this->load->view('templates/header_tags'); ?>
	</head>
    <body>
        <div class='container'>
           	<div class='row'>
                <?php $this->load->view('templates/calendar'); ?>
                <div id='header'class='span7'>
                    <div id='green_strip'></div><!-- green_strip -->
                    <h3 class='span9 top_heading'>The Foundation of Sheikhs and Islamic Scholars of Tanzania</h3>
                    <div id='logo'><a href="index.php"><img src='<?php echo $base; ?>/assets/img/logo.png' alt='logo' width='120'/></a></div><!-- logo -->
                    <a href="donate.php" class="btn btn-warning span2 offset7">Donate Now</a>
                    <div id='nav' class="nav nav-tabs spannav lead">
                            <li class="active"><a href="index.php">Home</a></li>
                            <li><a href="about.php">About Us</a></li>
                            <li><a href="scholars.php">Imams & Scholars</a></li>
                            <li><a href="events.php">Events</a></li>
                            <li><a href="library.php">Library</a></li>
                            <li><a href="questions.php">FAQ</a></li>
                            <li><a href="contacts.php">Contact Us</a></li>
                    </div><!-- nav -->
                </div><!-- header -->
            </div><!-- row [top_content] -->