<?php
// +----------------------------------------------------------------------
// | 美寻购物分享网站系统 (Build on ThinkPHP)
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://meixun.cc All rights reserved.
// +----------------------------------------------------------------------

/**  
 * mall.service.php
 *
 * 商场服务类
 *
 * @package service
 * @author awfigq <awfigq@qq.com>
 */
class MallService
{
	/**  
	 * 获取首页今日商场和品牌
	 * @param int $num 数量
	 * @return array
	 */
	public function getIndexMallbrand($num = 1)
	{
		global $_FANWE;
		$data = array();
		$data2 = array(3);
		$sql = 'select mm.*,md.dname,md.ddate1,md.ddate2 from meixun_discount as md,meixun_mall as mm where md.d_mallid=mm.mall_id limit 2';
		$sql2 = 'select distinct(mb.bid),mb.blogo,mb.bname from meixun_discount as md,meixun_brand as mb where md.d_brandid=mb.bid and md.d_mallid=';
		
		$data = FDB::fetchAll($sql);
		if($data!=null ){
		error_log('[core-service-mall.service]getIndexMallbrand--->the sql1 is:'.$sql2.$data[0]['mall_id'],0);
		error_log('[core-service-mall.service]getIndexMallbrand--->the sql2 is:'.$sql2.$data[1]['mall_id'],0);
		
			$array1 =FDB::fetchAll($sql2.$data[0]['mall_id']) ;
			$array2 =FDB::fetchAll($sql2.$data[1]['mall_id']) ;
			
			$data2[0] = $data;
			$data2[1] = $array1;
			$data2[2] = $array2;
		}
			
		return $data2;
	}
	
	
	/**  
	 * 获取首页今日品牌
	 * @param int $num 数量
	 * @return array
	 */
	public function getIndexbrand($num = 1)
	{
		global $_FANWE;
		$data = array();
		$sql = 'select bi.* ,b.bname from meixun_brandimgs as bi,meixun_brand as b where bi.brandid=b.bid order by bi.id desc limit 8';
		
		$data = FDB::fetchAll($sql);
		if($data!=null ){
			//error_log('[core-service-mall.service]getIndexbrand--->the sql1 is:'.$sql2.$data[0]['mall_id'],0);
		
		}
			
		return $data;
	}
	
}
?>