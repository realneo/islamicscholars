<?php
if (! defined ( 'BASEPATH' ))	exit ( 'No direct script access allowed' );

//ini_set('display_errors','On');
//error_reporting(E_ALL);
class M_query extends CI_Controller {
	/**
	 * Userchannel controller.
	 * http://example.com/index.php/Userchannel/index
	 * Create at 2012,8,24 By Chris Wong , Copyright mx Inc.
	 * 
	 */
	
	function __construct()
    {
        parent::__construct();
		$this->load->model ( 'query_model' );
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
		$configs['base_url']='/'.PROJECTNAME.'/index.php/m_query/index/';
		$configs['total_rows'] =$this->query_model->get_queries_count();
		$configs['per_page'] = $limit;
		$no = ($pagenum-1)*$limit+1;
		
		$query_page=$this->common_module->page_all($configs);
		$query_lst=$this->query_model->get_queries($limit,$offset);
		$this->cismarty->view('m_query_list',get_defined_vars());
	}
	
	public function edit()
	{
		$this->load->library('cismarty'); 
		$this->load->model('common_model_admin');
		
		if(!$this->common_model_admin->islogin){
			$seturl ="/".PROJECTNAME."/index.php/m_login/index";
			Header("Location: $seturl"); 		
		}
		
		if(isset($_POST['addQuery']) && $_POST['addQuery'] != ""){
			$param = $this->uri->segment(3);
			$temp = substr($param, 11);	
			$pos = strpos($temp, "a9sfas80f8awse00835");
			$edit_id = substr($temp, 0, $pos);			

			$name      = "admin";
			$query   = $_POST['query'];
			$answer   = $_POST['content'];
			$email   = $_POST['email'];

			$result =$this->query_model->update($edit_id, $name,$answer);
			
			if($answer != "" && $email != ""){
				$subject = "Answered your query";
				$message = '
							<html>
							<head>
							<title>Answered your query</title>
							</head>
							<body>
							<div>Your Query:</div>
							<div>'.$query.'</div>
							<br><br>
							<div>Answer:</div>
							<div>'.$answer.'</div>
							<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;from '.$name.'</div>
							</body>
							</html>';
				@mail( $email, $subject, $message);
			}
			$seturl ="/".PROJECTNAME."/index.php/m_query/index/1/";
			Header("Location: $seturl"); 
			
		}
		$param = $this->uri->segment(3);
		$temp = substr($param, 11);	
		$pos = strpos($temp, "a9sfas80f8awse00835");
		$edit_id = substr($temp, 0, $pos);		
		$data =$this->query_model->getqueryInfo($edit_id);
		$this->cismarty->view('m_query_edit',get_defined_vars());
	}

	public function delete()
	{
		$param = $this->uri->segment(3);
		$temp = substr($param, 16);	
		$pos = strpos($temp, "832as98f9fa3008");
		$edit_id = substr($temp, 0, $pos);			

		$result =$this->query_model->remove($edit_id);
		$seturl ="/".PROJECTNAME."/index.php/m_query/index/1/";
		Header("Location: $seturl"); 
	}	
}
