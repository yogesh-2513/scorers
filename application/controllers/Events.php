<?php

// created and developed by T.Yogesh

class Events extends CI_Controller{
    public function index(){
        $this->load->model("cms/EventsModel");
        $data['events']=$this->EventsModel->get_events();
        $data['contact']=$this->EventsModel->get_contact();
        $data['active_page']="events";
        $data['modules']=$this->HomeModel->get_active_modules();
        $this->load->view("cms/includes/header",$data);
        $this->load->view("cms/events",$data);
        $this->load->view("cms/includes/footer",$data);
    }
  

    
}

?>