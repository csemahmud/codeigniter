<?php
session_start();
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Order_Controller
 *
 * @author Mahmudul Hasan Khan CSE
 */
class Order_Controller extends CI_Controller {
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $admin_id = $this->session->userdata("admin_id");
        if($admin_id == NULL) {
            redirect("login_controller","refresh");
        } else {
            define("DELIVERED","Delivered");
            define("PENDING","Pending");
        }
    }
    
    public function index() {
        $cdata = array();
        $this->load->library("pagination");
        $config['base_url'] = base_url().'order_controller/index/';
        $config['total_rows'] = $this->order_model->count_order();
        $config['per_page'] = 2;
        $this->pagination->initialize($config);
        $cdata["delivered"] = DELIVERED;
        $cdata["pending"] = PENDING;
        $cdata['all_orders'] = $this->order_model->select_orders_by_page($config['per_page'], $this->uri->segment(3));
        $data = array();
        $data['admin_main_content'] = $this->load->view('order/manage_order_component',$cdata,TRUE);
        $data["title"] = "Order";
        $this->load->view('shared/admin_master_ui', $data);
    }
    
    public function delete_order($order_id) {
        $sdata = array();
        if($this->order_model->delete_order_by_id($order_id) > 0){
            $sdata["message"] = "<strong>DELETED</strong> Order Information Successfully.";
        } else {
            $sdata["error"] = "Could <strong>NOT</strong> delete Order Information .....";
        }
        $this->session->set_userdata($sdata);
        redirect("order_controller");
    }
    
    public function deliver_order($order_id) {
        $sdata = array();
        if($this->order_model->update_order_status_by_id($order_id, DELIVERED) > 0){
            $sdata["message"] = "<strong>DELIVERED</strong> Order Successfully.";
        } else {
            $sdata["error"] = "Could <strong>NOT</strong> Update Delivery Information .....";
        }
        $this->session->set_userdata($sdata);
        redirect("order_controller");
    }
}
