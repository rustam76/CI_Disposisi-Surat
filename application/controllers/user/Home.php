<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
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
            'title' => 'Dashboard',
            'user' => $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array(),
            'surat' => $this->M_surat->dinas('surat')

        );
        $this->load->view('admin/template/header', $data);
        $this->load->view('dinas/template/sidebar', $data);
        $this->load->view('dinas/v_home', $data);
        $this->load->view('admin/template/footer');
    }
    public function surat()
    {
        $data = array(
            'title' => 'surat',
            'user' => $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array(),
            'surat' => $this->M_surat->dinas('surat')

        );
        $this->load->view('admin/template/header', $data);
        $this->load->view('dinas/template/sidebar', $data);
        $this->load->view('dinas/v_surat', $data);
        $this->load->view('admin/template/footer');
    }
    public function kirim($kd_surat)
    {
        $where = array('kd_surat' => $kd_surat);

        $data = array(
            'title' => 'kirim data',
            'user' => $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array(),
            'pegawai' => $this->M_dinas->ambilPegawai('sub', $where)
        );
        $this->load->view('admin/template/header', $data);
        $this->load->view('dinas/template/sidebar', $data);
        $this->load->view('dinas/v_kirim', $data);
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
        $this->load->view('dinas/template/sidebar', $data);
        $this->load->view('dinas/v_arsip', $data);
        $this->load->view('admin/template/footer');
    }
}
