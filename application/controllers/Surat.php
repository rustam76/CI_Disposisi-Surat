<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->model(['M_surat', 'M_dinas']);
    }

    public function index()
    {
        $data = array(
            'title' => 'Tampil Surat',
            'user' => $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array()
        );
        $data['surat'] = $this->M_surat->tampilData();

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/v_surat', $data);
        $this->load->view('admin/template/footer');
    }
    public function tambahsurat()
    {
        $data = array(
            'title' => 'Tampil Surat',
            'user' => $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array()
        );
        $data['surat'] = $this->M_surat->tampilData();

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/v_tambah', $data);
        $this->load->view('admin/template/footer');
    }
    public function arsip()
    {
        $data = array(
            'title' => 'Tampil Surat',
            'user' => $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array()
        );
        $data['arsip'] = $this->M_surat->arsipData();

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/v_arsip', $data);
        $this->load->view('admin/template/footer');
    }

    public function hapus($kd_surat)
    {
        $where = array('kd_surat' => $kd_surat);
        $this->M_surat->hapus($where);

        redirect('Surat/arsip');
    }

    public function kirim($kd_surat)
    {
        $where = array('kd_surat' => $kd_surat);

        $data = array(
            'title' => 'kirim data',
            'user' => $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array(),
            'dinas' => $this->M_dinas->ambil_data('dinas', $where)
        );
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/v_kirim', $data);
        $this->load->view('admin/template/footer');
    }
    public function tambah()
    {

        $data['kpd'] = $this->input->post('kpd');
        $data['isi'] = $this->input->post('isi');
        $data['batas'] = $this->input->post('batas');

        $this->db->insert('dinas', $data);
    }
    public function edit_data($kd_surat)
    {
        $where = array('kd_surat' => $kd_surat);
        $data = array(
            'title' => 'kirim data',
            'user' => $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array(),
            'surat' => $this->M_surat->editData($where, 'surat')->result()
        );



        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/V_edit', $data);
        $this->load->view('admin/template/footer');
    }

    public function update()
    {
        $kd_surat = $this->input->post('kode');
        $nm_surat = $this->input->post('nama');
        $perihal = $this->input->post('perihal');
        $tgl = $this->input->post('tgl');
        // ditampung di variable data dengan mengubah data ke arry
        $data = array(
            'kd_surat' => $kd_surat,
            'nm_surat' => $nm_surat,
            'perihal' => $perihal,
            'tgl_surat' => $tgl,

        );

        // ambil data berdasarkan
        $where = array(
            'kd_surat' => $kd_surat
        );

        $this->M_surat->update_data('surat', $where, $data );
        redirect('Surat/arsip');
    }
    public function status($kd_surat)
    {

        $this->db->query("UPDATE surat SET status='1' Where kd_surat=$kd_surat");
        redirect('pegawai/home');
    }
}
