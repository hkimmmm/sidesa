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
		if ($this->session->userdata('user_id')) {
			$this->_redirect_by_role();
			return;
		}

		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Login';
			$this->load->view('pages/auth/login', $data);
		} else {
			$username = $this->input->post('username', TRUE);
			$password = $this->input->post('password', TRUE);

			$user = $this->User_model->get_user_by_username($username);

			if ($user) {
				if ($user->is_active != 1) {
					// Jika akun nonaktif
					$this->session->set_flashdata('error', 'Akun Anda tidak aktif. Silakan hubungi admin.');
					redirect('auth/login');
				}

				if (password_verify($password, $user->password)) {
					$session_data = [
						'user_id' => $user->id,
						'username' => $user->username,
						'role' => $user->role,
						'nama' => $user->nama,
						'logged_in' => TRUE
					];
					$this->session->set_userdata($session_data);

					$this->_redirect_by_role();
				} else {
					$this->session->set_flashdata('error', 'Username atau password salah');
					redirect('auth/login');
				}
			} else {
				$this->session->set_flashdata('error', 'Username atau password salah');
				redirect('auth/login');
			}
		}
	}

	public function register()
	{
		if ($this->session->userdata('user_id')) {
			$this->_redirect_by_role();
			return;
		}

		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', [
			'is_unique' => 'Email ini sudah terdaftar'
		]);
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[users.username]', [
			'is_unique' => 'Username ini sudah digunakan'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('password_conf', 'Konfirmasi Password', 'required|matches[password]');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Registrasi User';
			$this->load->view('pages/auth/register', $data);
		} else {
			$data = [
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'username' => htmlspecialchars($this->input->post('username', true)),
				'password' => $this->input->post('password', true), // TANPA password_hash
				'role' => 'user',
				'created_at' => date('Y-m-d H:i:s')
			];

			if ($this->User_model->create($data)) {
				$this->session->set_flashdata('success', 'Registrasi berhasil! Silakan login.');
				redirect('auth/login');
			} else {
				$this->session->set_flashdata('error', 'Gagal melakukan registrasi. Silakan coba lagi.');
				redirect('auth/register');
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata('message', 'Berhasil logout');
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
				redirect('pengajuan');
				break;
			default:
				redirect('auth/login');
		}
	}
}
