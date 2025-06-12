<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelurahan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// Load model atau helper jika diperlukan
	}

	public function profile()
	{
		$data['title'] = 'Profile Desa Procot';

		$this->load->view('layouts/profil_desa', $data);
	}

	public function sejarah()
	{
		$data['title'] = 'Sejarah Kelurahan';

		$this->load->view('layouts/sejarah_kelurahan', $data);
	}

	public function visi_misi()
	{
		$data['title'] = 'Visi & Misi';

		$this->load->view('layouts/visi_misi', $data);
	}
}
