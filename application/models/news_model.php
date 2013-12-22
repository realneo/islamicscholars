<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_model extends CI_Model 
{

	function __construct()
	{
	    // Call the Model constructor
	    parent::__construct();
	}
	
	public function get_news($limit)
	{
        $query = $this->db->order_by('news_date', 'desc ');
        $query = $this->db->get('h_newstb', $limit);
	    if($query->num_rows() > 0)
	    {
	        foreach ($query->result() as $row) 
	        {
	            $data[] = $row;
	        }
	        return $data;
	    }
	}
    
    public function get_news_item($id)
    {
        $query = $this->db->get_where('h_newstb', array('news_id' => $id));
        if($query->num_rows() > 0)
	    {
	        foreach ($query->result() as $row) 
	        {
	            $data[] = $row;
	        }
	        return $data;
	    }
    }
}