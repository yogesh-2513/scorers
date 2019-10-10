<?php
// Created By T.Yogesh


class Dashboard extends CI_Controller{
    public function index(){
        if(!$this->session->userdata('adminlogin') && $this->session->userdata('admin_id')==null)
            redirect(base_url()."admin/login");
        
        $gallery=$this->GalleryModel->get();
        $events=$this->EventModel->get_events();
        $blogs=$this->BlogModel->get();
        $data['gallery_count']=$this->get_count($gallery);
        $data['events_count']=$this->get_count($events);
        $data['blogs_count']=$this->get_count($blogs);
        $this->load->view("admin/includes/header");
        $this->load->view("admin/includes/sidebar");
        $this->load->view("admin/dashboard",$data);
        $this->load-> view("admin/includes/footer");
    }
    public function get_count($object){
        $count=0;
        foreach ($object as $value) {
            $count++;
        }
        return $count;
    }
}


?>