<?php
session_start();
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Product_Controller
 *
 * @author Mahmudul Hasan Khan CSE
 */
class Product_Controller extends CI_Controller {
    //put your code here    
    
    public function __construct() {
        parent::__construct();
        $admin_id = $this->session->userdata("admin_id");
        if($admin_id == NULL) {
            redirect("login_controller","refresh");
        } else {
            define("UPLOAD_PATH","uploads/product_images/");
        }
    }
    
    public function index() {
        $cdata = array();
        $cdata["all_categories"] = $this->product_model->select_all_categories();
        $cdata["all_manufacturers"] = $this->product_model->select_all_manufacturers();
        $cdata["all_products"] = $this->product_model->select_all_products();
        $data = array();
        $data['admin_main_content'] = $this->load->view('product/manage_product_component',$cdata,TRUE);
        $data["title"] = "Product";
        $this->load->view('shared/admin_master_ui', $data);
    }
    
    public function add_product(){
        $cdata = array();
        $cdata["all_categories"] = $this->product_model->select_categories_by_publication_status(1);
        $cdata["all_manufacturers"] = $this->product_model->select_manufacturers_by_publication_status(1);
        $cdata["function"] = "Add";
        $data = array();
        $data["admin_main_content"] = $this->load->view("product/save_product_component",$cdata,TRUE);
        $data["title"] = "Add Product";
        $this->load->view('shared/admin_master_ui', $data);
    }
    
    public function save_product(){
        $data = array();
        $data["product_name"] = $this->input->post("product_name", TRUE);
        $data["category_id"] = $this->input->post("category_id", TRUE);
        $data["manufacturer_id"] = $this->input->post("manufacturer_id", TRUE);
        $data["product_short_description"] = $this->input->post("product_short_description", TRUE);
        $data["product_long_description"] = $this->input->post("product_long_description", TRUE);
        $data["product_price"] = $this->input->post("product_price", TRUE);
        $data["product_quantity"] = $this->input->post("product_quantity", TRUE);
        $expiry_date = $this->input->post("expiry_date", TRUE);
        if(($expiry_date != NULL)&&($expiry_date != '')){
            $data["expiry_date"] = $this->input->post("expiry_date", TRUE);
        }
        $data["pr_publication_status"] = $this->input->post("pr_publication_status", TRUE);
        
        if ($_FILES['product_image']['name']) {
            
                $fdata=array();
        	$config['upload_path'] = UPLOAD_PATH;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '500';
                $config['max_width']  = '1050';
                $config['max_height']  = '1050';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('product_image'))
		{
			$error = $this->upload->display_errors();
                        $data['error'] = $error;
                        $this->session->set_userdata($data);
                        redirect('product_controller/add_product');
		}
		else
		{
			$fdata = $this->upload->data();
                        $data['product_image'] = $fdata['file_name'];
                        $data["upload_path"] = $config['upload_path'];
		}
        }
        else {
            $data['product_image'] = '';
            $data["upload_path"] = '';
        }
        
