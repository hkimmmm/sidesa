<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Potensi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Potensi_model');
		$this->load->library('form_validation');
		$this->load->helper(['url', 'form']);
	}

	public function index()
	{
		$search = $this->input->get('search');
		$status = $this->input->get('status');

		$data = [
			'title' => 'Daftar Potensi',
			'potensi' => $this->Potensi_model->get_all(null, null, $search, $status),
			'search' => $search,
			'status' => $status
		];

		$this->load->view('layouts/potensi_list', $data);
	}

	public function add()
	{
		$data['title'] = 'Tambah Potensi';

		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required');
		$this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
		$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab', 'required');
		$this->form_validation->set_rules('kontak', 'Kontak', 'required|numeric');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() === FALSE) {
			$data['error'] = $this->session->flashdata('error');
			$this->load->view('layouts/add_potensi', $data);
		} else {
			$config['upload_path'] = './uploads/potensi/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = 2048;
			$config['encrypt_name'] = TRUE;

			$this->load->library('upload', $config);

			$image_name = '';
			if ($this->upload->do_upload('gambar')) {
				$upload_data = $this->upload->data();
				$image_name = $upload_data['file_name'];
			} else {
				$this->session->set_flashdata('error', $this->upload->display_errors());
				redirect('potensi/add');
			}

			$slug = $this->Potensi_model->generate_slug($this->input->post('judul'));

			$data = [
				'judul' => $this->input->post('judul'),
				'slug' => $slug,
				'kategori' => $this->input->post('kategori'),
				'lokasi' => $this->input->post('lokasi'),
				'penanggung_jawab' => $this->input->post('penanggung_jawab'),
				'kontak' => $this->input->post('kontak'),
				'deskripsi' => $this->input->post('deskripsi'),
				'gambar' => $image_name,
				'status' => $this->input->post('status'),
			];

			$this->Potensi_model->insert($data);
			$this->session->set_flashdata('success', 'Potensi berhasil ditambahkan');
			redirect('potensi');
		}
	}

	public function edit($id)
	{
		$data['title'] = 'Edit Potensi';
		$data['potensi'] = $this->Potensi_model->get_by_id($id);

		if (empty($data['potensi'])) {
			show_404();
		}

		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required');
		$this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
		$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab', 'required');
		$this->form_validation->set_rules('kontak', 'Kontak', 'required|numeric');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() === FALSE) {
			$data['error'] = $this->session->flashdata('error');
			$this->load->view('layouts/edit_potensi', $data);
		} else {
			$config['upload_path'] = './uploads/potensi/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = 2048;
			$config['encrypt_name'] = TRUE;

			$this->load->library('upload', $config);

			$image_name = $data['potensi']['gambar'];
			if (!empty($_FILES['gambar']['name'])) {
				if ($this->upload->do_upload('gambar')) {
					if ($image_name) {
						$old_file = FCPATH . 'uploads/potensi/' . $image_name;
						if (file_exists($old_file)) {
							unlink($old_file);
						}
					}

					$upload_data = $this->upload->data();
					$image_name = $upload_data['file_name'];
				} else {
					$this->session->set_flashdata('error', $this->upload->display_errors());
					redirect('potensi/edit/' . $id);
				}
			}

			$slug = $this->Potensi_model->generate_slug($this->input->post('judul'), $id);

			$update_data = [
				'judul' => $this->input->post('judul'),
				'slug' => $slug,
				'kategori' => $this->input->post('kategori'),
				'lokasi' => $this->input->post('lokasi'),
				'penanggung_jawab' => $this->input->post('penanggung_jawab'),
				'kontak' => $this->input->post('kontak'),
				'deskripsi' => $this->input->post('deskripsi'),
				'gambar' => $image_name,
				'status' => $this->input->post('status'),
			];

			$this->Potensi_model->update($id, $update_data);
			$this->session->set_flashdata('success', 'Potensi berhasil diperbarui');
			redirect('potensi');
		}
	}

	public function delete($id)
	{
		$this->Potensi_model->delete($id);
		$this->session->set_flashdata('success', 'Potensi berhasil dihapus');
		redirect('potensi');
	}

	public function detail($slug)
	{
		$data['potensi'] = $this->Potensi_model->get_by_slug($slug);

		if (empty($data['potensi'])) {
			show_404();
		}

		$data['title'] = $data['potensi']['judul'];
		$this->load->view('layouts/potensi_detail', $data);
	}
}
