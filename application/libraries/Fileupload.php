<?php
// Created by T.Yogesh

defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Fileupload{
    private $upload_path='';
    private $height='';
    private $width='';
    private $size='';
    private $allowed_types='';
    private $CI='';
    private $image='';
    private $response='';
    public function  __construct($data){
        $this->CI=&get_instance();
        $this->upload_path=$data['upload_path'];
        $this->height=$data['height'];
        $this->width=$data['width'];
        $this->size=$data['size'];
        $this->image=$data['image'];
        $this->allowed_types=$data['allowed_types'];
    }
    public function upload_image(){
        $config['upload_path']=$this->upload_path;
        $config['size']=$this->size;
        $config['allowed_types']=$this->allowed_types;
        $config['file_name'] = $this->image['name'];
        $this->CI->load->library('upload',$config);
        $this->CI->upload->initialize($config);
        if($this->CI->upload->do_upload('image')){
            $this->response=$this->CI->upload->data();
            $lib_config=array(
                'image_library'=>'gd2',
                'source_image'=>$this->response['full_path'],
                'create_thumb'=>false,
                'maintain_ratio'=>false,
                'width'=>$this->width,
                'height'=>$this->height
            );
            $this->CI->load->library('image_lib', $lib_config);
            if($this->CI->image_lib->resize()){
                return $this->upload_path.$this->response['file_name'];
            }else{
                return '';
            }
        }else{
            return '';
        }
    }

}

?>