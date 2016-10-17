<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Payment_Model
 *
 * @author Mahmudul Hasan Khan CSE
 */
class Payment_Model extends CI_Model {
    //put your code here
    
    public function select_categories_by_publication_status($ct_publication_status){
        return $this->category_model->select_categories_by_publication_status($ct_publication_status);
    }
    
    public function select_manufacturers_by_publication_status($mn_publication_status){
        return $this->manufacturer_model->select_manufacturers_by_publication_status($mn_publication_status);
    }
    
    public function select_all_payments(){
        $this->db->select("*");
        $this->db->from("tbl_payment");
        return $this->db->get()->result();
    }
}
