<?php

class UModule
{
	public function me()
	{
	//error_log("[UModule]1111",0);
	
		global $_FANWE;
		Cache::getInstance()->loadCache('citys');
		$home_uid = $_FANWE['home_uid'];
		$home_user = FS('User')->getUserById($home_uid);

		$reside_province = $_FANWE['cache']['citys']['all'][$home_user['reside_province']]['name'];
		$reside_city = $_FANWE['cache']['citys']['all'][$home_user['reside_city']]['name'];

		$page_size = 30;

		$uids = array();
		$uids[] = $_FANWE['uid'];

	//error_log("[UModule]333",0);
	
		//获取我关注的会员编号
		$sql = 'SELECT uid
			FROM '.FDB::table('user_follow').'
			WHERE f_uid = '.$_FANWE['uid'];
		$res = FDB::query($sql);
		while($data = FDB::fetch($res))
		{
			$uids[] = (int)$data['uid'];
		}

		$is_all = false;

		$sql = 'SELECT COUNT(share_id)
			FROM '.FDB::table("share").'
			WHERE uid IN ('.implode(',',$uids).')';
		$count = FDB::resultFirst($sql);

	//error_log("[UModule]444",0);
	
		if($count == 0)
		{
			$max_count = $page_size * 5;
			$is_all = true;
			$sql = 'SELECT COUNT(share_id) FROM '.FDB::table("share");
			$count = FDB::resultFirst($sql);
			if($count > $max_count)
				$count = $max_count;
		}

		$pager = buildPage('u/'.ACTION_NAME,array(),$count,$_FANWE['page'],$page_size);

		if($is_all)
			$sql = 'SELECT *
				FROM '.FDB::table("share").'
				ORDER BY share_id DESC LIMIT '.$pager['limit'];
		else
			$sql = 'SELECT *
				FROM '.FDB::table("share").'
				WHERE uid IN ('.implode(',',$uids).')
				ORDER BY share_id DESC LIMIT '.$pager['limit'];

	//error_log("[UModule]555",0);
	//error_log("[UModule]sql is : ".$sql,0);
	
		$share_list = FDB::fetchAll($sql);
	//error_log("[UModule]666",0);
		$share_list = FS('Share')->getShareDetailList($share_list,true,true,true);

	//error_log("[UModule]777",0);
	
		$args = array('share_list'=>&$share_list,'pager'=>&$pager);
		$share_list_html = tplFetch("inc/u/me_share_list",$args);

		$hot_events = FS('Event')->getHotImgEvent(3);
		$today_daren = FS('Daren')->getIndexTodayDaren();

	//error_log("[UModule]222222",0);
		
		include template('page/u/u_me');
		display();
	}

	/* 发布方法。 */
	public function fb()
	{
		$current_menu = 'fb';
		//get the goods catgory list.
		$sqlme = 'select cate_id,parent_id,cate_name from meixun_goods_category where cate_id >1 and status=1 and parent_id=0 ORDER BY sort ASC,cate_id ASC';
		$cate_list = FDB::fetchAll($sqlme);

		global $_FANWE;
		Cache::getInstance()->loadCache('citys');
		$home_uid = $_FANWE['home_uid'];
		$home_user = FS('User')->getUserById($home_uid);

		$reside_province = $_FANWE['cache']['citys']['all'][$home_user['reside_province']]['name'];
		$reside_city = $_FANWE['cache']['citys']['all'][$home_user['reside_city']]['name'];

		$page_size = 30;

		$uids = array();
		$uids[] = $_FANWE['uid'];

		//获取我关注的会员编号
		$sql = 'SELECT uid
			FROM '.FDB::table('user_follow').'
			WHERE f_uid = '.$_FANWE['uid'];
		$res = FDB::query($sql);
		while($data = FDB::fetch($res))
		{
			$uids[] = (int)$data['uid'];
		}

		$is_all = false;

		$sql = 'SELECT COUNT(share_id)
			FROM '.FDB::table("share").'
			WHERE uid IN ('.implode(',',$uids).')';
		$count = FDB::resultFirst($sql);

		if($count == 0)
		{
			$max_count = $page_size * 5;
			$is_all = true;
			$sql = 'SELECT COUNT(share_id) FROM '.FDB::table("share");
			$count = FDB::resultFirst($sql);
			if($count > $max_count)
				$count = $max_count;
		}

		$pager = buildPage('u/'.ACTION_NAME,array(),$count,$_FANWE['page'],$page_size);

		if($is_all)
			$sql = 'SELECT *
				FROM '.FDB::table("share").'
				ORDER BY share_id DESC LIMIT '.$pager['limit'];
		else
			$sql = 'SELECT *
				FROM '.FDB::table("share").'
				WHERE uid IN ('.implode(',',$uids).')
				ORDER BY share_id DESC LIMIT '.$pager['limit'];

		$share_list = FDB::fetchAll($sql);
		$share_list = FS('Share')->getShareDetailList($share_list,true,true,true);

		$args = array('share_list'=>&$share_list,'pager'=>&$pager);
		$share_list_html = tplFetch("inc/u/me_share_list",$args);

		$hot_events = FS('Event')->getHotImgEvent(3);
		$today_daren = FS('Daren')->getIndexTodayDaren();

		include template('page/u/u_fb');
		display();
	}

	
	public function book()
	{
		global $_FANWE;
		$home_uid = $_FANWE['home_uid'];
		$home_user = FS('User')->getUserById($home_uid);
		Cache::getInstance()->loadCache('citys');
		$reside_province = $_FANWE['cache']['citys']['all'][$home_user['reside_province']]['name'];
		$reside_city = $_FANWE['cache']['citys']['all'][$home_user['reside_city']]['name'];

		$tags_sql = 'SELECT DISTINCT(st.tag_name)
			FROM '.FDB::table('share_user_images').' AS s
			INNER JOIN '.FDB::table('share_tags').' AS st ON st.share_id = s.share_id
			WHERE s.uid = '.$home_uid.' LIMIT 0,20';
		$focus_tags = FDB::fetchAll($tags_sql);

		$condition = " WHERE uid = ".$home_uid;
		$sql = 'SELECT COUNT(share_id) FROM '.FDB::table('share_user_images').$condition;
		$count=FDB::resultFirst($sql);
		
		$page_size = (int)$_FANWE['setting']['share_pb_item_count'] * (int)$_FANWE['setting']['share_pb_load_count'];
		$page_args = array();
		$page_args['uid'] = $home_uid;
		$pager = buildPage('u/'.ACTION_NAME,$page_args,$count,$_FANWE['page'],$page_size,'',3);
		
		$page_args['page'] = $_FANWE['page'];
		$page_args['pindex'] = '_pindex_';
		$pb_url = $_FANWE['site_root'].'services/service.php?m=u&a=book&'.http_build_query($page_args);
		$pb_list = array();
		if($count > $_FANWE['setting']['share_pb_item_count'])
		{
			for($i = 2;$i <= $_FANWE['setting']['share_pb_load_count'];$i++)
			{
				$pb_list[] = str_replace('_pindex_',$i,$pb_url);
			}
		}
		
		$sql = 'SELECT share_id FROM '.FDB::table('share_user_images').$condition.' ORDER BY share_id DESC
			 LIMIT '.($_FANWE['page'] - 1) * $pager['page_size'] . "," . $_FANWE['setting']['share_pb_item_count'];
		
		$share_list = array();
		$res = FDB::query($sql);
		while($data = FDB::fetch($res))
		{
			$share_list[$data['share_id']] = false;
		}

		if(count($share_list) > 0)
		{
			$share_ids = array_keys($share_list);
			$sql = 'SELECT share_id,uid,content,collect_count,comment_count,create_time,cache_data 
				FROM '.FDB::table('share').' WHERE share_id IN ('.implode(',',$share_ids).')';
			$res = FDB::query($sql);
			while($data = FDB::fetch($res))
			{
				$share_list[$data['share_id']] = $data;
			}
			$share_list = FS('Share')->getShareDetailList($share_list,false,false,false,true,2);
		}

		$is_show_follow = false;
		if($home_uid != $_FANWE['uid'])
		{
			if(!FS('User')->getIsFollowUId($home_uid))
				$is_show_follow = true;
		}

		include template('page/u/u_book');
		display();
	}

