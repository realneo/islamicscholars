<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class News extends CI_Controller 
	{		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('news_model');
		}
		
		public function index()
		{
			$data['news'] = $this->news_model->get_news();
		}
	}