<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Event', 'm_event');
        if ($this->session->userdata('email')) {
            return true;
        } 
        else {
            redirect('admin/masuk');
        }
    }

    public function index(){
        $data['event'] = $this->m_event->get()->result();
        $data['title'] = 'Data Event';
        $data['sub_title'] = 'Berikut daftar data event';
        templateadmin('admin/event/v_list', $data);
    }

    public function tambah(){
        $data['title'] = 'Tambah Data Event';
        $data['sub_title'] = 'Berikut formulir untuk menambahkan data event';
        templateadmin('admin/event/v_tambah', $data);
    }
    
    public function simpan(){
        $this->form_validation->set_rules('judul', 'Judul', 'trim|required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
        $this->form_validation->set_rules('tgl', 'Tanggal', 'trim|required');
        $this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'trim|required');
        $this->form_validation->set_rules('jam_selesai', 'Jam Selesai', 'trim|required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'trim|required');
        $this->form_validation->set_rules('no_kontak', 'Nomor Kontak', 'trim|required');
        $this->form_validation->set_rules('link_register', 'Link Registrasi', 'trim|required');

        if($this->form_validation->run() == false){
            redirect('admin/event/tambah');
        }
        else {
            $data = [
                'judul' => $this->input->post('judul'),
                'kategori' => $this->input->post('kategori'),
                'tgl' => $this->input->post('tgl'),
                'jam_mulai' => $this->input->post('jam_mulai'),
                'jam_selesai' => $this->input->post('jam_selesai'),
                'lokasi' => $this->input->post('lokasi'),
                'no_kontak' => $this->input->post('no_kontak'),
                'link_register' => $this->input->post('link_register'),

            ];
             if($_FILES['gambar']['size']){
                $image_path = realpath(APPPATH . '../assets/img/event');
                $config['allowed_types']        = 'gif|jpg|jpeg|png';
                $config['file_name']            = slugify($this->input->post('judul')).rand(1000,9999);
                $config['overwrite']            = true;
                $config['max_size']             = 3024; // 3MB
                $config['upload_path']          = './assets/img/event/';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('gambar')) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Upload Gambar Event </div>');
                    redirect('admin/event/tambah');
                    exit;
                }
                else {
                    $uploaded_data = $this->upload->data();
                    $data['gambar'] = $uploaded_data['file_name'];
                }
            }
            $this->m_event->add($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambah Event</div>');
            redirect('admin/event');
        }
    }

    public function edit($id){
        $data['event'] = $this->m_event->get(['id' => $id])->row();
        $data['title'] = 'Edit Data Event';
        $data['sub_title'] = 'Berikut formulir untuk mengubah data event';
        templateadmin('admin/event/v_edit', $data);
    }

    public function up_edit($id){
        $this->form_validation->set_rules('judul', 'Judul', 'trim|required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
        $this->form_validation->set_rules('tgl', 'Tanggal', 'trim|required');
        $this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'trim|required');
        $this->form_validation->set_rules('jam_selesai', 'Jam Selesai', 'trim|required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'trim|required');
        $this->form_validation->set_rules('no_kontak', 'Nomor Kontak', 'trim|required');
        $this->form_validation->set_rules('link_register', 'Link Registrasi', 'trim|required');

        if($this->form_validation->run() == false){
            redirect('admin/event/edit/'.$id);
        }
        else {
            if($_FILES['gambar']['size']){
                $image_path = realpath(APPPATH . '../assets/img/event');
                $config['allowed_types']        = 'gif|jpg|jpeg|png';
                $config['file_name']            = slugify($this->input->post('judul')).rand(1000,9999);
                $config['overwrite']            = true;
                $config['max_size']             = 3024; // 3MB
                $config['upload_path']          = './assets/img/event/';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('gambar')) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Merubah Gambar Event</div>');
                    redirect('admin/event/edit/'.$id);
                }
                else {
                    $event_lama = $this->m_event->get(['id' => $id])->row();
                    $path_delete = base_url().'/assets/img/event/'.$event_lama->gambar;
                    if(file_exists($path_delete)){
                        unlink($path_delete); 
                    }
                    $uploaded_data = $this->upload->data();
                    $data = [
                        'judul' => $this->input->post('judul'),
                        'kategori' => $this->input->post('kategori'),
                        'tgl' => $this->input->post('tgl'),
                        'jam_mulai' => $this->input->post('jam_mulai'),
                        'jam_selesai' => $this->input->post('jam_selesai'),
                        'lokasi' => $this->input->post('lokasi'),
                        'no_kontak' => $this->input->post('no_kontak'),
                        'link_register' => $this->input->post('link_register'),
                        'gambar'       => $uploaded_data['file_name']

                    ];
                    $this->m_event->up($data, $id);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Merubah Event</div>');
                    redirect('admin/event');
                }
            }
            else {
                $data = [
                    'judul' => $this->input->post('judul'),
                    'kategori' => $this->input->post('kategori'),
                    'tgl' => $this->input->post('tgl'),
                    'jam_mulai' => $this->input->post('jam_mulai'),
                    'jam_selesai' => $this->input->post('jam_selesai'),
                    'lokasi' => $this->input->post('lokasi'),
                    'no_kontak' => $this->input->post('no_kontak'),
                    'link_register' => $this->input->post('link_register'),

                ];
                $hasil = $this->m_event->up($data, $id);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Merubah Event</div>');
                redirect('admin/event');
            }
        }
    }

    public function hapus($id){
        $event_lama = $this->m_event->get(['id' => $id])->row();
        $path_delete = base_url().'/assets/img/event/'.$event_lama->gambar;
        if(file_exists($path_delete)){
            unlink($path_delete); 
        }
        $this->m_event->delete(['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menghapus Event</div>');
        redirect('admin/event');
    }
}