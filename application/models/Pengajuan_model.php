<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_all($search = null, $jenis_surat_id = null, $tanggal = null, $status = null, $limit = null, $offset = null)
	{
		$this->db->select('p.id AS pengajuan_id, p.no_pengajuan, p.user_id, p.jenis_surat_id, p.keperluan, p.status, p.catatan, p.created_at, p.updated_at, js.nama_surat, js.kode_surat');
		$this->db->from('pengajuan p');
		$this->db->join('jenis_surat js', 'js.id = p.jenis_surat_id');

		if ($search) {	
			$this->db->group_start();
			$this->db->like('p.no_pengajuan', $search);
			$this->db->or_like('js.nama_surat', $search);
			$this->db->or_like('p.keperluan', $search);
			$this->db->group_end();
		}

		if ($jenis_surat_id) {
			$this->db->where('p.jenis_surat_id', $jenis_surat_id);
		}

		// Filter tanggal
		if ($tanggal && $tanggal[0] && $tanggal[1]) {
			$this->db->where('p.created_at >=', $tanggal[0] . ' 00:00:00');
			$this->db->where('p.created_at <=', $tanggal[1] . ' 23:59:59');
		}

		if ($status) {
			$this->db->where('p.status', $status);
		}

		$this->db->order_by('p.created_at', 'DESC');

		if ($limit) {
			$this->db->limit($limit, $offset);
		}

		$result = $this->db->get()->result_array();

		// Tambahkan nama pemohon statis
		foreach ($result as &$item) {
			$item['nama_pemohon'] = 'masyarakat';
		}

		return $result;
	}

	public function count_all($search = null, $jenis_surat_id = null, $tanggal = null, $status = null)
	{
		$this->db->from('pengajuan p');
		$this->db->join('jenis_surat js', 'js.id = p.jenis_surat_id');

		if ($search) {
			$this->db->group_start();
			$this->db->like('p.no_pengajuan', $search);
			$this->db->or_like('js.nama_surat', $search);
			$this->db->or_like('p.keperluan', $search);
			$this->db->group_end();
		}

		if ($jenis_surat_id) {
			$this->db->where('p.jenis_surat_id', $jenis_surat_id);
		}

		if ($tanggal && $tanggal[0] && $tanggal[1]) {
			$this->db->where('p.created_at >=', $tanggal[0] . ' 00:00:00');
			$this->db->where('p.created_at <=', $tanggal[1] . ' 23:59:59');
		}

		if ($status) {
			$this->db->where('p.status', $status);
		}

		return $this->db->count_all_results();
	}

	public function get_by_id($id)
	{
		$this->db->select('
        p.id as pengajuan_id,
        p.no_pengajuan,
        p.user_id,
        p.jenis_surat_id,
        p.keperluan,
        p.status,
        p.catatan,
        p.created_at,
        p.updated_at,
        js.nama_surat,
        js.kode_surat
    ');
		$this->db->from('pengajuan p');
		$this->db->join('jenis_surat js', 'js.id = p.jenis_surat_id', 'inner');
		$this->db->where('p.id', $id);
		$pengajuan = $this->db->get()->row_array();

		if (!$pengajuan) {
			return null;
		}

		// buat slug sementara dari nama_surat (tanpa simpan di DB)
		$pengajuan['jenis_surat_slug'] = strtolower(str_replace(' ', '_', $pengajuan['nama_surat']));

		$this->db->select('field_name, field_value');
		$this->db->from('data_pengajuan');
		$this->db->where('pengajuan_id', $id);
		$fields = $this->db->get()->result_array();

		foreach ($fields as $field) {
			$pengajuan[$field['field_name']] = $field['field_value'];
		}

		return $pengajuan;
	}

	public function get_tracking($id)
	{
		$this->db->select('*');
		$this->db->from('tracking_pengajuan tp');
		$this->db->where('tp.pengajuan_id', $id);
		$this->db->order_by('tp.created_at', 'ASC');
		return $this->db->get()->result_array();
	}

	public function get_dokumen($pengajuan_id)
	{
		$this->db->where('pengajuan_id', $pengajuan_id);
		return $this->db->get('dokumen_pengajuan')->result_array();
	}

	public function insert($data)
	{
		$kode_surat = $this->get_jenis_surat_by_id($data['jenis_surat_id'])['kode_surat'];
		$no_pengajuan = $kode_surat . '/' . date('Y') . '/' . date('m') . '/' . sprintf('%03d', $this->get_count_pengajuan_this_month() + 1);

		$data_pengajuan = [
			'no_pengajuan' => $no_pengajuan,
			'user_id' => 1,
			'jenis_surat_id' => $data['jenis_surat_id'],
			'keperluan' => $data['keperluan'],
			'status' => 'pending',
			'created_at' => date('Y-m-d H:i:s')
		];

		$this->db->insert('pengajuan', $data_pengajuan);
		$pengajuan_id = $this->db->insert_id();

		$this->add_tracking($pengajuan_id, 'pending', 'Pengajuan berhasil dikirim');

		return $pengajuan_id;
	}

	public function update($id, $data)
	{
		$data['updated_at'] = date('Y-m-d H:i:s');
		$this->db->where('id', $id);
		return $this->db->update('pengajuan', $data);
	}

	public function add_dokumen($pengajuan_id, $nama_dokumen, $file_path)
	{
		$data = [
			'pengajuan_id' => $pengajuan_id,
			'nama_dokumen' => $nama_dokumen,
			'file_path' => $file_path,
			'created_at' => date('Y-m-d H:i:s')
		];

		$this->db->insert('dokumen_pengajuan', $data);
		return $this->db->insert_id();
	}

	public function add_tracking($pengajuan_id, $status, $keterangan)
	{
		$data = [
			'pengajuan_id' => $pengajuan_id,
			'status' => $status,
			'keterangan' => $keterangan,
			'created_at' => date('Y-m-d H:i:s')
		];

		$this->db->insert('tracking_pengajuan', $data);

		$this->db->where('id', $pengajuan_id);
		$this->db->update('pengajuan', ['status' => $status, 'updated_at' => date('Y-m-d H:i:s')]);
	}

	public function update_status($id, $status, $catatan = null)
	{
		$data = [
			'status' => $status,
			'catatan' => $catatan,
			'updated_at' => date('Y-m-d H:i:s')
		];

		$this->db->where('id', $id);
		$this->db->update('pengajuan', $data);

		$keterangan = '';
		switch ($status) {
			case 'proses':
				$keterangan = 'Pengajuan sedang diproses oleh petugas';
				break;
			case 'disetujui':
				$keterangan = 'Pengajuan telah disetujui';
				break;
			case 'ditolak':
				$keterangan = 'Pengajuan ditolak: ' . $catatan;
				break;
			case 'selesai':
				$keterangan = 'Surat telah selesai dibuat dan siap diambil';
				break;
		}

		$this->add_tracking($id, $status, $keterangan);
	}

	public function get_jenis_surat()
	{
		return $this->db->get('jenis_surat')->result();
	}

	public function get_jenis_surat_by_id($id)
	{
		return $this->db->get_where('jenis_surat', ['id' => $id])->row_array();
	}

	private function get_count_pengajuan_this_month()
	{
		$this->db->like('created_at', date('Y-m'));
		return $this->db->count_all_results('pengajuan');
	}

	public function save_pengajuan_data($pengajuan_id, $data_pribadi)
	{
		foreach ($data_pribadi as $field => $value) {
			$this->db->insert('data_pengajuan', [
				'pengajuan_id' => $pengajuan_id,
				'field_name' => $field,
				'field_value' => is_array($value) ? json_encode($value) : $value,
				'created_at' => date('Y-m-d H:i:s')
			]);
		}
		return true;
	}

	public function get_pengajuan_data($pengajuan_id)
	{
		$this->db->where('pengajuan_id', $pengajuan_id);
		$result = $this->db->get('data_pengajuan')->result_array();

		$data = [];
		foreach ($result as $row) {
			$value = json_decode($row['field_value'], true);
			$data[$row['field_name']] = $value !== null ? $value : $row['field_value'];
		}
		return $data;
	}

	public function get_terbaru($limit = 2)
	{
		$this->db->select("
        p.id AS id,
        p.user_id,
        js.nama_surat,
        p.created_at,
        'pengajuan' AS tipe
    ");
		$this->db->from('pengajuan p');
		$this->db->join('jenis_surat js', 'js.id = p.jenis_surat_id');
		$this->db->order_by('p.created_at', 'DESC');
		$this->db->limit($limit);
		return $this->db->get()->result();
	}
	public function get_statistik($tahun)
	{
		$this->db->select("status, COUNT(*) as jumlah");
		$this->db->from('pengajuan');
		$this->db->where("YEAR(created_at)", $tahun);
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
	public function get_total_pengajuan_belum_disetujui()
	{
		$this->db->where('status', 'pending');
		return $this->db->count_all_results('pengajuan');
	}
}
