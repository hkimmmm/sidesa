<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Organisasi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Organisasi_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'Struktur Organisasi';

		// Pagination
		$this->load->library('pagination');

		$config['base_url'] = site_url('organisasi/index');
		$config['total_rows'] = $this->Organisasi_model->count_all($this->input->get('search'));
		$config['per_page'] = 10;
		$config['uri_segment'] = 3;
		$config['reuse_query_string'] = TRUE;

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data['organisasi'] = $this->Organisasi_model->get_all(
			$this->input->get('search'),
			$config['per_page'],
			$page
		);

		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('layouts/organisasi', $data);
	}

	public function create()
	{
		$data['title'] = 'Tambah Anggota Organisasi';

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('urutan', 'Urutan', 'numeric');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('layouts/add_organisasi', $data);
		} else {
			$post_data = $this->input->post();

			$insert_id = $this->Organisasi_model->create($post_data, 'foto');

			if ($insert_id) {
				$this->session->set_flashdata('success', 'Data berhasil ditambahkan');
				redirect('organisasi');
			} else {
				$this->session->set_flashdata('error', 'Gagal menambahkan data');
				redirect('layouts/add_organisasi');
			}
		}
	}

	public function edit($id)
	{
		$data['title'] = 'Edit Anggota Organisasi';
		$data['organisasi'] = $this->Organisasi_model->get_by_id($id);

		if (!$data['organisasi']) {
			show_404();
		}

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('urutan', 'Urutan', 'numeric');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('layouts/edit_organisasi', $data);
		} else {
			$post_data = $this->input->post();

			$success = $this->Organisasi_model->update($id, $post_data, 'foto');

			if ($success) {
				$this->session->set_flashdata('success', 'Data berhasil diperbarui');
				redirect('organisasi');
			} else {
				$this->session->set_flashdata('error', 'Gagal memperbarui data');
				redirect('layouts/edit_organisasi/' . $id);
			}
		}
	}

	public function delete($id)
	{
		if (!$this->input->is_ajax_request()) {
			show_404();
		}

		$success = $this->Organisasi_model->delete($id);

		if ($success) {
			$response = ['status' => 'success', 'message' => 'Data berhasil dihapus'];
		} else {
			$response = ['status' => 'error', 'message' => 'Gagal menghapus data'];
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));
	}
}
