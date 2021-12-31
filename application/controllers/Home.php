<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        //$this->load->model('M_surat');
    }

	public function index()
	{
		 $data= array(
            'title' => 'ADMIN SIMASDIK',
			'user' => $this->db->get_where('user', ['nim' => $this->session->userdata('nim')]) ->row_array()
		);
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/template/sidebar',$data);
		$this->load->view('admin/home',$data);
		$this->load->view('admin/template/footer');
	}

	public function simpan()
    {
        $config['upload_path']="./assets/file";
        $config['allowed_types']='pdf';
        $config['max_size']= 5048;

        $this->load->library('upload',$config);

        if(!$this->upload->do_upload('file'))
        {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('admin/home', $error);
        } else {
            // menangkap data isian form inputan
            $data['kd_surat'] = $this->input->post('kode');
            $data['nm_surat'] = $this->input->post('nama');
			$data['perihal'] = $this->input->post('perihal');
            $data['tgl_surat'] = $this->input->post('tgl');
            $data['file'] = $this->upload->data('file_name');

            $this->db->insert('surat', $data); 

            redirect('Surat');
        }
	}  
}
