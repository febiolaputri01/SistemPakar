<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('artikel_model');
	}

	public function index()
	{
		$data['title'] = "Semua Artikel";
		$data['artikel'] = $this->artikel_model->getAll();

		$this->load->view('frontend/_partials/header', $data);
		$this->load->view('frontend/_partials/topbar', $data);
		$this->load->view('frontend/_partials/client', $data);
		$this->load->view('frontend/_partials/artikel', $data);
		$this->load->view('frontend/_partials/footer');
	}

	// public function article_read($id)
	// {

	// 	$data['title'] = "Baca Artikel";
	// 	$data['artikel'] = $this->db->where('id_artikel', $id)->get('tb_artikel')->row_array();;
	// 	$data['artikel_lainnya'] = $this->Artikel_model->getRandom();

	// 	$this->load->view('frontend/_partials/header', $data);
	// 	$this->load->view('frontend/_partials/topbar', $data);
	// 	$this->load->view('frontend/_partials/clients', $data);
	// 	$this->load->view('frontend/articles_read', $data);
	// 	$this->load->view('frontend/_partials/footer');
	// }
}
