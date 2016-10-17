<?php
session_start();
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Manufacturer_Controller
 *
 * @author Mahmudul Hasan Khan CSE
 */
class Manufacturer_Controller extends CI_Controller {
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
        $cdata["all_manufacturers"] = $this->manufacturer_model->select_all_manufacturers();
        $data = array();
        $data['admin_main_content'] = $this->load->view('manufacturer/manage_manufacturer_component',$cdata,TRUE);
        $data["title"] = "Manufacturer";
        $this->load->view('shared/admin_master_ui', $data);
    }
    
    public function add_manufacturer(){
        $cdata = array();
        $cdata["function"] = "Add";
        $data = array();
        $data["admin_main_content"] = $this->load->view("manufacturer/save_manufacturer_component",$cdata,TRUE);
        $data["title"] = "Add Manufacturer";
        $this->load->view('shared/admin_master_ui', $data);
    }
    
    public function save_manufacturer(){
        $data = array();
        $data["manufacturer_name"] = $this->input->post("manufacturer_name", TRUE);
        $data["manufacturer_description"] = $this->input->post("manufacturer_description", TRUE);
        $data["mn_publication_status"] = $this->input->post("mn_publication_status", TRUE);
        $sdata = array();
        if($this->manufacturer_model->insert_manufacturer_info($data) > 0){
            $sdata["message"] = "<strong>SAVED</strong> Manufacturer Information Successfully.";
        } else {
            $sdata["error"] = "Could <strong>NOT</strong> save Manufacturer Information .....";
        }
        $this->session->set_userdata($sdata);
        redirect("manufacturer_controller/add_manufacturer");
    }
    
    public function edit_manufacturer($manufacturer_id){
        $cdata = array();
        $cdata["manufacturer_info"] = $this->manufacturer_model->select_manufacturer_by_id($manufacturer_id);
        $cdata["function"] = "Update";
        $data = array();
        $data["admin_main_content"] = $this->load->view("manufacturer/save_manufacturer_component",$cdata,TRUE);
        $data["title"] = "Edit Manufacturer";
        $this->load->view('shared/admin_master_ui', $data);
    }
    
    public function update_manufacturer(){
        $data = array();
        $manufacturer_id = $this->input->post("manufacturer_id", TRUE);
        $data["manufacturer_name"] = $this->input->post("manufacturer_name", TRUE);
        $data["manufacturer_description"] = $this->input->post("manufacturer_description", TRUE);
        $data["mn_publication_status"] = $this->input->post("mn_publication_status", TRUE);
        $sdata = array();
        if($this->manufacturer_model->update_manufacturer_by_id($data, $manufacturer_id) > 0){
            $sdata["message"] = "<strong>UPDATED</strong> Manufacturer Information Successfully.";
        } else {
            $sdata["error"] = "Could <strong>NOT</strong> update Manufacturer Information .....";
        }
        $this->session->set_userdata($sdata);
        redirect("manufacturer_controller/edit_manufacturer/".$manufacturer_id);
    }
    
    public function delete_manufacturer($manufacturer_id) {
        $sdata = array();
        if($this->manufacturer_model->delete_manufacturer_by_id($manufacturer_id) > 0){
            $sdata["message"] = "<strong>DELETED</strong> Manufacturer Information Successfully.";
        } else {
            $sdata["error"] = "Could <strong>NOT</strong> delete Manufacturer Information .....";
        }
        $this->session->set_userdata($sdata);
        redirect("manufacturer_controller");
    }
    
    public function publish_manufacturer($manufacturer_id) {
        $sdata = array();
        if($this->manufacturer_model->update_mn_publication_status_by_id(1, $manufacturer_id) > 0){
            $sdata["message"] = "<strong>PUBLISHED</strong> Manufacturer Information Successfully.";
        } else {
            $sdata["error"] = "Could <strong>NOT</strong> publish Manufacturer Information .....";
        }
        $this->session->set_userdata($sdata);
        redirect("manufacturer_controller");
    }
    
    public function unpublish_manufacturer($manufacturer_id) {
        $sdata = array();
        if($this->manufacturer_model->update_mn_publication_status_by_id(0, $manufacturer_id) > 0){
            $sdata["message"] = "<strong>UNPUBLISHED</strong> Manufacturer Information Successfully.";
        } else {
            $sdata["error"] = "Could <strong>NOT</strong> unpublish Manufacturer Information .....";
        }
        $this->session->set_userdata($sdata);
        redirect("manufacturer_controller");
    }
    
    public function check_manufacturer_name($manufacturer_name) {
        echo count($this->manufacturer_model->select_manufacturers_by_name($manufacturer_name));
    }
    
    public function check_name_considering_id($manufacturer_id, $manufacturer_name) {
        echo count($this->manufacturer_model->select_manufacturers_by_name_except_id($manufacturer_name, $manufacturer_id));
    }
}
