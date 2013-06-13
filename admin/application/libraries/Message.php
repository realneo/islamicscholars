<?php

/*****************************************************************************\
 * 说明: 消息类                             								  	 	 *
\*****************************************************************************/

class Message {
	
	private static $requesturl;
	private static $basetopic;
	
	// 构造函数
    public function __construct()
    {
		self::$requesturl	= 'http://117.79.80.12/GfanNewCommunity/gncdc/businessProcess.do';
		self::$basetopic	= 'jms.topic.';
    }
	
	// 消息发送
	public static function msg_send($msg)
	{	
		$ch = curl_init();
		$options = array(
			CURLOPT_URL				=> self::$requesturl,
		    CURLOPT_HEADER			=> false,
		 	CURLOPT_RETURNTRANSFER	=> true,
			CURLOPT_POST			=> true,
			CURLOPT_POSTFIELDS		=> $msg
		);
		curl_setopt_array($ch, $options);
		$data = curl_exec($ch);
		curl_close($ch);
		
		$data = json_decode($data, true);

		if($data[0]['result'] == 1) 
			return true;
		else
			return false;
	}
	
	// 创造订阅机型结构
	public static function msg_phone_subscribe($uid, $phoneid)
	{
		$msg = array(
			'command'	=> 'subscribe',
			'userID'	=> $uid,
			'topic'		=> self::$basetopic . 'phone.' . $phoneid,
			'topicType'	=> 1
		);
		
		return json_encode($msg);
	}
	
	// 创造取消订阅机型结构
	public static function msg_phone_unsubscribe($uid, $phoneid)
	{
		$msg = array(
			'command'	=> 'unsubscribe',
			'userID'	=> $uid,
			'topic'		=> self::$basetopic . 'phone.' . $phoneid
		);
		
		return json_encode($msg);
	}
	
	// 创造机型消息清0结构
	public static function msg_phone_clear($uid, $phoneid)
	{
		$msg = array(
			'command'	=> 'clear',
			'userID'	=> $uid,
			'topic'		=> self::$basetopic . 'phone.' . $phoneid,
			'topicType'	=> 1
		);
		
		return json_encode($msg);
	}
	
	// 创造订阅口碑结构
	public static function msg_appraisal_subscribe($uid, $contentid)
	{
		$msg = array(
			'command'	=> 'subscribe',
			'userID'	=> $uid,
			'topic'		=> self::$basetopic . 'appraisal.' . $contentid,
			'topicType'	=> 2
		);
		
		return json_encode($msg);
	}
	
	// 创造取消订阅口碑结构
	public static function msg_appraisal_unsubscribe($uid, $contentid)
	{
		$msg = array(
			'command'	=> 'unsubscribe',
			'userID'	=> $uid,
			'topic'		=> self::$basetopic . 'appraisal.' . $contentid
		);
		
		return json_encode($msg);
	}
	
	// 创造消息清0结构
	public static function msg_appraisal_clear($uid, $contentid)
	{
		$msg = array(
			'command'	=> 'clear',
			'userID'	=> $uid,
			'topic'		=> self::$basetopic . 'appraisal.' . $contentid,
			'topicType'	=> 2
		);
		
		return json_encode($msg);
	}
	
	// 创造订阅应用结构
	public static function msg_app_subscribe($uid, $appid)
	{
		$msg = array(
			'command'	=> 'subscribe',
			'userID'	=> $uid,
			'topic'		=> self::$basetopic . 'app.' . $appid,
			'topicType'	=> 3
		);
		
		return json_encode($msg);
	}
	
	// 创造取消订阅应用结构
	public static function msg_app_unsubscribe($uid, $appid)
	{
		$msg = array(
			'command'	=> 'unsubscribe',
			'userID'	=> $uid,
			'topic'		=> self::$basetopic . 'app.' . $appid
		);
		
		return json_encode($msg);
	}
	
	// 创造机型新增用户结构
	public static function msg_phone_user($phoneid)
	{
		$msgarr = array(
			'userNumber' => 1
		);
		
		$msg = array(
			'command'	=> 'productPhone',
			'topic'		=> self::$basetopic . 'phone.' . $phoneid,
			'msg'		=> $msgarr
		);
		
		return json_encode($msg);
	}
	
	// 创造机型新增评论结构
	public static function msg_phone_comment($phoneid)
	{
		$msgarr = array(
			'coummentNumber' => 1
		);
		
		$msg = array(
			'command'	=> 'productPhone',
			'topic'		=> self::$basetopic . 'phone.' . $phoneid,
			'msg'		=> $msgarr
		);
		
		return json_encode($msg);
	}
	
	// 创造机型价格变化结构
	public static function msg_phone_price($phoneid, $price)
	{
		$msgarr = array(
			'price' => $price
		);
		
		$msg = array(
			'command'	=> 'productPhone',
			'topic'		=> self::$basetopic . 'phone.' . $phoneid,
			'msg'		=> $msgarr
		);
		
		return json_encode($msg);
	}
	
	// 创造口碑顶结构
	public static function msg_appraisal_up($contentid)
	{
		$msgarr = array(
			'upNumber' => 1
		);
		
		$msg = array(
			'command'	=> 'productAppraisal',
			'topic'		=> self::$basetopic . 'appraisal.' . $contentid,
			'msg'		=> $msgarr
		);
		
		return json_encode($msg);
	}
	
	// 创造口碑踩结构
	public static function msg_appraisal_down($contentid)
	{
		$msgarr = array(
			'downNumber' => 1
		);
		
		$msg = array(
			'command'	=> 'productAppraisal',
			'topic'		=> self::$basetopic . 'appraisal.' . $contentid,
			'msg'		=> $msgarr
		);
		
		return json_encode($msg);
	}
	
	// 创造应用新攻略结构
	public static function msg_app_reders($appid)
	{
		$msgarr = array(
			'rederNumber' => 1
		);
		
		$msg = array(
			'command'	=> 'productAppAndGame',
			'topic'		=> self::$basetopic . 'app.' . $appid,
			'msg'		=> $msgarr
		);
		
		return json_encode($msg);
	}
	// 创造应用新增评论结构
	public static function msg_app_comment($appid)
	{
		$msgarr = array(
			'coummentNumber' => 1
		);
		
		$msg = array(
			'command'	=> 'productAppAndGame',
			'topic'		=> self::$basetopic . 'app.' . $appid,
			'msg'		=> $msgarr
		);
		
		return json_encode($msg);
	}
		
	// 创造应用版本更新结构
	public static function msg_app_version($appid, $version)
	{
		$msgarr = array(
			'version' => $version
		);
		
		$msg = array(
			'command'	=> 'productAppAndGame',
			'topic'		=> self::$basetopic . 'app.' . $appid,
			'msg'		=> $msgarr
		);
		
		return json_encode($msg);
	}
	// 创造应用消息清0结构
	public static function msg_app_clear($uid, $appid)
	{
		$msg = array(
			'command'	=> 'clear',
			'userID'	=> $uid,
			'topic'		=> self::$basetopic . 'app.' . $appid,
			'topicType'	=> 3
		);
		
		return json_encode($msg);
	}
	// 析构函数
    public function __destruct()
    {
        // TODO
    }
	
}

?>