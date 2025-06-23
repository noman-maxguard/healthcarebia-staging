<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Settings_model extends CI_Model 
{ 
function __construct()
{
parent::__construct();
}


function get_settings($id,$table)
{
try{
return $this->db->get_where($table,array('id'=>$id))->row_array();
} catch (Exception $ex) {
throw new Exception('Settings_model Model : Error in get_settings function - ' . $ex);
}  
}
/*
* Get settings by  column name
*/ 
function get_settingsbyclm_name($clm_name,$clm_value)
{
try{
return $this->db->get_where('settings',array($clm_name=>$clm_value))->row_array();
} catch (Exception $ex) {
throw new Exception('Settings_model Madel : Error in get_settingsbyclm_name function - ' . $ex);
}  
}
/*
* Get All settings count 
*/ 
function get_all_settings_count()
{
try{
$this->db->from('settings');
return $this->db->count_all_results();
} catch (Exception $ex) {
throw new Exception('Settings_model model : Error in get_all_settings_count function - ' . $ex);
}  
}
/*
* Get All with associated tables join settingscount 
*/ 
function get_all_with_asso_settings()
{
try{
$query = $this->db->get(); 
if($query->num_rows() != 0){
return $query->result_array();
}else{
return false;
}
} catch (Exception $ex) {
throw new Exception('Settings_model model : Error in get_all_with_asso_settings function - ' . $ex);
}  
}
/*
* Get all settings 
*/ 
function get_all_settings($params = array())
{
try{
$this->db->order_by('id', 'desc');
if(isset($params) && !empty($params)){
$this->db->limit($params['limit'], $params['offset']);
}
return $this->db->get('settings')->result_array();
} catch (Exception $ex) {
throw new Exception('Settings_model model : Error in get_all_settings function - ' . $ex);
}  
} 
/*
* function to add new settings 
*/
function add_settings($params,$table)
{
try{
$this->db->insert($table,$params);
return $this->db->insert_id();
} catch (Exception $ex) {
throw new Exception('Settings_model model : Error in add_settings function - ' . $ex);
}  
}
/* 
* function to update settings 
*/
function update_settings($id,$params,$table)
{
try{
$this->db->where('id',$id);
return $this->db->update($table,$params);
} catch (Exception $ex) {
throw new Exception('Settings_model model : Error in update_settings function - ' . $ex);
}  
}
/* 
* function to delete settings 
*/
function delete_settings($id,$table)
{
try{
return $this->db->delete($table,array('id'=>$id));
} catch (Exception $ex) {
throw new Exception('Settings_model model : Error in delete_settings function - ' . $ex);
}  
}
/*
* Get settings by  column name where not in particular id
*/ 
function get_settingsbyclm_name_not_id($clm_name,$clm_value,$where_cond)
{
try{
$this->db->where('id!=', $where_cond);
return $this->db->get_where('settings',array($clm_name=>$clm_value))->row_array();
} catch (Exception $ex) {
throw new Exception('Settings_model model : Error in get_settingsbyclm_name_not_id function - ' . $ex);
}  
}
/*
* Get All with associated tables join settingscount 
*/ 
function get_all_with_asso_settings_by_cat($column_name=null,$value_id=null,$params=array())
{
try{
$query = $this->db->get(); 
if($query->num_rows() != 0){
return $query->result_array();
}else{
return false;
}
} catch (Exception $ex) {
throw new Exception('Settings_model model : Error in get_all_with_asso_settings_by_cat function - ' . $ex);
}  
}
/*
* Get all settings_by_cat 
*/ 
function get_all_settings_by_cat($column_name=null,$value_id=null,$params=array())
{
try{
$this->db->order_by('id', 'desc');
$this->db->where($column_name, $value_id);
if(isset($params) && !empty($params)){
$this->db->limit($params['limit'], $params['offset']);
}
return $this->db->get('settings')->result_array();
} catch (Exception $ex) {
throw new Exception('Settings_model model : Error in get_all_settings_by_cat function - ' . $ex);
}  
} 
}
