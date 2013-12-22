<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Library_model extends CI_Model 
{

	function __construct()
	{
	    // Call the Model constructor
	    parent::__construct();
	}
	
	public function get_articles()
	{
        $query = $this->db->order_by('lib_id', 'desc ');
        $query = $this->db->where('lib_type', 'article');
        $query = $this->db->get('h_librarytb');
	    if($query->num_rows() > 0)
	    {
	        foreach ($query->result() as $row) 
	        {
	            $data[] = $row;
	        }
	        return $data;
	    }
	}
    
    public function get_books()
	{
        $query = $this->db->order_by('lib_id', 'desc ');
        $query = $this->db->where('lib_type', 'book');
        $query = $this->db->get('h_librarytb');
	    if($query->num_rows() > 0)
	    {
	        foreach ($query->result() as $row) 
	        {
	            $data[] = $row;
	        }
	        return $data;
	    }
	}
    
    public function get_audios()
	{
        $query = $this->db->order_by('lib_id', 'desc ');
        $query = $this->db->where('lib_type', 'audio');
        $query = $this->db->get('h_librarytb');
	    if($query->num_rows() > 0)
	    {
	        foreach ($query->result() as $row) 
	        {
	            $data[] = $row;
	        }
	        return $data;
	    }
	}
    
    public function get_videos()
	{
        $query = $this->db->order_by('lib_id', 'desc ');
        $query = $this->db->where('lib_type', 'video');
        $query = $this->db->get('h_librarytb');
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