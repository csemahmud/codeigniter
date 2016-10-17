<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Manufacturer_Model
 *
 * @author Mahmudul Hasan Khan CSE
 */
class Manufacturer_Model extends CI_Model {
    //put your code here
    
    public function select_all_manufacturers(){
        $this->db->select("*");
        $this->db->from("tbl_manufacturer");
        $this->db->order_by("manufacturer_id", "desc");
        return $this->db->get()->result();
    }
    
    public function select_manufacturers_by_publication_status($mn_publication_status){
        $this->db->select("*");
        $this->db->from("tbl_manufacturer");
        $this->db->where("mn_publication_status", $mn_publication_status);
        $this->db->order_by("manufacturer_id", "desc");
        return $this->db->get()->result();
    }
    
    public function select_manufacturers_by_name($manufacturer_name){
        $this->db->select("*");
        $this->db->from("tbl_manufacturer");
        $this->db->where("manufacturer_name", $manufacturer_name);
        return $this->db->get()->result();
    }
    
    public function select_manufacturers_by_name_except_id($manufacturer_name, $manufacturer_id){
        $this->db->select("*");
        $this->db->from("tbl_manufacturer");
        $this->db->where("manufacturer_name", $manufacturer_name);
        $this->db->where("manufacturer_id !=", $manufacturer_id);
        return $this->db->get()->result();
    }
    
    public function insert_manufacturer_info($data) {
        return $this->db->insert("tbl_manufacturer", $data);
    }
    
    public function select_manufacturer_by_id($manufacturer_id) {
        $this->db->select("*");
        $this->db->from("tbl_manufacturer");
        $this->db->where("manufacturer_id", $manufacturer_id);
        return $this->db->get()->row();
    }
    
    public function update_manufacturer_by_id($data, $manufacturer_id) {
        $this->db->where("manufacturer_id", $manufacturer_id);
        return $this->db->update("tbl_manufacturer", $data);
    }
    
    public function delete_manufacturer_by_id($manufacturer_id) {
        $this->db->where("manufacturer_id",$manufacturer_id);
        return $this->db->delete("tbl_manufacturer");  
    }
    
    public function update_mn_publication_status_by_id($mn_publication_status, $manufacturer_id) {
        if($mn_publication_status == 0) {
            $this->product_model->update_pr_publication_status_by_manufacturer(0, $manufacturer_id);
        }
        $this->db->set("mn_publication_status", $mn_publication_status);
        $this->db->where("manufacturer_id", $manufacturer_id);
        return $this->db->update("tbl_manufacturer");
    }
}
