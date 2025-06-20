<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->library('form_validation');

		// Proteksi halaman
		if (!$this->session->userdata('logged_in')) {
			redirect('auth/login');
		}

		// Cek role admin
		if ($this->session->userdata('role') != 'admin') {
			show_404();
		}
	}

	public function index()
	{
		$data['title'] = 'Manajemen User';

		$config['base_url'] = site_url('user/index');
		$config['total_rows'] = $this->User_model->count_all();
		$config['per_page'] = 10;
		$config['uri_segment'] = 3;

		$this->load->library('pagination', $config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data['users'] = $this->User_model->get_all([], $config['per_page'], $page);
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('layouts/user', $data);
	}

	public function create()
	{
		$data['title'] = 'Tambah User Baru';

		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[50]|is_unique[users.username]');
		$this->form_validation->set_rules('email', 'Email', 'valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|matches[password]');
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|max_length[100]');
		$this->form_validation->set_rules('role', 'Role', 'required|in_list[admin,kepala,user]');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('user/create', $data);
			$this->load->view('templates/footer');
		} else {
			$user_data = [
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password'),
				'nama' => $this->input->post('nama'),
				'role' => $this->input->post('role'),
				'is_active' => 1
			];

			$this->User_model->create($user_data);
			$this->session->set_flashdata('success', 'User berhasil ditambahkan');
			redirect('user');
		}
	}

	public function edit($id)
	{
		$data['title'] = 'Edit User';
		$data['user'] = $this->User_model->get_by_id($id);

		if (!$data['user']) {
			show_404();
		}

		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[50]');
		$this->form_validation->set_rules('email', 'Email', 'valid_email');
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|max_length[100]');
		$this->form_validation->set_rules('role', 'Role', 'required|in_list[admin,kepala,user]');

		if ($this->input->post('username') != $data['user']->username) {
			$this->form_validation->set_rules('username', 'Username', 'is_unique[users.username]');
		}

		if ($this->input->post('email') != $data['user']->email) {
			$this->form_validation->set_rules('email', 'Email', 'is_unique[users.email]');
		}

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('user/edit', $data);
			$this->load->view('templates/footer');
		} else {
			$user_data = [
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'nama' => $this->input->post('nama'),
				'role' => $this->input->post('role')
			];

			// Jika password diisi
			if ($this->input->post('password')) {
				$user_data['password'] = $this->input->post('password');
			}

			$this->User_model->update($id, $user_data);
			$this->session->set_flashdata('success', 'Data user berhasil diperbarui');
			redirect('user');
		}
	}

	public function delete($id)
	{
		// Cek apakah user yang akan dihapus ada
		$user = $this->User_model->get_by_id($id);
		if (!$user) {
			show_404();
		}

		// Tidak boleh hapus diri sendiri
		if ($user->id == $this->session->userdata('user_id')) {
			$this->session->set_flashdata('error', 'Anda tidak dapat menghapus akun sendiri');
			redirect('user');
		}

		$this->User_model->delete($id);
		$this->session->set_flashdata('success', 'User berhasil dinonaktifkan');
		redirect('user');
	}

	public function activate($id)
	{
		$user = $this->User_model->get_by_id($id);
		if (!$user) {
			show_404();
		}

		$this->User_model->activate($id);
		$this->session->set_flashdata('success', 'User berhasil diaktifkan');
		redirect('user');
	}

	public function check_username()
	{
		$username = $this->input->post('username');
		$exclude_id = $this->input->post('exclude_id');

		$exists = $this->User_model->username_exists($username, $exclude_id);

		echo json_encode([
			'valid' => !$exists,
			'message' => $exists ? 'Username sudah digunakan' : 'Username tersedia'
		]);
	}

	// API Endpoint untuk validasi email
	public function check_email()
	{
		$email = $this->input->post('email');
		$exclude_id = $this->input->post('exclude_id');

		$exists = $this->User_model->email_exists($email, $exclude_id);

		echo json_encode([
			'valid' => !$exists,
			'message' => $exists ? 'Email sudah digunakan' : 'Email tersedia'
		]);
	}


}
