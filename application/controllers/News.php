<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('berita_model');
		$this->load->model('kategori_model');
		$this->load->model('agenda_model');
		$this->load->model('quotes_model');
	}

	// Main page
	public function index()	{
		$site 		= $this->konfigurasi_model->listing();
		$populer	= $this->berita_model->populer();
		
		// Berita dan paginasi
		$this->load->library('pagination');
		$config['base_url'] 		= base_url().'news/index/';
		$config['total_rows'] 		= count($this->berita_model->total());
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] 		= 5;
		$config['uri_segment'] 		= 3;
		$config['full_tag_open'] 	= '<ul class="pagination">';
        $config['full_tag_close'] 	= '</ul>';
        $config['first_link'] 		= '&laquo; Awal';
        $config['first_tag_open'] 	= '<li class="prev page">';
        $config['first_tag_close'] 	= '</li>';

        $config['last_link'] 		= 'Akhir &raquo;';
        $config['last_tag_open'] 	= '<li class="next page">';
        $config['last_tag_close'] 	= '</li>';

        $config['next_link'] 		= 'Selanjutnya &rarr;';
        $config['next_tag_open'] 	= '<li class="next page">';
        $config['next_tag_close'] 	= '</li>';

        $config['prev_link'] 		= '&larr; Sebelumnya';
        $config['prev_tag_open'] 	= '<li class="prev page">';
        $config['prev_tag_close'] 	= '</li>';

        $config['cur_tag_open'] 	= '<li class="active"><a href="">';
        $config['cur_tag_close'] 	= '</a></li>';

        $config['num_tag_open'] 	= '<li class="page">';
        $config['num_tag_close'] 	= '</li>';
		$config['per_page'] 		= 2;
		$config['first_url'] 		= base_url().'news/';
		$this->pagination->initialize($config); 
		$page 		= ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * $config['per_page'] : 0;
		$berita 	= $this->berita_model->berita($config['per_page'], $page);

		$data = array(	'title'		=> 'Berita - '.$site->namaweb,
						'deskripsi'	=> 'Berita - '.$site->namaweb,
						'keywords'	=> 'Berita - '.$site->namaweb,
						'pagin' 	=> $this->pagination->create_links(),
						'berita'	=> $berita,
						'site'		=> $site,
						'populer'	=> $populer,
						'isi'		=> 'berita/list',);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// Search
	public function search()
	{
		$this->load->helper('security');
		$keyword 	= xss_clean($_GET['s']);
		$keywords	= encode_php_tags($keyword);
		$populer	= $this->berita_model->populer();

		if($keywords=="") {
			redirect(base_url('news'),'refresh');
		}

		$site 		= $this->konfigurasi_model->listing();
		
		// Berita dan paginasi
		// Berita dan paginasi
		$this->load->library('pagination');
		$config['base_url'] 		= base_url().'news/search?s='.$keywords.'/index/';
		$config['total_rows'] 		= count(array($this->berita_model->total_search($keywords)));
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] 		= 5;
		$config['uri_segment'] 		= 3;
		$config['full_tag_open'] 	= '<ul class="pagination">';
        $config['full_tag_close'] 	= '</ul>';
        $config['first_link'] 		= '&laquo; Awal';
        $config['first_tag_open'] 	= '<li class="prev page">';
        $config['first_tag_close'] 	= '</li>';

        $config['last_link'] 		= 'Akhir &raquo;';
        $config['last_tag_open'] 	= '<li class="next page">';
        $config['last_tag_close'] 	= '</li>';

        $config['next_link'] 		= 'Selanjutnya &rarr;';
        $config['next_tag_open'] 	= '<li class="next page">';
        $config['next_tag_close'] 	= '</li>';

        $config['prev_link'] 		= '&larr; Sebelumnya';
        $config['prev_tag_open'] 	= '<li class="prev page">';
        $config['prev_tag_close'] 	= '</li>';

        $config['cur_tag_open'] 	= '<li class="active"><a href="">';
        $config['cur_tag_close'] 	= '</a></li>';

        $config['num_tag_open'] 	= '<li class="page">';
        $config['num_tag_close'] 	= '</li>';
		$config['per_page'] 		= 8;
		$config['first_url'] 		= base_url().'news/search?s='.$keywords;
		$this->pagination->initialize($config); 
		$page 		= ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * $config['per_page'] : 0;
		$berita 	= $this->berita_model->search($keywords,$config['per_page'], $page);

		$data = array(	'title'		=> 'Hasil pencarian: '.$keywords.' ('. count($this->berita_model->total_search($keyword)) .')',
						'deskripsi'	=> 'Berita - '.$site->namaweb,
						'keywords'	=> 'Berita - '.$site->namaweb,
						'pagin' 	=> $this->pagination->create_links(),
						'berita'	=> $berita,
						'site'		=> $site,
						'keyword'	=> $keyword,
						'total'		=> count($this->berita_model->total_search($keyword)),
						'populer'	=> $populer,
						'isi'		=> 'berita/list');
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// Category
	public function kategori($slug_kategori)	{
		$site 			= $this->konfigurasi_model->listing();
		$kategori 		= $this->kategori_model->read($slug_kategori);
		$populer	= $this->berita_model->populer();
		if(count(array($kategori)) < 1) {
			redirect(base_url('oops'),'refresh');
		}
		
		
		$id_kategori	= $kategori->id_kategori;


		// Berita dan paginasi
		$this->load->library('pagination');
		$config['base_url'] 		= base_url().'berita/kategori/'.$slug_kategori.'/index/';
		$config['total_rows'] 		= count(array($this->berita_model->all_kategori($id_kategori)));
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] 		= 5;
		$config['uri_segment'] 		= 5;
		$config['full_tag_open'] 	= '<ul class="pagination">';
        $config['full_tag_close'] 	= '</ul>';
        $config['first_link'] 		= '&laquo; Awal';
        $config['first_tag_open'] 	= '<li class="prev page">';
        $config['first_tag_close'] 	= '</li>';

        $config['last_link'] 		= 'Akhir &raquo;';
        $config['last_tag_open'] 	= '<li class="next page">';
        $config['last_tag_close'] 	= '</li>';

        $config['next_link'] 		= 'Selanjutnya &rarr;';
        $config['next_tag_open'] 	= '<li class="next page">';
        $config['next_tag_close'] 	= '</li>';

        $config['prev_link'] 		= '&larr; Sebelumnya';
        $config['prev_tag_open'] 	= '<li class="prev page">';
        $config['prev_tag_close'] 	= '</li>';

        $config['cur_tag_open'] 	= '<li class="active"><a href="">';
        $config['cur_tag_close'] 	= '</a></li>';

        $config['num_tag_open'] 	= '<li class="page">';
        $config['num_tag_close'] 	= '</li>';
		$config['per_page'] 		= 10;
		$config['first_url'] 		= base_url().'berita/kategori/'.$slug_kategori.'/';
		$this->pagination->initialize($config); 
		$page 		= ($this->uri->segment(5)) ? ($this->uri->segment(5) - 1) * $config['per_page'] : 0;
		$berita 	= $this->berita_model->kategori($id_kategori,$config['per_page'], $page);

		$data = array(	'title'		=> 'Kategori berita: '.$kategori->nama_kategori,
						'deskripsi'	=> 'Kategori berita: '.$kategori->nama_kategori,
						'keywords'	=> 'Kategori berita: '.$kategori->nama_kategori,
						'berita'	=> $berita,
						'pagin' 	=> $this->pagination->create_links(),
						'site'		=> $site,
						'populer'	=> $populer,
						'isi'		=> 'berita/list');
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// Read berita detail
	public function read($slug_berita)	{
		$site 		= $this->konfigurasi_model->listing();
		$berita 	= $this->berita_model->read($slug_berita);
		$listing 	= $this->berita_model->listing_read();
		$kategori 	= $this->nav_model->nav_berita();

		if(count(array($berita)) < 1) {
			redirect(base_url('oops'),'refresh');
		}

		// Update hit
		if($berita) {
			$newhits 	= $berita->hits + 1;
			$hit 		= array(	'id_berita'	=> $berita->id_berita,
									'hits'		=> $newhits);
			$this->berita_model->update_hit($hit);
		}
		//  End update hit

		$data = array(	'title'		=> $berita->judul_berita,
						'deskripsi'	=> $berita->judul_berita,
						'keywords'	=> $berita->judul_berita,
						'berita'	=> $berita,
						'listing'	=> $listing,
						'kategori'	=> $kategori,
						'site'		=> $site,
						'isi'		=> 'berita/read');
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// Profil berita detail
	public function profil($slug_berita)	{
		$site 		= $this->konfigurasi_model->listing();
		$berita 	= $this->berita_model->read($slug_berita);
		$profil 	= $this->nav_model->nav_profil();
		$agenda 	= $this->agenda_model->data_agenda2('Internal');
		$nav_layanan = $this->nav_model->nav_layanan();
		$quotes		= $this->quotes_model->listing();

		if(count(array($berita)) < 1) {
			redirect(base_url('oops'),'refresh');
		}

		$listing 	= $this->berita_model->listing_profil();

		// Update hit
		if($berita) {
			$newhits = $berita->hits + 1;
			$hit = array(	'id_berita'	=> $berita->id_berita,
							'hits'		=> $newhits);
			$this->berita_model->update_hit($hit);
		}
		//  End update hit

		$data = array(	'title'		=> $berita->judul_berita,
						'deskripsi'	=> $berita->judul_berita,
						'keywords'	=> $berita->judul_berita,
						'berita'	=> $berita,
						'site'		=> $site,
						'listing'	=> $profil,
						'agenda'	=> $agenda,
						'nav_layanan'	=> $nav_layanan,
						'isi'		=> 'berita/profil',
						'quotes'	=> $quotes,);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// Profil berita detail
	public function timeline($slug_berita)	{
		$site 		= $this->konfigurasi_model->listing();
		$berita 	= $this->berita_model->read($slug_berita);
		$profil 	= $this->nav_model->nav_layanan();

		if(count(array($berita)) < 1) {
			redirect(base_url('oops'),'refresh');
		}

		$listing 	= $this->berita_model->listing_layanan();

		// Update hit
		if($berita) {
			$newhits = $berita->hits + 1;
			$hit = array(	'id_berita'	=> $berita->id_berita,
							'hits'		=> $newhits);
			$this->berita_model->update_hit($hit);
		}
		//  End update hit

		$data = array(	'title'		=> $berita->judul_berita,
						'deskripsi'	=> $berita->judul_berita,
						'keywords'	=> $berita->judul_berita,
						'berita'	=> $berita,
						'site'		=> $site,
						'listing'	=> $profil,
						'isi'		=> 'berita/layanan');
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Berita.php */
/* Location: ./application/controllers/Berita.php */