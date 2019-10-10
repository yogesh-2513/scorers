<?php
// Created By T.Yogesh
class Notification extends CI_Controller{
    public function index(){
        if(!$this->session->userdata('adminlogin') && $this->session->userdata('admin_id')==null)
            redirect(base_url()."admin/login");
        $this->load->view("admin/includes/header");
        $this->load->view("admin/includes/sidebar");
        $this->load->view("admin/notification");
        $this->load-> view("admin/includes/footer");
    }
    public function send(){
        $data=$this->NotificationModel->get_subscribers();
        $subscribers=array();
        foreach ($data as $value) {
            array_push($subscribers,$value->email);
        }
        $email="developer.yogesh2513@gmail.com";
        $message=trim($this->input->post('message'));
        $subject=$this->input->post('subject');
        $this->load->library('email');
        $this->email->from($email, 'Scorers Admin');
        $this->email->to($subscribers);
        $this->email->subject($subject);
        $this->email->message($message);
        if($this->email->send()){
            $result=array(
                "error"=>0
            );
            echo json_encode($result);
        }else{
            $result=array(
                "error"=>1
            );
            echo json_encode($result);
        }

    }
}