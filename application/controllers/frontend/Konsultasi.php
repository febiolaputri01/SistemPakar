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

        // $this->form_validation->set_rules('konsul-id', 'ID Konsultasi', 'required', [
        //     'required' => 'ID Konsultasi tidak boleh kosong'
        // ]);

        // if ($this->form_validation->run() == FALSE) {

        // } else {
        // $result = array();
        // foreach ($_POST['id_per'] as $key => $val) {

        //     $result[] = array(
        //         'random_id_deteksi_pasien' => $_POST['konsul-id'],
        //         'random_id_pertanyaan' => $_POST['id_per'][$key],
        //         'random_pertanyaan' => $_POST['pertanyaan'][$key],
        //         'random_jawaban_1' => $_POST['o1'][$key],
        //         'random_jawaban_2' => $_POST['o2'][$key],
        //         'random_jawaban_3' => $_POST['o3'][$key],
        //         'random_jawaban_4' => $_POST['o4'][$key],
        //         'random_jawaban_5' => $_POST['o5'][$key],
        //         'random_jawaban_6' => $_POST['o6'][$key],
        //         'random_kode' => uniqid()
        //     );
        // }

        // $query = $this->db->get('tmp_random');
        // if ($query->num_rows() >= 1) {
        //     $this->db->truncate('tmp_random');
        //     $this->db->insert_batch('tmp_random', $result);
        //     redirect('pertanyaan');
        // $this->db->insert_batch('tmp_random', $result);
        //      redirect('pertanyaan');
        // }
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
        //$data['limit'] = $this->pertanyaan_model->limit();
        $data['pertanyaan3'] = $this->pertanyaan3_model->getAll();
        $data['penyakit'] = $this->penyakit_model->getAll();



        // var_dump($data['pertanyaan'][0]);die;

        $this->load->view('frontend/_partials/header', $data);
        $this->load->view('frontend/_partials/topbar', $data);
        $this->load->view('frontend/deteksi/pertanyaan3', $data);
        $this->load->view('frontend/_partials/footer', $data);
    }



    // public function act()
    // {
    //     $this->db->truncate('tmp_hitung');
    //     for ($i = 1; $i <= $_POST['jumlah']; $i++) {
    //         $data = [
    //             'hitung_id_gejala' => $_POST['idgejala' . ($i)],
    //             'hitung_id_pertanyaan' => $_POST['pertanyaan' . ($i)],
    //             'hitung_nilai' => $_POST['idtanya' . ($i)]
    //         ];
    //         $this->db->insert('tmp_hitung', $data);

    //         $evidence[$i] = $this->db->get_where('tb_evidence', ['evidence_gejala_id' => $_POST['idgejala' . ($i)]])->result_array();
    //         $n = 1;
    //         foreach ($evidence[$i] as $nilai) {
    //             $rule1[$i][$n] = $nilai['evidence_nilai'] * $_POST['idtanya' . ($i)];
    //             $n++;
    //         }
    //     };

    //     $total = $this->random_model->countPertanyaan();
    //     for ($a = 1; $a <= 4; $a++) {
    //         for ($b = 1; $b <= $total; $b++) {
    //             if (isset($rule1[$b][$a]) and isset($rule1[$b + 1][$a])) {
    //                 $rule2[$a] = $rule1[$b][$a] + ($rule1[$b + 1][$a] * (1 - $rule1[$b][$a]));
    //             }
    //         }
    //     }
    //     $penyakit = array_search(max($rule2), $rule2);
    //     switch ($penyakit) {
    //         case 1:
    //             $nama_penyakit = "TUBERCULOSIS";
    //             break;
    //         case 2:
    //             $nama_penyakit = "COVID- 19";
    //             break;
    //         case 3:
    //             $nama_penyakit = "DIFTERI";
    //             break;
    //         case 4:
    //             $nama_penyakit = "PNEUMONIA";
    //             break;
    //     }
    //     $kesimpulan['penyakit'] = $nama_penyakit;
    //     $kesimpulan['persentase'] = max($rule2);
    //     $this->hasil($kesimpulan);
    // }

    // private function _hitung()
    // {

    //     die;
    // }

    // public function hasil_pdf()
    // {
    //     $konsul = $this->konsultasi_model->getPalingBaru();
    //     $konsul_id = $konsul['konsultasi_id'];
    //     $mana = array('hasilkonsultasi_konsultasi_id' => $konsul_id);
    //     $maximum = $this->hitung_model->getMax($mana);
    //     $query = $this->hamapenyakit_model->getId($maximum['hasilkonsultasi_konsultasi_hasil_hp']);
    //     $solusi = $this->solusi_model->getId($maximum['hasilkonsultasi_konsultasi_hasil_hp']);

    //     $data['whosconsult'] = $this->konsultasi_model->getNewest();
    //     $data['max'] = $maximum['hasilkonsultasi_prosentase'];
    //     $data['hamapenyakit'] = $query;
    //     $data['solusi'] = $solusi;
    //     $data['pilihanuser'] = $this->hitung_model->getGejala();

    //     $this->load->library('pdf'); //load library PDF

    //     $this->pdf->setPaper('A4', 'landscape'); //set ukuran kertas
    //     $this->pdf->filename = "hasil-konsultasi.pdf"; //set nama
    //     $this->pdf->load_view('frontend/konsultasi/cetak', $data);
    // }


    // public function hasil($kesimpulan)
    // {
    //     $data['datapasien'] = $this->konsultasi_model->getPalingBaru();
    //     $data['penyakit'] = $kesimpulan['penyakit'];
    //     $data['persentase'] = $kesimpulan['persentase'];
    //     $this->db->select('hitung_id_gejala');
    //     $gej = $this->db->get('tmp_hitung')->result_array();
    //     $data['count'] = count($gej);
    //     $s = 1;
    //     foreach ($gej as $gej) {
    //         $data['gejala'][$s] = $this->db->where('id_gejala', $gej['hitung_id_gejala'])->get('tb_gejala')->row();
    //         $s++;
    //     }

    //     $this->load->view('frontend/_partials/header');
    //     $this->load->view('frontend/_partials/topbar');
    //     $this->load->view('frontend/deteksi/hasil', $data);
    //     $this->load->view('frontend/_partials/footer');
    // }


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

        # view
        $this->load->view('frontend/_partials/header', $data);
        $this->load->view('frontend/_partials/topbar', $data);
        $this->load->view('frontend/deteksi/pertanyaan', $data);
        $this->load->view('frontend/_partials/footer', $data);
    }

    #hasil

    public function hasil()
    {

         /*
        | ------------------------------------------------------------------------
        |  PROSES PENGAMBILAN DATA 
        | ------------------------------------------------------------------------
        |*/
        $counter = 29; # hitung jumlah berapa gejala yang dipilih (digunakan untuk looping)
        $input_tanggal = date('Y-m-d H:i:s');
        $arbobot = array('1.0', '0.8', '0.4', '0'); #nilai bobot dari kondisi yang dipilih user

        // Ambil gejala dan kondisi yang dipilih user
        for ($i = 0; $i < $counter; $i++) {
        $kondisi = explode("_", $_POST['jawaban'][$i]); //untuk memecah string setiap tanda petik
            if (strlen($_POST['jawaban'][$i]) > 1) { // strlen = untuk menghitung jumlah string atau karakter
                $argejala []= $jawaban[0]; // array gejala di pilih user
                $arkondisi [] = $jawabani[1]; // array kondisi yang dipilih user
            }
        }


         /*
        | ------------------------------------------------------------------------
        |  PERHITUNGAN NILAI CF
        | ------------------------------------------------------------------------
        |*/   

        $sql_penyakit = $this->db->query("SELECT * FROM tb_penyakit order by id_penyakit ASC");
        $array_penyakit = array();
        foreach ($sql_penyakit->result_array() as $key) {
            $cftotal_temp = 0;
            $cf = 0;
            
            $cflama = 0;
            
            $query_gejala = $this->db->select('*')->where('id_hp', $key['id_hp'])->get('pengetahuan');
            
            foreach ($query_gejala->result_array() as $key => $value) { // foreach = perulangan data yang sudah ada pada tabel database
            
                
                for ($i = 0; $i < $counter; $i++) { //for = perulangan data yang belum ada pada tabel seperti hasil perkalian,dsb.
                    $array_kondisi = explode("_", $_POST['kondisi'][$i]); //untuk memecah string setiap tanda petik
                    $gejala = $array_kondisi[0];
                    if ($value['id_gejala'] == $gejala) {
                        $cf = $value['cf_pakar'] * $arbobot[$array_kondisi[1]];
                        
                        // Rumus Cf Combine
                        if (($cf >= 0) && ($cf * $cflama >= 0)) {
                            $cflama = $cflama + ($cf * (1 - $cflama));
                        }
                    }
                }
            }
            if ($cflama > 0) {
                # hasil dari semua perhitungan cf dalam bentuk array
                $array_penyakit += array($value['id_hp'] => number_format($cflama, 4));  
            } 
            
        }

            arsort($array_penyakit); # urutkan hasil perhitungan per penyakit dari nilai yang tertinggi sampai terendah
            $input_gejala = serialize($argejala); # ubah array menjadi varchar agar bisa disimpan di database
            $input_penyakit = serialize($array_penyakit); # ubah array menjadi varchar agar bisa disimpan di database

            $np1 = 0;
            foreach ($array_penyakit as $key1 => $value1) {
                $np1++;
                $penyakit_1[$np1] = $key1;
                $nilai[$np1] = $value1;
                
            }

        /*
        | ------------------------------------------------------------------------
        |  INSERT DATA HASIL PERHITUNGAN KE DATABASE
        | ------------------------------------------------------------------------
        |*/
            $data_hasil = [
                'id_user' =>$this->session->userdata('id_user'),
                'hp' =>$input_penyakit,
                'gejala' =>$input_gejala,
                'tanggal' =>$input_tanggal,
                'id_hp' =>$penyakit_1[1],
                'cf_hasil' =>$nilai[1],
            ];
            $this->db->insert('hasil', $data_hasil);
            

        /*
        | ------------------------------------------------------------------------
        |  PARSING DATA KE HALAMAN VIEW
        | ------------------------------------------------------------------------
        |*/
        $data['hasil'] = round($nilai[1], 3);
        $data['persentasi'] = round($nilai[1]*100); 
        $data['penyakit'] = $array_penyakit;
        $data['penyakit_lain'] = $array_penyakit;
        $data['kondisi'] = $arkondisi;
        $data['penyakit_terpilih'] = $penyakit_1[1];
        $data['gejala'] = $argejala;
        $data['title'] = 'Hasil Diagnosa';
        
        
        $this->load->view('frontend/_partials/header');
        $this->load->view('frontend/_partials/topbar');
        $this->load->view('frontend/deteksi/hasil', $data);
        $this->load->view('frontend/_partials/footer');
    }
}
