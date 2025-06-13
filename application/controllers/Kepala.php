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

		// Ambil semua pengajuan
		$pengajuan = $this->Pengajuan_model->get_all(null, null, null, null);

		// Ambil data prioritas dari pengaduan
		$pengaduan_prioritas = $this->Pengaduan_model->get_prioritas(3);

		$this->load->helper('my_helper'); // Pastikan helper dimuat
		foreach ($pengaduan_prioritas as &$item) {
			if (isset($item->created_at) && $item->created_at) {
				$item->waktu_relatif = time_elapsed_string($item->created_at);
			} else {
				$item->waktu_relatif = 'Waktu tidak valid';
			}
		}
		unset($item);

		$tahun = 2025; // Default dari dropdown, bisa diubah dinamis nanti

		// Ambil statistik dari kedua model
		$pengajuan_stats = $this->Pengajuan_model->get_statistik($tahun);
		$pengaduan_stats = $this->Pengaduan_model->get_statistik($tahun);

		// Gabungkan labels dari kedua model
		$labels = array_unique(array_merge($pengajuan_stats['labels'], $pengaduan_stats['labels']));
		$pengajuan_data = array_fill(0, count($labels), 0);
		$pengaduan_data = array_fill(0, count($labels), 0);

		// Isi data pengajuan sesuai label
		foreach ($pengajuan_stats['labels'] as $index => $label) {
			$key = array_search($label, $labels);
			if ($key !== false) {
				$pengajuan_data[$key] = $pengajuan_stats['data'][$index];
			}
		}

		// Isi data pengaduan sesuai label
		foreach ($pengaduan_stats['labels'] as $index => $label) {
			$key = array_search($label, $labels);
			if ($key !== false) {
				$pengaduan_data[$key] = $pengaduan_stats['data'][$index];
			}
		}

		// Siapkan data statistik untuk view
		$stats = [
			'labels' => $labels,
			'pengajuan_data' => $pengajuan_data,
			'pengaduan_data' => $pengaduan_data
		];

		$data = [
			'title' => 'Dashboard Kepala',
			'pengajuan' => $pengajuan,
			'pengaduan_prioritas' => $pengaduan_prioritas,
			'stats' => $stats // Tambahkan stats ke data
		];

		$this->load->view('layouts/kepala', $data);
	}

	public function get_statistik($tahun)
	{
		// Ambil statistik dari kedua model
		$pengajuan_stats = $this->Pengajuan_model->get_statistik($tahun);
		$pengaduan_stats = $this->Pengaduan_model->get_statistik($tahun);

		// Gabungkan labels dari kedua model
		$labels = array_unique(array_merge($pengajuan_stats['labels'], $pengaduan_stats['labels']));
		$pengajuan_data = array_fill(0, count($labels), 0);
		$pengaduan_data = array_fill(0, count($labels), 0);

		// Isi data pengajuan sesuai label
		foreach ($pengajuan_stats['labels'] as $index => $label) {
			$key = array_search($label, $labels);
			if ($key !== false) {
				$pengajuan_data[$key] = $pengajuan_stats['data'][$index];
			}
		}

		// Isi data pengaduan sesuai label
		foreach ($pengaduan_stats['labels'] as $index => $label) {
			$key = array_search($label, $labels);
			if ($key !== false) {
				$pengaduan_data[$key] = $pengaduan_stats['data'][$index];
			}
		}

		$stats = [
			'labels' => $labels,
			'pengajuan_data' => $pengajuan_data,
			'pengaduan_data' => $pengaduan_data
		];

		echo json_encode($stats);
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
