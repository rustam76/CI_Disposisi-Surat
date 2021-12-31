<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct() 
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {

        $this->form_validation->set_rules('nim','Nim', 'required|trim', ['required'=>'tidak boleh kosong!'] );
        $this->form_validation->set_rules('password','Password', 'required|trim', ['required'=>'tidak boleh kosong!'] );

        if($this->form_validation->run() == FALSE)
        {
            $title['judul'] = 'Login-Siakad';
            $this->load->view('auth/login', $title);
        }
        else 

        if ($this->form_validation->run() == FALSE)
        {
            $title['judul'] = 'Login-Siakad';
            $this->load->view('auth/login', $title);
        } else
            {
                $this->login();
            }

    }

    private function login()
    {
        $nim=$this->input->post('nim');
        $password=$this->input->post('password');

        $user =$this->db->get_where('user', ['nim' => $nim])->row_array();
        
        if ($user)
        { //jika user login

            //cek password
            if(password_verify($password, $user['password'])) 
            {
                //pasword_verify(untuk mengecek pass)
                $data=array(
                    'nim' => $user['nim'],
                    'role_id' => $user['role_id']
                );

                $this->session->set_userdata($data);
                if($user['role_id'] == 1)
                {
                    redirect('Home');
                } 
                if($user['role_id'] == 2)
                {
                    redirect('user/Home');
                }else{
                    redirect('pegawai/Home');
                }
                
            } 
            else 
            {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger" role="alert">
                        Maaf Password Salah!
                    </div>'
                );

                redirect('Auth');

            } 
            
        } else 
        {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger" role="alert">
                    NPM Tidak Terdaftar!
                </div>'
            );
            redirect('Auth');
        }

    }

    public function logout ()
    {
        $this->session->unset_userdata['nim'];
        $this->session->unset_userdata['root_id'];

        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-danger" role="alert">
                Berhasil Logout!
            </div>'
        );
        redirect('Auth');
    }
    


}
