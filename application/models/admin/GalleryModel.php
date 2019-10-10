<?php

// Created by T.Yogesh

class GalleryModel extends CI_Model{
    public function add($insert){
        if($this->db->insert('gallery',$insert)){
            return true;
        }else{
            return false;
        }
    }
    public function get(){
        return $this->db->get('gallery')->result();
    }
    public function gallery_status($update,$id){
        // $this->db->set($update);
        $this->db->where('id',$id);
        if($this->db->update('gallery',$update)){
            return true;
        }else{
            return false;
        }
    }
    public function gallery_delete($id){
        $this->db->where('id',$id);
        if($this->db->delete('gallery')){
            return true;
        }else{
            return false;
        }
    }
}

?>