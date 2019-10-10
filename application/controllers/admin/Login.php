<?php
// Created By T.Yogesh
class Login extends CI_Controller{
    public function index(){
        $this->load->view('admin/login');
    }
    public function check(){
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $this->load->model("admin/LoginModel");
        $data=$this->LoginModel->get_credentials();
        $flag=0;
        foreach ($data as $value) {
            if($value->username == $username && $value->password == $password){
                $flag++;
            }
        }
        if($flag !=0){
            $session=array(
                "admin_login"=>true,
                "admin_id"=>$username
            );
            $this->session->set_userdata($session);
            redirect(base_url()."admin/dashboard");
        }else{
            $result['error']=1;
            $this->load->view("admin/login",$result);
        }

    }
}
?>