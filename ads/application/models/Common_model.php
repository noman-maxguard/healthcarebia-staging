<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Common_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

public function get_active_faqs($table)
{
    $this->db->select('*');
    $this->db->order_by("position", "asc");
    $this->db->where('publish',1);
    return $this->db->get($table)->result();  

}
public function get_active_gallery_new($table)
{
    $this->db->where('position >',11);
    $this->db->order_by("position", "asc");
    $this->db->where('publish',1);
    return $this->db->get($table)->result(); 
}
public function get_active_gallery($table,$col=null,$limit=null,$start=null)
{
    $this->db->select('*');
    if(!empty($col)){
        $this->db->where($col,1); 
    }
    if(!empty($limit))
    {
        $this->db->limit($limit, 0);
    }
    $this->db->order_by("position", "asc");
    $this->db->where('publish',1);
    return $this->db->get($table)->result(); 
}

// Start 06-05-2023 ///  
public function get_active_service($table)
{
    $this->db->select('*');
    $this->db->order_by("position", "asc");
    $this->db->where('publish',1);
    return $this->db->get($table)->result();  

}

public function get_view_service_name($page,$table)
{

     $this->db->select('*');
     $this->db->where('url_slug',$page);
     $this->db->where('publish',1);
     return $this->db->get($table)->row();

}


// public function get_view_service_name($page,$table)
// {

//      $this->db->select('*');
//      $this->db->where('url_slug',$page);
//      $this->db->where('publish',1);
//      return $this->db->get($table)->row();

// }


// End 06-05-2023 ///  

////// Start 30-03-2023 Frontend ///////////

public function link_link($table,$col)
{
    $this->db->select('*');
    $this->db->order_by("position", "asc");
    $this->db->where('publish',1);
    $this->db->where($col,1);
    return $this->db->get($table)->result();  
}


public function get_active_footer_menu_table($table,$col,$flag)
{
    $this->db->select('*');
    $this->db->where('publish',1);
    $this->db->where($col,$flag);
    $this->db->order_by('position','asc');
    return $this->db->get($table)->result(); 

}

public function get_active_footer_address($table,$col,$flag)
{
    $this->db->select('*');
    $this->db->where('publish',1);
    $this->db->where($col,$flag);
    $this->db->order_by('position','asc');
    return $this->db->get($table)->result(); 
}


public function get_active_footer_menu($table,$col,$flag,$ordercol)
{
   
    $this->db->select('*');
    $this->db->where('publish',1);
    $this->db->where($col,$flag);
    $this->db->order_by($ordercol,'asc');
    return $this->db->get($table)->result();

}

public function media_gallery($pageid,$table)
{
    $this->db->select('*');
    $this->db->where('page_id',$pageid);
    $this->db->where('publish',1);
    $this->db->order_by('position','asc');
    return $this->db->get($table)->result();
}
   


////// End 30-03-2023 ///////////

///////////// 27-03-2023 ////
public function get_active_page($table)
{
    $this->db->select('*');
    return $this->db->get($table)->result();
}

public function get_data_component($table,$id)
{
    $this->db->select('*');
    $this->db->where('id',$id);
    return $this->db->get($table)->row();

}    

public function update_status_image($table,$id,$imageStatus)
{
    $this->db->where('id',$id);
    $this->db->update($table,array('publish' => $imageStatus));
    return true;
}


public function get_change_banner_category($status,$pageid,$page_content,$table)
{
   
   $params=array(
    'banner_category'=>$status,
   );
    
    $this->db->where('id',$page_content);
    return $this->db->update($table,$params);

}


public function get_active_service_menu_new($categoryid=null,$table=null)
{
     $this->db->select('*');
     $this->db->where('category',$categoryid);
     $this->db->where('publish',1);
     $this->db->where('menu_visibility','yes');
     $this->db->order_by('position1','asc');

     return $this->db->get($table)->result();  
}

