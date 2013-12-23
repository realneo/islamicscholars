<?php

/*****************************************************************************\
 * 说明: 用户模型类                             								  	 *
\*****************************************************************************/

class school_model extends CI_Model {
	
	//var $session;	// SESSION对象
	private $MX_DB;
	
	
	// 构造函数
    function __construct()
    {
        parent::__construct();
		$this->load->database();
    }

	public function  insert($scholar,$school){
		$data =array('schl_name'=>$school,
					'schl_id'=>$scholar,
					'schl_date'=>date("Y-m-d H:i:s"));
		$this->db->insert('schooltb',$data);
		return $this->db->insert_id();
	}

	function getschoolInfo($id)
	{
		$sql="SELECT * FROM h_schooltb WHERE schl_id='".$id."'";
		$query =$this->db->query($sql);
		$rows = $query->result_array();
		return  $rows;
	}

    public function remove($edit_id)
    {
		return $this->db->delete('schooltb', array('schl_id'=>$edit_id)); 
    }

}

?>