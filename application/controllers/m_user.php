<?php
if (! defined ( 'BASEPATH' ))	exit ( 'No direct script access allowed' );

//ini_set('display_errors','On');
//error_reporting(E_ALL);
class M_user extends CI_Controller {
	/**
	 * Userchannel controller.
	 * http://example.com/index.php/Userchannel/index
	 * Create at 2012,8,24 By Chris Wong , Copyright mx Inc.
	 * 
	 */
	
	function __construct()
    {
        parent::__construct();
//		$this->load->model ( 'user_model' );
		$this->load->model ( 'manager_model' );
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
		$configs['base_url']='/'.PROJECTNAME.'/index.php/m_user/index/';
		$configs['total_rows'] =$this->manager_model->get_users_count();
		$configs['per_page'] = $limit;
		$no = ($pagenum-1)*$limit+1;

		$user_page=$this->common_module->page_all($configs);
		$user_lst=$this->manager_model->get_users($limit,$offset);
		$this->cismarty->view('m_user_list',get_defined_vars());
	}
	
	public function add()
	{
		$this->load->library('cismarty'); 
		$this->load->model('common_model_admin');
		
		if(!$this->common_model_admin->islogin){
			$seturl ="/".PROJECTNAME."/index.php/m_login/index";
			Header("Location: $seturl"); 		
		}
		
		if(isset($_POST['addUser']) && $_POST['addUser'] != ""){
			$username      = $_POST['username'];
			$password   = $_POST['password'];

			$result =$this->manager_model->insert($username,$password);
			$seturl ="/".PROJECTNAME."/index.php/m_user/index/1/";
			Header("Location: $seturl"); 
			
		}
		$this->cismarty->view('m_user_add',get_defined_vars());
	}

	public function delete()
	{
		$param = $this->uri->segment(3);
		$temp = substr($param, 11);	
		$pos = strpos($temp, "6as8df68");
		$edit_id = substr($temp, 0, $pos);			

		$result =$this->manager_model->remove($edit_id);
		$seturl ="/".PROJECTNAME."/index.php/m_user/index/1/";
		Header("Location: $seturl"); 
	}	
}