public function get_active_service_menu($categoryid=null,$subcategoryid=null,$table=null)
{
  

  $this->db->select('*');
  $this->db->where('category',$categoryid);
  $this->db->where('menu_visibility','yes');
  if(!empty($subcategoryid) && $subcategoryid!=0)
  {
     $where = "FIND_IN_SET('".$subcategoryid."', subcategory)"; 
     $this->db->where($where);
  }
    
    $this->db->where('publish',1);
    $this->db->order_by('position1','asc');
    return $this->db->get($table)->result(); 


}   
public function get_service_url($serviceid,$table)
{
    $this->db->select('*');
    $this->db->where('id',$serviceid);
    return $this->db->get($table)->row(); 

}
public function get_active_subcate($categoryid,$table)
{
    $this->db->select('*');
    $this->db->where('category',$categoryid);
    // if($categoryid == 3)
    // {
    //    $this->db->where('parent_id',0);  
    // }
   
    $this->db->where('publish',1);
    $this->db->order_by('position','asc');
    return $this->db->get($table)->result(); 
}    
public function get_active_service_category_menu($table)
{
    $this->db->select('*');
    $this->db->where('publish',1);
    $this->db->order_by('position','asc');
    return $this->db->get($table)->result();

}
public function get_active_menu($table)
{

    $this->db->select('*');
    $this->db->where('header_menu',1);
    $this->db->where('publish',1);
    $this->db->order_by('position','asc');
    return $this->db->get($table)->result();

}

///////////////////////////////////////////

public function admin_menu($table)
{
     $this->db->select('*');
     $this->db->where('flag',1);
     $this->db->order_by('position','asc');
     return $this->db->get($table)->result();
}
public function calldata($id,$table)
{
    $this->db->select('*');
    $this->db->where('category',$id);
    return $this->db->get($table)->result();
}


public function get_active_service_category($table)
{
   $this->db->select('*');
   return $this->db->get($table)->result();

}    

//fetch blogs
function get_blogs($limit, $offset,$table) {
        
    if ($offset > 0) {
        $offset = ($offset - 1) * $limit;
    }
   
    $this->db->order_by("position", "DESC");
    $result['rows'] = $this->db->get($table, $limit, $offset);
    $result['num_rows'] = $this->db->count_all_results($table);
    
    return $result;
}

public function get_change_data_fetch($status,$pageid,$page_content,$table,$params)
{
    $this->db->where('id',$page_content);
    return $this->db->update($table,$params);
}

public function getdata_fetch($table,$id)
{
    $this->db->select('*');
    $this->db->where('id',$id);
    return  $this->db->get($table)->row();
}

public function update_sort_order($table,$id,$sort_order)
{
    $this->db->where('id',$id);
    $this->db->update($table,array('position' => $sort_order));
    return true;
}

public function update_sort_order_position_common($table,$id,$sort_order)
{
    $this->db->where('id',$id);
    return $this->db->update($table,array('position' => $sort_order));
   
}

    public function update_sort_order_position($table,$id,$category,$sort_order)
    {
        $this->db->where('id',$id);
        if($category == 'menu')
        {
             $this->db->update($table,array('position1' => $sort_order)); 
        }
        elseif($category == 'ourservice'){
            $this->db->update($table,array('position2' => $sort_order)); 
        }
        elseif($category == 'ivdrip')
        {
           $this->db->update($table,array('position3' => $sort_order));  
        }
        elseif($category == 'weightloss')
        {
           $this->db->update($table,array('position4' => $sort_order));  
        }

        else
        {
            $this->db->update($table,array('position5' => $sort_order));  
        }    
       
        return true;
    }


