<?php
// Created By T.Yogesh
class Service extends CI_Controller{

    // Functions for service category

    public function category(){
        if(!$this->session->userdata('adminlogin') && $this->session->userdata('admin_id')==null)
            redirect(base_url()."admin/login");
        $data['category']=$this->ServiceModel->get_category();
        $this->load->view("admin/includes/header");
        $this->load->view("admin/includes/sidebar");
        $this->load->view("admin/service_category",$data);
        $this->load-> view("admin/includes/footer");
    }
    public function add_category(){
        $category=trim($this->input->post('category'));
        $insert=array(
            "category"=>$category
        );  
        if($this->ServiceModel->add_category($insert)){
            $result=array(
                "error"=>0,
                "msg"=>"Category added successfully !!"
            );
            echo json_encode($result);
        }else{
            $result=array(
                "error"=>1,
                "msg"=>"Failed to add the category !!"
            );
            echo json_encode($result);
        }
        
    }
    public function edit_service_category($id){
        if(!$this->session->userdata('adminlogin') && $this->session->userdata('admin_id')==null)
            redirect(base_url()."admin/login");
        $data['category']=$this->ServiceModel->get_category();
        $data['edit_category']=$this->ServiceModel->get_category_by_id($id);
        $this->load->view("admin/includes/header");
        $this->load->view("admin/includes/sidebar");
        $this->load->view("admin/edit_service_category",$data);
        $this->load-> view("admin/includes/footer");
    }
    public function do_edit_category(){
        $category=trim($this->input->post('category'));
        $id=$this->input->post('id');
        $update=array(
            "category"=>$category
        );  
        if($this->ServiceModel->update_category($update,$id)){
            $result=array(
                "error"=>0,
                "msg"=>"Category updated successfully !!"
            );
            echo json_encode($result);
        }else{
            $result=array(
                "error"=>1,
                "msg"=>"Failed to update the category !!"
            );
            echo json_encode($result);
        }
        
    }
    public function delete_category(){
        $id=$this->input->post('id');
        if($this->ServiceModel->delete_category($id)){
            $result=array(
                "error"=>0,
                "msg"=>"Category deleted successfully !!"
            );
            echo json_encode($result);
        }else{
            $result=array(
                "error"=>1,
                "msg"=>"Failed to delete the category !!"
            );
            echo json_encode($result);
        }
    }



    // Functions for service page 

    public function service_page_content(){
        if(!$this->session->userdata('adminlogin') && $this->session->userdata('admin_id')==null)
            redirect(base_url()."admin/login");
        $data['page_content']=$this->ServiceModel->get_page_content();
        $this->load->view("admin/includes/header");
        $this->load->view("admin/includes/sidebar");
        $this->load->view("admin/add_service_page_content",$data);
        $this->load-> view("admin/includes/footer");
    }
    public function edit_page_content($id){
        if(!$this->session->userdata('adminlogin') && $this->session->userdata('admin_id')==null)
            redirect(base_url()."admin/login");
        $data['page_content']=$this->ServiceModel->get_page_content();
        $data['edit_page_content']=$this->ServiceModel->get_page_content_by_id($id);
        $this->load->view("admin/includes/header");
        $this->load->view("admin/includes/sidebar");
        $this->load->view("admin/edit_service_page_content",$data);
        $this->load-> view("admin/includes/footer");
    }

