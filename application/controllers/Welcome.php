<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Potensi_model');
		$this->load->model('News_model');
		$this->load->model('Banner_model');
		$this->load->library('form_validation');
		$this->load->helper(['url', 'form']);
	}

	public function index()
	{
		$data['title'] = 'Sistem Informasi Kelurahan Indihiang';

		// Data untuk view
		$data['latest_news'] = $this->News_model->get_latest(3);
		$data['active_banners'] = $this->Banner_model->get_active_banners();
		$data['popular_news'] = $this->News_model->get_popular(3);
		$data['potensi'] = $this->Potensi_model->get_all(6, 0, null, 'aktif');

		$this->load->view('layouts/landing', $data);
	}

	public function get_banners()
	{
		header('Content-Type: application/json');
		$banners = $this->Banner_model->get_active_banners();
		echo json_encode([
			'status' => !empty($banners) ? 'success' : 'empty',
			'banners' => $banners
		]);
	}
}
