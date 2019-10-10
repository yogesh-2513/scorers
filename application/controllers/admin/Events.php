<?php
// Created By T.Yogesh
class Events extends CI_Controller{
    public function index(){
        if(!$this->session->userdata('adminlogin') && $this->session->userdata('admin_id')==null)
            redirect(base_url()."admin/login");
        $data['events']=$this->EventModel->get_events();
        $this->load->view("admin/includes/header");
        $this->load->view("admin/includes/sidebar");
        $this->load->view("admin/events",$data);
        $this->load-> view("admin/includes/footer");
    }
    public function is_date_future($date){
        $current_date=date('Y-m-d');

        if($date > $current_date){
            return true;
        }else{
            return false;
        }
    }
    public function add_event(){

        $topic=$this->input->post('topic');
        $description=trim($this->input->post('description'));
        $date=$this->input->post('date');
        $time=$this->input->post('time');
        $location=$this->input->post('location');
        $image=$_FILES['image'];

        if($this->is_date_future($date)){
            $config=array(
                "height"=>400,
                "width"=>400,
                "upload_path"=>"uploads/events/",
                "size"=>1024000,
                "allowed_types"=>'jpg|jpeg|png',
                "image"=>$image
            );
            $this->load->library('fileupload',$config);
            $upload=$this->fileupload->upload_image();
            if($upload == ''){
                $result=array(
                    'error'=>1,
                    'msg'=>"Unable to upload the event image !!"
                );
                echo json_encode($result);
            }else{
                $insert=array(
                    'image'=>$upload,
                    'topic'=>$topic,
                    'description'=>$description,
                    "date"=>$date,
                    "time"=>$time,
                    "location"=>$location
                );
                
                if($this->EventModel->add_event($insert)){
                    $result=array(
                        "error"=>0,
                        "msg"=>"Event added successfully !!"
                    );
                    echo json_encode($result);
                }else{
                    $result=array(
                        "error"=>1,
                        "msg"=>"Failed to add the event !!"
                    );
                    echo json_encode($result);
                }
            }
        }else{
            $result=array(
                "error"=>1,
                "msg"=>"Event date must be in future !!"
            );
            echo json_encode($result);
        }

    }
    public function change_status(){
        $id=$this->input->post('id');
        $status=$this->input->post('status');
        $update=array(
            'status'=>$status
        );
        if($this->EventModel->change_status($update,$id)){
            $result=array(
                'error'=>0,
                'msg'=>"Event updated successfully !!"
            );
            echo json_encode($result);
        }else{
            $result=array(
                'error'=>1,
                'msg'=>"Unable to update the event !!"
            );
            echo json_encode($result);
        }
    }
    public function delete_event()
    {
        $id=$this->input->post('id');
        $path=$this->input->post('path');
        if(unlink($path)){
            if($this->EventModel->delete_event($id)){
                $result=array(
                    'error'=>0,
                    'msg'=>"Event deleted successfully !!"
                );
                echo json_encode($result);
            }else{
                $result=array(
                    'error'=>1,
                    'msg'=>"Unable to delete the event !!"
                );
                echo json_encode($result);
            }
        }else{
            $result=array(
                'error'=>1,
                'msg'=>"Unable to delete the event image !!"
            );
            echo json_encode($result);
        }
    }
    public function edit_event($id){
        if(!$this->session->userdata('adminlogin') && $this->session->userdata('admin_id')==null)
            redirect(base_url()."admin/login");
        $data['events']=$this->EventModel->get_events();
        $data['edit_event']=$this->EventModel->get_event_by_id($id);
        $this->load->view("admin/includes/header");
        $this->load->view("admin/includes/sidebar");
        $this->load->view("admin/edit_event",$data);
        $this->load-> view("admin/includes/footer");
    }
    public function do_edit_event(){
        $topic=$this->input->post('topic');
        $description=trim($this->input->post('description'));
        $date=$this->input->post('date');
        $time=$this->input->post('time');
        $location=$this->input->post('location');
        $image=$_FILES['image'];
        $id=$this->input->post('id');
        $upload='';
        if($this->is_date_future($date)){
            if(empty($image['name'])){
                $upload=$this->input->post('old_image');
            }else{
                $config=array(
                    "height"=>400,
                    "width"=>400,
                    "upload_path"=>"uploads/events/",
                    "size"=>1024000,
                    "allowed_types"=>'jpg|jpeg|png',
                    "image"=>$image
                );
                $this->load->library('fileupload',$config);
                $upload=$this->fileupload->upload_image();
            }


            if($upload == ''){
                $result=array(
                    'error'=>1,
                    'msg'=>"Unable to upload the event image !!"
                );
                echo json_encode($result);
            }else{
                $update=array(
                    'image'=>$upload,
                    'topic'=>$topic,
                    'description'=>$description,
                    "date"=>$date,
                    "time"=>$time,
                    "location"=>$location
                );
                
                if($this->EventModel->edit_event($update,$id)){
                    $result=array(
                        "error"=>0,
                        "msg"=>"Event updated successfully !!"
                    );
                    echo json_encode($result);
                }else{
                    $result=array(
                        "error"=>1,
                        "msg"=>"Failed to update the event !!"
                    );
                    echo json_encode($result);
                }
            }


        }else{
            $result=array(
                "error"=>1,
                "msg"=>"Event date must be in future !!"
            );
            echo json_encode($result);
        }
    }
}
?>