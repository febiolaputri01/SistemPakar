<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('artikel_model');
    }

    public function index()
    {
        //Create Log
        // save_log('view', 'artikel', 'View Datas');
        //Load
        $data['is_active'] = 'art';
        $data['title'] = "Halaman Artikel | Expert System Buah Naga";
        $data['judulHalaman'] = "Artikel";
        $data['detailHalaman'] = "Halaman artikel adalah halaman untuk melihat, memperbaharui, menghapus dan menambah Artikel. Kemudian akan ditampilkan pada halaman user yang gunanya agar pengunjung sistem dapat mengetahui beberapa informasi penting pada sistem pakar deteksi dini Infeksi Saluran Pernafasan Akut (ISPA)";
        $data['cardHeader'] = 'List Data Artikel';
        $data['user'] = $this->db->get_where('tb_user', ['user_email' => $this->session->userdata('email')])->row_array();
        $data['articles'] = $this->artikel_model->getAll();
        $data['count'] = $this->artikel_model->count();
        $data['start'] = 0;

        //Execution
        $this->load->view('backend/_partials/header', $data);
        $this->load->view('backend/_partials/sidebar', $data);
        $this->load->view('backend/_partials/topbar', $data);
        $this->load->view('backend/data/artikel/view_artikel', $data);
        $this->load->view('backend/_partials/footer');
    }

    public function create()
    {
        //Create Log
        save_log('create', 'artikel', 'Create Data');
        //Load
        $data['is_active'] = 'art';
        $data['title'] = "Tambah Artikel Baru | Expert System Buah Naga";
        $data['judulHalaman'] = "Tambah Artikel Baru";
        $data['detailHalaman'] = "Halaman ini digunakan admin untuk menambahkan data Artikel baru ke dalam sistem";
        $data['cardHeader'] = 'Form Tambah Artikel Baru';
        $data['user'] = $this->db->get_where('tb_user', ['user_email' => $this->session->userdata('email')])->row_array();
        $data['start'] = 0;

        //Rules
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim', [
            'required' => 'Judul tidak boleh kosong!'
        ]);

        //Execution
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/_partials/head', $data);
            $this->load->view('backend/_partials/sidebar', $data);
            $this->load->view('backend/_partials/topbar', $data);
            $this->load->view('backend/data/artikel/add-artikel', $data);
            $this->load->view('backend/_partials/foot');
        } else {
            //Config upload
            $config['upload_path'] = './assets/images/artikel-image/'; //path folder upload
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //tipe yang dapat diupload
            $config['encrypt_name'] = TRUE; //enkripsi nama file ketika diupload

            //Execution upload
            $this->upload->initialize($config);

            //cek inputan
            if (!empty($_FILES['image']['name'])) {
                //cek berhasil
                if ($this->upload->do_upload('image')) {
                    //inisiasi
                    $gbr = $this->upload->data();
                    //config kompresi file
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/images/artikel-image/' . $gbr['file_name']; //source gambar yang akan dikompresi
                    $config['create_thumb'] = FALSE; //thumbnail
                    $config['maintain_ratio'] = FALSE; //ratio gambar
                    $config['quality'] = '80%'; //kualitas kompresi
                    $config['width'] = 710; //menentukan lebar
                    $config['height'] = 420; //menentukan tinggi
                    $config['new_image'] = './assets/images/artikel_image/' . $gbr['file_name']; //gambar hasil kompresi
                    //eksekusi kompresi
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    //tampung data yang akan diinput ke db
                    $image = $gbr['file_name']; //nama file yang terupload dan sudah dienkripsi
                    $judul = $this->input->post('judul'); //input judul
                    //buat slug url
                    $string = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $judul); //filter karakter unik dan replace dengan kosong ('')
                    $trim = trim($string); //menghilangkan spasi berlebih
                    $pre_slug = strtolower(str_replace(" ", "-", $trim)); //menghilangkan spasi kemudian mengganti dengan (-)
                    $slug = $pre_slug . '.html'; //slug yang akan disimpan ke database
                    //data yang akan diinput ke database
                    $data = [
                        'artikel_user_id' => $this->session->userdata('user_id'),
                        'artikel_judul' => $judul,
                        'artikel_slug' => $slug,
                        'artikel_img' => $image,
                        'artikel_excerpt' => $this->input->post('excerpt'),
                        'artikel_body' => $this->input->post('body'),
                        'artikel_create' => time(),
                        'artikel_update' => 0
                    ];
                    $this->artikel_model->inputData($data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Artikel berhasil ditambahkan</div>');
                    redirect('data-artikel');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gambar Gagal di upload</div>');
                    redirect('add-artikel');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Perhatikan gambar yang diupload</div>');
                redirect('add-artikel');
            }
        }
    }

    public function read($artikel_slug)
    {
        //Create Log
        save_log('read', 'artikel', 'Read Data');
        //Load
        $where = array('a.artikel_slug' => $artikel_slug);
        $artikel = $this->artikel_model->viewBySlug($where);
        $data['is_active'] = 'art';
        $data['title'] = $artikel['artikel_judul'] . " | Expert System Buah Naga";
        $data['artikeldata'] = $artikel;
        $data['user'] = $this->db->get_where('tb_user', ['user_email' => $this->session->userdata('email')])->row_array();

        //Execution
        $this->load->view('backend/_partials/head', $data);
        $this->load->view('backend/_partials/sidebar', $data);
        $this->load->view('backend/_partials/topbar', $data);
        $this->load->view('backend/data/artikel/view-artikel', $data);
        $this->load->view('backend/_partials/foot');
    }

    public function update($artikel_slug)
    {
        //Create Log
        save_log('update', 'artikel', 'Update Data');
        //Load
        $where = array('artikel_slug' => $artikel_slug);
        $artikel = $this->artikel_model->getBySlug($where);
        $data['is_active'] = 'art';
        $data['title'] = "Edit Detail Artikel | Expert System Buah Naga";
        $data['judulHalaman'] = "Edit Data Artikel";
        $data['detailHalaman'] = "Halaman ini digunakan admin untuk memperbaharui data Artikel dalam sistem";
        $data['cardHeader'] = 'Form Edit Artikel';
        $data['user'] = $this->db->get_where('tb_user', ['user_email' => $this->session->userdata('email')])->row_array();
        $data['artikeldata'] = $artikel;
        $data['start'] = 0;

        //Rules
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim', [
            'required' => 'Judul tidak boleh kosong!'
        ]);

        //Execution
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/_partials/head', $data);
            $this->load->view('backend/_partials/sidebar', $data);
            $this->load->view('backend/_partials/topbar', $data);
            $this->load->view('backend/data/artikel/edit-artikel', $data);
            $this->load->view('backend/_partials/foot');
        } else {
            //Config upload
            $config['upload_path'] = './assets/images/artikel-image/'; //path folder upload
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //tipe yang dapat diupload
            $config['encrypt_name'] = TRUE; //enkripsi nama file ketika diupload

            //Execution upload
            $this->upload->initialize($config);

            //cek inputan
            if (!empty($_FILES['image']['name'])) {
                //cek berhasil
                if ($this->upload->do_upload('image')) {
                    //hapus foto lama
                    unlink('./assets/images/artikel-image/' . $artikel['artikel_img']);
                    //inisiasi
                    $gbr = $this->upload->data();
                    //config kompresi file
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/images/artikel-image/' . $gbr['file_name']; //source gambar yang akan dikompresi
                    $config['create_thumb'] = FALSE; //thumbnail
                    $config['maintain_ratio'] = FALSE; //ratio gambar
                    $config['quality'] = '80%'; //kualitas kompresi
                    $config['width'] = 710; //menentukan lebar
                    $config['height'] = 420; //menentukan tinggi
                    $config['new_image'] = './assets/images/artikel_image/' . $gbr['file_name']; //gambar hasil kompresi
                    //eksekusi kompresi
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    //tampung data yang akan diinput ke db
                    $image = $gbr['file_name']; //nama file yang terupload dan sudah dienkripsi
                    $judul = $this->input->post('judul'); //input judul
                    //buat slug url
                    $string = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $judul); //filter karakter unik dan replace dengan kosong ('')
                    $trim = trim($string); //menghilangkan spasi berlebih
                    $pre_slug = strtolower(str_replace(" ", "-", $trim)); //menghilangkan spasi kemudian mengganti dengan (-)
                    $slug = $pre_slug . '.html'; //slug yang akan disimpan ke database
                    //data yang akan diinput ke database
                    $data = [
                        'artikel_user_id' => $this->session->userdata('user_id'),
                        'artikel_judul' => $judul,
                        'artikel_slug' => $slug,
                        'artikel_img' => $image,
                        'artikel_excerpt' => $this->input->post('excerpt'),
                        'artikel_body' => $this->input->post('body'),
                        'artikel_update' => time()
                    ];
                    $this->artikel_model->updateData($where, $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Artikel berhasil ditambahkan</div>');
                    redirect('data-artikel');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gambar Gagal di upload</div>');
                    redirect('add-artikel');
                }
            } else {
                $judul = $this->input->post('judul'); //input judul
                //buat slug url
                $string = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $judul); //filter karakter unik dan replace dengan kosong ('')
                $trim = trim($string); //menghilangkan spasi berlebih
                $pre_slug = strtolower(str_replace(" ", "-", $trim)); //menghilangkan spasi kemudian mengganti dengan (-)
                $slug = $pre_slug . '.html'; //slug yang akan disimpan ke database
                //data yang akan diinput ke database
                $data = [
                    'artikel_user_id' => $this->session->userdata('user_id'),
                    'artikel_judul' => $judul,
                    'artikel_slug' => $slug,
                    'artikel_excerpt' => $this->input->post('excerpt'),
                    'artikel_body' => $this->input->post('body'),
                    'artikel_update' => time()
                ];
                $this->artikel_model->updateData($where, $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Artikel berhasil diperbaharui</div>');
                redirect('data-artikel');
            }
        }
    }

    public function delete($artikel_id)
    {
        //Create Log
        save_log('delete', 'artikel', 'Delete Data');
        //Load
        $where = array('artikel_id' => $artikel_id);

        //Execution
        $this->artikel_model->deleteData($where);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Artikel berhasil dihapus</div>');
        redirect('data-artikel');
    }

    public function clear()
    {
        //Create Log
        save_log('clear', 'artikel', 'Clear Data');
        //Execution
        $this->artikel_model->truncate();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tabel berhasil di kosongkan</div>');
        redirect('data-artikel');
    }
}
