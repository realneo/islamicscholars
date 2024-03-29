<?php
// +----------------------------------------------------------------------
// | 美寻购物分享网站系统 (Build on ThinkPHP)
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://meixun.cc All rights reserved.
// +----------------------------------------------------------------------

/**  
 * look.service.php
 *
 * 晒货服务
 *
 * @package service
 * @author awfigq <awfigq@qq.com>
 */
class LookService
{
	public function setUserCache($uid)
	{
		$uid = (int)$uid;
		if($uid == 0)
			return;

		$user_cache = FDB::resultFirst('SELECT cache_data FROM '.FDB::table('user_status').' WHERE uid = '.$uid);
		$cache_data = fStripslashes(unserialize($user_cache));

		$looks = array();
		$sql = 'SELECT si.share_id,s.cache_data FROM '.FDB::table('share_look_index').' AS si 
			INNER JOIN '.FDB::table('share').' AS s ON s.share_id = si.share_id 
			WHERE si.uid = '.$uid.' ORDER BY si.share_id DESC LIMIT 0,10';
		$res = FDB::query($sql);
		while($data = FDB::fetch($res))
		{
			$share_cache = fStripslashes(unserialize($data['cache_data']));
			$looks[] = array(
				'share_id'=>$data['share_id'],
				'id'=>$share_cache['imgs']['all'][$share_cache['imgs']['look'][0]]['id'],
				'img_id'=>$share_cache['imgs']['all'][$share_cache['imgs']['look'][0]]['img_id'],
				'img'=>$share_cache['imgs']['all'][$share_cache['imgs']['look'][0]]['img'],
				'img_width'=>$share_cache['imgs']['all'][$share_cache['imgs']['look'][0]]['img_width'],
				'img_height'=>$share_cache['imgs']['all'][$share_cache['imgs']['look'][0]]['img_height'],
			);
		}
		$cache_data['looks'] = $looks;
		$cache_data = addslashes(serialize($cache_data));
		FDB::update('user_status',array('cache_data'=>$cache_data),'uid = '.$uid);
	}

	public function getBest($num = 4)
	{
		$key = 'look/best/'.$num;
		$list = getCache($key);
		if($list === NULL)
		{
			$list = array();
			$sql = 'SELECT si.share_id,s.best_desc,s.content,s.uid,s.cache_data FROM '.FDB::table('share_look_best').' AS si 
				INNER JOIN '.FDB::table('share').' AS s ON s.share_id = si.share_id 
				ORDER BY s.sort ASC,si.share_id DESC LIMIT 0,'.$num;
			$res = FDB::query($sql);
			while($data = FDB::fetch($res))
			{
				$list[$data['share_id']] = $data;
			}
			$list = FS('Share')->getShareDetailList($list,false,false,false,true,2);
		}
		return $list;
	}
}
?>