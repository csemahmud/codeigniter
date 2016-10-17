<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Front_Model
 *
 * @author Mahmudul Hasan Khan CSE
 */
class Front_Model extends CI_Model {
    //put your code here
    
    public function select_all_published_products_joining_category_joining_manufacturer(){
        return $this->product_model->select_all_published_products_joining_category_joining_manufacturer();
    }
    
    public function select_categories_by_publication_status($ct_publication_status){
        return $this->category_model->select_categories_by_publication_status($ct_publication_status);
    }
    
    public function select_manufacturers_by_publication_status($mn_publication_status){
        return $this->manufacturer_model->select_manufacturers_by_publication_status($mn_publication_status);
    }
    
    public function select_products_by_publication($pr_publication_status){
        return $this->product_model->select_products_by_publication($pr_publication_status);
    }
    
    public function select_products_by_category_publication($category_id, $pr_publication_status){
        return $this->product_model->select_products_by_category_publication($category_id, $pr_publication_status);
    }
    
    public function select_products_by_manufacturer_publication($manufacturer_id, $pr_publication_status){
        return $this->product_model->select_products_by_manufacturer_publication($manufacturer_id, $pr_publication_status);
    }
    
    public function select_products_by_category_manufacturer_publication($category_id, $manufacturer_id, $pr_publication_status){
        return $this->product_model->select_products_by_category_manufacturer_publication($category_id, $manufacturer_id, $pr_publication_status);
    }
    
    public function select_product_by_id_joining_manufacturer($product_id) {
        return $this->product_model->select_product_by_id_joining_manufacturer($product_id);
    }
    
    public function select_best_seller_products(){
        return $this->product_model->select_best_seller_products();
    }
}
