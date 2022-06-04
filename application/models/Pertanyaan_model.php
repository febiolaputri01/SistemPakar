<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pertanyaan_model extends CI_Model
{
    private $_table = 'tb_pertanyaan';

    // public function getAll()
    // {
    //     $this->db->where("id_pertanyaan NOT IN (select id_pertanyaan from tb_pertanyaan where id_pertanyaan = '1')");
    //     return $this->db->get($this->_table)->result_array();
    // }

      public function getAll()
    {
        $this->db->select(
            'a.id_pertanyaan, a.id_gejala_pertanyaan, a.pertanyaan, a.jawaban_1,  a.jawaban_2,  a.jawaban_3,  a.jawaban_4,  a.jawaban_5,  a.jawaban_6,
            b.id_gejala, b.nama_gejala, b.image_gejala'
        );
        $this->db->from('tb_pertanyaan a');
        $this->db->join('tb_gejala b', 'a.id_gejala_pertanyaan = b.id_gejala');
        $this->db->group_by('a.id_pertanyaan');
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

    public function get()
    {
        $sql = "SELECT * FROM tb_pertanyaan WHERE id_pertanyaan = ?";
        return $this->db->query($sql, (1))->result();
    }

    public function getRandom()
    {
        // $this->db->limit(12, 0);
        // $this->db->order_by("RAND ()");
        // $this->db->where("id_pertanyaan NOT IN (select id_pertanyaan from tb_pertanyaan )");

        // return $this->db->get($this->_table)->result();
		$sql = "SELECT * FROM tb_pertanyaan  ORDER BY RAND() LIMIT 18";
        return $this->db->query($sql)->result();
    }

    public function inputData($data)
    {
        return $this->db->insert($this->_table, $data);
    }

    public function deleteData($id)
    {
        return $this->db->where($id)->delete($this->_table);
    }
}
