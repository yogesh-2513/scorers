<?php

// created and developed by T.Yogesh

class Contact extends CI_Controller{
    public function index(){
        $this->load->model("cms/ContactsModel");
        $data['events']=$this->ContactsModel->get_events();
        $data['contact']=$this->ContactsModel->get_contact();
        $data['active_page']="contact";
        $data['modules']=$this->HomeModel->get_active_modules();
        $this->load->view("cms/includes/header",$data);
        $this->load->view("cms/contact",$data);
        $this->load->view("cms/includes/footer",$data);
    }
    public function send_mail(){
        $name=$this->input->post('name');
        $email=$this->input->post('email');
        $mobile_number=$this->input->post('number');
        $subject=$this->input->post('subject');
        $user_message=$this->input->post('message');
        $message="Hey admin !! You have an feedback from a user. "." Name : ".$name." Mobile Number : ".$mobile_number. " Email ID : ".$email.
        ' '.$user_message;
        $this->load->library('email');
        $this->email->from($email, 'User');
        $this->email->to('developer.yogesh2513@gmail.com');
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

?>