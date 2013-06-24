<?php

/*****************************************************************************\
 * 说明: 用户模型类                             								  	 *
\*****************************************************************************/

class manager_model extends CI_Model {
	
	//var $session;	// SESSION对象
	private $MX_DB;
	
	
	// 构造函数
    function __construct()
    {
        parent::__construct();
		
		 $this->load->database();
		// $this->session  =$session;
		
		
    }

	// 用户注册
    function register($username, $password)
    {
		$arr = array(
			'admin_login_id'	=> $username,
			'admin_pwd'	=> $password,
			'admin_reg_dage'=>date("Y-m-d H:i:s")
		);
	$this->db->insert('h_admintb',$arr);
    }

	// 用户登录
    function login($username, $password)
    {
		$sql    = "select * from  h_admintb where admin_login_id = '".$username."'";
		$query	= $this->db->query($sql);
		$result =  $query->row_array();
		if(!empty($result)){
				if($result['admin_pwd']==$password){
						$re['err']   = 0;
						$re['mess']  = 'Success';
						$re['id']  = $result["admin_id"];
						$this->load->library('session');
						$this->session->set_userdata('manager', $result);

					} else {
							$re['err']   = 1;
							$re['mess']  = 'Incorrect password';
						}

			} else {

					$re['err']   = 1;
					$re['mess']  = 'There is no id';
				}

		return $re;
		
    }

	// 用户登出
    function logout()
    {
		$this->load->library('session');
		$this->session->unset_userdata('manager', '');
/*		if(!empty($_COOKIE['username']) || empty($_COOKIE['password']))	{ 
			setcookie("gf_username", null, time()-3600*24); 
			setcookie("gf_uid", null, time()-3600*24); 
			setcookie("gf_password", null, time()-3600*24); 
		} 
*/		
    }

	// 检查登录
    function is_login()
    {	
		$user = $this->session->userdata('manager');

		if(is_array($user)){
			return true;
		}else{
/*			 if(!empty($_COOKIE['gf_uid']) && !empty($_COOKIE['gf_password'])){
			  	$user=$this->get_user_info($_COOKIE['gf_uid']);
			  	$pw_data=$this->get_password($_COOKIE['gf_uid']);
			  	$password=$pw_data['password'];
			  	if($password==$_COOKIE['gf_password']){
			  		$this->session->set_userdata('user', $user);
			  		return true;
			  	} else {
			  		return false;
			  	}
			  } else {
			  	return false;
			  }
*/		
			return false;			
		}
	}

	// 获取用户信息
    function get_user_info($uid)
    {
		$query=$this->db->query("select * from h_admintb where admin_id='".$uid."'");
		$re = $query->row_array();
		return $re;
    }

	// 查询密码
    function get_password($uid)
    {
		$arr = array(
			'uid'	=> $uid
		);
		
		if($this->api->get_password($arr, $return)){
			$re = $return;
		}else{
			$re = false;
		}
		
		return $re;
	}

	// 检查用户名合法性
    function check_username($username)
    {
		$return = $this->check_username_simple($username);
				
		if($return !== true){
			$re = $return;
		}else{
			$arr = array(
				'name' => $username
			);
		
			if($this->api->check_username($arr, $return)){
				$re = true;
			}else{
				$re = Err::$errcode[$return];
			}
		}
		
		return $re;
    }
	
	// 检查用户名合法性
    function check_username_simple($username)
    {
		if(trim($username) == ''){
			$re = 'Input Username';
		}else{
			$re = true;
		}
		
		return $re;
    }

	// 检查密码合法性
    function check_password($password, $repassword)
    {
		$re = true;
		
		if(trim($password) != trim($repassword)){
			$re = ''; 
		}
		
		if(strlen(trim($password)) < 1 || strlen(trim($password)) > 32){
			$re = ''; 
		}
		
		if(trim($password) == ''){
			$re = ''; 
		}
		
		return $re;
    }

	// 检查密码合法性
    function check_password_simple($password)
    {
		if(trim($password) == ''){
			$re = 'Input Password';
		}else{
			$re = true;
		}
		
		return $re;
    }