	public function talk()
	{
		global $_FANWE;
		Cache::getInstance()->loadCache('citys');
		$home_uid = $_FANWE['home_uid'];
		$home_user = FS('User')->getUserById($home_uid);

		$reside_province = $_FANWE['cache']['citys']['all'][$home_user['reside_province']]['name'];
		$reside_city = $_FANWE['cache']['citys']['all'][$home_user['reside_city']]['name'];

		$page_size = 30;

		$pageargs = array();
		$pageargs['uid'] = $home_uid;

		$sql = 'SELECT COUNT(share_id)
			FROM '.FDB::table("share").'
			WHERE uid = '.$home_uid;
		$count = FDB::resultFirst($sql);

		$pager = buildPage('u/'.ACTION_NAME,$pageargs,$count,$_FANWE['page'],$page_size);

		$sql = 'SELECT *
			FROM '.FDB::table("share").'
			WHERE uid = '.$home_uid.'
			ORDER BY share_id DESC LIMIT '.$pager['limit'];

		$share_list = FDB::fetchAll($sql);
		$share_list = FS('Share')->getShareDetailList($share_list,true,true,true);

		$args = array('share_list'=>&$share_list,'pager'=>&$pager);

        if($home_uid == $_FANWE['uid'])
		    $share_list_html = tplFetch("inc/u/u_share_list",$args);
        else
            $share_list_html = tplFetch("inc/u/me_share_list",$args);

		$hot_events = FS('Event')->getHotImgEvent(3);
		$today_daren = FS('Daren')->getIndexTodayDaren();

		include template('page/u/u_me');
		display();
	}
	
	public function atme()
	{
		global $_FANWE;
		Cache::getInstance()->loadCache('citys');
		$home_uid = $_FANWE['home_uid'];
		$home_user = FS('User')->getUserById($home_uid);
		$type = $_FANWE['request']['type'];
		
		$reside_province = $_FANWE['cache']['citys']['all'][$home_user['reside_province']]['name'];
		$reside_city = $_FANWE['cache']['citys']['all'][$home_user['reside_city']]['name'];

		$page_size = 30;

		$pageargs = array();
		$pageargs['uid'] = $home_uid;
		$pageargs['type'] = $type;
		if($type =='faved')
		{
			if($_FANWE['uid']==$home_uid)
			{
				$_FANWE['user_notice']['all'] -= $_FANWE['user_notice'][2];
				$_FANWE['user_notice'][2] = 0;
				FDB::query("update ".FDB::table("user_notice")." set num=0 where `type`=2 and uid=".intval($_FANWE['uid']));
			}
			
			$sql = 'SELECT COUNT(fm.share_id)
				FROM '.FDB::table("fav_me").' AS fm 
				INNER JOIN '.FDB::table("share").' as s on s.share_id = fm.share_id 
				WHERE fm.uid = '.$home_uid;
			$count = FDB::resultFirst($sql);
		
			$pager = buildPage('u/'.ACTION_NAME,$pageargs,$count,$_FANWE['page'],$page_size);
		
			$sql = 'SELECT s.*
				FROM '.FDB::table("fav_me").' AS fm 
				INNER JOIN '.FDB::table("share").' as s on s.share_id = fm.share_id 
				WHERE fm.uid = '.$home_uid.' ORDER BY fm.share_id DESC LIMIT '.$pager['limit'];
		
			$share_list = FDB::fetchAll($sql);
		}
		else
		{
			if($_FANWE['uid']==$home_uid)
			{
				$_FANWE['user_notice']['all'] -= $_FANWE['user_notice'][4];
				$_FANWE['user_notice'][4] = 0;
				FDB::query("update ".FDB::table("user_notice")." set num=0 where `type`=4 and uid=".intval($_FANWE['uid']));
			}
			
			$sql = 'SELECT COUNT(s.share_id) 
				FROM '.FDB::table("atme").' AS a
				INNER JOIN '.FDB::table("share").' as s on s.share_id = a.share_id and s.uid <> '.$home_uid.' 
				WHERE a.uid = '.$home_uid;
			$count = FDB::resultFirst($sql);
		
			$pager = buildPage('u/'.ACTION_NAME,$pageargs,$count,$_FANWE['page'],$page_size);
		
			$sql = 'SELECT s.* 
				FROM '.FDB::table("atme").' AS a
				INNER JOIN '.FDB::table("share").' as s on s.share_id = a.share_id and s.uid <> '.$home_uid.' 
				WHERE a.uid = '.$home_uid.' ORDER BY s.share_id DESC LIMIT '.$pager['limit'];
		
			$share_list = FDB::fetchAll($sql);
		}
		$share_list = FS('Share')->getShareDetailList($share_list,true,true,true);
		
		$args = array('share_list'=>&$share_list,'pager'=>&$pager);
		$share_list_html = tplFetch("inc/u/u_share_list",$args);
		$hot_events = FS('Event')->getHotImgEvent(3);
		$today_daren = FS('Daren')->getIndexTodayDaren();
		
		include template('page/u/u_me');
		display();
	}

