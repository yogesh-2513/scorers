<?php

// Created by T.Yogesh

class NotificationModel extends CI_Model{
    public function get_subscribers(){
        $this->db->distinct();
        return $this->db->get('subscribers')->result();
    }
}