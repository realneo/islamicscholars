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
			echo link_tag('assets/css/bootstrap.css');
			echo link_tag('assets/css/main.css');
		?>
		<title>Islamic Scholars</title>
	</head>
	<body>
		<div class='container'>
            <div class="row">
                <!-- Calendar -->
                <div class="span3"><?php $this->load->view('templates/calendar'); ?></div>
                <div class="span2">
                    <?php
                        $image_properties = array(
                            'src' => 'assets/img/logo.png',
                            'alt' => 'The Foundation of Sheikhs and Islamic Scholars of Tanzania Logo'
                        );
                        echo img($image_properties);
                    ?>
                </div>
            </div>
		</div><!-- container -->
	</body>
</html>