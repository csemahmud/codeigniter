<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login_Model
 *
 * @author Mahmudul Hasan Khan CSE
 */
class Login_Model extends CI_Model {
    //put your code here
    
    public function select_admin_by_email_password($admin_email,$admin_password) {
        return $this->admin_model->select_admin_by_email_password($admin_email,$admin_password);
    }
}
