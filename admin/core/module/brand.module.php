<?php
class BrandModule
{
	public function index()
	{
		global $_FANWE;
		//$cache_file = getTplCache('page/brand/brand_index',$_FANWE['request'],2);
		// Jiao 0622.
		
		$brand_count =250;
		$bcate_list = array();
		
		$bcate_listall = array();
		
		//Get the brandgroup .
		$sql = 'SELECT * FROM '.FDB::table('brandcategory').' ORDER BY sort ASC,id ASC ';
		$res = FDB::query($sql);
		
		while($data = FDB::fetch($res))
		{
			//$mgname = fStripslashes(unserialize($data['name']));
			//$data['name'] = $mgname;
			//$data['url'] = FU('brand/show',array('id'=>$data['id']));
			$bcate_list[$data['id']] = $data;
			
			/**/
			//addings.
			$bcate_list2 = array();
			$bcate_list2['id'] = $data['id'];
			$bcate_list2['name'] = $data['name'];
			
			$sql2 = 'SELECT COUNT(bid) FROM meixun_brand where cate_id='.$data['id'];
			error_log('[brand.module.php]sql2 is:'.$sql2,0);
			$brand_count2 = FDB::resultFirst($sql2);
			$bcate_list2['dcount'] = $brand_count2;
						
			$sql3 = 'SELECT * FROM meixun_brand where cate_id='.$data['id'].' ORDER BY sort ASC,bid DESC LIMIT 6 ';
			error_log('[brand.module.php]sql3 is:'.$sql3,0);
			
			$brand_list3 = array();
			$res3 = FDB::query($sql3);
			
			while($data3 = FDB::fetch($res3))
			{
				$brand_list3[$data3['bid']] = $data3;
			}
			$bcate_list2['dbrands'] = $brand_list3;
			
			
			$bcate_listall[$data['id']] = $bcate_list2;
			//end addings.
			
		}
		
		
		
		//Get the brands.
		$where =' where 1=1 ';
		$cid = (int)$_FANWE['request']['cid'];
		if($cid > 0)  {
			$where .= ' AND cate_id = '.$cid;
			$page_args['cid'] = $cid;
		}
		
		$sql = 'SELECT COUNT(bid) FROM '.FDB::table('brand');
		$brand_count = FDB::resultFirst($sql);
		
		$page_size = 20;
		$pager = buildPage('brand/index',$page_args,$brand_count,$_FANWE['page'],$page_size);
		
		$sql2 = 'SELECT * FROM '.FDB::table('brand').$where.' ORDER BY sort ASC,bid DESC LIMIT '.$pager['limit'];
		$brand_list = array();

		/**/
		//dump(fuck);
		$res2 = FDB::query($sql2);
		//dump(fuck);
		while($data2 = FDB::fetch($res2))
		{
			$brand_list[$data2['bid']] = $data2;
		}
					
		include template('page/brand/brand_index');	
		display();
	}
	
	
	public function indext()
	{
		global $_FANWE;
		//$cache_file = getTplCache('page/brand/brand_index',$_FANWE['request'],2);
		// Jiao 0622.
		
		$brand_count =250;
		$bcate_list = array();
		
		$bcate_listall = array();
		
		//Get the brandgroup .
		$sql = 'SELECT * FROM '.FDB::table('brandcategory').' ORDER BY sort ASC,id ASC ';
		$res = FDB::query($sql);
		
		while($data = FDB::fetch($res))
		{
			//$mgname = fStripslashes(unserialize($data['name']));
			//$data['name'] = $mgname;
			//$data['url'] = FU('brand/show',array('id'=>$data['id']));
			$bcate_list[$data['id']] = $data;
			
			/*
			//addings.
			$bcate_list2 = array();
			$bcate_list2['id'] = $data['id'];
			$bcate_list2['name'] = $data['name'];
			
			$sql2 = 'SELECT COUNT(bid) FROM meixun_brand where cate_id='.$data['id'];
			error_log('[brand.module.php]sql2 is:'.$sql2,0);
			$brand_count2 = FDB::resultFirst($sql2);
			$bcate_list2['dcount'] = $brand_count2;
						
			$sql3 = 'SELECT * FROM meixun_brand where cate_id='.$data['id'].' ORDER BY sort ASC,bid DESC LIMIT 5 ';
			error_log('[brand.module.php]sql3 is:'.$sql3,0);
			
			$brand_list3 = array();
			$res3 = FDB::query($sql3);
			
			while($data3 = FDB::fetch($res3))
			{
				$brand_list3[$data3['bid']] = $data3;
			}
			$bcate_list2['dbrands'] = $brand_list3;
			
			
			$bcate_listall[$data['id']] = $bcate_list2;
			//end addings.
			*/
		}
		
		
		
		//Get the brands.
		$where =' where 1=1 ';
		$cid = (int)$_FANWE['request']['cid'];
		if($cid > 0)  {
			$where .= ' AND cate_id = '.$cid;
			$page_args['cid'] = $cid;
		}
		
		$sql = 'SELECT COUNT(bid) FROM '.FDB::table('brand');
		$brand_count = FDB::resultFirst($sql.$where);
		
		$page_size = 20;
		$pager = buildPage('brand/index',$page_args,$brand_count,$_FANWE['page'],$page_size);
		
		$sql2 = 'SELECT * FROM '.FDB::table('brand').$where.' ORDER BY sort ASC,bid DESC LIMIT '.$pager['limit'];
		$brand_list = array();

		/**/
		//dump(fuck);
		$res2 = FDB::query($sql2);
		//dump(fuck);
		while($data2 = FDB::fetch($res2))
		{
			$brand_list[$data2['bid']] = $data2;
		}
					
		include template('page/brand/brand_indext');	
		display();
	}
	
