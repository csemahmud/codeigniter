<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Shipping_Model
 *
 * @author Mahmudul Hasan Khan CSE
 */
class Shipping_Model extends CI_Model {
    //put your code here
    
    public function insert_shipping_info($data) {
        $value_return = $this->db->insert("tbl_shipping", $data);
        if($value_return > 0){
            $sdata = array();
            $sdata["shipping_id"] = $this->db->insert_id();
            $this->session->set_userdata($sdata);
        }
        return $value_return;
    }
    
    public function select_shipping_by_id($shipping_id){
        $this->db->select("*");
        $this->db->from("tbl_shipping");
        $this->db->where("shipping_id", $shipping_id);
        return $this->db->get()->row();
    }
    
    public function select_customer_by_id($customer_id){
        return $this->customer_model->select_customer_by_id($customer_id);
    }
}
