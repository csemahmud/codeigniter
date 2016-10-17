<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin_Model
 *
 * @author Mahmudul Hasan Khan CSE
 */
class Admin_Model extends CI_Model {
    //put your code here
    
    public function select_admin_by_email_password($admin_email,$admin_password) {
        $this->db->select("*");
        $this->db->from("tbl_admin");
        $this->db->where("admin_email",$admin_email);
        $this->db->where("admin_password",$admin_password);
        return $this->db->get()->row();
    }
    
    public function select_all_products(){
        return $this->product_model->select_all_products();
    }
}
