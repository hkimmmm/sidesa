<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('News_model');
		$this->load->library('form_validation');
		$this->load->helper(['url', 'form', 'text']);
	}

	public function index()
	{
		// Get parameters from request
		$search = $this->input->get('search');
		$status = $this->input->get('status');
		$page = $this->input->get('page') ?? 1;
		$per_page = 10; // Default items per page

		// Calculate offset
		$offset = ($page - 1) * $per_page;

		// Get data from model
		$data['title'] = 'Daftar Berita';
		$data['news'] = $this->News_model->get_all($per_page, $offset, $search, $status);
		$data['total_news'] = $this->News_model->count_all($search, $status);

		// Pagination config
		$data['current_page'] = $page;
		$data['per_page'] = $per_page;
		$data['total_pages'] = ceil($data['total_news'] / $per_page);

		$this->load->view('layouts/news_list', $data);
	}

	public function get_all()
{
	header('Content-Type: application/json');

	try {
		// Ambil parameter dari request
		$page = (int) ($this->input->get('page') ?? 1);
		$per_page = (int) ($this->input->get('per_page') ?? 5); // BACA dari URL, default 5
		$search = $this->input->get('search');
		$status = $this->input->get('status');

		// Hitung offset
		$offset = ($page - 1) * $per_page;

		// Ambil data dari model
		$news = $this->News_model->get_all($per_page, $offset, $search, $status);
		$total = $this->News_model->count_all($search, $status);

		// Kirimkan response JSON
		$response = [
			'status' => 'success',
			'data' => $news,
			'pagination' => [
				'total_records' => $total,
				'current_page' => $page,
				'per_page' => $per_page,
				'total_pages' => ceil($total / $per_page)
			]
		];

		echo json_encode($response);
	} catch (Exception $e) {
		echo json_encode([
			'status' => 'error',
			'message' => $e->getMessage()
		]);
	}
}


	public function add()
	{
		$data['title'] = 'Tambah Berita';

		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('isi', 'Isi Berita', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('layouts/add_news', $data);
		} else {
			$config['upload_path'] = './uploads/news/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = 2048;
			$config['encrypt_name'] = TRUE;

			$this->load->library('upload', $config);

			$image_name = '';
			if ($this->upload->do_upload('gambar')) {
				$upload_data = $this->upload->data();
				$image_name = $upload_data['file_name'];
			}

			$slug = $this->News_model->generate_slug($this->input->post('judul'));

			$insert_data = [
				'judul' => $this->input->post('judul'),
				'slug' => $slug,
				'isi' => $this->input->post('isi'),
				'gambar' => $image_name,
				'status' => $this->input->post('status'),
				'author_id' => 1,
				'created_at' => date('Y-m-d H:i:s')
			];

			$this->News_model->insert($insert_data);
			redirect('news');
		}
	}

	public function edit($id)
	{
		$data['title'] = 'Edit Berita';
		$data['news'] = $this->News_model->get_by_id($id);

		if (empty($data['news'])) {
			show_404();
		}

		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('isi', 'Isi Berita', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('layouts/edit_news', $data);
		} else {
			$config['upload_path'] = './uploads/news/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = 2048;
			$config['encrypt_name'] = TRUE;

			$this->load->library('upload', $config);

			$image_name = $data['news']['gambar'];
			if ($this->upload->do_upload('gambar')) {
				if ($image_name && file_exists('./uploads/news/' . $image_name)) {
					unlink('./uploads/news/' . $image_name);
				}

				$upload_data = $this->upload->data();
				$image_name = $upload_data['file_name'];
			}

			$slug = $this->News_model->generate_slug($this->input->post('judul'), $id);

			$update_data = [
				'judul' => $this->input->post('judul'),
				'slug' => $slug,
				'isi' => $this->input->post('isi'),
				'gambar' => $image_name,
				'status' => $this->input->post('status'),
				'updated_at' => date('Y-m-d H:i:s')
			];

			$this->News_model->update($id, $update_data);
			redirect('news');
		}
	}

	public function delete($id)
	{
		$this->News_model->delete($id);
		redirect('news');
	}

	// public function detail($slug)
	// {
	// 	$data['news'] = $this->News_model->get_by_slug($slug);

	// 	if (empty($data['news'])) {
	// 		show_404();
	// 	}

	// 	$data['title'] = $data['news']['judul'];
	// 	$this->load->view('layouts/news_detail', $data);
	// }
	public function detail($slug)
	{
		$news = $this->News_model->get_by_slug($slug);
		if (!$news) {
			show_404();
		}

		// Tambah view count
		$this->News_model->add_view($news['id']);

		$data['news'] = $news;
		$data['related_news'] = $this->News_model->get_related_news($news['id']); // WAJIB!
		$data['latest_news'] = $this->News_model->get_latest(3); // optional
		$data['popular_news'] = $this->News_model->get_popular(3); // optional

		$this->load->view('layouts/news_detail', $data);
	}

	public function list()
	{
		$data['title'] = 'Berita';

		// Ambil berita terbaru (misal 6 berita terbaru)
		$data['get_latest'] = $this->News_model->get_latest(6, 0);

		// // Ambil berita populer (misal 3 berita dengan view terbanyak)
		$data['popular_news'] = $this->News_model->get_popular(3);

		// Ambil kategori berita jika diperlukan
		// $data['categories'] = $this->News_category_model->get_all();

		$this->load->view('layouts/berita', $data);
	}
}
