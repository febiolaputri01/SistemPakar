<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
		//load data
		$data['title']="Home Sistem Pakar";

		//load view
		$this->load->view('frontend/_partials/header', $data);
		$this->load->view('frontend/_partials/topbar');
		$this->load->view('frontend/_partials/hero');
		$this->load->view('frontend/_partials/features');
		$this->load->view('frontend/_partials/footer');
		
	}
}