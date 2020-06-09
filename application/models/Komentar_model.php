<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Komentar_model extends CI_Model{
public function __construct(){
     parent::__construct();
     $this->load->database();
 }

 public function tambah($data){
    $this->db->insert('komentar',$data);
}

 public function total() {
    $this->db->select('komentar.*, users.nama');
    $this->db->from('komentar');
    // Join dg 2 tabel
    
    $this->db->join('users','users.id_user = komentar.id_penulis','LEFT');
    // End join
    $this->db->order_by('komentar.id_komentar','DESC');
    $query = $this->db->get();
    return $query->result();
}

public function jlhkomentar($id_diskusi){
    $this->db->select('komentar.*');
    $this->db->from('komentar');
    $this->db->join('diskusi','diskusi.id_diskusi = komentar.id_post','LEFT');
    $this->db->where('id_post',$id_diskusi);
    $this->db->order_by('komentar.id_post','DESC');
    $query = $this->db->get();
    return $query->result();
}

// Listing komentar
public function komentar($limit,$start) {
    $this->db->select('komentar.*, 
                users.nama,
                ');
    $this->db->from('komentar');
    $this->db->join('users','users.id_user = komentar.id_penulis','LEFT');
    // End join
    $this->db->order_by('komentar.id_komentar','DESC');
    $this->db->limit($limit,$start);
    $query = $this->db->get();
    return $query->result();
}

//list data berdasarkan nama penulis
public function mytopik($useraktif_nama){
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

// Listing data
public function listing($id_diskusi){
    $this->db->select('komentar.*');
    $this->db->from('komentar');
    // Join dg 2 tabel
    $this->db->join('diskusi','diskusi.id_diskusi = '.$id_diskusi,'LEFT');
    // End join
    $this->db->order_by('komentar.id_komentar','ASC');
    $query = $this->db->get();
    return $query->result();

}

// Detail
public function detail($id_komentar) {
    $this->db->select('*');
    $this->db->from('komentar');
    $this->db->where('id_komentar',$id_komentar);
    $this->db->order_by('id_komentar','DESC');
    $query = $this->db->get();
    return $query->row();
}

//delete
public function delete($data){
    $this->db->where('id_komentar',$data['id_komentar']);
    $this->db->delete('komentar',$data);
}
}