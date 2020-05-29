<?php

class Member_model extends CI_Model {

	// load database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Tambah
	public function tambah($data)
	{
		$this->db->insert('members', $data);
	}

	// Listing
	public function listing()
	{
		$this->db->select('members.*');
		$this->db->from('members');
		$this->db->order_by('members.id_user', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Total
	public function total()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('members');
		$query = $this->db->get();
		return $query->row();
	}

	// Login
	public function login($username,$password)
	{
		$this->db->select('members.*');
		$this->db->from('members');
		// where
		$this->db->where(array(	'username'	=> $username,
								'password'	=> sha1($password),
							));
		$this->db->order_by('members.id_user', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Detail
	public function detail($id_user)
	{
		$this->db->select('members.*');
		$this->db->from('members');
		// where
		$this->db->where('members.id_user', $id_user);
		$this->db->order_by('members.id_user', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	

	// Edit
	public function edit($data)
	{
		$this->db->where('id_user', $data['id_user']);
		$this->db->update('members', $data);
	}

	// Delete
	public function delete($data)
	{
		$this->db->where('id_user', $data['id_user']);
		$this->db->delete('members', $data);
	}
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */