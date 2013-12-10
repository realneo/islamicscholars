<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_model extends CI_Model {

	function __construct()
	{
	    // Call the Model constructor
	    parent::__construct();
	}
	
	public function get_news($order = 'DESC', $limit = '*', $offset = '')
	{
	    $query = $this->db->query("SELECT * FROM `h_newstb` ORDER BY `id` $order LIMIT $limit , $offset");
	    if($query->num_rows() > 0)
	    {
	    	foreach ($query->result() as $row) 
	    	{
	            $data['news'] = $row;
	        }
	        return $data;
	    }
	}
}