    public function add_page_content(){
        $topic=trim($this->input->post("topic"));
        $description=trim($this->input->post('description'));
        $insert=array(
            "topic"=>$topic,
            "description"=>$description
        );  
        if($this->ServiceModel->add_page_content($insert)){
            $result=array(
                "error"=>0,
                "msg"=>"Content added successfully !!"
            );
            echo json_encode($result);
        }else{
            $result=array(
                "error"=>1,
                "msg"=>"Failed to add the content !!"
            );
            echo json_encode($result);
        }
    }
    public function do_edit_page_content(){
        $topic=trim($this->input->post("topic"));
        $description=trim($this->input->post('description'));
        $id=$this->input->post('id');
        $update=array(
            "topic"=>$topic,
            "description"=>$description
        );  
        if($this->ServiceModel->edit_page_content($update,$id)){
            $result=array(
                "error"=>0,
                "msg"=>"Content updated successfully !!"
            );
            echo json_encode($result);
        }else{
            $result=array(
                "error"=>1,
                "msg"=>"Failed to update the content !!"
            );
            echo json_encode($result);
        }
    }
    public function change_content_status(){
        $id=$this->input->post('id');
        $status=$this->input->post('status');
        $update=array(
            "status"=>$status
        );
        if($this->ServiceModel->change_content_status($update,$id)){
            $result=array(
                "error"=>0,
                "msg"=>"Content updated successfully !!"
            );
            echo json_encode($result);
        }else{
            $result=array(
                "error"=>1,
                "msg"=>"Failed to update the content !!"
            );
            echo json_encode($result);
        }
    }
    public function delete_content(){
        $id=$this->input->post('id');
        if($this->ServiceModel->delete_content($id)){
            $result=array(
                "error"=>0,
                "msg"=>"Content deleted successfully !!"
            );
            echo json_encode($result);
        }else{
            $result=array(
                "error"=>1,
                "msg"=>"Failed to delete the content !!"
            );
            echo json_encode($result);
        }
    }


    public function add_service(){
        if(!$this->session->userdata('adminlogin') && $this->session->userdata('admin_id')==null)
            redirect(base_url()."admin/login");
        $data['category']=$this->ServiceModel->get_category();
        $data['service']=$this->ServiceModel->get_services();
        $this->load->view("admin/includes/header");
        $this->load->view("admin/includes/sidebar");
        $this->load->view("admin/add_service",$data);
        $this->load-> view("admin/includes/footer");
    }
    public function edit_service($id){
        if(!$this->session->userdata('adminlogin') && $this->session->userdata('admin_id')==null)
            redirect(base_url()."admin/login");
        $data['category']=$this->ServiceModel->get_category();
        $data['service']=$this->ServiceModel->get_services();
        $data['edit_service']=$this->ServiceModel->get_service_by_id($id);
        $this->load->view("admin/includes/header");
        $this->load->view("admin/includes/sidebar");
        $this->load->view("admin/edit_service",$data);
        $this->load-> view("admin/includes/footer");
    }
    public function do_add_service(){
        $cat_id=$this->input->post('category');
        $description=trim($this->input->post('description'));
        $insert=array(
            "cat_id"=>$cat_id,
            "description"=>$description
        );
        if($this->ServiceModel->add_service($insert)){
            $result=array(
                "error"=>0,
                "msg"=>"Service add successfully !!"
            );
            echo json_encode($result);
        }else{
            $result=array(
                "error"=>1,
                "msg"=>"Unable to add the service !!"
            );
            echo json_encode($result);
        }
    }
    public function do_edit_service(){
        $id=$this->input->post('id');
        $cat_id=$this->input->post('category');
        $description=trim($this->input->post('description'));
        $update=array(
            "cat_id"=>$cat_id,
            "description"=>$description
        );
        if($this->ServiceModel->edit_service($update,$id)){
            $result=array(
                "error"=>0,
                "msg"=>"Service add successfully !!"
            );
            echo json_encode($result);
        }else{
            $result=array(
                "error"=>1,
                "msg"=>"Unable to add the service !!"
            );
            echo json_encode($result);
        }
    }
    public function change_service_status(){
        $id=$this->input->post('id');
        $status=$this->input->post('status');
        $update=array(
            "status"=>$status
        );
        if($this->ServiceModel->change_service_status($update,$id)){
            $result=array(
                "error"=>0,
                "msg"=>"Service updated successfully !!"
            );
            echo json_encode($result);
        }else{
            $result=array(
                "error"=>1,
                "msg"=>"Failed to update the service !!"
            );
            echo json_encode($result);
        }
    }
    public function delete_service(){
        $id=$this->input->post('id');
        if($this->ServiceModel->delete_service($id)){
            $result=array(
                "error"=>0,
                "msg"=>"Service deleted successfully !!"
            );
            echo json_encode($result);
        }else{
            $result=array(
                "error"=>1,
                "msg"=>"Failed to delete the service !!"
            );
            echo json_encode($result);
        }
    }
}
?>