        $sdata = array();
        if($this->product_model->insert_product_info($data) > 0){
            $sdata["message"] = "<strong>SAVED</strong> Product Information Successfully.";
        } else {
            $sdata["error"] = "Could <strong>NOT</strong> save Product Information .....";
        }
        $this->session->set_userdata($sdata);
        redirect("product_controller/add_product");
    }
    
    public function edit_product($product_id){
        $cdata = array();
        $cdata["all_categories"] = $this->product_model->select_all_categories();
        $cdata["all_manufacturers"] = $this->product_model->select_all_manufacturers();
        $cdata["product_info"] = $this->product_model->select_product_by_id($product_id);
        $cdata["function"] = "Update";
        $data = array();
        $data["admin_main_content"] = $this->load->view("product/save_product_component",$cdata,TRUE);
        $data["title"] = "Edit Product";
        $this->load->view('shared/admin_master_ui', $data);
    }
    
    public function update_product(){
        $data = array();
        $product_id = $this->input->post("product_id", TRUE);
        $data["product_name"] = $this->input->post("product_name", TRUE);
        $data["category_id"] = $this->input->post("category_id", TRUE);
        $data["manufacturer_id"] = $this->input->post("manufacturer_id", TRUE);
        $data["product_short_description"] = $this->input->post("product_short_description", TRUE);
        $data["product_long_description"] = $this->input->post("product_long_description", TRUE);
        $data["product_price"] = $this->input->post("product_price", TRUE);
        $data["product_quantity"] = $this->input->post("product_quantity", TRUE);
        $expiry_date = $this->input->post("expiry_date", TRUE);
        if(($expiry_date != NULL)&&($expiry_date != '')){
            $data["expiry_date"] = $this->input->post("expiry_date", TRUE);
        }
        $data["pr_publication_status"] = $this->input->post("pr_publication_status", TRUE);
        $data["product_image"] = $this->input->post("product_image_value", TRUE);
        $data["upload_path"] = $this->input->post("upload_path_value", TRUE);
        
        if ($_FILES['product_image']['name']) {
            
                $fdata=array();
        	$config['upload_path'] = UPLOAD_PATH;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '500';
                $config['max_width']  = '1050';
                $config['max_height']  = '1050';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('product_image'))
		{
			$error = $this->upload->display_errors();
                        $data['error'] = $error;
                        $this->session->set_userdata($data);
                        redirect('product_controller/add_product');
		}
		else
		{
			$fdata = $this->upload->data();
                        $data['product_image'] = $fdata['file_name'];
                        $data["upload_path"] = $config['upload_path'];
		}
        }
        
        $sdata = array();
        if($this->product_model->update_product_by_id($data, $product_id) > 0){
            $sdata["message"] = "<strong>UPDATED</strong> Product Information Successfully.";
        } else {
            $sdata["error"] = "Could <strong>NOT</strong> update Product Information .....";
        }
        $this->session->set_userdata($sdata);
        redirect("product_controller/edit_product/".$product_id);
    }
    
    public function delete_product($product_id) {
        $sdata = array();
        if($this->product_model->delete_product_by_id($product_id) > 0){
            $sdata["message"] = "<strong>DELETED</strong> Product Information Successfully.";
        } else {
            $sdata["error"] = "Could <strong>NOT</strong> delete Product Information .....";
        }
        $this->session->set_userdata($sdata);
        redirect("product_controller");
    }
    
    public function publish_product($product_id) {
        $sdata = array();
        if($this->product_model->update_pr_publication_status_by_id(1, $product_id) > 0){
            $sdata["message"] = "<strong>PUBLISHED</strong> Product Information Successfully.";
        } else {
            $sdata["error"] = "Could <strong>NOT</strong> publish Product Information .....";
        }
        $this->session->set_userdata($sdata);
        redirect("product_controller");
    }
    
    public function unpublish_product($product_id) {
        $sdata = array();
        if($this->product_model->update_pr_publication_status_by_id(0, $product_id) > 0){
            $sdata["message"] = "<strong>UMPUBLISHED</strong> Product Information Successfully.";
        } else {
            $sdata["error"] = "Could <strong>NOT</strong> unpublish Product Information .....";
        }
        $this->session->set_userdata($sdata);
        redirect("product_controller");
    }
    
    public function ajs_delete_product($product_id) {
        $sdata = array();
        if($this->product_model->delete_product_by_id($product_id) > 0){
            $sdata["message"] = "<strong>DELETED</strong> Product Information Successfully.";
        } else {
            $sdata["error"] = "Could <strong>NOT</strong> delete Product Information .....";
        }
        $this->session->set_userdata($sdata);
        redirect("product_controller/product_ajs");
    }
    
    public function ajs_publish_product($product_id) {
        $sdata = array();
        if($this->product_model->update_pr_publication_status_by_id(1, $product_id) > 0){
            $sdata["message"] = "<strong>PUBLISHED</strong> Product Information Successfully.";
        } else {
            $sdata["error"] = "Could <strong>NOT</strong> publish Product Information .....";
        }
        $this->session->set_userdata($sdata);
        redirect("product_controller/product_ajs");
    }
    
    public function ajs_unpublish_product($product_id) {
        $sdata = array();
        if($this->product_model->update_pr_publication_status_by_id(0, $product_id) > 0){
            $sdata["message"] = "<strong>UMPUBLISHED</strong> Product Information Successfully.";
        } else {
            $sdata["error"] = "Could <strong>NOT</strong> unpublish Product Information .....";
        }
        $this->session->set_userdata($sdata);
        redirect("product_controller/product_ajs");
    }
    
    public function ajax_product_grid($category_id, $manufacturer_id) {
        $cdata = array();
        if($category_id == 'all' && $manufacturer_id == 'all'){
            $cdata["selected_products"] = $this->product_model->select_all_products();
        } else if($category_id == 'all') {
            $cdata["selected_products"] = $this->product_model->select_products_by_manufacturer($manufacturer_id);
        } else if($manufacturer_id == 'all') {
            $cdata["selected_products"] = $this->product_model->select_products_by_category($category_id);
        } else {
            $cdata["selected_products"] = $this->product_model->select_products_by_category_manufacturer($category_id,$manufacturer_id);
        }
        $this->load->view('product/ajax_product_grid', $cdata);
    }
        
    public function all_products_json() {
        $data = array();
        $all_products = $this->product_model->select_all_products_joining_category_joining_manufacturer();
        $products_json_str = '{"products":[';
        $count1 = 0;
        foreach ($all_products as $v_product) {
            $count1++;
            $products_json_str .= "{";
            $array1 = array();
            $i = 0;
            foreach ($v_product as $key => $value) {
                $array1[$i] = '"'.$key.'":"'.$value.'"';
                $i++;
            }
            $products_json_str .= implode(",", $array1);
            $products_json_str .= "}";
            if($count1 < count($all_products)) {
                $products_json_str .= ",";
            }
        }
        $products_json_str .= "]}";
        $data['all_products'] = $all_products;
        $data['products_json_str'] = $products_json_str;
        $this->load->view('shared/all_products_json',$data);
    }
    
    // This is left for R&D
    
    public function product_ajs() {
        $data = array();
        $data['admin_main_content'] = $this->load->view('product/product_ajs_component','',TRUE);
        $data["title"] = "AJS Product";
        $this->load->view('shared/admin_master_ui', $data);
    }
}
