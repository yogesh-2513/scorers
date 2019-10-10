<?php


// created and developed by T.Yogesh

class Blog extends CI_Controller{

    public function index(){
        if(!$this->session->userdata('adminlogin') && $this->session->userdata('admin_id')==null)
            redirect(base_url()."admin/login");
        $data['blog']=$this->BlogModel->get();
        $this->load->view("admin/includes/header");
        $this->load->view("admin/includes/sidebar");
        $this->load->view("admin/blog",$data);
        $this->load-> view("admin/includes/footer");
    }
    public function edit($id){
        if(!$this->session->userdata('adminlogin') && $this->session->userdata('admin_id')==null)
            redirect(base_url()."admin/login");
        $data['blog']=$this->BlogModel->get();
        $data['edit_blog']=$this->BlogModel->get_blog_by_id($id);
        $this->load->view("admin/includes/header");
        $this->load->view("admin/includes/sidebar");
        $this->load->view("admin/edit_blog",$data);
        $this->load-> view("admin/includes/footer");
    }
    public function add_blog(){
        $description=trim($this->input->post('description'));
        $topic=trim($this->input->post('topic'));
        $image=$_FILES['image'];
        $config=array(
            "height"=>350,
            "width"=>350,
            "upload_path"=>"uploads/blog/",
            "size"=>1024000,
            "allowed_types"=>'jpg|jpeg|png',
            "image"=>$image
        );
        $this->load->library('fileupload',$config);
        $upload=$this->fileupload->upload_image();
        if($upload == ''){
            $result=array(
                'error'=>1,
                'msg'=>"Unable to upload the blog image !!"
            );
            echo json_encode($result);
        }else{
            $insert=array(
                'image'=>$upload,
                'topic'=>$topic,
                'description'=>$description
            );
            if($this->BlogModel->add_blog($insert)){
                $result=array(
                    'error'=>0,
                    'msg'=>"Blog added successfully !!"
                );
                echo json_encode($result);
            }else{
                $result=array(
                    'error'=>1,
                    'msg'=>"Unable to add the blog !!"
                );
                echo json_encode($result);
            }
        }

    }

    public function change_status(){
        $id=$this->input->post('id');
        $status=$this->input->post('status');
        $update=array(
            'status'=>$status
        );
        if($this->BlogModel->change_status($id,$update)){
            $result=array(
                'error'=>0,
                'msg'=>"Blog updated successfully !!"
            );
            echo json_encode($result);
        }else{
            $result=array(
                'error'=>1,
                'msg'=>"Failed to update the blog !!"
            );
            echo json_encode($result);
        }
    }
    public function delete_blog(){
        $id=$this->input->post('id');
        $path=$this->input->post('path');
        if(unlink($path)){
            if($this->BlogModel->delete_blog($id)){
                $result=array(
                    'error'=>0,
                    'msg'=>"Blog deleted successfully !!"
                );
                echo json_encode($result);
            }else{
                $result=array(
                    'error'=>1,
                    'msg'=>"Failed to delete the blog !!"
                );
                echo json_encode($result);
            }
        }
    }


    public function do_edit_blog(){
        $id=$this->input->post('id');
        $description=trim($this->input->post('description'));
        $topic=trim($this->input->post('topic'));
        $image=$_FILES['image'];
        $upload='';
        if(empty($image['name'])){
            $upload=$this->input->post('old_image');
        }else{

            $config=array(
                "height"=>350,
                "width"=>350,
                "upload_path"=>"uploads/blog/",
                "size"=>1024000,
                "allowed_types"=>'jpg|jpeg|png',
                "image"=>$image
            );
            $this->load->library('fileupload',$config);
            unlink($this->input->post('old_image'));
            $upload=$this->fileupload->upload_image();
       }
    
    if($upload == ''){
        $result=array(
            'error'=>1,
            'msg'=>"Unable to upload the blog image !!"
        );
        echo json_encode($result);
    }else{
        $update=array(
            'image'=>$upload,
            'topic'=>$topic,
            'description'=>$description
        );
        if($this->BlogModel->update_blog($id,$update)){
            $result=array(
                'error'=>0,
                'msg'=>"Blog updated successfully !!"
            );
            echo json_encode($result);
        }else{
            $result=array(
                'error'=>1,
                'msg'=>"Unable to update the blog !!"
            );
            echo json_encode($result);
        }
    }

    }

    public function add_blog_comment(){
        $blog_id=$this->input->post('id');
        $name=trim($this->input->post('name'));
        $email=trim($this->input->post('email'));
        $message=trim($this->input->post('message'));
        $insert=array(
            "name"=>$name,
            'email'=>$email,
            "message"=>$message,
            "blog_id"=>$blog_id
        );
        if($this->BlogModel->add_comment($insert)){
            $result=array(
                "error"=>0,
                "msg"=>"Comment added succesfully !!"
            );
            echo json_encode($result);
        }else{
            $result=array(
                "error"=>1,
                "msg"=>"Failed to add comment !! Kindly try again ..."
            );
            echo json_encode($result);
        }
    }

    public function comments(){
        if(!$this->session->userdata('adminlogin') && $this->session->userdata('admin_id')==null)
            redirect(base_url()."admin/login");
        $data['comments']=$this->BlogModel->get_waiting_comments();
        $this->load->view("admin/includes/header");
        $this->load->view("admin/includes/sidebar");
        $this->load->view("admin/waiting_comments",$data);
        $this->load-> view("admin/includes/footer");
    }
    public function approved_comments(){
        if(!$this->session->userdata('adminlogin') && $this->session->userdata('admin_id')==null)
            redirect(base_url()."admin/login");
        $data['comments']=$this->BlogModel->get_approved_comments();
        $this->load->view("admin/includes/header");
        $this->load->view("admin/includes/sidebar");
        $this->load->view("admin/approved_comments",$data);
        $this->load-> view("admin/includes/footer");
    }
    public function change_comment_status(){
        $id=$this->input->post('id');
        $status=$this->input->post('status');
        $update=array(
            "status"=>$status
        );
        if($this->BlogModel->change_comment_status($update,$id)){
            $result=array(
                "error"=>0,
                "msg"=>"Comment updated !!"
            );
            echo json_encode($result);
        }else{
            $result=array(
                "error"=>1,
                "msg"=>"Failed to approve the comment !!"
            );
            echo json_encode($result);
        }
            
    }
    public function delete_comment(){
        $id=$this->input->post('id');
        if($this->BlogModel->delete_comment($id)){
            $result=array(
                "error"=>0,
                "msg"=>"Comment deleted !!"
            );
            echo json_encode($result);
        }else{
            $result=array(
                "error"=>1,
                "msg"=>"Failed to delete the comment !!"
            );
            echo json_encode($result);
        }
    }
}
?>