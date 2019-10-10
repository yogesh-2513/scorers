<?php
// Created By T.Yogesh
class Contact extends CI_Controller{

    public function index(){
        if(!$this->session->userdata('adminlogin') && $this->session->userdata('admin_id')==null)
            redirect(base_url()."admin/login");
        $data['contact']=$this->ContactModel->get();
        $this->load->view("admin/includes/header");
        $this->load->view("admin/includes/sidebar");
        $this->load->view("admin/contact",$data);
        $this->load-> view("admin/includes/footer");
    }
    public function add(){
        $sitemap=trim($this->input->post('sitemap'));
        $address=trim($this->input->post('address'));
        $phno=$this->input->post('phno');
        $email=$this->input->post('email');
        $facebook=$this->input->post('facebook');
        $instagram=$this->input->post('instagram');
        $twitter=$this->input->post('twitter');

        $update=array(
            "sitemap"=>$sitemap,
            "address"=>$address,
            "phno"=>$phno,
            "email"=>$email,
            "twitter"=>$twitter,
            "facebook"=>$facebook,
            "instagram"=>$instagram
        );

        if($this->ContactModel->update($update)){
            $result=array(
                "error"=>0,
                "msg"=>"Contact updated successfully !!"
            );
            echo json_encode($result);
        }else{
            $result=array(
                "error"=>1,
                "msg"=>"Failed to update the contact !!"
            );
            echo json_encode($result);
        }

    }

}