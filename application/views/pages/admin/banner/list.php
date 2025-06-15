<div class="max-w-6xl mx-auto">
	<div class="flex justify-between items-center mb-8">
		<h1 class="text-2xl font-bold text-gray-800">Daftar Banner</h1>
		<div class="flex space-x-2">
			<a href="<?= base_url('admin/add_banner'); ?>"
				class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
				Tambah Banner
			</a>
		</div>
	</div>

	<div class="mb-6 bg-white rounded-lg shadow-md p-4">
		<form method="get" action="#"
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
					<input type="text" name="search" id="search" value=""
						class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
						placeholder="Cari judul atau isi banner">
				</div>
			</div>
			<div class="relative">
				<label for="filter_status" class="sr-only">Status</label>
				<select name="filter_status" id="filter_status"
					class="block w-full pl-3 pr-10 py-2 border border-gray-300 rounded-lg leading-5 bg-white focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
					<option value="">Semua Status</option>
					<option value="Aktif">Aktif</option>
					<option value="Nonaktif">Nonaktif</option>
				</select>
			</div>
			<button type="submit"
				class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
				Cari
			</button>
		</form>
	</div>

	<div class="bg-white rounded-lg shadow-md overflow-hidden">
		<div class="overflow-x-auto">
			<table class="min-w-full divide-y divide-gray-200">
				<thead class="bg-gray-50">
					<tr>
						<th scope="col"
							class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No
						</th>
						<th scope="col"
							class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul
						</th>
						<th scope="col"
							class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
							Tanggal Publikasi</th>
						<th scope="col"
							class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
							Tanggal Berakhir</th>
						<th scope="col"
							class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Isi
						</th>
						<th scope="col"
							class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Foto
						</th>
						<th scope="col"
							class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
							Status</th>
						<th scope="col"
							class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi
						</th>
					</tr>
				</thead>
				<tbody class="bg-white divide-y divide-gray-200" id="bannerTable">
					<!-- Data will be populated by JavaScript -->
				</tbody>
			</table>
		</div>
		<div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-between items-center">
			<a href="#"
				class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors disabled:bg-gray-400 disabled:cursor-not-allowed"
				id="prevPage">Sebelumnya</a>
			<span class="text-sm text-gray-700" id="pageInfo">Halaman 1 dari 2</span>
			<a href="#"
				class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors disabled:bg-gray-400 disabled:cursor-not-allowed"
				id="nextPage">Selanjutnya</a>
		</div>
	</div>
</div>

<script>
	// Dummy data for banners (exactly 5 entries)
	const banners = [
		{ id: 1, judul: "Pemberitahuan Libur Nasional", tanggal_publikasi: "2025-06-01", tanggal_berakhir: "2025-06-02", isi: "Kantor desa tutup pada hari libur nasional.", foto: "https://via.placeholder.com/40", status: "Nonaktif" },
		{ id: 2, judul: "Vaksinasi Massal", tanggal_publikasi: "2025-06-05", tanggal_berakhir: "2025-06-10", isi: "Vaksinasi COVID-19 gratis di balai desa.", foto: "https://via.placeholder.com/40", status: "Aktif" },
		{ id: 3, judul: "Pembersihan Lingkungan", tanggal_publikasi: "2025-06-08", tanggal_berakhir: "2025-06-08", isi: "Kerja bakti di lingkungan RT 01.", foto: "https://via.placeholder.com/40", status: "Nonaktif" },
		{ id: 4, judul: "Pengumuman Pemilihan Ketua RT", tanggal_publikasi: "2025-06-10", tanggal_berakhir: "2025-06-15", isi: "Pemilihan ketua RT baru.", foto: "https://via.placeholder.com/40", status: "Aktif" },
		{ id: 5, judul: "Bantuan Sosial", tanggal_publikasi: "2025-06-12", tanggal_berakhir: "2025-06-20", isi: "Pendaftaran bantuan sosial di kantor desa.", foto: "https://via.placeholder.com/40", status: "Aktif" },
	];

	const perPage = 3;
	let currentPage = 1;

	function renderTable(page) {
		const start = (page - 1) * perPage;
		const end = start + perPage;
		const paginatedData = banners.slice(start, end);
		const tbody = document.getElementById('bannerTable');
		tbody.innerHTML = '';

		paginatedData.forEach((item, index) => {
			const row = `
				<tr>
					<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${start + index + 1}</td>
					<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">${item.judul}</td>
					<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${item.tanggal_publikasi}</td>
					<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${item.tanggal_berakhir}</td>
					<td class="px-6 py-4 text-sm text-gray-500">${item.isi}</td>
					<td class="px-6 py-4 whitespace-nowrap">
						<img src="${item.foto}" alt="Banner Image" class="h-10 w-10 rounded object-cover">
					</td>
					<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${item.status}</td>
					<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
						<a href="#" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
						<a href="#" class="text-red-600 hover:text-red-900" onclick="confirmDelete(${item.id})">Hapus</a>
					</td>
				</tr>
			`;
			tbody.innerHTML += row;
		});

		const totalPages = Math.ceil(banners.length / perPage);
		document.getElementById('pageInfo').textContent = `Halaman ${page} dari ${totalPages}`;
		const prevPage = document.getElementById('prevPage');
		const nextPage = document.getElementById('nextPage');
		prevPage.disabled = page === 1;
		nextPage.disabled = page === totalPages;
		prevPage.classList.toggle('disabled:bg-gray-400', prevPage.disabled);
		prevPage.classList.toggle('disabled:cursor-not-allowed', prevPage.disabled);
		nextPage.classList.toggle('disabled:bg-gray-400', nextPage.disabled);
		nextPage.classList.toggle('disabled:cursor-not-allowed', nextPage.disabled);
	}

	function confirmDelete(id) {
		if (confirm('Apakah Anda yakin ingin menghapus data banner ini?')) {
			alert(`Data banner dengan ID ${id} telah dihapus.`);
			// Simulasi penghapusan, dalam aplikasi nyata ini akan mengirimkan request ke server
			window.location.reload();
		}
	}

	document.addEventListener('DOMContentLoaded', function () {
		const prevPage = document.getElementById('prevPage');
		const nextPage = document.getElementById('nextPage');

		renderTable(currentPage);

		prevPage.addEventListener('click', function (e) {
			e.preventDefault();
			if (currentPage > 1) {
				currentPage--;
				renderTable(currentPage);
			}
		});

		nextPage.addEventListener('click', function (e) {
			e.preventDefault();
			if (currentPage < Math.ceil(banners.length / perPage)) {
				currentPage++;
				renderTable(currentPage);
			}
		});
	});
</script>