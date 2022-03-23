<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
         $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Login | Expert System Ispa";
        // $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Username Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password Tidak Boleh Kosong!'
        ]);

        if ($this->form_validation->run() == FALSE) {
           $this->load->view('backend/auth/templates/auth_header', $data);
           $this->load->view('backend/auth/login',$data);
           $this->load->view('backend/auth/templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        //Load
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->db->get_where('tb_user', ['user_username' => $username])->row_array();

        //Execution
        //Cek User
        if ($user) {
            //Cek Password
            if (password_verify($password, $user['user_password'])) {
                $data = [
                    'username' => $user['user_username'],
                    'email' => $user['user_email'],
                    'user_id' => $user['user_id'],
                    'name' => $user['user_name'],
                    'level' => $user['user_level']
                ];
                $this->session->set_userdata($data);
                redirect('backend/dashboard');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Login Gagal, Silahkan Coba Lagi</div>');
                redirect('admin');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Login Gagal, Silahkan Coba Lagi</div>');
            redirect('admin');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('level');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Sudah Logout</div>');
        redirect('admin');
    }
}
