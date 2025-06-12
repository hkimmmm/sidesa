<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function get_all($limit = null, $offset = null, $search = null, $status = null)
	{
		$this->db->from('news');

		if ($search) {
			$this->db->group_start();
			$this->db->like('judul', $search);
			$this->db->or_like('isi', $search);
			$this->db->group_end();
		}

		if ($status) {
			$this->db->where('status', $status);
		}

		$this->db->order_by('created_at', 'DESC');

		if ($limit) {
			$this->db->limit($limit, $offset);
		}

		$result = $this->db->get()->result_array();

		foreach ($result as &$item) {
			$item['author_name'] = 'admin';
		}

		return $result;
	}

	public function count_all($search = null, $status = null)
	{
		$this->db->from('news');

		if ($search) {
			$this->db->group_start();
			$this->db->like('judul', $search);
			$this->db->or_like('isi', $search);
			$this->db->group_end();
		}

		if ($status) {
			$this->db->where('status', $status);
		}

		return $this->db->count_all_results();
	}

	public function get_by_id($id)
	{
		$this->db->from('news');
		$this->db->where('id', $id);
		$news = $this->db->get()->row_array();

		if ($news) {
			$news['author_name'] = 'admin';
		}

		return $news;
	}

	public function get_by_slug($slug)
	{
		$this->db->from('news');
		$this->db->where('slug', $slug);
		$news = $this->db->get()->row_array();

		if ($news) {
			$news['author_name'] = 'admin';
		}

		return $news;
	}

	public function insert($data)
	{
		$data['created_at'] = date('Y-m-d H:i:s');
		$data['author_id'] = 1;
		$this->db->insert('news', $data);
		return $this->db->insert_id();
	}

	public function update($id, $data)
	{
		$data['updated_at'] = date('Y-m-d H:i:s');
		$this->db->where('id', $id);
		return $this->db->update('news', $data);
	}

	public function delete($id)
	{
		$news = $this->get_by_id($id);
		if ($news && $news['gambar']) {
			$file_path = FCPATH . 'uploads/news/' . $news['gambar'];
			if (file_exists($file_path)) {
				unlink($file_path);
			}
		}

		$this->db->where('id', $id);
		return $this->db->delete('news');
	}

	public function generate_slug($judul, $id = null)
	{
		$slug = url_title($judul, '-', TRUE);

		$this->db->select('id');
		$this->db->from('news');
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

	public function get_latest($limit = 3)
	{
		$this->db->from('news');
		$this->db->where('status', 'publish');
		$this->db->order_by('created_at', 'DESC');
		$this->db->limit($limit);
		$result = $this->db->get()->result_array();

		foreach ($result as &$item) {
			$item['author_name'] = 'admin';
		}

		return $result;
	}

	public function get_popular($limit = 3)
	{
		$this->db->select('news.*, COUNT(views.id) as view_count');
		$this->db->from('news');
		$this->db->join('news_views as views', 'views.news_id = news.id', 'left');
		$this->db->where('news.status', 'publish');
		$this->db->group_by('news.id');
		$this->db->order_by('news.is_featured', 'DESC');
		$this->db->order_by('view_count', 'DESC');
		$this->db->order_by('news.created_at', 'DESC');
		$this->db->limit($limit);

		$result = $this->db->get()->result_array();

		foreach ($result as &$item) {
			$item['author_name'] = 'admin';
		}

		return $result;
	}

	public function add_view($news_id)
	{
		$data = [
			'news_id' => $news_id,
			'ip_address' => $this->input->ip_address(),
			'viewed_at' => date('Y-m-d H:i:s')
		];
		$this->db->insert('news_views', $data);
	}

	public function get_related_news($current_id, $limit = 4)
	{
		$this->db->from('news');
		$this->db->where('status', 'publish');
		$this->db->where('id !=', $current_id);
		$this->db->order_by('created_at', 'DESC');
		$this->db->limit($limit);
		$result = $this->db->get()->result_array();

		foreach ($result as &$item) {
			$item['author_name'] = 'admin';
		}

		return $result;
	}
}
