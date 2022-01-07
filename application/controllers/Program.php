<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Program extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Program Studi';
        template('v_program', $data);
	}

	public function proditkp()
	{
		$data['title'] = 'Teknik Kimia Polimer';
        template('v_program_tkp', $data);
	}

	public function prodisiio()
	{
		$data['title'] = 'Sistem Informasi Industri Otomotif';
        template('v_program_siio', $data);
	}
	public function prodiabo()
	{
		$data['title'] = 'Administrasi Bisnis Otomotif';
        template('v_program_abo', $data);
	}
	public function proditio()
	{
		$data['title'] = 'Teknik Industri Otomotif';
        template('v_program_tio', $data);
	}	
	public function proditro()
	{
		$data['title'] = 'Teknologi Rekayasa Otomotif';
        template('v_program_tro', $data);
	}
}
