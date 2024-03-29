<?php
// +----------------------------------------------------------------------
// | 美寻购物分享网站系统 (Build on ThinkPHP)
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://meixun.cc All rights reserved.
// +----------------------------------------------------------------------

/**
 * user.service.php
 *
 * 会员服务类
 *
 * @package service
 * @author awfigq <awfigq@qq.com>
 */
class UserService
{
	public function init($user)
	{
		global $_FANWE;
		$last_login_day = (int)$_FANWE['cookie']['last_login_day_'.$_FANWE['uid']];
		
		//系统信息
		FS('Message')->sysMsgInit($user['uid'],$user['gid']);
		//提示
		UserService::getUserTips($user['uid']);
		
		$today_time = getTodayTime();
		if($last_login_day < $today_time)
		{
			FS('Statistics')->updateUserStatistics($user['uid']);
			UserService::medalBehavior($user['uid'],'continue_login');			
		}
		fSetCookie('last_login_day_'.$_FANWE['uid'],$today_time,86400 * 30);
	}
	
	/**
	 * 写入会员session
	 * @param array $user 会员信息
	 * @param int $life 过期时间
	 * @return bool
	 */
	public function setSession($user,$life = 0)
	{
		fSetCookie('bind_user_info','',-1);
		fSetCookie('auth', authcode("$user[password]\t$user[uid]", 'ENCODE'), $life);
		fSetCookie('uid',$user['uid'], $life);
	}

	/**
	 * 清除会员session
	 * @return bool
	 */
	public function clearSession()
	{
		fSetCookie('auth','');
	}

	public function createUser($user,$is_md5 = true)
	{
		global $_FANWE;
		$user['password'] = $is_md5 ? md5($user['password']) : $user['password'];
		$user['status'] = 1;
		$user['email_status'] = 0;
		$user['avatar'] = 0;
		$user['gid'] = 7;
		$user['reg_time'] = TIME_UTC;

		$uid = FDB::insert('user',$user,true);
		if($uid > 0)
		{
			FDB::insert('user_count',array('uid' => $uid));
			
			if($user['invite_id'] > 0)
				FS('User')->insertReferral($uid,$user['invite_id'],$user['user_name']);
			
			FS("User")->updateUserScore($uid,'user','register');
			
			$user_match = array(
				'uid' => $uid,
				'user_name' => FS("Words")->segmentToUnicode($user['user_name']),
			);
			FDB::insert('user_match',$user_match);
			unset($user_match);

			$user_profile = array(
				'uid' => $uid,
				'gender' => $data['gender'],
			);
			FDB::insert('user_profile',$user_profile);
			unset($user_profile);

			$user_status = array(
				'uid' => $uid,
				'reg_ip' => $_FANWE['client_ip'],
				'last_ip' => $_FANWE['client_ip'],
				'last_time' => TIME_UTC,
				'last_activity' => TIME_UTC,
			);
			FDB::insert('user_status',$user_status);
			return $uid;
		}
		else
			return 0;
	}

	/**
	 * 获取会员是否已经存在
	 * @param string $email
	 * @return bool
	 */
	public function getUserExists($uid)
	{
		if(intval(FDB::resultFirst('SELECT COUNT(uid) FROM '.FDB::table('user')." WHERE uid = '$uid'")) > 0)
			return true;
		else
			return false;
	}
	
	/**
	 *  获取加入会员总数
	 */
	public function getUserstCount()
	{
		return FDB::resultFirst('SELECT COUNT(uid) FROM '.FDB::table('user'));
	}

	/**
	 * 获取email是否已经存在
	 * @param string $email
	 * @return bool
	 */
	public function getEmailExists($email)
	{
		if(intval(FDB::resultFirst('SELECT COUNT(uid) FROM '.FDB::table('user')." WHERE email = '$email'")) > 0)
			return true;
		else
			return false;
	}

	/**
	 * 获取会员名称是否已经存在
	 * @param string $user_name 会员名称
	 * @return bool
	 */
	public function getUserNameExists($user_name)
	{
		if(intval(FDB::resultFirst('SELECT COUNT(uid) FROM '.FDB::table('user')." WHERE user_name = '$user_name'")) > 0)
			return true;
		else
			return false;
	}

