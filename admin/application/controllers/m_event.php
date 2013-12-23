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
		$configs['base_url']='/'.PROJECTNAME.'/index.php/m_event/index/';
		$configs['total_rows'] =$this->event_model->get_events_count();
		$configs['per_page'] = $limit;
		$no = ($pagenum-1)*$limit+1;
		
		$event_page=$this->common_module->page_all($configs);
		$event_lst=$this->event_model->get_events($limit,$offset);
		$this->cismarty->view('event_list',get_defined_vars());
	}
	
	public function add()
	{
		$this->load->library('cismarty'); 
		$this->load->model('common_model_admin');
		$photo_file_name = "";
		if(isset($_POST['addEvent']) && $_POST['addEvent'] != ""){
			
			if(!empty($_FILES["image"]["type"])){
				if ((($_FILES["image"]["type"] == "image/gif") || ($_FILES["image"]["type"] == "image/png") || ($_FILES["image"]["type"] == "image/jpeg") || ($_FILES["image"]["type"] == "image/pjpeg") || ($_FILES["image"]["type"] == "image/x-png")) && ($_FILES["image"]["size"] < 5000000)){
					if ($_FILES["image"]["error"] > 0){
						$errorMsg = "1";
					}else{
						$photo_file_name = date("Y_m_d_H_i_s").$_FILES['image']['name'];
						$uploaded_url = EVENT_UPLOAD_URL."/".$photo_file_name;
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
			$venue   = $_POST['venue'];
			$description   = $_POST['description'];
			$date   = $_POST['date'];
			$image   = $photo_file_name;
			$result =$this->event_model->insert($name,$venue,$description,$date,$image);
			$seturl ="/".PROJECTNAME."/index.php/m_event/index/1/";
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

			$photo_file_name = "";
			if(!empty($_FILES["image"]["type"])){
				if ((($_FILES["image"]["type"] == "image/gif") || ($_FILES["image"]["type"] == "image/png") || ($_FILES["image"]["type"] == "image/jpeg") || ($_FILES["image"]["type"] == "image/pjpeg") || ($_FILES["image"]["type"] == "image/x-png")) && ($_FILES["image"]["size"] < 5000000)){
					if ($_FILES["image"]["error"] > 0){
						$errorMsg = "1";
					}else{
						$photo_file_name = date("Y_m_d_H_i_s").$_FILES['image']['name'];
						$uploaded_url = EVENT_UPLOAD_URL."/".$photo_file_name;
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
			$venue   = $_POST['venue'];
			$description   = $_POST['description'];
			$date   = $_POST['date'];
			$image   = $photo_file_name;
			$result =$this->event_model->update($edit_id, $name,$venue,$description,$date,$image);
			$seturl ="/".PROJECTNAME."/index.php/m_event/index/1/";
			Header("Location: $seturl"); 
			
		}
		$param = $this->uri->segment(3);
		$temp = substr($param, 17);	
		$pos = strpos($temp, "72asdyhf897a");
		$edit_id = substr($temp, 0, $pos);		
		$data =$this->event_model->geteventInfo($edit_id);
		$image_path = "";
		if($data){
			$image_path = EVENT_UPLOAD_URL."/".$data["evt_img"];
			if (!is_file($image_path))
				$image_path = "";
		}
		$this->cismarty->view('event_edit',get_defined_vars());
	}

	public function delete()
	{
		$param = $this->uri->segment(3);
		$temp = substr($param, 14);	
		$pos = strpos($temp, "7868sad6f8");
		$edit_id = substr($temp, 0, $pos);			

		$result =$this->event_model->remove($edit_id);
		$seturl ="/".PROJECTNAME."/index.php/m_event/index/1/";
		Header("Location: $seturl"); 
	}	
}
