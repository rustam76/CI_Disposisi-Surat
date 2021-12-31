<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_surat extends CI_Model
{
    public function tampilData()
    {
        $this->db->select('*');
        $this->db->from('surat');
        $this->db->where('status = 0');
        $query = $this->db->get();
        return $query->result();
    }

    public function user()
    {
        $this->db->select('*');
        $this->db->from('user');
        $query = $this->db->get();
        return $query->result();
    }

    public function dinas()
    {
        $this->db->select('surat.kd_surat,surat.nm_surat,surat.perihal,surat.file,surat.tgl_surat');
        $this->db->from('posisi');
        $this->db->join('surat', 'surat.kd_surat=posisi.kd_surat');
        $this->db->where('status = 0');
        $query = $this->db->get();
        return $query->result();
    }
    public function pegawai()
    {


        $this->db->select('disposisi.kd_surat,surat.nm_surat,surat.perihal,disposisi.batas,surat.file');
        $this->db->from('disposisi');
        $this->db->join('surat', 'surat.kd_surat=disposisi.kd_surat');
        $this->db->where('status = 0');
        $query = $this->db->get();
        return $query->result();
    }
    public function arsipData()
    {
        $this->db->select('*');
        $this->db->from('surat');
        $this->db->where('status = 1');
        $query = $this->db->get();
        return $query->result();
    }

    public function simpan($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function hapus($where)
    {
        $this->db->where($where);
        $this->db->delete('surat');
    }

    public function editData($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function update_data($where, $table, $data)
    {
        $this->db->update($table, $data, $where);
        return $query->result();
    }
}
