<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Customer_Model
 *
 * @author Mahmudul Hasan Khan CSE
 */
class Customer_Model extends CI_Model {
    //put your code here
    
    public function select_customers_by_email($customer_email){
        $this->db->select("*");
        $this->db->from("tbl_customer");
        $this->db->where("customer_email", $customer_email);
        return $this->db->get()->result();
    }
    
    public function insert_customer_info($data) {
        $value_return = $this->db->insert("tbl_customer", $data);
        if($value_return > 0){
            $sdata = array();
            $sdata["customer_id"] = $this->db->insert_id();
            $sdata["customer_name"] = $data["first_name"]." ".$sdata["last_name"];
            $this->session->set_userdata($sdata);
        }
        return $value_return;
    }
    
    public function select_customer_by_email_password($customer_email, $customer_password) {
        $this->db->select("*");
        $this->db->from("tbl_customer");
        $this->db->where("customer_email", $customer_email);
        $this->db->where("customer_password", $customer_password);
        return $this->db->get()->row();
    }
    
    public function select_customer_by_id($customer_id){
        $this->db->select("*");
        $this->db->from("tbl_customer");
        $this->db->where("customer_id", $customer_id);
        return $this->db->get()->row();
    }
}
