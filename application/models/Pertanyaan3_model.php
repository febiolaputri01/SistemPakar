<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pertanyaan3_model extends CI_Model {

	  private $_table = 'tb_pertanyaan3';

    // public function getAll()
    // {
    //     $this->db->where("id_pertanyaan NOT IN (select id_pertanyaan from tb_pertanyaan where id_pertanyaan = '1')");
    //     return $this->db->get($this->_table)->result_array();
    // }

      public function getAll()
    {
        $this->db->select(
            'a.id_pertanyaan3, a.id_gejala_pertanyaan3, a.id_pertanyaan_grup, a.pertanyaan, a.jawaban_1_pertanyaan_3,  a.jawaban_2_pertanyaan3,  a.jawaban_3_pertanyaan3,  a.jawaban_4_pertanyaan3,
            b.id_gejala, b.nama_gejala, b.image_gejala, c.id_pertanyaan_grup, c.nama_pertanyaan_grup'
        );
        $this->db->from('tb_pertanyaan3 a');
        $this->db->join('tb_gejala b', 'a.id_gejala_pertanyaan3 = b.id_gejala');
        $this->db->join('pertanyaan_grup c', 'a.id_pertanyaan_grup = c.id_pertanyaan_grup');
        $this->db->group_by('a.id_pertanyaan3');
        return $this->db->get($this->_table)->result_array();
    }
    //  public function getgrup()
    // {
       
    //     $this->db->select('*');
    //     $this->db->from('pertanyaan_grup');
    //     $this->db->join('tb_pertanyaan','pertanyaan_grup.id_pertanyaan_grup=tb_pertanyaan.id_pertanyaan_grup');
        
    //     return $this->db->get()->result_array();

    // }

    


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

    public function limit()
    {
        // $this->db->limit(12, 0);
        // $this->db->order_by("RAND ()");
        // $this->db->where("id_pertanyaan NOT IN (select id_pertanyaan from tb_pertanyaan )");

        // return $this->db->get($this->_table)->result();
		$sql = "SELECT * FROM tb_pertanyaan LIMIT 9";
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

/* End of file Pertanyaan3_model.php */
/* Location: ./application/models/Pertanyaan3_model.php */