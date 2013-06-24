<?php
if (! defined ( 'BASEPATH' ))	exit ( 'No direct script access allowed' );

//ini_set('display_errors','On');
//error_reporting(E_ALL);
class M_appoint extends CI_Controller {
	/**
	 * Userchannel controller.
	 * http://example.com/index.php/Userchannel/index
	 * Create at 2012,8,24 By Chris Wong , Copyright mx Inc.
	 * 
	 */
	
	function __construct()
    {
        parent::__construct();
		$this->load->model ( 'appoint_model' );
       
    }	
	public function index() {
		$this->load->library('cismarty'); 
		$this->load->model('common_model_admin');
		$this->load->model('common_module');
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
		$configs['base_url']='/'.PROJECTNAME.'/index.php/m_appoint/index/';
		$configs['total_rows'] =$this->appoint_model->get_appoints_count();
		$configs['per_page'] = $limit;
		$no = ($pagenum-1)*$limit+1;
		
		$appoint_page=$this->common_module->page_all($configs);
		$appoint_lst=$this->appoint_model->get_appoints($limit,$offset);
		$this->cismarty->view('m_appoint_list',get_defined_vars());
	}
	
	public function edit()
	{

		$this->load->library('cismarty'); 
		$this->load->model('common_model_admin');

		if(!$this->common_model_admin->islogin){
			$seturl ="/".PROJECTNAME."/index.php/m_login/index";
			Header("Location: $seturl"); 		
		}

		if(isset($_POST['addAppoint']) && $_POST['addAppoint'] != ""){
			$param = $this->uri->segment(3);
			$temp = substr($param, 12);	
			$pos = strpos($temp, "65582as0f9as9fw90sa345");
			$edit_id = substr($temp, 0, $pos);			

			$name   = "admin";
			$date   = $_POST['date'];
			$appoint   = $_POST['appoint'];
			$username   = $_POST['username'];
			$email   = $_POST['email'];
			$state   = $_POST['state'];

			$result =$this->appoint_model->update($edit_id, $state, $name);
			
			if($state != '0' && $email != ""){
				
				if($state == '1')
					$result = "accepted.";
				else if($state == '2')
					$result = "declined.";
				else if($state == '3')
					$result = "postponed.";
					
				$subject = "Answered your appointment";
				$message = '
							<html>
							<head>
							<title>Answered your appointment</title>
							</head>
							<body>
							<div>Hello '.$username.'.</div>
							<div>Your Appointment:</div>
							<div>'.$appoint.'</div>
							<div>Date:&nbsp;'.$date.'</div>
							<br><br>
							<div> This appointment is '.$result.'</div>
							<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;from '.$name.'</div>
							</body>
							</html>';
				@mail( $email, $subject, $message);
			}
			$seturl ="/".PROJECTNAME."/index.php/m_appoint/index/1/";
			Header("Location: $seturl"); 
			
		}
		$param = $this->uri->segment(3);
		$temp = substr($param, 12);	
		$pos = strpos($temp, "65582as0f9as9fw90sa345");
		$edit_id = substr($temp, 0, $pos);		
		$data =$this->appoint_model->getappointInfo($edit_id);
		$this->cismarty->view('m_appoint_edit',get_defined_vars());
	}

	public function delete()
	{

		$param = $this->uri->segment(3);
		$temp = substr($param, 15);	
		$pos = strpos($temp, "9879sa7df907sf6s8f");
		$edit_id = substr($temp, 0, $pos);			

		$result =$this->appoint_model->remove($edit_id);
		$seturl ="/".PROJECTNAME."/index.php/m_appoint/index/1/";
		Header("Location: $seturl"); 
	}	
}