public function get_blog_previews_details($slug,$table)
{

        $this->db->select('*');
        $this->db->where('publish',1);
        $this->db->where('url_slug',$slug);
        $result= $this->db->get($table)->row();
        if(!empty($result))
        {
            $id=$result->id;
            $newid= $id - 1;
            if($newid > 1)
            {

                $this->db->select('*');
                $this->db->where('publish',1);
                $this->db->where('id',$newid);
                $re=$this->db->get($table)->row();
                if(!empty($re))
                {
                       return $re;
                }else{

                    return false;

                }    

            }
            else
             {
                return false;
             }   



        }else{
            return false;
        }

}

public function get_blog_next_details($slug,$table)
{

        $this->db->select('*');
        $this->db->where('publish',1);
        $this->db->where('url_slug',$slug);
        $result= $this->db->get($table)->row();
        if(!empty($result))
        {
            $id=$result->id;
            $newid= $id + 1;
            if($newid > 1)
            {

                $this->db->select('*');
                $this->db->where('publish',1);
                $this->db->where('id',$newid);
                $re=$this->db->get($table)->row();
                if(!empty($re))
                {
                    return $re;
                }
                else
                {
                    return false;  
                }    

            }
            else
             {
                return false;
             }   



        }else{
            return false;
        }

}



public function get_blog_details($slug,$table)
{
 

        $this->db->select('*');
        $this->db->where('publish',1);
        $this->db->where('url_slug',$slug); 
        return $this->db->get($table)->row();

}    

public function getblog_most_popular($table)
{
        $this->db->select('*');
        $this->db->order_by("position","asc");
        $this->db->where('publish',1);
        $this->db->where('most_popular',1);
        $this->db->limit(5);
        return $this->db->get($table)->result();

}

public function getblog_most_popular_new($table,$slug)
{
        $this->db->select('*');
        $this->db->order_by("position","asc");
        $this->db->where('publish',1);
        $this->db->where('most_popular',1);
        $this->db->where('url_slug !=',$slug);
        $this->db->limit(5);
        return $this->db->get($table)->result();

}

 function count_all()
    {
        $query = $this->make_query_new();
        if(!empty($query))
        {
            $data = $this->db->query($query);
            return $data->num_rows(); 
        }
        else
        {
            return false;
        }    
       
    }


    function fetch_data($limit, $start)
    {


        $query = $this->make_query_new(); 
        if(!empty($query))
        {
     
              $query .= ' LIMIT '.$start.', ' . $limit;
        $data = $this->db->query($query);

        $output = '';
        if($data->num_rows() > 0)
        {
            foreach($data->result_array() as $row)
            {
                
             
                $output.='<div class="col-lg-6 mb-3 mb-lg-4">
                            <a href="'.base_url().'blog/'.$row['url_slug'].'">
                                <div class="blog-box">
                                    <span class="blog-image">
                                        <img class="img-fluid" src="'.base_url().'uploads/thumbnails_image/'.$row['thumbnails_image'].'" alt="'.$row['alt1'].'">
                                    </span>
                                    <div class="blog-box-body same">
                                        <strong>'.$row['title'].'</strong>
                                        <p>'.$row['short_description'].'</p>
                                        <span class="blog-readmore">READ MORE »</span>
                                    </div>
                                    <span class="blog-date">'.$row['date'].'</span>
                                </div>
                            </a>
                        </div>';


            }
        }
        else
        {
            $output = '<h3>No Data Found</h3>';
        }


        }else{
        $output = '<h3>No Data Found</h3>';

        }


        return $output;
    }





    function make_query_new()
    {
       

        $this->db->select('*'); 
        $query = "SELECT * FROM  blog WHERE publish = '1'"; 
        return $query;
       

   }









  
public function getblog($table)
{
        $this->db->select('*');
        $this->db->order_by("position","asc");
        $this->db->where('publish',1);
        return $this->db->get($table)->result();

}



public function getalldata($table)
{
        $this->db->select('*');
        $this->db->order_by("position","asc");
        $this->db->where('publish',1);
        return $this->db->get($table)->result();

}

