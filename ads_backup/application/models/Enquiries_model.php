<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Enquiries_model extends CI_Model 
{ 
 function __construct()
  {
      parent::__construct();
  }

  function get_enquiries($id,$table)
  {
    
       return $this->db->get_where($table,array('id'=>$id))->row_array();
        
  }
  


  function get_all_enquiries_count()
  {
   
       $this->db->from('enquiries');
       return $this->db->count_all_results();
        
  }


 
 
  function get_all_enquiries($table,$flag)
  {
    
          $this->db->order_by('id', 'desc');
          $this->db->where('flag',$flag);
        
           return $this->db->get($table)->result_array();
         
  }


  function add_enquiries($params,$table)
  {
    
      $this->db->insert($table,$params);
      return $this->db->insert_id();
        
  }
 
  function update_enquiries($id,$params,$table)
  {
    
        $this->db->where('id',$id);
        return $this->db->update($table,$params);
         
   }

}
