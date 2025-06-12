<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Organisasi_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_all()
	{
		return $this->db->get('organisasi')->result_array();
	}

	public function get_by_id($id)
	{
		return $this->db->get_where('organisasi', ['id' => $id])->row_array();
	}

	public function create($data)
	{
		return $this->db->insert('organisasi', $data);
	}

	public function update($id, $data)
	{
		return $this->db->update('organisasi', $data, ['id' => $id]);
	}

	public function delete($id)
	{
		return $this->db->delete('organisasi', ['id' => $id]);
	}
}
