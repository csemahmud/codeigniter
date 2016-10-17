<?php
session_start();
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login_Controller
 *
 * @author Mahmudul Hasan Khan CSE
 */
class Login_Controller extends CI_Controller {
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $admin_id = $this->session->userdata("admin_id");
        if($admin_id != NULL) {
            redirect("admin_controller","refresh");
        }
    }
    
    public function index() {
        $this->load->view('login/login_ui');
    }
    
    public function login() {
        $admin_email = $this->input->post("admin_email",true);
        $admin_password = md5($this->input->post("admin_password",true));
        $result_admin = $this->login_model->select_admin_by_email_password($admin_email,$admin_password);
        $sdata = array();
        if($result_admin) {
            $sdata["admin_id"] = $result_admin->admin_id;
            $sdata["admin_name"] = $result_admin->admin_name;
            $this->session->set_userdata($sdata);
            redirect("admin_controller");
        } else {
            $sdata["error"] = "Error : Invalid Email or Password !!!";
            $this->session->set_userdata($sdata);
            redirect("login_controller");
        }
    }
}
