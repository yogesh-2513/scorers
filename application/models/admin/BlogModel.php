<?php

// Created by T.Yogesh

class BlogModel extends CI_Model{
    public function get(){
        return $this->db->get('blog')->result();
    }
    public function get_blog_by_id($id){
        $this->db->where('id',$id);
        return $this->db->get('blog')->result();
    }
    public function add_blog($insert){
        if($this->db->insert('blog',$insert)){
            return true;
        }else{
            return false;
        }
    }
    public function change_status($id,$update){
        $this->db->where('id',$id);
        if($this->db->update('blog',$update)){
            return true;
        }else{
            return false;
        }
    }
    public function delete_blog($id){
        $this->db->where('id',$id);
        if($this->db->delete('blog')){
            return true;
        }else{
            return false;
        }
    }
    public function update_blog($id,$update){
        $this->db->where('id',$id);
        if($this->db->update('blog',$update)){
            return true;
        }else{
            return false;
        }
    }
    public function add_comment($insert){
        return $this->db->insert('blog_comments',$insert)?true:false;
    }
    public function get_waiting_comments(){
        $this->db->select("b.topic,bc.name,bc.email,bc.message,bc.status,b.id,bc.id");
        $this->db->from("blog b,blog_comments bc");
        $this->db->where("bc.blog_id=b.id AND bc.status=0");
        return $this->db->get()->result();
    }
    public function get_approved_comments(){
        $this->db->select("b.topic,bc.name,bc.email,bc.message,bc.status,b.id,bc.id");
        $this->db->from("blog b,blog_comments bc");
        $this->db->where("bc.blog_id=b.id AND bc.status=1");
        return $this->db->get()->result();
    }
    public function change_comment_status($update,$id){
        $this->db->where('id',$id);
        if($this->db->update('blog_comments',$update)){
            return true;
        }else{
            return false;
        }
    }
    public function delete_comment($id){
        $this->db->where('id',$id);
        if($this->db->delete('blog_comments')){
            return true;
        }else{
            return false;
        }
    }
}
?>