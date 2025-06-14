<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	public function login()
	{
		// Cek jika sudah login, redirect sesuai role
		if ($this->session->userdata('user_id')) {
			$this->_redirect_by_role();
			return;
		}

		// Validasi form
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			// Tampilkan form login jika validasi gagal
			$data['title'] = 'Login';
			$this->load->view('pages/auth/login', $data);
		} else {
			// Proses login
			$username = $this->input->post('username', TRUE);
			$password = $this->input->post('password', TRUE);

			$user = $this->User_model->get_user_by_username($username);

			if ($user && password_verify($password, $user->password)) {
				// Set data sesi
				$session_data = [
					'user_id' => $user->id,
					'username' => $user->username,
					'role' => $user->role,
					'nama' => $user->nama,
					'logged_in' => TRUE
				];
				$this->session->set_userdata($session_data);

				// Redirect berdasarkan role
				$this->_redirect_by_role();
			} else {
				// Gagal login
				$this->session->set_flashdata('error', 'Username atau password salah');
				redirect('auth/login');
			}
		}
	}

	public function logout()
	{
		// Hancurkan semua data sesi
		$this->session->sess_destroy();
		// Set pesan konfirmasi
		$this->session->set_flashdata('message', 'Berhasil logout');
		// Redirect ke halaman login
		redirect('auth/login');
	}

	private function _redirect_by_role()
	{
		$role = $this->session->userdata('role');
		switch ($role) {
			case 'admin':
				redirect('admin');
				break;
			case 'kepala':
				redirect('kepala');
				break;
			case 'user':
				redirect('user/dashboard');
				break;
			default:
				redirect('auth/login'); // Fallback
		}
	}
}
