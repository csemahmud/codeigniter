<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Payment_Controller
 *
 * @author Mahmudul Hasan Khan CSE
 */
class Payment_Controller extends CI_Controller {
    //put your code here
    
    public function index() {
        $mdata = array();
        $mdata["all_published_categories"] = $this->payment_model->select_categories_by_publication_status(1);
        $mdata["all_published_manufacturers"] = $this->payment_model->select_manufacturers_by_publication_status(1);
        $cdata = array();
        $customer_id = $this->session->userdata("customer_id");
        $shipping_id = $this->session->userdata("shipping_id");
        if(($customer_id != NULL)&&($shipping_id != NULL)){
            $pdata = array();
            $pdata["all_payments"] = $this->payment_model->select_all_payments();
            $cdata["checkout_component"] = $this->load->view("payment/payment_method_component",$pdata,TRUE);
        } elseif ($shipping_id == NULL) {
            redirect("cart_controller");
        }
        $data = array();
        $data["submenu"] = $this->load->view("front/other_submenu_component",$mdata,TRUE);
        $data["main_content"] = $this->load->view("cart/cart_component",$cdata,TRUE);
        $data["title"] = "Payment";
        $this->load->view('shared/front_master_ui', $data);
    }
}
