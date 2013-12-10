<!-- 
	This file combines all the main components of the page.
	The $page_name receives the value from the global variable sent from the controller.
-->
<?php 
	$this->load->view('templates/header');
	$this->load->view('templates/left_pane');
	$this->load->view('templates/footer');
?>