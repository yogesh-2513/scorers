
<?php

// created and developed by T.Yogesh

class About extends CI_Controller{

    public function content(){
        if(!$this->session->userdata('adminlogin') && $this->session->userdata('admin_id')==null)
            redirect(base_url()."admin/login");
        $data['aboutus']=$this->AboutusModel->get();
        $this->load->view("admin/includes/header");
        $this->load->view("admin/includes/sidebar");
        $this->load->view("admin/aboutus_content",$data);
        $this->load-> view("admin/includes/footer");
    }
    public function add_team_members(){
        if(!$this->session->userdata('adminlogin') && $this->session->userdata('admin_id')==null)
            redirect(base_url()."admin/login");
        $data['team']=$this->AboutusModel->get_team();
        $this->load->view("admin/includes/header");
        $this->load->view("admin/includes/sidebar");
        $this->load->view("admin/add_team_members",$data);
        $this->load-> view("admin/includes/footer");
    }
    public function add_aboutus_content(){
        $image=$_FILES['image'];
        $config=array(
            "height"=>400,
            "width"=>400,
            "upload_path"=>"uploads/aboutus/",
            "size"=>1024000,
            "allowed_types"=>'jpg|jpeg|png',
            "image"=>$image
        );
        $this->load->library('fileupload',$config);
        $upload=$this->fileupload->upload_image();
        if($upload == ''){
            $result=array(
                'error'=>1,
                'msg'=>"Failed to upload the content image !!"
            );
            echo json_encode($result);
        }else{
            $insert=array(
                'image'=>$upload,
                'topic'=>$this->input->post('topic'),
                'description'=>$this->input->post('description')
            );
            if($this->AboutusModel->add($insert)){
                $result=array(
                    'error'=>0,
                    'msg'=>"Content uploaded successfully !!"
                );
                echo json_encode($result);
            }else{
                $result=array(
                    'error'=>1,
                    'msg'=>"Unable to upload the content !!"
                );
                echo json_encode($result);
            }
        }
    }

