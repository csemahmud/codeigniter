<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Order_Model
 *
 * @author Mahmudul Hasan Khan CSE
 */
class Order_Model extends CI_Model {
    //put your code here
    
    public function insert_order_info($data) {
        $value_return = $this->db->insert("tbl_order", $data);
        if($value_return > 0) {
            $order_id = $this->db->insert_id();
            $oddata = array();
            $oddata["order_id"] = $order_id;
            $contents = $this->cart->contents();
            foreach ($contents as $v_content) {
                $oddata["product_id"] = $v_content["id"];
                $oddata["order_price"] = $v_content["price"];
                $oddata["subtotal_quantity"] = $v_content["qty"];
                $this->order_details_model->insert_order_details_info($oddata);
            }
            
            $sql = "UPDATE tbl_product, tbl_order_details"
                    ." SET tbl_product.product_quantity = tbl_product.product_quantity - tbl_order_details.subtotal_quantity"
                    ." WHERE tbl_product.product_id = tbl_order_details.product_id"
                    ." AND tbl_order_details.order_id = '$order_id'";
            
            $this->db->query($sql);
            
            $sql = "UPDATE tbl_product, tbl_order_details"
                    ." SET tbl_product.sold_quantity = tbl_product.sold_quantity + tbl_order_details.subtotal_quantity"
                    ." WHERE tbl_product.product_id = tbl_order_details.product_id"
                    ." AND tbl_order_details.order_id = '$order_id'";
            
            $this->db->query($sql);
        }
        return $value_return;
    }
    
    public function select_orders_by_page($per_page, $offset) {
        $this->db->select('order_id, order_total, order_status, first_name, last_name');
        $this->db->from('tbl_order');
        $this->db->join('tbl_customer', 'tbl_order.customer_id=tbl_customer.customer_id', 'left');
        $this->db->order_by('order_id', 'desc');
        $this->db->limit($per_page, $offset);
        return $this->db->get()->result();
    }
    
    public function count_order() {
        return $this->db->count_all("tbl_order");
    }
    
    public function select_order_by_id($order_id) {
        $this->db->select("*");
        $this->db->from("tbl_order");
        $this->db->where("order_id", $order_id);
        return $this->db->get()->row();
    }
    
    public function delete_order_by_id($order_id) {
        $this->order_details_model->delete_order_details_by_order($order_id);
        $this->db->where("order_id",$order_id);
        return $this->db->delete("tbl_order");  
    }
    
    public function update_order_status_by_id($order_id, $order_status) {
        $this->db->set("order_status", $order_status);
        $this->db->where("order_id", $order_id);
        return $this->db->update("tbl_order");
    }
}
