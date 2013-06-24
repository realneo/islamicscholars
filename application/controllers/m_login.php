<?php
if (! defined ( 'BASEPATH' ))	exit ( 'No direct script access allowed' );

//ini_set('display_errors','On');
//error_reporting(E_ALL);
class M_login extends CI_Controller {
	/**
	 * Userchannel controller.
	 * http://example.com/index.php/Userchannel/index
	 * Create at 2012,8,24 By Chris Wong , Copyright mx Inc.
	 * 
	 */
	
	function __construct()
    {
        parent::__construct();
		$this->load->model ( 'manager_model' );
       
    }	
	public function index() {
		$this->load->library('cismarty'); 
		$this->load->model('common_model_admin');

//        $url= $this->uri->segment(3);
		$userinfo = array();
		$userinfo['admin_id'] = '';

		$this->cismarty->view('manager_login',get_defined_vars());
	}
	
	function usercheck()
	{
//		$url= $this->uri->segment(3);
		$username      = $_POST['username'];
		$password   = $_POST['password'];

		if (trim($username) != '' && trim($password) != '' ){
			$userinfo=$this->manager_model->login($username,$password);

			if($userinfo['err']){
				echo '<script>alert("Incorrect Username or Password!"); </script>';
				$geturl="/".PROJECTNAME."/index.php/m_login/index";
				//var_dump($geturl);die();
//				Header("Location: $geturl"); 
	            echo '<script>window.open("'.$geturl.'","_self");</script>';
			} else {

			  setcookie("ADMINID_COOKIE", $userinfo["id"], time()+3600,"/");
			  setcookie("ADMINNAME_COOKIE", $username,time()+3600,"/");
				
				if(empty($url))
				{
					$seturl ="/".PROJECTNAME."/index.php/m_event/index/1/";
				}
				else {
				$seturl=str_replace('-','/',$url);
				$seturl=str_replace('00000','?',$seturl);
				$seturl=str_replace('0000','=',$seturl);
				}
				//var_dump($seturl);die();
				Header("Location: $seturl"); 
			}
		} else {
			 
			echo '<script>alert("Input Username or Password!"); </script>';
			$geturl="/".PROJECTNAME."/index.php/m_login/index";
			 echo '<script>window.open("'.$geturl.'","_self");</script>';
//			Header("Location: $geturl"); 
		}
	}


	function logout()
	{
		$this->manager_model->logout();

		setcookie("ADMINID_COOKIE", '', time()+10,"/");
		setcookie("ADMINNAME_COOKIE", '',time()+10,"/");
		//$url ="/mxw/index.php";
		header('Location: /'.PROJECTNAME.'/index.php/m_login/index');
	   // Header("Location: $url"); 
	}
	
}
