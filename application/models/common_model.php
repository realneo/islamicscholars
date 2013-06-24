<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class common_model extends CI_Model{
	public $islogin;
	public $userid;
	public $username;

    function __construct()
    {
        parent::__construct();
		
		
		$this->load->library('cismarty');
	
		$this->islogin =0;
		$this->userid  ="";
		$this->username  = "";

		if (isset($_COOKIE["USERID_COOKIE"]) && $_COOKIE["USERID_COOKIE"]){
			$this->islogin = 1;
			$this->userid = $_COOKIE["USERID_COOKIE"];
			if (isset($_COOKIE["USERNAME_COOKIE"]) && $_COOKIE["USERNAME_COOKIE"]){
				$this->username  = $_COOKIE["USERNAME_COOKIE"];
			}		
		}
		//var_dump($userinfo);
		$this->cismarty->assign('static_url',STATIC_URL);
		$this->cismarty->assign('islogin',$this->islogin);
		$this->cismarty->assign('user_name',$this->username);
		
    }
	
}