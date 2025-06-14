<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organisasi_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all($search = null, $limit = null, $offset = null)
    {
        $this->db->from('organisasi_desa');
        
        if ($search) {
            $this->db->group_start();
            $this->db->like('nama', $search);
            $this->db->or_like('jabatan', $search);
            $this->db->group_end();
        }
        
        $this->db->order_by('urutan', 'ASC');
        
        if ($limit !== null && $offset !== null) {
            $this->db->limit($limit, $offset);
        }
        
        return $this->db->get()->result();
    }
    
    public function count_all($search = null)
    {
        $this->db->from('organisasi_desa');
        
        if ($search) {
            $this->db->group_start();
            $this->db->like('nama', $search);
            $this->db->or_like('jabatan', $search);
            $this->db->group_end();
        }
        
        return $this->db->count_all_results();
    }
    
    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('organisasi_desa')->row();
    }
    
    public function create($data, $foto = null)
    {
        if ($foto) {
            $data['foto'] = $this->upload_foto($foto);
        }
        
        $this->db->insert('organisasi_desa', $data);
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
        
        return $this->db->update('organisasi_desa', $data);
    }
    
    public function delete($id)
    {
        $data = $this->get_by_id($id);
        if ($data->foto) {
            $this->delete_foto($data->foto);
        }
        
        $this->db->where('id', $id);
        return $this->db->delete('organisasi_desa');
    }
    
    private function upload_foto($file)
    {
        $config['upload_path'] = './uploads/organisasi/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048; // 2MB
        $config['encrypt_name'] = true;
        
        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload($file)) {
            return null;
        } else {
            $upload_data = $this->upload->data();
            return 'uploads/organisasi/' . $upload_data['file_name'];
        }
    }
    
    private function delete_foto($path)
    {
        if (file_exists($path)) {
            unlink($path);
        }
    }
}