	/* Get the brand's discount info. */
	public function show()
	{
		global $_FANWE;
		$id = (int)$_FANWE['request']['bid'];
		//if(!$id)
		//	exit;
		
		$brand = FDB::fetchFirst('SELECT * FROM '.FDB::table('brand').' WHERE bid = '.$id);
		//$brand = FDB::fetchFirst('SELECT * FROM '.FDB::table('brand').' WHERE brand_id = 28');
		//if(!$brand)
		//	fHeader("location: ".FU('brand/index'));
		
		$_FANWE['nav_title'] = $brand['bname'].' - '.$_FANWE['nav_title'];
		
		$page_args['bid'] = $id;
		
		$page_size = 20;
		$pager = buildPage('brand/show',$page_args,0,$_FANWE['page'],$page_size);
		
		$fuckyou = 'fuckyou ';
		//dump($fuckyou);
				
		//Get the brand's discount.
		$sql = 'SELECT d.*,m.logo AS mlogo,m.name as mname 
			FROM '.FDB::table('discount').' d,'.FDB::table('mall').' m
			where d.d_mallid = m.mall_id and d.d_brandid='.$id;
		
		$res = FDB::query($sql);
		$dlist = array();
		while($data = FDB::fetch($res))
		{
			$dlist[$data['did']] = $data;
		}
		
		
		//Get the brand's sharing goods info.
		//Guang 0701.
		$sg_list = array();
		$org_bname = $brand['bname'];
		$findme   = '|';
		$pos = strpos($org_bname, $findme);

		$b_en = trim(substr($org_bname,0,$pos) );
		$b_cn = trim(substr($org_bname,$pos+1) );
		$sql = "SELECT * from meixun_share where brand like '%".$b_en."%' or brand like '%".$b_cn."%'";
		
		$res = FDB::query($sql);
		while($data = FDB::fetch($res))
		{
			$tempa = array('id','content','title');
			$tempa['id'] = $data['share_id'];
			$tempa['content'] = $data['content'];
			
			if( strcmp ($data['share_data'],'goods')==0 ) {
				//var_dump($data['share_id']);
				$sql = "SELECT goods_id from meixun_share_goods where share_id=".$data['share_id'];
				$rec1 = FDB::fetchFirst($sql);
				
				$tempa['title']= '../note.php?action=g&sid='.$data['share_id'].'&id='.$rec1['goods_id'];
			}
			/**/
			elseif (strcmp ($data['share_data'],'photo')==0){
				$sql = "SELECT id from meixun_share_photo where share_id=".$data['share_id'];
				$rec1 = FDB::fetchFirst($sql);
				
				$tempa['title']= '../note.php?action=m&sid='.$data['share_id'].'&id='.$rec1['id'];
			}
			
			$sg_list[$data['share_id']] = $tempa;
		}
		
		
		//Get this discount's comments.
		$sql = "SELECT * FROM ".FDB::table('comments')." WHERE type='brand' and parentid = ".$id." order by id desc ";
		
		$res = FDB::query($sql);
		$clist = array();
		while($data = FDB::fetch($res))
		{
			$data['time'] = getBeforeTimelag($data['ctime']);
			$clist[$data['id']] = $data;
		}
		
		include template('page/brand/brand_show');
		display();
	}
}
?>