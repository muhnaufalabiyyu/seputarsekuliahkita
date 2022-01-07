<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Library extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Library', 'm_library');
    }

    public function index(){
        $data['library'] = $this->m_library->get(null, 3)->result();
        $data['title'] = 'E-Library';
        template('library/v_library', $data);
    }

    public function all(){
        if(@$_GET['search'] != null){
            $this->db->like('judul', @$_GET['search']);
            if(@$_GET['category'] != null){
                $this->db->where('kategori', @$_GET['category']);
            }
            $library = $this->db->get('library');
            $data['library'] = $library->result();
        }
        else {
            if(@$_GET['category'] != null){
                $data['library'] = $this->m_library->get(['kategori' => @$_GET['category']])->result();
            }
            else {
                $data['library'] = $this->m_library->get()->result();
            }
        }
        $data['title'] = 'E-Library';
        template('library/v_library_full', $data);
    }

    public function detail($slug)
    {
        $data['title'] = 'Library';
        $data['library'] = $this->m_library->get(['slug' => $slug])->row();
        template('library/v_detail', $data);
    }
}