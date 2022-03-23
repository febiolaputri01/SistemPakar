<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		 $this->load->model('log_model');
	}

	public function index()
	{
		//load data
		$data['is_active'] = 'dsh';
		$data['title']=" Dashboard Admin";
		$data['user'] = $this->db->get_where('tb_user', ['user_email' => $this->session->userdata('email')])->row_array();
        $data['logs'] = $this->log_model->getNewestLogBackend();
        $data['count'] = $this->log_model->countLogBackend();
        $data['start'] = 0;

		//load view
		$this->load->view('backend/_partials/header', $data);
		$this->load->view('backend/_partials/sidebar', $data);
		$this->load->view('backend/_partials/topbar', $data);
		$this->load->view('backend/dashboard/dashboard', $data);
		$this->load->view('backend/_partials/footer');
		
	}
}