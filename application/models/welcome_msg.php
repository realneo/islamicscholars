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
    
    public function update_msg()
    {
        $data['welcome_msg'] = $this->post->welcome_msg; 
        $this->load->model('welcome_msg');
        
        $data = array('text' => $welcome_msg);

        $this->db->where('id', 1);
        $this->db->update('welcome_msg', $data);

    }
}