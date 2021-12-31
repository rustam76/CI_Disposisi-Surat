<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_dinas extends CI_Model
{
    public function tambah($table, $data)
    {
        $this->db->insert($table, $data);
        return $query->result();
    }

    public function ambil_data($table)
    {

        $this->db->select('*');
        $this->db->from($table);

        $query = $this->db->get();
        return $query->result();
    }
    public function ambilPegawai($table)
    {

        $this->db->select('*');
        $this->db->from($table);

        $query = $this->db->get();
        return $query->result();
    }
}
