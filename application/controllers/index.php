<?php
if (! defined ( 'BASEPATH' ))	exit ( 'No direct script access allowed' );

//ini_set('display_errors','On');
//error_reporting(E_ALL);
class Index extends CI_Controller {
	/**
	 * Userchannel controller.
	 * http://example.com/index.php/Userchannel/index
	 * Create at 2012,8,24 By Chris Wong , Copyright mx Inc.
	 * 
	 */
	
	function __construct()
    {
        parent::__construct();
//		$this->load->model ( 'event_model' );
       
    }	
	public function index() {
		$this->load->library('cismarty'); 
		$this->load->model('common_model');
		$this->load->model('common_module');
		$this->load->model('news_model');
		$this->load->model('event_model');
		$this->load->model('scholar_model');
		$this->load->model('query_model');
		
		
		$news_list = $this->news_model->get_news(5, 0);
		foreach($news_list as $key => $value){
			 $strlen = mb_strlen($value["news_title"], "UTF-8");
			 $echoStr = mb_substr($value["news_title"], 0, 30, "UTF-8");
			 if($strlen > 30)
				$echoStr .= "...";
			$news_list[$key]["news_title"] = $echoStr;
		}

		$event_list = $this->event_model->get_events(5, 0);
		foreach($event_list as $key => $value){
			 $strlen = mb_strlen($value["evt_title"], "UTF-8");
			 $echoStr = mb_substr($value["evt_title"], 0, 30, "UTF-8");
			 if($strlen > 30)
				$echoStr .= "...";
			$event_list[$key]["evt_title"] = $echoStr;
		}

		$scholar_list = $this->scholar_model->get_scholars(3, 0);
		foreach($scholar_list as $key => $value){
			 $strlen = mb_strlen($value["sclar_name"], "UTF-8");
			 $echoStr = mb_substr($value["sclar_name"], 0, 30, "UTF-8");
			 if($strlen > 30)
				$echoStr .= "...";
			$scholar_list[$key]["sclar_name"] = $echoStr;

			$scholar_list[$key]["sclar_reg_date"] = date("j\\t\h M Y", strtotime($value["sclar_reg_date"]));
		}
		$no = 1;
//		$query_list = $this->query_model->get_queries_answered(3, 0);
		$query_list = $this->query_model->get_queries(3, 0);
		$menu = 1;
		
		$this->cismarty->view('index',get_defined_vars());
	}

	public function register() {
		$this->load->library('cismarty'); 
		$this->load->model('common_model');
		$this->load->model('common_module');
		$this->load->model('user_model' );

		if(isset($_POST['signup']) && $_POST['signup'] != ""){
			$firstname      = $_POST['firstname'];
			$lastname   	= $_POST['lastname'];
			$email			= $_POST['email'];
			$password		= md5($_POST['password']);

			$result = $this->user_model->getuserInfo_email($email);
print_r($result);
			if(empty($result)){
				$result = $this->user_model->insert($firstname,$lastname,$email,$password);
				if($result){
					$seturl ="/".PROJECTNAME."/index.php";
					Header("Location: $seturl"); 
				}else
					echo '<script>alert("Failed User register"); </script>';
			}else{
				echo '<script>alert("Duplicate Email Address"); </script>';
			}
		}

		$this->cismarty->view('register',get_defined_vars());
	}

	public function login() {
		$this->load->model('user_model' );
		$email = 	$_POST['email'];
		$password = $_POST['pwd'];
		$row = $this->user_model->getuserInfo_login($email, md5($password));
		if(!empty($row)){
			$user_id=$row["user_id"];
			$username=$row["user_last_name"]." ".$row["user_first_name"];
			$email=$row["user_email"];

			setcookie("USERID_COOKIE", $user_id, time()+5*3600,"/");
			setcookie("USERNAME_COOKIE", $username,time()+5*3600,"/");
			setcookie("USEREMAIL_COOKIE", $email,time()+5*3600,"/");
			echo("sucess/--------/".$username);
		}else
			echo("fail");
	}
	
	public function logout()
	{
		if(!empty($_COOKIE['USERID_COOKIE']) || empty($_COOKIE['USERNAME_COOKIE']) || empty($_COOKIE['USEREMAIL_COOKIE']))	{ 
			setcookie("USERID_COOKIE", '', time()+10,"/");
			setcookie("USERNAME_COOKIE", '', time()+10,"/");
			setcookie("USEREMAIL_COOKIE", '', time()+10,"/");
		} 
		echo("aaa");
	}
}
