<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Manage_page_model extends CI_Model 
{ 
function __construct()
{
   parent::__construct();
}
public function get_data_flag($pageid,$c,$table)
{
	$this->db->select('*');
	$this->db->from($table);
	$this->db->where('menu_id',$pageid);
	$this->db->where('componets_id',$c);

  return $this->db->count_all_results();
}

public function generate_template($params,$table)
{
   $this->db->insert($table,$params);
	return $this->db->Insert_ID();
}


public function get_template_data($pageid,$table)
{
	$this->db->select('*');
	$this->db->where('menu_id',$pageid);
	return $this->db->get($table)->result();
}



public function get_template_component($template_id)
{
	$this->db->select('*');
	$this->db->where('id',$template_id);
	$result=$this->db->get('page_template')->row();
	if(!empty($result))
	{
		$component=!empty($result->componets_id)?$result->componets_id:'';
		if(!empty($component))
		{
			$comp=@explode(',',$component);
			$this->db->select('*');
			$this->db->where_in('id',$comp);
			return $this->db->get('component')->result();
		}
		else{
			return false;
		}

	}else{ 
    return false;
	}
}


public function get_all_active_component($table)
{
	$this->db->select('*');
	$this->db->order_by("position", "asc");
   $this->db->where('publish',1);
   return $this->db->get($table)->result();

}

public function get_all_active_component1($table,$component)
{
	$comp=@explode(',',$component);

	$this->db->select('*');
	$this->db->where_in('id',$comp);
	return $this->db->get($table)->result();
	
}

public function update_menu($id,$post)
{	
  return $this->db->where('id', $id)->update('menu', $post);
}

public function page_template_delete($column,$pageid,$table)
{
   return $this->db->delete($table,array('id'=>$column)); 	
}

public function get_template_status_change($status,$pageid,$table,$page_templateid)
{
   $params=array(
    'publish'=>$status,
   );
	$this->db->where('id',$page_templateid);
	return $this->db->update($table,$params);
}

public function get_page_content($column,$pageid,$table)
{
      $this->db->select('*');
      $this->db->where('template_id',$column);
      $this->db->where('menu_id',$pageid);
      return $this->db->get($table)->result();
}

public function get_all_active_engine($table=null,$pageid=null)
{
    $this->db->select('*');
    if(!empty($pageid))
    {
    	$this->db->where('menu_id',$pageid);
    }
    $this->db->order_by("position", "asc");
    $this->db->where('publish',1);
    return $this->db->get($table)->result();
 
}

function update_page_master($id,$params)
{
	$this->db->where('id',$id);
	return $this->db->update('page_master',$params);
 
}
public function getinfo($i){
$this->db->select('*');
$this->db->where('url',$i);
return $this->db->get('menu')->row();

}

public function update_files_info($id,$up_image)
{
 return $this->db->where('id', $id)->update('menu', $up_image);

}

public function update_files_gallery_info($up_image,$table)
{
   return $this->db->insert($table,$up_image);	
}

public function get_updated_url($id)
{
	$this->db->select('url');
	$this->db->where('id',$id);
	return $this->db->get('menu')->row();
}


public function get_count($table)
{
	$this->db->select('*');
	$this->db->from($table);
	return $this->db->count_all_results();
}


public function get_count_new($table,$menuid,$templateid)
{
	$this->db->select('*');
	$this->db->where('menu_id',$menuid);
	$this->db->where('template_id',$templateid);
	$this->db->from($table);
	return $this->db->count_all_results();
}

public function create_template($pageid,$template_id,$table,$n)
{
   
	$params=array(
     'menu_id'=>$pageid,
     'template_id'=>$template_id,
     'block_id'=>$n,
     'publish'=>1,
	);
	$this->db->insert($table,$params);	
	return $this->db->Insert_ID();
}

public function get_template_count($table,$pageid,$template_id)
{

	$this->db->where('menu_id', $pageid);
	$this->db->where('template_id',$template_id);
   $query = $this->db->get($table);
   return  $query->num_rows();
}

public function get_all_active_template($table,$pageid){
 
   $this->db->select('*');
   $this->db->from('page_template');
	$this->db->where('menu_id',$pageid);
	$this->db->order_by("position", "asc");
   $query = $this->db->get();  
   return $query->result();

}

// public function get_all_active_template($table,$pageid){
 
//    $this->db->select('page_template.data_fetch,page_template.id,page_template.menu_id,page_template.template_id,page_template.position,page_template.publish,page_template.block_id,template.name,template.message');
//    $this->db->from('page_template');
//    $this->db->join('template','template.id=page_template.template_id');
// 	$this->db->where('page_template.menu_id',$pageid);
// 	$this->db->order_by("page_template.position", "asc");
//    $query = $this->db->get();  
//     return $query->result();

// }


public function get_all_active_template_item($table,$pageid,$template_id)
{

   $this->db->select('*');
	$this->db->where('menu_id',$pageid);
	$this->db->where('template_id',$template_id);
	$this->db->order_by("position", "asc");
   return $this->db->get($table)->result();


}





}