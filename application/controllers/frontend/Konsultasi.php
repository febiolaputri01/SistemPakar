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
        $this->load->model('random_model');
       // $this->load->model('jawaban_model');
        $this->load->model('evidence_model');
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
        $data['umum'] = $this->pertanyaan_model->getRandom();

        $this->form_validation->set_rules('konsul-id', 'ID Konsultasi', 'required', [
            'required' => 'ID Konsultasi tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('frontend/_partials/header', $data);
        $this->load->view('frontend/_partials/topbar', $data);
        $this->load->view('frontend/deteksi/konfirmasi', $data);
        $this->load->view('frontend/_partials/footer', $data);
        } else {
            $result = array();
            foreach ($_POST['id_per'] as $key => $val) {
                $result[] = array(
                    'random_id_deteksi_pasien' => $_POST['konsul-id'],
                    'random_id_pertanyaan' => $_POST['id_per'][$key],
                    'random_pertanyaan' => $_POST['pertanyaan'][$key],
                    'random_jawaban_1' => $_POST['o1'][$key],
                    'random_jawaban_2' => $_POST['o2'][$key],
                    'random_jawaban_3' => $_POST['o3'][$key],
                    'random_jawaban_4' => $_POST['o4'][$key],
                    'random_jawaban_5' => $_POST['o5'][$key],
                    'random_jawaban_6' => $_POST['o6'][$key],
                    'random_kode' => uniqid()
                );
            }
            $query = $this->db->get('tmp_random');
            if ($query->num_rows() >= 1) {
                $this->db->truncate('tmp_random');
                $this->db->insert_batch('tmp_random', $result);
                redirect('pertanyaan');
            } else {
                $this->db->insert_batch('tmp_random', $result);
                redirect('pertanyaan');
            }
        }
    }

    public function konsul()
    {
        $data['is_active'] = 'knsl';
        $data['title'] = "Konsultasi | Expert System ISPA";
        $data['header'] = "Konsultasi";
        $data['detail'] = "Halaman ini adalah halaman untuk pengguna melakukan konsultasi mengenai gejala yang ditemui pada tanaman buah naga";
        $data['random'] = $this->random_model->getAll();
        $data['start'] = 0;
        $data['jumlah'] = $this->random_model->count();
        $data['penyakit'] = $this->penyakit_model->getAll();
        $data['penjumlah'] = $this->penyakit_model->count();

        $this->load->view('frontend/_partials/header', $data);
        $this->load->view('frontend/_partials/topbar', $data);
        $this->load->view('frontend/deteksi/pertanyaan', $data);
        $this->load->view('frontend/_partials/footer', $data);
    }

    public function act()
    {
        $this->db->truncate('tmp_hitung');
        for ($i=0; $i <= 5; $i++) { 
            echo "id_pertanyaan = ".$_POST['pertanyaan'.($i+1)];
            echo "nilai = ".$_POST['idtanya'.($i+1)];
            echo "<br>";
            $data = [
                'hitung_id_pertanyaan' => $_POST['pertanyaan'.($i+1)],
                'hitung_nilai' => $_POST['idtanya'.($i+1)]
            ];
            $this->db->insert('tmp_hitung', $data);
        };die;
        $pilihan = $_POST["pilihan"];
        $id = $_POST["id"];
        $jumlah = $_POST['jumlah'];
        $jum = $_POST['jum'];
        $pen = $_POST['pen'];
         $pertanyaan = $_POST["pertanyaan"];
         $konsul = $_POST["konsulid"];

        for ($x = 0; $x < $jum; $x++) {
            for ($i = 1; $i <= $jumlah; $i++) {
                $numb = $pen[$x];
                $nomor = $id[$i];
                if (empty($pilihan[$nomor])) {
                    echo 'Gagal';
                } else {
                    $jawaban = $pilihan[$nomor];
                    $gjid = array(
                        'evidence_penyakit_id' => $numb,
                        'evidence_gejala_id' => $jawaban
                    );
                    $cek = $this->evidence_model->getByGejala($gjid);
                    $data = [
                        'hitung_penyakit_id' => $numb,
                        'hitung_gejala_id' => $cek['evidence_gejala_id'],
                        'hitung_nilai' => $cek['evidence_nilai']
                    ];
                    $this->db->insert('tmp_hitung', $data);
                }
            }
        }
        $this->_hitung();
    }

    private function _hitung()
    {
        $konsul = $this->konsultasi_model->getPalingBaru();
        $konsul_id = $konsul['konsultasi_id'];
        $hapenjumlah = $this->hamapenyakit_model->count();
        $where = array('konsultasi_id' => $konsul_id);
        $tmp = 0;

        for ($i = 1; $i <= $hapenjumlah; $i++) {
            $coba = $this->hitung_model->getByHapen($i);
            switch ($i) {
                case 1:
                    $probabilitas = 0.05;
                    break;
                case 2:
                    $probabilitas = 0.05;
                    break;
                case 3:
                    $probabilitas = 0.05;
                    break;
                case 4:
                    $probabilitas = 0.05;
                    break;
                case 5:
                    $probabilitas = 0.10;
                    break;
                case 6:
                    $probabilitas = 0.10;
                    break;
                case 7:
                    $probabilitas = 0.10;
                    break;
                case 8:
                    $probabilitas = 0.36;
                    break;
                case 9:
                    $probabilitas = 0.50;
                    break;
                case 10:
                    $probabilitas = 0.18;
                    break;
            }
            $nilaiprobpadahipo = 0;
            $hasilkali = 1;

            foreach ($coba as $c) {
                $nilai = $c->hitung_nilai;
                $hasilkali = $hasilkali * $nilai;
                $probpadahipo = $hasilkali * $probabilitas;
                $nilaihipo[$i] = $probpadahipo;
                $nilaiprobpadahipo = $nilaiprobpadahipo + $nilaihipo[$i];
            }
            $tmp = $probpadahipo + $tmp;
        }
        for ($j = 1; $j <= $hapenjumlah; $j++) {
            $prosentase[$j] = ($nilaihipo[$j] / $tmp) * 100;
            $data = [
                'hasilkonsultasi_konsultasi_id' => $konsul_id,
                'hasilkonsultasi_konsultasi_hasil_hp' => $j,
                'hasilkonsultasi_prosentase' => number_format($prosentase[$j]),
            ];
            $this->db->insert('tb_hasilkonsultasi', $data);
        }
        $mana = array('hasilkonsultasi_konsultasi_id' => $konsul_id);
        $maximum = $this->hitung_model->getMax($mana);
        $this->konsultasi_model->updateData(['konsultasi_id' => $konsul_id], ['konsultasi_hasilkonsultasi_id' => $maximum['hasilkonsultasi_id']]);

        //tampilan
        $data['is_active'] = 'knsl';
        $data['title'] = "Hasil Konsultasi | Expert System Buah Naga";
        $data['header'] = "Hasil Konsultasi";
        $data['detail'] = "Halaman ini adalah halaman untuk pengguna melihat hasil dari konsultasi yang telah dilakukan";
        $data['whosconsult'] = $this->konsultasi_model->getNewest();
        $data['max'] = $maximum['hasilkonsultasi_prosentase'];
        $data['pilihanuser'] = $this->hitung_model->getGejala();

        // $coba = $this->hitung_model->getGejala();
        // var_dump($coba);
        // die;

        $query = $this->hamapenyakit_model->getId($maximum['hasilkonsultasi_konsultasi_hasil_hp']);
        $data['hamapenyakit'] = $query;

        $solusi = $this->solusi_model->getId($maximum['hasilkonsultasi_konsultasi_hasil_hp']);
        $data['solusi'] = $solusi;

        $this->load->view('frontend/_partials/head', $data);
        $this->load->view('frontend/_partials/navbar', $data);
        $this->load->view('frontend/_partials/single-page-header', $data);
        $this->load->view('frontend/konsultasi/hasil', $data);
        $this->load->view('frontend/_partials/foot', $data);
    }

    public function hasil_pdf()
    {
        $konsul = $this->konsultasi_model->getPalingBaru();
        $konsul_id = $konsul['konsultasi_id'];
        $mana = array('hasilkonsultasi_konsultasi_id' => $konsul_id);
        $maximum = $this->hitung_model->getMax($mana);
        $query = $this->hamapenyakit_model->getId($maximum['hasilkonsultasi_konsultasi_hasil_hp']);
        $solusi = $this->solusi_model->getId($maximum['hasilkonsultasi_konsultasi_hasil_hp']);

        $data['whosconsult'] = $this->konsultasi_model->getNewest();
        $data['max'] = $maximum['hasilkonsultasi_prosentase'];
        $data['hamapenyakit'] = $query;
        $data['solusi'] = $solusi;
        $data['pilihanuser'] = $this->hitung_model->getGejala();

        $this->load->library('pdf'); //load library PDF

        $this->pdf->setPaper('A4', 'landscape'); //set ukuran kertas
        $this->pdf->filename = "hasil-konsultasi.pdf"; //set nama
        $this->pdf->load_view('frontend/konsultasi/cetak', $data);
    }
}
