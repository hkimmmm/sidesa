<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prasarana_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all($search = null, $limit = null, $offset = null)
    {
        $this->db->select('prasarana.*, jenis_prasarana.nama_jenis');
        $this->db->from('prasarana');
        $this->db->join('jenis_prasarana', 'jenis_prasarana.id = prasarana.jenis_id');
        
        if ($search) {
            $this->db->group_start();
            $this->db->like('prasarana.nama_prasarana', $search);
            $this->db->or_like('jenis_prasarana.nama_jenis', $search);
            $this->db->or_like('prasarana.lokasi', $search);
            $this->db->group_end();
        }
        
        $this->db->order_by('prasarana.nama_prasarana', 'ASC');
        
        if ($limit !== null && $offset !== null) {
            $this->db->limit($limit, $offset);
        }
        
        return $this->db->get()->result();
    }
    
    public function count_all($search = null)
    {
        $this->db->from('prasarana');
        $this->db->join('jenis_prasarana', 'jenis_prasarana.id = prasarana.jenis_id');
        
        if ($search) {
            $this->db->group_start();
            $this->db->like('prasarana.nama_prasarana', $search);
            $this->db->or_like('jenis_prasarana.nama_jenis', $search);
            $this->db->or_like('prasarana.lokasi', $search);
            $this->db->group_end();
        }
        
        return $this->db->count_all_results();
    }
    
    public function get_by_id($id)
    {
        $this->db->select('prasarana.*, jenis_prasarana.nama_jenis');
        $this->db->from('prasarana');
        $this->db->join('jenis_prasarana', 'jenis_prasarana.id = prasarana.jenis_id');
        $this->db->where('prasarana.id', $id);
        return $this->db->get()->row();
    }
    
    public function get_jenis_prasarana()
    {
        return $this->db->get('jenis_prasarana')->result();
    }
    
    public function create($data, $foto = null)
    {
        if ($foto) {
            $data['foto'] = $this->upload_foto($foto);
        }
        
        $this->db->insert('prasarana', $data);
        return $this->db->insert_id();
    }
    
    public function update($id, $data, $foto = null)
    {
        $this->db->where('id', $id);
        
        if ($foto) {
            // Hapus foto lama jika ada
            $old_data = $this->get_by_id($id);
            if ($old_data->foto) {
                $this->delete_foto($old_data->foto);
            }
            $data['foto'] = $this->upload_foto($foto);
        }
        
        return $this->db->update('prasarana', $data);
    }
    
    public function delete($id)
    {
        $data = $this->get_by_id($id);
        if ($data->foto) {
            $this->delete_foto($data->foto);
        }
        
        $this->db->where('id', $id);
        return $this->db->delete('prasarana');
    }
    
    private function upload_foto($file)
    {
        $config['upload_path'] = './uploads/prasarana/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048; // 2MB
        $config['encrypt_name'] = true;
        
        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload($file)) {
            return null;
        } else {
            $upload_data = $this->upload->data();
            return 'uploads/prasarana/' . $upload_data['file_name'];
        }
    }
    
    private function delete_foto($path)
    {
        if (file_exists($path)) {
            unlink($path);
        }
    }
}
