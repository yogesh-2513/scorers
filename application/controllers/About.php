<?php

// created and developed by T.Yogesh

class About extends CI_Controller{
    public function index(){
        $this->load->model('cms/AboutModel');
        $data['about']=$this->AboutModel->get_about();
        $data['team']=$this->AboutModel->get_team();
        $data['events']=$this->AboutModel->get_events();
        $data['contact']=$this->AboutModel->get_contact();
        $data['active_page']="about";
        $data['modules']=$this->HomeModel->get_active_modules();
        $this->load->view("cms/includes/header",$data);
        $this->load->view("cms/aboutus",$data);
        $this->load->view("cms/includes/footer",$data);
    }
    
}

?>