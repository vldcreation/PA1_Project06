<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	// Load model
	public function __construct()
	{
		parent::__construct();
		// Tambahkan proteksi halaman
		$url_pengalihan = str_replace('index.php/', '', current_url());
		$pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
		// Ambil check login dari simple_login
		$this->simple_login->check_login($pengalihan);
		$this->load->model('member_model');
		$this->load->model('bagian_model');
		// Tambahkan proteksi halaman
		$url_pengalihan = str_replace('index.php/', '', current_url());
		$pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
		// Ambil check login dari simple_login
		$this->simple_login->check_login($pengalihan);
	}

	// Halaman utama
	public function index()
	{
		// Ambil data user
		$user 	= $this->member_model->listing();
		$total 	= $this->member_model->total();

		$data = array(	'title'		=> 'User dan Wilayah ('.$total->total.' data)',
						'user'		=> $user,
						'isi'		=> 'member/user/list'
					);
		$this->load->view('member/layout/wrapper', $data, FALSE);
	}

	// Tambah
	public function tambah()
	{
		// Load data bagian
		$bagian 		= $this->bagian_model->listing();
		// Validasi
		$validasi 	= $this->form_validation;

		$validasi->set_rules('nama','Nama User','required',
			array(	'required'		=> '%s harus diisi'));

		$validasi->set_rules('username','Username','required|is_unique[members.username]',
			array(	'required'		=> '%s harus diisi',
					'is_unique'		=> '%s sudah ada. Buat kode baru'));

		$validasi->set_rules('password','Password','required',
			array(	'required'		=> '%s harus diisi'));

		if($validasi->run()===FALSE) {
		// End validasi

		$data = array(	'title'		=> 'Tambah User Baru',
						'bagian'		=> $bagian,
						'isi'		=> 'member/user/tambah'
					);
		$this->load->view('member/layout/wrapper', $data, FALSE);
		// Masuk ke database
		}else{
			$inp = $this->input;

			$data = array(	'id_bagian'		=> $inp->post('id_bagian'),
							'nama'		=> $inp->post('nama'),
							'email'			=> $inp->post('email'),
							'username'		=> $inp->post('username'),
							'password'		=> sha1($inp->post('password')),
							'akses_level'	=> $inp->post('akses_level'),
							'keterangan'	=> $inp->post('keterangan'),
							'tanggal_post'	=> date('Y-m-d H:i:s')
						);
			$this->member_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambahkan');
			redirect(base_url('member/user'),'refresh');
		}
		// End masuk database
	}

	// Edit
	public function edit($id_user)
	{
		// Load data bagian
		$bagian 		= $this->bagian_model->listing();
		// Ambil data user yg akan diedit
		$user 		= $this->member_model->detail($id_user);

		// Validasi
		$validasi = $this->form_validation;

		$validasi->set_rules('nama','Nama User','required',
			array(	'required'		=> '%s harus diisi'));

		$validasi->set_rules('username','Username','required',
			array(	'required'		=> '%s harus diisi'));

		$validasi->set_rules('password','Password','required',
			array(	'required'		=> '%s harus diisi'));

		if($validasi->run()===FALSE) {
		// End validasi

		$data = array(	'title'		=> 'Edit User: '.$user->nama,
						'user'		=> $user,
						'bagian'		=> $bagian,
						'isi'		=> 'member/user/edit'
					);
		$this->load->view('member/layout/wrapper', $data, FALSE);
		// Masuk ke database
		}else{
			$inp = $this->input;

			$data = array(	'id_user'		=> $id_user,
							'id_bagian'		=> $inp->post('id_bagian'),
							'nama'		=> $inp->post('nama'),
							'email'			=> $inp->post('email'),
							'username'		=> $inp->post('username'),
							'password'		=> sha1($inp->post('password')),
							'akses_level'	=> $inp->post('akses_level'),
							'keterangan'	=> $inp->post('keterangan'),
							'tanggal_post'	=> date('Y-m-d H:i:s')
						);
			$this->member_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diupdate');
			redirect(base_url('member/user'),'refresh');
		}
		// End masuk database
	}

	// Proses
	public function proses()
	{
		$id_usernya	= $this->input->post('id_user');
		$pengalihan = $this->input->post('pengalihan');

		// Check id_user kosong atau tidak
		if($id_usernya == "") {
			$this->session->set_flashdata('warning', 'Anda belum memilih data');
			redirect($pengalihan,'refresh');
		}

		// Proses hapus jika klik tombol "hapus", jika ga ada yg kosong
		if(isset($_POST['hapus'])) {
			// Proses hapus diloop
			for($i=0;$i<sizeof($id_usernya);$i++)
			{
				$id_user = $id_usernya[$i];
				$data = array(	'id_user'		=> $id_user);
				$this->member_model->delete($data);
			}
			// End proses hapus
			$this->session->set_flashdata('sukses', 'Data telah dihapus');
			redirect($pengalihan,'refresh');
		}
	}

	// Delete
	public function delete($id_user)
	{
		$data = array(	'id_user'		=> $id_user);
		$this->member_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('member/user'),'refresh');
	}
}


/* End of file User.php */
/* Location: ./application/controllers/member/User.php */