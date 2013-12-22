<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Questions_model extends CI_Model 
{

	function __construct()
	{
	    // Call the Model constructor
	    parent::__construct();
	}
	
	public function get_answered_questions($limit)
	{
        $query = $this->db->order_by('qu_id' , 'DESC' );
        $query = $this->db->where('qu_answered', 'yes');
        $query = $this->db->get('h_querytb', $limit);
	    if($query->num_rows() > 0)
	    {
	        foreach ($query->result() as $row) 
	        {
	            $data[] = $row;
	        }
	        return $data;
	    }
	}
    
    public function get_question($id)
	{
        $query = $this->db->order_by('qu_id' , 'DESC');
        $query = $this->db->where('qu_id' , $id);
        $query = $this->db->get('h_querytb');
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