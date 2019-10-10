<?php
// Created By T.Yogesh
class Gallery extends CI_Controller{
    public function index(){
        if(!$this->session->userdata('adminlogin') && $this->session->userdata('admin_id')==null)
            redirect(base_url()."admin/login");
        $data['gallery']=$this->GalleryModel->get();
        $this->load->view("admin/includes/header");
        $this->load->view("admin/includes/sidebar");
        $this->load->view("admin/gallery",$data);
        $this->load-> view("admin/includes/footer");
    }
    public function gallery_add(){
        $image=$_FILES['image'];
        $config=array(
            "height"=>600,
            "width"=>600,
            "upload_path"=>"uploads/gallery/",
            "size"=>5024000,
            "allowed_types"=>'jpg|jpeg|png',
            "image"=>$image
        );
        $this->load->library('fileupload',$config);
        $upload=$this->fileupload->upload_image();
        if($upload == ''){
            $result=array(
                'error'=>1,
                'msg'=>"Unable to upload the image !!. Maximum image size is 5MB."
            );
            echo json_encode($result);
        }else{
            $insert=array(
                'image'=>$upload
            );
            if($this->GalleryModel->add($insert)){
                $result=array(
                    'error'=>0,
                    'msg'=>"Image uploaded successfully !!"
                );
                echo json_encode($result);
            }else{
                $result=array(
                    'error'=>1,
                    'msg'=>"Unable to upload the image !!"
                );
                echo json_encode($result);
            }
        }
    }
    public function gallery_status(){
        $id=$this->input->post('id');
        $status=$this->input->post('status');
        $update=array(
            'status'=>$status
        );
        if($this->GalleryModel->gallery_status($update,$id)){
            $result=array(
                'error'=>0,
                'msg'=>"Image updated successfully !!"
            );
            echo json_encode($result);
        }else{
            $result=array(
                'error'=>1,
                'msg'=>"Unable to update the image !!"
            );
            echo json_encode($result);
        }
    }
    public function gallery_delete()
    {
        $id=$this->input->post('id');
        $path=$this->input->post('path');
        if(unlink($path)){
            if($this->GalleryModel->gallery_delete($id)){
                $result=array(
                    'error'=>0,
                    'msg'=>"Image deleted successfully !!"
                );
                echo json_encode($result);
            }else{
                $result=array(
                    'error'=>1,
                    'msg'=>"Unable to delete the image !!"
                );
                echo json_encode($result);
            }
        }else{
            $result=array(
                'error'=>1,
                'msg'=>"Unable to delete the image !!"
            );
            echo json_encode($result);
        }
    }
}


?>