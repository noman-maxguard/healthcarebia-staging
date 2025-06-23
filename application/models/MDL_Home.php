<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MDL_Home extends CI_Model {

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

    public function __construct() {
        parent::__construct();



        //Tables
        $this->table_settings = 'settings';


    }



	//Common
    function getDataMultiple($table){
        $query=$this->db->get($table);
        $result=$query->result();
        return $result;
    }


    function check_full_url_blogs($table,$url_string)
    {
        $this->db->select('*');
        $this->db->where('url',$url_string);
        $this->db->where('status',1);
        $result =$this->db->get($table);
        $res = $result->row();

        $id = !empty($res->id)?$res->id:0;
        return $id;

    }


    ///////////////////////////////URL checking///////////////////////////////////
    function check_full_url($table,$url_string)
    {
        $this->db->select('*');
        $this->db->where('url',$url_string);
        $this->db->where('archive',0);
        $this->db->where('status',1);
        $result =$this->db->get($table);
        $res = $result->row();

        $id = !empty($res->id)?$res->id:0;
        return $id;

    }


    function check_full_url_normal($table,$url_string)
    {
        $this->db->select('*');
        $this->db->where('url',$url_string);
        $this->db->where('status',1);
		$this->db->where('archive',0);
        $result =$this->db->get($table);
        $res = $result->row();

        $id = !empty($res->id)?$res->id:0;
        return $id;

    }


    function check_full_url_pages($table,$url_string)
    {
        $this->db->select('*');
        $this->db->where('url',$url_string);
        $result =$this->db->get($table);
        $res = $result->row();

        return $res;

    }


}
