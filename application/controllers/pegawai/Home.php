<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->model('M_surat');
    }

    public function index()
    {
        $data = array(
            'title' => 'Dashboard',
            'surat' => $this->M_surat->pegawai('surat'),
            'user' => $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array()
        );
        $this->load->view('admin/template/header', $data);
        $this->load->view('pegawai/template/sidebar', $data);
        $this->load->view('pegawai/v_home', $data);
        $this->load->view('admin/template/footer');
    }
    public function surat()
    {
        $data = array(
            'title' => 'surat',
            'user' => $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array(),
            'surat' => $this->M_surat->pegawai('surat')

        );
        $this->load->view('admin/template/header', $data);
        $this->load->view('pegawai/template/sidebar', $data);
        $this->load->view('pegawai/v_surat', $data);
        $this->load->view('admin/template/footer');
    }
}
