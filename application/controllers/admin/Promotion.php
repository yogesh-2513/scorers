<?php
// Created By T.Yogesh
class Promotion extends CI_Controller{

    public function promotion_page(){
        if(!$this->session->userdata('adminlogin') && $this->session->userdata('admin_id')==null)
            redirect(base_url()."admin/login");
        $data['promotion']=$this->PromotionModel->get();
        $this->load->view("admin/includes/header");
        $this->load->view("admin/includes/sidebar");
        $this->load->view("admin/promotion",$data);
        $this->load-> view("admin/includes/footer");
    }
    public function edit_promotion($id){
        if(!$this->session->userdata('adminlogin') && $this->session->userdata('admin_id')==null)
            redirect(base_url()."admin/login");
        $data['promotion']=$this->PromotionModel->get();
        $data['edit_promotion']=$this->PromotionModel->get_promotion_by_id($id);
        $this->load->view("admin/includes/header");
        $this->load->view("admin/includes/sidebar");
        $this->load->view("admin/edit_promotion",$data);
        $this->load-> view("admin/includes/footer");
    }
    public function edit_promotion_content($id){
        if(!$this->session->userdata('adminlogin') && $this->session->userdata('admin_id')==null)
            redirect(base_url()."admin/login");
        $data['promotion']=$this->PromotionModel->get();
        $data['edit_promotion_content']=$this->PromotionModel->get_promotion_content_by_id($id);
        $data['promotion_content']=$this->PromotionModel->get_content();
        $this->load->view("admin/includes/header");
        $this->load->view("admin/includes/sidebar");
        $this->load->view("admin/edit_promotion_content",$data);
        $this->load-> view("admin/includes/footer");
    }
    public function add_content(){
        if(!$this->session->userdata('adminlogin') && $this->session->userdata('admin_id')==null)
            redirect(base_url()."admin/login");
        $data['promotion']=$this->PromotionModel->get();
        $data['promotion_content']=$this->PromotionModel->get_content();
        $this->load->view("admin/includes/header");
        $this->load->view("admin/includes/sidebar");
        $this->load->view("admin/promotion_content",$data);
        $this->load-> view("admin/includes/footer");
    }

    public function add_promotion(){
        $promotion=trim($this->input->post('promotion'));
        $insert=array(
            "promotion"=>$promotion
        );
        if($this->PromotionModel->add_promotion($insert)){
            $result=array(
                'error'=>0,
                'msg'=>"Promotion added successfully !!"
            );
            echo json_encode($result);
        }else{
            $result=array(
                'error'=>1,
                'msg'=>"Failed to add the promotion !!"
            );
            echo json_encode($result);
        }
    }
    public function do_edit_promotion(){
        $id=$this->input->post('id');
        $promotion=trim($this->input->post('promotion'));
        $update=array(
            "promotion"=>$promotion
        );
        if($this->PromotionModel->edit_promotion($update,$id)){
            $result=array(
                'error'=>0,
                'msg'=>"Promotion updated successfully !!"
            );
            echo json_encode($result);
        }else{
            $result=array(
                'error'=>1,
                'msg'=>"Failed to update the promotion !!"
            );
            echo json_encode($result);
        }
    }
    public function do_edit_promotion_content(){
        $id=$this->input->post('id');
        $promotion_id=$this->input->post('promotion');
        $description=$this->input->post('description');
        $image=$_FILES['image'];
        $upload='';
        if(empty($image['name'])){
           $upload=$this->input->post('old_image');
        }else{
            $config=array(
                "height"=>600,
                "width"=>800,
                "upload_path"=>"uploads/promotion/",
                "size"=>2048000,
                "allowed_types"=>'jpg|jpeg|png',
                "image"=>$image
            );
            $this->load->library('fileupload',$config);
            $upload=$this->fileupload->upload_image();
        }

        if($upload == ''){
            $result=array(
                'error'=>1,
                'msg'=>"Unable to upload the promotion image !!"
            );
            echo json_encode($result);
        }else{
            $update=array(
                'image'=>$upload,
                'pro_id'=>$promotion_id,
                'description'=>$description
            );
            if($this->PromotionModel->update_content($update,$id)){
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

    }
    public function delete_promotion(){
        $id=$this->input->post('id');
        if($this->PromotionModel->delete_promotion($id)){
            $result=array(
                'error'=>0,
                'msg'=>"Promotion deleted successfully !!"
            );
            echo json_encode($result);
        }else{
            $result=array(
                'error'=>1,
                'msg'=>"Failed to delete the promotion !!"
            );
            echo json_encode($result);
        }
    }

    public function add_promotion_content(){
        $promotion_id=$this->input->post('promotion');
        $description=$this->input->post('description');
        $image=$_FILES['image'];
        $config=array(
            "height"=>600,
            "width"=>800,
            "upload_path"=>"uploads/promotion/",
            "size"=>2048000,
            "allowed_types"=>'jpg|jpeg|png',
            "image"=>$image
        );
        $this->load->library('fileupload',$config);
        $upload=$this->fileupload->upload_image();
        if($upload == ''){
            $result=array(
                'error'=>1,
                'msg'=>"Unable to upload the promotion image !!"
            );
            echo json_encode($result);
        }else{
            $insert=array(
                'image'=>$upload,
                'pro_id'=>$promotion_id,
                'description'=>$description
            );
            if($this->PromotionModel->add_content($insert)){
                $result=array(
                    'error'=>0,
                    'msg'=>"Content added successfully !!"
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
    }

    public function delete_promotion_content(){
        $id=$this->input->post('id');
        if($this->PromotionModel->delete_promotion_content($id)){
            $result=array(
                'error'=>0,
                'msg'=>"Promotion content deleted successfully !!"
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
    public function content_status_change()
    {
        $id=$this->input->post('id');
        $status=$this->input->post('status');
        $update=array(
            "status"=>$status
        );
        if($this->PromotionModel->content_status_change($update,$id)){
            $result=array(
                'error'=>0,
                'msg'=>"Promotion content updated successfully !!"
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

}
?>