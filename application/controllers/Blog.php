<?php

// created and developed by T.Yogesh

class Blog extends CI_Controller{
    public function index(){
        $this->load->model("cms/BlogsModel");
        $data['events']=$this->BlogsModel->get_events();
        $data['contact']=$this->BlogsModel->get_contact();
        $data['blogs']=$this->BlogsModel->get_blogs();
        $data['active_page']="blog";
        $data['modules']=$this->HomeModel->get_active_modules();
        $this->load->view("cms/includes/header",$data);
        $this->load->view("cms/blog",$data);
        $this->load->view("cms/includes/footer",$data);
    }
    public function viewblog($id){
        $data['modules']=$this->HomeModel->get_active_modules();
        $this->load->model("cms/BlogsModel");
        $data['events']=$this->BlogsModel->get_events();
        $data['contact']=$this->BlogsModel->get_contact();
        $data['blogs']=$this->BlogsModel->get_blogs();
        $data['single_blog']=$this->BlogsModel->get_blog_by_id($id);
        $data['comments']=$this->BlogsModel->get_blog_comments($id);
        $this->load->view("cms/includes/header",$data);
        $this->load->view("cms/viewblog",$data);
        $this->load->view("cms/includes/footer",$data);
    }
    public function add_comment(){
        $this->load->model("cms/BlogsModel");
        $name=$this->input->post('name');
        $message=trim($this->input->post('message'));
        $email=$this->input->post("email");
        $blog_id=$this->input->post('id');
        $insert=array(
            "name"=>$name,
            "message"=>$message,
            "email"=>$email,
            "blog_id"=>$blog_id,
            "date"=>date("Y-m-d")
        );
        if($this->BlogsModel->add_comment($insert)){
            $result=array(
                "error"=>0,
                "msg"=>"Comment added successfully !!"
            );
            echo json_encode($result);
        }else{
            $result=array(
                "error"=>1,
                "msg"=>"Failed to add the comment !! Kindly try again..."
            );
            echo json_encode($result);
        }
    }
    
}

?>