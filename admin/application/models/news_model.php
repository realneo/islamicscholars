<?php

/*****************************************************************************\
 * 说明: 用户模型类                             								  	 *
\*****************************************************************************/

class news_model extends CI_Model {
	
	//var $session;	// SESSION对象
	private $MX_DB;
	
	
	// 构造函数
    function __construct()
    {
        parent::__construct();
		$this->load->database();
    }

	function get_news($limit,$offset)
	{
		$sql="SELECT * FROM h_newstb ";
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

	function get_news_count()
	{
		$sql="SELECT * FROM h_newstb ";
		$query =$this->db->query($sql);
		return $query->num_rows();
	}

	/**
	 * 根据明星ID获取明星信息
	 *
	 * @param unknown_type $starid
	 * @return unknown
	 */
	function getnewsInfo($id)
	{
		$sql="SELECT * FROM h_newstb WHERE news_id='".$id."'";
		$query =$this->db->query($sql);
		$row=$query->row_array();
		return  $row;
	}
	
	public function  insert($name,$brief,$description,$date){
		$data =array('news_title'=>$name,
					'news_brief'=>$brief,
					'news_date'=>$date,
					'news_content'=>$description,
					'news_regdate'=>date("Y-m-d H:i:s"));
		$this->db->insert('newstb',$data);
		return $this->db->insert_id();
	}


	public function update($news_id,$name,$brief,$description,$date){
		$where = array("news_id"=>$news_id);
		$data =array('news_title'=>$name,
					'news_brief'=>$brief,
					'news_date'=>$date,
					'news_content'=>$description,
					'news_regdate'=>date("Y-m-d H:i:s"));
		$this->db->where($where);
		$this->db->update('newstb',$data);
	}	

    public function remove($edit_id)
    {
		return $this->db->delete('newstb', array('news_id'=>$edit_id)); 
    }

}

?>