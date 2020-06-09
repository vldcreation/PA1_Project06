<?php

class Info_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    // Listing
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('members');
		// End join
		$this->db->order_by('members.id_user', 'desc');
		$query = $this->db->get();
		return $query->result();
    }
    
    public function edit($data){
        $this->db->where('id_user',$data['id_user']);
        $this->db->update('members',$data);
    }

    public function get_one($useraktif){
        $this->db->select('*');
        $this->db->from('members');
        $this->db->where(('nama') , $useraktif);
        return $this->db->get()->result();
    }
}