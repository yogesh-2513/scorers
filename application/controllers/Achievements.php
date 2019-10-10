<?php

// created and developed by T.Yogesh

class Achievements extends CI_Controller{
    public function index(){
        $this->load->model("cms/AchievementsModel");
        $data['events']=$this->AchievementsModel->get_events();
        $data['contact']=$this->AchievementsModel->get_contact();
        $data['achievements']=$this->AchievementsModel->get_achievements();
        $data['active_page']="achievements";
        $data['modules']=$this->HomeModel->get_active_modules();
        $this->load->view("cms/includes/header",$data);
        $this->load->view("cms/achievements",$data);
        $this->load->view("cms/includes/footer",$data);
    }
    
}

?>