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
    

    public function konsul()
    {
      //  $data['is_active'] = 'knsl';
        $data['title'] = "Konsultasi | Expert System ISPA";
        $data['header'] = "Konsultasi";
        $data['detail'] = "Halaman ini adalah halaman untuk pengguna melakukan konsultasi mengenai gejala yang ditemui pada tanaman buah naga";
        //$data['random'] = $this->random_model->getAll();
        $data['start'] = 0;
        //$data['limit'] = $this->pertanyaan_model->limit();
       $data['pertanyaan'] = $this->pertanyaan_model->getAll();
        $data['penyakit'] = $this->penyakit_model->getAll();
        $data['penjumlah'] =10;

        $this->load->view('frontend/_partials/header', $data);
        $this->load->view('frontend/_partials/topbar', $data);
        $this->load->view('frontend/deteksi/question', $data);
        $this->load->view('frontend/_partials/footer', $data);
    }

    public function act()
    {
        $this->db->truncate('tmp_hitung');
        for ($i=1; $i <= $_POST['jumlah']; $i++) { 
            $data = [
                'hitung_id_gejala' => $_POST['idgejala'.($i)],
                'hitung_id_pertanyaan' => $_POST['pertanyaan'.($i)],
                'hitung_nilai' => $_POST['idtanya'.($i)]
            ];
            $this->db->insert('tmp_hitung', $data);
            
            $evidence[$i] = $this->db->get_where('tb_evidence',['evidence_gejala_id'=>$_POST['idgejala'.($i)]])->result_array();
            $n = 1;
            foreach ($evidence[$i] as $nilai) {
                $rule1[$i][$n] = $nilai['evidence_nilai'] * $_POST['idtanya' . ($i)];
                $n++;
            }
        };
	
        $total = $this->random_model->countPertanyaan();
        for ($a = 1; $a <= 4; $a++){
            for($b = 1; $b <= $total; $b++){
            if(isset($rule1[$b][$a]) and isset($rule1[$b+1][$a])){
                $rule2[$a] = $rule1[$b][$a] + ($rule1[$b+1][$a]*(1-$rule1[$b][$a]));
            }
        }
    }
    $penyakit = array_search(max($rule2),$rule2);
    switch ($penyakit) {
        case 1:
            $nama_penyakit = "TUBERCULOSIS";
            break;
        case 2:
            $nama_penyakit = "COVID- 19";
            break;
        case 3:
            $nama_penyakit = "DIFTERI";
            break;
        case 4:
            $nama_penyakit = "PNEUMONIA";
            break;
    }
        $kesimpulan['penyakit'] = $nama_penyakit;
        $kesimpulan['persentase'] = max($rule2);
        $this->hasil($kesimpulan);
}

    private function _hitung()
    {
        
        die;
        
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


    public function hasil($kesimpulan)
    {
        $data['datapasien']=$this->konsultasi_model->getPalingBaru();
        $data['penyakit']=$kesimpulan['penyakit'];
        $data['persentase']=$kesimpulan['persentase'];
        $this->db->select('hitung_id_gejala');
        $gej = $this->db->get('tmp_hitung')->result_array();
        $data['count']=count($gej);
        $s = 1;
        foreach ($gej as $gej){
            $data['gejala'][$s]=$this->db->where('id_gejala',$gej['hitung_id_gejala'])->get('tb_gejala')->row();
            $s++;
        }

        $this->load->view('frontend/_partials/header');
        $this->load->view('frontend/_partials/topbar');
        $this->load->view('frontend/deteksi/hasil',$data);
        $this->load->view('frontend/_partials/footer'); 
    }
}
