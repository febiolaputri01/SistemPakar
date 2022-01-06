<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cara extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        // $this->load->model('Artikel_model');
	}

	public function index()
	{
		//load data
		$data['title']="Cara Deteksi Sistem Pakar";
		// $data['Artikel'] = $this->Artikel_model->getAll()->result();
		//load view
		$this->load->view('frontend/_partials/header', $data);
		$this->load->view('frontend/_partials/topbar');
		$this->load->view('frontend/_partials/services', $data);
		$this->load->view('frontend/_partials/footer');
	
	}
}