public function get_single_data($slug,$table)
{
  $this->db->select('*');
  $this->db->where('url_slug',$slug);
  return $this->db->get($table)->row();

}






//////////////////////  Common Settings ////////////////////////////////


public function socialmedia($table)
{
    $this->db->select('*');
    $this->db->order_by("position","asc");
    $this->db->where('publish',1);
    return $this->db->get($table)->result();

}



public function getcompany($table)
{
    $this->db->select('*');
    return $this->db->get($table)->row(); 
}

public function emailsettings($table)
{
  
  $this->db->select('*');
  return $this->db->get($table)->row();
}


///////////////////////// Login Related /////////////////////////////


public function login_user1($u,$q){
  $this->db->where('email', $u);
  $query = $this->db->get('tbl_user');
  if($query->num_rows() > 0)
  {
           foreach($query->result() as $row)
           {

                if($row->is_email_verified == 'yes')
                {

                            $store_password = password_verify($q,$row->password);

                            if($store_password === true)
                            {
                            return $query->row();
                            }
                            else
                            {
                            return false;

                            }
                }
                else
                {
                    return false;
                 
                }
           }
  }
  else
  {
    return false;
   
  }



}



public function  getusers_admin($role,$table)
{
    $this->db->select('*');
    $this->db->where('role',$role);
    $this->db->where('id',1);
    return $this->db->get($table)->row();  

}  


///////////////////////////Insert Quries//////////////////////////////////////////


public function delete($id,$table)
{
    $this->db->where('id', $id);
    $this->db->delete($table);
}

public function insert_gallery($params,$table)
{

        $this->db->insert($table,$params);
        return $this->db->insert_id();

}


public function add_tbl_user($params,$table)
{
    $this->db->insert($table,$params);
    return $this->db->insert_id();
}




public function cinsert($params,$table)
{
    $this->db->insert($table,$params);
    return $this->db->insert_id();

}



public function addparam($params,$table)
{
    $this->db->insert($table,$params);
    return $this->db->insert_id();
}



public function typename($rolename)
{
    $this->db->select('*');
    $this->db->where('id',$rolename);
    $q = $this->db->get('user_type');
    $data = $q->result_array();
 




    return $data;   
}




//////////////////////// Data table Related/////////////////////////////////////

