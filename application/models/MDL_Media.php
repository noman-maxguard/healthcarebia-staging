<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MDL_Media extends CI_Model {

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

    
   
    function get_data()
    {
        $this->db->select('*');
		$this->db->order_by('id','DESC');
        $result =$this->db->get('media');
        return $result->result();
    }

    function get_data_home()
    {
        $this->db->select('*');
        $this->db->order_by('id','DESC');
        $this->db->limit(3);
        $result =$this->db->get('media');
        return $result->result();
    }
    
    
   
    function insert_data($data)
    {
        $this->db->insert('media', $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }

   
    function get_data_by_id($id)
    {
        $this->db->select('*');
        $this->db->where('id',$id);
        $result =$this->db->get('media');
        return $result->row();
    }

    function update_data($id,$data)
    {
        return $this->db
            ->where('id', $id)
            ->update("media",$data);

    }

    
    function delete_data_by_id($id)
    {
        $this->db->select('*');
        $this->db->where('id',$id);
        $result =$this->db->get('media');
        $res = $result->row();
        $file = $res->file;

        if (file_exists('./uploads/media/'.$file)) {
            @unlink('./uploads/media/'.$file);
        }


        $this->db->where('id', $id);
        $del = $this->db->delete('media');
        return $del;

    }

   
    function delete_data_multiple($ids)
    {
        $images = array();
        foreach ($ids as $id) {

            $this->db->select('*');
            $this->db->where('id',$id);
            $result =$this->db->get('media');
            $res = $result->row();
            $file = $res->file;

            if (file_exists('./uploads/media/'.$file)) {
                @unlink('./uploads/media/'.$file);
            }


            $this->db->query("delete from `media` where id=" . $id);
        }
        return 1;
    }
    
}
