<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel_model extends CI_Model
{
    private $_table = 'tb_artikel';

     public function getAllView()
    {
       return $this->db->get('tb_artikel');
    }

    public function getAll()
    {
        $this->db->select(
            'a.artikel_id, a.artikel_user_id, a.artikel_judul, a.artikel_slug, a.artikel_img,
            a.artikel_excerpt, a.artikel_body, a.artikel_create, a.artikel_update, b.user_id, b.user_name, b.user_level'
        );
        $this->db->from('tb_artikel a');
        $this->db->join('tb_user b', 'a.artikel_user_id = b.user_id');
        $this->db->group_by('a.artikel_id');
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

    public function viewBySlug($slug)
    {
        $this->db->select(
            'a.artikel_id, a.artikel_user_id, a.artikel_judul, a.artikel_slug, a.artikel_img,
            a.artikel_excerpt, a.artikel_body, a.artikel_create, a.artikel_update, b.user_id, b.user_name, b.user_level'
        );
        $this->db->from('tb_artikel a');
        $this->db->join('tb_user b', 'a.artikel_user_id = b.user_id');
        $this->db->group_by('a.artikel_id');
        return $this->db->get_where($this->_table, $slug)->row_array();
    }

    public function inputData($data)
    {
        return $this->db->insert($this->_table, $data);
    }

    public function getBySlug($slug)
    {
        return $this->db->get_where($this->_table, $slug)->row_array();
    }

    public function updateData($slug, $data)
    {
        return $this->db->where($slug)->update($this->_table, $data);
    }

    public function deleteData($id)
    {
        $row = $this->db->where($id, 'artikel_id')->get($this->_table)->row_array();
        unlink('./assets/i/artikel-image/' . $row['artikel_img']);
        return $this->db->where($id)->delete($this->_table);
    }

    public function truncate()
    {
        $file = glob('./assets/images/artikel-image/*');
        foreach ($file as $f) {
            if (is_file($f)) {
                unlink($f);
            }
        }
        return $this->db->truncate($this->_table);
    }
}
