<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class User_log_model extends CI_Model 
{ 
     function __construct()
      {
          parent::__construct();
      }

      function get_user_log($id,$table)
      {
        
           return $this->db->get_where($table,array('id'=>$id))->row_array();
            
      }
 
     
      function get_all_user_log($table,$params = array())
      {
        
              $this->db->order_by('id', 'desc');
              if(isset($params) && !empty($params)){
               $this->db->limit($params['limit'], $params['offset']);
              }
               return $this->db->get($table)->result_array();
             
      } 
 
      function add_user_log($params)
      {
        
          $this->db->insert('user_log',$params);
        return $this->db->insert_id();
             
      }
  
      function update_user_log($id,$params)
      {
        
            $this->db->where('id',$id);
            return $this->db->update('user_log',$params);
             
       }

      
 }
