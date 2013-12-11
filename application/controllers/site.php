<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller 
{
	
	public function index()
	{
		// Sets the base_url settings and assigns it to $base
		$this->base = $this->config->item('base_url');
		$data['base'] = $this->base;
		
		// Sets the page name that will be called from the templates/template.php
		//$data['page_name'] = 'home';
		
		//$this->load->model('news_model');
		//$data['news'] = $this->news_model->get_all_news();
		
		// Makes the Variables global
		//$this->load->vars($data);

		// Loads the templates/template.php
		$this->load->view('index.php');
	}
	
	
}