	public function comments()
	{
		global $_FANWE;
		Cache::getInstance()->loadCache('citys');
		$home_uid = $_FANWE['home_uid'];
		$home_user = FS('User')->getUserById($home_uid);

		if($_FANWE['uid']==$home_uid)
		{
			$_FANWE['user_notice']['all'] -= $_FANWE['user_notice'][3];
			$_FANWE['user_notice'][3] = 0;
			FDB::query("update ".FDB::table("user_notice")." set num=0 where `type`=3 and uid=".intval($_FANWE['uid']));
		}
		$reside_province = $_FANWE['cache']['citys']['all'][$home_user['reside_province']]['name'];
		$reside_city = $_FANWE['cache']['citys']['all'][$home_user['reside_city']]['name'];

		$page_size = 30;

		$pageargs = array();
		$pageargs['uid'] = $home_uid;

		$sql = 'SELECT COUNT(comment_id) FROM '.FDB::table("comment_me").' WHERE uid = '.$home_uid;
		$count = FDB::resultFirst($sql);

		$pager = buildPage('u/'.ACTION_NAME,$pageargs,$count,$_FANWE['page'],$page_size);
		$comment_list = array();
		$sql = 'SELECT sc.*,s.content as scontent
			FROM '.FDB::table("comment_me").' AS cm 
			INNER JOIN '.FDB::table("share_comment").' AS sc ON sc.comment_id = cm.comment_id 
			INNER JOIN '.FDB::table("share").' AS s ON s.share_id = sc.share_id 
			WHERE cm.uid = '.$home_uid.'
			ORDER BY cm.comment_id DESC LIMIT '.$pager['limit'];
		$res = FDB::query($sql);
		while($data = FDB::fetch($res))
		{
			$data['time'] = getBeforeTimelag($data['create_time']);
			$data['url'] = FU('note/index',array('sid'=>$data['share_id']));
			$comment_list[] = $data;
		}

		$args = array('comment_list'=>&$comment_list,'pager'=>&$pager);
		$share_list_html = tplFetch("inc/u/u_comments_list",$args);

		$hot_events = FS('Event')->getHotImgEvent(3);
		$today_daren = FS('Daren')->getIndexTodayDaren();

		include template('page/u/u_me');
		display();
	}

	public function all()
	{
		global $_FANWE;
		Cache::getInstance()->loadCache('citys');
		$home_uid = $_FANWE['home_uid'];
		$home_user = FS('User')->getUserById($home_uid);

		$reside_province = $_FANWE['cache']['citys']['all'][$home_user['reside_province']]['name'];
		$reside_city = $_FANWE['cache']['citys']['all'][$home_user['reside_city']]['name'];

		$page_size = 30;

		$max_count = $page_size * 5;
		$is_all = true;
		$sql = 'SELECT COUNT(share_id) FROM '.FDB::table("share");
		$count = FDB::resultFirst($sql);
		if($count > $max_count)
			$count = $max_count;

		$pager = buildPage('u/'.ACTION_NAME,array(),$count,$_FANWE['page'],$page_size);

		$sql = 'SELECT *
			FROM '.FDB::table("share").'
			ORDER BY share_id DESC LIMIT '.$pager['limit'];

		$share_list = FDB::fetchAll($sql);
		$share_list = FS('Share')->getShareDetailList($share_list,true,true,true);

		$args = array('share_list'=>&$share_list,'pager'=>&$pager);
		$share_list_html = tplFetch("inc/u/me_share_list",$args);

		$hot_events = FS('Event')->getHotImgEvent(3);
		$today_daren = FS('Daren')->getIndexTodayDaren();

		include template('page/u/u_me');
		display();
	}

