<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Berita', 'm_berita');
        if ($this->session->userdata('email')) {
            return true;
        } 
        else {
            redirect('admin/masuk');
        }
    }

    public function index(){
        $data['berita'] = $this->m_berita->get()->result();
        $data['title'] = 'Data Berita';
        $data['sub_title'] = 'Berikut daftar data berita';
        templateadmin('admin/berita/v_list', $data);
    }

    public function tambah(){
        $data['title'] = 'Tambah Data Berita';
        $data['sub_title'] = 'Berikut formulir untuk menambahkan data berita';
        templateadmin('admin/berita/v_tambah', $data);
    }
    
    public function simpan(){
        $this->form_validation->set_rules('judul', 'Judul', 'trim|required');
        $this->form_validation->set_rules('konten', 'Isi Berita', 'trim|required');

        if($this->form_validation->run() == false){
            redirect('admin/berita/tambah');
        }
        else {
            $data = [
                'judul' => $this->input->post('judul'),
                'slug' => slugify($this->input->post('judul')),
                'konten' => $this->input->post('konten'),

            ];
             if($_FILES['gambar']['size']){
                $image_path = realpath(APPPATH . '../assets/img/berita');
                $config['allowed_types']        = 'gif|jpg|jpeg|png';
                $config['file_name']            = slugify($this->input->post('judul')).rand(1000,9999);
                $config['overwrite']            = true;
                $config['max_size']             = 3024; // 3MB
                $config['upload_path']          = './assets/img/berita/';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('gambar')) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Upload Gambar Berita </div>');
                    redirect('admin/berita/tambah');
                    exit;
                }
                else {
                    $uploaded_data = $this->upload->data();
                    $data['gambar'] = $uploaded_data['file_name'];
                }
            }
            $this->m_berita->add($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambah Berita</div>');
            redirect('admin/berita');
        }
    }

    public function edit($id){
        $data['berita'] = $this->m_berita->get(['id' => $id])->row();
        $data['title'] = 'Edit Data Berita';
        $data['sub_title'] = 'Berikut formulir untuk mengubah data berita';
        templateadmin('admin/berita/v_edit', $data);
    }

    public function up_edit($id){
        $this->form_validation->set_rules('judul', 'Judul', 'trim|required');
        $this->form_validation->set_rules('konten', 'Isi Artikel', 'trim|required');

        if($this->form_validation->run() == false){
            redirect('admin/berita/edit/'.$id);
        }
        else {
            if($_FILES['gambar']['size']){
                $image_path = realpath(APPPATH . '../assets/img/berita');
                $config['allowed_types']        = 'gif|jpg|jpeg|png';
                $config['file_name']            = slugify($this->input->post('judul')).rand(1000,9999);
                $config['overwrite']            = true;
                $config['max_size']             = 3024; // 3MB
                $config['upload_path']          = './assets/img/berita/';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('gambar')) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Merubah Gambar Berita</div>');
                    redirect('admin/berita/edit/'.$id);
                }
                else {
                    $produk_lama = $this->m_berita->get(['id' => $id])->row();
                    $path_delete = base_url().'/assets/img/berita/'.$produk_lama->gambar;
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
                    $this->m_berita->up($data, $id);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Merubah Berita</div>');
                    redirect('admin/berita');
                }
            }
            else {
                $data = [
                    'judul' => $this->input->post('judul'),
                    'slug' => slugify($this->input->post('judul')),
                    'konten' => $this->input->post('konten'),

                ];
                $hasil = $this->m_berita->up($data, $id);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Merubah Berita</div>');
                redirect('admin/berita');
            }
        }
    }

    public function hapus($id){
        $berita_lama = $this->m_berita->get(['id' => $id])->row();
        $path_delete = base_url().'/assets/img/berita/'.$berita_lama->gambar;
        if(file_exists($path_delete)){
            unlink($path_delete); 
        }
        $this->m_berita->delete(['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menghapus Berita</div>');
        redirect('admin/berita');
    }
}