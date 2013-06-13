<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends CI_Model{
    function __construct()
    {
        parent::__construct();
		
		
		$this->load->library('cismarty');
	
		$this->load->library('session');
		$userinfo=$this->session->userdata('user');
		$islogin =$userinfo['uid'];
		$userid  =$userinfo['uid'];
		$username  =$userinfo['nickname'];
		//var_dump($userinfo);
		
		
		$this->cismarty->assign('static_url',STATIC_URL);
		$this->cismarty->assign('islogin',$islogin);
		$this->cismarty->assign('userid',$userid);
		$this->cismarty->assign('username',$username);
		/**
		 * 友情链接*
		 */
		//this->load->library('friendlink_moudle');
		//$link=$this->friendlink_moudle->get_link();
		//$this->cismarty->assign('link',$link);
		//var_dump($link);
		$this->load->model('friendlink_moudle');//加载 关注模版类
		$links=$this->friendlink_moudle->get_link();
		$this->cismarty->assign('links',$links);
		
		$this->load->library('session');
	    $this->load->model('city_module'); //加载 新闻模版类
	    $dataaddress=$this->city_module->get_config_fomration('0');
	   // var_dump($dataaddress);
	    $this->cismarty->assign('dataaddress', $dataaddress);  // 输出变量或者数组
		
		$this->load->model('seo_module');//加载 关注模版类
		$seocate=$this->seo_module->getCate();
		$this->cismarty->assign('seocate',$seocate);
		
		//var_dump($links);die();
		
		
		
		
    }
	
}