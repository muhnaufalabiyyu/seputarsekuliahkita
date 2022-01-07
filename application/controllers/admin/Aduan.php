<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aduan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Pengaduan', 'm_pengaduan');
        if ($this->session->userdata('email')) {
            return true;
        } 
        else {
            redirect('admin/masuk');
        }
    }

    public function index(){
        $data['pengaduan'] = $this->m_pengaduan->get()->result();
        $data['title'] = 'Data Aduan';
        $data['sub_title'] = 'Berikut daftar data aduan';
        templateadmin('admin/aduan/v_list', $data);
    }
}