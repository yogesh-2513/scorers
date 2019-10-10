<?php
// Created By T.Yogesh
class Modules extends CI_Controller{
    public function index(){
        if(!$this->session->userdata('adminlogin') && $this->session->userdata('admin_id')==null)
            redirect(base_url()."admin/login");
        $this->load->model('admin/ModulesModel');
        $data['modules']=$this->ModulesModel->get_modules();
        $this->load->view("admin/includes/header");
        $this->load->view("admin/includes/sidebar");
        $this->load->view("admin/modules",$data);
        $this->load-> view("admin/includes/footer");
    }
    public function change_status(){
        $id=$this->input->post('id');
        $status=$this->input->post("status");
        $update=array(
            "status"=>$status
        );  
        $this->load->model('admin/ModulesModel');
        if($this->ModulesModel->change_status($update,$id)){
            $result=array(
                "error"=>0,
                "msg"=>"Module updated successfully !!"
            );
            echo json_encode($result);
        }else{
            $result=array(
                "error"=>1,
                "msg"=>"Failed to update the module !!"
            );
            echo json_encode($result);
        }
    }
}