<?php
if (! defined ( 'BASEPATH' ))	exit ( 'No direct script access allowed' );

//ini_set('display_errors','On');
//error_reporting(E_ALL);
class M_lib extends CI_Controller {
	/**
	 * Userchannel controller.
	 * http://example.com/index.php/Userchannel/index
	 * Create at 2012,8,24 By Chris Wong , Copyright mx Inc.
	 * 
	 */
	
	function __construct()
    {
        parent::__construct();
		$this->load->model ( 'lib_model' );
       
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
		$configs['base_url']='/'.PROJECTNAME.'/index.php/m_lib/index/';
		$configs['total_rows'] =$this->lib_model->get_libs_count();
		$configs['per_page'] = $limit;
		$no = ($pagenum-1)*$limit+1;

		$lib_page=$this->common_module->page_all($configs);
		$lib_lst=$this->lib_model->get_libs($limit,$offset);
		$this->cismarty->view('lib_list',get_defined_vars());
	}
	
	public function add()
	{
		$this->load->library('cismarty'); 
		$this->load->model('common_model_admin');
		$this->load->model ( 'scholar_model' );
		$scholar_lst=$this->scholar_model->get_scholars($limit,$offset);
		
		$photo_file_name = "";
		if(isset($_POST['addLib']) && $_POST['addLib'] != ""){
			if(!empty($_FILES["image"]["type"])){
				if ((($_FILES["image"]["type"] == "image/gif") || ($_FILES["image"]["type"] == "image/png") || ($_FILES["image"]["type"] == "image/jpeg") || ($_FILES["image"]["type"] == "image/pjpeg") || ($_FILES["image"]["type"] == "image/x-png")) && ($_FILES["image"]["size"] < 5000000)){
					if ($_FILES["image"]["error"] > 0){
						$errorMsg = "1";
					}else{
						$photo_file_name = date("Y_m_d_H_i_s").$_FILES['image']['name'];
						$uploaded_url = LIB_UPLOAD_URL."/".$photo_file_name;
						if (is_file($uploaded_url)) {
							@unlink($uploaded_url);
						}

						$result = move_uploaded_file ($_FILES['image']['tmp_name'], $uploaded_url);
					}
				}else{
					$errorMsg = "1";
				}
			}			
			$name      = $_POST['name'];
			$description   = $_POST['description'];
			$author   = $_POST['author'];
			$image   = $photo_file_name;
			$type   = $_POST['type'];
			$libfile   = $_POST['lib_file'];
			$date   = $_POST['date'];

			$result =$this->lib_model->insert($name,$description, $author, $image,$type,$libfile,$date);
			$seturl ="/".PROJECTNAME."/index.php/m_lib/index/1/";
			Header("Location: $seturl"); 
			
		}
		$this->cismarty->view('lib_add',get_defined_vars());
	}

	public function edit()
	{
		$this->load->library('cismarty'); 
		$this->load->model('common_model_admin');
		$this->load->model ( 'scholar_model' );
		$scholar_lst=$this->scholar_model->get_scholars($limit,$offset);


		if(isset($_POST['addLib']) && $_POST['addLib'] != ""){
			$param = $this->uri->segment(3);
			$temp = substr($param, 15);	
			$pos = strpos($temp, "98a7sd9f8");
			$edit_id = substr($temp, 0, $pos);			

			$photo_file_name = "";
			if(!empty($_FILES["image"]["type"])){
				if ((($_FILES["image"]["type"] == "image/gif") || ($_FILES["image"]["type"] == "image/png") || ($_FILES["image"]["type"] == "image/jpeg") || ($_FILES["image"]["type"] == "image/pjpeg") || ($_FILES["image"]["type"] == "image/x-png")) && ($_FILES["image"]["size"] < 5000000)){
					if ($_FILES["image"]["error"] > 0){
						$errorMsg = "1";
					}else{
						$photo_file_name = date("Y_m_d_H_i_s").$_FILES['image']['name'];
						$uploaded_url = LIB_UPLOAD_URL."/".$photo_file_name;
						if (is_file($uploaded_url)) {
							@unlink($uploaded_url);
						}

						$result = move_uploaded_file ($_FILES['image']['tmp_name'], $uploaded_url);
					}
				}else{
					$errorMsg = "1";
				}
			}			
			$name      = $_POST['name'];
			$description   = $_POST['description'];
			$author   = $_POST['author'];
			$image   = $photo_file_name;
			$type   = $_POST['type'];
			$libfile   = $_POST['lib_file'];
			$date   = $_POST['date'];

			$result =$this->lib_model->update($edit_id, $name,$description,$author,$image,$type,$libfile,$date);
			$seturl ="/".PROJECTNAME."/index.php/m_lib/index/1/";
			Header("Location: $seturl"); 
			
		}
		$param = $this->uri->segment(3);
		$temp = substr($param, 15);	
		$pos = strpos($temp, "98a7sd9f8");
		$edit_id = substr($temp, 0, $pos);		
		$data =$this->lib_model->getlibInfo($edit_id);
		$image_path = "";
		if($data){
			$image_path = LIB_UPLOAD_URL."/".$data["lib_cover_img"];
			if (!is_file($image_path))
				$image_path = "";
		}
		$this->cismarty->view('lib_edit',get_defined_vars());
	}

	public function delete()
	{
		$param = $this->uri->segment(3);
		$temp = substr($param, 12);	
		$pos = strpos($temp, "7687sa9d8f7");
		$edit_id = substr($temp, 0, $pos);			

		$result =$this->lib_model->remove($edit_id);
		$seturl ="/".PROJECTNAME."/index.php/m_lib/index/1/";
		Header("Location: $seturl"); 
	}	

	public function upload()
	{
		$result = "fail";
		foreach ($_FILES["images"]["error"] as $key => $error) {
			if ($error == UPLOAD_ERR_OK) {
				$fileinfo = pathinfo($_FILES["images"]["name"][$key]);
				$file_name = $fileinfo['basename'];
				$file_name = date("Y_m_d_H_i_s").$file_name;

				$uploaded_url = LIB_UPLOAD_URL."/".$file_name;
//				if(move_uploaded_file( $_FILES["images"]["tmp_name"][$key], $realPath."/".$file_name) != FALSE)
				if(move_uploaded_file( $_FILES["images"]["tmp_name"][$key], $uploaded_url) != FALSE)
					$result = $file_name;
			}
		}
		echo($result);
	}	

}
