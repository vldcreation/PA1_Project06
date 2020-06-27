<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_diskusi_model extends CI_Model{
    public function __consturt(){
        parent::__consturt();
    }

    public function listing(){
        $query = $this->db->select('*')
        ->from('kategori_diskusi')
        ->order_by('id_kategori_diskusi')
        ->get()->result();
        return $query;
    }

    public function detail($id_kategori){
        $query = $this->db->select('*')
        ->where('id_kategori_diskusi',$id_kategori)
        ->order_by('id_kategori_diskusi','ASC')
        ->get('kategori_diskusi')->row();
        return $query;
    }

    public function tambah($data){
        $this->db->insert('kategori_diskusi',$data);
    }

    public function edit($data){
        $this->db->where('id_kategori_diskusi',$data['id_kategori_diskusi'])
		->update('kategori_diskusi',$data);
    }
    public function delete($data){
        $this->db->where('id_kategori_diskusi',$data['id_kategori_diskusi'])
		->delete('kategori_diskusi',$data);
    }
}