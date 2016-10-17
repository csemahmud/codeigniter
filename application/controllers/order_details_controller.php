<?php
session_start();
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Order_Details_Controller
 *
 * @author Mahmudul Hasan Khan CSE
 */
class Order_Details_Controller extends CI_Controller {
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $admin_id = $this->session->userdata("admin_id");
        if($admin_id == NULL) {
            redirect("login_controller","refresh");
        }
    }
    
    public function order_details($order_id) {
        $cdata = array();
        $cdata["order_info"] = $this->order_details_model->select_order_by_id($order_id);
        $customer_id = $cdata["order_info"]->customer_id;
        $shipping_id = $cdata["order_info"]->shipping_id;
        $cdata["billing_info"] = $this->order_details_model->select_customer_by_id($customer_id);
        $cdata["shipping_info"] = $this->order_details_model->select_shipping_by_id($shipping_id);
        $cdata["order_details"] = $this->order_details_model->select_order_deatails_by_order_id($order_id);
        $data = array();
        $data['admin_main_content'] = $this->load->view("order_details/order_details_component", $cdata, TRUE);
        $data['header_content'] = $this->load->view("order_details/header_order_component", '', TRUE);
        $data["title"] = "Details Order";
        $this->load->view('shared/admin_master_ui', $data);
    }
    
    public function download_invoice($order_id) {
        $cdata = array();
        $cdata["order_info"] = $this->order_details_model->select_order_by_id($order_id);
        $customer_id = $cdata["order_info"]->customer_id;
        $shipping_id = $cdata["order_info"]->shipping_id;
        $cdata["billing_info"] = $this->order_details_model->select_customer_by_id($customer_id);
        $cdata["shipping_info"] = $this->order_details_model->select_shipping_by_id($shipping_id);
        $cdata["order_details"] = $this->order_details_model->select_order_deatails_by_order_id($order_id);
        
        
        $this->load->helper('dompdf');
        $view_file = $this->load->view("order_details/invoice", $cdata, TRUE);
        $file_name = pdf_create($view_file, 'invoice_'.$order_id);
        echo $file_name;
    }
}
