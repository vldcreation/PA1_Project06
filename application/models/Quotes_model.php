<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quotes_model extends CI_Model {

	// load database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing All
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('quotes');
		$this->db->order_by('id_quotes', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//coming soon
	public function listaktif()
	{
		$this->db->select('*');
		$this->db->from('quotes');
		$this->db->order_by('id_quotes', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Total
	public function total()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('quotes');
		$query = $this->db->get();
		return $query->row();
	}

	// Detail
	public function detail($id_quotes)
	{
		$this->db->select('*');
		$this->db->from('quotes');
		// where
		$this->db->where('id_quotes', $id_quotes);
		$this->db->order_by('id_quotes', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data)
	{
		$this->db->insert('quotes', $data);
	}

	// Edit
	public function edit($data)
	{
		$this->db->where('id_quotes', $data['id_quotes']);
		$this->db->update('quotes', $data);
	}

	// Delete
	public function delete($data)
	{
		$this->db->where('id_quotes', $data['id_quotes']);
		$this->db->delete('quotes', $data);
	}
}

/* End of file Bagian_model.php */
/* Location: ./application/models/Bagian_model.php */