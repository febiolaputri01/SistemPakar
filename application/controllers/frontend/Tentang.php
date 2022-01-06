 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        
	}

	public function index()
	{
		//load data
		$data['title']="Cara Deteksi Sistem Pakar";
		
		//load view
		$this->load->view('frontend/_partials/header', $data);
		$this->load->view('frontend/_partials/topbar');
		$this->load->view('frontend/_partials/doctors', $data);
		$this->load->view('frontend/_partials/footer');
	
	}
}