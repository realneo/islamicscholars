<?php
class MallModule
{
	public function index()
	{
		global $_FANWE;
		$cache_file = getTplCache('page/mall/mall_index',$_FANWE['request'],2);
		//if(getCacheIsUpdate($cache_file,SHARE_CACHE_TIME,1))
		// Close the cach handling at first.
		// Jiao 0620.
		
		$mall_count =250;
		$mg_list = array();
		
		//Get the mallgroup .
		$sql = 'SELECT * FROM '.FDB::table('mallgroup').' ORDER BY sort ASC,id DESC ';
		$res = FDB::query($sql);
		
		while($data = FDB::fetch($res))
		{
			//$mgname = fStripslashes(unserialize($data['name']));
			//$data['name'] = $mgname;
			//$data['url'] = FU('mall/show',array('id'=>$data['id']));
			$mg_list[$data['id']] = $data;
		}
		
		
		//Get the malls.
		$where =' where 1=1 ';
		$cid = (int)$_FANWE['request']['cid'];
		if($cid > 0)  {
			$where .= ' AND cate_id = '.$cid;
			$page_args['cid'] = $cid;
		}
		
		$sql = 'SELECT COUNT(mall_id) FROM '.FDB::table('mall');
		$mall_count = FDB::resultFirst($sql);
		
		$page_size = 20;
		$pager = buildPage('mall/index',$page_args,$mall_count,$_FANWE['page'],$page_size);
		
		$sql2 = 'SELECT * FROM '.FDB::table('mall').$where.' ORDER BY sort ASC,mall_id DESC LIMIT '.$pager['limit'];
		$mall_list = array();

		/**/
		$res2 = FDB::query($sql2);
		while($data2 = FDB::fetch($res2))
		{
			$mall_list[$data2['mall_id']] = $data2;
		}
					
		include template('page/mall/mall_index');	
		display();
	}
	
	/* Get the mall info. */
	public function show()
	{
		global $_FANWE;
		$id = (int)$_FANWE['request']['mid'];
		//if(!$id)
		//	exit;
		
		$mall = FDB::fetchFirst('SELECT * FROM '.FDB::table('mall').' WHERE mall_id = '.$id);
		//$mall = FDB::fetchFirst('SELECT * FROM '.FDB::table('mall').' WHERE mall_id = 28');
		//if(!$mall)
		//	fHeader("location: ".FU('mall/index'));
		
		$_FANWE['nav_title'] = $mall['name'].' - '.$_FANWE['nav_title'];
		
		$page_args['mid'] = $id;
		
		$page_size = 20;
		$pager = buildPage('mall/show',$page_args,0,$_FANWE['page'],$page_size);
		
		$fuckyou = 'fuckyou ';
		//dump($fuckyou);
		
		//Get the brand cate.
		$sql = 'SELECT * FROM '.FDB::table('brandcategory');
		$res = FDB::query($sql);
		$bcategory = array();
		while($data = FDB::fetch($res))
		{
			$bcategory[$data['id']] = $data;
		}
		
		//Get the mall's discount.
		$bcid = (int)$_FANWE['request']['bcid'];
		
		$sql = 'SELECT d.*,b.blogo AS blogo,b.bid as bid,b.bname as bname 
			FROM '.FDB::table('discount').' AS d 
			LEFT JOIN '.FDB::table('brand').' AS b ON b.bid = d.d_brandid where d.d_mallid='.$id;
			
		if($bcid > 0)  {
			$sql = 'SELECT d.*,b.blogo AS blogo,b.bid as bid, b.bname as bname 
			FROM '.FDB::table('discount').' d,'.FDB::table('brand').' b 
			where b.bid = d.d_brandid and b.cate_id='.$bcid .' and d.d_mallid='.$id;
			//$page_args['bcid'] = $bcid;
		}
		
		$res = FDB::query($sql);
		$dlist = array();
		while($data = FDB::fetch($res))
		{
			$dlist[$data['did']] = $data;
		}
		
		//Get this discount's comments.
		$sql = "SELECT * FROM ".FDB::table('comments')." WHERE type='mall' and parentid = ".$id." order by id desc ";
		
		$res = FDB::query($sql);
		$clist = array();
		while($data = FDB::fetch($res))
		{
			$data['time'] = getBeforeTimelag($data['ctime']);
			$clist[$data['id']] = $data;
		}
		
		include template('page/mall/mall_show');
		display();
	}
}
?>