<?php

/*****************************************************************************\
 * 说明: 用户模型类                             								  	 *
\*****************************************************************************/

class calendar_model extends CI_Model {
	
	//var $session;	// SESSION对象
	private $MX_DB;
	
	
	// 构造函数
    function __construct()
    {
        parent::__construct();
		$this->load->database();
    }

	function get_datas()
	{
		$sql="SELECT * FROM h_calendartb ";
		$query =$this->db->query($sql);
		$rows = $query->result_array();
		return $rows;
	}

	public function  insert($year,$month,$day,$hour,$minute,$second){
		$data =array('cld_year'=>$year,
					'cld_month'=>$month,
					'cld_day'=>$day,
					'cld_hour'=>$hour,
					'cld_minute'=>$minute,
					'cld_second'=>$second,
					'cld_cur_time'=>date("Y-m-d H:i:s"));
		$this->db->insert('calendartb',$data);
		return $this->db->insert_id();
	}


    public function remove()
    {
		$sql="DELETE FROM h_calendartb ";
		$query =$this->db->query($sql);
    }

}

?>