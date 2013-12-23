<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class common_model_admin extends CI_Model{
    function __construct()
    {
        parent::__construct();
		
		
		$this->load->library('cismarty');
	
		$this->load->library('session');
		$userinfo=$this->session->userdata('manager');
		$islogin =$userinfo['admin_id'];
		$userid  =$userinfo['admin_id'];
		$username  =$userinfo['admin_login_id'];
		//var_dump($userinfo);
		$this->cismarty->assign('static_url',STATIC_URL);
		$this->cismarty->assign('islogin',$islogin);
		$this->cismarty->assign('admin_id',$userid);
		$this->cismarty->assign('admin_login_id',$username);
    }
	
}