<?php

// created and developed by T.Yogesh

class Careers extends CI_Controller{
    public function index(){
        $this->load->model("cms/CareersModel");
        $data['events']=$this->CareersModel->get_events();
        $data['contact']=$this->CareersModel->get_contact();
        $data['careers']=$this->CareersModel->get_careers();
        $data['promotions']=$this->CareersModel->get_promotions();
        $data['active_page']="careers";
        $data['modules']=$this->HomeModel->get_active_modules();
        $this->load->view("cms/includes/header",$data);
        $this->load->view("cms/careers",$data);
        $this->load->view("cms/includes/footer",$data);
    }
    public function viewcareer($id){
        $data['modules']=$this->HomeModel->get_active_modules();
        $this->load->model("cms/CareersModel");
        $data['events']=$this->CareersModel->get_events();
        $data['contact']=$this->CareersModel->get_contact();
        $data['careers']=$this->CareersModel->get_careers();
        $data['promotions']=$this->CareersModel->get_promotions();
        $data['single_career']=$this->CareersModel->get_career_by_id($id);
        $this->load->view("cms/includes/header",$data);
        $this->load->view("cms/viewcareer",$data);
        $this->load->view("cms/includes/footer",$data);   
    }
    
}

?>