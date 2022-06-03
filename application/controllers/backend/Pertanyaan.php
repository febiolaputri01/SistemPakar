<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pertanyaan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pertanyaan_model');
        $this->load->model('gejala_model');
        $this->load->library('form_validation');
       // isLoggedIn();
    }

    public function index()
    {
        //Create Log
        //save_log('view', 'pertanyaan', 'View Datas');
        //Load
       //$data['is_active'] = 'prt';
        $data['title'] = "Data Pertanyaan | Expert System Buah Naga";
        $data['judulHalaman'] = "Data Pertanyaan";
        $data['detailHalaman'] = "Halaman Data Pertanyaan merupakan halaman dimana Administrator dapat menambahkan, mengurangi atau memperbaharui data Pertanyaan. Halaman ini hanya dapat diakses oleh user dengan level admin. Halaman ini berisi soal dan pilihan jawaban yang diinputkan oleh admin.";
        $data['cardHeader'] = 'List Data Pertanyaan';
        $data['user'] = $this->db->get_where('tb_user', ['user_email' => $this->session->userdata('email')])->row_array();
        $data['start'] = 0;
        $data['count'] = $this->pertanyaan_model->count();
        $data['pertanyaan'] = $this->pertanyaan_model->getAll();

        //Execution
        $this->load->view('backend/_partials/header', $data);
        $this->load->view('backend/_partials/sidebar', $data);
        $this->load->view('backend/_partials/topbar', $data);
        $this->load->view('backend/data/pertanyaan/list-pertanyaan', $data);
        $this->load->view('backend/_partials/footer');
    }

    public function create()
    {
        //Create Log
      //  save_log('create', 'pertanyaan', 'Create Data');
        //Load
        //$data['is_active'] = 'prt';
        $data['title'] = "Tambah Pertanyaan Baru | Expert System ISPA";
        $data['judulHalaman'] = "Tambah Pertanyaan Baru";
        $data['detailHalaman'] = "Halaman ini digunakan admin untuk menambahkan Pertanyaan baru ke dalam sistem";
        $data['cardHeader'] = 'Form Tambah Pertanyaan Baru';
        $data['user'] = $this->db->get_where('tb_user', ['user_email' => $this->session->userdata('email')])->row_array();
        $data['gejalas'] = $this->gejala_model->getAll();
        $data['pertanyaan'] = $this->pertanyaan_model->getAll();
        $data['start'] = 0;

        //Rules
        $this->form_validation->set_rules('pertanyaan1', 'Pertanyaan1', 'required|trim', [
            'required' => 'Pertanyaan tidak boleh kosong!'
        ]);

        //Execution
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/_partials/header', $data);
            $this->load->view('backend/_partials/sidebar', $data);
            $this->load->view('backend/_partials/topbar', $data);
            $this->load->view('backend/data/pertanyaan/add-pertanyaan', $data);
            $this->load->view('backend/_partials/footer');
        } else {
            $data = [
                'id_gejala_pertanyaan' => $this->input->post('gejala'),
                'pertanyaan' => $this->input->post('pertanyaan1'),
                'jawaban_1' => $this->input->post('jawaban1'),
                'jawaban_2' => $this->input->post('jawaban2'),
                'jawaban_3' => $this->input->post('jawaban3'),
                'jawaban_4' => $this->input->post('jawaban4'),
                'jawaban_5' => $this->input->post('jawaban5'),
                'jawaban_6' => $this->input->post('jawaban6')
            ];
            $this->pertanyaan_model->inputData($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan</div>');
            redirect('data-pertanyaan');
        }
    }

    public function delete($pertanyaan_id)
    {
        //Create Log
        save_log('delete', 'pertanyaan', 'Delete Data');
        //Load
        $where = array('pertanyaan_id' => $pertanyaan_id);

        //Execution
        $this->pertanyaan_model->deleteData($where);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus</div>');
        redirect('data-pertanyaan');
    }
}
