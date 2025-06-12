<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetak extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('pdfgenerator');
	}

	public function cetak_surat()
	{
		$jenis_surat = $this->input->post('jenis_surat', true);
		$nama = $this->input->post('nama', true);
		$nik = $this->input->post('nik', true);
		$no_pengajuan = $this->input->post('no_pengajuan', true);
		$ttl = $this->input->post('ttl', true);
		$alamat = $this->input->post('alamat', true);
		$pekerjaan = $this->input->post('pekerjaan', true);
		$nama_orangtua = $this->input->post('nama_orangtua', true);
		$status = $this->input->post('status', true);

		$daftar_surat = [
			'Surat Keterangan Tidak Mampu' => 'Surat Keterangan Tidak Mampu',
			'Surat Keterangan Pindah Domisili' => 'Surat Keterangan Pindah Domisili',
			'Surat Kematian' => 'Surat Kematian',
			'Surat Slip Gaji Orang Tua' => 'Surat Slip Gaji Orang Tua',
			'Surat Pengantar Nikah' => 'Surat Pengantar Nikah',
			'Surat Talak, Cerai, Rujuk' => 'Surat Talak, Cerai, Rujuk',
			'Surat Pengantar Pembuatan KK Baru' => 'Surat Pengantar Pembuatan KK Baru',
			'Surat Pengantar KTP' => 'Surat Pengantar KTP',
		];

		if (!isset($daftar_surat[$jenis_surat])) {
			show_404();
			return;
		}

		$title = $daftar_surat[$jenis_surat];
		$view = 'surat_cetak/' . strtolower(str_replace(' ', '_', $jenis_surat));

		$item = [
			'nama' => $nama,
			'nik' => $nik,
			'no_pengajuan' => $no_pengajuan,
			'ttl' => $ttl,
			'alamat' => $alamat,
			'pekerjaan' => $pekerjaan,
			'nama_ortu' => $nama_orangtua,
		];

		$data = [
			'title' => $title,
			'item' => $item,
			'status' => $status,
		];

		$html = $this->load->view($view, $data, true);
		$this->pdfgenerator->generate($html, $jenis_surat, 'A4', 'portrait');
	}


}
