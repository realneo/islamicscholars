<?php

/*****************************************************************************\
 * 说明: 用户模型类                             								  	 *
\*****************************************************************************/

class query_model extends CI_Model {
	
	//var $session;	// SESSION对象
	private $MX_DB;
	
	
	// 构造函数
    function __construct()
    {
        parent::__construct();
		$this->load->database();
    }

	function get_queries($limit,$offset)
	{
		$sql = "select h_querytb.*,
			(select  user_last_name from h_usertb where h_usertb.user_id = h_querytb.qu_user_id) as qu_user_last_name,
			(select  user_first_name from h_usertb where h_usertb.user_id = h_querytb.qu_user_id) as qu_user_first_name
			from h_querytb order by qu_date desc ";
		$sql=$sql. " limit ".$limit." offset ".$offset;
		$query =$this->db->query($sql);
		$rows = $query->result_array();
		foreach($rows as $key => $value){
			$rows[$key]["qu_date"] = date("Y-m-d", strtotime($value["qu_date"]));
			 $strlen = mb_strlen($value["qu_content"], "UTF-8");
			 $echoStr = mb_substr($value["qu_content"], 0, 50, "UTF-8");
			 if($strlen > 50)
				$echoStr .= "...";
			$rows[$key]["qu_content"] = $echoStr;
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

	function get_queries_count()
	{
		$sql="SELECT * FROM h_querytb ";

		$query =$this->db->query($sql);
		return $query->num_rows();
	}

	/**
	 * 根据明星ID获取明星信息
	 *
	 * @param unknown_type $starid
	 * @return unknown
	 */
	function getqueryInfo($id)
	{
		$sql="select h_querytb.*,
			(select  user_last_name from h_usertb where h_usertb.user_id = h_querytb.qu_user_id) as qu_user_last_name,
			(select  user_first_name from h_usertb where h_usertb.user_id = h_querytb.qu_user_id) as qu_user_first_name
			 from h_querytb WHERE qu_id='".$id."'";
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
		$this->db->insert('querytb',$data);
		return $this->db->insert_id();
	}


	public function update($edit_id, $name,$answer){
		$where = array("qu_id"=>$edit_id);
		$data =array('qu_answer_name'=>$name,
					'qu_answer_content'=>$answer,
					'qu_answer_date'=>date("Y-m-d H:i:s"));

		$this->db->where($where);
		$this->db->update('querytb',$data);
	}	

    public function remove($edit_id)
    {
		return $this->db->delete('querytb', array('qu_id'=>$edit_id)); 
    }

	public function get_queries_answered($limit,$offset)
	{
		$sql = "select * from h_querytb where qu_answer_content <> '' order by qu_answer_date desc ";
		$sql=$sql. " limit ".$limit." offset ".$offset;
		$query =$this->db->query($sql);
		$rows = $query->result_array();
		foreach($rows as $key => $value){
			$rows[$key]["qu_date"] = date("Y-m-d", strtotime($value["qu_date"]));
			 $strlen = mb_strlen($value["qu_content"], "UTF-8");
			 $echoStr = mb_substr($value["qu_content"], 0, 70, "UTF-8");
			 if($strlen > 70)
				$echoStr .= "...";
			$rows[$key]["qu_content"] = $echoStr;
		}
		
		if($query->num_rows()>0)return $rows;
	}
}

?>