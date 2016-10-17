<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Category_Model
 *
 * @author Mahmudul Hasan Khan CSE
 */
class Category_Model extends CI_Model {
    //put your code here
    
    public function select_all_categories(){
        $this->db->select("*");
        $this->db->from("tbl_category");
        $this->db->order_by("category_id", "desc");
        return $this->db->get()->result();
    }
    
    public function select_categories_by_publication_status($ct_publication_status){
        $this->db->select("*");
        $this->db->from("tbl_category");
        $this->db->where("ct_publication_status", $ct_publication_status);
        $this->db->order_by("category_id", "desc");
        return $this->db->get()->result();
    }
    
    public function select_categories_by_name($category_name){
        $this->db->select("*");
        $this->db->from("tbl_category");
        $this->db->where("category_name", $category_name);
        return $this->db->get()->result();
    }
    
    public function select_categories_by_name_except_id($category_name, $category_id){
        $this->db->select("*");
        $this->db->from("tbl_category");
        $this->db->where("category_name", $category_name);
        $this->db->where("category_id !=", $category_id);
        return $this->db->get()->result();
    }
    
    public function insert_category_info($data) {
        return $this->db->insert("tbl_category", $data);
    }
    
    public function select_category_by_id($category_id) {
        $this->db->select("*");
        $this->db->from("tbl_category");
        $this->db->where("category_id", $category_id);
        return $this->db->get()->row();
    }
    
    public function update_category_by_id($data, $category_id) {
        $this->db->where("category_id", $category_id);
        return $this->db->update("tbl_category", $data);
    }
    
    public function delete_category_by_id($category_id) {
        $this->db->where("category_id",$category_id);
        return $this->db->delete("tbl_category");  
    }
    
    public function update_ct_publication_status_by_id($ct_publication_status, $category_id) {
        if($ct_publication_status == 0) {
            $this->product_model->update_pr_publication_status_by_category(0, $category_id);
        }
        $this->db->set("ct_publication_status", $ct_publication_status);
        $this->db->where("category_id", $category_id);
        return $this->db->update("tbl_category");
    }
}
