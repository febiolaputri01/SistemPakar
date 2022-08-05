<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perhitungan extends CI_Model
{
    private $_table = 'tb_jawaban';

    public function getAll()
    {
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
    public function deleteData($id)
    {
        return $this->db->where($id)->delete($this->_table);
    }
    public function updateData($id, $data)
    {
        return $this->db->where($id)->update($this->_table, $data);
    }
    public function getById($id)
    {
        return $this->db->get_where($this->_table, $id)->row_array();
    }

    public function deleteId($id_pasien, $id_pertanyaan, $grup_pertanyaan)
    {
        return $this->db->query("DELETE from tb_jawaban where id_deteksi_pasien = " . $id_pasien . " AND id_pertanyaan = " . $id_pertanyaan . " AND grup_pertanyaan = " . $grup_pertanyaan);
    }
}