	// 生成验证吗
    function create_captcha()
    {
		$this->load->helper('captcha');
		
		$word = $this->get_rand_str(4);
		
		$this->session->set_userdata('captcha', strtolower($word));
		
		$vals = array(
			'word'			=> $word,
		    'img_path'		=> './captcha/',
		    'img_url'		=> '' . base_url() . 'captcha/',
			'font_path'		=> './captcha/font/f.ttf',
		    'img_width'		=> 110,
		    'img_height'	=> 40,
		    'expiration' 	=> 7200
		    );

		$cap = create_captcha($vals);
		
		return $cap;
    }
	
	// 随机字符串
	function get_rand_str($len) 
	{ 
	    $chars = array( 
	        "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k",  
	        "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v",  
	        "w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G",  
	        "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R",  
	        "S", "T", "U", "V", "W", "X", "Y", "Z", "0", "1", "2",  
	        "3", "4", "5", "6", "7", "8", "9" 
	    ); 
	    $charsLen = count($chars) - 1; 
	    shuffle($chars);   
	    $output = ""; 
	    for ($i=0; $i<$len; $i++){ 
	        $output .= $chars[mt_rand(0, $charsLen)]; 
	    }  
	    return $output;  
	}
	
	// 同步登录
    function uc_synlogin($uid)
    {
		$this->session->set_userdata('adid', $uid);
		
		$ucsynlogin = uc_user_synlogin($uid);
		
		return $ucsynlogin;
    }

	// 同步登出
    function uc_synlogout()
    {
		$this->session->unset_userdata('adid', '');
		
		$ucsynlogout = uc_user_synlogout();
		
		return $ucsynlogout;
    }

	// 同步状态
    function uc_synstatus()
    {
		$uid = $this->session->userdata('adid');
		
		if($uid > 0){
			$user = $this->get_user_info($uid);
			
			$user['uid'] = $uid;
			
			$this->session->set_userdata('manager', $user);
		}else{
			$this->session->unset_userdata('manager', '');
		}
    }

	/**
	 * 修改
	 *
	 * @param unknown_type $uid
	 * @param unknown_type $name
	 * @param unknown_type $password
	 * @param unknown_type $sex
	 * @param unknown_type $date
	 * @param unknown_type $email
	 * @param unknown_type $city
	 * @param unknown_type $occupational
	 * @param unknown_type $txtarea
	 */
	public function update($uid,$name,$password)
	{
		   $sqlext =  "";

			if (!empty($name)) {
				if($sqlext == "")
					$sqlext .=" admin_login_id='".$name."'";
				else
					$sqlext .=" ,admin_login_id='".$name."'";
			
			}

			if (!empty($password)) {
				if($sqlext == "")
					$sqlext .=" admin_pwd='".$password."'";
				else
					$sqlext .=" ,admin_pwd='".$password."'";
			
			}

			if($sqlext == "")
				$sqlext .=" admin_reg_dage='".date("Y-m-d H:i:s")."'";
			else
				$sqlext .=" ,admin_reg_dage='".date("Y-m-d H:i:s")."'";

			$sql="update h_admintb set  ". $sqlext." where admin_id= '".$uid."' ";
echo($sql);			
			//var_dump($sql);die();
		    $this->db->query($sql);
	}
	
	function get_users($limit,$offset)
	{
		$sql="SELECT * FROM h_admintb order by admin_reg_dage desc ";
		$sql=$sql. " limit ".$limit." offset ".$offset;
		$query =$this->db->query($sql);
		$rows = $query->result_array();
		if($query->num_rows()>0)return $rows;
	}

	function get_users_count()
	{
		$sql="SELECT * FROM h_admintb ";
		$query =$this->db->query($sql);
		return $query->num_rows();
	}
	
	public function  insert($username,$password)
	{
		$data =array('admin_login_id'=>$username,
					'admin_pwd'=>$password,
					'admin_reg_dage'=>date("Y-m-d H:i:s"));
		$result = $this->db->insert('admintb',$data);
//		return $this->db->insert_id();
		return $result;
	}

    public function remove($edit_id)
    {
		return $this->db->delete('admintb', array('admin_id'=>$edit_id)); 
    }
	
}

?>