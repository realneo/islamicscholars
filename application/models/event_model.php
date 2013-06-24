<?php

/*****************************************************************************\
 * 说明: 用户模型类                             								  	 *
\*****************************************************************************/

class event_model extends CI_Model {
	
	//var $session;	// SESSION对象
	private $MX_DB;
	
	
	// 构造函数
    function __construct()
    {
        parent::__construct();
		$this->load->database();
    }

	function get_events($limit,$offset)
	{
		$sql="SELECT * FROM h_eventtb  order by evt_regdate desc ";
		$sql=$sql. " limit ".$limit." offset ".$offset;
		$query =$this->db->query($sql);
		$rows = $query->result_array();
		if($query->num_rows()>0)return $rows;
	}

	function getPastEvents($limit,$offset)
	{
		$sql="SELECT * FROM h_calendartb ";
		$query =$this->db->query($sql);
		$data = $query->result_array();

		if(count($data) > 0){
			$year = $data[0]["cld_year"];
			$month = $data[0]["cld_month"];
		}else{
			$year	= date("Y");
			$month 	= date("m");
		}

		if($month > 1)
			$month --;
		else{
			$year --;
			$month  = 12;
		}
		
		$temp = "2012-".$month."-01";	
		$month = date("m", strtotime($temp));
			
		$end_day = $year."-".$month."-31 17:59:59";

		$sql="SELECT * FROM h_eventtb where evt_date < '".$end_day."'  order by evt_regdate desc ";
		$sql=$sql. " limit ".$limit." offset ".$offset;
		$query =$this->db->query($sql);
		$rows = $query->result_array();

		foreach($rows as $key => $value){
			 $strlen = mb_strlen($value["evt_title"], "UTF-8");
			 $echoStr = mb_substr($value["evt_title"], 0, 30, "UTF-8");
			 if($strlen > 30)
				$echoStr .= "...";
			$rows[$key]["evt_title"] = $echoStr;
		}

		return $rows;
	}

	function getCurMonthEvents($limit,$offset)
	{
		$sql="SELECT * FROM h_calendartb ";
		$query =$this->db->query($sql);
		$data = $query->result_array();

		if(count($data) > 0){
			$year = $data[0]["cld_year"];
			$month = $data[0]["cld_month"];
		}else{
			$year	= date("Y");
			$month 	= date("m");
		}

		$temp = "2012-".$month."-01";	
		$month = date("m", strtotime($temp));

		$start_day = $year."-".$month."-01 18:00:00";
		$end_day = $year."-".$month."-31 17:59:59";

		$sql="SELECT * FROM h_eventtb where evt_date >= '".$start_day."' and evt_date < '".$end_day."'  order by evt_regdate desc ";
		$sql=$sql. " limit ".$limit." offset ".$offset;
		$query =$this->db->query($sql);
		$rows = $query->result_array();

		foreach($rows as $key => $value){
			 $strlen = mb_strlen($value["evt_title"], "UTF-8");
			 $echoStr = mb_substr($value["evt_title"], 0, 30, "UTF-8");
			 if($strlen > 30)
				$echoStr .= "...";
			$rows[$key]["evt_title"] = $echoStr;
		}
		
		return $rows;
	}

	function getNextMonthEvents($limit,$offset)
	{
		$sql="SELECT * FROM h_calendartb ";
		$query =$this->db->query($sql);
		$data = $query->result_array();

		if(count($data) > 0){
			$year = $data[0]["cld_year"];
			$month = $data[0]["cld_month"];
		}else{
			$year	= date("Y");
			$month 	= date("m");
		}

		if($month > 12){
			$year ++;
			$month  = 1;
		}else{
			$month++;
		}

		$temp = "2012-".$month."-01";	
		$month = date("m", strtotime($temp));

		$start_day = $year."-".$month."-01 18:00:00";
		$end_day = $year."-".$month."-31 17:59:59";

		$sql="SELECT * FROM h_eventtb where evt_date >= '".$start_day."' and evt_date < '".$end_day."'  order by evt_regdate desc ";
		$sql=$sql. " limit ".$limit." offset ".$offset;
		$query =$this->db->query($sql);
		$rows = $query->result_array();
		
		foreach($rows as $key => $value){
			 $strlen = mb_strlen($value["evt_title"], "UTF-8");
			 $echoStr = mb_substr($value["evt_title"], 0, 30, "UTF-8");
			 if($strlen > 30)
				$echoStr .= "...";
			$rows[$key]["evt_title"] = $echoStr;
		}
		
		return $rows;
	}

	/**
	 * 根据性别获取明星的人数
	 *
	 * @param unknown_type $sex
	 * @param unknown_type $area
	 * @param unknown_type $type
	 * @return unknown
	 */

	function get_events_count()
	{
		$sql="SELECT * FROM h_eventtb ";
		$query =$this->db->query($sql);
		return $query->num_rows();
	}

	/**
	 * 根据明星ID获取明星信息
	 *
	 * @param unknown_type $starid
	 * @return unknown
	 */
	function geteventInfo($id)
	{
		$sql="SELECT * FROM h_eventtb WHERE evt_id='".$id."'";
		$query =$this->db->query($sql);
		$row=$query->row_array();
		return  $row;
	}
	
	public function  insert($name,$venue,$description,$date,$image){
		if($image == ""){
			$data =array('evt_title'=>$name,
						'evt_venue'=>$venue,
						'evt_date'=>$date,
						'evt_desc'=>$description,
						'evt_regdate'=>date("Y-m-d H:i:s"));
		}else{
			$data =array('evt_title'=>$name,
						'evt_venue'=>$venue,
						'evt_date'=>$date,
						'evt_desc'=>$description,
						'evt_img'=>$image,
						'evt_regdate'=>date("Y-m-d H:i:s"));
		}
		$this->db->insert('eventtb',$data);
		return $this->db->insert_id();
	}


	public function update($evt_id,$name,$venue,$description,$date,$image){
		$where = array("evt_id"=>$evt_id);
		if($image == ""){
			$data =array('evt_title'=>$name,
						'evt_venue'=>$venue,
						'evt_date'=>$date,
						'evt_desc'=>$description,
						'evt_regdate'=>date("Y-m-d H:i:s"));
		}else{
			$data =array('evt_title'=>$name,
						'evt_venue'=>$venue,
						'evt_date'=>$date,
						'evt_desc'=>$description,
						'evt_img'=>$image,
						'evt_regdate'=>date("Y-m-d H:i:s"));
		}
		$this->db->where($where);
		$this->db->update('eventtb',$data);
	}	

    public function remove($edit_id)
    {
		return $this->db->delete('eventtb', array('evt_id'=>$edit_id)); 
    }

}

?>