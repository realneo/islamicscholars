<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About_model extends CI_Model 
{
    public function __construct() 
    {
        parent::__construct();
    }
    
    public function get_about()
    {
            $query = $this->db->get('about_us');
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