public function make_query($table,$tmp,$role,$userid)  
      {  

          
           $this->db->select('*'); 
           $this->db->where('role',$role);
           $this->db->from($table);  
           if(isset($_POST["search"]["value"]) && !empty($_POST["search"]["value"]))  
           {     

               $i=1; 
               foreach ($tmp as $search)
               {
                    if($i==1)
                    $this->db->like($search,$_POST["search"]["value"]);
                    else
                    {
                    $this->db->or_like($search,$_POST["search"]["value"]);  
                    }

                    $i++;
              }


               $this->db->where('role',1);
    
           }  

           if(isset($_POST["order"]) && !empty($_POST["order"]))  
           {  
                
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('id', 'DESC');  
           }  
      }

      public function get_filtered_data($table,$tmp,$role,$userid)
      {  
 





           $this->make_query($table,$tmp,$role,$userid);  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      public function get_all_data($table,$role,$userid)  
      {  
           $this->db->select("*");
           if($role==1)
           {
            $this->db->where('id',$userid); 
           }  
           $this->db->from($table);  
           return $this->db->count_all_results();  
      }  

      public function make_datatables($table,$tmp,$role,$userid)
      {  
           $this->make_query($table,$tmp,$role,$userid);  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      } 



///////////////////////Delete Related Queries////////////////////////////////


    public function remove($table,$id){

    return $this->db->get_where($table,array('id'=>$id))->row_array();
   

    }


     public function delete_table_id($id,$table)
     {
        return $this->db->delete($table,array('id'=>$id));
     }

   

public function remove_image($table,$id,$column)
{ 
    $this->db->select($column);
    $this->db->where('id', $id);
    $result=$this->db->get($table)->row();
    if(!empty($result)){
    $clmn=$result->{$column};
    @unlink(FCPATH."resource/".$column.'/'.$clmn);
       $this->db->where('id', $id)
          ->update($table, array($column => ''));

      return $this->db->delete($table,array('id'=>$id));    
    }
    else
    {
      return false;
    }

}


public function remove_image2($table,$id,$column)
{ 
    $this->db->select($column);
    $this->db->where('id', $id);
    $result=$this->db->get($table)->row();
    if(!empty($result))
    {
        $clmn=$result->{$column};
        @unlink(FCPATH."resource/".$column.'/'.$clmn);
          return $this->db->where('id', $id)
              ->update($table, array($column => ''));

      
    }
    else
    {
      return false;
    }

}

 ////////////////// tbl_user table related query////////////////////////////////



     public function update_tbl_user($id,$params)
     {
        $this->db->where('id',$id);
        return $this->db->update('tbl_user',$params);
     }


 public function updatepermission($data,$userid)
   {
        $this->db->where('id', $userid);
        return $this->db->update('tbl_user',$data);   
    }

    public function editper($data,$id)
    {
        $this->db->where('id', $id);
        $update = $this->db->update('tbl_user', $data);
        return ($update == true) ? true : false;    
    }


public function getGroupData($groupId = null) 
    {
        if($groupId) {
            $sql = "SELECT * FROM tbl_user WHERE id = ?";
            $query = $this->db->query($sql, array($groupId));
            return $query->row_array();
        }

        $sql = "SELECT * FROM tbl_user WHERE id != ?";
        $query = $this->db->query($sql, array(1));
        return $query->result_array();
    }

     public function getUserByUserId($user_id,$table)
     {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('id', $user_id);
        if ($query = $this->db->get())
        {
            return $query->row_array();
        } else 
         {
            return false;
            
         }
     }





public function get_fetch_info($id,$table)
{

$this->db->select('*');
$this->db->where('id',$id);
return $this->db->get($table)->row();


}

public function getposition_order($table)
{

    $this->db->select('*');
    $query = $this->db->get($table);
    return $num = $query->num_rows();  
}


public function update_auth($id,$params)
{
   $this->db->where('id',$id);
   return $this->db->update('tbl_user',$params);

}


 
public function usertype($table)
{
    $this->db->select('*');
    $q= $this->db->get($table);
    return $data1 = $q->result();

}

public function usertype1()
{
        $this->db->select('*');
        $this->db->where('id !=',1);
        $this->db->where('id !=',2);
        $this->db->order_by("type", "asc"); 
        $q= $this->db->get('user_type');
        return $data1 = $q->result_array();

}

    public function get_count_user($role,$userid)
    {
        $this->db->select('*');
        $this->db->where('role',1);
        return $this->db->get('tbl_user')->num_rows();
    
    }

    public function get_all_user($role,$userid)
    {

        $this->db->order_by('id','desc');
        $this->db->where('role',1); 
        return $this->db->get('tbl_user')->result_array();

    }

   

      public function get_all_customer()
      {

        $this->db->order_by('id','desc');
        $this->db->where('role','2');
        return $this->db->get('tbl_user')->result_array();   

      }
  



    public function getcountem_id()
    {
        $query = $this->db->query('SELECT * FROM tbl_user where role="3"');
       return $query->num_rows();

    }



    public function getcountcu_id()
    {
       $query = $this->db->query('SELECT * FROM tbl_user where role="2"');
       return $query->num_rows();

    }

  public function getcountad_id()
  {
        $query = $this->db->query('SELECT * FROM tbl_user order by id desc');
        // return $last_row=$this->db->select('*')->order_by('id',"desc")->limit(1)->get('date_data')->row();
        return $query->row();

  }


//////////////////////  Menu Related  ////////////////////
public function get_view_team_name($page,$table)
{
     $this->db->select('*');
     $this->db->where('url_slug',$page);
     $this->db->where('publish',1);
     return $this->db->get($table)->row();
}



public function getviewfile_name($page,$table)
{

 $this->db->select('*');
 $this->db->where('url',$page);
 return $this->db->get($table)->row();

}

public function getinfo($i,$table)
{
    $this->db->select('*');
    $this->db->where('url',$i);
    return $this->db->get($table)->row();

}  




//////////////////////////// Menu ///////////////////////////////////////////////



public function selparent($parent_id,$table)
{
    $this->db->select('url');
    $this->db->where('id',$parent_id);
    $result=$this->db->get($table)->row();
    if(!empty($result))
    {
        return $result;
    }
    else
    {
        return false;
    }
}




function hasChild($parent_id,$table)
    {
      $sql = $this->db->query("SELECT COUNT(*) as count FROM $table WHERE parent_id = '" . $parent_id . "' AND header_menu = 1  order by position ASC")->row();
      return $sql->count;
    }
function CategoryList($id,$table)
  {
    $list = "";
    $sql = "SELECT * FROM  $table WHERE parent_id=$id AND   header_menu =1  order by position ASC";
    $qry = $this->db->query($sql);
    $parent =  $qry->result();
    //print_r($parent);
    $mainlist = "<ul class='menu-list'>";
    foreach($parent as $pr){
         $mainlist .= $this->CategoryTree($list,$pr->id,$pr->title,$append = 0,$pr->url,$pr->parent_id,$pr->link,$pr->cate,$pr->tab_status,$pr->page_type,$pr->external_url,$table);
    
    }
    $list .= "";
    return $mainlist;
  }

  function CategoryTree($list,$id,$name,$append,$slug,$parent_id,$link,$cate,$tab,$type,$ext_url,$table)
  {
    
            $parent_slug = $this->selparent($parent_id,$table);
            if($parent_id == 0)
            {

                if($slug == 'home')
                {
                    $list ='<li><a class="hvr-sweep-to-bottom hvr-sweep-to-bottom1" href="'.base_url().'">'.$name.'</a>';
                }
                else if($link == 1 && $ext_url!='')
                {
                  $list = '<li><a class="hvr-sweep-to-bottom hvr-sweep-to-bottom1"  href="'.base_url().$ext_url.'">'.$name.'</a>'; 
                }
                else if($link == 0 )
                {
                   $list = '<li ><a class="hvr-sweep-to-bottom hvr-sweep-to-bottom1" href="javascript:void(0)">'.$name.'</a>';
                }


                else
                {
                $list ='<li><a class="hvr-sweep-to-bottom hvr-sweep-to-bottom1" href="'.base_url().$slug.'">'.$name.'</a>';
                }  

            }
            else
            {


                if($link == 1 && $ext_url!='')
                {
                $list = '<li><a   href="'.base_url().$ext_url.'">'.$name.'</a>'; 
                }
                else if($link == 0 )
                {
                $list = '<li ><a href="javascript:void(0)">'.$name.'</a>';
                }


                else
                {
                $list ='<li><a href="'.base_url().$slug.'">'.$name.'</a>';
                }  

            }    
           

   


  
    if ($this->hasChild($id,$table)) // check if the id has a child
    {
      $append++;
      $list .= "<ul>";
      $sql = "SELECT * FROM  $table WHERE parent_id=$id AND   header_menu =1  order by position ASC";
      $qry = $this->db->query($sql);;
      $child = $qry->result();
      foreach($child as $pr)
      {
        $list .= $this->CategoryTree($list,$pr->id,$pr->title,$append,$pr->url,$pr->parent_id,$pr->link,$pr->cate,$pr->tab_status,$pr->page_type,$pr->external_url,$table);
      };
      $list .= "</ul>";
    }
    return $list;
  }





///////////////////////////End Menu ////////////////////////////////////////////


}    

?>