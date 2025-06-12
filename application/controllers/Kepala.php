<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kepala extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pengaduan_model');
		$this->load->model('Pengajuan_model');
	}

	public function index()
	{

		$user_id = $this->session->userdata('user_id');
		$pengajuan = $this->Pengajuan_model->get_all(null, null, null, null);

		$data = [
			'title' => 'Status Pengajuan',
			'pengajuan' => $pengajuan
		];

		$this->load->view('layouts/kepala', $data);
	}

	public function pengajuan()
	{
		// if ($this->session->userdata('role') != 'kepala') {
		// 	redirect('pengajuan');
		// }

		$status = $this->input->get('status');

		$data = [
			'title' => 'Daftar Pengajuan',
			'pengajuan' => $this->Pengajuan_model->get_all(null, null, null, $status),
			'status' => $status
		];

		$this->load->view('layouts/pengajuan_list_kepala', $data);
	}


	public function detail_pengajuan($id)
	{
		$user_id = $this->session->userdata('user_id');
		$pengajuan = $this->Pengajuan_model->get_by_id($id);

		$data = [
			'title' => 'Detail Pengajuan',
			'pengajuan' => $pengajuan,
			'tracking' => $this->Pengajuan_model->get_tracking($id),
			'dokumen' => $this->Pengajuan_model->get_dokumen($id)
		];
		$this->load->view('layouts/detail_pengajuan_kepala', $data);
	}

	public function pengaduan()
	{
		// if ($this->session->userdata('role') != 'kepala') {
		// 	redirect('pengaduan');
		// }

		$status = $this->input->get('status');

		$data = [
			'title' => 'Daftar Pengaduan',
			'pengaduan' => $this->Pengaduan_model->get_all(null, null, null, $status),
			'status' => $status
		];

		$this->load->view('layouts/pengaduan_list_kepala', $data);
	}

	public function detail_pengaduan($id)
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

		$this->load->view('layouts/detail_pengaduan_kepala', $data);
	}
}
