<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peneliti_model extends CI_Model{
    public function __construct()
	{
		parent::__construct();
		$this->load->database();
    }

    public function listing() {
		$this->db->select('*');
		$this->db->from('konfigurasi');
		$this->db->order_by('id_konfigurasi','DESC');
		$query = $this->db->get();
		return $query->row();
	}
}

?>