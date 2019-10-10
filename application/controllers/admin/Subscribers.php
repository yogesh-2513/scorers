<?php
// Created By T.Yogesh
class Subscribers extends CI_Controller{
    public function index(){
        if(!$this->session->userdata('adminlogin') && $this->session->userdata('admin_id')==null)
        redirect(base_url()."admin/login");
        $this->load->model('admin/SubscribersModel');
        $data['subscribers']=$this->SubscribersModel->get();
        $this->load->view("admin/includes/header");
        $this->load->view("admin/includes/sidebar");
        $this->load->view("admin/subscribers",$data);
        $this->load-> view("admin/includes/footer");
    }
    public function delete_subscriber(){
        $id=$this->input->post('id');
        $this->load->model('admin/SubscribersModel');
        if($this->SubscribersModel->delete_subscriber($id)){
            $result=array(
                'error'=>0,
                'msg'=>"Subscriber deleted successfully !!"
            );
            echo json_encode($result);
        }else{
            $result=array(
                'error'=>1,
                'msg'=>"Failed to delete the subscriber !!"
            );
            echo json_encode($result);
        }
    }
}