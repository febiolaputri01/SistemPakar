<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deteksi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
		//$data['is_active'] = 'knsl';
        $data['title'] = "Deteksi | Expert System ISPA";
        $data['header'] = "DATA DIRI";
        $data['detail'] = "Halaman ini merupakan halaman untuk mengisikan data diri anda sebelum melakukan Deteksi Dini penyakit ISPA(Infeksi Saluran Pernafasan Akut)";

        $this->load->view('frontend/_partials/header', $data);
        $this->load->view('frontend/_partials/topbar', $data);
        $this->load->view('frontend/deteksi/pasien-data', $data);
        $this->load->view('frontend/_partials/footer', $data);
	}

}

/* End of file Deteksi.php */
/* Location: ./application/controllers/frontend/Deteksi.php */