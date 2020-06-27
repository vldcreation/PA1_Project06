<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

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
		// Tambahkan proteksi halaman
		$url_pengalihan = str_replace('index.php/', '', current_url());
		$pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
		// Ambil check login dari simple_login
		$this->simple_login->cek_login_admin($pengalihan);

		//Check Hak Akses
		$akses = $this->session->userdata('akses_level');
		if($akses != 'Admin'){
			redirect(base_url('home/oops'));
		}
	}

	// Halaman utama
	public function index()
	{
		// Ambil data user
		$member 	= $this->member_model->listing();
		$total 	= $this->member_model->total();

		$data = array(	'title'		=> 'Kelola Data Anggota ('.$total->total.' data)',
						'member'		=> $member,
						'isi'		=> 'admin/member/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Tambah
	public function tambah()
	{
		// Validasi input
		$this->form_validation->set_rules('nama','Nama Lengkap','required',
			array(	'required'	=> '%s harus diisi'),'refresh');

		$this->form_validation->set_rules('email','Email anda','required',
			array(	'required'	=> '%s harus diisi'));

		$this->form_validation->set_rules('NIM','NIM','required|is_unique[members.NIM]',
			array(	'required'		=> '%s harus diisi',
					'is_unique'		=> '%s sudah ada. Masukan NIM valid'));
		
		$this->form_validation->set_rules('Prodi','Prodi Anda','required',
			array(	'required'	=> '%s harus diisi'));
		
		$this->form_validation->set_rules('Motivasi','Motivasi anda','required',
			array(	'required'	=> '%s harus diisi'));
		
		$this->form_validation->set_rules('username','Username','required|is_unique[members.username]',
			array(	'required'		=> '%s harus diisi',
					'is_unique'		=> '%s sudah ada. Buat kode baru'));

		$this->form_validation->set_rules('password','Password anda','required',
			array( 	'required' => '%s harus diisi'));
			// $this->form_validation->set_rules('confirm_pass','Konfirmasi Password','required|matches[password]',
			// array( 	'required' => '%s harus diisi','matches' => '%s Tidak sama'));

			$i = $this->input;
		if($this->form_validation->run() ===FALSE ){
			// Ambil data user
			$member 	= $this->member_model->listing();
			$total 	= $this->member_model->total();

			$data = array(	'title'		=> 'Tambah Data Anggota ',
							'member'		=> $member,
							'isi'		=> 'admin/member/tambah'
						);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else{
			$Nama_Lengkap = htmlspecialchars($i->post('nama'));
			$email	= $i->post('email');
			$nim	= $i->post('NIM');
			$prodi	= $i->post('Prodi');
			$motivasi	= $i->post('Motivasi');
			$username 	= htmlspecialchars($i->post('username'));
			$pass = $i->post('password');
			$confirm_pass = $i->post('confimr_pass');
			$password 	= sha1($pass);
			$pass_hint = htmlspecialchars($i->post('password_hint'));
			// Default is Non-Active
			$is_active = 'N';
			// Proses ke database registrasi member
			$data = array(
				'NIM' => $nim,
				'Prodi' => $prodi,
				'nama' => $Nama_Lengkap,
				'email' => $email,
				'username' => $username,
				'password' => $password,
				'password_hint' => $pass_hint,
				'akses_level' => 'User',
				'Motivasi'	=> $motivasi,
				'tanggal_daftar' => date('Y-m-d',strtotime($i->post('tanggal_publish'))).' '.$i->post('jam_publish'),
				'slug_member' => md5(url_title($Nama_Lengkap,'dash',TRUE)),
				'is_active' => $is_active,

			);
			$this->member_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambahkan');
			redirect(base_url('admin/member'),'refresh');
		}
		// End masuk database
	}

	// Edit
	public function edit($id_user)
	{
		$i = $this->input;
		// Ambil data user yg akan diedit
		$member 		= $this->member_model->detail($id_user);
		$Nama_Lengkap = htmlspecialchars($i->post('nama'));
			$email	= $i->post('email');
			$nim	= $i->post('NIM');
			$prodi	= $i->post('Prodi');
			$motivasi	= $i->post('Motivasi');
			$username 	= htmlspecialchars($i->post('username'));
			$pass = $i->post('password');
			$confirm_pass = $i->post('confimr_pass');
			$password 	= sha1($pass);
			$pass_hint = htmlspecialchars($i->post('password_hint'));
			$is_active = $i->post('is_active');

		// Validasi input
		$this->form_validation->set_rules('nama','Nama Lengkap','required',
			array(	'required'	=> '%s harus diisi'),'refresh');

		$this->form_validation->set_rules('email','Email anda','required',
			array(	'required'	=> '%s harus diisi'));


		if($this->form_validation->run()===FALSE) {
		// End validasi

		$data = array(	'title'		=> 'Edit Data Anggota: -'.$member->nama,
						'member'		=> $member,
						'isi'		=> 'admin/member/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk ke database
		}else{
			$inp = $this->input;

			$data = array(	'id_user'		=> $id_user,
							'NIM' => $nim,
							'Prodi' => $prodi,
							'nama' => $Nama_Lengkap,
							'email' => $email,
							'username' => $username,
							'password' => $password,
							'password_hint' => $pass_hint,
							'akses_level' => 'User',
							'Motivasi'	=> $motivasi,
							'tanggal_daftar' => date('Y-m-d',strtotime($i->post('tanggal_publish'))).' '.$i->post('jam_publish'),
							'slug_member' => md5(url_title($Nama_Lengkap,'dash',TRUE)),
							'is_active' => $is_active,
						);
			$this->member_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diupdate');
			redirect(base_url('admin/member'),'refresh');
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
			$this->session->set_flashdata('sukses', 'Member telah dihapus');
			redirect($pengalihan,'refresh');
		}elseif(isset($_POST['aktifkan'])) {
			// Proses aktifkan diloop
			for($i=0;$i<sizeof($id_usernya);$i++)
			{
				$id_user = $id_usernya[$i];
				$data = array(	'id_user'		=> $id_user,
								'is_active'	=> 'Y');
				$this->member_model->edit($data);
			}
			// End proses aktifkan
			$this->session->set_flashdata('sukses', 'Member telah diaktifkan');
			redirect($pengalihan,'refresh');

		}elseif(isset($_POST['non_aktifkan'])) {
			// Proses non aktifkan diloop
			for($i=0;$i<sizeof($id_usernya);$i++)
			{
				$id_user = $id_usernya[$i];
				$data = array(	'id_user'		=> $id_user,
								'is_active'	=> 'N');
				$this->member_model->edit($data);
			}
			// End proses non aktifkan
			$this->session->set_flashdata('sukses', 'Member telah di non aktifkan');
			redirect($pengalihan,'refresh');
		}
	}

	// Delete
	public function delete($id_user)
	{
		$data = array(	'id_user'		=> $id_user);
		$this->member_model->delete($data);
		$this->session->set_flashdata('sukses', 'Member telah dihapus');
		redirect(base_url('admin/member'),'refresh');
	}
}


/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */