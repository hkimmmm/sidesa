<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper(['url', 'form']);
	}

	public function login()
	{

		$data['title'] = 'Login';
		$this->load->view('layouts/login', $data);
	}

	public function registrasi()
	{

		$data['title'] = 'Registrasi';
		$this->load->view('layouts/registrasi', $data);
	}
}
