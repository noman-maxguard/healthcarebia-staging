<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Menugroup extends  MY_Controller
{

    function __construct() {
        parent::__construct();
        $data['userdata'] = $this->session->all_userdata();
        if(!isset($data['userdata']['is_login'])) 
        redirect('/admin/login');
        $role = $this->session->userdata('user_role');
        $this->data['page']='Menu Group'; 
        $this->load->helper('url');
        $this->load->helper('my_helper');
        $this->load->model('Menu_model', 'manager');
    }

    public function index() {
        
    }

    /**
     * Add group action
     * or
     * Show add group form
     */
    public function add() {
        if (isset($_POST['title'])) {
            $data['title'] = $this->input->post('title');
            if (!empty($data['title'])) {
                if ($this->db->insert($this->data['tbl_menu_group'], $data)) {
                    $response['status'] = 1;
                    $response['id'] = $this->db->Insert_ID();
                } else {
                    $response['status'] = 2;
                    $response['msg'] = 'Add group error.';
                }
            } else {
                $response['status'] = 3;
            }
            header('Content-type: application/json');
            echo json_encode($response);
        } else {
            $this->load->view('admin/menus/menu_group_add');
            // $data['_view'] = 'admin/menus/menu_edit';
        // $this->load->view('admin/layouts/main',$data);
        }
    }

    public function edit() {
        $id = $this->input->post('id');
        $title = $this->input->post('title');
        if ($title) {
            $data['title'] = $title;
            $response['success'] = false;
            $res = $this->manager->update_menu_group($data, $id,$this->data['tbl_menu_group']);
            if ($res) {
                $response['success'] = true;
            }
            header('Content-type: application/json');
            echo json_encode($response);
        }
    }

    public function delete() {
        $id = $this->input->post('id');
        if ($id) {
            if($id == 1) {
                $response['success'] = false;
                $response['msg'] = 'Cannot delete Group ID = 1';
            } else {
                $delete = $this->manager->delete_menu_group($id,$this->data['tbl_menu_group']);
                if ($delete) {
                    $del = $this->manager->delete_menus($id,$this->data['tbl_menu']);
                    $response['success'] = true;
                } else {
                    $response['success'] = false;
                }
            }
            header('Content-type: application/json');
            echo json_encode($response);
        }
    }

}