	/**
	 * 根据会员编号获取会员缓存信息
	 * @param int $uid 会员编号
	 * @return array
	 */
	public function getUserCache($uid)
	{
		$uid = (int)$uid;
		if(!$uid)
			return array();
		
		static $list = array();
		if(!isset($list[$uid]))
		{
			$list[$uid] = FDB::fetchFirst("SELECT u.*, up.* FROM ".FDB::table('user')." u
				LEFT JOIN ".FDB::table('user_profile')." up USING(uid)
				WHERE u.uid='$uid'");
			$list[$uid]['url'] = FU('u/index',array('uid'=>$uid));
		}
		return $list[$uid];
	}

	/**
	 * 根据会员名称获取会员列表
	 * @param array $user_names 名称数组
	 * @return array
	 */
	public function getUsersByName($user_names)
	{
		if(is_array($user_names))
		{
			return FDB::fetchAll('SELECT uid,user_name
				FROM '.FDB::table('user').'
				WHERE user_name '.FDB::createIN($user_names));
		}
		else
		{
			return FDB::fetchFirst('SELECT uid,user_name
				FROM '.FDB::table('user')."
				WHERE user_name = '$user_names'");
		}
	}

	/**
	 * 删除会员缓存信息
	 * @param int $uid 会员编号
	 * @return void
	 */
	public function deleteUserCache($uid)
	{
		$key = 'user/'.getDirsById($uid).'/info';
		deleteCache($key);
	}

	/**
	 * 根据会员编号获取会员信息
	 * @param int $uid 会员编号
	 * @return array
	 */
	public function getUserById($uid,$is_static = true,$is_cache = false)
	{
		static $users = array();
		if(empty($users[$uid]) || !$is_static)
		{
			$users[$uid] = FDB::fetchFirst("SELECT u.*, uc.*, us.*, up.* FROM ".FDB::table('user')." u
				LEFT JOIN ".FDB::table('user_count')." uc USING(uid)
				LEFT JOIN ".FDB::table('user_status')." us USING(uid)
				LEFT JOIN ".FDB::table('user_profile')." up USING(uid)
				WHERE u.uid='$uid'");

			if(!$is_cache)
				unset($users[$uid]['cache_data']);
		}
		return $users[$uid];
	}

	/**
	 * 根据会员名称搜索会员
	 * @param string $key 搜索关键字
	 * @return array
	 */
	public function getUserByName($key,$limit)
	{
		$list = array();
		$key = FS("Words")->segmentToUnicode($key,'+');
		if(empty($key))
			return $list;

		$res = FDB::query('SELECT u.uid,u.user_name,u.is_daren,u.avatar 
			FROM '.FDB::table('user_match').' AS um 
			INNER JOIN '.FDB::table('user').' AS u ON u.uid = um.uid 
			WHERE MATCH (um.user_name) AGAINST (\''.$key.'\' IN BOOLEAN MODE) '.$limit);
		while($data = FDB::fetch($res))
		{
			$list[] = $data;
		}
		return $list;
	}

	/**
	 * 获取包括会员名称关键字的会员数量
	 * @param string $key 搜索关键字
	 * @return array
	 */
	public function getUserCountByName($key)
	{
		$key = FS("Words")->segmentToUnicode($key,'+');
		if(empty($key))
			return 0;

		return FDB::resultFirst('SELECT COUNT(uid) FROM '.FDB::table('user_match').'
			WHERE MATCH (user_name) AGAINST (\''.$key.'\' IN BOOLEAN MODE)');
	}

	/**
	 * 获取登陆会员关注的会员编号集合
	 * @return array(1,2,...)
	 */
	public function getUserFollowsCache($uid)
	{
		global $_FANWE;

		$key = 'user/'.getDirsById($uid).'/follows';
		$data = getCache($key);
		if($data === NULL)
		{
			$data = array();
			$res = FDB::query('SELECT uid
				FROM '.FDB::table('user_follow').'
				WHERE f_uid = '.$uid);
			while($user = FDB::fetch($res))
			{
				$data[$user['uid']] = 1;
			}
			setCache($key,$data);
		}

		return $data;
	}

	/**
	 * 更新登陆会员关注的会员编号缓存
	 */
	public function updateUserFollowsCache($f_uid,$uid,$type='add')
	{
		global $_FANWE;
		$uids = UserService::getUserFollowsCache($f_uid);
		switch($type)
		{
			case 'add':
				$uids[$uid] = 1;
			break;

			case 'delete':
				unset($uids[$uid]);
			break;
		}
		setCache('user/'.getDirsById($f_uid).'/follows',$uids);
	}

	/**
	 * 获取登陆会员是否已关注此会员编号
	 * @param int $uid 会员编号
	 * @return bool
	 */
	public function getIsFollowUId($uid)
	{
		global $_FANWE;
		static $follows = array();
		if($_FANWE['uid'] == 0)
			return false;

		if(!isset($follows[$uid]))
		{
			$uids = UserService::getUserFollowsCache($_FANWE['uid']);
			if(isset($uids[$uid]))
				$follows[$uid] = true;
			else
				$follows[$uid] = false;
		}
		return $follows[$uid];
	}

	/**
	 * 获取登陆会员是否已关注此会员编号
	 * @param int $uid 会员编号
	 * @return bool
	 */
	public function getIsFollowUId2($fuid,$uid)
	{
		static $follows = array();
		if(!isset($follows[$uid]))
		{
			$uids = UserService::getUserFollowsCache($fuid);
			if(isset($uids[$uid]))
				$follows[$uid] = true;
			else
				$follows[$uid] = false;
		}
		return $follows[$uid];
	}

	/**
	 * 关注会员
	 如果已经关注此会员，则删除关注，返回false
	 如果没有关注此会员，则添加关注，返回true
	 * @param int $uid 会员编号
	 * @return bool
	 */
	public function followUser($uid)
	{
		global $_FANWE;
		if($_FANWE['uid'] == 0 || $_FANWE['uid'] == $uid)
			return false;

		if(UserService::getIsFollowUId($uid))
		{
			FDB::query('DELETE FROM '.FDB::table('user_follow').' WHERE f_uid = '.$_FANWE['uid'].' AND uid = '.$uid);
			FDB::query('UPDATE '.FDB::table('user_count').' SET follows = follows - 1 WHERE uid = '.$_FANWE['uid']);
			FDB::query('UPDATE '.FDB::table('user_count').' SET fans = fans - 1 WHERE uid = '.$uid);
			FS('Medal')->runAuto($uid,'fans');
			UserService::updateUserFollowsCache($_FANWE['uid'],$uid,'delete');
			//添加关注消息提示
			$result = FDB::query("INSERT INTO ".FDB::table('user_notice')."(uid, type, num, create_time) VALUES('$uid',1,1,'".TIME_UTC."')", 'SILENT');
			if(!$result)
				FDB::query("UPDATE ".FDB::table('user_notice')." SET num = num + 1, create_time='".TIME_UTC."' WHERE uid='$uid' AND type=1");
			
			return false;
		}
		else
		{
			FDB::query('INSERT INTO '.FDB::table('user_follow').'(f_uid,uid,create_time) VALUES ('.$_FANWE['uid'].','.$uid.','.TIME_UTC.')');
			FDB::query('UPDATE '.FDB::table('user_count').' SET follows = follows + 1 WHERE uid = '.$_FANWE['uid']);
			FDB::query('UPDATE '.FDB::table('user_count').' SET fans = fans + 1 WHERE uid = '.$uid);
			FS('Medal')->runAuto($uid,'fans');
			UserService::updateUserFollowsCache($_FANWE['uid'],$uid,'add');
			return true;
		}
	}

	
	public function followMall($mid)
	{
		global $_FANWE;
		error_log('[user.service]followMall------begin.',0);
		//if($_FANWE['uid'] == 0 || $_FANWE['uid'] == $uid)
		if($_FANWE['uid'] == 0 )
			return false;

		//if(UserService::getIsFollowUId($uid))
		if(false)
		{
			FDB::query('DELETE FROM '.FDB::table('user_follow').' WHERE f_uid = '.$_FANWE['uid'].' AND uid = '.$uid);
			FDB::query('UPDATE '.FDB::table('user_count').' SET follows = follows - 1 WHERE uid = '.$_FANWE['uid']);
			FDB::query('UPDATE '.FDB::table('user_count').' SET fans = fans - 1 WHERE uid = '.$uid);
			FS('Medal')->runAuto($uid,'fans');
			UserService::updateUserFollowsCache($_FANWE['uid'],$uid,'delete');
			//添加关注消息提示
			$result = FDB::query("INSERT INTO ".FDB::table('user_notice')."(uid, type, num, create_time) VALUES('$uid',1,1,'".TIME_UTC."')", 'SILENT');
			if(!$result)
				FDB::query("UPDATE ".FDB::table('user_notice')." SET num = num + 1, create_time='".TIME_UTC."' WHERE uid='$uid' AND type=1");
			
			return false;
		}
		else
		{
			error_log('[user.service]the mid is:'.$mid,0);
			$sqlstr = 'INSERT INTO '.FDB::table('user_follow2').'(f_uid,mid,ftype,create_time) VALUES ('.$_FANWE['uid'].','.$mid.',\'mall\','.TIME_UTC.')';
			error_log('[user.service]the sqlstr is:'.$sqlstr,0);
			FDB::query($sqlstr);
			/*FDB::query('UPDATE '.FDB::table('user_count').' SET follows = follows + 1 WHERE uid = '.$_FANWE['uid']);
			FDB::query('UPDATE '.FDB::table('user_count').' SET fans = fans + 1 WHERE uid = '.$uid);
			FS('Medal')->runAuto($uid,'fans');
			UserService::updateUserFollowsCache($_FANWE['uid'],$uid,'add');*/
			
			
			FDB::query('UPDATE meixun_mall SET fensi = fensi + 1 WHERE mall_id = '.$mid);
			return true;
		}
	}
	
	
	public function followBrand($bid)
	{
		global $_FANWE;
		error_log('[user.service]followBrand------begin.',0);
		if($_FANWE['uid'] == 0 )
			return false;

		//if(UserService::getIsFollowUId($uid))
		if(false)
		{
			FDB::query('DELETE FROM '.FDB::table('user_follow').' WHERE f_uid = '.$_FANWE['uid'].' AND uid = '.$uid);
			FDB::query('UPDATE '.FDB::table('user_count').' SET follows = follows - 1 WHERE uid = '.$_FANWE['uid']);
			FDB::query('UPDATE '.FDB::table('user_count').' SET fans = fans - 1 WHERE uid = '.$uid);
			FS('Medal')->runAuto($uid,'fans');
			UserService::updateUserFollowsCache($_FANWE['uid'],$uid,'delete');
			//添加关注消息提示
			$result = FDB::query("INSERT INTO ".FDB::table('user_notice')."(uid, type, num, create_time) VALUES('$uid',1,1,'".TIME_UTC."')", 'SILENT');
			if(!$result)
				FDB::query("UPDATE ".FDB::table('user_notice')." SET num = num + 1, create_time='".TIME_UTC."' WHERE uid='$uid' AND type=1");
			
			return false;
		}
		else
		{
			error_log('[user.service]followBrand--->the bid is:'.$bid,0);
			$sqlstr = 'INSERT INTO '.FDB::table('user_follow2').'(f_uid,bid,ftype,create_time) VALUES ('.$_FANWE['uid'].','.$bid.',\'brand\','.TIME_UTC.')';
			error_log('[user.service]followBrand--->the sqlstr is:'.$sqlstr,0);
			FDB::query($sqlstr);
			/*FDB::query('UPDATE '.FDB::table('user_count').' SET follows = follows + 1 WHERE uid = '.$_FANWE['uid']);
			FDB::query('UPDATE '.FDB::table('user_count').' SET fans = fans + 1 WHERE uid = '.$uid);
			FS('Medal')->runAuto($uid,'fans');
			UserService::updateUserFollowsCache($_FANWE['uid'],$uid,'add');*/
			
			FDB::query('UPDATE meixun_brand SET fensi = fensi + 1 WHERE bid = '.$bid);
			return true;
		}
	}
	
	public function followRes($rid)
	{
		global $_FANWE;
		error_log('[user.service]followRes------begin.',0);
		if($_FANWE['uid'] == 0 )
			return false;

		//if(UserService::getIsFollowUId($uid))
		if(false)
		{
			FDB::query('DELETE FROM '.FDB::table('user_follow').' WHERE f_uid = '.$_FANWE['uid'].' AND uid = '.$uid);
			FDB::query('UPDATE '.FDB::table('user_count').' SET follows = follows - 1 WHERE uid = '.$_FANWE['uid']);
			FDB::query('UPDATE '.FDB::table('user_count').' SET fans = fans - 1 WHERE uid = '.$uid);
			FS('Medal')->runAuto($uid,'fans');
			UserService::updateUserFollowsCache($_FANWE['uid'],$uid,'delete');
			//添加关注消息提示
			$result = FDB::query("INSERT INTO ".FDB::table('user_notice')."(uid, type, num, create_time) VALUES('$uid',1,1,'".TIME_UTC."')", 'SILENT');
			if(!$result)
				FDB::query("UPDATE ".FDB::table('user_notice')." SET num = num + 1, create_time='".TIME_UTC."' WHERE uid='$uid' AND type=1");
			
			return false;
		}
		else
		{
			error_log('[user.service]followRes--->the rid is:'.$rid,0);
			$sqlstr = 'INSERT INTO '.FDB::table('user_follow2').'(f_uid,rid,ftype,create_time) VALUES ('.$_FANWE['uid'].','.$rid.',\'res\','.TIME_UTC.')';
			error_log('[user.service]followRes--->the sqlstr is:'.$sqlstr,0);
			FDB::query($sqlstr);
			/*FDB::query('UPDATE '.FDB::table('user_count').' SET follows = follows + 1 WHERE uid = '.$_FANWE['uid']);
			FDB::query('UPDATE '.FDB::table('user_count').' SET fans = fans + 1 WHERE uid = '.$uid);
			FS('Medal')->runAuto($uid,'fans');
			UserService::updateUserFollowsCache($_FANWE['uid'],$uid,'add');*/
			
			FDB::query('UPDATE meixun_restaurant SET fensi = fensi + 1 WHERE id = '.$rid);
			return true;
		}
	}
	
	/* 获得用户关注的mall列表 */
	public function getusermalls($uid)
	{
		$uid = (int)$uid;
		$mall_list = array();
		
		$res = FDB::query("SELECT mid FROM ".FDB::table('user_follow2').' 
			WHERE ftype=\'mall\' and f_uid = '.$uid);
		
		while($data = FDB::fetch($res))
		{
			$mall_list[$data['mid']] = $data;
		}
		
		return $mall_list;
	}
	
	/* 获得用户关注的brand列表 */
	public function getuserbrands($uid)
	{
		$uid = (int)$uid;
		$mall_list = array();
		
		$res = FDB::query("SELECT bid FROM ".FDB::table('user_follow2').' 
			WHERE ftype=\'brand\' and f_uid = '.$uid);
		
		while($data = FDB::fetch($res))
		{
			$mall_list[$data['bid']] = $data;
		}
		
		return $mall_list;
	}
	
	/* 获得用户关注的res列表 */
	public function getuserress($uid)
	{
		$uid = (int)$uid;
		$mall_list = array();
		
		$res = FDB::query("SELECT rid FROM ".FDB::table('user_follow2').' 
			WHERE ftype=\'res\' and f_uid = '.$uid);
		
		while($data = FDB::fetch($res))
		{
			$mall_list[$data['rid']] = $data;
		}
		
		return $mall_list;
	}
	
	/**
	 * 删除会员的粉丝
	 * @param int $uid 会员编号
	 * @return bool
	 */
	public function removeFans($uid)
	{
		global $_FANWE;
		if(FDB::query('DELETE FROM '.FDB::table('user_follow').' WHERE f_uid = '.$uid.' AND uid = '.$_FANWE['uid']))
		{
			FDB::query('UPDATE '.FDB::table('user_count').' SET follows = follows - 1 WHERE uid = '.$uid);
			FDB::query('UPDATE '.FDB::table('user_count').' SET fans = fans - 1 WHERE uid = '.$_FANWE['uid']);
			deleteCache('user/'.getDirsById($uid).'/follows');
			return true;
		}
		else
			return false;
	}

	/**
	 * 获取会员关注的会员
	 * @param int $uid 会员编号
	 * @return array
	 */
	public function getUserFollows($uid,$num = 9)
	{
		$uids = UserService::getUserFollowsCache($uid);
		$uids = array_rand($uids,$num);

		$list = array();
		if(count($uids) > 0)
		{
			$res = FDB::query('SELECT uid,user_name,avatar 
				FROM '.FDB::table('user').'
				WHERE uid IN ('.implode(',',$uids).')');
			while($user = FDB::fetch($res))
			{
				$list[$user['uid']] = $user;
			}
			return $list;
		}
		else
			return array();
	}

	/**
	 * 获取会员的粉丝
	 * @param int $uid 会员编号
	 * @return array
	 */
	public function getUserFans($uid,$num = 9)
	{
		static $users = array();
		if(!isset($users[$uid][$num]))
		{
			$users[$uid][$num] = FDB::fetchAll('SELECT u.uid,u.user_name,u.avatar 
				FROM '.FDB::table('user_follow').' AS uf
				INNER JOIN '.FDB::table('user').' AS u ON u.uid = uf.f_uid
				WHERE uf.uid = '.$uid.' LIMIT 0,'.$num);
		}

		return $users[$uid][$num];
	}
	
	/**
	 * 获取会员是否关注这些会员
	 * @param int $uid 会员编号
	 * @return array
	 */
	public function getUserIsFollows($uid,&$user_list)
	{
		$uid = (int)$uid;
		if(!$uid)
			return;
		
		$uids = array_keys($user_list);
		if(count($uids) > 0)
		{	
			$res = FDB::query("SELECT uid FROM ".FDB::table('user_follow').' 
				WHERE f_uid = '.$uid.' AND uid IN ('.implode(',',$uids).')');
			while($item = FDB::fetch($res))
			{
				$user_list[$item['uid']] = true;
			}
		}
		return $user_list;
	}

	/**
	 * 获取谁最喜欢会员
	 * @param int $uid 会员编号
	 * @return array
	 */
	public function getBestFavUsers($uid,$num = 9)
	{
		static $users = array();
		if(!isset($users[$uid][$num]))
		{
			$users[$uid][$num] = FDB::fetchAll('SELECT u.uid,u.user_name,u.avatar,COUNT(uc.c_uid) ucount
				FROM '.FDB::table('user_collect').' AS uc
				INNER JOIN '.FDB::table('user').' AS u ON u.uid = uc.c_uid
				WHERE uc.uid = '.$uid.' GROUP BY uc.c_uid ORDER BY ucount DESC LIMIT 0,'.$num);
		}

		return $users[$uid][$num];
	}

	/**
	 * 获取会员最喜欢谁
	 * @param int $uid 会员编号
	 * @return array
	 */
	public function getUserBestFavs($uid,$num = 9)
	{
		static $users = array();
		if(!isset($users[$uid][$num]))
		{
			$users[$uid][$num] = FDB::fetchAll('SELECT u.uid,u.user_name,u.avatar,COUNT(uc.uid) ucount
				FROM '.FDB::table('user_collect').' AS uc
				INNER JOIN '.FDB::table('user').' AS u ON u.uid = uc.uid
				WHERE uc.c_uid = '.$uid.' GROUP BY uc.uid ORDER BY ucount DESC LIMIT 0,'.$num);
		}

		return $users[$uid][$num];
	}

	/**
	 * 获取会员的标签
	 * @param int $uid 会员编号
	 * @return array
	 */
	public function getUserTags($uid)
	{
		$user_tags = getCache('user/'.$uid.'/usertags');
		if($user_tags === NULL)
		{
			$user_tags = array();
			$res = FDB::query('SELECT tag_name FROM '.FDB::table('user_me_tags').' WHERE uid = '.$uid);
			while($data = FDB::fetch($res))
			{
				$user_tags[] = $data['tag_name'];
			}

			setCache('user/'.$uid.'/usertags',$user_tags);
		}

		return $user_tags;
	}

	/**
	 * 更新会员的标签
	 * @param int $uid 会员编号
	 * @param array $tags 会员标签
	 * @return array
	 */
	public function updateUserTags($uid,$tags)
	{
		FDB::query('DELETE FROM '.FDB::table('user_me_tags').' WHERE uid = '.$uid);

		$sql = '';
		$jg = '';
		foreach($tags as $tag)
		{
			$sql .= $jg.'('.$uid.',\''.$tag.'\',\''.segmentToUnicode($tag).'\')';
		}

		if($sql != '')
		{
			FDB::query('INSERT INTO '.FDB::table('user_me_tags').' VALUES '.$sql);
		}

		setCache('user/'.$uid.'/usertags',$tags);
	}

	/**
	 * 获取会员感兴趣的会员
	 * @param int $uid 会员编号
	 * @return array
	 */
	public function getInterestUser($uid,$num=9)
	{
		$users = array();
		$uids = array();
		$res = FDB::query('SELECT u.uid,u.user_name,u.avatar,RAND() AS sort
			FROM (SELECT id,uid FROM '.FDB::table('user_daren').' WHERE uid <> '.$uid.' ORDER BY id DESC LIMIT 0,3000) AS ud
			STRAIGHT_JOIN '.FDB::table('user').' AS u ON u.uid = ud.uid
			STRAIGHT_JOIN '.FDB::table('user_profile').' AS uf ON uf.uid = ud.uid
			ORDER BY sort ASC LIMIT 0,'.$num);
		while($data = FDB::fetch($res))
		{
			$uids[] = $data['uid'];
			$users[] = $data;
		}

		if(count($uids) < $num)
		{
			$where = '';
			$num = $num - count($uids);
			$uids[] = $uid;
			$where = 'WHERE uid NOT IN ('.implode(',',$uids).')';

			$res = FDB::query('SELECT u.uid,u.user_name,u.avatar,RAND() AS sort
				FROM (SELECT uid,user_name FROM '.FDB::table('user').' '.$where.' ORDER BY uid DESC LIMIT 0,3000) AS u
				STRAIGHT_JOIN '.FDB::table('user_profile').' AS uf ON uf.uid = u.uid
				ORDER BY sort ASC LIMIT 0,'.$num);
			while($data = FDB::fetch($res))
			{
				$users[] = $data;
			}
		}

		return $users;
	}
	
	public function getAvatar($uid)
	{
		$uid = (int)$uid;
		if($uid == 0)
			return 0;
		
		return (int)FDB::resultFirst('SELECT avatar FROM '.FDB::table('user').' WHERE uid = '.$uid);
	}

	public function saveAvatar($uid,$path)
	{
		$img = array();
		$img['type'] = 'avatar';
		$img['src'] = $path;
		$img = FS('Image')->addImage($img);
		UserService::updateAvatar($uid,$img['id']);
		@unlink($path);
	}

	public function updateAvatar($uid,$img_id)
	{
		$uid = (int)$uid;
		$img_id = (int)$img_id;
		if(!$uid)
			return;
		
		$avatar = UserService::getAvatar($uid);
		if($avatar == 0)
			UserService::updateUserScore($uid,'user','avatar');
		
		FDB::query('UPDATE '.FDB::table('user').' SET avatar = '.$img_id.' WHERE uid='.$uid);
	}

	/**
	 * 获取会员前台权限
	 * @param int $uid 会员编号
	 * @return array
	 */
	public function getAuthoritys($uid)
	{
		$list = array();
		$res = FDB::query('SELECT module,action
			FROM '.FDB::table('user_authority').'
			WHERE uid = '.$uid.' ORDER BY sort ASC');
		while($data = FDB::fetch($res))
		{
			$list[$data['module']][$data['action']] = 1;
		}
		return $list;
	}

	/**
	 * 获取会员显示名称
	 * @param int $uid 会员编号
	 * @return array
	 */
	public function getUserShowName($uid)
	{
		global $_FANWE;
		$names = array();
		$user = UserService::getUserCache($uid);
		$names['name'] = $user['user_name'];
		if($uid == $_FANWE['uid'])
			$names['short'] = lang('user','me');
		else
		{
			if($user['gender'] == 0)
				$names['short'] = lang('user','ta_0');
			else
				$names['short'] = lang('user','ta_1');
		}
		return $names;
	}
	
	public function updateNotice($uid,$type,$num = 1)
	{
		$uid = (int)$uid;
		$num = (int)$num;
		$type = (int)$type;
		
		if(!$uid || !$num)
			return;
		
		$result = FDB::query("INSERT INTO ".FDB::table('user_notice')."(uid, type, num, create_time) VALUES('$uid',$type,$num,'".TIME_UTC."')", 'SILENT');
		if(!$result)
			FDB::query("UPDATE ".FDB::table('user_notice')." SET num = num + $num, create_time='".TIME_UTC."' WHERE uid='$uid' AND type=$type");
	}

    /**
	 * 获取最新加入会员
	 * @return array
	 */
	public function getNewUsers($num)
	{
		$sql = 'SELECT uid,user_name,avatar 
			FROM '.FDB::table('user').'
			ORDER BY uid DESC LIMIT 0,'.$num;
		return FDB::fetchAll($sql);
	}
	
	/**
	 * 获取会员最新提示信息
	 * @return array
	 */
	public function getUserTips($uid)
	{
		global $_FANWE;
		$res = FDB::query('SELECT * 
			FROM '.FDB::table('user_notice').' 
			WHERE uid = '.$uid);
		$_FANWE['user_notice']['all'] = 0;
		while($data = FDB::fetch($res))
		{
			$_FANWE['user_notice'][$data['type']] = $data['num'];
			$_FANWE['user_notice']['all'] += $data['num'];
		}
	}
	
	/**
	 * 添加会员最新提示信息 1:关注，2:喜欢，3:评论，4:提到，5:信件，6:通知
	 * @return array
	 */
	public function setUserTips($uid,$type,$share_id = 0)
	{
		$uid = (int)$uid;
		$type = (int)$type;
		if(!$uid || !$type)
			return;
		
		if($type == 4)
		{
			$share_id = (int)$share_id;
			if(!$share_id)
				return;
			
			FDB::query("INSERT INTO ".FDB::table('atme')."(uid,share_id) VALUES($uid,$share_id)", 'SILENT');	
		}
		
		$result = FDB::query("INSERT INTO ".FDB::table('user_notice')."(uid, type, num, create_time) VALUES($uid,$type,1,'".TIME_UTC."')", 'SILENT');
		if(!$result)
			FDB::query("UPDATE ".FDB::table('user_notice')." SET num = num + 1, create_time='".TIME_UTC."' 
				WHERE uid=$uid AND type = $type");
	}
	
	/**
	 * 根据编号数组获取会员信息
	 * @return array
	 */
	public function usersFormat(&$uid_list)
	{
		static $users = array();
		$uids = array_keys($uid_list);
		if(count($uids) > 0)
		{
			$static_ids = array_keys($users);
			$intersects = array_intersect($static_ids,$uids);
			$temp_ids = array();
			foreach($intersects as $uid)
			{
				$temp_ids[] = $uid;
				$uid_list[$uid] = $users[$uid];
			}
			
			$diffs = array_diff($uids,$temp_ids);
			unset($temp_ids);
			if(count($diffs) > 0)
			{
				$diffs[] = 0;
				$diffs = implode(',',$diffs);
				$diffs = str_replace(',,',',',$diffs);
				if(!empty($diffs))
				{
					$res = FDB::query("SELECT uid,user_name,avatar,reg_time,uc.* FROM ".FDB::table('user').' 
						INNER JOIN '.FDB::table('user_count').' uc USING(uid) 
						WHERE uid IN ('.$diffs.')');
					while($item = FDB::fetch($res))
					{
						$item['url'] = FU('u/index',array('uid'=>$item['uid']));
						$users[$item['uid']] = $item;
						$uid_list[$item['uid']] = $item;
					}
				}
			}
		}
		return $uid_list;
	}
	
	public function getUserMedal($uid)
	{
		global $_FANWE;
		$list = array();
		$uid = (int)$uid;
		if(!$uid)
			return $list;
			
		$list = array();
		FanweService::instance()->cache->loadCache('medals');
		$medals = FS('Medal')->getAwardsByUid($uid);
		foreach($medals as $medal)
		{
			$list[] = $_FANWE['cache']['medals']['all'][$medal['mid']];
		}
		return $list;
	}
	
	public function medalBehavior($uid,$type,$last_time=false)
	{
		global $_FANWE;
		if($_FANWE['setting']['user_is_medal'] == 0)
			return false;
		
		$today_time = getTodayTime();
		if ($last_time && $last_time > $today_time)
			return false;
		
		list($num,$change) = FS('Statistics')->add($uid,$type,$last_time);
		if ($num === false)
			return false;
			
		if ($change == 0 && $type != 'continue_login')
			return false;
		
		if($type == 'continue_login' && $change != 0)
			UserService::updateUserScore($uid,'user','login');
		
		FS('Medal')->runAuto($uid,$type,$num,$change);
	}
	
	public function insertReferral($uid,$rid,$user_name)
	{
		global $_FANWE;
		$rid = (int)$rid;
		if($rid > 0)
		{
			$referrals['uid'] = $uid;
			$referrals['rid'] = $rid;
			$referrals['score'] = (int)$_FANWE['setting']['user_referral_score'];
			$referrals['is_pay'] = 1;
			$referrals['create_time'] = TIME_UTC;
			$referrals['create_day'] = getTodayTime();
			$rec_id = FDB::insert('referrals',$referrals,true);

			if($rec_id > 0)
			{
				UserService::updateUserScore($rid,"user","referral",$user_name,$rec_id);
				fSetCookie('referrals_uid','');
				FDB::query("update ".FDB::table("user_count")." set referrals = referrals + 1 where uid = ".$rid);
				FS('Medal')->runAuto($rid,'referrals');
				UserService::followUser($rid);
			}
		}
	}
	
	public function setReferrals()
	{
		global $_FANWE;
		if (!empty($_FANWE['request']['invite']))
		{
			$parent_id = (int)$_FANWE['request']['invite'];
			if($parent_id > 0)
				fSetCookie('referrals_uid', authcode($parent_id, 'ENCODE'),604800);
		}
	}

	public function getReferrals()
	{
		global $_FANWE;
		if($_FANWE['cookie']['referrals_uid'])
		{
			$uid = (int)authcode($_FANWE['cookie']['referrals_uid'], 'DECODE');
			if ($uid > 0)
			{
				if (FDB::resultFirst('SELECT COUNT(uid) FROM '.FDB::table('user').' WHERE uid = '.$uid) > 0)
					return $uid;
				else
					fSetCookie('referrals_uid',0,-1);
			}
		}
		return 0;
	}
	
	public function getUserBindList($uid)
	{
		$uid = (int)$uid;
		if(!$uid)
			return false;
		
		static $binds = array();
		if(!isset($binds[$uid]))
		{
			$res = FDB::query('SELECT * FROM '.FDB::table('user_bind').' WHERE uid = '.$uid);
			while($data = FDB::fetch($res))
			{
				$bind = fStripslashes(unserialize($data['info']));
				$bind['keyid'] = $data['keyid'];
				$bind['uid'] = $data['uid'];
				$bind['sync'] = unserialize($data['sync']);
				$binds[$uid][$data['type']] = $bind;
			}
		}
		return $binds[$uid];
	}
	
	public function getUserBindByType($uid,$type)
	{
		$uid = (int)$uid;
		if(!$uid || !$type)
			return false;
			
		$binds = UserService::getUserBindList($uid);
		if($binds && isset($binds[$type]))
			return $binds[$type];
		else
			return false;
	}
	
	public function getUserWeiBoFollowers($uid)
	{
		$uid = (int)$uid;
		if(!$uid)
			return false;
		
		$binds = UserService::getUserBindList($uid);
		if($binds)
		{
			foreach($binds as $type => $bind)
			{
				include fimport('class/'.$type,'user');
				$type = ucfirst($type).'User';
				$weibo = new $type();
				$followers = $weibo->getFollowers($uid);
			}
		}
	}
	
	public function getUserTodayScore($uid)
	{
		$uid = (int)$uid;
		$statistic = FDB::fetchFirst('SELECT * FROM '.FDB::table('user_statistics').' WHERE uid = '.$uid.' AND type = 7');
		if (!$statistic)
			return 0;
		else
		{
			$today_time = getTodayTime();
			if ($statistic['last_time'] < $today_time)
				return 0;
			else
				return $statistic['num'];
		}
	}
	
	public function updateUserTodayScore($uid,$score)
	{
		$uid = (int)$uid;
		$score = (int)$score;
		
		$statistic = FDB::fetchFirst('SELECT * FROM '.FDB::table('user_statistics').' WHERE uid = '.$uid.' AND type = 7');
		$today_time = getTodayTime();
		if (!$statistic)
		{
			$data['uid'] = $uid;
			$data['num'] = $score;
			$data['last_time'] = $today_time;
			$data['type'] = 7;
			FDB::insert('user_statistics',$data);
		}
		else
		{
			$data['last_time'] = $today_time;
			if ($statistic['last_time'] < $today_time)
				$data['num'] = $score;
			else
				$data['num'] = (int)$statistic['num'] + $score;
			
			FDB::update('user_statistics',$data,'uid = '.$uid.' AND type = 7');
		}
	}
	
	public function getUserScore($uid)
	{
		$uid = (int)$uid;
		if($uid > 0)
			return FDB::resultFirst('SELECT credits FROM '.FDB::table('user').' WHERE uid = '.$uid);
		else
			return -1;
	}
	
	public function updateUserScore($uid,$model,$action,$msg='',$rec_id = 0,$score = 0,$is_log = true)
	{
		global $_FANWE;
		$model = strtolower($model);
		$action = strtolower($action);
		$handle = $model."_".$action."_score";
		if($handle != "jifen_exchange_score" && $score == 0)
		{
			$score = (int)$_FANWE['setting'][$handle];
		}
		
		if(abs($score) > 0)
		{
			if($rec_id == 0)
				$rec_id = $uid;
			
			$setting_max_score = (int)$_FANWE['setting']['today_max_score'];
			$today_score = 0;
			if($score > 0 && $setting_max_score > 0)
			{
				$today_score = UserService::getUserTodayScore($uid);
				if($today_score > $setting_max_score)
				{
					$score = 0;
					$msg .= ' （超过每天最多积分'.$setting_max_score.'限定）';
				}
			}
			
			$is_update = true;
			$is_update = FDB::query("UPDATE ".FDB::table('user')." SET credits = credits + ".intval($score)." WHERE uid = $uid", 'UNBUFFERED');
			if($is_update !== false)
			{
				if($is_log)
				{
					$log['uid'] = $uid;
					$log['score'] = $score;
					$log['create_time'] = TIME_UTC;
					$log['create_day'] = getTodayTime();
					$log['content'] = lang('user',$handle);
					if(!empty($msg))
						$log['content'] .= '　'.$msg;
					
					$log['rec_id'] = $rec_id;
					$log['rec_module'] = $model;
					$log['rec_action'] = $action;
					FDB::insert('user_score_log',$log);
				}
				
				if($score > 0 && $setting_max_score > 0)
				{
					UserService::updateUserTodayScore($uid,$score);
				}
				
				if($score < 0)
					FDB::query("UPDATE ".FDB::table('user')." SET credits = 0 WHERE uid = $uid AND credits < 0");
			}
			else
				return false;
		}
		return true;
	}

	public function getUserMoney($uid)
	{
		$uid = (int)$uid;
		if($uid > 0)
			return (float)FDB::resultFirst('SELECT money FROM '.FDB::table('user').' WHERE uid = '.$uid);
		else
			return -1;
	}
	
	public function updateUserMoney($uid,$model,$action,$msg='',$rec_id = 0,$money = 0,$is_log = true)
	{
		global $_FANWE;
		$model = strtolower($model);
		$action = strtolower($action);
		$handle = $model."_".$action."_money";

		if(abs($money) > 0)
		{
			if($rec_id == 0)
				$rec_id = $uid;
			
			$is_update = true;

			$is_update = FDB::query("UPDATE ".FDB::table('user')." SET money = money + ".(float)$money." WHERE uid = $uid", 'UNBUFFERED');
			if($is_update !== false)
			{
				if($is_log)
				{
					$log['uid'] = $uid;
					$log['money'] = $money;
					$log['create_time'] = TIME_UTC;
					$log['create_day'] = getTodayTime();
					$log['content'] = lang('user',$handle);
					if(!empty($msg))
						$log['content'] .= '　'.$msg;
					
					$log['rec_id'] = $rec_id;
					$log['rec_module'] = $model;
					$log['rec_action'] = $action;
					FDB::insert('user_money_log',$log);
				}
				
				if($money < 0)
					FDB::query("UPDATE ".FDB::table('user')." SET money = 0 WHERE uid = $uid AND money < 0");
			}
			else
				return false;
		}
		return true;
	}
	
	/**
	 * 更新会员等级
	 */
	public function updateUserLevel()
	{
		global $_FANWE;
		if($_FANWE['uid'] == 0)
			return;
			
		if((int)$_FANWE['user_group']['is_special'] == 1)
			return;
		
		$current_level_score = $_FANWE['user_group']['credits_higher'];
		if($_FANWE['user']['credits'] <= $_FANWE['user_group']['credits_higher'])
			return;
		
		$user_group_id = 0;
		foreach($_FANWE['cache']['user_group'] as $user_group)
		{
			if($user_group['is_special'] == 0)
			{
				if($_FANWE['user']['credits'] > $user_group['credits_lower'])
					$user_group_id = $user_group['gid'];
			}
		}
		
		if($user_group_id > 0)
		{
			$_FANWE['gid'] = $user_group_id;
			$_FANWE['user_group'] = $_FANWE['cache']['user_group'][$user_group_id];
			FDB::query('UPDATE '.FDB::table('user').' SET gid = '.$user_group_id.' WHERE uid = '.$_FANWE['uid']);
		}
	}
}
?>