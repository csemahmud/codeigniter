<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cart_Controller
 *
 * @author Mahmudul Hasan Khan CSE
 */
class Cart_Controller extends CI_Controller {
    //put your code here
        
    public function index() {
        $mdata = array();
        $mdata["all_published_categories"] = $this->cart_model->select_categories_by_publication_status(1);
        $mdata["all_published_manufacturers"] = $this->cart_model->select_manufacturers_by_publication_status(1);
        $cdata = array();
        $customer_id = $this->session->userdata("customer_id");
        $shipping_id = $this->session->userdata("shipping_id");
        if($customer_id == NULL){
            $cdata["checkout_component"] = $this->load->view("customer/customer_registration_component",'',TRUE);
        } elseif (($customer_id != NULL)&&($shipping_id == NULL)) {
            $cdata["checkout_component"] = $this->load->view("shipping/shipping_information_component",'',TRUE);
        } elseif (($customer_id != NULL)&&($shipping_id != NULL)) {
            redirect("payment_controller");
        }
        $data = array();
        $data["submenu"] = $this->load->view("front/other_submenu_component",$mdata,TRUE);
        $data["main_content"] = $this->load->view("cart/cart_component",$cdata,TRUE);
            $data["title"] = "Cart";
        $this->load->view('shared/front_master_ui', $data);
    }
    
    public function add_to_cart() {
        $data = array(
            'id' => $this->input->post("product_id",TRUE),
            'qty' => $this->input->post("qty",TRUE),
            'price' => $this->input->post("product_price",TRUE),
            'name' => $this->input->post("product_name",TRUE),
            'image' => $this->input->post("upload_path",TRUE).$this->input->post("product_image",TRUE)
        );
        
        $this->cart->insert($data);
        
        /*echo '<pre>';
        print_r($data);
        print_r($this->cart->contents());
        echo '<pre>';
        exit();*/
        
        redirect("cart_controller");
    }
    
    public function update_cart() {
        $data = array(
            'rowid' => $this->input->post("rowid", TRUE),
            'qty' => $this->input->post("qty", TRUE)
        );
        
        $this->cart->update($data);
        redirect("cart_controller");
    }
    
    public function remove_from_cart($rowid) {
        $data = array(
            'rowid' => $rowid,
            'qty' => 0
        );
        
        $this->cart->update($data);
        redirect("cart_controller");
    }
    
    public function remove_from_cart_home($rowid) {
        $data = array(
            'rowid' => $rowid,
            'qty' => 0
        );
        
        $this->cart->update($data);
        redirect("front_controller/home");
    }
    
    public function remove_from_cart_front($rowid) {
        $data = array(
            'rowid' => $rowid,
            'qty' => 0
        );
        
        $this->cart->update($data);
        redirect("front_controller");
    }
}
