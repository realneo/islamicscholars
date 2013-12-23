<?php
class TuanModule
{
	public function index()
	{
		global $_FANWE;
		//$cache_file = getTplCache('page/brand/brand_index',$_FANWE['request'],2);
		// Jiao 0622.
		
		$rd_count =250;
		
		$sql = 'SELECT COUNT(id) FROM '.FDB::table('tuan');
		$rd_count = FDB::resultFirst($sql);
		
		$page_size = 20;
		$pager = buildPage('tuan/index',$page_args,$rd_count,$_FANWE['page'],$page_size);
		
		$sql2 = 'SELECT * FROM '.FDB::table('tuan').$where.' ORDER BY sort ASC,id DESC LIMIT '.$pager['limit'];
		$res_list = array();

		/**/
		//dump(fuck);
		$res2 = FDB::query($sql2);
		//dump(fuck);
		while($data2 = FDB::fetch($res2))
		{
			$res_list[$data2['id']] = $data2;
		}
					
		include template('page/tuan/index');	
		display();
	}
	
	
}
?>