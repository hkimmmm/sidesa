<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pengajuan_model');
		$this->load->model('Pengaduan_model');
	}

	public function index()
	{
		$user_id = $this->session->userdata('user_id');

		// Ambil semua pengajuan
		$pengajuan = $this->Pengajuan_model->get_all(null, null, null, null);

		// Ambil terbaru dari kedua model
		$pengajuan_terbaru = $this->Pengajuan_model->get_terbaru(2);
		$pengaduan_terbaru = $this->Pengaduan_model->get_terbaru(2);

		// Gabungkan dan urutkan berdasarkan tanggal terbaru
		$semua_terbaru = array_merge($pengajuan_terbaru, $pengaduan_terbaru);

		// Urutkan array gabungan berdasarkan created_at DESC
		usort($semua_terbaru, function ($a, $b) {
			return strtotime($b->created_at) - strtotime($a->created_at);
		});

		// Tambahkan waktu relatif menggunakan time_elapsed_string
		$this->load->helper('my_helper.php'); // Pastikan helper sudah dibuat
		foreach ($semua_terbaru as $item) {
			$item->waktu_relatif = time_elapsed_string($item->created_at);
		}

		$tahun = 2025;
		// Ambil statistik dari kedua model
		$pengajuan_stats = $this->Pengajuan_model->get_statistik($tahun);
		$pengaduan_stats = $this->Pengaduan_model->get_statistik($tahun);

		$total_pengaduan_belum_disetujui = $this->Pengaduan_model->get_total_pengaduan_belum_disetujui();
		$total_pengajuan_belum_disetujui = $this->Pengajuan_model->get_total_pengajuan_belum_disetujui();

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

		// Isi data pengaduan sesuai label
		foreach ($pengaduan_stats['labels'] as $index => $label) {
			$key = array_search($label, $labels);
			if ($key !== false) {
				$pengaduan_data[$key] = $pengaduan_stats['data'][$index];
			}
		}

		// Ambil maksimal 5 data terbaru dari gabungan
		$terbaru_limit = array_slice($semua_terbaru, 0, 5);

		// Siapkan data statistik untuk view
		$stats = [
			'labels' => $labels,
			'pengajuan_data' => $pengajuan_data,
			'pengaduan_data' => $pengaduan_data
		];

		$data = [
			'title' => 'Dashboard Admin',
			'terbaru' => $terbaru_limit,
			'pengajuan' => $pengajuan,
			'stats' => $stats,
			'total_pengaduan_belum_disetujui' => $total_pengaduan_belum_disetujui,
			'total_pengajuan_belum_disetujui' => $total_pengajuan_belum_disetujui
		];

		$this->load->view('layouts/admin', $data);
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


	public function organisasi()
	{
		$user_id = $this->session->userdata('user_id');
		$data['title'] = 'Organisasi';

		$this->load->view('layouts/organisasi', $data);
	}

	public function prasarana()
	{
		$user_id = $this->session->userdata('user_id');
		$data['title'] = 'Prasarana';

		$this->load->view('layouts/prasarana', $data);
	}
}
