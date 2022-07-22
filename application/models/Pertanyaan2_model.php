<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pertanyaan2_model extends CI_Model {

	 private $_table = 'tb_pertanyaan2';
        public function getAll()
    {
    	 $this->db->select(
            'a.id_pertanyaan2, a.id_pertanyaan_grup2, a.pertanyaan, a.jawaban1_pertanyaan2, a.jawaban2_pertanyaan2, a.jawaban3_pertanyaan2, a.jawaban4_pertanyaan2,
            b.id_gejala as id1, b.kode_gejala as kode1, b.nama_gejala as nama1, b.image_gejala as image1, c.id_gejala as id2, c.kode_gejala as kode2, c.nama_gejala as nama2, c.image_gejala as image2, d.id_gejala as id3, d.kode_gejala as kode3, d.nama_gejala as nama3, d.image_gejala as image3, e.id_gejala as id4, e.kode_gejala as kode4, e.nama_gejala as nama4, e.image_gejala as image4, f.id, f.grub'
        );
        $this->db->from('tb_pertanyaan2 a');
        $this->db->join('tb_gejala b', 'a.jawaban1_pertanyaan2 = b.id_gejala');
        $this->db->join('tb_gejala c', 'a.jawaban2_pertanyaan2 = c.id_gejala');
        $this->db->join('tb_gejala d', 'a.jawaban3_pertanyaan2 = d.id_gejala');
        $this->db->join('tb_gejala e', 'a.jawaban4_pertanyaan2 = e.id_gejala');
        $this->db->join('tb_pertanyaan_grub_2 f', 'a.id_pertanyaan_grup2 = f.id');
        $this->db->group_by('a.id_pertanyaan2');
        return $this->db->get($this->_table)->result_array();
    }
        public function getsemua()
    {
         $this->db->select(
            'a.id_pertanyaan2, a.id_pertanyaan_grup2, a.pertanyaan, a.jawaban1_pertanyaan2, a.jawaban2_pertanyaan2, a.jawaban3_pertanyaan2, a.jawaban4_pertanyaan2,
            b.id, b.grub'
        );
        $this->db->from('tb_pertanyaan2 a');
        $this->db->join('tb_pertanyaan_grub_2 b', 'a.id_pertanyaan_grup2 = b.id');
        $this->db->group_by('a.id_pertanyaan2');
        return $this->db->get($this->_table)->result_array();
    }
	
	 public function count()
    {
        $query = $this->db->get($this->_table);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    // public function getSemua(){
    //      $this->db->select(
    //     'a.id_pertanyaan2, a.id_pertanyaan_grup, a.pertanyaan, a.jawaban1_pertanyaan2, a.jawaban2_pertanyaan2, a.jawaban3_pertanyaan2, a.jawaban4_pertanyaan2,
    //         b.id_gejala as id1, b.kode_gejala as kode1, b.nama_gejala as nama1, b.image_gejala as image1, c.id_gejala as id2, c.kode_gejala as kode2, c.nama_gejala as nama2, c.image_gejala as image2, d.id_gejala as id3, d.kode_gejala as kode3, d.nama_gejala as nama3, d.image_gejala as image3, e.id_gejala as id4, e.kode_gejala as kode4, e.nama_gejala as nama4, e.image_gejala as image4, f.id, f.grub'
    //     );
    //     $this->db->from('tb_pertanyaan2 a');
    //     $this->db->join('tb_gejala b', 'a.jawaban1_pertanyaan2 = b.id_gejala');
    //     $this->db->join('tb_gejala c', 'a.jawaban2_pertanyaan2 = c.id_gejala');
    //     $this->db->join('tb_gejala d', 'a.jawaban3_pertanyaan2 = d.id_gejala');
    //     $this->db->join('tb_gejala e', 'a.jawaban4_pertanyaan2 = e.id_gejala');
    //     $this->db->join('tb_pertanyaan_grub_2 f', 'a.id_pertanyaan_grup = f.id');
    //     $this->db->group_by('f.id');

    //       return $this->db->get($this->_table)->result_array();
   
    // }

     public function get()
    {
        $sql = "SELECT * FROM tb_pertanyaan WHERE pertanyaan_id = ?";
        return $this->db->query($sql, (1))->result();
    }

}

/* End of file Pertanyaan2_model.php */
/* Location: ./application/models/Pertanyaan2_model.php */