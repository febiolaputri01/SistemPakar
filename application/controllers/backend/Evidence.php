<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Evidence extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('evidence_model');
        $this->load->model('gejala_model');
        $this->load->model('penyakit_model');
        $this->load->library('form_validation');
       // isLoggedIn();
    }

    public function index()
    {
        //Create Log
       // save_log('view', 'hipotesa', 'View Datas');
        //Load
      //  $data['is_active'] = 'prb';
        $data['title'] = "Data Nilai CF PAKAR | Expert System ISPA";
        $data['judulHalaman'] = "Data Nilai CF PAKAR";
        $data['detailHalaman'] = "Halaman Data Nilai CF Pakar merupakan halaman dimana Administrator dapat menambahkan, mengurangi atau memperbaharui data Nilai CF.";
         $data['cardHeader'] = 'List Data Nilai CF PAKAR';
        $data['user'] = $this->db->get_where('tb_user', ['user_email' => $this->session->userdata('email')])->row_array();
        $data['cfp'] = $this->evidence_model->getAll();
        $data['count'] = $this->evidence_model->count();
        $data['start'] = 0;

        //Execution
        $this->load->view('backend/_partials/header', $data);
        $this->load->view('backend/_partials/sidebar', $data);
        $this->load->view('backend/_partials/topbar', $data);
        $this->load->view('backend/data/cfpakar/list-cf', $data);
        $this->load->view('backend/_partials/footer');
    }

    public function create()
    {
        //Create Log
        //save_log('create', 'hipotesa', 'Create Data');
        //Load
        //$data['is_active'] = 'prb';
        $data['title'] = "Tambah Hipotesa Baru | Expert System Buah Naga";
        $data['judulHalaman'] = "Tambah Nilai Hipotesa Baru";
        $data['detailHalaman'] = "Halaman ini digunakan admin untuk menambahkan nilai Hipotesa baru ke dalam sistem";
        $data['cardHeader'] = 'Form Tambah Nilai Hipotesa Baru';
        $data['user'] = $this->db->get_where('tb_user', ['user_email' => $this->session->userdata('email')])->row_array();
        $data['count'] = $this->evidence_model->count();
        $data['evidence'] = $this->evidence_model->getSemua();
        $data['penyakits'] = $this->penyakit_model->getAll();
        $data['gejalas'] = $this->gejala_model->getAll();
        $data['start'] = 0;

        //Rules
        $this->form_validation->set_rules('cfnilai', 'cfnilai', 'required|trim', [
            'required' => 'Nilai Hipotesa tidak boleh kosong!'
        ]);

        //Execution
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/_partials/header', $data);
            $this->load->view('backend/_partials/sidebar', $data);
            $this->load->view('backend/_partials/topbar', $data);
            $this->load->view('backend/data/cfpakar/add-cf', $data);
            $this->load->view('backend/_partials/footer');
        } else {
            $data = [
                'evidence_penyakit_id' => $this->input->post('penyakit'),
                'evidence_gejala_id' => $this->input->post('gejala'),
                'evidence_kode' => $this->input->post('kd1') . $this->input->post('kd2'),
                'evidence_nilai' => $this->input->post('cfnilai')
            ];
            $this->evidence_model->inputData($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan</div>');
            redirect('cfpakar');
        }
    }

    public function update($evidence_id)
    {
        //Create Log
      //  save_log('update', 'hipotesa', 'Update Data');
        //Load
        $where = array('evidence_id' => $evidence_id);
        //$data['is_active'] = 'prb';
        $data['title'] = "Edit Nilai CF| Expert System ISPA";
        $data['judulHalaman'] = "Edit Data Nilai Hipotesa";
        $data['detailHalaman'] = "Halaman ini digunakan admin untuk memperbaharui data - data CF PAKAR";
        $data['cardHeader'] = 'Form Edit Nilai Hipotesa';
        $data['user'] = $this->db->get_where('tb_user', ['user_email' => $this->session->userdata('email')])->row_array();
        $data['cfdata'] = $this->evidence_model->getById($where);
        $data['penyakits'] = $this->penyakit_model->getAll();
        $data['gejalas'] = $this->gejala_model->getAll();
        $data['start'] = 0;

        //Rules
        $this->form_validation->set_rules('cfnilai', 'cfnilai', 'required|trim', [
            'required' => 'Nilai CF tidak boleh kosong!'
        ]);

        //Execution
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/_partials/header', $data);
            $this->load->view('backend/_partials/sidebar', $data);
            $this->load->view('backend/_partials/topbar', $data);
            $this->load->view('backend/data/cfpakar/edit-cf', $data);
            $this->load->view('backend/_partials/footer');
        } else {
            $data = [
                'evidence_penyakit_id' => $this->input->post('penyakit'),
                'evidence_gejala_id' => $this->input->post('gejala'),
                'evidence_nilai' => $this->input->post('cfnilai')
            ];
            $this->evidence_model->updateData($where, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diperbaharui</div>');
            redirect('cfpakar');
        }
    }

    public function export()
    {
        //Create Log
        save_log('download', 'hipotesa', 'Download Data');
        //Execution
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Gejala');
        $sheet->setCellValue('C1', 'Penyebab');
        $sheet->setCellValue('D1', 'Nilai Hipotesa (Keyakinan Pakar)');

        $data = $this->evidence_model->getAll();
        $no = 1;
        $x = 2;
        foreach ($data as $row) {
            $sheet->setCellValue('A' . $x, $no++);
            $sheet->setCellValue('B' . $x, $row['gejala_nama']);
            $sheet->setCellValue('C' . $x, $row['hamapenyakit_nama']);
            $sheet->setCellValue('D' . $x, $row['evidence_nilai']);
            $x++;
        }
        $writer = new Xlsx($spreadsheet);
        $filename = 'Data Probabilitas';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function delete($evidence_id)
    {
        //Create Log`
       // save_log('delete', 'hipotesa', 'Delete Data');
        //Load
        $where = array('evidence_id' => $evidence_id);

        //Execution
        $this->evidence_model->deleteData($where);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus</div>');
        redirect('cfpakar');
    }

    public function clear()
    {
        //Create Log
        //save_log('clear', 'hipotesa', 'Clear Data');
        //Execution
        $this->evidence_model->truncate();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tabel berhasil di kosongkan</div>');
        redirect('cfpakar');
    }
}
