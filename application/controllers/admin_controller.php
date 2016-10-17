<?php
session_start();
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin_Controller
 *
 * @author Mahmudul Hasan Khan CSE
 */
class Admin_Controller extends CI_Controller {
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
        $cdata['all_products'] = $this->admin_model->select_all_products();
        $data = array();
        $data['admin_main_content'] = $this->load->view('admin/dashboard_component',$cdata,TRUE);
        $data["title"] = "Dashboard";
        $this->load->view('shared/admin_master_ui', $data);
    }
        
	public function welcome_message() {
            $this->load->view('welcome_message');
	}
    
    public function logout(){
        $this->session->unset_userdata("admin_id");
        $this->session->unset_userdata("admin_name");
        $sdata = array();
        $sdata["message"] = "You are loggedout successfully";
        $this->session->set_userdata($sdata);
        redirect("login_controller");
    }
}
