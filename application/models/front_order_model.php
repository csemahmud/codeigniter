<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Front_Order_Model
 *
 * @author Mahmudul Hasan Khan CSE
 */
class Front_Order_Model extends CI_Model {
    //put your code here
    
    public function insert_order_info($data) {
        return $this->order_model->insert_order_info($data);
    }
}
