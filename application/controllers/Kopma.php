<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kopma extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Koperasi Mahasiswa';
        template('v_kopma', $data);
	}
}