<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_model extends CI_Model 
{

	function __construct()
	{
	    // Call the Model constructor
	    parent::__construct();
	}
	
	public function get_all_news()
	{
	    $query = $this->db->get('h_newstb');
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