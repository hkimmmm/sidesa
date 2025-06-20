<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetak extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('pdfgenerator');
		$this->load->model('Pengajuan_model');
	}

	public function cetak_surat()
	{
		$pengajuan_id = $this->input->post('pengajuan_id');

		$pengajuan = $this->Pengajuan_model->get_by_id($pengajuan_id);

		if (!$pengajuan) {
			show_404();
			return;
		}

		$jenis_surat_slug = strtolower(str_replace(' ', '_', $pengajuan['nama_surat']));

		$data = [
			'title' => $pengajuan['nama_surat'],
			'pengajuan' => $pengajuan,
			'status' => $pengajuan['status']
		];

		$html = $this->load->view('surat_cetak/' . $jenis_surat_slug, $data, true);
		$this->pdfgenerator->generate($html, $pengajuan['nama_surat'], 'A4', 'portrait');
	}
}
