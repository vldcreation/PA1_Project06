<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

	// Database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('konfigurasi_model');
	}

	// Main page kontak
	public function index()	{
		$site 			= $this->konfigurasi_model->listing();

		$data = array(	'title'		=> 'Kontak '.$site->namaweb.' | '.$site->tagline,
						'deskripsi'	=> 'Kontak '.$site->namaweb.' | '.$site->tagline.' '.$site->tentang,
						'keywords'	=> 'Kontak '.$site->namaweb.' | '.$site->tagline.' '.$site->keywords,
						'site'		=> $site,
						'isi'		=> 'kontak/list');
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function send()
	{
		$site 		= $this->konfigurasi_model->listing();

		// Validasi input
		$this->form_validation->set_rules('name','Nama Lengkap','required',
			array(	'required'	=> '%s harus diisi'));

		// Validasi input
		$this->form_validation->set_rules('email','Email','required',
			array(	'required'	=> '%s harus diisi'));

		// Validasi input
		$this->form_validation->set_rules('subject','Subject','required',
			array(	'required'	=> '%s harus diisi'));

		// Validasi input
		$this->form_validation->set_rules('body','Isi Pesan','required',
			array(	'required'	=> '%s harus diisi'));


		if($this->form_validation->run())
		{
		$this->load->library('email');
		
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'infodcc.21@gmail.com',
			'smtp_pass' => 'admindcc',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n",
		];
		//ambil data

		
		$nama = htmlspecialchars($this->input->post('name'));
		$email = htmlspecialchars($this->input->post('email'));
		$subject = htmlspecialchars($this->input->post('subject'));
		$message = htmlspecialchars($this->input->post('body'));

		$MessageContent = ' 
    <html> 
    <head> 
        <title>Del Cloud CLub</title> 
    </head> 
    <body> 
        <h1>Feedback Email</h1> 
        <table cellspacing="0" style="border: 2px dashed #FB4314; width: 100%;"> 
            <tr> 
                <th>Name:</th><td>'. $nama .'</td> 
            </tr> 
            <tr style="background-color: #e0e0e0;"> 
                <th>Email:</th><td>'. $email .'</td> 
            </tr> 
            <tr> 
                <th>Message:</th><td>'. $message .'</td> 
            </tr> 
        </table> 
    </body> 
    </html>'; 

		$this->email->initialize($config);
		$this->email->from($email,$nama);
		$this->email->to($site->email); 
		$this->email->subject($subject);
		$this->email->message($MessageContent);
		
		//check email sccess?
		if($this->email->send()){
			$this->session->set_flashdata('sukses', 'Email anda telah dikirim , Terimakasih... :)');
			redirect(base_url('kontak'),'refresh');
		}
		else{
			echo $this->email->print_debugger();
			die;
		}
	}

	$data = array(	'title'		=> 'Kontak '.$site->namaweb.' | '.$site->tagline,
						'deskripsi'	=> 'Kontak '.$site->namaweb.' | '.$site->tagline.' '.$site->tentang,
						'keywords'	=> 'Kontak '.$site->namaweb.' | '.$site->tagline.' '.$site->keywords,
						'site'		=> $site,
						'isi'		=> 'kontak/list');
		$this->load->view('layout/wrapper', $data, FALSE);

	}


}

/* End of file Contact.php */
/* Location: ./application/controllers/Kontak.php */