    public function edit_aboutus($id){
        if(!$this->session->userdata('adminlogin') && $this->session->userdata('admin_id')==null)
            redirect(base_url()."admin/login");
        $data['aboutus']=$this->AboutusModel->get();
        $data['edit_content']=$this->AboutusModel->get_content_by_id($id);
        $this->load->view("admin/includes/header");
        $this->load->view("admin/includes/sidebar");
        $this->load->view("admin/edit_aboutus_content",$data);
        $this->load-> view("admin/includes/footer");
    }
    public function edit_aboutus_content(){
        
        $aboutus_image=$_FILES['image'];
        $id=$this->input->post('id');
        $upload='';
        if(empty($aboutus_image['name'])){
            $upload=$this->input->post('old_image');
        }else{
            $config=array(
                "height"=>400,
                "width"=>400,
                "upload_path"=>"uploads/aboutus/",
                "size"=>1024000,
                "allowed_types"=>'jpg|jpeg|png',
                "image"=>$aboutus_image
            );
            $this->load->library('fileupload',$config);
            $upload=$this->fileupload->upload_image();
            unlink($this->input->post('old_image'));
        }
        if($upload == ''){
            $result=array(
                'error'=>1,
                'msg'=>"Failed to update the content image !!"
            );
            echo json_encode($result);
        }else{
            $update=array(
                'image'=>$upload,
                'topic'=>trim($this->input->post('topic')),
                'description'=>trim($this->input->post('description'))
            );
            if($this->AboutusModel->update($update,$id)){
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

    public function status_change(){
        
        $id=$this->input->post('id');
        $status=$this->input->post('status');
        $update=array(
            'status'=>$status
        );
        if($this->AboutusModel->status_change($update,$id)){
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
    public function delete_content(){
        $id=$this->input->post('id');
        $path=$this->input->post('path');
        if(unlink($path)){
            if($this->AboutusModel->delete_content($id)){
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
        }else{
            $result=array(
                'error'=>1,
                'msg'=>"Unable to delete the content image !!"
            );
            echo json_encode($result);
        }
    }

    public function do_add_team_member(){
        $name=trim($this->input->post("name"));
        $designation=trim($this->input->post('designation'));
        $description=trim($this->input->post('description'));
        $image=$_FILES['image'];
        $config=array(
            "height"=>345,
            "width"=>345,
            "upload_path"=>"uploads/team/",
            "size"=>1024000,
            "allowed_types"=>'jpg|jpeg|png',
            "image"=>$image
        );
        $this->load->library('fileupload',$config);
        $upload=$this->fileupload->upload_image();
        if($upload == ''){
            $result=array(
                'error'=>1,
                'msg'=>"Failed to upload the profile picture !!"
            );
            echo json_encode($result);
        }else{
            $insert=array(
                'profile'=>$upload,
                'name'=>$name,
                'designation'=>$this->input->post('designation'),
                'description'=>$this->input->post('description')
            );
            if($this->AboutusModel->add_member($insert)){
                $result=array(
                    'error'=>0,
                    'msg'=>"Member added successfully !!"
                );
                echo json_encode($result);
            }else{
                $result=array(
                    'error'=>1,
                    'msg'=>"Unable to add the member !!"
                );
                echo json_encode($result);
            }
        }
    }

    public function edit_member($id){
        if(!$this->session->userdata('adminlogin') && $this->session->userdata('admin_id')==null)
            redirect(base_url()."admin/login");
        $data['team']=$this->AboutusModel->get_team();
        $data['edit_member']=$this->AboutusModel->get_member_by_id($id);
        $this->load->view("admin/includes/header");
        $this->load->view("admin/includes/sidebar");
        $this->load->view("admin/edit_team_member",$data);
        $this->load-> view("admin/includes/footer");
    }
    public function edit_team_member(){
        $image=$_FILES['image'];
        $name=trim($this->input->post("name"));
        $designation=trim($this->input->post('designation'));
        $description=trim($this->input->post('description'));
        
        $upload='';
        $id=$this->input->post('id');
        if(empty($image['name'])){
            $upload=$this->input->post('old_image');
        }else{
            $config=array(
                "height"=>345,
                "width"=>345,
                "upload_path"=>"uploads/team/",
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
                'msg'=>"Failed to update the profile picture !!"
            );
            echo json_encode($result);
        }else{
            $update=array(
                'profile'=>$upload,
                'name'=>$name,
                'designation'=>$this->input->post('designation'),
                'description'=>$this->input->post('description')
            );
            if($this->AboutusModel->edit_member($update,$id)){
                $result=array(
                    'error'=>0,
                    'msg'=>"Member updated successfully !!"
                );
                echo json_encode($result);
            }else{
                $result=array(
                    'error'=>1,
                    'msg'=>"Unable to update the member !!"
                );
                echo json_encode($result);
            }
        }
    }

    public function change_member_status(){
        $id=$this->input->post('id');
        $status=$this->input->post('status');
        $update=array(
            'status'=>$status
        );
        if($this->AboutusModel->change_member_status($update,$id)){
            $result=array(
                'error'=>0,
                'msg'=>"Member updated successfully !!"
            );
            echo json_encode($result);
        }else{
            $result=array(
                'error'=>1,
                'msg'=>"Unable to update the member !!"
            );
            echo json_encode($result);
        }
    }
    public function delete_member(){
        $id=$this->input->post('id');
        $path=$this->input->post('profile');
        if(unlink($path)){
            if($this->AboutusModel->delete_member($id)){
                $result=array(
                    'error'=>0,
                    'msg'=>"Member deleted successfully !!"
                );
                echo json_encode($result);
            }else{
                $result=array(
                    'error'=>1,
                    'msg'=>"Unable to delete the member !!"
                );
                echo json_encode($result);
            }
        }else{
            $result=array(
                'error'=>1,
                'msg'=>"Unable to delete the member profile !!"
            );
            echo json_encode($result);
        }
    }

    
}

?>