<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Artikel', 'm_artikel');
    }

    public function index(){
        $data['artikel'] = $this->m_artikel->get()->result();
        $data['title'] = 'Artikel';
        template('artikel/v_artikel', $data);
    }

    public function detail($slug)
    {
        $data['title'] = 'Artikel';
        $data['artikel'] = $this->m_artikel->get(['slug' => $slug])->row();
        template('artikel/v_detail', $data);
    }
}