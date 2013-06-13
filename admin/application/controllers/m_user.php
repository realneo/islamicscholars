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
		$this->load->model ( 'user_model' );
       
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
		$configs['base_url']='/islamicscholars/admin/index.php/m_user/index/'.$pagenum.'/';
		$configs['total_rows'] =$this->user_model->get_users_count();
		$configs['per_page'] = $limit;
		$user_page=$this->common_module->page_all($configs);
		$user_lst=$this->user_model->get_users($limit,$offset);
		$this->cismarty->view('user_list',get_defined_vars());
	}
	
	public function add()
	{
		$this->load->library('cismarty'); 
		$this->load->model('common_model_admin');
		if(isset($_POST['addUser']) && $_POST['addUser'] != ""){
			$username      = $_POST['username'];
			$password   = $_POST['password'];

			$result =$this->user_model->insert($username,$password);
			$seturl ="/islamicscholars/admin/index.php/m_user/index/1/";
			Header("Location: $seturl"); 
			
		}
		$this->cismarty->view('user_add',get_defined_vars());
	}

	public function delete()
	{
		$param = $this->uri->segment(3);
		$temp = substr($param, 11);	
		$pos = strpos($temp, "6as8df68");
		$edit_id = substr($temp, 0, $pos);			

		$result =$this->user_model->remove($edit_id);
		$seturl ="/islamicscholars/admin/index.php/m_user/index/1/";
		Header("Location: $seturl"); 
	}	
}
