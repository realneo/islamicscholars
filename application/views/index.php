<?php 
	// HTML 5 Doctypte
	echo doctype('html5');
	
	// Meta Tags
	$meta = array(
	        array('name' => 'robots', 'content' => 'no-cache'),
	        array('name' => 'description', 'content' => 'The only website in Tanzania that you will find the most genuine information about Scholars, Imams and Sheikhs. Swahili Mawaidha and a Large database of Library'),
	        array('name' => 'keywords', 'content' => 'Imams, scholars, sheikhs, tanzania, swahili'),
	        array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
	    );
	echo meta($meta);
?>

<html>
	<head>
		<?php
            echo link_tag('assets/img/logo.png', 'shortcut icon', 'image/ico');
			echo link_tag('assets/css/bootstrap.css');
			echo link_tag('assets/css/main.css');
		?>
        <script type='text/javascript' src='../assets/js/jquery-1.10.2.min.js'></script>
        <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src='../assets/js/bootstrap-carousel.js'></script>
		<title>Islamic Scholars</title>
	</head>
	<body>
        <div id="green_strip"></div>
		<div class='container'>
            <div class="row">
                <!-- Left Pane -->
                <div class="span3 opacity-5">
                    <?php $this->load->view('templates/calendar'); ?>
                    
                    <div id="left_pane">
                        <div class="title_bar_white">Latest News</div>
                        
                        <h5 class="white">Enter the Matrix was almost the best game ever.</h5>
                        <p class="white"> Yeah Yeah Yeah</p>
                        <hr />
                        
                        <h5 class="white">Enter the Matrix was almost the best game ever.</h5>
                        <p class="white"> Yeah Yeah Yeah</p>
                        <hr />
                        
                        <h5 class="white">Enter the Matrix was almost the best game ever.</h5>
                        <p class="white"> Yeah Yeah Yeah</p>
                        
                        <div class="title_bar_white">Upcoming Events</div>
                        
                        <h5 class="white">Enter the Matrix was almost the best game ever.</h5>
                        <p class="white"> Yeah Yeah Yeah</p>
                        
                         <div class="title_bar_white">Quick Contacts</div>
                        
                        <h5 class="white">Enter the Matrix was almost the best game ever.</h5>
                        <p class="white"> Yeah Yeah Yeah</p>
                        
                    </div>
                </div>
                <div class="span2" id="top_logo">
                    <?php
                        $image_properties = array(
                            'src' => 'assets/img/logo.png',
                            'alt' => 'The Foundation of Sheikhs and Islamic Scholars of Tanzania Logo'
                        );
                        echo img($image_properties);
                    ?>
                </div>
                <div class="span7" id="top_heading">The Foundation of Sheikhs and Islamic Scholars of Tanzania</div>
                <?php
                    echo anchor('donate', 'Donate Now', array('class' => 'btn btn-warning', 'id' => 'donate_btn'));
                ?>
                
                <div class="nav nav-tabs span nav" id="top_nav">
                    <li class="active"><?php echo anchor('home', 'Home'); ?></li>
                    <li><?php echo anchor('about', 'About Us'); ?></li>
                    <li><?php echo anchor('scholars', 'Imams & Scholars'); ?></li>
                    <li><?php echo anchor('events', 'Events'); ?></li>
                    <li><?php echo anchor('library', 'Library'); ?></li>
                    <li><?php echo anchor('qa', 'Q & A'); ?></li>
                </div><!-- nav -->
                
                <div class="span9">
                    <?php $this->load->view('corousel'); ?>
                </div>
                
            </div>
            
		</div><!-- container -->
	</body>
</html>