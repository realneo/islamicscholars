<?php
if (! defined ( 'BASEPATH' ))	exit ( 'No direct script access allowed' );

//ini_set('display_errors','On');
//error_reporting(E_ALL);
class M_scholar extends CI_Controller {
	/**
	 * Userchannel controller.
	 * http://example.com/index.php/Userchannel/index
	 * Create at 2012,8,24 By Chris Wong , Copyright mx Inc.
	 * 
	 */
	
	function __construct()
    {
        parent::__construct();
		$this->load->model ( 'scholar_model' );
       
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
		$configs['base_url']='/'.PROJECTNAME.'/index.php/m_scholar/index/';
		$configs['total_rows'] =$this->scholar_model->get_scholars_count();
		$configs['per_page'] = $limit;
		$no = ($pagenum-1)*$limit+1;
		
		$scholar_page=$this->common_module->page_all($configs);
		$scholar_lst=$this->scholar_model->get_scholars($limit,$offset);
		$this->cismarty->view('scholar_list',get_defined_vars());
	}
	
	public function add()
	{
		$this->load->library('cismarty'); 
		$this->load->model('common_model_admin');
		$this->load->model('school_model');
		$this->load->model('link_model');
		$photo_file_name = "";
		if(isset($_POST['addScholar']) && $_POST['addScholar'] != ""){
			
			if(!empty($_FILES["image"]["type"])){
				if ((($_FILES["image"]["type"] == "image/gif") || ($_FILES["image"]["type"] == "image/png") || ($_FILES["image"]["type"] == "image/jpeg") || ($_FILES["image"]["type"] == "image/pjpeg") || ($_FILES["image"]["type"] == "image/x-png")) && ($_FILES["image"]["size"] < 5000000)){
					if ($_FILES["image"]["error"] > 0){
						$errorMsg = "1";
					}else{
						$photo_file_name = date("Y_m_d_H_i_s").$_FILES['image']['name'];
						$uploaded_url = SCHOLAR_UPLOAD_URL."/".$photo_file_name;
						if (is_file($uploaded_url)) {
							@unlink($uploaded_url);
						}

						$result = move_uploaded_file ($_FILES['image']['tmp_name'], $uploaded_url);
					}
				}else{
					$errorMsg = "1";
				}
			}			
			
			$name   = $_POST['name'];
			$date   = $_POST['date'];
			$life   = $_POST['life'];
			$image   = $photo_file_name;

			$scholar_id =$this->scholar_model->insert($name,$date,$life,$image);

			$scholl_array = explode("@/!@#^SI@#DF@#@!~HI",$_POST['schools']);
			for ($i=0;$i<count($scholl_array);$i++) {
				if ($scholl_array[$i] == "") continue; 
				$this->school_model->insert($scholar_id,$scholl_array[$i]);

			}

			$link_array = explode("@/!@#^SI@#DF@#@!~HI",$_POST['links']);
			for ($i=0;$i<count($link_array);$i++) {
				if ($link_array[$i] == "") continue; 
				$this->link_model->insert($scholar_id,$link_array[$i]);

			}

			$seturl ="/".PROJECTNAME."/index.php/m_scholar/index/1/";
			Header("Location: $seturl"); 
			
		}
		$this->cismarty->view('scholar_add',get_defined_vars());
	}

	public function edit()
	{
		$this->load->library('cismarty'); 
		$this->load->model('common_model_admin');
		$this->load->model('school_model');
		$this->load->model('link_model');
		
		if(isset($_POST['addScholar']) && $_POST['addScholar'] != ""){
			$param = $this->uri->segment(3);
			$temp = substr($param, 15);	
			$pos = strpos($temp, "23asdf3sd0");
			$edit_id = substr($temp, 0, $pos);			

			$photo_file_name = "";
			if(!empty($_FILES["image"]["type"])){
				if ((($_FILES["image"]["type"] == "image/gif") || ($_FILES["image"]["type"] == "image/png") || ($_FILES["image"]["type"] == "image/jpeg") || ($_FILES["image"]["type"] == "image/pjpeg") || ($_FILES["image"]["type"] == "image/x-png")) && ($_FILES["image"]["size"] < 5000000)){
					if ($_FILES["image"]["error"] > 0){
						$errorMsg = "1";
					}else{
						$photo_file_name = date("Y_m_d_H_i_s").$_FILES['image']['name'];
						$uploaded_url = SCHOLAR_UPLOAD_URL."/".$photo_file_name;
						if (is_file($uploaded_url)) {
							@unlink($uploaded_url);
						}

						$result = move_uploaded_file ($_FILES['image']['tmp_name'], $uploaded_url);
					}
				}else{
					$errorMsg = "1";
				}
			}			

			$name   = $_POST['name'];
			$date   = $_POST['date'];
			$life   = $_POST['life'];
			$image   = $photo_file_name;
			$result =$this->scholar_model->update($edit_id, $name,$date,$life,$image);

			$this->school_model->remove($edit_id);
			$scholl_array = explode("@/!@#^SI@#DF@#@!~HI",$_POST['schools']);
			for ($i=0;$i<count($scholl_array);$i++) {
				if ($scholl_array[$i] == "") continue; 
				$this->school_model->insert($edit_id,$scholl_array[$i]);

			}

			$this->link_model->remove($edit_id);
			$link_array = explode("@/!@#^SI@#DF@#@!~HI",$_POST['links']);
			for ($i=0;$i<count($link_array);$i++) {
				if ($link_array[$i] == "") continue; 
				$this->link_model->insert($edit_id,$link_array[$i]);

			}

			$seturl ="/".PROJECTNAME."/index.php/m_scholar/index/1/";
			Header("Location: $seturl"); 
			
		}
		$param = $this->uri->segment(3);
		$temp = substr($param, 15);	
		$pos = strpos($temp, "23asdf3sd0");
		$edit_id = substr($temp, 0, $pos);		
		$data =$this->scholar_model->getscholarInfo($edit_id);
		$image_path = "";
		if($data){
			$image_path = SCHOLAR_UPLOAD_URL."/".$data["sclar_img"];
			if (!is_file($image_path))
				$image_path = "";
		}
		
		$school_lst=$this->school_model->getschoolInfo($edit_id);
		$school_cnt = count($school_lst);
		$link_lst=$this->link_model->getlinkInfo($edit_id);
		$link_cnt = count($link_lst);
		$school_no = 0;
		$link_no = 0;
		$this->cismarty->view('scholar_edit',get_defined_vars());
	}

	public function delete()
	{
		$param = $this->uri->segment(3);
		$temp = substr($param, 12);	
		$pos = strpos($temp, "768asdf68");
		$edit_id = substr($temp, 0, $pos);			

		$result =$this->scholar_model->remove($edit_id);
		$seturl ="/".PROJECTNAME."/index.php/m_scholar/index/1/";
		Header("Location: $seturl"); 
	}	
}
