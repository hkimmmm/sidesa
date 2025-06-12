<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaduan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library(['form_validation', 'session']);
		$this->load->helper(['url', 'form']);
		$this->load->model('Pengaduan_model');

		// TODO: Ganti user_id statis dengan session user_id saat login sudah ada
	}

	public function index()
	{
		$user_id = 1; // user dummy statis

		// Ambil filter dari input GET
		$filter = [
			'status' => $this->input->get('status'),
			'jenis' => $this->input->get('jenis'),
			'start_date' => $this->input->get('dari_tanggal'),
			'end_date' => $this->input->get('sampai_tanggal')
		];

		$data = [
			'title' => 'Status Pengaduan',
			'pengaduan' => $this->Pengaduan_model->get_pengaduan_by_user($user_id, $filter)
		];

		$this->load->view('layouts/pengaduan_list_users', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('jenis_pengaduan', 'Jenis Pengaduan', 'required');
		$this->form_validation->set_rules('judul', 'Judul Pengaduan', 'required|max_length[255]');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
		$this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
		$this->form_validation->set_rules('tanggal_kejadian', 'Tanggal Kejadian', 'required');
		$this->form_validation->set_rules('no_hp_pelapor', 'No. HP', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Buat Pengaduan Baru';
			$this->load->view('layouts/add_pengaduan_users', $data);
		} else {
			$user_id = 1; // user dummy statis

			$data = [
				'user_id' => $user_id,
				'jenis_pengaduan' => $this->input->post('jenis_pengaduan'),
				'prioritas' => $this->input->post('prioritas'),
				'judul' => $this->input->post('judul'),
				'deskripsi' => $this->input->post('deskripsi'),
				'lokasi' => $this->input->post('lokasi'),
				'tanggal_kejadian' => $this->input->post('tanggal_kejadian'),
				'no_hp_pelapor' => $this->input->post('no_hp_pelapor'),
				'email_pelapor' => $this->input->post('email_pelapor')
			];

			// Handle file upload
			$files = [];
			if (!empty($_FILES['lampiran']['name'][0])) {
				$files_count = count($_FILES['lampiran']['name']);

				for ($i = 0; $i < $files_count; $i++) {
					$_FILES['file']['name'] = $_FILES['lampiran']['name'][$i];
					$_FILES['file']['type'] = $_FILES['lampiran']['type'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['lampiran']['tmp_name'][$i];
					$_FILES['file']['error'] = $_FILES['lampiran']['error'][$i];
					$_FILES['file']['size'] = $_FILES['lampiran']['size'][$i];

					$files["file_{$i}"] = $_FILES['file'];
				}
			}

			$pengaduan_id = $this->Pengaduan_model->create_pengaduan($data, $files);

			if ($pengaduan_id) {
				$this->session->set_flashdata('success', 'Pengaduan berhasil dikirim!');
				redirect('pengaduan');
			} else {
				$this->session->set_flashdata('error', 'Gagal mengirim pengaduan. Silakan coba lagi.');
				redirect('pengaduan/add');
			}
		}
	}

	public function detail($id)
	{
		$user_id = $this->session->userdata('user_id');
		$pengaduan = $this->Pengaduan_model->get_pengaduan_detail($id, $user_id);

		if (!$pengaduan) {
			show_404();
		}

		$data = [
			'title' => 'Detail Pengaduan',
			'pengaduan' => $pengaduan
		];

		$this->load->view('layouts/detail_pengaduan_users', $data);
	}

	public function edit($id)
	{
		$user_id = 1; // user dummy statis
		$pengaduan = $this->Pengaduan_model->get_pengaduan_detail($id, $user_id);

		if (!$pengaduan || $pengaduan->status != 'diterima') {
			show_404();
		}

		$this->form_validation->set_rules('jenis_pengaduan', 'Jenis Pengaduan', 'required');
		$this->form_validation->set_rules('judul', 'Judul Pengaduan', 'required|max_length[255]');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
		$this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
		$this->form_validation->set_rules('tanggal_kejadian', 'Tanggal Kejadian', 'required');
		$this->form_validation->set_rules('no_hp_pelapor', 'No. HP', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Edit Pengaduan',
				'pengaduan' => $pengaduan
			];

			$this->load->view('layouts/edit_pengaduan_users', $data);
		} else {
			$data = [
				'jenis_pengaduan' => $this->input->post('jenis_pengaduan'),
				'prioritas' => $this->input->post('prioritas'),
				'judul' => $this->input->post('judul'),
				'deskripsi' => $this->input->post('deskripsi'),
				'lokasi' => $this->input->post('lokasi'),
				'tanggal_kejadian' => $this->input->post('tanggal_kejadian'),
				'no_hp_pelapor' => $this->input->post('no_hp_pelapor'),
				'email_pelapor' => $this->input->post('email_pelapor')
			];

			// Handle file upload
			$files = [];
			if (!empty($_FILES['lampiran']['name'][0])) {
				$files_count = count($_FILES['lampiran']['name']);

				for ($i = 0; $i < $files_count; $i++) {
					$_FILES['file']['name'] = $_FILES['lampiran']['name'][$i];
					$_FILES['file']['type'] = $_FILES['lampiran']['type'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['lampiran']['tmp_name'][$i];
					$_FILES['file']['error'] = $_FILES['lampiran']['error'][$i];
					$_FILES['file']['size'] = $_FILES['lampiran']['size'][$i];

					$files["file_{$i}"] = $_FILES['file'];
				}
			}

			if ($this->Pengaduan_model->update_pengaduan($id, $data, $files)) {
				$this->session->set_flashdata('success', 'Pengaduan berhasil diperbarui!');
				redirect('pengaduan/detail/' . $id);
			} else {
				$this->session->set_flashdata('error', 'Gagal memperbarui pengaduan. Silakan coba lagi.');
				redirect('pengaduan/edit/' . $id);
			}
		}
	}

	public function delete($id)
	{
		$user_id = 1;
		$pengaduan = $this->Pengaduan_model->get_pengaduan_detail($id, $user_id);

		if (!$pengaduan || $pengaduan->status != 'diterima') {
			show_404();
		}

		if ($this->Pengaduan_model->delete_pengaduan($id)) {
			$this->session->set_flashdata('success', 'Pengaduan berhasil dihapus!');
		} else {
			$this->session->set_flashdata('error', 'Gagal menghapus pengaduan. Silakan coba lagi.');
		}

		redirect('pengaduan');
	}

	public function ajukan_kembali($id)
	{
		$user_id = 1; // user dummy statis
		$pengaduan = $this->Pengaduan_model->get_pengaduan_detail($id, $user_id);

		if (!$pengaduan || $pengaduan->status != 'ditolak') {
			show_404();
		}

		$data = [
			'status' => 'diterima',
			'alasan_ditolak' => null
		];

		if ($this->Pengaduan_model->update_pengaduan($id, $data)) {
			$this->Pengaduan_model->add_progress($id, 'diterima', 'Pengaduan diajukan kembali oleh pelapor');
			$this->session->set_flashdata('success', 'Pengaduan berhasil diajukan kembali!');
		} else {
			$this->session->set_flashdata('error', 'Gagal mengajukan kembali pengaduan. Silakan coba lagi.');
		}

		redirect('pengaduan/detail/' . $id);
	}

	public function admin()
	{
		// if ($this->session->userdata('role') != 'admin') {
		// 	redirect('pengaduan');
		// }

		$status = $this->input->get('status');

		$data = [
			'title' => 'Daftar Pengaduan',
			'pengaduan' => $this->Pengaduan_model->get_all(null, null, null, $status),
			'status' => $status
		];

		$this->load->view('layouts/pengaduan_list_admin', $data);
	}

	public function update_status($id)
	{
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->detail($id);
		} else {
			$status = $this->input->post('status');
			$alasan_ditolak = $this->input->post('alasan_ditolak');

			$this->Pengaduan_model->update_status($id, $status, $alasan_ditolak);
			$this->session->set_flashdata('success', 'Status pengajuan berhasil diperbarui');
			redirect('pengaduan');
		}
	}
}
