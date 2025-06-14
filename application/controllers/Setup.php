<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setup extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
	}

	public function create_admin()
	{
		$data = [
			'username' => 'wardiyanto',
			'email' => 'kepala@gmail.com',
			'password' => password_hash('kepala123', PASSWORD_DEFAULT), // Ganti password
			'role' => 'kepala',
			'nama' => 'Wardiyanto',
			'is_active' => 1
		];

		if ($this->User_model->create_admin($data)) {
			echo "Akun admin berhasil dibuat.";
		} else {
			echo "Gagal membuat akun admin.";
		}
	}
}
