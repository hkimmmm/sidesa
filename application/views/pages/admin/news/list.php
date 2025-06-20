<div class="bg-white p-6 rounded-lg shadow mb-8">
	<div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
		<h2 class="text-xl font-bold text-gray-800">Daftar Berita</h2>
		<a href="<?= site_url('news/add') ?>"
			class="inline-flex items-center px-4 py-2 mt-4 md:mt-0 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
			<svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
				<path fill-rule="evenodd"
					d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
					clip-rule="evenodd"></path>
			</svg>
			Tambah Berita
		</a>
	</div>

	<div class="mb-6">
		<div class="flex flex-col md:flex-row md:items-center gap-4">
			<div class="relative flex-grow">
				<div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
					<svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
						<path fill-rule="evenodd"
							d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
							clip-rule="evenodd"></path>
					</svg>
				</div>
				<input type="text" id="newsSearch" placeholder="Cari judul atau isi berita..."
					class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md text-sm placeholder-gray-500 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
			</div>
			<select id="newsStatus"
				class="w-full md:w-auto px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
				<option value="">Semua Status</option>
				<option value="publish">Publik</option>
				<option value="draft">Draft</option>
				<option value="archive">Arsip</option>
			</select>
		</div>
	</div>

	<div class="overflow-x-auto">
		<table class="min-w-full divide-y divide-gray-200 text-sm">
			<thead class="bg-gray-50">
				<tr>
					<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
					<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gambar
					</th>
					<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul
					</th>
					<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status
					</th>
					<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal
					</th>
					<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Penulis
					</th>
					<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
				</tr>
			</thead>
			<tbody class="bg-white divide-y divide-gray-200" id="newsTable">
				<!-- Data will be populated by JavaScript -->
			</tbody>
		</table>
	</div>

	<!-- Pagination -->
	<div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-between items-center">
		<button id="prevPage" disabled
			class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors disabled:bg-gray-400 disabled:cursor-not-allowed">Sebelumnya</button>
		<span class="text-sm text-gray-700" id="pageInfo">Halaman 1 dari 1</span>
		<button id="nextPage" disabled
			class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors disabled:bg-gray-400 disabled:cursor-not-allowed">Selanjutnya</button>
	</div>
</div>

<script>
	// Global variables
	let currentPage = 1;
	const perPage = 5;
	let totalNews = 0;
	let searchTerm = '';
	let statusFilter = '';

	// DOM Content Loaded
	document.addEventListener("DOMContentLoaded", () => {
		fetchNews();

		// Search input event
		document.getElementById("newsSearch").addEventListener("input", function (e) {
			searchTerm = e.target.value;
			currentPage = 1; // Reset to first page when searching
			fetchNews();
		});

		// Status filter change event
		document.getElementById("newsStatus").addEventListener("change", function (e) {
			statusFilter = e.target.value;
			currentPage = 1; // Reset to first page when filtering
			fetchNews();
		});

		// Pagination buttons
		document.getElementById("prevPage").addEventListener("click", function (e) {
			e.preventDefault();
			if (currentPage > 1) {
				currentPage--;
				fetchNews();
			}
		});

		document.getElementById("nextPage").addEventListener("click", function (e) {
			e.preventDefault();
			if (currentPage < Math.ceil(totalNews / perPage)) {
				currentPage++;
				fetchNews();
			}
		});
	});

	// Fetch news from server
	function fetchNews() {
		let url = `<?= base_url('news/get_all') ?>?page=${currentPage}&per_page=${perPage}`;

		if (searchTerm) {
			url += `&search=${encodeURIComponent(searchTerm)}`;
		}

		if (statusFilter) {
			url += `&status=${encodeURIComponent(statusFilter)}`;
		}

		fetch(url)
			.then(response => response.json())
			.then(data => {
				if (data.status === 'success') {
					totalNews = data.pagination.total_records;
					renderTable(data.data);
					updatePagination(data.pagination);
				} else {
					console.error('Error:', data.message);
					showAlert(data.message, 'error');
				}
			})
			.catch(error => {
				console.error('Error:', error);
				showAlert('Terjadi kesalahan saat memuat data', 'error');
			});
	}

	// Render table with news data
	function renderTable(news) {
		const tbody = document.getElementById("newsTable");
		tbody.innerHTML = "";

		if (news.length === 0) {
			tbody.innerHTML = `
				<tr>
					<td colspan="7" class="px-6 py-4 text-center text-gray-500">
						Tidak ada data berita yang ditemukan.
					</td>
				</tr>
			`;
			return;
		}

		news.forEach((item, index) => {
			const statusClasses = {
				'publish': 'bg-green-100 text-green-800',
				'draft': 'bg-yellow-100 text-yellow-800',
				'archive': 'bg-gray-100 text-gray-800'
			};

			const statusClass = statusClasses[item.status] || 'bg-gray-100 text-gray-800';
			const rowNumber = (currentPage - 1) * perPage + index + 1;

			const row = document.createElement("tr");
			row.innerHTML = `
				<td class="px-6 py-4 text-gray-500">${rowNumber}</td>
				<td class="px-6 py-4">
					<img class="h-10 w-10 rounded-md object-cover" 
						src="<?= base_url('uploads/news/') ?>${item.gambar}" alt="${item.judul}">
				</td>
				<td class="px-6 py-4 font-medium text-gray-900">${item.judul}</td>
				<td class="px-6 py-4">
					<span class="px-2 inline-flex text-xs font-semibold rounded-full ${statusClass}">
						${item.status.charAt(0).toUpperCase() + item.status.slice(1)}
					</span>
				</td>
				<td class="px-6 py-4 text-gray-500">${item.created_at.substring(0, 10)}</td>
				<td class="px-6 py-4 text-gray-500">${item.author_name}</td>
				<td class="px-6 py-4 font-medium">
					<a href="<?= site_url('news/edit/') ?>${item.id}"
						class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
					<a href="<?= site_url('news/delete/') ?>${item.id}" class="text-red-600 hover:text-red-900"
						onclick="return confirm('Yakin ingin menghapus berita ini?')">Hapus</a>
				</td>
			`;
			tbody.appendChild(row);
		});
	}

	// Update pagination info
	function updatePagination(pagination) {
		document.getElementById('pageInfo').textContent =
			`Halaman ${pagination.current_page} dari ${pagination.total_pages}`;

		document.getElementById('prevPage').disabled = pagination.current_page === 1;
		document.getElementById('nextPage').disabled = pagination.current_page === pagination.total_pages;
	}

	// Show alert message
	function showAlert(message, type) {
		// Implement your alert/notification system here
		// This could be a toast notification or alert div
		alert(`${type.toUpperCase()}: ${message}`);
	}
</script>
