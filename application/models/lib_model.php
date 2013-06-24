<?php

/*****************************************************************************\
 * 说明: 用户模型类                             								  	 *
\*****************************************************************************/

class lib_model extends CI_Model {
	
	//var $session;	// SESSION对象
	private $MX_DB;
	
	
	// 构造函数
    function __construct()
    {
        parent::__construct();
		$this->load->database();
    }

	function get_libs($limit,$offset)
	{
		$sql="SELECT * FROM h_librarytb ";
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

	function get_libs_count()
	{
		$sql="SELECT * FROM h_librarytb ";
		$query =$this->db->query($sql);
		return $query->num_rows();
	}

	/**
	 * 根据明星ID获取明星信息
	 *
	 * @param unknown_type $starid
	 * @return unknown
	 */
	function getlibInfo($id)
	{
		$sql="SELECT * FROM h_librarytb WHERE lib_id='".$id."'";
		$query =$this->db->query($sql);
		$row=$query->row_array();
		return  $row;
	}
	
	public function  insert($name,$description,$author,$image,$type,$libfile,$date){
		$data =array('lib_title'=>$name,
					'lib_desc'=>$description,
					'lib_author'=>$author,
					'lib_type'=>$type,
					'lib_date'=>$date,
					'lib_reg_date'=>date("Y-m-d H:i:s"));
		if($image != ""){
			$data['lib_cover_img'] = $image;
		}
		if($libfile != ""){
			$data['lib_file'] = $libfile;
		}
		$this->db->insert('librarytb',$data);
		return $this->db->insert_id();
	}


	public function update($lib_id,$name,$description,$author,$image,$type,$libfile,$date){
		$where = array("lib_id"=>$lib_id);
		$data =array('lib_title'=>$name,
					'lib_desc'=>$description,
					'lib_author'=>$author,
					'lib_type'=>$type,
					'lib_date'=>$date,
					'lib_reg_date'=>date("Y-m-d H:i:s"));
		if($image != ""){
			$data['lib_cover_img'] = $image;
		}
		if($libfile != ""){
			$data['lib_file'] = $libfile;
		}
		$this->db->where($where);
		$this->db->update('librarytb',$data);
	}	

    public function remove($edit_id)
    {
		return $this->db->delete('librarytb', array('lib_id'=>$edit_id)); 
    }

}

?>