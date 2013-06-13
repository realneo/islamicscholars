<?php
if (! defined ( 'BASEPATH' ))	exit ( 'No direct script access allowed' );

//ini_set('display_errors','On');
//error_reporting(E_ALL);
class M_event extends CI_Controller {
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
		$this->load->model('common_model_admin');
		$this->load->model('common_module');
		$this->load->library('pagination');

		$limit = 10;
		$pagenum = $this->uri->segment(3);
		$pagenum=($pagenum)?($pagenum):1;
		$offset =($pagenum-1)*$limit;
		$configs['uri_segment']=3;
		$configs['base_url']='/hmvc/index.php/m_event/index/'.$pagenum.'/';
		$configs['total_rows'] =$this->event_model->get_events_count();
		$configs['per_page'] = $limit;
		$event_page=$this->common_module->page_all($configs);
		$event_lst=$this->event_model->get_events($limit,$offset);
		$this->cismarty->view('event_list',get_defined_vars());
	}
	
	public function add()
	{
		$this->load->library('cismarty'); 
		$this->load->model('common_model_admin');
		if(isset($_POST['addEvent']) && $_POST['addEvent'] != ""){
			$name      = $_POST['name'];
			$venue   = $_POST['venue'];
			$description   = $_POST['description'];
	//		$date   = $_POST['date'];
	//		$image   = $_POST['image'];
			$date   = "";
			$image   = "";
			$result =$this->event_model->insert($name,$venue,$description,$date,$image);
			$seturl ="/hmvc/index.php/m_event/index/1/";
			Header("Location: $seturl"); 
			
		}
		$this->cismarty->view('event_add',get_defined_vars());
	}

	public function edit()
	{
		$this->load->library('cismarty'); 
		$this->load->model('common_model_admin');
		if(isset($_POST['addEvent']) && $_POST['addEvent'] != ""){
			$param = $this->uri->segment(3);
			$temp = substr($param, 17);	
			$pos = strpos($temp, "72asdyhf897a");
			$edit_id = substr($temp, 0, $pos);			

			$name      = $_POST['name'];
			$venue   = $_POST['venue'];
			$description   = $_POST['description'];
	//		$date   = $_POST['date'];
	//		$image   = $_POST['image'];
			$date   = "";
			$image   = "";
			$result =$this->event_model->update($edit_id, $name,$venue,$description,$date,$image);
			$seturl ="/hmvc/index.php/m_event/index/1/";
			Header("Location: $seturl"); 
			
		}
		$param = $this->uri->segment(3);
		$temp = substr($param, 17);	
		$pos = strpos($temp, "72asdyhf897a");
		$edit_id = substr($temp, 0, $pos);		
		$data =$this->event_model->geteventInfo($edit_id);
		$this->cismarty->view('event_edit',get_defined_vars());
	}

	public function delete()
	{
		$param = $this->uri->segment(3);
		$temp = substr($param, 14);	
		$pos = strpos($temp, "7868sad6f8");
		$edit_id = substr($temp, 0, $pos);			

		$result =$this->event_model->remove($edit_id);
		$seturl ="/hmvc/index.php/m_event/index/1/";
		Header("Location: $seturl"); 
	}	
}
