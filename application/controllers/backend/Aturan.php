<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aturan extends CI_Controller {

    function __construct(){
        parent::__construct();      
        $this->load->model('evidence_model');
        $this->load->helper('url');
             

              }
       

	public function index()
	{

        $data['title'] = "Data ATURAN | Expert System ISPA";
        $data['judulHalaman'] = "Data ATURAN";
        $data['detailHalaman'] = "Halaman ATURAN merupakan halaman dimana Administrator dapat melihat data aturan yang diperoleh dari fakta yang ada menggunakan metode Forward chaining.";
        $data['cardHeader'] = 'List Data ATURAN';
        $data['aturan'] = $this->evidence_model->getAll();
        $data['user'] = $this->db->get_where('tb_user', ['user_email' => $this->session->userdata('email')])->row_array();

        //executions
        $this->load->view('backend/_partials/header', $data);
        $this->load->view('backend/_partials/sidebar', $data);
        $this->load->view('backend/_partials/topbar', $data);
        $this->load->view('backend/data/aturan/list-aturan', $data);
        $this->load->view('backend/_partials/footer');
    
	}
   
}
