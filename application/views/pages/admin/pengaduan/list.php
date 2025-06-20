<div class="max-w-6xl mx-auto">
	<div class="flex justify-between items-center mb-8">
		<h1 class="text-2xl font-bold text-gray-800">Daftar Pengaduan</h1>
		<div class="flex space-x-2">
			<a href="<?= site_url('pengaduan') ?>"
				class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">
				Tampilan User
			</a>
		</div>
	</div>

	<div class="mb-6 bg-white rounded-lg shadow-md p-4">
		<form method="get" action="<?= site_url('pengaduan/admin') ?>"
			class="flex flex-col md:flex-row md:items-center space-y-2 md:space-y-0 md:space-x-4">
			<div class="flex-1">
				<label for="search" class="sr-only">Search</label>
				<div class="relative">
					<div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
						<svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
							<path fill-rule="evenodd"
								d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
								clip-rule="evenodd"></path>
						</svg>
					</div>
					<input type="text" name="search" id="search"
						class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
						placeholder="Cari no. pengaduan atau nama pemohon">
				</div>
			</div>
			<div>
				<label for="status" class="sr-only">Status</label>
				<select id="status" name="status"
					class="block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-lg">
					<option value="">Semua Status</option>
					<option value="pending" <?= $status == 'pending' ? 'selected' : '' ?>>Pending</option>
					<option value="proses" <?= $status == 'proses' ? 'selected' : '' ?>>Proses</option>
					<option value="disetujui" <?= $status == 'disetujui' ? 'selected' : '' ?>>Disetujui</option>
					<option value="ditolak" <?= $status == 'ditolak' ? 'selected' : '' ?>>Ditolak</option>
					<option value="selesai" <?= $status == 'selesai' ? 'selected' : '' ?>>Selesai</option>
				</select>
			</div>
			<div>
				<label for="prioritas" class="sr-only">Prioritas</label>
				<select id="prioritas" name="prioritas"
					class="block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-lg">
					<option value="">Semua Prioritas</option>
					<option value="rendah" <?= ($this->input->get('prioritas') == 'rendah') ? 'selected' : '' ?>>Rendah
					</option>
					<option value="sedang" <?= ($this->input->get('prioritas') == 'sedang') ? 'selected' : '' ?>>Sedang
					</option>
					<option value="tinggi" <?= ($this->input->get('prioritas') == 'tinggi') ? 'selected' : '' ?>>Tinggi
					</option>
					<option value="darurat" <?= ($this->input->get('prioritas') == 'darurat') ? 'selected' : '' ?>>Darurat
					</option>
				</select>
			</div>

			<div>
				<label for="tanggal" class="sr-only">Tanggal</label>
				<input type="text" name="tanggal" id="tanggal"
					class="block w-full pl-3 pr-3 py-2 border border-gray-300 rounded-lg leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
					placeholder="Pilih rentang tanggal" value="<?= $tanggal ?? '' ?>">
			</div>
			<button type="submit"
				class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
				Filter
			</button>
		</form>
	</div>

	<?php if (empty($pengaduan)): ?>
		<div class="bg-white rounded-lg shadow-md p-6 text-center">
			<p class="text-gray-600">Tidak ada data pengaduan</p>
		</div>
	<?php else: ?>
		<div class="bg-white rounded-lg shadow-md overflow-hidden">
			<div class="overflow-x-auto">
				<table class="min-w-full divide-y divide-gray-200">
					<thead class="bg-gray-50">
						<tr>
							<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No. Pengaduan</th>
							<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jenis Surat</th>
							<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pemohon</th>
							<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Prioritas</th>
							<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Judul</th>
							<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Deskripsi</th>
							<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Lokasi</th>
							<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal Kejadian
							</th>
							<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal Pengaduan
							</th>
							<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
							<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Alasan Ditolak</th>
							<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
							<th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Aksi</th>
						</tr>
					</thead>
					<tbody class="bg-white divide-y divide-gray-200" id="pengaduanTable">
						<!-- Data dari JavaScript -->
					</tbody>
				</table>
				<div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-between items-center">
					<button id="prevPage"
						class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors disabled:bg-gray-400 disabled:cursor-not-allowed">
						Sebelumnya
					</button>
					<span class="text-sm text-gray-700" id="pageInfo">Halaman 1 dari 1</span>
					<button id="nextPage"
						class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors disabled:bg-gray-400 disabled:cursor-not-allowed">
						Selanjutnya
					</button>
				</div>

			</div>
		</div>
	<?php endif; ?>
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<!-- JS Flatpickr -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
	let currentPage = 1;
	const perPage = 10;
	let totalPengaduan = 0;

	document.addEventListener('DOMContentLoaded', () => {
		fetchPengaduan();

		document.getElementById("prevPage").addEventListener("click", () => {
			if (currentPage > 1) {
				currentPage--;
				fetchPengaduan();
			}
		});

		document.getElementById("nextPage").addEventListener("click", () => {
			if (currentPage < Math.ceil(totalPengaduan / perPage)) {
				currentPage++;
				fetchPengaduan();
			}
		});
	});

	function fetchPengaduan() {
		let status = document.getElementById('status')?.value || '';
		let prioritas = document.getElementById('prioritas')?.value || '';
		let tanggal = document.getElementById('tanggal')?.value || '';
		let search = document.getElementById('search')?.value || '';

		const params = new URLSearchParams({
			page: currentPage,
			per_page: perPage,
			status,
			prioritas,
			tanggal,
			search
		});

		fetch(`<?= base_url('pengaduan/get_all') ?>?${params.toString()}`, {
			method: 'GET',
			headers: {
				'X-Requested-With': 'XMLHttpRequest'
			}
		})
			.then(res => res.json())
			.then(data => {
				totalPengaduan = data.total;
				renderPengaduanTable(data.pengaduan);
				updatePengaduanPagination();
			})
			.catch(err => console.error('Error saat fetch:', err));

	}

	function renderPengaduanTable(data) {
		const tbody = document.getElementById("pengaduanTable");
		tbody.innerHTML = "";

		if (!data.length) {
			tbody.innerHTML = `<tr><td colspan="13" class="text-center text-gray-500 py-4">Tidak ada data</td></tr>`;
			return;
		}

		data.forEach((item, index) => {
			const row = document.createElement("tr");
			row.innerHTML = `
				<td class="px-6 py-4 text-sm text-gray-900">${item.kode_pengaduan}</td>
				<td class="px-6 py-4 text-sm text-gray-500">${item.jenis_pengaduan}</td>
				<td class="px-6 py-4 text-sm text-gray-500">${item.user_id}</td>
				<td class="px-6 py-4 text-sm text-gray-500">${item.prioritas}</td>
				<td class="px-6 py-4 text-sm text-gray-500">${item.judul}</td>
				<td class="px-6 py-4 text-sm text-gray-500">${item.deskripsi}</td>
				<td class="px-6 py-4 text-sm text-gray-500">${item.lokasi}</td>
				<td class="px-6 py-4 text-sm text-gray-500">${item.tanggal_kejadian}</td>
				<td class="px-6 py-4 text-sm text-gray-500">${formatDate(item.tanggal_pengaduan)}</td>
				<td class="px-6 py-4 text-sm">
					<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${statusClass(item.status)}">
						${item.status.charAt(0).toUpperCase() + item.status.slice(1)}
					</span>
				</td>
				<td class="px-6 py-4 text-sm text-gray-500">${item.alasan_ditolak ?? ''}</td>
				<td class="px-6 py-4 text-sm text-gray-500">${item.email_pelapor}</td>
				<td class="px-6 py-4 text-sm text-right">
					<a href="<?= site_url('pengaduan/detail/') ?>${item.id}" class="text-blue-600 hover:text-blue-900">Detail</a>
				</td>
			`;
			tbody.appendChild(row);
		});
	}

	function updatePengaduanPagination() {
		const totalPages = Math.ceil(totalPengaduan / perPage);
		document.getElementById('pageInfo').textContent = `Halaman ${currentPage} dari ${totalPages}`;
		document.getElementById('prevPage').disabled = currentPage === 1;
		document.getElementById('nextPage').disabled = currentPage === totalPages;
	}

	function statusClass(status) {
		switch (status) {
			case 'proses': return 'bg-blue-100 text-blue-800';
			case 'diterima': return 'bg-green-100 text-green-800';
			case 'ditolak': return 'bg-red-100 text-red-800';
			case 'selesai': return 'bg-purple-100 text-purple-800';
			default: return 'bg-gray-100 text-gray-800';
		}
	}

	function formatDate(dateString) {
		const date = new Date(dateString);
		return date.toLocaleDateString('id-ID', { day: '2-digit', month: 'short', year: 'numeric' });
	}
</script>