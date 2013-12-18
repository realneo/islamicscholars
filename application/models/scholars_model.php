<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Scholars_model extends CI_Model 
{

	function __construct()
	{
	    // Call the Model constructor
	    parent::__construct();
	}
	
	public function get_scholars($limit)
	{
        $query = $this->db->get('h_scholartb', $limit);
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