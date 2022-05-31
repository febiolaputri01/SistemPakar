<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyakit extends CI_Controller {

 public function __construct()
    {
        parent::__construct();
        $this->load->model('penyakit_model');
        $this->load->library('form_validation');
        $this->load->library('upload');
       // isLoggedIn();
    }
	public function index()
	{
		  //Create Log
        //save_log('view', 'hama', 'View Datas');
        //Load
        //$data['is_active'] = 'hdp';
        $data['title'] = "Data Penyakit | Expert System ISPA";
        $data['judulHalaman'] = "Data Penyakit";
        $data['detailHalaman'] = "Halaman Data Penyakit merupakan halaman dimana Administrator dapat menambahkan, mengurangi atau memperbaharui data penyakit. Halaman ini hanya dapat diakses oleh user dengan level admin. Halaman ini berisi penyakit Infeksi Saluran Pernafasan Akut.";
        $data['cardHeader'] = 'List Data Penyakit';
        $data['user'] = $this->db->get_where('tb_user', ['user_email' => $this->session->userdata('email')])->row_array();
        $data['penyakit'] = $this->penyakit_model->getAll();
        $data['count'] = $this->penyakit_model->count();
        $data['start'] = 0;

        //Execution
         $this->load->view('backend/_partials/header', $data);
        $this->load->view('backend/_partials/sidebar', $data);
        $this->load->view('backend/_partials/topbar', $data);
        $this->load->view('backend/data/penyakit/list-penyakit', $data);
        $this->load->view('backend/_partials/footer');
	}

	 public function create()
    {
        //Create Log
       // save_log('create', 'penyakit', 'Create Data');
        //Load
       // $data['is_active'] = 'hdp';
        $data['title'] = "Tambah Penyakit Baru | Expert System ISPA";
        $data['judulHalaman'] = "Tambah Penyakit Baru";
        $data['detailHalaman'] = "Halaman ini digunakan admin untuk menambahkan data Penyakit ISPA baru ke dalam sistem";
        $data['cardHeader'] = 'Form Tambah Penyakit Baru';
        $data['user'] = $this->db->get_where('tb_user', ['user_email' => $this->session->userdata('email')])->row_array();
        $data['count'] = $this->penyakit_model->count();

        //Rules
        $this->form_validation->set_rules('nama', 'Nama Penyakit', 'required|trim', [
            'required' => 'Nama Penyakit tidak boleh kosong!'
        ]);

        //Execution
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/_partials/header', $data);
            $this->load->view('backend/_partials/sidebar', $data);
            $this->load->view('backend/_partials/topbar', $data);
            $this->load->view('backend/data/penyakit/add-penyakit', $data);
            $this->load->view('backend/_partials/footer');
        } else {
            //Config upload
            $config['upload_path'] = './assets/admin/img/img-penyakit/'; //path folder upload
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
                    $config['source_image'] = './assets/admin/img/img-penyakit/' . $gbr['file_name']; //source gambar yang akan dikompresi
                    $config['create_thumb'] = FALSE; //thumbnail
                    $config['maintain_ratio'] = TRUE; //ratio gambar
                    $config['quality'] = '80%'; //kualitas kompresi
                    $config['new_image'] = './assets/admin/img/img-penyakit/' . $gbr['file_name']; //gambar hasil kompresi
                    //eksekusi kompresi
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    //tampung data yang akan diinput ke db
                    $image = $gbr['file_name'];
                    $data = [
                    	'kode_penyakit'=> $this->input->post('kd1') . $this->input->post('kd2'),
                        'nama_penyakit' => $this->input->post('nama'),
                        'penyakit_image' => $image
                    ];
                    $this->penyakit_model->inputData($data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan</div>');
                    redirect('penyakit');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gambar tidak berhasil diupload</div>');
                    redirect($_SERVER['HTTP_REFERER']);
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gambar tidak ditemukan</div>');
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }

     public function updatePenyakit($id_penyakit)
    {
        //Create Log
       // save_log('update', 'penyakit', 'Update Data');
        //Load
        $where = array('id_penyakit' => $id_penyakit);
        $p = $this->penyakit_model->getById($where);
       // $data['is_active'] = 'hdp';
        $data['title'] = "Edit Detail Penyakit | Expert System ISPA";
        $data['judulHalaman'] = "Edit Data Penyakit";
        $data['detailHalaman'] = "Halaman yang digunakan admin untuk memperbaharui data - data Penyakit yang perlu diperbaharui, seperti nama dan gambar Penyakit";
        $data['cardHeader'] = 'Form Edit Penyakit';
        $data['user'] = $this->db->get_where('tb_user', ['user_email' => $this->session->userdata('email')])->row_array();
        $data['penyakitdata'] = $this->penyakit_model->getById($where);
        $data['count'] = $this->penyakit_model->count();

        //Rules
        $this->form_validation->set_rules('nama', 'Nama Penyakit', 'required|trim', [
            'required' => 'Nama Penyakit Penyakit tidak boleh kosong!'
        ]);

        //Execution
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/_partials/header', $data);
            $this->load->view('backend/_partials/sidebar', $data);
            $this->load->view('backend/_partials/topbar', $data);
            $this->load->view('backend/data/penyakit/edit-penyakit', $data);
            $this->load->view('backend/_partials/footer');
        } else {
            //Config upload
            $config['upload_path'] = './assets/admin/img/img-penyakit/'; //path folder upload
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
                    $config['source_image'] = './assets/admin/img/img-penyakit/' . $gbr['file_name']; //source gambar yang akan dikompresi
                    $config['create_thumb'] = FALSE; //thumbnail
                    $config['maintain_ratio'] = TRUE; //ratio gambar
                    $config['quality'] = '80%'; //kualitas kompresi
                    $config['new_image'] = './assets/admin/img/img-penyakit/' . $gbr['file_name']; //gambar hasil kompresi
                    //eksekusi kompresi
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    //tampung data yang akan diinput ke db
                    $image = $gbr['file_name'];
                    $data = [
                        'nama_penyakit' => $this->input->post('nama'),
                        'penyakit_image' => $image
                    ];
                    $this->penyakit_model->updateData($where, $data);
                    //hapus foto lama
                    unlink('./assets/admin/img/img-penyakit/' . $hp['penyakit_image']);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diperbaharui</div>');
                    redirect('penyakit');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gambar tidak berhasil diupload</div>');
                    redirect($_SERVER['HTTP_REFERER']);
                }
            } else {
                $data = [
                    'nama_penyakit' => $this->input->post('nama')
                ];
                $this->penyakit_model->updateData($where, $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diperbaharui</div>');
                redirect('penyakit');
            }
        }
    }
     public function delete($id_penyakit)
    {
        //Create Log
      //  save_log('delete', 'penyakit', 'Delete Data');
        //Load
        $where = array('id_penyakit' => $id_penyakit);

        //Execution
        $this->penyakit_model->deleteData($where);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus</div>');
        redirect('penyakit');
    }
}

/* End of file Penyakit.php */
/* Location: ./application/controllers/backend/Penyakit.php */