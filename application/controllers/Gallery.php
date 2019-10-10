<?php

// created and developed by T.Yogesh

class Gallery extends CI_Controller{
    public function index(){
        $this->load->model("cms/Portfolio");
        $data['events']=$this->Portfolio->get_events();
        $data['contact']=$this->Portfolio->get_contact();
        $data['gallery']=$this->Portfolio->get_images();
        $data['active_page']="gallery";
        $data['modules']=$this->HomeModel->get_active_modules();
        $this->load->view("cms/includes/header",$data);
        $this->load->view("cms/gallery",$data);
        $this->load->view("cms/includes/footer",$data);
    }
    
}

?>