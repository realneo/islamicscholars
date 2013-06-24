<?php
if (! defined ( 'BASEPATH' ))	exit ( 'No direct script access allowed' );

//ini_set('display_errors','On');
//error_reporting(E_ALL);
class Event extends CI_Controller {
	/**
	 * Userchannel controller.
	 * http://example.com/index.php/Userchannel/index
	 * Create at 2012,8,24 By Chris Wong , Copyright mx Inc.
	 * 
	 */
	
	function __construct()
    {
        parent::__construct();
		$this->load->model ( 'event_model' );
       
    }	
	public function index() {
		$this->load->library('cismarty'); 
		$this->load->model('common_model');
		$this->load->model('common_module');
		$pastEvents = $this->event_model->getPastEvents(5,0);
		$currentmonthEvents = $this->event_model->getCurMonthEvents(5,0);
		$nextmonthEvents = $this->event_model->getNextMonthEvents(5,0);
		
		$menu = 4;
		$this->cismarty->view('events',get_defined_vars());
	}
}
