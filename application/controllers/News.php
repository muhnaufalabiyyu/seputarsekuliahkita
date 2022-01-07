<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Berita', 'm_berita');
    }

	public function index()
	{
		$data['title'] = 'News';
		$data['berita'] = $this->m_berita->get()->result();
        template('news/v_news', $data);
	}

	public function detail($slug)
	{
		$data['title'] = 'News';
		$data['berita'] = $this->m_berita->get(['slug' => $slug])->row();
        template('news/v_detail', $data);
	}
}
