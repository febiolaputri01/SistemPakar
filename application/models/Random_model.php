<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Random_model extends CI_Model
{
    private $_table = 'tmp_random';

    public function getAll()
    {
        $this->db->select(
            'a.random_id, a.random_id_deteksi_pasien, a.random_id_pertanyaan, a.random_pertanyaan, a.random_jawaban_1, a.random_jawaban_2, a.random_jawaban_3, a.random_jawaban_4, a.random_jawaban_5, a.random_jawaban_6,
            b.id_deteksi_pasien, b.nama_pasien, b.usia, b.no_telfon, b.alamat, b.jenis_kelamin, c.jawaban_1, c.jawaban_2, c.jawaban_3, c.jawaban_4, c.jawaban_5, c.jawaban_6, c.id_gejala_pertanyaan' 
        );
        $this->db->from('tmp_random a');
        $this->db->join('tb_deteksi_pasien b','a.random_id_deteksi_pasien = b.id_deteksi_pasien');
        $this->db->join('tb_pertanyaan c','a.random_id_pertanyaan = c.id_pertanyaan');
        $this->db->group_by('a.random_id');
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

    public function countPertanyaan()
    {
        $query = $this->db->get('tmp_hitung');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}
