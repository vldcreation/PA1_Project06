<?php defined('BASEPATH') OR exit('No direct script access allowed');

// Load kunjungan
$alsite 			= current_url();
$alamat_kunjungan 	= str_replace('index.php/','',$alsite);
$this->kunjungan->counter($alamat_kunjungan);
if($this->session->userdata()==""){
    redirect(base_url('login'));
}

require_once('head.php');
require_once('header.php');
require_once('menu.php');
require_once('konten.php');
require_once('footer.php');