<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

	// load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('member_model');
		$this->load->model('konfigurasi_model');
	}

	// Login page
	public function index()
	{
		$site = $this->konfigurasi_model->listing();
		$data = array(	'title'		=> 'Halaman Register',
						'site'		=> $site,
	);
		$this->load->view('register/list2', $data, FALSE);
	}
	
	public function member()
	{
		// Validasi input
		$this->form_validation->set_rules('nama','Nama Lengkap','required',
			array(	'required'	=> '%s harus diisi'),'refresh');

			$this->form_validation->set_rules('email','Email','required|is_unique[members.email]',
			array(	'required'		=> '%s harus diisi',
					'is_unique'		=> 'Email sudah ada. Masukan Email baru'));

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
			$this->form_validation->set_rules('confirm_pass','Konfirmasi Password','required|matches[password]',
			array( 	'required' => '%s harus diisi','matches' => '%s Tidak sama'));

			$i = $this->input;
		if($this->form_validation->run()) {
			//toke member
			$token = base64_encode(random_bytes(32));
			$token_created = time();
			//data member
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
				'email' => htmlspecialchars($email),
				'username' => htmlspecialchars($username),
				'password' => $password,
				'password_hint' => $pass_hint,
				'akses_level' => 'User',
				'Motivasi'	=> $motivasi,
				'tanggal_daftar' => date('Y-m-d',strtotime($i->post('tanggal_publish'))).' '.$i->post('jam_publish'),
				'slug_member' => md5(url_title($Nama_Lengkap,'dash',TRUE)),
				'is_active' => $is_active,
				'token' => $token,
				'token_created' => $token_created,

			);


			$this->member_model->tambah($data);
			
			$this->_sendEmail($token,'verify');

			$this->session->set_flashdata('sukses', 'Akun telah terdaftar,Namun akun belum aktif :) check email anda untuk aktivasi akun => '.$email);
			redirect(base_url('loginmember'),'refresh');
		
	}
		// End validasi

		$site = $this->konfigurasi_model->listing();
		$data = array(	'title'		=> 'Halaman Register',
						'site'		=> $site,
	);
		$this->load->view('register/list2', $data, FALSE);
	}

	public function reset_password(){
		$site = $this->konfigurasi_model->listing();
		// Validasi input
		$this->form_validation->set_rules('email','Email','required',
		array(	'required'	=> '%s harus diisi'),'refresh');

		if($this->form_validation->run()){
		//toke member
		$token = base64_encode(random_bytes(32));
		$token_created = time();

		//get data
		$email = $this->input->post('email');

		//check user
		$user = $this->member_model->is_Useravailable_reset($email);

		if($user){
		$data = array(
			'id_user' => $user->id_user,
			'token' => $token,
			'token_created' => time(),
		);

		$this->member_model->edit($data);
		$this->_sendEmail($token,'reset');
		$this->session->set_flashdata('sukses', 'Silahkan Check Email anda...Link Reset Password telah dikirim ke email '.$email);
		redirect(base_url('loginmember'),'refresh');
	}else{
		$this->session->set_flashdata('warning', 'Mohon Maaf...Akun tidak terdaftar!');
		redirect(base_url('registrasi/reset_password'),'refresh');
	}

}

	// End validasi

	$data = array(	'title'		=> 'Reset Password',
					'site'		=> $site,
);
	$this->load->view('loginmember/reset', $data, FALSE);

	}
	
	private function _sendEmail($token,$type){
		$conf = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'infodcc.21@gmail.com',
			'smtp_pass' => 'admindcc',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n",
		];

		$this->load->library('email',$conf);


		$this->email->from('infodcc.21@gmail.com','AdminDCC');
		$this->email->to($this->input->post('email'));
		
		if($type == 'verify'){
			$data2 = array(
				'name'		=> 'Del Cloud Club',
				'link2'		=> base_url().'registrasi/verify?email=' . $this->input->post('email').'&token='. $token,
			);
			$this->email->subject('Account Verification');
			$body = $this->load->view('template/email_verif.php', $data2, true);
			$this->email->message($body);	
		}
		elseif($type == 'reset'){
			$data = array(
				'name'		=> 'Del Cloud Club',
				'link'		=> base_url().'registrasi/reset?email=' . $this->input->post('email').'&token='. $token,
			);
			$this->email->subject('Reset Password');
			$body = $this->load->view('template/email_reset.php', $data, true);
			$this->email->message($body);
		}
		
		if($this->email->send()){
			return true;
		}
		else{
			echo $this->email->print_debugger();
			die;
		}

	}

	//verifikasi aktivasi akun by email
	public function verify(){
		$email = $this->input->get('email');
		$token = $this->input->get('token');
		$user = $this->member_model->is_Useravailable($email);
		if($user){
			$user_token1 = $this->member_model->is_Token_verify($token);
			if($user_token1){
			if((time() - $user->token_created) < (60 * 60 * 24)){
				$data = array(
					'id_user' => $user->id_user,
					'is_active' => 'Y',
				);
				$this->member_model->edit($data);
				$this->session->set_flashdata('sukses', 'Akun '. $email .' Telah aktif , Silahkan Login :)');
				redirect(base_url('loginmember'),'refresh');
				
			}else{

				$this->member_model->delete($user->id_user);

				$this->session->set_flashdata('warning', 'Aktivasi akun gagal , Token Sudah Kadaluwarsa');
				redirect(base_url('loginmember'),'refresh');
			}
		}else{
			$this->session->set_flashdata('warning', 'Aktivasi akun gagal , Token tidak ada');
				redirect(base_url('loginmember'),'refresh');
		}
		}else{
			
				$this->session->set_flashdata('warning', 'Aktivasi akun gagal , Email tidak ada');
			redirect(base_url('loginmember'),'refresh');

			
		}
	}

	//reset
	public function reset(){
		$email = $this->input->get('email');
		$token = $this->input->get('token');
		$user = $this->member_model->is_Useravailable_reset($email);
		if($user){
			$user_token = $this->member_model->is_Token($token);
			if($user_token){
			if((time() - $user->token_created) < (60 * 60 * 24)){
				$data = array(
					'id_user' => $user->id_user,
					'password' => '7c4a8d09ca3762af61e59520943dc26494f8941b',
				);
				$this->member_model->edit($data);
				$this->session->set_flashdata('sukses', 'Password Akun '. $email .' Telah Set ke Default Password , Silahkan Login dengan password => 123456');
				redirect(base_url('loginmember'),'refresh');
				
			}else{

				// $this->member_model->delete($user->id_user);

				$this->session->set_flashdata('warning', 'Reset Password gagal , Token Sudah Kadaluwarsa');
				redirect(base_url('loginmember'),'refresh');
			}
		}else{
			$this->session->set_flashdata('warning', 'Reset Password gagal , Token tidak ada');
				redirect(base_url('loginmember'),'refresh');
		}
		}else{
			
				$this->session->set_flashdata('warning', 'Reset Password gagal , Email tidak ada');
			redirect(base_url('loginmember'),'refresh');

			
		}
	}
}