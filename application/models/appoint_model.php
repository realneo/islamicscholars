<?php

/*****************************************************************************\
 * 说明: 用户模型类                             								  	 *
\*****************************************************************************/

class appoint_model extends CI_Model {
	
	//var $session;	// SESSION对象
	private $MX_DB;
	
	
	// 构造函数
    function __construct()
    {
        parent::__construct();
		$this->load->database();
    }

	function get_appoints($limit,$offset)
	{
		$sql = "select h_appointtb.*,
			(select  user_last_name from h_usertb where h_usertb.user_id = h_appointtb.apt_user_id) as apt_user_last_name,
			(select  user_first_name from h_usertb where h_usertb.user_id = h_appointtb.apt_user_id) as apt_user_first_name
			from h_appointtb order by apt_reg_date desc ";
		$sql=$sql. " limit ".$limit." offset ".$offset;
		$query =$this->db->query($sql);
		$rows = $query->result_array();
		foreach($rows as $key => $value){
			$rows[$key]["apt_date"] = date("Y-m-d", strtotime($value["apt_date"]));
			 $strlen = mb_strlen($value["apt_content"], "UTF-8");
			 $echoStr = mb_substr($value["apt_content"], 0, 50, "UTF-8");
			 if($strlen > 50)
				$echoStr .= "...";
			$rows[$key]["apt_content"] = $echoStr;
		}
		
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

	function get_appoints_count()
	{
		$sql="SELECT * FROM h_appointtb ";

		$query =$this->db->query($sql);
		return $query->num_rows();
	}

	/**
	 * 根据明星ID获取明星信息
	 *
	 * @param unknown_type $starid
	 * @return unknown
	 */
	function getappointInfo($id)
	{
		$sql="select h_appointtb.*,
			(select  user_last_name from h_usertb where h_usertb.user_id = h_appointtb.apt_user_id) as apt_user_last_name,
			(select  user_first_name from h_usertb where h_usertb.user_id = h_appointtb.apt_user_id) as apt_user_first_name
			 from h_appointtb WHERE apt_id='".$id."'";
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
		$this->db->insert('appointtb',$data);
		return $this->db->insert_id();
	}


	public function update($edit_id,$state, $name){
		$where = array("apt_id"=>$edit_id);
		$data =array('apt_admin_name'=>$name,
					'apt_state'=>$state);

		$this->db->where($where);
		$this->db->update('appointtb',$data);
	}	

    public function remove($edit_id)
    {
		return $this->db->delete('appointtb', array('apt_id'=>$edit_id)); 
    }

}

?>