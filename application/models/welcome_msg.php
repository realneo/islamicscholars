<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome_msg extends CI_Model 
{
    public function __construct() 
    {
        parent::__construct();
    }
    
    public function get_msg()
    {
        $query = $this->db->get('welcome_msg');
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