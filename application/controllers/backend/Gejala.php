<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gejala extends CI_Controller {
public function __construct()
    {
       
        parent::__construct();
         $this->load->model('gejala_model');
         $this->load->library('form_validation');
         $this->load->library('upload');         
}
    public function index()
    {
      //Create Log
      //save_log('view', 'gejala', 'View Datas'); //menyimpan kunjungan data artikel dari admin atau pakar ke tb log
      //Load
      //$data['is_active'] = 'gjl';
        $data['title'] = "Data Gejala | Expert System ISPA";
        $data['judulHalaman'] = "Data Gejala";
        $data['detailHalaman'] = "Halaman Data Gejala merupakan halaman dimana Administrator dapat menambahkan, mengurangi atau memperbaharui data Gejala. Halaman ini hanya dapat diakses oleh user dengan level admin. Halaman ini berisi data gejala - gejala yang terjadi pada pasien yang teridentifikasi penyakit ISPA"   ;
        $data['cardHeader'] = "List Data Gejala";
        $data['user'] = $this->db->get_where('tb_user', ['user_email' => $this->session->userdata('email')])->row_array(); //ambil data user sesuai dengan user yang login
        $data['gejala'] = $this->gejala_model->getAll();
        $data['count'] = $this->gejala_model->count();
        $data['start'] = 0;

        //Execution

        $this->load->view('backend/_partials/header', $data);
        $this->load->view('backend/_partials/sidebar', $data);
        $this->load->view('backend/_partials/topbar', $data);
        $this->load->view('backend/data/gejala/list-gejala', $data);
        $this->load->view('backend/_partials/footer');
  
    }

    public function create()
    {
        //Create Log
      //  save_log('create', 'gejala', 'Create Data'); //menyimpan kegiatan penambahan data artikel dari admin atau pakar ke tb log
        //Load
       // $data['is_active'] = 'gjl';
        $data['title'] = "Tambah Gejala Baru | Expert System Buah Naga";
        $data['judulHalaman'] = "Tambah Gejala Baru";
        $data['detailHalaman'] = "Halaman ini digunakan admin untuk menambahkan data gejala baru ke dalam sistem";
        $data['cardHeader'] = 'Form Tambah Gejala Baru';
        $data['user'] = $this->db->get_where('tb_user', ['user_email' => $this->session->userdata('email')])->row_array(); //ambil data user sesuai dengan user yang login
        $data['count'] = $this->gejala_model->count();
        $data['start'] = 0;

        //Rules
        $this->form_validation->set_rules('nama_gj', 'Gejala', 'required|trim', [
            'required' => 'Gejala tidak boleh kosong!'
        ]);

        //Execution
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/_partials/header', $data);
            $this->load->view('backend/_partials/sidebar', $data);
            $this->load->view('backend/_partials/topbar', $data);
            $this->load->view('backend/data/gejala/add-gejala', $data);
            $this->load->view('backend/_partials/footer');
        } else {
            //Config upload
            $config['upload_path'] = './assets/admin/img/img-gejala/'; //path folder upload
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
                    $config['source_image'] = './assets/admin/img/img-gejala/' . $gbr['file_name']; //source gambar yang akan dikompresi
                    $config['create_thumb'] = FALSE; //thumbnail
                    $config['maintain_ratio'] = FALSE; //ratio gambar
                    $config['quality'] = '80%'; //kualitas kompresi
                    $config['width'] = 1366; //menentukan lebar
                    $config['height'] = 720; //menentukan tinggi
                    $config['new_image'] = './assets/admin/img/img-gejala/' . $gbr['file_name']; //gambar hasil kompresi
                    //eksekusi kompresi
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    //tampung data yang akan diinput ke db
                    $image = $gbr['file_name']; //nama file yang terupload dan sudah dienkripsi
                    //data yang akan diinput ke database
                    $data = [
                        'kode_gejala' => $this->input->post('kd1') . $this->input->post('kd2'),
                        'nama_gejala' => $this->input->post('nama_gj'),
                        'image_gejala' => $image
                    ];
                    $this->gejala_model->inputData($data); //Simpan ke tb gejala di database
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success" role="alert">Data berhasil ditambahkan</div>'
                    );
                    redirect('gejala');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gambar Gagal di upload</div>');
                    redirect('add-gejala');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Perhatikan gambar yang diupload</div>');
                redirect('add-gejala');
            }
        }
    }


    public function update($id_gejala)
    {
        //Create Log
      //  save_log('update', 'gejala', 'Update Data'); //menyimpan kegiatan update data artikel dari admin atau pakar ke tb log
        //Load
        $where = array('id_gejala' => $id_gejala);
        $gejala = $this->gejala_model->getById($where);
        $data['is_active'] = 'gjl';
        $data['title'] = "Edit Detail Gejala | Expert System Buah Naga";
        $data['judulHalaman'] = "Edit Data Gejala";
        $data['detailHalaman'] = "Halaman ini digunakan admin untuk memperbaharui data - data gejala yang perlu diperbaharui, seperti nama dan gambar gejala";
        $data['cardHeader'] = 'Form Edit Gejala';
        $data['user'] = $this->db->get_where('tb_user', ['user_email' => $this->session->userdata('email')])->row_array(); //ambil data user sesuai dengan user yang login
        $data['gejaladata'] = $gejala;

        //Rules
        $this->form_validation->set_rules('nama_gj', 'Gejala', 'required|trim', [
            'required' => 'Gejala tidak boleh kosong!'
        ]);

        //Execution
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/_partials/header', $data);
            $this->load->view('backend/_partials/sidebar', $data);
            $this->load->view('backend/_partials/topbar', $data);
            $this->load->view('backend/data/gejala/edit-gejala', $data);
            $this->load->view('backend/_partials/footer');
        } else {
            //Config upload
            $config['upload_path'] = './assets/admin/img/img-gejala/'; //path folder upload
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //tipe yang dapat diupload
            $config['encrypt_name'] = TRUE; //enkripsi nama file ketika diupload

            //Execution upload
            $this->upload->initialize($config);

            //cek inputan
            if (!empty($_FILES['image']['name'])) {
                //cek berhasil
                if ($this->upload->do_upload('image')) {
                    //hapus foto lama
                    unlink('./assets/admin/img/img-gejala/' . $gejala['image_gejala']);
                    //inisiasi
                    $gbr = $this->upload->data();
                    //config kompresi file
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/admin/img/img-gejala/' . $gbr['file_name']; //source gambar yang akan dikompresi
                    $config['create_thumb'] = FALSE; //thumbnail
                    $config['maintain_ratio'] = FALSE; //ratio gambar
                    $config['quality'] = '80%'; //kualitas kompresi
                    $config['width'] = 1366; //menentukan lebar
                    $config['height'] = 720; //menentukan tinggi
                    $config['new_image'] = './assets/admin/img/img-gejala/' . $gbr['file_name']; //gambar hasil kompresi
                    //eksekusi kompresi
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    //tampung data yang akan diinput ke db
                    $image = $gbr['file_name']; //nama file yang terupload dan sudah dienkripsi
                    //data yang akan diinput ke database
                    $data = [
                        'nama_gejala' => $this->input->post('nama_gj'),
                        'image_gejala' => $image
                    ];
                    //Simpan data update ke id sesuai $where, dengan data sesuai $data
                    $this->gejala_model->updateData(
                        $where,
                        $data
                    );
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diperbaharui</div>');
                    redirect('gejala');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gambar Gagal di upload</div>');
                    redirect('add-gejala');
                }
            } else {
                //Jika gambar tidak diganti
                //data yang akan diinput ke database
                $data = [
                    'nama_gejala' => $this->input->post('nama_gj'),
                ];
                $this->gejala_model->updateData($where, $data); //pilih data yang id sesuai dengan $where, dan di update sesuai dengan $data
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diperbaharui</div>');
                redirect('gejala');
            }
        }
    }


    public function delete($id_gejala)
    {
        //Create Log
       // save_log('delete', 'gejala', 'Delete Data');
        //Load
        $where = array('id_gejala' => $id_gejala);

        //Execution
        $this->gejala_model->deleteData($where);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus</div>');
        redirect('gejala');
    }
}

/* End of file Gejala.php */
/* Location: ./application/controllers/backend/Gejala.php */