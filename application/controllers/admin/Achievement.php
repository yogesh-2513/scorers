
<?php

// created and developed by T.Yogesh

class Achievement extends CI_Controller{

    public function index(){
        if(!$this->session->userdata('adminlogin') && $this->session->userdata('admin_id')==null)
            redirect(base_url()."admin/login");
        $data['achievement']=$this->AchievementModel->get();
        $this->load->view("admin/includes/header");
        $this->load->view("admin/includes/sidebar");
        $this->load->view("admin/add_achievement",$data);
        $this->load-> view("admin/includes/footer");
    }

    public function add_achievement_content(){
        $image=$_FILES['image'];
        $config=array(
            "height"=>400,
            "width"=>400,
            "upload_path"=>"uploads/achievement/",
            "size"=>1024000,
            "allowed_types"=>'jpg|jpeg|png',
            "image"=>$image
        );
        $this->load->library('fileupload',$config);
        $upload=$this->fileupload->upload_image();
        if($upload == ''){
            $result=array(
                'error'=>1,
                'msg'=>"Failed to upload the achievement image !!"
            );
            echo json_encode($result);
        }else{
            $insert=array(
                'image'=>$upload,
                'topic'=>$this->input->post('topic'),
                'description'=>$this->input->post('description')
            );
            if($this->AchievementModel->add($insert)){
                $result=array(
                    'error'=>0,
                    'msg'=>"Achievement added successfully !!"
                );
                echo json_encode($result);
            }else{
                $result=array(
                    'error'=>1,
                    'msg'=>"Unable to add the achievement image !!"
                );
                echo json_encode($result);
            }
        }
    }
    public function edit($id){
        if(!$this->session->userdata('adminlogin') && $this->session->userdata('admin_id')==null)
            redirect(base_url()."admin/login");
        $data['achievement']=$this->AchievementModel->get();
        $data['edit_achievement']=$this->AchievementModel->get_achievement_by_id($id);
        $this->load->view("admin/includes/header");
        $this->load->view("admin/includes/sidebar");
        $this->load->view("admin/edit_achievement",$data);
        $this->load-> view("admin/includes/footer");
    }
    public function edit_achievement_content(){
        $image=$_FILES['image'];
        $id=$this->input->post('id');
        if(empty($image['name'])){
            $upload=$this->input->post('old_image');
        }else{
            $config=array(
                "height"=>400,
                "width"=>400,
                "upload_path"=>"uploads/achievement/",
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
                'msg'=>"Failed to upload the achievement image !!"
            );
            echo json_encode($result);
        }else{
            $update=array(
                'image'=>$upload,
                'topic'=>$this->input->post('topic'),
                'description'=>$this->input->post('description')
            );
            if($this->AchievementModel->update($update,$id)){
                $result=array(
                    'error'=>0,
                    'msg'=>"Achievement updated successfully !!"
                );
                echo json_encode($result);
            }else{
                $result=array(
                    'error'=>1,
                    'msg'=>"Unable to update the achievement image !!"
                );
                echo json_encode($result);
            }
        }
    }

    public function edit_achievement($id){
        if(!$this->session->userdata('adminlogin') && $this->session->userdata('admin_id')==null)
            redirect(base_url()."admin/login");
        $data['achievement']=$this->AchievementModel->get();
        $data['edit_achievement']=$this->AchievementModel->get_achievement_by_id($id);
        $this->load->view("admin/includes/header");
        $this->load->view("admin/includes/sidebar");
        $this->load->view("admin/edit_achievement_content",$data);
        $this->load-> view("admin/includes/footer");
    }

    public function do_edit_achievement_content(){
        $achievement_image=$_FILES['image'];
        $id=$this->input->post('id');
        $upload='';
        if(empty($achievement_image['name'])){
            $upload=$this->input->post('old_image');
        }else{
            $config=array(
                "height"=>400,
                "width"=>400,
                "upload_path"=>"uploads/achievement/",
                "size"=>1024000,
                "allowed_types"=>'jpg|jpeg|png',
                "image"=>$achievement_image
            );
            $this->load->library('fileupload',$config);
            $upload=$this->fileupload->upload_image();
            unlink($this->input->post('old_image'));
        }
        if($upload == ''){
            $result=array(
                'error'=>1,
                'msg'=>"Failed to update the achievement content image !!"
            );
            echo json_encode($result);
        }else{
            $update=array(
                'image'=>$upload,
                'topic'=>trim($this->input->post('topic')),
                'description'=>trim($this->input->post('description'))
            );
            if($this->AchievementModel->update($update,$id)){
                $result=array(
                    'error'=>0,
                    'msg'=>"Achievement updated successfully !!"
                );
                echo json_encode($result);
            }else{
                $result=array(
                    'error'=>1,
                    'msg'=>"Unable to update the achievement !!"
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
        if($this->AchievementModel->status_change($update,$id)){
            $result=array(
                'error'=>0,
                'msg'=>"Achievement updated successfully !!"
            );
            echo json_encode($result);
        }else{
            $result=array(
                'error'=>1,
                'msg'=>"Unable to update the achievement !!"
            );
            echo json_encode($result);
        }
    }
    public function delete_achievement(){
        $id=$this->input->post('id');
        $path=$this->input->post('path');
        if(unlink($path)){
            if($this->AchievementModel->delete_achievement($id)){
                $result=array(
                    'error'=>0,
                    'msg'=>"Achievement deleted successfully !!"
                );
                echo json_encode($result);
            }else{
                $result=array(
                    'error'=>1,
                    'msg'=>"Unable to delete the achievement !!"
                );
                echo json_encode($result);
            }
        }else{
            $result=array(
                'error'=>1,
                'msg'=>"Unable to delete the achievement image !!"
            );
            echo json_encode($result);
        }
    }    
}

?>