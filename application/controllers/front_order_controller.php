<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Front_Order_Controller
 *
 * @author Mahmudul Hasan Khan CSE
 */
class Front_Order_Controller extends CI_Controller {
    //put your code here
    
    public function confirm_order() {
        $payment_id = $this->input->post("payment_id", TRUE);
        $sdata = array();
        if($payment_id == 2 ) {
            $sdata["alert"] = "Sorry, Paypal option is not Active !!!";
            $this->session->set_userdata($sdata);
            redirect("payment_controller");
        }
        
        $data = array();
        $data["payment_id"] = $payment_id;
        $data["customer_id"] = $this->session->userdata("customer_id");
        $data["shipping_id"] = $this->session->userdata("shipping_id");
        $data["order_total"] = $this->cart->total();
        if($this->front_order_model->insert_order_info($data) > 0) {
            $this->cart->destroy();
            redirect("front_controller/order_complete");
        } else {
            $sdata["alert"] = "Could NOT save Order Information .....";
        }
        $this->session->set_userdata($sdata);
        redirect("payment_controller");
    }
}
