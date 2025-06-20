<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Banner_model extends CI_Model
{
	private $table = 'banners';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	/**
	 * Get all banners with optional filtering
	 */
	public function get_all($limit = null, $offset = null, $filters = [])
	{
		if (!empty($filters['status'])) {
			$this->db->where('status', $filters['status']);
		}

		if (!empty($filters['is_active'])) {
			$this->db->where('is_active', $filters['is_active']);
		}

		// Filter by date range
		if (!empty($filters['start_date']) && !empty($filters['end_date'])) {
			$this->db->where('start_date >=', $filters['start_date']);
			$this->db->where('end_date <=', $filters['end_date']);
		}

		// Filter active banners (current date within range)
		if (!empty($filters['current_active'])) {
			$current_date = date('Y-m-d');
			$this->db->where('start_date <=', $current_date);
			$this->db->where('end_date >=', $current_date);
			$this->db->where('status', 'Aktif');
			$this->db->where('is_active', true);
		}

		if ($limit !== null && $offset !== null) {
			$this->db->limit($limit, $offset);
		}

		$this->db->order_by('created_at', 'DESC');
		return $this->db->get($this->table)->result();
	}

	/**
	 * Get single banner by ID
	 */
	public function get_by_id($id)
	{
		return $this->db->get_where($this->table, ['id' => $id])->row();
	}

	/**
	 * Count total banners with optional filtering
	 */
	public function count_all($filters = [])
	{
		if (!empty($filters['status'])) {
			$this->db->where('status', $filters['status']);
		}

		if (!empty($filters['is_active'])) {
			$this->db->where('is_active', $filters['is_active']);
		}

		return $this->db->count_all_results($this->table);
	}

	/**
	 * Create new banner
	 */
	public function create($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	/**
	 * Update existing banner
	 */
	public function update($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update($this->table, $data);
	}

	/**
	 * Delete banner
	 */
	public function delete($id)
	{
		return $this->db->delete($this->table, ['id' => $id]);
	}

	/**
	 * Get active banners for frontend display
	 */
	// application/models/Banner_model.php
	public function get_active_banners()
	{
		$current_date = date('Y-m-d');
		$this->db->where('start_date <=', $current_date);
		$this->db->where('end_date >=', $current_date);
		$this->db->where('status', 'Aktif');
		$this->db->where('is_active', 1);
		$this->db->order_by('created_at', 'DESC');

		// Debug: Tampilkan query SQL
		$query = $this->db->get('banners');
		// echo $this->db->last_query(); die(); // Uncomment untuk debug

		return $query->result();
	}
}
