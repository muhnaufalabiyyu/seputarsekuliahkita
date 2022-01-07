<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Pengaturan', 'm_pengaturan');
        $this->load->model('M_Pengaduan', 'm_pengaduan');
        $this->load->model('M_Artikel', 'm_artikel');
        $this->load->model('M_Berita', 'm_berita');
        $this->load->model('M_Event', 'm_event');
        $this->load->model('M_Library', 'm_library');
        if ($this->session->userdata('email')) {
            return true;
        } 
        else {
            redirect('admin/masuk');
        }
    }

    public function index(){
        $data['title'] = 'Beranda';
        $data['pengaduan'] = $this->m_pengaduan->get()->result();
        $data['artikel'] = $this->m_artikel->get()->result();
        $data['berita'] = $this->m_berita->get()->result();
        $data['event'] = $this->m_event->get()->result();
        $data['library'] = $this->m_library->get()->result();
        templateadmin('admin/v_beranda', $data);
    }

    public function pengaturan(){
        $data['pengaturan'] = $this->m_pengaturan->get(['id !=' => '0'])->row();
        $data['title'] = 'Pengaturan';
        $data['sub_title'] = 'Silahkan isi form dibawah ini';
        templateadmin('admin/v_pengaturan', $data);
    }

     public function simpan(){
        $data = [
            'nama_web' => $this->input->post('nama_web'),
            'deskripsi_web' => $this->input->post('deskripsi_web'),
            'alamat_web' => $this->input->post('alamat_web'),
            'email' => $this->input->post('email'),
            'no_kontak' => $this->input->post('no_kontak'),
            // 'embed' => $this->input->post('embed'),
            'facebook' => $this->input->post('facebook'),
            'instagram' => $this->input->post('instagram'),
            'twitter' => $this->input->post('twitter'),
            'linkedin' => $this->input->post('linkedin'),
        ];
        if($_FILES['logo']['size']){
            $image_path = realpath(APPPATH . '../assets/img');
            $config['allowed_types']        = 'gif|jpg|jpeg|png';
            $config['file_name']            = 'logo-'.rand(1000,9999);
            $config['overwrite']            = true;
            $config['max_size']             = 3024; // 3MB
            $config['upload_path']          = './assets/img/';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('logo')) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Upload Logo </div>');
                redirect('admin/pengaturan');
                exit;
            }
            else {
                $uploaded_data = $this->upload->data();
                $data['logo'] = $uploaded_data['file_name'];
            }
        }
        if($_FILES['logo_header']['size']){
            $image_path = realpath(APPPATH . '../assets/img');
            $config['allowed_types']        = 'gif|jpg|jpeg|png';
            $config['file_name']            = 'logo-header'.rand(1000,9999);
            $config['overwrite']            = true;
            $config['max_size']             = 3024; // 3MB
            $config['upload_path']          = './assets/img/';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('logo_header')) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Upload Logo Header</div>');
                redirect('admin/pengaturan');
                exit;
            }
            else {
                $uploaded_data = $this->upload->data();
                $data['logo_header'] = $uploaded_data['file_name'];
            }
        }

        if($_FILES['favicon']['size']){
            $image_path = realpath(APPPATH . '../assets/img');
            $config['allowed_types']        = 'gif|jpg|jpeg|png';
            $config['file_name']            = 'favicon-'.rand(1000,9999);
            $config['overwrite']            = true;
            $config['max_size']             = 3024; // 3MB
            $config['upload_path']          = './assets/img/';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('favicon')) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Upload Favicon </div>');
                redirect('admin/pengaturan');
                exit;
            }
            else {
                $uploaded_data = $this->upload->data();
                $data['favicon'] = $uploaded_data['file_name'];
            }
        }
        $cek = $this->m_pengaturan->get(['id !=' => '0'])->row();
        if($cek){
            if($data['logo']){
                $path_delete = base_url().'/assets/img/'.$pengaturan_lama->logo;
                if(file_exists($path_delete)){
                    unlink($path_delete); 
                }
            }
            if($data['logo_header']){
                $path_delete = base_url().'/assets/img/'.$pengaturan_lama->logo_header;
                if(file_exists($path_delete)){
                    unlink($path_delete); 
                }
            }
            if($data['favicon']){
                $path_delete = base_url().'/assets/img/'.$pengaturan_lama->favicon;
                if(file_exists($path_delete)){
                    unlink($path_delete); 
                }
            }
            $this->m_pengaturan->up($data, $cek->id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menyimpan Pengaturan</div>');
            redirect('admin/pengaturan');
        }
        else {
            $this->m_pengaturan->add($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menyimpan Pengaturan</div>');
            redirect('admin/pengaturan');
        }
    }
}