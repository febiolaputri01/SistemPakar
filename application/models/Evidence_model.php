<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Evidence_model extends CI_Model
{
    private $_table = 'tb_evidence';

    public function getAll()
    {
        $this->db->select(
            'a.evidence_id, a.evidence_penyakit_id, a.evidence_gejala_id, a.evidence_nilai,
            b.id_penyakit, b.nama_penyakit, b.penyakit_image, c.id_gejala, c.nama_gejala, c.image_gejala'
        );
        $this->db->from('tb_evidence a');
        $this->db->join('tb_penyakit b', 'a.evidence_penyakit_id = b.id_penyakit');
        $this->db->join('tb_gejala c', 'a.evidence_gejala_id = c.id_gejala');
        $this->db->group_by('a.evidence_id');
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

    public function getSemua()
    {
        return $this->db->get($this->_table)->result_array();
    }

    public function inputData($data)
    {
        return $this->db->insert($this->_table, $data);
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, $id)->row_array();
    }

    public function updateData($id, $data)
    {
        return $this->db->where($id)->update($this->_table, $data);
    }

    public function deleteData($id)
    {
        return $this->db->where($id)->delete($this->_table);
    }

    public function truncate()
    {
        return $this->db->truncate($this->_table);
    }

    public function getByGejala($gjid)
    {
        return $this->db->get_where($this->_table, $gjid)->row_array();
    }
}
