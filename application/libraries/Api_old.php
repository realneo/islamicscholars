<?php

/*****************************************************************************\
 * 说明: API类                             								  	 *
\*****************************************************************************/

class Api {
	
	var $conf;	// 通信参数配置
	var $xml;	// XML对象
	var $tea;	// TEA对象
	
	// 构造函数
	function __construct($conf)
	{
		include_once ("Xml.php");
		include_once ("Tea.php");
		
		$this->xml = new Xml();
		$this->tea = new Tea();
		
		$this->conf = $conf;
	}
	
	// 用户注册
    function register($arr ,&$return)
    {
		$this->xml->array2xml($arr, $xml);
		
		$this->get_data($xml, 'register', $returndata);
		
		$code = $returndata['code'];
		$data = $returndata['data'];
		
		if($code == 200){
			$this->xml->xml2array($data, $tdata);
			
			$this->xml->clean_node($tdata, $return);
			
			$re = true;
		}else{
			$return = $code;
			
			$re = false;
		}
		
		return $re;
    }

	// 用户登录
    function login($arr, &$return)
    {
		$this->xml->array2xml($arr, $xml);
		
		$this->get_data($xml, 'login', $returndata);
		
		$code = $returndata['code'];
		$data = $returndata['data'];
		
		if($code == 200){
			$this->xml->xml2array($data, $tdata);
			
			$this->xml->clean_node($tdata, $return);
			
			$re = true;
		}else{
			$return = $code;
			
			$re = false;
		}
		
		return $re;
    }

	// 查询密码
    function get_password($arr, &$return)
    {
		$this->xml->array2xml($arr, $xml);
		
		$this->get_data($xml, 'query_password', $returndata);
		
		$code = $returndata['code'];
		$data = $returndata['data'];
		
		if($code == 200){
			$this->xml->xml2array($data, $tdata);
			
			$this->xml->clean_node($tdata, $return);
			
			$re = true;
		}else{
			$return = $code;
			
			$re = false;
		}
		
		return $re;
	}
	
	// 加G币
	function add_g_coin($arr, &$return)
    {
		$this->xml->array2xml($arr, $xml);
		
		$this->get_data($xml, 'update_web_g', $returndata);
		
		$code = $returndata['code'];
		$data = $returndata['data'];
		
		if($code == 200){
			if($data != ''){
				$this->xml->xml2array($data, $tdata);
			
				$this->xml->clean_node($tdata, $return);
			}
			
			$re = true;
		}else{
			$return = $code;
			
			$re = false;
		}
		
		return $re;
	}

	// 检查用户名合法性
    function check_username($arr, &$return)
    {
		$this->xml->array2xml($arr, $xml);
		
		$this->get_data($xml, 'check_username', $returndata);
		
		$code = $returndata['code'];
		$data = $returndata['data'];
		
		if($code == 200){
			$return = $code;
			
			$re = true;
		}else{
			$return = $code;
			
			$re = false;
		}
		
		return $re;
    }
	
	// 检查邮箱合法性
    function check_email($arr, &$return)
    {
		$this->xml->array2xml($arr, $xml);
		
		$this->get_data($xml, 'check_email', $returndata);
		
		$code = $returndata['code'];
		$data = $returndata['data'];
		
		if($code == 200){
			$return = $code;
			
			$re = true;
		}else{
			$return = $code;
			
			$re = false;
		}
		
		return $re;
    }

	// 获取用户信息
    function get_user_info($arr, &$return)
    {
		$this->xml->array2xml($arr, $xml);
		
		$this->get_data($xml, 'query_user_profile', $returndata);
		
		$code = $returndata['code'];
		$data = $returndata['data'];
		
		if($code == 200){
			$this->xml->xml2array($data, $tdata);
			
			$this->xml->clean_node($tdata, $return);
			
			$re = true;
		}else{
			$return = $code;
			
			$re = false;
		}
		
		return $re;
    }

	// 加密
	function encrypt($xml, &$encxml)
	{
		$txml = $this->tea->encrypt($xml, $this->conf['key']);
		
		$encxml = base64_encode($txml);
		
		return true;
	}
	
	// 解密
	function decrypt($xml, &$decxml)
	{
		$txml = base64_decode($xml);
		
		$decxml = $this->tea->decrypt($txml, $this->conf['key']);
		
		return true;
	}
	
	// 获取数据
	function get_data($xml, $type, &$data)
	{
		$this->encrypt($xml, $encxml);
		
		$data = $this->request_data($encxml, $type);

		return true;
	}
	
	// 请求数据
	function request_data($data, $type)
	{
		$alternate_opts = array(
		        'http'=>array(
		            'method'=>"POST",
		            'header'=>"Content-type: application/x-www-form-urlencoded\r\n" .
		            "Content-length: " . strlen($data) . "\r\n" .
					"User-Agent: " . $this->conf['User-Agent'] . "",
		            'content'=>$data
		            )
		        );
		$alternate = stream_context_create($alternate_opts);

		$return['data'] = file_get_contents($this->conf['url'] . $type, false, $alternate);
		
		$resp = explode(' ', $http_response_header[0]);
		$code = $resp[1];
		
		$return['code'] = $code;
		
		return $return;
	}

}

?>