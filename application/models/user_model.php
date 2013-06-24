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
		$sql="SELECT * FROM h_usertb ";
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
		$sql="SELECT * FROM h_usertb ";
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
		$sql="SELECT * FROM h_usertb WHERE user_id='".$id."'";
		$query =$this->db->query($sql);
		$row=$query->row_array();
		return  $row;
	}

	function getuserInfo_email($email)
	{
		$sql="SELECT * FROM h_usertb WHERE user_email='".$email."'";
		$query =$this->db->query($sql);
		$row=$query->row_array();
		return  $row;
	}

	function getuserInfo_login($email, $pwd)
	{
		$sql="SELECT * FROM h_usertb WHERE user_email='".$email."' and user_pwd='".$pwd."'";
		$query =$this->db->query($sql);
		$row=$query->row_array();
		return  $row;
	}
	
	public function  insert($firstname,$lastname,$email,$password)
	{
		$data =array('user_first_name'=>$firstname,
					'user_last_name'=>$lastname,
					'user_email'=>$email,
					'user_pwd'=>$password,
					'user_reg_dage'=>date("Y-m-d H:i:s"));
		$result = $this->db->insert('usertb',$data);
//		return $this->db->insert_id();
		return $result;
	}

    public function remove($edit_id)
    {
		return $this->db->delete('usertb', array('user_id'=>$edit_id)); 
    }

}

?>