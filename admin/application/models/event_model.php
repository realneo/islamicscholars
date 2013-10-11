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
		$sql="SELECT * FROM h_eventtb ";
		$sql=$sql. " limit ".$limit." offset ".$offset;
		$query =$this->db->query($sql);
		$rows = $query->result_array();
		if($query->num_rows()>0)return $rows;
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