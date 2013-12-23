<?php

/*****************************************************************************\
 * 说明: 用户模型类                             								  	 *
\*****************************************************************************/

class link_model extends CI_Model {
	
	//var $session;	// SESSION对象
	private $MX_DB;
	
	
	// 构造函数
    function __construct()
    {
        parent::__construct();
		$this->load->database();
    }

	public function  insert($scholar,$link){
		$data =array('res_link'=>$link,
					'res_scholar_id'=>$scholar,
					'res_regdate'=>date("Y-m-d H:i:s"));
		$this->db->insert('resourcetb',$data);
		return $this->db->insert_id();
	}

	function getlinkInfo($id)
	{
		$sql="SELECT * FROM h_resourcetb WHERE res_scholar_id='".$id."'";
		$query =$this->db->query($sql);
		$rows = $query->result_array();
		return  $rows;
	}

    public function remove($edit_id)
    {
		return $this->db->delete('resourcetb', array('res_scholar_id'=>$edit_id)); 
    }

}

?>