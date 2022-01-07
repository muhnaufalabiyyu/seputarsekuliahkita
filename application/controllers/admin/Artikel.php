<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Artikel', 'm_artikel');
        if ($this->session->userdata('email')) {
            return true;
        } 
        else {
            redirect('admin/masuk');
        }
    }

    public function index(){
        $data['artikel'] = $this->m_artikel->get()->result();
        $data['title'] = 'Data Artikel';
        $data['sub_title'] = 'Berikut daftar data artikel';
        templateadmin('admin/artikel/v_list', $data);
    }

    public function tambah(){
        $data['title'] = 'Tambah Data Artikel';
        $data['sub_title'] = 'Berikut formulir untuk menambahkan data artikel';
        templateadmin('admin/artikel/v_tambah', $data);
    }
    
    public function simpan(){
        $this->form_validation->set_rules('judul', 'Judul', 'trim|required');
        $this->form_validation->set_rules('konten', 'Isi Artikel', 'trim|required');

        if($this->form_validation->run() == false){
            redirect('admin/artikel/tambah');
        }
        else {
            $data = [
                'judul' => $this->input->post('judul'),
                'slug' => slugify($this->input->post('judul')),
                'konten' => $this->input->post('konten'),

            ];
             if($_FILES['gambar']['size']){
                $image_path = realpath(APPPATH . '../assets/img/artikel');
                $config['allowed_types']        = 'gif|jpg|jpeg|png';
                $config['file_name']            = slugify($this->input->post('judul')).rand(1000,9999);
                $config['overwrite']            = true;
                $config['max_size']             = 3024; // 3MB
                $config['upload_path']          = './assets/img/artikel/';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('gambar')) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Upload Gambar Artikel </div>');
                    redirect('admin/artikel/tambah');
                    exit;
                }
                else {
                    $uploaded_data = $this->upload->data();
                    $data['gambar'] = $uploaded_data['file_name'];
                }
            }
            $this->m_artikel->add($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambah Artikel</div>');
            redirect('admin/artikel');
        }
    }

    public function edit($id){
        $data['artikel'] = $this->m_artikel->get(['id' => $id])->row();
        $data['title'] = 'Edit Data Artikel';
        $data['sub_title'] = 'Berikut formulir untuk mengubah data artikel';
        templateadmin('admin/artikel/v_edit', $data);
    }

    public function up_edit($id){
        $this->form_validation->set_rules('judul', 'Judul', 'trim|required');
        $this->form_validation->set_rules('konten', 'Isi Artikel', 'trim|required');

        if($this->form_validation->run() == false){
            redirect('admin/artikel/edit/'.$id);
        }
        else {
            if($_FILES['gambar']['size']){
                $image_path = realpath(APPPATH . '../assets/img/artikel');
                $config['allowed_types']        = 'gif|jpg|jpeg|png';
                $config['file_name']            = slugify($this->input->post('judul')).rand(1000,9999);
                $config['overwrite']            = true;
                $config['max_size']             = 3024; // 3MB
                $config['upload_path']          = './assets/img/artikel/';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('gambar')) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Merubah Gambar Artikel</div>');
                    redirect('admin/artikel/edit/'.$id);
                }
                else {
                    $artikel_lama = $this->m_artikel->get(['id' => $id])->row();
                    $path_delete = base_url().'/assets/img/artikel/'.$artikel_lama->gambar;
                    if(file_exists($path_delete)){
                        unlink($path_delete); 
                    }
                    $uploaded_data = $this->upload->data();
                    $data = [
                        'judul' => $this->input->post('judul'),
                        'slug' => slugify($this->input->post('judul')),
                        'konten' => $this->input->post('konten'),
                        'gambar'       => $uploaded_data['file_name']

                    ];
                    $this->m_artikel->up($data, $id);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Merubah Artikel</div>');
                    redirect('admin/artikel');
                }
            }
            else {
                $data = [
                    'judul' => $this->input->post('judul'),
                    'slug' => slugify($this->input->post('judul')),
                    'konten' => $this->input->post('konten'),

                ];
                $hasil = $this->m_artikel->up($data, $id);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Merubah Artikel</div>');
                redirect('admin/artikel');
            }
        }
    }

    public function hapus($id){
        $artikel_lama = $this->m_artikel->get(['id' => $id])->row();
        $path_delete = base_url().'/assets/img/artikel/'.$artikel_lama->gambar;
        if(file_exists($path_delete)){
            unlink($path_delete); 
        }
        $this->m_artikel->delete(['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menghapus Artikel</div>');
        redirect('admin/artikel');
    }
}