<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Diskusi_model extends CI_Model{
 public function __construct(){
     parent::__construct();
     $this->load->database();
 }

// Tambah
public function tambah($data) {
    $this->db->insert('diskusi',$data);
}

// Listing total
public function total() {
    $this->db->select('diskusi.*, users.nama');
    $this->db->from('diskusi');
    // Join dg 2 tabel
    
    $this->db->join('users','users.id_user = diskusi.id_users','LEFT');
    // End join
    $this->db->order_by('diskusi.id_diskusi','DESC');
    $query = $this->db->get();
    return $query->result();
}

// Listing diskusi
public function diskusi($limit,$start) {
    $this->db->select('diskusi.*, 
                users.nama,
                ');
    $this->db->from('diskusi');
    $this->db->join('users','users.id_user = diskusi.id_users','LEFT');
    // End join
    $this->db->order_by('diskusi.id_diskusi','DESC');
    $this->db->limit($limit,$start);
    $query = $this->db->get();
    return $query->result();
}

public function mytopik(){
    $useraktif_nama = $this->session->userdata('nama');
    $this->db->select('diskusi.*, 
    users.nama,
    ');
    $this->db->from('diskusi');
    $this->db->join('users','users.id_user = diskusi.id_users','LEFT');
    // End join
    $this->db->where('penulis_diskusi', $useraktif_nama);
    $this->db->order_by('diskusi.id_diskusi','DESC');
    $query = $this->db->get();
    return $query->row();
}

public function listing(){
    $this->db->select('diskusi.*, 
    users.nama,
    ');
    $this->db->from('diskusi');
    $this->db->join('users','users.id_user = diskusi.id_users','LEFT');
    // End join
    $this->db->order_by('diskusi.id_diskusi','DESC');
    $query = $this->db->get();
    return $query->result();
}

public function read($slug_diskusi) {
    $this->db->select('diskusi.*, 
                users.nama
                ');
    $this->db->from('diskusi');
    $this->db->join('users','users.id_user = diskusi.id_users','LEFT');
    $this->db->where('slug_diskusi',$slug_diskusi);
    $this->db->order_by('id_diskusi','DESC');
    $query = $this->db->get();
    return $query->row();
}

public function listing_read(){
    $this->db->select('diskusi.*, 
    users.nama,
    ');
    $this->db->from('diskusi');
    $this->db->join('users','users.id_user = diskusi.id_users','LEFT');
    // End join
    $this->db->order_by('diskusi.id_diskusi','DESC');
    $query = $this->db->get();
    return $query->result();
}

 // Listing total
 public function totalComment($id_post) {
    $this->db->select('diskusi.*, 
    users.nama,
    ');
    $this->db->from('diskusi');
    $this->db->join('users','users.id_user = diskusi.id_users','LEFT');
    // End join
    $this->db->where(array('id_diskusi' => $id_post));
    $this->db->order_by('diskusi.id_diskusi','DESC');
    $query = $this->db->get();
    return $query->result();
}

 // Kunjungan Diskusi terbanyak
 public function hits()
 {
     $this->db->select('*');
     $this->db->from('diskusi');
     $this->db->order_by('hits','DESC');
     $this->db->limit(100);
     $query = $this->db->get();
     return $query->result();
 }

 // Edit hit
 public function update_hit($hit) {
    $this->db->where('id_diskusi',$hit['id_diskusi']);
    $this->db->update('diskusi',$hit);
}

// Edit jlh Komentar
public function update_jlh_komentar($hit) {
    $this->db->where('id_diskusi',$hit['id_diskusi']);
    $this->db->update('diskusi',$hit);
}

// Detail
public function detail($id_diskusi) {
    $this->db->select('*');
    $this->db->from('diskusi');
    $this->db->where('id_diskusi',$id_diskusi);
    $this->db->order_by('id_diskusi','DESC');
    $query = $this->db->get();
    return $query->row();
}

//delete
public function delete($data){
    $this->db->where('id_diskusi',$data['id_diskusi']);
    $this->db->delete('diskusi',$data);
}
}