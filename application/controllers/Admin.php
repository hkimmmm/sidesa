<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// Load model atau helper jika diperlukan
	}

	public function index()
	{
		$data['title'] = 'Dashboard';

		$this->load->view('layouts/admin', $data);
	}

	public function organisasi()
	{
		$user_id = $this->session->userdata('user_id');
		$data['title'] = 'Organisasi';

		$this->load->view('layouts/organisasi', $data);
	}

	public function prasarana()
	{
		$user_id = $this->session->userdata('user_id');
		$data['title'] = 'Prasarana';

		$this->load->view('layouts/prasarana', $data);
	}
}
