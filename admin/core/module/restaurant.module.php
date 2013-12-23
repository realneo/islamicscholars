<?php
class RestaurantModule
{
	public function index()
	{
		global $_FANWE;
		//$cache_file = getTplCache('page/brand/brand_index',$_FANWE['request'],2);
		// Jiao 0622.
		
		$res_count =250;
		$bcate_list = array();
		
		//Get the brandgroup .
		$sql = 'SELECT * FROM '.FDB::table('rescategory').' ORDER BY sort ASC,id DESC ';
		$res = FDB::query($sql);
		
		while($data = FDB::fetch($res))
		{
			//$mgname = fStripslashes(unserialize($data['name']));
			//$data['name'] = $mgname;
			//$data['url'] = FU('brand/show',array('id'=>$data['id']));
			$bcate_list[$data['id']] = $data;
		}
		
		
		//Get the brands.
		$where =' where 1=1 ';
		$cid = (int)$_FANWE['request']['cid'];
		if($cid > 0)  {
			$where .= ' AND cateid = '.$cid;
			$page_args['cid'] = $cid;
		}
		
		$sql = 'SELECT COUNT(id) FROM '.FDB::table('restaurant');
		$res_count = FDB::resultFirst($sql);
		
		$page_size = 20;
		$pager = buildPage('restaurant/index',$page_args,$res_count,$_FANWE['page'],$page_size);
		
		$sql2 = 'SELECT * FROM '.FDB::table('restaurant').$where.' ORDER BY sort ASC,id DESC LIMIT '.$pager['limit'];
		$res_list = array();

		/**/
		//dump(fuck);
		$res2 = FDB::query($sql2);
		//dump(fuck);
		while($data2 = FDB::fetch($res2))
		{
			$res_list[$data2['id']] = $data2;
		}
					
		include template('page/restaurant/restaurant_index');	
		display();
	}
	
	
	public function show()
	{
		global $_FANWE;
		$id = (int)$_FANWE['request']['id'];
		//if(!$id)
		//	exit;
		
		$res = FDB::fetchFirst('SELECT * FROM '.FDB::table('restaurant').' WHERE id = '.$id);
		//$brand = FDB::fetchFirst('SELECT * FROM '.FDB::table('brand').' WHERE brand_id = 28');
		//if(!$brand)
		//	fHeader("location: ".FU('brand/index'));
		
		$_FANWE['nav_title'] = $res['name'].' - '.$_FANWE['nav_title'];
		
		$page_args['id'] = $id;
		
		$page_size = 20;
		$pager = buildPage('restaurant/show',$page_args,0,$_FANWE['page'],$page_size);
		
		$fuckyou = 'fuckyou ';
		//dump($fuckyou);
				
		
		//Get the res's item.
		$sql = 'SELECT * from meixun_resitem where parent_id='.$id;
		
		$r = FDB::query($sql);
		$rilist = array();
		while($data = FDB::fetch($r))
		{
			$rilist[$data['id']] = $data;
		}
		
		//Get the res's discount.
		$sql =  'SELECT * from meixun_rdiscount where resid='.$id;
		
		$r = FDB::query($sql);
		$dlist = array();
		while($data = FDB::fetch($r))
		{
			$dlist[$data['id']] = $data;
		}
		
		
		//Get this discount's comments.
		$sql = "SELECT * FROM ".FDB::table('comments')." WHERE type='res' and parentid = ".$id." order by id desc ";
		
		$res1 = FDB::query($sql);
		$clist = array();
		while($data = FDB::fetch($res1))
		{
			$data['time'] = getBeforeTimelag($data['ctime']);
			$clist[$data['id']] = $data;
		}
		include template('page/restaurant/restaurant_show');
		display();
	}
}
?>