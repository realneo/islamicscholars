<?php
//首页动态内容的函数

/**
 * 获取今日达人
 */
function getIndexTodayDaren()
{
	$args['today_daren'] = FS('Daren')->getIndexTodayDaren();
	return tplFetch('inc/index/today_daren',$args);
}


/**
 * 获取malls.GuanG 
 */
function getIndexMalls()
{
	$args['today_mallbrands'] = FS('Mall')->getIndexMallbrand();
	$args['today_brands'] = FS('Mall')->getIndexbrand();
	return tplFetch('inc/index/best_mall',$args);
}
/**
 * 获取goods
 */
function getIndexGoods()
{
	$args['today_daren'] = FS('Daren')->getIndexTodayDaren();
	return tplFetch('inc/index/best_goods',$args);
}
/**
 * 正在分享
 */
function getNewShare()
{
	$args['shares'] = FS('Share')->getNewShare();
	return tplFetch('inc/index/new_share',$args);
}

/**
 * 最新活动,热门主题
 */
function getHotTopic()
{
	$cache_file = getTplCache('inc/index/hot_topic',array(),1);
	if(getCacheIsUpdate($cache_file,600))
	{
		$args['new_events'] = FS('Event')->getHotNewEvent(3);
		$args['hot_topics'] = FS('Topic')->getHotTopicList(0,0,3);
	}

	return tplFetch('inc/index/hot_topic',$args,'',$cache_file);
}

/**
 * 分类最近7天热门分享
 */
function getDayCateShare()
{
	$args = array();
	$cache_file = getTplCache('inc/index/cate_share',array(),1);
	if(getCacheIsUpdate($cache_file,600))
	{
		$args['cate_list'] = FS('Share')->getIndexShareHotTags();
	}

	return tplFetch('inc/index/cate_share',$args,'',$cache_file);
}

/**
 * 分类最新的主题
 */
function getIndexTopic()
{
	global $_FANWE;
	$args = array();
	$cache_file = getTplCache('inc/index/new_topic',array(),1);
	if(getCacheIsUpdate($cache_file,600))
	{
		$res = FDB::query('SELECT fid,thread_count FROM '.FDB::table('forum').' WHERE parent_id = 0');
		while($data = FDB::fetch($res))
		{
			$_FANWE['cache']['forums']['all'][$data['fid']]['thread_count'] = $data['thread_count'];
		}

		$args['new_list'] = FS('Topic')->getImgTopic('new',7,4);
		$args['ask_list'] = FS('Ask')->getImgAsk('new',2,1);
	}

	return tplFetch('inc/index/topics',$args,'',$cache_file);
}

/**
 * 分类最新的主题
 */
function getDarenLists()
{
	$args['daren_list'] = FS('Daren')->getDarens();
	return tplFetch('inc/index/daren_list',$args);
}

/**
 * 搭配秀列表
 */
function getDapeiLists()
{
	$args = array();
	$cache_file = getTplCache('inc/index/dapei_list',array(),1);
	if(getCacheIsUpdate($cache_file,600))
	{
		$args['dapei_list'] = FS('Share')->getPhotoListByType("dapei");
	}
	return tplFetch('inc/index/dapei_list',$args,'',$cache_file);
}
/**
 * 晒货列表
 */
function getLookLists()
{
	$args = array();
	$cache_file = getTplCache('inc/index/look_list',array(),1);
	if(getCacheIsUpdate($cache_file,600))
	{
		$args['look_list'] = FS('Share')->getPhotoListByType("look");
	}
	return tplFetch('inc/index/look_list',$args,'',$cache_file);
}

/**
 * 热门杂志列表
 */
function getIndexHotAblum(){
	$args = array();
	$cache_file = getTplCache('inc/index/album_list',array(),1);
	if(getCacheIsUpdate($cache_file,600))
	{
		$args['album_list'] = FS("Album")->getIndexAlbums(6);
	}
	return tplFetch('inc/index/album_list',$args,'',$cache_file);
}

/**
 * 首页分类推荐分享
 */
function getIndexCateShare()
{
 	$args = array();
	$cache_file = getTplCache('inc/index/index_cate_share',array(),1);
	if(getCacheIsUpdate($cache_file,600))
	{
	 	global $_FANWE;
	 	FanweService::instance()->cache->loadCache('goods_category');
	 	$index_cids = $_FANWE['cache']['goods_category']['index'];
		$cate_list = array();
		if(count($index_cids) > 0)
		{
			$user_ids = array();
			$imgs_ids = array();
			$sql = 'SELECT ics.*,s.collect_count FROM '.FDB::table('index_cate_share').' AS ics 
				LEFT JOIN '.FDB::table('share').' AS s ON s.share_id = ics.share_id 
				WHERE cid IN ('.implode(',',$index_cids).') ORDER BY sort ASC,share_id DESC';
			$res = FDB::query($sql);
			while($data = FDB::fetch($res))
			{
				if(empty($data['url']))
					$data['url'] = FU('note/index',array('sid'=>$data['share_id']));
				
				$data['collect_count'] = (int)$data['collect_count'];
				$cate_list[$data['cid']]['share_list'][$data['share_id']] = $data;
				if($data['cimg_id'] > 0)
					$imgs_ids[$data['cimg_id']][] = &$cate_list[$data['cid']]['share_list'][$data['share_id']];
				else
					$imgs_ids[$data['img_id']][] = &$cate_list[$data['cid']]['share_list'][$data['share_id']];
				$cate_list[$data['cid']]['users'][$data['uid']] = $data['uid'];
			}
			FS('Image')->formatByIdKeys($imgs_ids);
			
			/*if(count($cate_list) > 0)
			{
				$sql = 'SELECT COUNT(DISTINCT uid) AS scount,cate_id FROM '.FDB::table('share_category').' 
					WHERE cate_id IN ('.implode(',',array_keys($cate_list)).') GROUP BY cate_id';
				$res = FDB::query($sql);
				while($data = FDB::fetch($res))
				{
					$cate_list[$data['cate_id']]['share_user_count'] = $data['scount'];
				}
			}*/
			
			foreach($cate_list as $cid => $cate)
			{
				$cate_list[$cid]['cate'] = $_FANWE['cache']['goods_category']['all'][$cid];
			}
			$args['cate_list'] = $cate_list;
		}
	}
	return tplFetch('inc/index/index_cate_share',$args,'',$cache_file);
}
?>