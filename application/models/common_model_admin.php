<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class common_model_admin extends CI_Model{
	public $islogin;
	public $userid;
	public $username;

    function __construct()
    {
        parent::__construct();
		
		
		$this->load->library('cismarty');
	
		$this->islogin =false;
		$this->userid  ="";
		$this->username  = "";

		if (isset($_COOKIE["ADMINID_COOKIE"]) && $_COOKIE["ADMINID_COOKIE"]){
			$this->islogin = true;
			$this->userid = $_COOKIE["ADMINID_COOKIE"];
			if (isset($_COOKIE["ADMINNAME_COOKIE"]) && $_COOKIE["ADMINNAME_COOKIE"]){
				$this->username  = $_COOKIE["ADMINNAME_COOKIE"];
			}		
		}
		//var_dump($userinfo);
		$this->cismarty->assign('static_url',STATIC_URL);
		$this->cismarty->assign('islogin',$this->islogin);
		$this->cismarty->assign('user_name',$this->username);
    }
	
}