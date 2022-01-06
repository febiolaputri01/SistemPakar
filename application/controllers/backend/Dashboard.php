<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
		//load data
		$data['title']=" Dashboard";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		//load view
		$this->load->view('backend/_partials/header', $data);
		$this->load->view('backend/_partials/sidebar');
		$this->load->view('backend/_partials/topbar');
		$this->load->view('backend/dashboard/dashboard');
		$this->load->view('backend/_partials/footer');
		
	}
}