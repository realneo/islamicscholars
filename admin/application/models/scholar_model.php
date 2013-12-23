<?php

/*****************************************************************************\
 * 说明: 用户模型类                             								  	 *
\*****************************************************************************/

class scholar_model extends CI_Model {
	
	//var $session;	// SESSION对象
	private $MX_DB;
	
	
	// 构造函数
    function __construct()
    {
        parent::__construct();
		$this->load->database();
    }

	function get_scholars($limit,$offset)
	{
		$sql="SELECT * FROM h_scholartb ";
		if($limit != "" && $offset != "")
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

	function get_scholars_count()
	{
		$sql="SELECT * FROM h_scholartb ";
		$query =$this->db->query($sql);
		return $query->num_rows();
	}

	/**
	 * 根据明星ID获取明星信息
	 *
	 * @param unknown_type $starid
	 * @return unknown
	 */
	function getscholarInfo($id)
	{
		$sql="SELECT * FROM h_scholartb WHERE sclar_id='".$id."'";
		$query =$this->db->query($sql);
		$row=$query->row_array();
		return  $row;
	}
	
	public function  insert($name,$date,$life,$image){
		if($image == ""){
			$data =array('sclar_name'=>$name,
						'sclar_birth'=>$date,
						'sclar_life'=>$life);
		}else{
			$data =array('sclar_name'=>$name,
						'sclar_birth'=>$date,
						'sclar_life'=>$life,
						'sclar_img'=>$image);
		}
		$this->db->insert('scholartb',$data);
		return $this->db->insert_id();
	}


	public function update($id,$name,$date,$life,$image){
		$where = array("sclar_id"=>$id);
		if($image == ""){
			$data =array('sclar_name'=>$name,
						'sclar_birth'=>$date,
						'sclar_life'=>$life);
		}else{
			$data =array('sclar_name'=>$name,
						'sclar_birth'=>$date,
						'sclar_life'=>$life,
						'sclar_img'=>$image);
		}
		$this->db->where($where);
		$this->db->update('scholartb',$data);
	}	

    public function remove($edit_id)
    {
		return $this->db->delete('scholartb', array('sclar_id'=>$edit_id)); 
    }

}

?>