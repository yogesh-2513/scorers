<?php
// Created By T.Yogesh
class Careers extends CI_Controller{
    public function career(){
        if(!$this->session->userdata('adminlogin') && $this->session->userdata('admin_id')==null)
            redirect(base_url()."admin/login");
        $data['career']=$this->CareerModel->get_career();
        $this->load->view("admin/includes/header");
        $this->load->view("admin/includes/sidebar");
        $this->load->view("admin/career",$data);
        $this->load-> view("admin/includes/footer");
    }
    public function add_career(){
        $topic=trim($this->input->post('topic'));
        $description=trim($this->input->post('description'));
        $insert=array(
            "topic"=>$topic,
            "description"=>$description
        );
        if($this->CareerModel->add_career($insert)){
            $result=array(
                'error'=>0,
                'msg'=>"Content Added Successfully !!"
            );
            echo json_encode($result);
        }else{
            $result=array(
                'error'=>1,
                'msg'=>"Unable to add the content !!"
            );
            echo json_encode($result);
        }
    }

    public function change_status_career(){
        $id=$this->input->post('id');
        $status=$this->input->post('status');
        $update=array(
            "status"=>$status
        );
        if($this->CareerModel->change_status($update,$id)){
            $result=array(
                'error'=>0,
                'msg'=>"Content updated successfully !!"
            );
            echo json_encode($result);
        }else{
            $result=array(
                'error'=>1,
                'msg'=>"Unable to update the content !!"
            );
            echo json_encode($result);
        }
    }
    public function delete_career(){
        $id=$this->input->post('id');
        if($this->CareerModel->delete_career($id)){
            $result=array(
                'error'=>0,
                'msg'=>"Content deleted successfully !!"
            );
            echo json_encode($result);
        }else{
            $result=array(
                'error'=>1,
                'msg'=>"Unable to delete the content !!"
            );
            echo json_encode($result);
        }
    }

    public function edit_career($id){
        if(!$this->session->userdata('adminlogin') && $this->session->userdata('admin_id')==null)
            redirect(base_url()."admin/login");
        $data['career']=$this->CareerModel->get_career();
        $data['edit_career']=$this->CareerModel->get_career_by_id($id);
        $this->load->view("admin/includes/header");
        $this->load->view("admin/includes/sidebar");
        $this->load->view("admin/edit_career",$data);
        $this->load-> view("admin/includes/footer");
    }
    public function do_edit_career(){
        $id=$this->input->post('id');
        $topic=trim($this->input->post('topic'));
        $description=trim($this->input->post('description'));
        $update=array(
            "topic"=>$topic,
            "description"=>$description
        );
        if($this->CareerModel->edit_career($update,$id)){
            $result=array(
                'error'=>0,
                'msg'=>"Content updated Successfully !!"
            );
            echo json_encode($result);
        }else{
            $result=array(
                'error'=>1,
                'msg'=>"Unable to update the content !!"
            );
            echo json_encode($result);
        }
    }

    public function promotion(){
        if(!$this->session->userdata('adminlogin') && $this->session->userdata('admin_id')==null)
            redirect(base_url()."admin/login");
        $this->load->view("admin/includes/header");
        $this->load->view("admin/includes/sidebar");
        $this->load->view("admin/promotion");
        $this->load-> view("admin/includes/footer");
    }
}
?>
