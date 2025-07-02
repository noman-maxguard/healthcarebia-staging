<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Email_settings_model extends CI_Model 
{ 
     function __construct()
      {
          parent::__construct();
      }

      function get_email_settings($id,$table)
      {
       
           return $this->db->get_where($table,array('id'=>$id))->row_array();
            
      }


   
      function get_all_email_settings($params = array())
      {
       
              $this->db->order_by('id', 'desc');
              if(isset($params) && !empty($params)){
               $this->db->limit($params['limit'], $params['offset']);
              }
               return $this->db->get('email_settings')->result_array();
             
      } 
   
      function add_email_settings($params,$table)
      {
        
          $this->db->insert($table,$params);
          return $this->db->insert_id();
             
      }
 
      function update_email_settings($id,$params,$table)
      {
        
            $this->db->where('id',$id);
            return $this->db->update($table,$params);
            
       }
     
 }
