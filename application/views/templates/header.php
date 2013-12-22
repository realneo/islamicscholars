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
            // Stylesheet
            echo link_tag(img_url('logo.png'), 'shortcut icon', 'image/ico');
			echo link_tag(css_url('bootstrap.css'));
			echo link_tag(css_url('main.css'));
		?>
        <script type="text/javascript" src="<?php echo js_url('jquery-1.10.2.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo js_url('bootstrap.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo js_url('bootstrap-carousel.js'); ?>"></script>
		<title>Islamic Scholars</title>
	</head>
	<body>
        <div id="green_strip"></div>
		<div class='container'>
            <div class="row">
                <?php $this->load->view('templates/left_pane'); ?>
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
                    echo anchor('site/donate', 'Donate Now', array('class' => 'btn btn-warning', 'id' => 'donate_btn'));
                ?>
                <!-- Navigation Bar -->
                
                <div class="nav nav-tabs span nav" id="top_nav">
                    <li class="active"><?php echo anchor('site/index', 'Home'); ?></li>
                    <li><?php echo anchor('site/about', 'About Us'); ?></li>
                    <li><?php echo anchor('site/scholars', 'Imams & Scholars'); ?></li>
                    <li><?php echo anchor('site/events', 'Events'); ?></li>
                    <li><?php echo anchor('site/library', 'Library'); ?></li>
                    <li><?php echo anchor('site/qa', 'Q & A'); ?></li>
                </div>
                
                