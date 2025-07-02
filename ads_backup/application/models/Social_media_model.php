<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Social_media_model extends CI_Model 
{ 
function __construct()
{
parent::__construct();
}

function get_social_media($id,$table)
{
try{
return $this->db->get_where($table, array('id'=>$id))->row_array();
} catch (Exception $ex) {
throw new Exception('Social_media_model Model : Error in get_social_media function - ' . $ex);
}  
}
/*
* Get social_media by  column name
*/ 
function get_social_mediabyclm_name($clm_name,$clm_value)
{
try{
return $this->db->get_where('social_media',array($clm_name=>$clm_value))->row_array();
} catch (Exception $ex) {
throw new Exception('Social_media_model Madel : Error in get_social_mediabyclm_name function - ' . $ex);
}  
}
/*
* Get All social_media count 
*/ 
function get_all_social_media_count()
{
try{
$this->db->from('social_media');
return $this->db->count_all_results();
} catch (Exception $ex) {
throw new Exception('Social_media_model model : Error in get_all_social_media_count function - ' . $ex);
}  
}
/*
* Get All with associated tables join social_mediacount 
*/ 
function get_all_with_asso_social_media()
{
try{
$query = $this->db->get(); 
if($query->num_rows() != 0){
return $query->result_array();
}else{
return false;
}
} catch (Exception $ex) {
throw new Exception('Social_media_model model : Error in get_all_with_asso_social_media function - ' . $ex);
}  
}
/*
* Get all social_media 
*/ 
function get_all_social_media($table,$params = array())
{
try{
$this->db->order_by('id', 'desc');
if(isset($params) && !empty($params)){
$this->db->limit($params['limit'], $params['offset']);
}
return $this->db->get($table)->result_array();
} catch (Exception $ex) {
throw new Exception('Social_media_model model : Error in get_all_social_media function - ' . $ex);
}  
} 
/*
* function to add new social_media 
*/
function add_social_media($params,$table)
{
try{
$this->db->insert($table,$params);
return $this->db->insert_id();
} catch (Exception $ex) {
throw new Exception('Social_media_model model : Error in add_social_media function - ' . $ex);
}  
}
/* 
* function to update social_media 
*/
function update_social_media($id,$params,$table)
{
try{
$this->db->where('id',$id);
return $this->db->update($table,$params);
} catch (Exception $ex) {
throw new Exception('Social_media_model model : Error in update_social_media function - ' . $ex);
}  
}
/* 
* function to delete social_media 
*/
function delete_social_media($id,$table)
{
try{
return $this->db->delete($table,array('id'=>$id));
} catch (Exception $ex) {
throw new Exception('Social_media_model model : Error in delete_social_media function - ' . $ex);
}  
}



}
