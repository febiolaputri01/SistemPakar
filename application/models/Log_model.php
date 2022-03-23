<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Log_model extends CI_Model
{
    private $_tableBackend = 'tb_log_backend';
    private $_tableFrontend = 'tb_log_frontend';

    public function saveLogBackend($param)
    {
        return $this->db->insert($this->_tableBackend, $param);
    }

    public function getLogBackend()
    {
        return $this->db->get($this->_tableBackend)->result_array();
    }

    public function getNewestLogBackend()
    {
        return $this->db->order_by('logback_time', 'DESC')->limit(10)->get($this->_tableBackend)->result_array();
    }

    public function countLogBackend()
    {
        $query = $this->db->get($this->_tableBackend);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}
