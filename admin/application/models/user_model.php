<?php

/*****************************************************************************\
 * 说明: 用户模型类                             								  	 *
\*****************************************************************************/

class user_model extends CI_Model {
	
	//var $session;	// SESSION对象
	private $MX_DB;
	
	
	// 构造函数
    function __construct()
    {
        parent::__construct();
		$this->load->database();
    }

	function get_users($limit,$offset)
	{
		$sql="SELECT * FROM h_admintb ";
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

	function get_users_count()
	{
		$sql="SELECT * FROM h_admintb ";
		$query =$this->db->query($sql);
		return $query->num_rows();
	}

	/**
	 * 根据明星ID获取明星信息
	 *
	 * @param unknown_type $starid
	 * @return unknown
	 */
	function getuserInfo($id)
	{
		$sql="SELECT * FROM h_admintb WHERE admin_id='".$id."'";
		$query =$this->db->query($sql);
		$row=$query->row_array();
		return  $row;
	}
	
	public function  insert($username,$password){
		$data =array('admin_login_id'=>$username,
					'admin_pwd'=>$password,
					'admin_reg_dage'=>date("Y-m-d H:i:s"));
		$this->db->insert('admintb',$data);
		return $this->db->insert_id();
	}


	public function update($user_id,$username,$password){
		$where = array("admin_id"=>$user_id);
		$data =array('admin_login_id'=>$username,
					'admin_pwd'=>$password,
					'admin_reg_dage'=>date("Y-m-d H:i:s"));
		$this->db->where($where);
		$this->db->update('admintb',$data);
	}	

    public function remove($edit_id)
    {
		return $this->db->delete('admintb', array('admin_id'=>$edit_id)); 
    }

}

?>