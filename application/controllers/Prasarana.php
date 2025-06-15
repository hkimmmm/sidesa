<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prasarana extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Prasarana_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Daftar Prasarana';
        
        // Pagination
        $this->load->library('pagination');
        
        $config['base_url'] = site_url('prasarana/index');
        $config['total_rows'] = $this->Prasarana_model->count_all($this->input->get('search'));
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['reuse_query_string'] = TRUE;
        
        $this->pagination->initialize($config);
        
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        $data['prasarana'] = $this->Prasarana_model->get_all(
            $this->input->get('search'),
            $config['per_page'],
            $page
        );
        
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('layouts/prasarana', $data);
    }
    
    public function view($id)
    {
        $data['title'] = 'Detail Prasarana';
        $data['prasarana'] = $this->Prasarana_model->get_by_id($id);
        
        if (!$data['prasarana']) {
            show_404();
        }
        
        $this->load->view('layouts/detail_prasarana', $data);
    }
    
    public function create()
    {
        $data['title'] = 'Tambah Prasarana';
        $data['jenis_prasarana'] = $this->Prasarana_model->get_jenis_prasarana();
        
        $this->form_validation->set_rules('nama_prasarana', 'Nama Prasarana', 'required');
        $this->form_validation->set_rules('jenis_id', 'Jenis Prasarana', 'required|numeric');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('layouts/add_prasarana', $data);
        } else {
            $post_data = $this->input->post();
            
            $insert_id = $this->Prasarana_model->create($post_data, 'foto');
            
            if ($insert_id) {
                $this->session->set_flashdata('success', 'Data prasarana berhasil ditambahkan');
                redirect('prasarana');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan data prasarana');
                redirect('layouts/add_prasarana');
            }
        }
    }
    
    public function edit($id)
    {
        $data['title'] = 'Edit Prasarana';
        $data['prasarana'] = $this->Prasarana_model->get_by_id($id);
        $data['jenis_prasarana'] = $this->Prasarana_model->get_jenis_prasarana();
        
        if (!$data['prasarana']) {
            show_404();
        }
        
        $this->form_validation->set_rules('nama_prasarana', 'Nama Prasarana', 'required');
        $this->form_validation->set_rules('jenis_id', 'Jenis Prasarana', 'required|numeric');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('layouts/edit_prasarana', $data);
        } else {
            $post_data = $this->input->post();
            
            $success = $this->Prasarana_model->update($id, $post_data, 'foto');
            
            if ($success) {
                $this->session->set_flashdata('success', 'Data prasarana berhasil diperbarui');
                redirect('prasarana');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui data prasarana');
                redirect('layouts/edit_prasarana/' . $id);
            }
        }
    }
    
    public function delete($id)
    {
        if (!$this->input->is_ajax_request()) {
            show_404();
        }
        
        $success = $this->Prasarana_model->delete($id);
        
        if ($success) {
            $response = ['status' => 'success', 'message' => 'Data prasarana berhasil dihapus'];
        } else {
            $response = ['status' => 'error', 'message' => 'Gagal menghapus data prasarana'];
        }
        
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
}
