<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Banner extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Banner_model');
		$this->load->library('form_validation');
	}

	/**
	 * Display all banners (with modal support)
	 */
	public function index()
	{
		$data = [
			'banners' => $this->Banner_model->get_all(),
			'title' => 'Manage Banners'
		];

		$this->load->view('layouts/banner', $data);

	}

	public function get_all()
	{
		header('Content-Type: application/json');

		try {
			$page = $this->input->get('page') ?? 1;
			$per_page = $this->input->get('per_page') ?? 10;

			$banners = $this->Banner_model->get_all($per_page, ($page - 1) * $per_page);
			$total = $this->Banner_model->count_all();

			echo json_encode([
				'status' => 'success',
				'banners' => $banners,
				'total' => $total
			]);
		} catch (Exception $e) {
			echo json_encode([
				'status' => 'error',
				'message' => $e->getMessage()
			]);
		}
	}

	/**
	 * Handle AJAX banner creation
	 */
	public function store()
	{
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('start_date', 'Start Date', 'required');
		$this->form_validation->set_rules('end_date', 'End Date', 'required');

		if ($this->form_validation->run() === FALSE) {
			echo json_encode([
				'status' => 'error',
				'message' => validation_errors()
			]);
			return;
		}

		// Handle file upload
		$upload_config = [
			'upload_path' => './uploads/banners/',
			'allowed_types' => 'jpg|jpeg|png|gif',
			'max_size' => 2048,
			'encrypt_name' => TRUE
		];

		$this->load->library('upload', $upload_config);

		if (!$this->upload->do_upload('banner_image')) {
			echo json_encode([
				'status' => 'error',
				'message' => $this->upload->display_errors()
			]);
			return;
		}

		$upload_data = $this->upload->data();

		$data = [
			'title' => $this->input->post('title'),
			'content' => $this->input->post('content'),
			'image_url' => 'uploads/banners/' . $upload_data['file_name'],
			'start_date' => $this->input->post('start_date'),
			'end_date' => $this->input->post('end_date'),
			'status' => $this->input->post('status'),
			'is_active' => ($this->input->post('is_active')) ? 1 : 0
		];

		$id = $this->Banner_model->create($data);

		echo json_encode([
			'status' => 'success',
			'message' => 'Banner created successfully',
			'data' => $this->Banner_model->get_by_id($id)
		]);
	}

	/**
	 * Handle AJAX banner update
	 */
	public function update($id)
	{
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('start_date', 'Start Date', 'required');
		$this->form_validation->set_rules('end_date', 'End Date', 'required');

		if ($this->form_validation->run() === FALSE) {
			echo json_encode([
				'status' => 'error',
				'message' => validation_errors()
			]);
			return;
		}

		$banner = $this->Banner_model->get_by_id($id);
		$data = [
			'title' => $this->input->post('title'),
			'content' => $this->input->post('content'),
			'start_date' => $this->input->post('start_date'),
			'end_date' => $this->input->post('end_date'),
			'status' => $this->input->post('status'),
			'is_active' => ($this->input->post('is_active')) ? 1 : 0
		];

		// Handle file upload if new image is provided
		if (!empty($_FILES['banner_image']['name'])) {
			$upload_config = [
				'upload_path' => './uploads/banners/',
				'allowed_types' => 'jpg|jpeg|png|gif',
				'max_size' => 2048,
				'encrypt_name' => TRUE
			];

			$this->load->library('upload', $upload_config);

			if ($this->upload->do_upload('banner_image')) {
				// Delete old image
				if (file_exists($banner->image_url)) {
					unlink($banner->image_url);
				}

				$upload_data = $this->upload->data();
				$data['image_url'] = 'uploads/banners/' . $upload_data['file_name'];
			}
		}

		$this->Banner_model->update($id, $data);

		echo json_encode([
			'status' => 'success',
			'message' => 'Banner updated successfully',
			'data' => $this->Banner_model->get_by_id($id)
		]);
	}

	/**
	 * Handle AJAX banner deletion
	 */
	public function delete($id)
	{
		$banner = $this->Banner_model->get_by_id($id);

		if (!$banner) {
			echo json_encode([
				'status' => 'error',
				'message' => 'Banner not found'
			]);
			return;
		}

		// Delete image file
		if (file_exists($banner->image_url)) {
			unlink($banner->image_url);
		}

		$this->Banner_model->delete($id);

		echo json_encode([
			'status' => 'success',
			'message' => 'Banner deleted successfully'
		]);
	}

	/**
	 * Get banner data for edit modal
	 */
	public function get($id)
	{
		$banner = $this->Banner_model->get_by_id($id);

		if (!$banner) {
			echo json_encode([
				'status' => 'error',
				'message' => 'Banner not found'
			]);
			return;
		}

		echo json_encode([
			'status' => 'success',
			'data' => $banner
		]);
	}

	public function get_active()
	{
		header('Content-Type: application/json');

		try {
			$current_date = date('Y-m-d');
			$this->db->where('start_date <=', $current_date);
			$this->db->where('end_date >=', $current_date);
			$this->db->where('status', 'Aktif');
			$this->db->where('is_active', 1);
			$this->db->order_by('created_at', 'DESC');
			$banners = $this->db->get('banners')->result();

			echo json_encode([
				'status' => 'success',
				'banners' => $banners
			]);
		} catch (Exception $e) {
			echo json_encode([
				'status' => 'error',
				'message' => $e->getMessage()
			]);
		}

	}
}
