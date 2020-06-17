<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginMember extends CI_Controller {

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
		// Validasi input
		$this->form_validation->set_rules('username','Username','required',
			array(	'required'	=> '%s harus diisi'));

		$this->form_validation->set_rules('password','Password','required',
			array(	'required'	=> '%s harus diisi'));

		if($this->form_validation->run()) {
			$username 	= strip_tags($this->input->post('username'));
			$password 	= strip_tags($this->input->post('password'));
			// Proses ke simple login
			$this->simple_login->loginmember($username,$password);
		}
		// End validasi

		$data = array(	'title'		=> 'Halaman Login Member',
						'site'		=> $site,
	);
		$this->load->view('loginmember/list', $data, FALSE);
	}

	// Logout
	public function logout()
	{
		// Panggil library logout
		$this->simple_login->logoutuser();
	}

	public function resend_activation(){
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
		$user = $this->member_model->is_Useravailable_activation($email);

		if($user){
		$data = array(
			'id_user' => $user->id_user,
			'token' => $token,
			'token_created' => time(),
		);

		$this->member_model->edit($data);
		$this->_sendEmail($token,'verify');
		$this->session->set_flashdata('sukses', 'Silahkan Check Email anda...Aktivasi akun telah dikirim ke email '.$email);
		redirect(base_url('loginmember'),'refresh');
	}else{
		$this->session->set_flashdata('warning', 'Mohon Maaf...Tidak ada email yang terdaftar!');
		redirect(base_url('loginmember/resend_activation'),'refresh');
	}

}

	// End validasi

	$data = array(	'title'		=> 'Reset Password',
					'site'		=> $site,
);
	$this->load->view('loginmember/resend', $data, FALSE);

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

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */