<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pengajuan_model');
		$this->load->library(['form_validation', 'upload']);
		$this->load->helper(['url', 'form']);
	}

	public function index()
	{
		$user_id = $this->session->userdata('user_id');
		$pengajuan = $this->Pengajuan_model->get_all(null, null, null, null);

		$data = [
			'title' => 'Status Pengajuan',
			'pengajuan' => $pengajuan
		];

		$this->load->view('layouts/pengajuan_list_users', $data);
	}

	public function add()
	{
		$data = [
			'title' => 'Buat Pengajuan Baru',
			'jenis_surat' => $this->Pengajuan_model->get_jenis_surat()
		];

		$this->load->view('layouts/add_pengajuan_users', $data);
	}

	public function create()
	{
		$this->form_validation->set_rules('jenis_surat_id', 'Jenis Surat', 'required');
		$this->form_validation->set_rules('keperluan', 'Keperluan', 'required|min_length[10]');

		if ($this->form_validation->run() === FALSE) {
			return $this->add();
		}

		$jenis_surat_id = $this->input->post('jenis_surat_id');
		$keperluan = $this->input->post('keperluan');

		$data = [
			'jenis_surat_id' => $jenis_surat_id,
			'keperluan' => $keperluan
		];

		$pengajuan_id = $this->Pengajuan_model->insert($data);

		if (!$pengajuan_id) {
			show_error("Gagal menyimpan pengajuan ke database", 500);
		}

		$post_data = $this->input->post();
		unset($post_data['jenis_surat_id'], $post_data['keperluan']);

		$this->Pengajuan_model->save_pengajuan_data($pengajuan_id, $post_data);

		if (!empty($_FILES['dokumen']['name'][0])) {
			$this->upload_dokumen($pengajuan_id);
		}

		log_message('debug', 'Data pengajuan baru: ' . print_r([
			'pengajuan_id' => $pengajuan_id,
			'data' => $data,
			'data_tambahan' => $post_data,
			'dokumen' => $_FILES['dokumen']['name'] ?? '(tidak ada)'
		], true));

		$this->session->set_flashdata('success', 'Pengajuan berhasil dikirim');
		redirect('pengajuan');
	}

	public function detail($id)
	{
		$user_id = $this->session->userdata('user_id');
		$pengajuan = $this->Pengajuan_model->get_by_id($id);

		$data = [
			'title' => 'Detail Pengajuan',
			'pengajuan' => $pengajuan,
			'tracking' => $this->Pengajuan_model->get_tracking($id),
			'dokumen' => $this->Pengajuan_model->get_dokumen($id)
		];
		$this->load->view('layouts/detail_pengajuan', $data);
	}

	public function admin()
	{
		$search = $this->input->get('search');
		$status = $this->input->get('status');
		$jenis_surat_id = $this->input->get('jenis_surat');
		$tanggal = $this->input->get('tanggal');

		$tanggal_awal = null;
		$tanggal_akhir = null;
		if ($tanggal) {
			$tanggal_arr = explode(' to ', $tanggal);
			$tanggal_awal = trim($tanggal_arr[0]);
			$tanggal_akhir = trim($tanggal_arr[1] ?? $tanggal_arr[0]);
		}

		$data = [
			'title' => 'Daftar Pengajuan',
			'pengajuan' => $this->Pengajuan_model->get_all($search, $jenis_surat_id, [$tanggal_awal, $tanggal_akhir], $status),
			'status' => $status,
			'jenis_surat_id' => $jenis_surat_id,
			'tanggal' => $tanggal,
			'jenis_surat' => $this->Pengajuan_model->get_jenis_surat()
		];

		$this->load->view('layouts/pengajuan_list_admin', $data);
	}

	public function update_status($id)
	{
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->detail($id);
		} else {
			$status = $this->input->post('status');
			$catatan = $this->input->post('catatan');

			$this->Pengajuan_model->update_status($id, $status, $catatan);
			$this->session->set_flashdata('success', 'Status pengajuan berhasil diperbarui');
			redirect('pengajuan');
		}
	}

	private function upload_dokumen($pengajuan_id)
	{
		$files = $_FILES['dokumen'];
		$count = count($files['name']);

		$config['upload_path'] = './uploads/dokumen_pengajuan/';
		$config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';
		$config['max_size'] = 2048;
		$config['encrypt_name'] = TRUE;

		$this->upload->initialize($config);

		for ($i = 0; $i < $count; $i++) {
			if (!empty($files['name'][$i])) {
				$_FILES['file']['name'] = $files['name'][$i];
				$_FILES['file']['type'] = $files['type'][$i];
				$_FILES['file']['tmp_name'] = $files['tmp_name'][$i];
				$_FILES['file']['error'] = $files['error'][$i];
				$_FILES['file']['size'] = $files['size'][$i];

				if ($this->upload->do_upload('file')) {
					$upload_data = $this->upload->data();
					$nama_dokumen = $files['name'][$i];
					$file_path = 'uploads/dokumen_pengajuan/' . $upload_data['file_name'];
					$this->Pengajuan_model->add_dokumen($pengajuan_id, $nama_dokumen, $file_path);
				}
			}
		}
	}
}
