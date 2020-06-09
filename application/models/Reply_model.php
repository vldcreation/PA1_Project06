<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Reply_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function tambah($data){
        $this->db->insert('reply_koment',$data);
    }
    public function delete($data){
        $this->db->where(('id_reply_koment.id_reply'), $data['id_reply_koment']);
        $this->db->delete('reply_koment',$data);

    }

    public function total() {
        $this->db->select('*');
        $this->db->from('reply_komen');
        //join
        $this->db->join('users','users.id_user = reply_komen.id_penulis','LEFT');
        // End join
        $this->db->order_by('reply_komen.id_reply_komen','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    //Update Jlh reply_koment
    public function jlhreply_komen($id_diskusi){
        $this->db->select('reply_komen.*');
        $this->db->from('reply_komen');
        $this->db->join('diskusi','diskusi.id_diskusi = reply_komen.id_post','LEFT');
        $this->db->where('id_post',$id_diskusi);
        $this->db->order_by('reply_komen.id_post','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    // Listing reply_koment
public function reply_koment($limit,$start) {
    $this->db->select('reply_koment.*, 
                users.nama,
                ');
    $this->db->from('reply_koment');
    $this->db->join('users','users.id_user = reply_koment.id_penulis','LEFT');
    // End join
    $this->db->order_by('reply_koment.id_reply_koment','DESC');
    $this->db->limit($limit,$start);
    $query = $this->db->get();
    return $query->result();
}

// Listing data
public function listing($id_diskusi){
    $this->db->select('reply_koment.*');
    $this->db->from('reply_koment');
    // Join dg 2 tabel
    $this->db->join('diskusi','diskusi.id_diskusi = '.$id_diskusi,'LEFT');
    // End join
    $this->db->order_by('reply_koment.id_reply_koment','ASC');
    $query = $this->db->get();
    return $query->result();

}

}