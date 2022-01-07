<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Pengaduan', 'm_pengaduan');
    }

	public function index()
	{
		$data['title'] = 'Home';
        template('v_beranda', $data);
	}

	public function pengaduan()
	{
		$data['title'] = 'Pengaduan';
        template('v_pengaduan', $data);
	}

	public function simpan(){
		$this->form_validation->set_rules('jenis', 'Jenis', 'trim|required');
		$this->form_validation->set_rules('angkatan', 'Angkatan', 'trim|required');
		$this->form_validation->set_rules('aduan', 'Isi', 'trim|required');
		if($this->form_validation->run() == false){
            redirect('pengaduan');
        }
        else {
            $data = [
                'jenis' => $this->input->post('jenis'),
                'angkatan' => $this->input->post('angkatan'),
                'aduan' => $this->input->post('aduan'),
            ];
            if($_FILES['berkas']['size']){
                $image_path = realpath(APPPATH . '../assets/img/aduan');
                $config['allowed_types']        = 'gif|jpg|jpeg|png|doc|docx|xls|xlsx|zip|pdf|rar';
                $config['file_name']            = rand(1000,9999);
                $config['overwrite']            = true;
                $config['max_size']             = 5024; // 5MB
                $config['upload_path']          = './assets/img/aduan/';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('berkas')) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Upload Berkas Aduan </div>');
                    redirect('pengaduan');
                    exit;
                }
                else {
                    $uploaded_data = $this->upload->data();
                    $data['berkas'] = $uploaded_data['file_name'];
                }
            }
            $this->m_pengaduan->add($data);
            $this->session->set_flashdata('message', 'Berhasil Mengirimankan Aduan');
            redirect('pengaduan');
        }
        $this->session->unset_userdata('message');
	}
}
