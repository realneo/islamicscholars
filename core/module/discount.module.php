<?php
class DiscountModule
{
	public function index()
	{
		global $_FANWE;
		//Get the most discounting's brands.
		$sql = 'SELECT * FROM '.FDB::table('brand').' ORDER BY records DESC,sort ASC limit 10';
		
		$fuckyou = 'fuckyou ';
		//dump($fuckyou);
		$res = FDB::query($sql);
		$blist = array();
		while($data = FDB::fetch($res))
		{
			$blist[$data['bid']] = $data;
		}
		
		//Get the most discounting's malls.
		$sql = 'SELECT * FROM '.FDB::table('mall').' ORDER BY discounts DESC,sort ASC limit 10';
		
		$res = FDB::query($sql);
		$mlist = array();
		while($data = FDB::fetch($res))
		{
			$mlist[$data['mall_id']] = $data;
		}
		
		//Get the newest discounts.
		$sql = 'SELECT COUNT(did) FROM '.FDB::table('discount');
		$brand_count = FDB::resultFirst($sql);
		
		$page_size = 15;
		$pager = buildPage('discount/index',$page_args,$brand_count,$_FANWE['page'],$page_size);
		
		$sql2 = 'SELECT d.*,b.blogo AS blogo,b.bname as bname,m.name as mname 
			FROM '.FDB::table('discount').' d,'.FDB::table('mall').' m,'.FDB::table('brand').' b 
			where d.d_mallid = m.mall_id and d.d_brandid=b.bid ';
		$dlist = array();

		/**/
		//dump(fuck);
		$res2 = FDB::query($sql2);
		//dump(fuck);
		while($data2 = FDB::fetch($res2))
		{
			$dlist[$data2['did']] = $data2;
		}	
		include template('page/discount/discount_index');	
		display();
	}
	
	/* Get the brand's discount info. */
	public function show()
	{
		global $_FANWE;
		
		//Get the most discounting's brands.
		$sql = 'SELECT * FROM '.FDB::table('brand').' ORDER BY records DESC,sort ASC limit 10';
		
		$fuckyou = 'fuckyou ';
		//dump($fuckyou);
		$res = FDB::query($sql);
		$blist = array();
		while($data = FDB::fetch($res))
		{
			$blist[$data['bid']] = $data;
		}
		
		//Get the most discounting's malls.
		$sql = 'SELECT * FROM '.FDB::table('mall').' ORDER BY discounts DESC,sort ASC limit 10';
		
		$res = FDB::query($sql);
		$mlist = array();
		while($data = FDB::fetch($res))
		{
			$mlist[$data['mall_id']] = $data;
		}
		
		//Get the discount's details.
		$id = (int)$_FANWE['request']['did'];
		//if(!$id)
		//	exit;
		
		$d = FDB::fetchFirst('SELECT d.*,b.bname as bname,m.name as mname 
			FROM '.FDB::table('discount').' d,'.FDB::table('mall').' m,'.FDB::table('brand').' b 
			where d.d_mallid = m.mall_id and d.d_brandid=b.bid and d.did='.$id);
		//$brand = FDB::fetchFirst('SELECT * FROM '.FDB::table('brand').' WHERE brand_id = 28');
		//if(!$brand)
		//	fHeader("location: ".FU('brand/index'));
		
		$_FANWE['nav_title'] = $d['dname'].' - '.$_FANWE['nav_title'];
				
		$fuckyou = 'fuckyou ';
		//dump($fuckyou);
		
		//Get the brand's discount.
		$sql = 'SELECT * FROM '.FDB::table('discount').' WHERE d_brandid = '.$d['d_brandid'];
		
		$res = FDB::query($sql);
		$dlist = array();
		while($data = FDB::fetch($res))
		{
			$dlist[$data['did']] = $data;
		}
		
		//Get this discount's comments.
		$sql = "SELECT * FROM ".FDB::table('comments')." WHERE type='discount' and parentid = ".$id." order by id desc ";
		
		$res = FDB::query($sql);
		$clist = array();
		while($data = FDB::fetch($res))
		{
			$data['time'] = getBeforeTimelag($data['ctime']);
			$clist[$data['id']] = $data;
		}
		
		
		include template('page/discount/discount_show');
		display();
	}
}
?>