<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konsultasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('konsultasi_model');
        $this->load->model('penyakit_model');
        $this->load->model('pertanyaan_model');
        $this->load->model('pertanyaan2_model');
        $this->load->model('pertanyaan3_model');
        $this->load->model('random_model');
        // $this->load->model('jawaban_model');
        $this->load->model('evidence_model');
        $this->load->model('perhitungan');
        // $this->load->model('hitung_model');
        //$this->load->model('solusi_model');
    }

    public function index()
    {
        $data['is_active'] = 'knsl';
        $data['title'] = "Deteksi Dini | Expert System ISPA";
        $data['header'] = "Deteksi Dini";
        $data['detail'] = "Halaman ini adalah halaman untuk pengguna melakukan konsultasi mengenai gejala yang dirasakan pada pasien yang teridentifikasi penyakit ISPA";

        $this->load->view('frontend/_partials/header', $data);
        $this->load->view('frontend/_partials/topbar', $data);
        $this->load->view('frontend/deteksi/pasien-data', $data);
        $this->load->view('frontend/_partials/footer', $data);
    }

    public function addKonsultasi()
    {
        $data = [
            'nama_pasien' => $this->input->post('nama'),
            'usia' => $this->input->post('usia'),
            'no_telfon' => $this->input->post('phone'),
            'alamat' => $this->input->post('alamat'),
            'jenis_kelamin' => $this->input->post('jk'),

        ];

        $this->konsultasi_model->inputData($data);
        redirect('konfirmasi');
    }

    public function konfirmasi()
    {
        // $data['is_active'] = 'knsl';
        $data['title'] = "Deteksi Dini | Expert System ISPA";
        $data['header'] = "Deteksi";
        $data['detail'] = "Halaman ini adalah halaman untuk pengguna melakukan konsultasi";
        $data['whosconsult'] = $this->konsultasi_model->getNewest();
        $data['wajib'] = $this->pertanyaan_model->get();
        //$data['umum'] = $this->pertanyaan_model->getRandom();

        $this->load->view('frontend/_partials/header', $data);
        $this->load->view('frontend/_partials/topbar', $data);
        $this->load->view('frontend/deteksi/konfirmasi', $data);
        $this->load->view('frontend/_partials/footer', $data);
    }


    public function konsul1()
    {
        //  $data['is_active'] = 'knsl';
        $data['title'] = "Konsultasi | Expert System ISPA";
        $data['header'] = "Konsultasi";
        $data['detail'] = "";
        //$data['random'] = $this->random_model->getAll();
        $data['start'] = 0;
        //$data['limit'] = $this->pertanyaan_model->limit();
        $data['pertanyaan'] = $this->pertanyaan_model->getAll();
        $data['penyakit'] = $this->penyakit_model->getAll();



        // var_dump($data['pertanyaan'][0]);die;

        $this->load->view('frontend/_partials/header', $data);
        $this->load->view('frontend/_partials/topbar', $data);
        $this->load->view('frontend/deteksi/pertanyaan', $data);
        $this->load->view('frontend/_partials/footer', $data);
    }

    public function konsul2()
    {
        //  $data['is_active'] = 'knsl';
        $data['title'] = "Konsultasi | Expert System ISPA";
        $data['header'] = "Konsultasi";
        $data['detail'] = "";
        //$data['random'] = $this->random_model->getAll();
        $data['mulai'] = 0;
        //$data['limit'] = $this->pertanyaan_model->limit();
        $data['wajib'] = $this->pertanyaan2_model->getSemua();
        $data['pertanyaan2'] = $this->pertanyaan2_model->getAll();
        $data['penyakit'] = $this->penyakit_model->getAll();



        // var_dump($data['pertanyaan'][0]);die;

        $this->load->view('frontend/_partials/header', $data);
        $this->load->view('frontend/_partials/topbar', $data);
        $this->load->view('frontend/deteksi/pertanyaan2', $data);
        $this->load->view('frontend/_partials/footer', $data);
    }

    public function konsul3()
    {
        //  $data['is_active'] = 'knsl';
        $data['title'] = "Konsultasi | Expert System ISPA";
        $data['header'] = "Konsultasi";
        $data['detail'] = "";
        //$data['random'] = $this->random_model->getAll();
        $data['start'] = 0;
        $data['pertanyaan3'] = $this->pertanyaan3_model->getAll();
        $data['penyakit'] = $this->penyakit_model->getAll();



        // var_dump($data['pertanyaan'][0]);die;

        $this->load->view('frontend/_partials/header', $data);
        $this->load->view('frontend/_partials/topbar', $data);
        $this->load->view('frontend/deteksi/pertanyaan3', $data);
        $this->load->view('frontend/_partials/footer', $data);
    }


    # test
    public function pertanyaan($num)
    {
        # code
        $data['num'] = $num - 1;
        $data['title'] = "Konsultasi | Expert System ISPA";
        $data['header'] = "Konsultasi";
        $data['detail'] = "";

        # model
        $data['pertanyaan'][] = $this->pertanyaan_model->getAll();
        $data['pertanyaan'][] = $this->pertanyaan2_model->getAll();
        $data['pertanyaan'][] = $this->pertanyaan3_model->getAll();

        $data['bobot_pertanyaan_1'] = [1, 0.8, 0.4, 0];

        if (!isset($_SESSION['pasien'])) {
            redirect(base_url('konsultasi'));
        }

        # view
        $this->load->view('frontend/_partials/header', $data);
        $this->load->view('frontend/_partials/topbar', $data);
        $this->load->view('frontend/deteksi/pertanyaan', $data);
        $this->load->view('frontend/_partials/footer', $data);
    }

    public function simpan_jawaban()
    {
        var_dump([$_POST['id_pasien'], $_POST['id_pertanyaan']], $_POST['id_jawaban'], $_POST['grup_pertanyaan']);
        // var_dump([$_POST['id_pasien'], $_POST['id_pertanyaan']]);
        $this->perhitungan->deleteId($_POST['id_pasien'], $_POST['id_pertanyaan'], $_POST['grup_pertanyaan']);
        $this->perhitungan->inputData([
            'id_deteksi_pasien' => $_POST['id_pasien'],
            'id_pertanyaan' => $_POST['id_pertanyaan'],
            'grup_pertanyaan' => $_POST['grup_pertanyaan'],
            'jawaban' => $_POST['id_jawaban']
        ]);
    }

    public function evidencegejala()
    {
        $this->db->where('id_deteksi_pasien', $_POST['id_pasien']);
        $semua_jawaban = $this->db->order_by('grup_pertanyaan', 'ASC')->get('tb_jawaban')->result_array();
        // var_dump($semua_jawaban);

        $arrJawaban = array();

        # RULE 1
        foreach ($semua_jawaban as $jawaban) {
            switch ($jawaban['grup_pertanyaan']) {
                    # jika masuk grup pertanyaan 1
                case '1':
                    $this->db->select('tb_evidence.evidence_nilai, tb_evidence.evidence_kode, tb_penyakit.kode_penyakit');
                    $this->db->join('tb_evidence', 'tb_evidence.evidence_gejala_id = tb_pertanyaan.id_gejala_pertanyaan');
                    $this->db->join('tb_penyakit', 'tb_penyakit.id_penyakit = tb_evidence.evidence_penyakit_id');
                    $this->db->where('tb_pertanyaan.id_pertanyaan', $jawaban['id_pertanyaan']);
                    $pertanyaan = $this->db->get('tb_pertanyaan')->row_array();
                    # mengalikan cf pakar dengan cf user
                    $nilai = (float) $pertanyaan['evidence_nilai'] * (float) $jawaban['jawaban'];
                    $arrJawaban[$pertanyaan['kode_penyakit']][] = (float) $nilai;

                    break;
                case '2':
                    $this->db->select('tb_evidence.evidence_nilai, tb_evidence.evidence_kode, tb_penyakit.kode_penyakit');
                    $this->db->join('tb_penyakit', 'tb_penyakit.id_penyakit = tb_evidence.evidence_penyakit_id');
                    $this->db->where('tb_evidence.evidence_gejala_id', $jawaban['jawaban']);
                    $pertanyaan = $this->db->get('tb_evidence')->row_array();

                    if (isset($pertanyaan['evidence_nilai'])) {
                        # mengambil nilai dari cf pakar berdasarkan gejala yang dipilih
                        $nilai = (float) $pertanyaan['evidence_nilai'] * (float) 1;

                        $arrJawaban[$pertanyaan['kode_penyakit']][] = (float) $nilai;
                    }
                    break;
                case '3':
                    $this->db->select('tb_evidence.evidence_nilai, tb_evidence.evidence_kode, tb_penyakit.kode_penyakit');
                    $this->db->join('tb_evidence', 'tb_evidence.evidence_gejala_id = tb_pertanyaan3.id_gejala_pertanyaan');
                    $this->db->join('tb_penyakit', 'tb_penyakit.id_penyakit = tb_evidence.evidence_penyakit_id');
                    $this->db->where('tb_pertanyaan3.id_pertanyaan', $jawaban['id_pertanyaan']);
                    $pertanyaan = $this->db->get('tb_pertanyaan3')->row_array();

                    # mengalikan cf user dengan cf pakar
                    $nilai = (float) $pertanyaan['evidence_nilai'] * (float) $jawaban['jawaban'];

                    $arrJawaban[$pertanyaan['kode_penyakit']][] = (float) $nilai;

                    break;
                default:
                    # code...
                    break;
            }
        }


        # RULE 2
        $cf_all = array();
        foreach ($arrJawaban as $key => $value) {
            foreach ($value as $k => $val) {
                if ($k < (count($value))) {
                    if (!isset($value[$k + 1])) {
                        $value[$k + 1] = 0;
                    }
                    if ($k == 0) {
                        $cf_all[$key][] = $value[$k] + $value[$k + 1] * (1 - $value[$k]);
                    } else {
                        $cf_all[$key][] = $cf_all[$key][$k - 1] + $value[$k + 1] * (1 - $cf_all[$key][$k - 1]);
                    }
                }
            }
        }

        # Persentase
        $result = array();
        foreach ($cf_all as $key => $value) {
            foreach ($value as $k => $val) {
                $result[$key] = $val * 100;
            }
        }

        $this->db->query("DELETE from tb_hasilkonsultasi where id_pasien = " . $_POST['id_pasien']);
        foreach ($result as $key => $value) {

            $this->db->insert('tb_hasilkonsultasi', [
                'id_pasien' => $_POST['id_pasien'],
                'kode_penyakit' => $key,
                'hasil' => $value
            ]);
        }
    }



    #hasil
    public function hasil()
    {
        if (!isset($_SESSION['pasien'])) {
            redirect(base_url('konsultasi'));
        }
        $data['title'] = 'Hasil Diagnosa';
        $data['pasien'] = $this->db->where('id_deteksi_pasien', $_SESSION['pasien'])->get('tb_deteksi_pasien')->row_array();

        $data['jawaban'] = $this->db->where('id_deteksi_pasien', $_SESSION['pasien'])->get('tb_jawaban')->result_array();

        $data['gejala'] = array();
        foreach ($data['jawaban'] as $key => $value) {

            switch ($value['grup_pertanyaan']) {
                case '1':
                    $pertanyaan = $this->db->select('tb_gejala.nama_gejala')->join('tb_gejala', 'tb_gejala.id_gejala = tb_pertanyaan.id_gejala_pertanyaan')->where('id_pertanyaan', $value['id_pertanyaan'])->get('tb_pertanyaan')->row_array();
                    array_push($data['gejala'], $pertanyaan['nama_gejala']);
                    break;
                case '2':
                    $pertanyaan = $this->db->select('tb_gejala.nama_gejala')->where('id_gejala', $value['jawaban'])->get('tb_gejala')->row_array();
                    array_push($data['gejala'], $pertanyaan['nama_gejala']);
                    break;
                case '3':
                    $pertanyaan = $this->db->select('tb_gejala.nama_gejala')->join('tb_gejala', 'tb_gejala.id_gejala = tb_pertanyaan3.id_gejala_pertanyaan')->where('id_pertanyaan', $value['id_pertanyaan'])->get('tb_pertanyaan3')->row_array();
                    array_push($data['gejala'], $pertanyaan['nama_gejala']);
                    break;

                default:
                    # code...
                    break;
            }
        }

        $data['hasil'] = $this->db->join('tb_penyakit', 'tb_penyakit.kode_penyakit = tb_hasilkonsultasi.kode_penyakit')->where('id_pasien', $_SESSION['pasien'])->get('tb_hasilkonsultasi')->result_array();

        $hasil_kesimpulan = array();
        foreach ($data['hasil'] as $hasil) {
            $hasil_kesimpulan[$hasil['nama_penyakit']] =  $hasil['hasil'];
        }

        $kesimpulan = array_keys($hasil_kesimpulan, max($hasil_kesimpulan));
        $data['kesimpulan'] = array();
        foreach ($kesimpulan as $k) {
            $data['kesimpulan'][$k] = $hasil_kesimpulan[$k];
        }

        // var_dump($data['kesimpulan']);
        $this->load->view('frontend/_partials/header');
        $this->load->view('frontend/_partials/topbar');
        $this->load->view('frontend/deteksi/hasil', $data);
        $this->load->view('frontend/_partials/footer');
    }
}
