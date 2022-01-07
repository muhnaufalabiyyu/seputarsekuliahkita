<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Library extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Library', 'm_library');
        $this->load->helper('skk');
        if ($this->session->userdata('email')) {
            return true;
        } 
        else {
            redirect('admin/masuk');
        }
    }

    public function index(){
        $data['library'] = $this->m_library->get()->result();
        $data['title'] = 'Data E-Library';
        $data['sub_title'] = 'Berikut daftar data e-library';
        templateadmin('admin/library/v_list', $data);
    }

    public function tambah(){
        $data['title'] = 'Tambah Data E-Library';
        $data['sub_title'] = 'Berikut formulir untuk menambahkan data e-library';
        templateadmin('admin/library/v_tambah', $data);
    }
    
    public function simpan(){
        $this->form_validation->set_rules('judul', 'Judul', 'trim|required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
        $this->form_validation->set_rules('pengarang', 'Pengarang', 'trim|required');
        $this->form_validation->set_rules('tahun_terbit', 'Tahun Terbit', 'trim|required');
        $this->form_validation->set_rules('genre', 'Genre', 'trim|required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');

        if($this->form_validation->run() == false){
            redirect('admin/e-library/tambah');
        }
        else {
            $data = [
                'judul' => $this->input->post('judul'),
                'slug' => $this->slugify($this->input->post('judul')),
                'kategori' => $this->input->post('kategori'),
                'pengarang' => $this->input->post('pengarang'),
                'tahun_terbit' => $this->input->post('tahun_terbit'),
                'genre' => $this->input->post('genre'),
                'deskripsi' => $this->input->post('deskripsi'),

            ];
            if($_FILES['file']['size']){
                $image_path = realpath(APPPATH . '../assets/img/library');
                $config['allowed_types']        = 'pdf';
                $config['file_name']            = 'file-'.$this->slugify($this->input->post('judul')).rand(1000,9999);
                $config['overwrite']            = true;
                $config['max_size']             = 51200; // 50MB
                $config['upload_path']          = './assets/img/library/';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('file')) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Upload File E-Library </div>');
                    redirect('admin/e-library/tambah');
                    exit;
                }
                else {
                    $uploaded_data = $this->upload->data();
                    $data['file'] = $uploaded_data['file_name'];
                }
            }
            if($_FILES['gambar']['size']){
                $image_path = realpath(APPPATH . '../assets/img/library');
                $config['allowed_types']        = 'gif|jpg|jpeg|png';
                $config['file_name']            = $this->slugify($this->input->post('judul')).rand(1000,9999);
                $config['overwrite']            = true;
                $config['max_size']             = 3024; // 3MB
                $config['upload_path']          = './assets/img/library/';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('gambar')) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Upload Gambar E-Library </div>');
                    redirect('admin/e-library/tambah');
                    exit;
                }
                else {
                    $uploaded_data = $this->upload->data();
                    $data['gambar'] = $uploaded_data['file_name'];
                }
            }
            $this->m_library->add($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambah E-Library</div>');
            redirect('admin/e-library');
        }
    }

    public function edit($id){
        $data['library'] = $this->m_library->get(['id' => $id])->row();
        $data['title'] = 'Edit Data E-Library';
        $data['sub_title'] = 'Berikut formulir untuk mengubah data e-library';
        templateadmin('admin/library/v_edit', $data);
    }

    public function up_edit($id){
        $this->form_validation->set_rules('judul', 'Judul', 'trim|required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
        $this->form_validation->set_rules('pengarang', 'Pengarang', 'trim|required');
        $this->form_validation->set_rules('tahun_terbit', 'Tahun Terbit', 'trim|required');
        $this->form_validation->set_rules('genre', 'Genre', 'trim|required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');

        if($this->form_validation->run() == false){
            redirect('admin/e-library/edit/'.$id);
        }
        else {
            $data = [
                'judul' => $this->input->post('judul'),
                'slug' => $this->slugify($this->input->post('judul')),
                'kategori' => $this->input->post('kategori'),
                'pengarang' => $this->input->post('pengarang'),
                'tahun_terbit' => $this->input->post('tahun_terbit'),
                'genre' => $this->input->post('genre'),
                'deskripsi' => $this->input->post('deskripsi'),

            ];
            if($_FILES['file']['size']){
                $image_path = realpath(APPPATH . '../assets/img/library');
                $config['allowed_types']        = 'pdf';
                $config['file_name']            = 'file-'.$this->slugify($this->input->post('judul')).rand(1000,9999);
                $config['overwrite']            = true;
                $config['max_size']             = 3024; // 3MB
                $config['upload_path']          = './assets/img/library/';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('file')) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Upload File E-Library </div>');
                    redirect('admin/e-library/tambah');
                    exit;
                }
                else {
                    $library_lama = $this->m_library->get(['id' => $id])->row();
                    $path_delete = base_url().'/assets/img/library/'.$library_lama->file;
                    if(file_exists($path_delete)){
                        unlink($path_delete); 
                    }
                    $uploaded_data = $this->upload->data();
                    $data['file'] = $uploaded_data['file_name'];
                }
            }
            if($_FILES['gambar']['size']){
                $image_path = realpath(APPPATH . '../assets/img/library');
                $config['allowed_types']        = 'gif|jpg|jpeg|png';
                $config['file_name']            = $this->slugify($this->input->post('judul')).rand(1000,9999);
                $config['overwrite']            = true;
                $config['max_size']             = 3024; // 3MB
                $config['upload_path']          = './assets/img/library/';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('gambar')) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Merubah Gambar E-Library</div>');
                    redirect('admin/e-library/edit/'.$id);
                    exit;
                }
                else {
                    $library_lama = $this->m_library->get(['id' => $id])->row();
                    $path_delete = base_url().'/assets/img/library/'.$library_lama->gambar;
                    if(file_exists($path_delete)){
                        unlink($path_delete); 
                    }
                    $uploaded_data = $this->upload->data();
                    $data['gambar'] = $uploaded_data['file_name'];
                }
            }
            $hasil = $this->m_library->up($data, $id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Merubah E-Library</div>');
            redirect('admin/e-library');
        }
    }

    public function hapus($id){
        $library_lama = $this->m_library->get(['id' => $id])->row();
        $path_delete = base_url().'/assets/img/library/'.$library_lama->gambar;
        if(file_exists($path_delete)){
            unlink($path_delete); 
        }
        $path_delete = base_url().'/assets/img/library/'.$library_lama->file;
        if(file_exists($path_delete)){
            unlink($path_delete); 
        }
        $this->m_library->delete(['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menghapus E-Library</div>');
        redirect('admin/e-library');
    }
    
    function slugify($text, string $divider = '-')
    {
      // replace non letter or digits by divider
      $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
    
      // transliterate
      $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    
      // remove unwanted characters
      $text = preg_replace('~[^-\w]+~', '', $text);
    
      // trim
      $text = trim($text, $divider);
    
      // remove duplicate divider
      $text = preg_replace('~-+~', $divider, $text);
    
      // lowercase
      $text = strtolower($text);
    
      if (empty($text)) {
        return 'n-a';
      }
    
      return $text;
    }
}