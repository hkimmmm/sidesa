<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
	public function get_user_by_username($username)
	{
		return $this->db->get_where('users', ['username' => $username])->row();
	}

	public function create_admin($data)
	{
		return $this->db->insert('users', $data);
	}
}
