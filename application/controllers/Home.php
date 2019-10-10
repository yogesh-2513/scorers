<?php

// created and developed by T.Yogesh

class Home extends CI_Controller{
    public function index(){
        $data['slideshow']=$this->HomeModel->get_slideshow_images();
        $data['services']=$this->HomeModel->get_services();
        $data['about']=$this->HomeModel->get_about();
        $data['team']=$this->HomeModel->get_team();
        $data['gallery']=$this->HomeModel->get_gallery();
        $data['events']=$this->HomeModel->get_events();
        $data['contact']=$this->HomeModel->get_contact();
        $data['modules']=$this->HomeModel->get_active_modules();
        $data['active_page']="home";
        $data['active_pages']=array();

        foreach ($data['modules'] as $value):
            array_push($data['active_pages'],strtolower($value->name));
        endforeach;

        $this->load->view("cms/includes/header",$data);
        $this->load->view("cms/index",$data);
        $this->load->view("cms/includes/footer",$data);
    }
    public function add_subscriber(){
        $this->load->model('cms/HomeModel');
        $email=trim($this->input->post('email'));
        $insert=array(
            "email"=>$email
        );
        if($this->HomeModel->add_subscriber($insert)){
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