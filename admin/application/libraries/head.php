<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('lib/smarty/smarty.class.php');

class head{
	
	function __construct()
	{
		$this->load->model ( 'User_model' );
		$this->load->library('native_session');
				
		//检查是否已登录；		
		$checklogin = $this->User_model->uc_synstatus();
		$checklogin = $this->User_model->is_login();
		session_start();
		//print_r($_SESSION);
		if($checklogin){
			$checklogin = 'true';
			$user = $this->native_session->userdata('user');
			$this->load->model ( 'Message_model' );
			$this->Message_model->phone_clear($user['uid'], $phoneid);
		}else{
			$checklogin = 'false';
		}
		echo $checklogin;
		//var_dump($user) ;
		//echo "$this->tp->assign('userloginname',$user['username']);$this->tp->assign('islogin',$checklogin);";

	}
	
}