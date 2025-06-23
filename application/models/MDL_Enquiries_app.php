<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MDL_Enquiries_app extends CI_Model {

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
        $result =$this->db->get('enquiries_app');
        return $result->result();
    }



    function get_data_common($table)
    {
        $this->db->select('*');
        $this->db->order_by('id','DESC');
        $result =$this->db->get($table);
        return $result->result();
    }


    function get_data_home()
    {
        $this->db->select('*');
        $this->db->order_by('id','DESC');

        $result =$this->db->get('enquiries_app');
        return $result->result();
    }



    function get_data_by_id_common($table,$id)
    {
        $this->db->select('*');
        $this->db->where('id',$id);
        $result =$this->db->get($table);
        return $result->row();
    }

    function get_data_by_id_common_array($table,$id)
    {
        $this->db->select('*');
        $this->db->where('id',$id);
        $result =$this->db->get($table);
        return $result->row_array();
    }


    function get_data_by_id($id)
    {
        $this->db->select('*');
        $this->db->where('id',$id);
        $result =$this->db->get('enquiries_app');
        return $result->row();
    }


    
    function delete_data_by_id($id)
    {
        $this->db->where('id', $id);
        $del = $this->db->delete('enquiries_app');
        return $del;

    }





    function delete_data_by_id_common($table,$id)
    {
        $this->db->where('id', $id);
        $del = $this->db->delete($table);
        return $del;

    }
   
    function delete_data_multiple($ids)
    {
        $images = array();
        foreach ($ids as $id) {

            $this->db->query("delete from `enquiries_app` where id=" . $id);
        }
        return 1;
    }



    function delete_data_multiple_common($table,$ids)
    {
        $images = array();
        foreach ($ids as $id) {

            $this->db->query("delete from `".$table."` where id=" . $id);
        }
        return 1;
    }





    function delete_data_by_master_id($table,$col,$val)
    {
        $this->db->where($col, $val);
        $del = $this->db->delete($table);
        return $del;
    }

    public function getDataMultipleByMasterId($table,$masterCol,$id){

        $this->db->where($masterCol,$id);
        $query=$this->db->get($table);
        $result=$query->result();
        return $result;
    }
    
}
