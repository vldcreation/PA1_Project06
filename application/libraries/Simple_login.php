<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();
        // load user model
        $this->CI->load->model('user_model');
	}

	// Fungsi login
	public function login($username,$password)
	{
		// Check user yang login
		$user_login = $this->CI->user_model->login($username,$password);
		// Kalau ada, maka masuk ke halaman dashboard
		if($user_login) {
			$id_user 		= $user_login->id_user;
			$id_bagian 		= $user_login->id_bagian;
			$nama_bagian 	= $user_login->nama_bagian;
			$username 		= $username;
			$nama 			= $user_login->nama;
			$gambar			= $user_login->gambar;
			$akses_level 	= $user_login->akses_level;
			$all_akses		= $user_login->all_akses;
			// Create session utk login
			$this->CI->session->set_userdata('id_user',$id_user);
			$this->CI->session->set_userdata('id_bagian',$id_bagian);
			$this->CI->session->set_userdata('nama_bagian',$nama_bagian);
			$this->CI->session->set_userdata('username',$username);
			$this->CI->session->set_userdata('nama',$nama);
			$this->CI->session->set_userdata('pp',$gambar);
			$this->CI->session->set_userdata('akses_level',$akses_level);
			$this->CI->session->set_userdata('all_akses',$all_akses);
			$this->CI->session->set_userdata('masuk',TRUE);
			// Lalu redirect masuk ke halaman dashboard
			$this->CI->session->set_flashdata('sukses', 'Anda berhasil login');
			// Periksa user mengakses halaman mana sebelumnya
			if($this->CI->session->userdata('pengalihan')) {
				// Jika, ada alihkan
				$pengalihan = $this->CI->session->userdata('pengalihan');
				redirect($pengalihan,'refresh');
			}else{
				// Jika ga ada, default masuk ke halaman dasbor
				redirect(base_url(''),'refresh');
			}
		}else{
			// Kalau ga ada user yg cocok, suruh login lagi
			$this->CI->session->set_flashdata('warning', 'Username/password salah');
			redirect(base_url('loginadmin'),'refresh');
		}
	}

	// Fungsi login
	//login untuk member user
	public function loginmember($username,$password)
	{
		// Check user yang login
		$user_login = $this->CI->user_model->loginmember($username,$password);

		// Kalau ada, maka masuk ke halaman dashboard
		if($user_login) {
			$id_user 		= $user_login->id_user;
			$username 		= $username;
			$prodi			= $user_login->Prodi;
			$NIM			= $user_login->NIM;
			$nama 			= $user_login->nama;
			$gambar			= $user_login->gambar;
			$akses_level 	= $user_login->akses_level;
			$email			= $user_login->email;
			$is_active		= $user_login->is_active;
			if($is_active != 'Y'){
				// Kalau Akun member belum aktive
			$this->CI->session->set_flashdata('warning', 'Maaf akun anda belum aktif :( Silahkan check email anda untuk aktivasi akun => '.$email);
			redirect(base_url('loginmember'),'refresh');

			}else{
			// Create session utk login
			$this->CI->session->set_userdata('id_user',$id_user);
			$this->CI->session->set_userdata('prodi',$prodi);
			$this->CI->session->set_userdata('nim',$NIM);
			$this->CI->session->set_userdata('username',$username);
			$this->CI->session->set_userdata('nama',$nama);
			$this->CI->session->set_userdata('pp',$gambar);
			$this->CI->session->set_userdata('akses_level',$akses_level);
			$this->CI->session->set_userdata('masuk',TRUE);
			// Lalu redirect masuk ke halaman dashboard
			$this->CI->session->set_flashdata('sukses', 'Anda berhasil login');
			// Periksa user mengakses halaman mana sebelumnya
			if($this->CI->session->userdata('pengalihan')) {
				// Jika, ada alihkan
				$pengalihan = $this->CI->session->userdata('pengalihan');
				redirect($pengalihan,'refresh');
			}else{
				// Jika ga ada, default masuk ke halaman dasbor
				redirect(base_url(''),'refresh');
			}
		}
			// Periksa user mengakses halaman mana sebelumnya
			
		}else{
			// Kalau ga ada user yg cocok, suruh login lagi
			$this->CI->session->set_flashdata('warning', 'Username/password salah');
			redirect(base_url('loginmember'),'refresh');
		}
	}

	// Fungsi logout
	public function logout()
	{
		// Meng-unset semua session
		$this->CI->session->unset_userdata('id_user');
		$this->CI->session->unset_userdata('id_bagian');
		$this->CI->session->unset_userdata('nama_bagian');
		$this->CI->session->unset_userdata('username');
		$this->CI->session->unset_userdata('nama');
		$this->CI->session->unset_userdata('akses_level');
		$this->CI->session->unset_userdata('pengalihan');
		// Redirect ke halaman login
		$this->CI->session->set_flashdata('sukses', 'Anda berhasil logout');
		redirect(base_url('login'),'refresh');
	}

	// Fungsi logout2
	public function logoutUser()
	{
		// Meng-unset semua session
		$this->CI->session->unset_userdata('id_user');
		$this->CI->session->unset_userdata('id_bagian');
		$this->CI->session->unset_userdata('nama_bagian');
		$this->CI->session->unset_userdata('username');
		$this->CI->session->unset_userdata('nama');
		$this->CI->session->unset_userdata('akses_level');
		$this->CI->session->unset_userdata('pengalihan');
		// Redirect ke halaman login
		$this->CI->session->set_flashdata('sukses', 'Anda berhasil logout');
		redirect(base_url('home'),'refresh');
	}

	// Fungsi check login: seseorang sudah login atau belum
	public function check_login($pengalihan)
	{
		// Check status login (kita ambil status username dan akses level)
		if($this->CI->session->userdata('username') == "" && 
			$this->CI->session->userdata('akses_level') == "")
		{
			$this->CI->session->set_flashdata('warning', 'Anda belum login');
			redirect(base_url('loginmember'),'refresh');
		}
	}

	//check status bagian
	public function check_bagian_kompetisi($bagian,$pengalihan){
		if($this->CI->session->userdata('id_bagian') != $bagian ){
			$this->CI->session->set_flashdata('warning', 'Anda Tidak dapat melakukannya');
			echo "<script>
 					window.location=history.go(-1);
 					</script>";
		}
	}

	//check status bagian
	public function check_bagian_SA($bagian,$pengalihan){
		if($this->CI->session->userdata('id_bagian') != $bagian ){
			$this->CI->session->set_flashdata('warning', 'Anda Tidak dapat melakukannya');
			echo "<script>
 					window.location=history.go(-1);
 					</script>";
		}
	}

	// Fungsi check login: seseorang sudah login atau belum
	public function cek_login($pengalihan)
	{
		// Check status login (kita ambil status username dan akses level)
		if($this->CI->session->userdata('username') == "" && 
			$this->CI->session->userdata('akses_level') == "")
		{
			$this->CI->session->set_flashdata('warning', 'Anda belum login');
			redirect(base_url('loginmember'),'refresh');
		}
	}
}

/* End of file Simple_login.php */
/* Location: ./application/libraries/Simple_login.php */
