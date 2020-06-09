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

	//Token activity
	//check_verify if user untuk verify
	public function is_Useravailable($email){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->where(('members.email'),$email);
		$query = $this->db->get()->row();
		return $query;
	}

	//check_verify if user untuk reset
	public function is_Useravailable_reset($email){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->where(array(
			'email' => $email,
			'is_active' => 'Y',
		));
		$query = $this->db->get()->row();
		return $query;
	}

	//check token untuk reset
	public function is_Token($token){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->where(('members.token'),$token);
		$query = $this->db->get()->row();
		return $query;
	}

	//check token untuk aktivasi
	public function is_Token_verify($token){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->where(('members.token'),$token);
		$query = $this->db->get()->row();
		return $query;
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
	public function detail_other($slug_member)
	{
		$this->db->select('*');
		$this->db->from('members');
		// where
		$this->db->where(('members.slug_member'), $slug_member);
		$this->db->order_by('members.id_user', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function detail($id_user){
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