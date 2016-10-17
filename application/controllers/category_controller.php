<?php
session_start();
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Category_Controller
 *
 * @author Mahmudul Hasan Khan CSE
 */
class Category_Controller extends CI_Controller {
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $admin_id = $this->session->userdata("admin_id");
        if($admin_id == NULL) {
            redirect("login_controller","refresh");
        }
    }
    
    public function index() {
        $cdata = array();
        $cdata["all_categories"] = $this->category_model->select_all_categories();
        $data = array();
        $data['admin_main_content'] = $this->load->view('category/manage_category_component',$cdata,TRUE);
        $data["title"] = "Category";
        $this->load->view('shared/admin_master_ui', $data);
    }
    
    public function add_category(){
        $cdata = array();
        $cdata["function"] = "Add";
        $data = array();
        $data["admin_main_content"] = $this->load->view("category/save_category_component",$cdata,TRUE);
        $data["title"] = "Add Category";
        $this->load->view('shared/admin_master_ui', $data);
    }
    
    public function save_category(){
        $data = array();
        $data["category_name"] = $this->input->post("category_name", TRUE);
        $data["category_description"] = $this->input->post("category_description", TRUE);
        $data["ct_publication_status"] = $this->input->post("ct_publication_status", TRUE);
        $sdata = array();
        if($this->category_model->insert_category_info($data) > 0){
            $sdata["message"] = "<strong>SAVED</strong> Category Information Successfully.";
        } else {
            $sdata["error"] = "Could <strong>NOT</strong> save Category Information .....";
        }
        $this->session->set_userdata($sdata);
        redirect("category_controller/add_category");
    }
    
    public function edit_category($category_id){
        $cdata = array();
        $cdata["category_info"] = $this->category_model->select_category_by_id($category_id);
        $cdata["function"] = "Update";
        $data = array();
        $data["admin_main_content"] = $this->load->view("category/save_category_component",$cdata,TRUE);
        $data["title"] = "Edit Category";
        $this->load->view('shared/admin_master_ui', $data);
    }
    
    public function update_category(){
        $data = array();
        $category_id = $this->input->post("category_id", TRUE);
        $data["category_name"] = $this->input->post("category_name", TRUE);
        $data["category_description"] = $this->input->post("category_description", TRUE);
        $data["ct_publication_status"] = $this->input->post("ct_publication_status", TRUE);
        $sdata = array();
        if($this->category_model->update_category_by_id($data, $category_id) > 0){
            $sdata["message"] = "<strong>UPDATED</strong> Category Information Successfully.";
        } else {
            $sdata["error"] = "Could <strong>NOT</strong> update Category Information .....";
        }
        $this->session->set_userdata($sdata);
        redirect("category_controller/edit_category/".$category_id);
    }
    
    public function delete_category($category_id) {
        $sdata = array();
        if($this->category_model->delete_category_by_id($category_id) > 0){
            $sdata["message"] = "<strong>DELETED</strong> Category Information Successfully.";
        } else {
            $sdata["error"] = "Could <strong>NOT</strong> delete Category Information .....";
        }
        $this->session->set_userdata($sdata);
        redirect("category_controller");
    }
    
    public function publish_category($category_id) {
        $sdata = array();
        if($this->category_model->update_ct_publication_status_by_id(1, $category_id) > 0){
            $sdata["message"] = "<strong>PUBLISHED</strong> Category Information Successfully.";
        } else {
            $sdata["error"] = "Could <strong>NOT</strong> publish Category Information .....";
        }
        $this->session->set_userdata($sdata);
        redirect("category_controller");
    }
    
    public function unpublish_category($category_id) {
        $sdata = array();
        if($this->category_model->update_ct_publication_status_by_id(0, $category_id) > 0){
            $sdata["message"] = "<strong>UNPUBLISHED</strong> Category Information Successfully.";
        } else {
            $sdata["error"] = "Could <strong>NOT</strong> unpublish Category Information .....";
        }
        $this->session->set_userdata($sdata);
        redirect("category_controller");
    }
    
    public function check_category_name($category_name) {
        echo count($this->category_model->select_categories_by_name($category_name));
    }
    
    public function check_name_considering_id($category_id, $category_name) {
        echo count($this->category_model->select_categories_by_name_except_id($category_name, $category_id));
    }
}
