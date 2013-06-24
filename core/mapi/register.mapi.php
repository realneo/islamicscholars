<?php
class registerMapi
{
	public function run()
	{
		global $_FANWE;	
		
		$root = array();
		$root['return'] = 0;

		$data = array(
			'email'            => $_FANWE['requestData']['email'],
			'user_name'        => $_FANWE['requestData']['user_name'],
			'password'         => $_FANWE['requestData']['password'],
			'gender'           => intval($_FANWE['requestData']['gender']),
		);

		$vservice = FS('Validate');
		$validate = array(
			array('email','required',lang('user','register_email_require')),
			array('email','email',lang('user','register_email_error')),
			array('user_name','required',lang('user','register_user_name_require')),
			array('user_name','range_length',lang('user','register_user_name_len'),2,20),
			array('user_name','/^[\x{4e00}-\x{9fa5}a-zA-Z][\x{4e00}-\x{9fa5}a-zA-Z0-9]+$/u',lang('user','register_user_name_error')),
			array('password','range_length',lang('user','register_password_range'),6,20),
		);

		if(!$vservice->validation($validate,$data))
		{
			$root['info'] = "注册失败:".$vservice->getError();
			m_display($root);
		}

		$uservice = FS('User');
		if($uservice->getEmailExists($data['email']))
		{
			$root['info'] = "注册失败:".lang('user','register_email_exist');
			m_display($root);
		}

		if($uservice->getUserNameExists($data['user_name']))
		{
			$root['info'] = "注册失败:".lang('user','register_user_name_exist');
			m_display($root);
		}

		//================add by chenfq 2011-10-14 =======================
		$user_field = $_FANWE['setting']['integrate_field_id'];
		$integrate_id = FS("Integrate")->addUser($data['user_name'],$data['password'],$data['email']);
		if ($integrate_id < 0){
			$info = FS("Integrate")->getInfo();
			$root['info'] = "注册失败:".$info;
			m_display($root);
		};
		//================add by chenfq 2011-10-14=======================		
				
		$user = array(
			'email' => $data['email'],
			'user_name' => $data['user_name'],
			'password'  => $data['password'],
			'invite_id' => FS('User')->getReferrals(),
			$user_field => $integrate_id,
		);
		
		
		$uid = FS('User')->createUser($user);
		if($uid > 0)
		{
			$root['return'] = 1;
			$root['info'] = "用户注册成功";		
			$root['uid'] = $uid;
			$root['user_name'] = $data['user_name'];
			$root['user_avatar'] = avatar(0,'m',true);
			$root['user_email'] = $data['email'];

			$deviceuid = addslashes(trim($_FANWE['requestData']['deviceuid']));
			$sql = "update ".FDB::table('apns_devices')." set clientid = ".$uid." where clientid = 0 and deviceuid = '".$deviceuid."'";
			FDB::query($sql);
		}
		else
		{
			$root['info']	= lang('user','register_error');
		}
		
		m_display($root);
	}
}
?>