<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{
    private $_table = "tb_user";

    public function getAll()
    {
        return $this->db->get($this->_table)->result_array();
    }

    public function countUsers()
    {
        $query = $this->db->get($this->_table);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function get_latest_id_user()
    {
        $this->db->select('user_id');
        $this->db->order_by('user_id', 'desc');
        $this->db->limit(1);
        return $this->db->get($this->_table)->row_array();
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
        $row = $this->db->where($id, 'user_id')->get($this->_table)->row_array();
        unlink('./assets/images/user-image/' . $row['user_image']);
        return $this->db->where($id)->delete($this->_table);
    }

    public function jumlah_perbulan()
    {
        $this->db->group_by('month(user_created)');
        $this->db->select('month(user_created)');
        $this->db->select('year(user_created)');
        $this->db->select("count(*) as total");
        $jml = $this->db->get($this->_table)->result();

        return json_encode($jml);
    }

    public function truncate()
    {
        $file = glob('./assets/images/user-image/*');
        foreach ($file as $f) {
            if (is_file($f)) {
                unlink($f);
            }
        }
        return $this->db->truncate($this->_table);
    }
}
