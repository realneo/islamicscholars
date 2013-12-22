<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Events_model extends CI_Model 
{

	function __construct()
	{
	    // Call the Model constructor
	    parent::__construct();
	}
	
	public function get_events($limit)
	{
        $query = $this->db->order_by('evt_date', 'desc ');
        $query = $this->db->get('h_eventtb', $limit);
	    if($query->num_rows() > 0)
	    {
	        foreach ($query->result() as $row) 
	        {
	            $data[] = $row;
	        }
	        return $data;
	    }
	}
    
    public function get_event_item($id)
    {
        $query = $this->db->get_where('h_eventtb', array('evt_id' => $id));
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