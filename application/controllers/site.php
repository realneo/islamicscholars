<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller 
{
	
	public function index()
	{   
        // Welcome Message Model
        $this->load->model('welcome_msg');
        $data['welcome_msg'] = $this->welcome_msg->get_msg();

		// Loads the templates/template.php
		$this->load->view('index.php' , $data);
	}
	
	
}