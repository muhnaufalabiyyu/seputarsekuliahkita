<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->cekpage();
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if($this->form_validation->run()==false){
            $data['title'] = "Login";
            $this->load->view('admin/v_login', $data);
        }else{
            $this->masuk();
        }
    }

    public function masuk(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $admin = $this->db->get_where('admin', ['email' => $email])->row_array();

        //Jika usernya ada
        if ($admin) {
            if (password_verify($password, $admin['password'])) {
                $data = [
                    'email'     => $admin['email'],
                    'nama'    => $admin['nama'],
                    'id'    => $admin['id']
                ];
                $this->session->set_userdata($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat Datang di Halaman Admin PahitManis.</div>');
                redirect('admin/beranda');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
                redirect('admin/masuk');
            }
        }
        else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><center>Email tidak terdaftar!</center></div>');
            redirect('admin/masuk');
        }
    }

    public function cekpage(){
        if ($this->session->userdata('email')) {
            redirect('admin/beranda');
        }
    }

    public function keluar(){
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('nama');
        redirect('/admin');
    }
}