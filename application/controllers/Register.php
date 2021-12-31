<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
        // membuat rules/aturan2
        $this->form_validation->set_rules('nama', 'Masukkan Nama Lengkap Anda', 'required|trim');
        $this->form_validation->set_rules('nim', 'Masukkan Nip Anda', 'required|trim|is_unique[user.nim]');

        //form (nama, npm)

        $this->form_validation->set_rules('email', 'Masukkan E-Mail Anda', 'required|trim|valid_email');
        $this->form_validation->set_rules(
            'password1',
            'Masukkan Password Anda',
            'required|trim|min_length[5]|matches[password2]',
            //trim (tidak ada spasi diawal)
            //required(tidak boleh kosong)
            //is_uniqeu(sudah pernah dipakai)
            //valid_email(wajib format email)
            //min_length(minimal huruf/angka)
            //matches(sama dengan pass sebelumnya/pass1)

            [
                'min_length' => 'Password minimal 5 huruf...!!!',
                'matches' => 'Password Harus Sama...!!!'
            ]

        );

        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == FALSE) {
            $title['judul'] = 'Register-Persuratan';
            $this->load->view('auth/register', $title);
        } else {
            $data = array(
                //htmlspecialchars buat tidak sembarang memasukkan style h1 dll
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'nim' => htmlspecialchars($this->input->post('nim', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 3

                //password_hash(mengacak password)
                //htmlspecialchars(menolak tulisan2 aneh seperti h1/style)
            );

            $this->db->insert('user', $data);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-succes" role="alert">
                        Akun berhasil dibuat, silahkan login!
                    </div>'
            );

            redirect('auth');
        }
    }
}
