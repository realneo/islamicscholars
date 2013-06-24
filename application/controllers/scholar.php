<?php
if (! defined ( 'BASEPATH' ))	exit ( 'No direct script access allowed' );

//ini_set('display_errors','On');
//error_reporting(E_ALL);
class Scholar extends CI_Controller {
	/**
	 * Userchannel controller.
	 * http://example.com/index.php/Userchannel/index
	 * Create at 2012,8,24 By Chris Wong , Copyright mx Inc.
	 * 
	 */
	
	function __construct()
    {
        parent::__construct();
//		$this->load->model ( 'event_model' );
       
    }	
	public function index() {
		$this->load->library('cismarty'); 
		$this->load->model('common_model');
		$this->load->model('common_module');
/*
		$this->load->library('pagination');

		if(!$this->common_model_admin->islogin){
			$seturl ="/".PROJECTNAME."/index.php/m_login/index";
			Header("Location: $seturl"); 		
		}

		$limit = 10;
		$pagenum = $this->uri->segment(3);
		$pagenum=($pagenum)?($pagenum):1;
		$offset =($pagenum-1)*$limit;
		$configs['uri_segment']=3;
		$configs['base_url']='/'.PROJECTNAME.'/index.php/m_event/index/';
		$configs['total_rows'] =$this->event_model->get_events_count();
		$configs['per_page'] = $limit;
		$no = ($pagenum-1)*$limit+1;
		
		$event_page=$this->common_module->page_all($configs);
		$event_lst=$this->event_model->get_events($limit,$offset);
*/
		$menu = 3;
		$this->cismarty->view('scholars',get_defined_vars());
	}

}
