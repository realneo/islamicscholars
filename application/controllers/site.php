<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('news_model');
        $this->load->model('events_model');
        
    }
	
	public function index()
	{   
        // Welcome Message Model
        $this->load->model('welcome_msg');
        $data['welcome_msg'] = $this->welcome_msg->get_msg();
        
        // Questions & Answers Model
        $this->load->model('questions_model');
        $data['questions'] = $this->questions_model->get_questions(5);
        
        // Left pane
        $data['news'] = $this->news_model->get_news(3);
        $data['events'] = $this->events_model->get_events(3);
        
        // Imams and Scholars
        $this->load->model('scholars_model');
        $data['scholars'] = $this->scholars_model->get_scholars(5);

		// Loads the templates/template.php
        $data['page_name'] = 'index';
		$this->load->view('templates/template', $data);
        
	}
    
    public function about()
    {
        // Left pane
        $data['news'] = $this->news_model->get_news(3);
        $data['events'] = $this->events_model->get_events(3);
        
        //About Us Information
        $this->load->model('about_model');
        $data['about_us'] = $this->about_model->get_about();
        
        // Loads the templates/template.php
        $data['page_name'] = 'about';
		$this->load->view('templates/template', $data);
    }
    
    public function scholars()
    {
        // Left pane
        $data['news'] = $this->news_model->get_news(3);
        $data['events'] = $this->events_model->get_events(3);
        
        // Loads the templates/template.php
        $data['page_name'] = 'scholars';
		$this->load->view('templates/template', $data);
    }
	
    public function events()
    {
        // Left pane
        $data['news'] = $this->news_model->get_news(3);
        $data['events'] = $this->events_model->get_events(3);
        
        $data['all_events'] = $this->events_model->get_events(10);
        
        // Loads the templates/template.php
        $data['page_name'] = 'events';
		$this->load->view('templates/template', $data);
    }
    
    public function library()
    {
        // Left pane
        $data['news'] = $this->news_model->get_news(3);
        $data['events'] = $this->events_model->get_events(3);
        
        // Loads the templates/template.php
        $data['page_name'] = 'library';
		$this->load->view('templates/template', $data);
    }
    
    public function qa()
    {
        // Left pane
        $data['news'] = $this->news_model->get_news(3);
        $data['events'] = $this->events_model->get_events(3);
        
        // Loads the templates/template.php
        $data['page_name'] = 'qa';
		$this->load->view('templates/template', $data);
    }
    
    // Particular data
    
    public function news_item()
    {
        // Left pane
        $data['news'] = $this->news_model->get_news(3);
        $data['events'] = $this->events_model->get_events(3);
        
        $id = $this->input->get_post('id');
        $data['news_item'] = $this->news_model->get_news_item($id);
        $data['new'] = $this->news_model->get_news(5);
        
        
        // Loads the templates/template.php
        $data['page_name'] = 'news_item';
		$this->load->view('templates/template', $data);
    }
    
    public function event_item()
    {
        // Left pane
        $data['news'] = $this->news_model->get_news(3);
        $data['events'] = $this->events_model->get_events(3);
        
        $id = $this->input->get_post('id');
        $data['event_item'] = $this->events_model->get_event_item($id);
        
        
        // Loads the templates/template.php
        $data['page_name'] = 'event_item';
		$this->load->view('templates/template', $data);
    }
}