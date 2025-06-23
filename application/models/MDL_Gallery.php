<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MDL_Gallery extends CI_Model {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    
    //CI instance function
    function get_images($id)
    {
        $this->db->select('*');
        $this->db->where('album_id',$id);
        $this->db->order_by('sort_order','ASC');
        $result =$this->db->get('album_images');
        $res = $result->result();
        return $res;
    }
    //CI instance function
    
    function get_album()
    {
        $this->db->select('*');
        $this->db->order_by('sort_order','ASC');
        $result =$this->db->get('album');
        return $result->result();
    }

    function get_album_filter($category_id)
    {
        $this->db->select('*');

        if(!empty($category_id))
            $this->db->where('category_id',$category_id);

        $this->db->order_by('sort_order','ASC');
        $result =$this->db->get('album');
        return $result->result();
    }



    function get_album_active()
    {
        $this->db->select('*');
        $this->db->where('status',1);
        $this->db->order_by('sort_order','ASC');
        $result =$this->db->get('album');
        return $result->result();
    }



    function get_all_images()
    {
        $this->db->select('*');
        $this->db->order_by('id', 'RANDOM');
        $result =$this->db->get('album_images');
        $res = $result->result();
        return $res;
    }


    function get_album_by_id($id)
    {
        
        $this->db->select('*');
        $this->db->where('id',$id);
        $result =$this->db->get('album');
        return $result->row();
    }

    function get_album_name_ci($id)
    {

        $this->db->select('*');
        $this->db->where('id',$id);
        $result =$this->db->get('album');
        $res = $result->row();
        $name = !empty($res->name)?$res->name:'Album';
        return $name;
    }


    //getDataActive Pagination
    function getDataActive($params = array())
    {



        $this->db->select('*');
//        $this->db->where('status',1);
//        $this->db->where('archive',0);
        $this->db->from('album');
        $this->db->order_by('sort_order','ASC');
        if(array_key_exists("id",$params)){
            $this->db->where('id',$params['id']);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            //set start and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }

            if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
                $result = $this->db->count_all_results();
            }else{
                $query = $this->db->get();
                $result = ($query->num_rows() > 0)?$query->result():FALSE;
            }
        }

        //return fetched data
        return $result;
    }
    //getDataActive Pagination
   
    
    function insert_gallery($name,$file_name_db)
    {
        $date = date('Y/m/d');
        if(!empty($file_name_db))
        {
            $this->db->insert('album', array('name'=>$name, 'date'=>$date));
            $insert_id = $this->db->insert_id();

            $i = 1;
          foreach($file_name_db as $image)
          {
             $this->db->insert('album_images', array('album_id'=>$insert_id, 'image'=>$image, 'sort_order'=>$i));
              $i++;
          }
            return 1;
        }
        
        return 0;
    }

    function insert_gallery_arr($data,$file_name_db)
    {

        if(!empty($file_name_db))
        {
            $this->db->insert('album', $data);
            $insert_id = $this->db->insert_id();

            $i = 1;
            foreach($file_name_db as $image)
            {
                $this->db->insert('album_images', array('album_id'=>$insert_id, 'image'=>$image, 'sort_order'=>$i));
                $i++;
            }
            return 1;
        }

        return 0;
    }


    function insert_new_image($id,$file_name_db)
    {

        $this->db->select('*');
        $this->db->where('album_id',$id);
        $this->db->order_by('sort_order','DESC');
        $this->db->limit(1);
        $result =$this->db->get('album_images');
        $res = $result->row();

        $last_num = !empty($res->sort_order)?$res->sort_order:0;


        $i = $last_num + 1;
        if(!empty($file_name_db))
        {
            
          foreach($file_name_db as $image)
          {
             $this->db->insert('album_images', array('album_id'=>$id, 'image'=>$image, 'sort_order'=>$i));
              $i++;
          }
            return 1;
        }
        
        return 0;
    }
    
    
    
    function get_image_by_id($id)
    {
        $this->db->select('*');
        $this->db->where('id',$id);
        $result =$this->db->get('album_images');
        return $result->row();
    }
    
    function delete_album_by_id($id)
    {
        $this->db->where('id', $id);
        $del = $this->db->delete('album');
        return $del;

    }

    function delete_images_by_album_id($id)
    {
        $this->db->where('album_id', $id);
        $del = $this->db->delete('album_images');
        return $del;

    }
    

    
    function delete_image_by_id($id)
    {
        $this->db->where('id', $id);
        $del = $this->db->delete('album_images');
        return $del;

    }
    
    //Random images
    function get_randon_gallery()
    {
        $image_array = array();
        $albums = $this->get_album();
        
        if(!empty($albums))
        {
            foreach($albums as $album)
            {
                $album_id = $album->id;
               
                $this->db->select('*');
                $this->db->where('album_id',$album_id);
                $this->db->limit(2);
                $this->db->order_by('sort_order','ASC');
                $result =$this->db->get('album_images');
                $images = $result->result();
                
                foreach($images as $image)
                {
                    $image_array[] = $image->image;
                }
                
                
            }
            return $image_array;
        }
        else
            return 0;
    }

    function get_data_random_images()
    {
        $this->db->select('*');
        $this->db->limit(8);
        $this->db->order_by('id', 'RANDOM');
        $result =$this->db->get('album_images');
        $res = $result->result();

        return $res;
    }


    function update_sort_order_album($id,$sort_order)
    {

        $this->db->where('id',$id);
        $this->db->update('album',array('sort_order' => $sort_order));
        return true;
    }

    function update_sort_order($id,$sort_order)
    {
       
        $this->db->where('id',$id);
        $this->db->update('album_images',array('sort_order' => $sort_order));
        return true;
    }

    public function update_data_by_id($id,$data){
        $this->db->where('id',$id);
        $this->db->update('album',$data);
        return true;
    }



    public function update_status_image($table,$id,$imageStatus)
    {
        $this->db->where('id',$id);
        $this->db->update($table,array('status' => $imageStatus));
        return true;
    }

}