	public function fav()
	{
		global $_FANWE;
		Cache::getInstance()->loadCache('citys');
		$home_uid = $_FANWE['home_uid'];
		$home_user = FS('User')->getUserById($home_uid);
		$current_menu = 'fav';
		$reside_province = $_FANWE['cache']['citys']['all'][$home_user['reside_province']]['name'];
		$reside_city = $_FANWE['cache']['citys']['all'][$home_user['reside_city']]['name'];

		$page_size = 30;

		$pageargs = array();
		$pageargs['uid'] = $home_uid;

		$sql = 'SELECT COUNT(share_id) FROM '.FDB::table("user_collect").' WHERE c_uid = '.$home_uid;
		
		$pager = buildPage('u/'.ACTION_NAME,$pageargs,$count,$_FANWE['page'],$page_size);
		$count = FDB::resultFirst($sql);
		
		$sql = 'SELECT s.*
			FROM '.FDB::table("user_collect").' AS uc 
			INNER JOIN '.FDB::table("share").' AS s ON s.share_id = uc.share_id 
			WHERE uc.c_uid = '.$home_uid.'
			ORDER BY uc.share_id DESC LIMIT 0,10';
		$share_list = FDB::fetchAll($sql);
		$share_list = FS('Share')->getShareDetailList($share_list,true,true,true);
		
		$args = array('share_list'=>&$share_list,'pager'=>&$pager);
		$share_list_html = tplFetch("inc/u/u_share_list",$args);

		$hot_events = FS('Event')->getHotImgEvent(3);
		$today_daren = FS('Daren')->getIndexTodayDaren();

		include template('page/u/u_fav');
		display();
	}

