<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Customer_Controller
 *
 * @author Mahmudul Hasan Khan CSE
 */
class Customer_Controller extends CI_Controller {
    //put your code here
    
    public function check_email($customer_email) {
        echo count($this->customer_model->select_customers_by_email($customer_email));
    }
    
    public function register_customer() {
        $data = array();
        $data["first_name"] = $this->input->post("first_name", TRUE);
        $data["last_name"] = $this->input->post("last_name", TRUE);
        $data["customer_email"] = $this->input->post("customer_email", TRUE);
        $data["customer_password"] = md5($this->input->post("customer_password", TRUE));
        $data["mobile"] = $this->input->post("mobile", TRUE);
        $data["phone"] = $this->input->post("phone", TRUE);
        $data["fax"] = $this->input->post("fax", TRUE);
        $data["company"] = $this->input->post("company", TRUE);
        $data["address"] = $this->input->post("address", TRUE);
        $data["city"] = $this->input->post("city", TRUE);
        $data["country"] = $this->input->post("country", TRUE);
        $data["zip_code"] = $this->input->post("zip_code", TRUE);
        $sdata = array();
        if($this->customer_model->insert_customer_info($data) > 0){
            $sdata["alert"] = "REGISTERED Customer Information Successfully.";
        } else {
            $sdata["alert"] = "Could NOT save Customer Information .....";
        }
        $this->session->set_userdata($sdata);
        redirect("cart_controller");
    }
    
    public function customer_login() {
        $result_customer = $this->customer_model->select_customer_by_email_password(
                $this->input->post("login_email", TRUE),
                md5($this->input->post("login_password", TRUE)));
        $sdata = array();
        if($result_customer){
            $sdata["customer_id"] = $result_customer->customer_id;
            $sdata["customer_name"] = $result_customer->first_name." ".$result_customer->last_name;
        } else {
            $sdata["alert"] = "Error : Invalid Email or Password !!!";
        }
        $this->session->set_userdata($sdata);
        redirect("cart_controller");
    }
    
    public function customer_logout(){
        $this->session->unset_userdata("customer_id");
        $this->session->unset_userdata("customer_name");
        $shipping_id = $this->session->userdata("shipping_id");
        if($shipping_id != NULL){
            $this->session->unset_userdata("shipping_id");
        }
        redirect("front_controller");
    }
}
