<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Potensi_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function get_all($limit = null, $offset = null, $search = null, $status = null)
	{
		$this->db->from('potensi');

		if ($search) {
			$this->db->group_start();
			$this->db->like('judul', $search);
			$this->db->or_like('lokasi', $search);
			$this->db->or_like('penanggung_jawab', $search);
			$this->db->group_end();
		}

		if ($status) {
			$this->db->where('status', $status);
		}

		$this->db->order_by('created_at', 'DESC');

		if ($limit) {
			$this->db->limit($limit, $offset);
		}

		return $this->db->get()->result_array();
	}

	public function count_all($search = null, $status = null)
	{
		$this->db->from('potensi');

		if ($search) {
			$this->db->group_start();
			$this->db->like('judul', $search);
			$this->db->or_like('lokasi', $search);
			$this->db->or_like('penanggung_jawab', $search);
			$this->db->group_end();
		}

		if ($status) {
			$this->db->where('status', $status);
		}

		return $this->db->count_all_results();
	}

	public function get_by_id($id)
	{
		return $this->db->get_where('potensi', ['id' => $id])->row_array();
	}

	public function get_by_slug($slug)
	{
		$this->db->from('potensi');
		$this->db->where('slug', $slug);
		$potensi = $this->db->get()->row_array();

		if ($potensi) {
			$potensi['author_name'] = 'admin';
		}

		return $potensi;
	}

	public function insert($data)
	{
		$data['created_at'] = date('Y-m-d H:i:s');
		$this->db->insert('potensi', $data);
		return $this->db->insert_id();
	}

	public function update($id, $data)
	{
		$data['updated_at'] = date('Y-m-d H:i:s');
		$this->db->where('id', $id);
		return $this->db->update('potensi', $data);
	}

	public function delete($id)
	{
		$potensi = $this->get_by_id($id);
		if ($potensi && $potensi['gambar']) {
			$file_path = FCPATH . 'uploads/potensi/' . $potensi['gambar'];
			if (file_exists($file_path)) {
				unlink($file_path);
			}
		}

		$this->db->where('id', $id);
		return $this->db->delete('potensi');
	}

	public function generate_slug($judul, $id = null)
	{
		$slug = url_title($judul, '-', TRUE);

		$this->db->select('id');
		$this->db->from('potensi');
		$this->db->where('slug', $slug);
		if ($id) {
			$this->db->where('id !=', $id);
		}
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			$slug .= '-' . time();
		}

		return $slug;
	}
}
