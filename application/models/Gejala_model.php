<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gejala_model extends CI_Model
{
    private $_table = 'tb_gejala';

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
        $row = $this->db->where($id, 'id_gejala')->get($this->_table)->row_array();
        unlink('./assets/admin/img/img-gejala/' . $row['image_gejala']);
        return $this->db->where($id)->delete($this->_table);
    }

    public function truncate()
    {
        $file = glob('./assets/admin/img/img-gejala/*');
        foreach ($file as $f) {
            if (is_file($f)) {
                unlink($f);
            }
        }
        return $this->db->truncate($this->_table);
    }
}
