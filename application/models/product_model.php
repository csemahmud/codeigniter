<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Product_Model
 *
 * @author Mahmudul Hasan Khan CSE
 */
class Product_Model extends CI_Model {
    //put your code here
    
    public function select_all_published_products_joining_category_joining_manufacturer() {
        $this->db->select('product_id, product_name, product_price, upload_path, product_image, category_name, manufacturer_name');
        $this->db->from('tbl_product');
        $this->db->join('tbl_category','tbl_category.category_id=tbl_product.category_id','left');
        $this->db->join('tbl_manufacturer','tbl_manufacturer.manufacturer_id=tbl_product.manufacturer_id','left');
        $this->db->where('ct_publication_status',1);
        $this->db->where('mn_publication_status',1);
        $this->db->where('pr_publication_status',1);
        return $this->db->get()->result();
    }
    
    public function select_all_products_joining_category_joining_manufacturer() {
        $this->db->select('product_id, product_name, pr_publication_status, category_name, manufacturer_name');
        $this->db->from('tbl_product');
        $this->db->join('tbl_category','tbl_category.category_id=tbl_product.category_id','left');
        $this->db->join('tbl_manufacturer','tbl_manufacturer.manufacturer_id=tbl_product.manufacturer_id','left');
        return $this->db->get()->result();
    }
    
    public function select_all_products(){
        $this->db->select("*");
        $this->db->from("tbl_product");
        $this->db->order_by("product_id", "desc");
        return $this->db->get()->result();
    }
    
    public function select_products_by_category($category_id){
        $this->db->select("*");
        $this->db->from("tbl_product");
        $this->db->where("category_id",$category_id);
        $this->db->order_by("product_id", "desc");
        return $this->db->get()->result();
    }
    
    public function select_products_by_manufacturer($manufacturer_id){
        $this->db->select("*");
        $this->db->from("tbl_product");
        $this->db->where("manufacturer_id",$manufacturer_id);
        $this->db->order_by("product_id", "desc");
        return $this->db->get()->result();
    }
    
    public function select_products_by_category_manufacturer($category_id, $manufacturer_id){
        $this->db->select("*");
        $this->db->from("tbl_product");
        $this->db->where("category_id",$category_id);
        $this->db->where("manufacturer_id",$manufacturer_id);
        $this->db->order_by("product_id", "desc");
        return $this->db->get()->result();
    }
    
    public function select_products_by_publication($pr_publication_status){
        $this->db->select("*");
        $this->db->from("tbl_product");
        $this->db->where("pr_publication_status",$pr_publication_status);
        $this->db->order_by("product_id", "desc");
        return $this->db->get()->result();
    }
    
    public function select_products_by_category_publication($category_id, $pr_publication_status){
        $this->db->select("*");
        $this->db->from("tbl_product");
        $this->db->where("category_id",$category_id);
        $this->db->where("pr_publication_status",$pr_publication_status);
        $this->db->order_by("product_id", "desc");
        return $this->db->get()->result();
    }
    
    public function select_products_by_manufacturer_publication($manufacturer_id, $pr_publication_status){
        $this->db->select("*");
        $this->db->from("tbl_product");
        $this->db->where("manufacturer_id",$manufacturer_id);
        $this->db->where("pr_publication_status",$pr_publication_status);
        $this->db->order_by("product_id", "desc");
        return $this->db->get()->result();
    }
    
    public function select_products_by_category_manufacturer_publication($category_id, $manufacturer_id, $pr_publication_status){
        $this->db->select("*");
        $this->db->from("tbl_product");
        $this->db->where("category_id",$category_id);
        $this->db->where("manufacturer_id",$manufacturer_id);
        $this->db->where("pr_publication_status",$pr_publication_status);
        $this->db->order_by("product_id", "desc");
        return $this->db->get()->result();
    }
    
    public function select_best_seller_products(){
        $this->db->select("*");
        $this->db->from("tbl_product");
        $this->db->where("pr_publication_status", 1);
        $this->db->order_by('sold_quantity desc, product_id desc');
        $this->db->limit(5);
        return $this->db->get()->result();
    }
    
    public function insert_product_info($data) {
        return $this->db->insert("tbl_product", $data);
    }
    
    public function select_product_by_id($product_id) {
        $this->db->select("*");
        $this->db->from("tbl_product");
        $this->db->where("product_id", $product_id);
        return $this->db->get()->row();
    }
    
    public function select_product_by_id_joining_manufacturer($product_id) {
        $this->db->select("*");
        $this->db->from("tbl_product");
        $this->db->join('tbl_manufacturer','tbl_manufacturer.manufacturer_id=tbl_product.manufacturer_id','left');
        $this->db->where("product_id", $product_id);
        return $this->db->get()->row();
    }
    
    public function update_product_by_id($data, $product_id) {
        $this->db->where("product_id", $product_id);
        return $this->db->update("tbl_product", $data);
    }
    
    public function delete_product_by_id($product_id) {
        $this->db->where("product_id",$product_id);
        return $this->db->delete("tbl_product");  
    }
    
    public function update_pr_publication_status_by_id($pr_publication_status, $product_id) {
        $this->db->set("pr_publication_status", $pr_publication_status);
        $this->db->where("product_id", $product_id);
        return $this->db->update("tbl_product");
    }
    
    public function update_pr_publication_status_by_category($pr_publication_status, $category_id) {
        $this->db->set("pr_publication_status", $pr_publication_status);
        $this->db->where("category_id", $category_id);
        return $this->db->update("tbl_product");
    }
    
    public function update_pr_publication_status_by_manufacturer($pr_publication_status, $manufacturer_id) {
        $this->db->set("pr_publication_status", $pr_publication_status);
        $this->db->where("manufacturer_id", $manufacturer_id);
        return $this->db->update("tbl_product");
    }
    
    public function select_all_categories(){
        return $this->category_model->select_all_categories();
    }
    
    public function select_categories_by_publication_status($ct_publication_status){
        return $this->category_model->select_categories_by_publication_status($ct_publication_status);
    }
    
    public function select_all_manufacturers(){
        return $this->manufacturer_model->select_all_manufacturers();
    }
    
    public function select_manufacturers_by_publication_status($mn_publication_status){
        return $this->manufacturer_model->select_manufacturers_by_publication_status($mn_publication_status);
    }
}
