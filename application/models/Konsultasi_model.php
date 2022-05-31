<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konsultasi_model extends CI_Model
{
    private $_table = 'tb_deteksi_pasien';

    public function getAll()
    {
        $this->db->select(
            'a.id_deteksi_pasien, a.nama_pasien, a.usia, a.no_telfon, a.alamat, a. jenis_kelamin, a.deteksi_hasildeteksi_id, a.deteksi_date,
            b.hasildeteksi_id, b.hasildeteksi_deteksi_id, b.hasildeteksi_deteksi_hasil_penyakit, b.hasildeteksi_prosentase'
        );
        $this->db->from('tb_deteksi_pasien a');
        $this->db->join('tb_hasilkonsultasi b', 'a.deteksi_hasildeteksi_id = b.hasildeteksi_id');
        $this->db->group_by('a.id_deteksi_pasien');
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

    public function inputData($data)
    {
        return $this->db->insert($this->_table, $data);
    }

    public function getNewest()
    {
        return $this->db->order_by('deteksi_date', 'DESC')->limit(1)->get($this->_table)->result_array();
    }

    public function getPalingBaru()
    {
        return $this->db->order_by('deteksi_date', 'DESC')->limit(1)->get($this->_table)->row_array();
    }

    public function updateData($id, $data)
    {
        return $this->db->where($id)->update($this->_table, $data);
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, $id)->row_array();
    }

    public function deleteData($id)
    {
        return $this->db->where($id)->delete($this->_table);
    }

    public function jumlah_penambahan()
    {
        $bulan = date('m');
        $tahun = date('Y');
        $this->db->where('month(konsultasi_date)', $bulan);
        $this->db->where('year(konsultasi_date)', $tahun);
        $query = $this->db->get($this->_table);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}
