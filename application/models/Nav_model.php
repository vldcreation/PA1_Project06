<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nav_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	// Menu utama
	public function nav_menu() {
		$this->db->select('*');
		$this->db->from('menu');
		$this->db->order_by('urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Sub menu
	public function nav_sub_menu($id_menu) {
		$this->db->select('*');
		$this->db->from('sub_menu');
		$this->db->where('id_menu',$id_menu);
		$this->db->order_by('urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	

	// Navigasi profil
	public function nav_profil() {
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->where(array(	'jenis_berita'	=> 'Profil',
								'status_berita'	=> 'Publish'));
		$this->db->order_by('urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Navigasi profil
	public function nav_layanan() {
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->where(array(	'jenis_berita'	=> 'Layanan',
								'status_berita'	=> 'Publish'));
		$this->db->order_by('urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Navigasi profil
	public function nav_topik() {
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->where(array(	'jenis_berita'	=> 'Topik Prioritas',
								'status_berita'	=> 'Publish'));
		$this->db->order_by('urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data slider
	public function nav_galeri() {
		$this->db->select('galeri.*, kategori_galeri.nama_kategori_galeri, kategori_galeri.slug_kategori_galeri');
		$this->db->from('galeri');
		// Join dg 2 tabel
		$this->db->join('kategori_galeri','kategori_galeri.id_kategori_galeri = galeri.id_kategori_galeri','LEFT');
		// End join
		$this->db->where('jenis_galeri','Galeri');
		$this->db->group_by('galeri.id_kategori_galeri');
		$this->db->order_by('id_galeri','DESC');
		$this->db->limit(8);
		$query = $this->db->get();
		return $query->result();
	}

	

	// Listing
	public function nav_video() {
		$this->db->select('*');
		$this->db->from('video');
		$this->db->order_by('id_video','DESC');
		$this->db->order_by('urutan','DESC');
		$this->db->limit(8);
		$query = $this->db->get();
		return $query->result();
	}

	// Listing
	public function nav_agenda() {
		$this->db->select('*');
		$this->db->from('agenda');
		$this->db->order_by('mulai','DESC');
		$this->db->limit(8);
		$query = $this->db->get();
		return $query->result();
	}



	// Navigasi berita
	public function nav_berita() {
		$this->db->select('berita.*,kategori.nama_kategori,kategori.slug_kategori');
		$this->db->from('berita');
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori');
		$this->db->where(array(	'jenis_berita'	=> 'Berita',
								'status_berita'	=> 'Publish'));
		$this->db->group_by('berita.id_kategori');
		$this->db->order_by('kategori.urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	//nav diskusi
	public function nav_diskusi(){
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



	// Navigasi download
	public function nav_download() {
		$this->db->select('download.*,kategori_download.nama_kategori_download,kategori_download.slug_kategori_download');
		$this->db->from('download');
		$this->db->join('kategori_download','kategori_download.id_kategori_download = download.id_kategori_download');
		$this->db->where(array(	'jenis_download'	=> 'Download'));
		$this->db->group_by('download.id_kategori_download');
		$this->db->order_by('kategori_download.urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}

}

/* End of file Nav_model.php */
/* Location: ./application/models/Nav_model.php */