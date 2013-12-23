<?php
if (! defined ( 'BASEPATH' ))	exit ( 'No direct script access allowed' );

//ini_set('display_errors','On');
//error_reporting(E_ALL);
class M_news extends CI_Controller {
	/**
	 * Userchannel controller.
	 * http://example.com/index.php/Userchannel/index
	 * Create at 2012,8,24 By Chris Wong , Copyright mx Inc.
	 * 
	 */
	
	function __construct()
    {
        parent::__construct();
		$this->load->model ( 'news_model' );
       
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
		$configs['base_url']='/'.PROJECTNAME.'/index.php/m_news/index/';
		$configs['total_rows'] =$this->news_model->get_news_count();
		$configs['per_page'] = $limit;
		$no = ($pagenum-1)*$limit+1;

		$news_page=$this->common_module->page_all($configs);
		$news_lst=$this->news_model->get_news($limit,$offset);
		$this->cismarty->view('news_list',get_defined_vars());
	}
	
	public function add()
	{
		$this->load->library('cismarty'); 
		$this->load->model('common_model_admin');
		if(isset($_POST['addNews']) && $_POST['addNews'] != ""){
			$name      = $_POST['name'];
			$brief   = $_POST['brief'];
			$description   = $_POST['description'];
			$date   = $_POST['date'];

			$result =$this->news_model->insert($name,$brief,$description,$date);
			$seturl ="/".PROJECTNAME."/index.php/m_news/index/1/";
			Header("Location: $seturl"); 
			
		}
		$this->cismarty->view('news_add',get_defined_vars());
	}

	public function edit()
	{
		$this->load->library('cismarty'); 
		$this->load->model('common_model_admin');
		if(isset($_POST['addNews']) && $_POST['addNews'] != ""){
			$param = $this->uri->segment(3);
			$temp = substr($param, 11);	
			$pos = strpos($temp, "7a6s8df768");
			$edit_id = substr($temp, 0, $pos);			

			$name      = $_POST['name'];
			$brief   = $_POST['brief'];
			$description   = $_POST['description'];
			$date   = $_POST['date'];

			$result =$this->news_model->update($edit_id, $name,$brief,$description,$date);
			$seturl ="/".PROJECTNAME."/index.php/m_news/index/1/";
			Header("Location: $seturl"); 
			
		}
		$param = $this->uri->segment(3);
		$temp = substr($param, 11);	
		$pos = strpos($temp, "7a6s8df768");
		$edit_id = substr($temp, 0, $pos);		
		$data =$this->news_model->getnewsInfo($edit_id);
		$this->cismarty->view('news_edit',get_defined_vars());
	}

	public function delete()
	{
		$param = $this->uri->segment(3);
		$temp = substr($param, 14);	
		$pos = strpos($temp, "89as7d9fs");
		$edit_id = substr($temp, 0, $pos);			

		$result =$this->news_model->remove($edit_id);
		$seturl ="/".PROJECTNAME."/index.php/m_news/index/1/";
		Header("Location: $seturl"); 
	}	
}
