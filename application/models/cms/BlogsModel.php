<?php

// Created by T.Yogesh


class BlogsModel extends CI_Model{
    public function get_events(){
        $this->db->where('status',1);
        return $this->db->get('events')->result();
    }
    public function get_contact(){
        return $this->db->get('contact')->result();
    }
    public function get_blogs(){
        $this->db->where('status',1);
        return $this->db->get('blog')->result();
    }
    public function get_blog_by_id($id){
        $this->db->where('id',$id);
        return $this->db->get('blog')->result();
    }
    public function get_blog_comments($id){
        $this->db->select("*");
        $this->db->from("blog_comments");
        $this->db->where("blog_id=".$id." AND status=1");
        return $this->db->get()->result();
    }
    public function add_comment($insert){
        if($this->db->insert('blog_comments',$insert)){
            return true;
        }else{
            return false;
        }
    }
}




?>