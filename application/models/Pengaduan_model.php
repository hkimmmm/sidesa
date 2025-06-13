<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaduan_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function get_all($start_date = null, $end_date = null, $jenis = null, $status = null)
	{
		$this->db->select('*');
		$this->db->from('pengaduan');

		if ($start_date && $end_date) {
			$this->db->where('tanggal_kejadian >=', $start_date);
			$this->db->where('tanggal_kejadian <=', $end_date);
		}

		if (!empty($jenis)) {
			$this->db->where('jenis_pengaduan', $jenis);
		}

		if (!empty($status)) {
			$this->db->where('status', $status);
		}

		$this->db->order_by('tanggal_pengaduan', 'DESC');
		return $this->db->get()->result_array();
	}
	private function generate_kode_pengaduan()
	{
		$prefix = 'PGD-' . date('Y-m') . '-';
		$last = $this->db->query("SELECT MAX(kode_pengaduan) as last_code FROM pengaduan WHERE kode_pengaduan LIKE '{$prefix}%'")->row();

		if ($last && $last->last_code) {
			$last_num = (int) substr($last->last_code, strlen($prefix));
			$new_num = $last_num + 1;
		} else {
			$new_num = 1;
		}

		return $prefix . str_pad($new_num, 3, '0', STR_PAD_LEFT);
	}

	public function create_pengaduan($data, $files = [])
	{
		$this->db->trans_start();

		$data['kode_pengaduan'] = $this->generate_kode_pengaduan();
		$data['tanggal_pengaduan'] = date('Y-m-d H:i:s');
		$data['status'] = 'diterima';

		$this->db->insert('pengaduan', $data);
		$pengaduan_id = $this->db->insert_id();

		if (!empty($files)) {
			$this->add_lampiran($pengaduan_id, $files);
		}

		$this->add_progress($pengaduan_id, 'diterima', 'Pengaduan diterima oleh sistem');

		$this->db->trans_complete();

		return $this->db->trans_status() ? $pengaduan_id : false;
	}

	public function add_lampiran($pengaduan_id, $files)
	{
		$upload_path = './uploads/pengaduan/';
		if (!is_dir($upload_path)) {
			mkdir($upload_path, 0777, true);
		}

		$config['upload_path'] = $upload_path;
		$config['allowed_types'] = 'jpg|jpeg|png|pdf';
		$config['max_size'] = 5120;
		$config['encrypt_name'] = true;

		$this->load->library('upload', $config);

		foreach ($files as $field_name => $file) {
			if ($this->upload->do_upload($field_name)) {
				$upload_data = $this->upload->data();

				$lampiran = [
					'pengaduan_id' => $pengaduan_id,
					'nama_file' => $upload_data['orig_name'],
					'path' => 'uploads/pengaduan/' . $upload_data['file_name'],
					'tipe_file' => $upload_data['file_type'],
					'ukuran' => $upload_data['file_size']
				];

				$this->db->insert('lampiran_pengaduan', $lampiran);
			}
		}
	}

	public function add_progress($pengaduan_id, $status, $keterangan = null)
	{
		$progress = [
			'pengaduan_id' => $pengaduan_id,
			'status' => $status,
			'keterangan' => $keterangan
		];

		$this->db->insert('progress_pengaduan', $progress);

		$current_status = $this->db->get_where('pengaduan', ['id' => $pengaduan_id])->row()->status;
		if ($status == 'selesai' || $status == 'ditolak') {
			$this->db->where('id', $pengaduan_id)
				->update('pengaduan', ['status' => $status]);
		} elseif ($status == 'penanganan' && $current_status != 'proses') {
			$this->db->where('id', $pengaduan_id)
				->update('pengaduan', ['status' => 'proses']);
		}
	}

	public function get_pengaduan_by_user($user_id, $filter = [])
	{
		$this->db->where('user_id', $user_id);

		if (!empty($filter['status'])) {
			$this->db->where('status', $filter['status']);
		}

		if (!empty($filter['jenis'])) {
			$this->db->where('jenis_pengaduan', $filter['jenis']);
		}

		if (!empty($filter['start_date'])) {
			$this->db->where('tanggal_pengaduan >=', $filter['start_date']);
		}

		if (!empty($filter['end_date'])) {
			$this->db->where('tanggal_pengaduan <=', $filter['end_date']);
		}

		$this->db->order_by('tanggal_pengaduan', 'DESC');
		return $this->db->get('pengaduan')->result();
	}

	public function get_pengaduan_detail($pengaduan_id, $user_id = null)
	{
		$this->db->where('id', $pengaduan_id);
		if ($user_id) {
			$this->db->where('user_id', $user_id);
		}

		$pengaduan = $this->db->get('pengaduan')->row();

		if ($pengaduan) {
			$pengaduan->lampiran = $this->db->get_where('lampiran_pengaduan', ['pengaduan_id' => $pengaduan_id])->result();
			$pengaduan->progress = $this->db->order_by('tanggal', 'ASC')
				->get_where('progress_pengaduan', ['pengaduan_id' => $pengaduan_id])
				->result();
		}

		return $pengaduan;
	}

	public function update_pengaduan($pengaduan_id, $data, $files = [])
	{
		$this->db->trans_start();

		$this->db->where('id', $pengaduan_id)
			->update('pengaduan', $data);
		if (!empty($files)) {
			$this->add_lampiran($pengaduan_id, $files);
		}

		$this->db->trans_complete();

		return $this->db->trans_status();
	}

	public function add_tracking($pengaduan_id, $status, $keterangan)
	{
		$data = [
			'pengaduan_id' => $pengaduan_id,
			'status' => $status,
			'keterangan' => $keterangan,
			'tanggal' => date('Y-m-d H:i:s')
		];

		// Tambahkan progress baru
		$this->db->insert('progress_pengaduan', $data);

		// Update status terakhir di tabel pengaduan
		$this->db->where('id', $pengaduan_id);
		$this->db->update('pengaduan', [
			'status' => $status,
			'updated_at' => date('Y-m-d H:i:s')
		]);
	}


	public function update_status($id, $status, $alasan_ditolak = null)
	{
		$data = [
			'status' => $status,
			'alasan_ditolak' => $alasan_ditolak,
		];

		$this->db->where('id', $id);
		$this->db->update('pengaduan', $data);

		$keterangan = '';
		switch ($status) {
			case 'proses':
				$keterangan = 'Pengajuan sedang diproses oleh petugas';
				break;
			case 'diterima':
				$keterangan = 'Pengajuan telah diterima';
				break;
			case 'ditolak':
				$keterangan = 'Pengajuan ditolak: ' . $alasan_ditolak;
				break;
			case 'selesai':
				$keterangan = 'Surat telah selesai dibuat dan siap diambil';
				break;
		}

		$this->add_tracking($id, $status, $keterangan);
	}

	public function delete_pengaduan($pengaduan_id)
	{
		$this->db->trans_start();
		$lampiran = $this->db->get_where('lampiran_pengaduan', ['pengaduan_id' => $pengaduan_id])->result();
		foreach ($lampiran as $file) {
			if (file_exists($file->path)) {
				unlink($file->path);
			}
		}

		$this->db->where('id', $pengaduan_id)->delete('pengaduan');

		$this->db->trans_complete();

		return $this->db->trans_status();
	}

	public function get_terbaru($limit = 2)
	{
		$this->db->select("
        id,
        user_id,
        kode_pengaduan,
        jenis_pengaduan,
        tanggal_pengaduan AS created_at, -- Alias untuk menyamakan nama kolom
        'pengaduan' AS tipe
    ");
		$this->db->from('pengaduan');
		$this->db->order_by('tanggal_pengaduan', 'DESC');
		$this->db->limit($limit);
		return $this->db->get()->result(); // Mengembalikan array of stdClass
	}

	public function get_prioritas($limit = 3)
	{
		// Tentukan prioritas berdasarkan status
		$this->db->select("
        id,
        user_id,
        kode_pengaduan AS judul,
        jenis_pengaduan AS deskripsi,
        tanggal_pengaduan AS created_at,
        'pengaduan' AS tipe,
        status
    ");
		$this->db->from('pengaduan');

		// Urutkan berdasarkan prioritas status (proses > diterima > lainnya)
		$this->db->order_by('FIELD(status, "proses", "diterima", "selesai", "ditolak") DESC');
		$this->db->order_by('tanggal_pengaduan', 'DESC'); // Urutkan berdasarkan tanggal jika status sama

		// Batasi jumlah data
		$this->db->limit($limit);

		$query = $this->db->get();
		return $query->result();
	}

	public function get_statistik($tahun)
	{
		$this->db->select("status, COUNT(*) as jumlah");
		$this->db->from('pengaduan');
		$this->db->where("YEAR(tanggal_pengaduan)", $tahun);
		$this->db->group_by("status");
		$result = $this->db->get()->result_array();

		// Format data untuk grafik
		$labels = [];
		$data = [];
		foreach ($result as $row) {
			$labels[] = $row['status'] ?: 'Tidak Ditentukan';
			$data[] = (int) $row['jumlah'];
		}

		return [
			'labels' => $labels,
			'data' => $data
		];
	}
}