	public function bao()
	{
		global $_FANWE;
		$home_uid = $_FANWE['home_uid'];
		$home_user = FS('User')->getUserById($home_uid);
		$user_names = FS('User')->getUserShowName($home_uid);

		$page_args = array(
			'uid'=>$home_uid
		);
		$current_menu = 'bao';
		
		$sql = 'SELECT COUNT(DISTINCT goods_id) FROM '.FDB::table("share_goods").' WHERE uid = '.$home_uid;
		$count = FDB::resultFirst($sql);
		$pager = buildPage('u/'.ACTION_NAME,$page_args,$count,$_FANWE['page'],36);

		$goods_list = array();
		$goods_ids = array();
		$img_ids = array();
		
		$res = FDB::query('SELECT sg.id,sg.goods_id,sg.img_id,sg.share_id,sum(s.collect_count) as collect_count 
			FROM '.FDB::table('share_goods').' AS sg FORCE INDEX(uid) 
			INNER JOIN '.FDB::table('share').' AS s ON s.share_id = sg.share_id 
			WHERE sg.uid = '.$home_uid.' GROUP BY goods_id ORDER BY sg.goods_id DESC LIMIT '.$pager['limit']);
		while($data = FDB::fetch($res))
		{
			$data['share_url'] = FU('note/g',array('sid'=>$data['share_id'],'id'=>$data['id']));
			$goods_list[$data['goods_id']] = $data;
			$goods_ids[$data['goods_id']][] = &$goods_list[$data['goods_id']];
			$img_ids[$data['img_id']][] = &$goods_list[$data['goods_id']];
		}
		
		FS('Image')->formatByIdKeys($img_ids);
		FS('Goods')->formatByIDKeys($goods_ids,false);
		
		include template('page/u/u_bao');
		display();
	}

	public function photo()
	{
		global $_FANWE;
		$home_uid = $_FANWE['home_uid'];
		$home_user = FS('User')->getUserById($home_uid);
		$user_names = FS('User')->getUserShowName($home_uid);

		$page_args = array(
			'uid'=>$home_uid
		);
		$current_menu = 'photo';
		$pager = buildPage('u/'.ACTION_NAME,$page_args,$home_user['photos'],$_FANWE['page'],36);
		$photo_list = array();
		$img_ids = array();
		$res = FDB::query('SELECT sp.id,sp.share_id,sp.img_id,s.collect_count
			FROM '.FDB::table('share_photo').' AS sp
			INNER JOIN '.FDB::table("share").' AS s ON s.share_id = sp.share_id
			WHERE sp.uid = '.$home_uid.' ORDER BY sp.id DESC LIMIT '.$pager['limit']);
		while($photo = FDB::fetch($res))
		{
			$photo['url'] = FU('note/m',array('sid'=>$photo['share_id'],'id'=>$photo['photo_id']));
			$photo_list[$photo['id']] = $photo;
			$img_ids[$photo['img_id']][] = &$photo_list[$photo['id']];
		}
		FS('Image')->formatByIdKeys($img_ids);
		include template('page/u/u_photo');
		display();
	}

	public function topic()
	{
		global $_FANWE;
		$home_uid = $_FANWE['home_uid'];
		$home_user = FS('User')->getUserById($home_uid);
		FanweService::instance()->cache->loadCache('forums');
		$current_menu = 'topic';
		$page_args = array(
			'uid'=>$home_uid
		);

		$pager = buildPage('u/'.ACTION_NAME,$page_args,$home_user['forums'],$_FANWE['page'],10);
		
		$group_ids = array();
		$thread_list = array();
		$res = FDB::query('SELECT ft.*,s.cache_data FROM '.FDB::table('forum_thread').' AS ft
			INNER JOIN '.FDB::table('share').' AS s ON s.share_id = ft.share_id
			WHERE ft.uid = '.$home_uid.' ORDER BY ft.tid DESC LIMIT '.$pager['limit']);
		while($thread = FDB::fetch($res))
		{
			$thread['cache_data'] = fStripslashes(unserialize($thread['cache_data']));
			$thread['url'] = FU('topic/detail',array('tid'=>$thread['tid']));
			$thread['time'] = getBeforeTimelag($thread['create_time']);
			FS('Share')->shareImageFormat($thread);
            unset($thread['cache_data']);
			$thread_list[$thread['share_id']] = $thread;
			$thread_list[$thread['share_id']]['group'] = array();
			$group_ids[$thread['fid']][] = &$thread_list[$thread['share_id']]['group'];
		}
		FS('Group')->formatByIdKeys($group_ids,false);
		include template('page/u/u_topic');
		display();
	}

	public function maybe()
	{
		global $_FANWE;
		$home_uid = $_FANWE['home_uid'];
		$home_user = FS('User')->getUserById($home_uid);
		$user_names = FS('User')->getUserShowName($home_uid);
		FanweService::instance()->cache->loadCache('forums');

		$page_args = array(
			'uid'=>$home_uid
		);
		$current_menu = 'topic';
		$follow_uids = array();
		$sql = 'SELECT uid
			FROM '.FDB::table('user_follow').'
			WHERE f_uid = '.$home_uid.'
			GROUP BY uid';
		$res = FDB::query($sql);
		while($data = FDB::fetch($res))
		{
			$follow_uids[] = $data['uid'];
		}

		if(count($follow_uids) > 0)
		{
			$sql = 'SELECT COUNT(tid)
				FROM '.FDB::table('forum_thread').'
				WHERE uid '.FDB::createIN($follow_uids);
			$count = FDB::resultFirst($sql);
			$pager = buildPage('u/'.ACTION_NAME,$page_args,$count,$_FANWE['page'],10);
			
			$group_ids = array();
			$thread_list = array();
			$res = FDB::query('SELECT ft.*,s.cache_data FROM '.FDB::table('forum_thread').' AS ft
				INNER JOIN '.FDB::table('share').' AS s ON s.share_id = ft.share_id
				WHERE ft.uid '.FDB::createIN($follow_uids).' ORDER BY ft.tid DESC LIMIT '.$pager['limit']);
			while($thread = FDB::fetch($res))
			{
				$thread['cache_data'] = fStripslashes(unserialize($thread['cache_data']));
				$thread['url'] = FU('topic/detail',array('tid'=>$thread['tid']));
				$thread['time'] = getBeforeTimelag($thread['create_time']);
				FS('Share')->shareImageFormat($thread);
            	unset($thread['cache_data']);
				$thread_list[$thread['share_id']] = $thread;
				$thread_list[$thread['share_id']]['group'] = array();
				$group_ids[$thread['fid']][] = &$thread_list[$thread['share_id']]['group'];
			}
			FS('Group')->formatByIdKeys($group_ids,false);
		}

		include template('page/u/u_topic');
		display();
	}

	public function attention()
	{
		global $_FANWE;
		$home_uid = $_FANWE['home_uid'];
		$home_user = FS('User')->getUserById($home_uid);
		FanweService::instance()->cache->loadCache('asks');
		FanweService::instance()->cache->loadCache('forums');

		$page_args = array(
			'uid'=>$home_uid
		);
		$current_menu = 'topic';
		$share_datas = array();
		$count = FDB::resultFirst('SELECT COUNT(uid) FROM '.FDB::table('forum_thread_best').' WHERE uid = '.$home_uid);
		$pager = buildPage('u/'.ACTION_NAME,$page_args,$count,$_FANWE['page'],10);
		
		$group_ids = array();
		$thread_list = array();
		$res = FDB::query('SELECT ft.*,s.cache_data 
			FROM '.FDB::table('forum_thread_best').' AS ftb 
			INNER JOIN '.FDB::table('forum_thread').' AS ft ON ft.tid = ftb.tid
			INNER JOIN '.FDB::table('share').' AS s ON s.share_id = ftb.share_id
			WHERE ftb.uid = '.$home_uid.' ORDER BY ftb.create_time DESC LIMIT '.$pager['limit']);
		while($thread = FDB::fetch($res))
		{
			$thread['cache_data'] = fStripslashes(unserialize($thread['cache_data']));
			$thread['url'] = FU('topic/detail',array('tid'=>$thread['tid']));
			$thread['time'] = getBeforeTimelag($thread['create_time']);
			FS('Share')->shareImageFormat($thread);
			unset($thread['cache_data']);
			$thread_list[$thread['share_id']] = $thread;
			$thread_list[$thread['share_id']]['group'] = array();
			$group_ids[$thread['fid']][] = &$thread_list[$thread['share_id']]['group'];
		}

		FS('Group')->formatByIdKeys($group_ids,false);

		include template('page/u/u_topic');
		display();
	}

	public function feed()
	{
		global $_FANWE;
		$home_uid = $_FANWE['home_uid'];
		$home_user = FS('User')->getUserById($home_uid);
		FanweService::instance()->cache->loadCache('asks');
		FanweService::instance()->cache->loadCache('forums');

		$page_args = array(
			'uid'=>$home_uid
		);
		$current_menu = 'topic';
		$count = FDB::resultFirst('SELECT COUNT(DISTINCT tid)
			FROM '.FDB::table('forum_post').'
			WHERE uid = '.$home_uid);

		$pager = buildPage('u/'.ACTION_NAME,$page_args,$count,$_FANWE['page'],10);
		
		$group_ids = array();
		$thread_list = array();
		$res = FDB::query('SELECT ft.*,s.cache_data
			FROM '.FDB::table('forum_post').' AS fp 
			INNER JOIN '.FDB::table('forum_thread').' AS ft ON ft.tid = fp.tid 
			INNER JOIN '.FDB::table('share').' AS s ON s.share_id = ft.share_id 
			WHERE fp.uid = '.$home_uid.' 
			GROUP BY fp.tid 
			ORDER BY fp.tid DESC LIMIT '.$pager['limit']);

		while($thread = FDB::fetch($res))
		{
			$thread['cache_data'] = fStripslashes(unserialize($thread['cache_data']));
			$thread['url'] = FU('topic/detail',array('tid'=>$thread['tid']));
			$thread['time'] = getBeforeTimelag($thread['create_time']);
			FS('Share')->shareImageFormat($thread);
			unset($thread['cache_data']);
			$thread_list[$thread['share_id']] = $thread;
			$thread_list[$thread['share_id']]['group'] = array();
			$group_ids[$thread['fid']][] = &$thread_list[$thread['share_id']]['group'];
		}

		FS('Group')->formatByIdKeys($group_ids,false);

		include template('page/u/u_topic');
		display();
	}

	public function follow()
	{
		global $_FANWE;
		$home_uid = $_FANWE['home_uid'];
		$home_user = FS('User')->getUserById($home_uid);

		$page_args = array(
			'uid'=>$home_uid
		);

		Cache::getInstance()->loadCache('citys');

		$reside_province = $_FANWE['cache']['citys']['all'][$home_user['reside_province']]['name'];
		$reside_city = $_FANWE['cache']['citys']['all'][$home_user['reside_city']]['name'];

		$count = FDB::resultFirst('SELECT COUNT(uid) FROM '.FDB::table('user_follow').' WHERE f_uid = '.$home_uid);
		$pager = buildPage('u/'.ACTION_NAME,$page_args,$count,$_FANWE['page'],20);

		$user_list = array();

		$res = FDB::query('SELECT u.uid,u.user_name,u.avatar,uc.fans,up.reside_province,up.reside_city
				FROM '.FDB::table('user_follow').' AS uf
				INNER JOIN '.FDB::table('user').' AS u ON u.uid = uf.uid
				INNER JOIN '.FDB::table('user_count').' AS uc ON uc.uid = uf.uid
				INNER JOIN '.FDB::table('user_profile').' AS up ON up.uid = uf.uid
				WHERE uf.f_uid = '.$home_uid.' ORDER BY uf.create_time DESC LIMIT '.$pager['limit']);
		while($data = FDB::fetch($res))
		{
			if($home_uid == $_FANWE['uid'])
				$data['is_follow'] = FS('User')->getIsFollowUId2($data['uid'],$home_uid);

			if($home_uid != $_FANWE['uid'])
				$data['is_follow'] = FS('User')->getIsFollowUId($data['uid']);

			$data['reside_province'] = $_FANWE['cache']['citys']['all'][$data['reside_province']]['name'];
			$data['reside_city'] = $_FANWE['cache']['citys']['all'][$data['reside_city']]['name'];

			$data['share'] = FDB::fetchFirst('SELECT share_id,create_time,content
				FROM '.FDB::table('share').'
				WHERE uid = '.$data['uid'].'
				ORDER BY share_id DESC
				LIMIT 0,1');
			if($data['share'])
			{
				$data['share']['url'] = FU('note/index',array('sid'=>$data['share']['share_id']));
				$data['share']['time'] = getBeforeTimelag($data['share']['create_time']);
			}

			$user_list[] = $data;
		}

		include template('page/u/u_follow');
		display();
	}

	public function fans()
	{
		global $_FANWE;
		$home_uid = $_FANWE['home_uid'];
		$home_user = FS('User')->getUserById($home_uid);

		if($_FANWE['uid']==$home_uid)
		{
			//将我的粉丝信息统计设置为0
			FDB::query("update ".FDB::table("user_notice")." set num=0 where `type`=1 and uid=".intval($_FANWE['uid']));
		}
		$page_args = array(
			'uid'=>$home_uid
		);

		Cache::getInstance()->loadCache('citys');

		$reside_province = $_FANWE['cache']['citys']['all'][$home_user['reside_province']]['name'];
		$reside_city = $_FANWE['cache']['citys']['all'][$home_user['reside_city']]['name'];

		$count = FDB::resultFirst('SELECT COUNT(uid) FROM '.FDB::table('user_follow').' WHERE uid = '.$home_uid);
		$pager = buildPage('u/'.ACTION_NAME,$page_args,$count,$_FANWE['page'],20);

		$user_list = array();

		$res = FDB::query('SELECT u.uid,u.user_name,u.avatar,uc.fans,up.reside_province,up.reside_city
				FROM '.FDB::table('user_follow').' AS uf
				INNER JOIN '.FDB::table('user').' AS u ON u.uid = uf.f_uid
				INNER JOIN '.FDB::table('user_count').' AS uc ON uc.uid = uf.f_uid
				INNER JOIN '.FDB::table('user_profile').' AS up ON up.uid = uf.f_uid
				WHERE uf.uid = '.$home_uid.' ORDER BY uf.create_time DESC LIMIT '.$pager['limit']);
		while($data = FDB::fetch($res))
		{
			$data['is_follow'] = FS('User')->getIsFollowUId($data['uid']);

			$data['reside_province'] = $_FANWE['cache']['citys']['all'][$data['reside_province']]['name'];
			$data['reside_city'] = $_FANWE['cache']['citys']['all'][$data['reside_city']]['name'];

			$data['share'] = FDB::fetchFirst('SELECT share_id,create_time,content
				FROM '.FDB::table('share').'
				WHERE uid = '.$data['uid'].'
				ORDER BY share_id DESC
				LIMIT 0,1');
			if($data['share'])
			{
				$data['share']['url'] = FU('note/index',array('sid'=>$data['share']['share_id']));
				$data['share']['time'] = getBeforeTimelag($data['share']['create_time']);
			}

			$user_list[] = $data;
		}

		include template('page/u/u_fans');
		display();
	}

	public function message()
	{
		global $_FANWE;
		$home_uid = $_FANWE['uid'];
		$home_user = FS('User')->getUserById($home_uid);
		$current_menu = 'message';
		
		$type = 'message';
		
		$count = FS('Message')->getMsgCount($_FANWE['uid']);
		$pager = buildPage('u/'.ACTION_NAME,array(),$count,$_FANWE['page'],10);

		$sys_msgs = FS('Message')->getSysMsgs($_FANWE['uid']);
		$msg_list = FS('Message')->getMsgList($_FANWE['uid'],$pager['limit']);

		FDB::query("DELETE FROM ".FDB::table('user_notice')." WHERE uid='$home_uid' AND type=5");

		include template('page/u/u_message');
		display();
	}
	
	public function notic()
	{
		global $_FANWE;
		$home_uid = $_FANWE['uid'];
		$home_user = FS('User')->getUserById($home_uid);
		$current_menu = 'message';
		
		$type = 'notic';
		
		$count = FS('Notice')->getCount($_FANWE['uid']);
		$pager = buildPage('u/'.ACTION_NAME,array(),$count,$_FANWE['page'],10);
		$sys_notices = FS('Notice')->getList($_FANWE['uid'],$pager['limit']);
		
		FDB::query("DELETE FROM ".FDB::table('user_notice')." WHERE uid='$home_uid' AND type=6");
		include template('page/u/u_message');
		display();
	}

	public function sendmsg()
	{
		global $_FANWE;
		$home_uid = $_FANWE['uid'];
		$home_user = FS('User')->getUserById($home_uid);
		$current_menu = 'message';

		$count = FDB::resultFirst('SELECT COUNT(uid) FROM '.FDB::table('user_follow').' WHERE uid = '.$home_uid);
		$pager = buildPage('',array(),$count,$_FANWE['page'],30);

		$user_list = FDB::fetchAll('SELECT u.uid,u.user_name,u.avatar 
				FROM '.FDB::table('user_follow').' AS uf
				INNER JOIN '.FDB::table('user').' AS u ON u.uid = uf.f_uid
				WHERE uf.uid = '.$home_uid.' ORDER BY uf.create_time DESC LIMIT '.$pager['limit']);
		include template('page/u/u_sendmsg');
		display();
	}

	public function msgview()
	{
		global $_FANWE;
		$home_uid = $_FANWE['uid'];
		$home_user = FS('User')->getUserById($home_uid);
		$current_menu = 'message';

		$mlid = intval($_FANWE['request']['lid']);
		$mid = intval($_FANWE['request']['mid']);
		if($mlid == 0 && $mid == 0)
			fHeader("location: ".FU('u/message',array('uid'=>$_FANWE['uid'])));

		$pageargs = array();

		if($mlid > 0)
		{
			$pageargs['lid'] = $mlid;
			$mlist = FS('Message')->getListByMlid($mlid,$_FANWE['uid']);

			if(empty($mlist))
				fHeader("location: ".FU('u/message',array('uid'=>$_FANWE['uid'])));

			$pager = buildPage('u/'.ACTION_NAME,$pageargs,$mlist['num'],$_FANWE['page'],10);
			$msg_list = FS('Message')->getMsgsByMlid($mlid,$_FANWE['uid'],$pager['limit']);

			include template('page/u/u_msgview');
		}
		elseif($mid)
		{
			$msg = FS('Message')->getSysMsgByMid($_FANWE['uid'],$mid);
			include template('page/u/u_smsgview');
		}
		display();
	}
	
	public function exchange()
	{
		global $_FANWE;
		$home_uid = $_FANWE['uid'];
		$home_user = FS('User')->getUserById($home_uid);
		$current_menu = 'exchange';

		$args = array();
		$where = " AND uid = ".$_FANWE['uid'];
		$goods_status = (int)$_FANWE['request']['status'];
		if($goods_status > 0)
		{
			$where.=" AND goods_status = ".($goods_status - 1);
			$args['status'] = $goods_status;
		}
		
		$count = FDB::resultFirst('SELECT COUNT(id) FROM '.FDB::table('order').' WHERE status < 2 '.$where);
		$pager = buildPage('u/exchange',$args,$count,$_FANWE['page'],15);

		$sql = 'SELECT * FROM '.FDB::table('order').' WHERE status < 2 '.$where.' GROUP BY id ORDER BY id DESC LIMIT '.$pager['limit'];

		$res = FDB::query($sql);
		$order_list = array();
		while($order = FDB::fetch($res))
		{
			$order['goods_status'] = lang('exchange','order_goods_status_'.$order['goods_status']);
			$order['create_time'] = fToDate($order['create_time']);
			$order_list[] = $order;
		}
		
		include template('page/u/u_exchange');
		display();
	}
	
	public function album()
	{
		global $_FANWE;
		$home_uid = $_FANWE['home_uid'];
		$home_user = FS('User')->getUserById($home_uid);
		$current_menu = 'album';
		
		$album_list = array();
		$pager = array();
		$type = (int)$_FANWE['request']['type'];
		switch($type)
		{
			case '2':
				$uids = array();
				//获取我关注的会员编号
				$sql = 'SELECT uid
					FROM '.FDB::table('user_follow').'
					WHERE f_uid = '.$home_uid;
				$res = FDB::query($sql);
				while($data = FDB::fetch($res))
				{
					$uids[] = (int)$data['uid'];
				}
				
				if(count($uids) > 0)
				{
					$sql = 'SELECT COUNT(id) FROM '.FDB::table("album").' 
						WHERE uid IN ('.implode(',',$uids).')';
					$count = FDB::resultFirst($sql);
					$args['type'] = 2;
					$pager = buildPage('u/album',$args,$count,$_FANWE['page'],10);
					
					$sql = 'SELECT * FROM '.FDB::table('album').' 
						WHERE uid IN ('.implode(',',$uids).') ORDER BY id DESC LIMIT '.$pager['limit'];
					
					$res = FDB::query($sql);
					while($data = FDB::fetch($res))
					{
						$data['imgs'] = array();
						if(!empty($data['cache_data']))
						{
							$cache_data = fStripslashes(unserialize($data['cache_data']));
							$data['imgs'] = $cache_data['imgs'];
							unset($data['cache_data']);
						}
						$data['url'] = FU('album/show',array('id'=>$data['id']));
						$album_list[$data['id']] = $data;
					}
				}
			break;
			
			case '3':
				$aids = array();
				$sql = 'SELECT album_id 
					FROM '.FDB::table('album_best').'
					WHERE uid = '.$home_uid;
				$res = FDB::query($sql);
				while($data = FDB::fetch($res))
				{
					$aids[] = (int)$data['album_id'];
				}
				
				if(count($aids) > 0)
				{
					$sql = 'SELECT COUNT(id) FROM '.FDB::table("album").' 
						WHERE id IN ('.implode(',',$aids).')';
					$count = FDB::resultFirst($sql);
					$args['type'] = 3;
					$pager = buildPage('u/album',$args,$count,$_FANWE['page'],10);
					
					$sql = 'SELECT * FROM '.FDB::table('album').' 
						WHERE id IN ('.implode(',',$aids).') ORDER BY id DESC LIMIT '.$pager['limit'];
					
					$res = FDB::query($sql);
					while($data = FDB::fetch($res))
					{
						$data['imgs'] = array();
						if(!empty($data['cache_data']))
						{
							$cache_data = fStripslashes(unserialize($data['cache_data']));
							$data['imgs'] = $cache_data['imgs'];
							unset($data['cache_data']);
						}
						$data['url'] = FU('album/show',array('id'=>$data['id']));
						$album_list[$data['id']] = $data;
					}
				}
			break;
			
			default:
				$type = 1;
				if($home_user['albums'] > 0)
				{
					$args['type'] = 1;
					$pager = buildPage('u/album',$args,$home_user['albums'],$_FANWE['page'],10);
					$sql = 'SELECT * FROM '.FDB::table('album').' 
						WHERE uid = '.$home_uid.' ORDER BY id DESC LIMIT '.$pager['limit'];
					
					$res = FDB::query($sql);
					while($data = FDB::fetch($res))
					{
						$data['imgs'] = array();
						if(!empty($data['cache_data']))
						{
							$cache_data = fStripslashes(unserialize($data['cache_data']));
							$data['imgs'] = $cache_data['imgs'];
							unset($data['cache_data']);
						}
						$data['url'] = FU('album/show',array('id'=>$data['id']));
						$album_list[] = $data;
					}
				}
			break;
		}	
		include template('page/u/u_album');
		display();
	}
	
	public function commission()
	{
		global $_FANWE;
		$home_uid = $_FANWE['uid'];
		$home_user = FS('User')->getUserById($home_uid);
		$current_menu = 'commission';
		
		$type = (int)$_FANWE['request']['type'];
		$args = array();
		$args['type'] = $type;
		switch($type)
		{
			case 3:
				$where = " WHERE uid = ".$_FANWE['uid'];
				$count = FDB::resultFirst('SELECT COUNT(id) FROM '.FDB::table('user_money_log').$where);
				$pager = buildPage('u/commission',$args,$count,$_FANWE['page'],15);
				$sql = 'SELECT * FROM '.FDB::table('user_money_log').$where.' ORDER BY id DESC LIMIT '.$pager['limit'];
				$res = FDB::query($sql);
				$order_list = array();
				while($order = FDB::fetch($res))
				{
					$order['create_time'] = fToDate($order['create_time']);
					$order_list[] = $order;
				}
			break;
			
			case 4:
				$where = " WHERE uid = ".$_FANWE['uid'];
				$count = FDB::resultFirst('SELECT COUNT(id) FROM '.FDB::table('user_auction_log').$where);
				$pager = buildPage('u/commission',$args,$count,$_FANWE['page'],15);
				$sql = 'SELECT * FROM '.FDB::table('user_auction_log').$where.' ORDER BY id DESC LIMIT '.$pager['limit'];
				$res = FDB::query($sql);
				$order_list = array();
				while($order = FDB::fetch($res))
				{
					$order['money_format'] = priceFormat($order['money']);
					$order['create_time'] = fToDate($order['create_time']);
					$order['pay_time_format'] = fToDate($order['pay_time']);
					$order_list[] = $order;
				}
			break;
			
			case 5:
			break;
			
			case 6:
				$money = (float)$_FANWE['request']['money'];
				if($money < 0)
					exit;
				
				$user_money = FS('User')->getUserMoney($_FANWE['uid']);
				if($money > $user_money)
					$money = $user_money;

				if($money == 0)
				{
					showError(lang('user','auction_log_title'),lang('user','auction_log_error1'),FU('u/commission',array('type'=>4)));
					exit;
				}
				
				$data = array();
				$data['money'] = $money;
				$data['content'] = trim($_FANWE['request']['content']);
				$data['uid'] = $_FANWE['uid'];
				$data['create_time'] = TIME_UTC;
				$data['create_day'] = getTodayTime();
				
				
				$result = FDB::insert('user_auction_log',$data);
				if($result)
					fHeader("location: ".FU('u/commission',array('type'=>4)));
				else
					showError(lang('user','auction_log_title'),lang('user','auction_log_error'),FU('u/commission',array('type'=>5)));
			break;
			
			default:
				unset($args['type']);
				$where = ' WHERE uid = '.$home_uid;
				if($_FANWE['setting']['user_commission_type'] == 2)
					$where .= ' AND pay_time > 0';
				elseif($_FANWE['setting']['user_commission_type'] == 1)
				{
					if($type == 2)
					{
						$args['type'] = 2;
						$where .= ' AND is_pay = 1';
					}
					else
						$where .= ' AND status = 1';
				}
				else
				{
					if($type == 2)
					{
						$args['type'] = 2;
						$where .= ' AND is_pay = 1';
					}
					elseif($type == 1)
					{
						$args['type'] = 1;
						$where .= ' AND status = 1';
					}
				}
				
				$sql = 'SELECT COUNT(order_id) FROM '.FDB::table('goods_order').$where;
				$count = FDB::resultFirst($sql);
				$pager = buildPage('u/commission',$args,$count,$_FANWE['page'],15);
				
				$sql = 'SELECT * FROM '.FDB::table('goods_order').$where.' ORDER BY order_id DESC LIMIT '.$pager['limit'];
				$res = FDB::query($sql);
				$order_list = array();
				$goods_list = array();
				while($order = FDB::fetch($res))
				{
					if($order['commission'] > 0)
						$order['commission_format'] = priceFormat($order['commission']);
					
					$order['create_time'] = fToDate($order['create_time'],'Y-m-d').'<br/>'.fToDate($order['create_time'],'H:i:s');
					$order['pay_time_format'] = fToDate($order['pay_time']);
					$order['settlement_time_format'] = fToDate($order['settlement_time'],'Y-m-d').'<br/>'.fToDate($order['settlement_time'],'H:i:s');
					$order_list[$order['order_id']] = $order;
					$goods_list[$order['goods_id']][] = &$order_list[$order['order_id']];
				}
				FS('Goods')->formatByIDKeys($goods_list,false);
			break;
		}
		include template('page/u/u_commission');
		display();
	}
}
?>