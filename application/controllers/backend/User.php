<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
    }

    public function index()
    {
        //Create Log
        save_log('view', 'user', 'View Datas');
        //Load
        $data['is_active'] = 'usr';
        $data['title'] = "Data User | Expert System Ispa";
        $data['judulHalaman'] = "Data User";
        $data['detailHalaman'] = "Halaman Data User merupakan halaman dimana Administrator dapat menambahkan, mengurangi atau memperbaharui data user. Halaman ini hanya dapat diakses oleh user dengan level admin.";
        $data['cardHeader'] = 'List Data User';
        $data['user'] = $this->db->get_where('tb_user', ['user_email' => $this->session->userdata('email')])->row_array();
        $data['users'] = $this->users_model->getAll();
        $data['count'] = $this->users_model->countUsers();
        $data['start'] = 0;

        //Execution
        $this->load->view('backend/_partials/header', $data);
        $this->load->view('backend/_partials/sidebar', $data);
        $this->load->view('backend/_partials/topbar', $data);
        $this->load->view('backend/data/user/list-user', $data);
        $this->load->view('backend/_partials/foot');
    }

    public function create()
    {
        //Create Log
        save_log('create', 'user', 'Create Data');
        //Load
        $data['is_active'] = 'usr';
        $data['title'] = "Tambah User Baru | Expert System Buah Naga";
        $data['judulHalaman'] = "Tambah User Baru";
        $data['detailHalaman'] = "Halaman yang digunakan admin untuk menambahkan data user baru ke dalam sistem.";
        $data['cardHeader'] = 'Form Tambah User Baru';
        $data['user'] = $this->db->get_where('tb_user', ['user_email' => $this->session->userdata('email')])->row_array();

        //Rules
        $this->form_validation->set_rules('fname', 'Nama Depan', 'required|trim', [
            'required' => 'Nama Depan tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('lname', 'Nama Belakang', 'required|trim', [
            'required' => 'Nama Belakang tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[8]|max_length[12]|is_unique[tb_user.user_username]', [
            'required' => 'Username tidak boleh kosong!',
            'min_length' => 'Panjang Password Harus Melebihi 8 Karakter',
            'max_length' => 'Panjang Password Tidak Boleh Melebihi 12 Karakter',
            'in_unique' => 'Username sudah terdaftar'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.user_email]', [
            'valid_email' => 'Email Tidak Valid',
            'required' => 'Email Tidak Boleh Kosong!',
            'in_unique' => 'Email sudah terdaftar'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[c_password]', [
            'required' => 'Password tidak boleh Kosong',
            'min_length' => 'Panjang Password harus lebih dari 8',
            'matches' => 'Password tidak sama'
        ]);
        $this->form_validation->set_rules('c_password', 'Password', 'required|trim|matches[password]', [
            'required' => 'Password tidak boleh Kosong',
            'matches' => 'Password tidak sama'
        ]);

        //Execution
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/_partials/head', $data);
            $this->load->view('backend/_partials/sidebar', $data);
            $this->load->view('backend/_partials/topbar', $data);
            $this->load->view('backend/data/user/add-user', $data);
            $this->load->view('backend/_partials/foot');
        } else {
            $lvl = $this->input->post('level');
            if ($lvl == 'Admin') {
                $img = 'admin.png';
            } elseif ($lvl == 'Paramedis') {
                $img = 'pakar.png';
            }
            $data = [
                'user_name' => htmlspecialchars($this->input->post('fname') . ' ' . $this->input->post('lname')),
                'user_username' => htmlspecialchars($this->input->post('username')),
                'user_email' => htmlspecialchars($this->input->post('email')),
                'user_password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'user_viewpassword' => htmlspecialchars($this->input->post('password')),
                'user_image' => $img,
                'user_level' => $lvl
            ];

            $this->users_model->inputData($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan</div>');
            redirect('data-user');
        }
    }

    public function update($user_id)
    {
        //Create Log
        save_log('update', 'user', 'Update Data');
        //Load
        $where = array('user_id' => $user_id);
        $data['is_active'] = 'usr';
        $data['title'] = "Edit Detail User | Expert System Buah Naga";
        $data['judulHalaman'] = "Edit Data User";
        $data['detailHalaman'] = "Halaman yang digunakan admin untuk memperbaharui data - data user yang perlu diperbaharui, seperti nama, password dan level atau hak akses";
        $data['cardHeader'] = 'Form Edit Data User';
        $data['user'] = $this->db->get_where('tb_user', ['user_email' => $this->session->userdata('email')])->row_array();
        $data['userdata'] = $this->users_model->getById($where);

        //Rules
        $this->form_validation->set_rules('name', 'Nama Depan', 'required|trim', [
            'required' => 'Nama tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]|matches[c_password]', [
            'min_length' => 'Panjang Password harus lebih dari 8',
            'matches' => 'Password tidak sama'
        ]);
        $this->form_validation->set_rules('c_password', 'Password', 'trim|matches[password]', [
            'matches' => 'Password tidak sama'
        ]);

        //Execution
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/_partials/head', $data);
            $this->load->view('backend/_partials/sidebar', $data);
            $this->load->view('backend/_partials/topbar', $data);
            $this->load->view('backend/data/user/edit-user', $data);
            $this->load->view('backend/_partials/foot');
        } else {
            $pw = $this->input->post('password');
            if ($pw != null) {
                $data = [
                    'user_name' => htmlspecialchars($this->input->post('name')),
                    'user_password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'user_viewpassword' => htmlspecialchars($this->input->post('password')),
                    'user_level' => $this->input->post('level')
                ];
            } else {
                $data = [
                    'user_name' => htmlspecialchars($this->input->post('name')),
                    'user_level' => $this->input->post('level')
                ];
            }
            $this->users_model->updateData($where, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diperbaharui</div>');
            redirect('data-user');
        }
    }

    public function delete($user_id)
    {
        //Create Log
        save_log('delete', 'user', 'Delete Data');
        //Load
        $where = array('user_id' => $user_id);

        //Execution
        $this->users_model->deleteData($where);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus</div>');
        redirect('data-user');
    }

    public function api()
    {
        $this->users_model->jumlah_perbulan();
    }

    public function clear()
    {
        //Create Log
        save_log('clear', 'user', 'Clear Data');
        //Execution
        $this->user_model->truncate();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tabel berhasil di kosongkan</div>');
        redirect($_SERVER['HTTP_REFERER']);
    }
}
