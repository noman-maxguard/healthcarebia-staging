<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MDL_Profile extends CI_Model{

    function get_user_info($id)
    {
             $this->db->select('*'); 
             $this->db->from('admins');
             $this->db->where('id', $id);
             $query = $this->db->get();
             $result = $query->row();
             return $result;
    }
    
    
    function save_data($user_id,$data)
    {
       return $this->db
                ->where('id', $user_id)
                ->update("admins", $data);
    }
}
?>