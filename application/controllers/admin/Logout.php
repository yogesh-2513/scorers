<?php
// Created By T.Yogesh
class Logout extends CI_Controller{
    public function index(){
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('admin_login');
        redirect(base_url()."home");
    }
}

?>