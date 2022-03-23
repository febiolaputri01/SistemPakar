<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
      
    }

    public function index()
    {
        //Create Log
        // save_log('view', 'artikel', 'View Datas');
        //Load
        // $data['is_active'] = 'gjl';
        $data['title'] = "Halaman Gejala | Expert System ISPA";
        $data['judulHalaman'] = "Artikel";
        $data['detailHalaman'] = "Halaman artikel adalah halaman untuk melihat, memperbaharui, menghapus dan menambah Artikel. Kemudian akan ditampilkan pada halaman user yang gunanya agar pengunjung sistem dapat mengetahui beberapa informasi penting pada sistem pakar deteksi dini Infeksi Saluran Pernafasan Akut (ISPA)";
        $data['cardHeader'] = 'List Data Gejala';
        // $data['user'] = $this->db->get_where('tb_user', ['user_email' => $this->session->userdata('email')])->row_array();
        // $data['articles'] = $this->artikel_model->getAll();
        // $data['count'] = $this->artikel_model->count();
        // $data['start'] = 0;

        //Execution
        $this->load->view('backend/_partials/header', $data);
        $this->load->view('backend/_partials/sidebar', $data);
        $this->load->view('backend/_partials/topbar', $data);
        $this->load->view('backend/data/artikel/view_artikel', $data);
        $this->load->view('backend/_partials/footer');
    }

  
   
}
