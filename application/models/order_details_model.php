<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Order_Details_Model
 *
 * @author Mahmudul Hasan Khan CSE
 */
class Order_Details_Model extends CI_Model {
    //put your code here
    
    public function insert_order_details_info($data) {
        return $this->db->insert("tbl_order_details", $data);
    }
    
    public function select_order_deatails_by_order_id($order_id) {
        $this->db->select("*");
        $this->db->from("tbl_order_details");
        $this->db->join('tbl_product','tbl_order_details.product_id=tbl_product.product_id','left');
        $this->db->where("order_id", $order_id);
        return $this->db->get()->result();
    }
    
    public function delete_order_details_by_order($order_id) {
        $this->db->where("order_id",$order_id);
        return $this->db->delete("tbl_order_details");  
    }
    
    public function select_order_by_id($order_id) {
        return $this->order_model->select_order_by_id($order_id);
    }
    
    public function select_customer_by_id($customer_id){
        return $this->customer_model->select_customer_by_id($customer_id);
    }
    
    public function select_shipping_by_id($shipping_id){
        return $this->shipping_model->select_shipping_by_id($shipping_id);
    }
}
