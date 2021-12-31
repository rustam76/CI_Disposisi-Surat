<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dinas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->model(['M_dinas', 'M_surat']);
    }

    public function index()
    {
        $data = array(
            'title' => 'Tampil Surat',
            'user' => $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array(),
            'surat' => $this->M_surat->tampilData()
        );

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/v_surat', $data);
        $this->load->view('admin/template/footer');
    }
    // public function kirim($kd_surat)
    // {
    //     $where = array('kd_surat' => $kd_surat);
    //     $data['dinas'] = $this->M_dinas->ambil_data('dinas');
    //     $data= array(
    //     'title' => 'kirim data'
    //     // 'user' => $this->db->get_where('user', ['npm' => $this->session->userdata('npm')]) ->row_array()
    //     );
    //     $this->load->view('admin/template/header', $data);
    //     $this->load->view('admin/template/sidebar', $data);
    //     $this->load->view('admin/v_kirim', $data);
    //     $this->load->view('admin/template/footer');
    // }
    public function tambah()
    {
        $data['kd_surat'] = $this->input->post('kd_surat');
        $data['nip_dinas'] = $this->input->post('nip_dinas');
        // var_dump($data);

        $this->db->insert('posisi', $data);
        redirect('surat');
    }
    public function Pegawai()
    {
        $data['kd_surat'] = $this->input->post('kd_surat');
        $data['nip_sub'] = $this->input->post('nip_sub');
        $data['ket'] = $this->input->post('ket');


        $this->db->insert('disposisi', $data);
        redirect('user/home');
    }
}
