<?php

// created and developed by T.Yogesh

class Services extends CI_Controller{
    public function index(){
        $this->load->model('cms/ServicesModel');
        $data['events']=$this->ServicesModel->get_events();
        $data['services']=$this->ServicesModel->get_services();
        $data['content']=$this->ServicesModel->get_service_page_content();
        $data['contact']=$this->ServicesModel->get_contact();
        $data['active_page']="services";
        $data['modules']=$this->HomeModel->get_active_modules();
        $this->load->view("cms/includes/header",$data);
        $this->load->view("cms/services",$data);
        $this->load->view("cms/includes/footer",$data);
    }
    public function viewservice($id){
        $data['modules']=$this->HomeModel->get_active_modules();
        $this->load->model('cms/ServicesModel');
        $data['events']=$this->ServicesModel->get_events();
        $data['services']=$this->ServicesModel->get_services();
        $data['content']=$this->ServicesModel->get_service_page_content();
        $data['contact']=$this->ServicesModel->get_contact();
        $data['single_service']=$this->ServicesModel->get_service_by_id($id);
        $this->load->view("cms/includes/header",$data);
        $this->load->view("cms/viewservice",$data);
        $this->load->view("cms/includes/footer",$data);
    }

}

?>