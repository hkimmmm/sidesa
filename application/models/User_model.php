<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    private $table = 'users';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Versi sederhana - Get user by username
     */
    public function get_user_by_username($username)
    {
        return $this->db->get_where($this->table, ['username' => $username])->row();
    }

    /**
     * Versi sederhana - Create admin
     */
    public function create_admin($data)
    {
        // Hash password jika ada
        if (isset($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }
        return $this->db->insert($this->table, $data);
    }

    /**
     * Get user by ID
     */
    public function get_by_id($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    /**
     * Get user by username (alias untuk get_user_by_username)
     */
    public function get_by_username($username)
    {
        return $this->get_user_by_username($username);
    }

    /**
     * Get user by email
     */
    public function get_by_email($email)
    {
        return $this->db->get_where($this->table, ['email' => $email])->row();
    }

    /**
     * Get all users with optional filtering
     */
    public function get_all($filters = [], $limit = null, $offset = null)
    {
        if (!empty($filters['role'])) {
            $this->db->where('role', $filters['role']);
        }

        if (isset($filters['is_active'])) {
            $this->db->where('is_active', $filters['is_active']);
        }

        if (!empty($filters['search'])) {
            $this->db->group_start();
            $this->db->like('username', $filters['search']);
            $this->db->or_like('nama', $filters['search']);
            $this->db->or_like('email', $filters['search']);
            $this->db->group_end();
        }

        if ($limit !== null && $offset !== null) {
            $this->db->limit($limit, $offset);
        }

        $this->db->order_by('created_at', 'DESC');
        return $this->db->get($this->table)->result();
    }

    /**
     * Count all users with optional filtering
     */
    public function count_all($filters = [])
    {
        if (!empty($filters['role'])) {
            $this->db->where('role', $filters['role']);
        }

        if (isset($filters['is_active'])) {
            $this->db->where('is_active', $filters['is_active']);
        }

        if (!empty($filters['search'])) {
            $this->db->group_start();
            $this->db->like('username', $filters['search']);
            $this->db->or_like('nama', $filters['search']);
            $this->db->or_like('email', $filters['search']);
            $this->db->group_end();
        }

        return $this->db->count_all_results($this->table);
    }

    /**
     * Create new user
     */
    public function create($data)
    {
        // Hash password if provided
        if (isset($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }

        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    /**
     * Update user
     */
    public function update($id, $data)
    {
        // Hash password if provided
        if (isset($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }

        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    /**
     * Delete user (soft delete)
     */
    public function delete($id)
    {
        return $this->db->update($this->table, ['is_active' => 0], ['id' => $id]);
    }

    /**
     * Activate user
     */
    public function activate($id)
    {
        return $this->db->update($this->table, ['is_active' => 1], ['id' => $id]);
    }

    /**
     * Verify user credentials
     */
    public function verify_credentials($username, $password)
    {
        $user = $this->get_by_username($username) ?: $this->get_by_email($username);
        
        if (!$user || !$user->is_active) {
            return false;
        }

        return password_verify($password, $user->password) ? $user : false;
    }

    /**
     * Check if username exists
     */
    public function username_exists($username, $exclude_id = null)
    {
        $this->db->where('username', $username);
        if ($exclude_id) {
            $this->db->where('id !=', $exclude_id);
        }
        return $this->db->get($this->table)->num_rows() > 0;
    }

    /**
     * Check if email exists
     */
    public function email_exists($email, $exclude_id = null)
    {
        $this->db->where('email', $email);
        if ($exclude_id) {
            $this->db->where('id !=', $exclude_id);
        }
        return $this->db->get($this->table)->num_rows() > 0;
    }
}
