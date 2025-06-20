<div class="max-w-6xl mx-auto p-4">
	<div class="flex justify-between items-center mb-8">
		<h1 class="text-2xl font-bold text-gray-800">Daftar Banner</h1>
		<div class="flex space-x-2">
			<button onclick="openModal()"
				class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
				Tambah Banner
			</button>
		</div>
	</div>

	<!-- Modal Upload -->
	<div id="imageModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden z-50">
		<div class="bg-white p-6 rounded-lg w-96 shadow-md relative">
			<button onclick="closeModal()" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
					stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
				</svg>
			</button>

			<h2 class="text-lg font-semibold text-gray-700 mb-4" id="modalTitle">Tambah Banner</h2>
			<form id="bannerForm" class="space-y-4">
				<input type="hidden" name="id" id="bannerId">
				<input type="text" name="title" id="title" placeholder="Judul" required
					class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />

				<textarea name="content" id="content" placeholder="Isi banner"
					class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>

				<div class="grid grid-cols-2 gap-4">
					<input type="date" name="start_date" id="start_date"
						class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
					<input type="date" name="end_date" id="end_date"
						class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
				</div>

				<select name="status" id="status"
					class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
					<option value="Aktif">Aktif</option>
					<option value="Nonaktif">Nonaktif</option>
				</select>

				<div id="imageUploadContainer">
					<label class="block text-sm font-medium text-gray-700 mb-1">Gambar Banner</label>
					<input type="file" name="banner_image" id="banner_image" accept="image/*"
						class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
					<p class="mt-1 text-sm text-gray-500">Format: JPG, PNG (Max 2MB)</p>
				</div>

				<div class="flex items-center space-x-2">
					<input type="hidden" name="is_active" value="0">
					<input type="checkbox" name="is_active" value="1" id="is_active" checked>
					<label for="is_active" class="text-sm text-gray-700">Tampilkan di carousel</label>
				</div>

				<div class="flex justify-end space-x-2">
					<button type="button" onclick="closeModal()"
						class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition-colors">
						Batal
					</button>
					<button type="submit" id="submitButton"
						class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
						Simpan
					</button>
				</div>
			</form>
		</div>
	</div>

	<!-- Tabel Banner -->
	<div class="bg-white rounded-lg shadow-md overflow-hidden">
		<div class="overflow-x-auto">
			<table class="min-w-full divide-y divide-gray-200">
				<thead class="bg-gray-50">
					<tr>
						<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
						<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Judul</th>
						<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal Publikasi
						</th>
						<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal Berakhir
						</th>
						<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
						<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Gambar</th>
						<th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Aksi</th>
					</tr>
				</thead>
				<tbody class="bg-white divide-y divide-gray-200" id="bannerTable">
					<!-- Data will be populated by JavaScript -->
				</tbody>
			</table>
		</div>
		<div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-between items-center">
			<button id="prevPage" disabled
				class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors disabled:bg-gray-400 disabled:cursor-not-allowed">Sebelumnya</button>
			<span class="text-sm text-gray-700" id="pageInfo">Halaman 1 dari 1</span>
			<button id="nextPage" disabled
				class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors disabled:bg-gray-400 disabled:cursor-not-allowed">Selanjutnya</button>
		</div>
	</div>
</div>

<script>
	// Global variables
	let currentPage = 1;
	const perPage = 10;
	let totalBanners = 0;

	// DOM Content Loaded
	document.addEventListener("DOMContentLoaded", () => {
		fetchBanners();

		// Form submission
		document.getElementById("bannerForm").addEventListener("submit", function (e) {
			e.preventDefault();
			submitBannerForm();
		});

		// Pagination buttons
		document.getElementById("prevPage").addEventListener("click", function (e) {
			e.preventDefault();
			if (currentPage > 1) {
				currentPage--;
				fetchBanners();
			}
		});

		document.getElementById("nextPage").addEventListener("click", function (e) {
			e.preventDefault();
			if (currentPage < Math.ceil(totalBanners / perPage)) {
				currentPage++;
				fetchBanners();
			}
		});
	});

	// Fetch banners from server
	function fetchBanners() {
		fetch(`<?= base_url('banner/get_all') ?>?page=${currentPage}&per_page=${perPage}`)
			.then(response => response.json())
			.then(data => {
				totalBanners = data.total;
				renderTable(data.banners);
				updatePagination();
			})
			.catch(error => console.error('Error:', error));
	}

	// Render table with banner data
	function renderTable(banners) {
		const tbody = document.getElementById("bannerTable");
		tbody.innerHTML = "";

		banners.forEach((banner, index) => {
			const row = document.createElement("tr");
			row.innerHTML = `
				<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${(currentPage - 1) * perPage + index + 1}</td>
				<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${banner.title}</td>
				<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${banner.start_date}</td>
				<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${banner.end_date}</td>
				<td class="px-6 py-4 whitespace-nowrap">
					<span class="px-2 py-1 text-xs rounded-full ${banner.status === 'Aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'}">
						${banner.status}
					</span>
				</td>
				<td class="px-6 py-4 whitespace-nowrap">
					<img src="<?= base_url() ?>${banner.image_url}" alt="${banner.title}" class="h-10 w-10 rounded object-cover">
				</td>
				<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
					<button onclick="editBanner(${banner.id})" class="text-blue-600 hover:text-blue-900 mr-2">Edit</button>
					<button onclick="confirmDelete(${banner.id})" class="text-red-600 hover:text-red-900">Hapus</button>
				</td>
			`;
			tbody.appendChild(row);
		});
	}

	// Update pagination info
	function updatePagination() {
		const totalPages = Math.ceil(totalBanners / perPage);
		document.getElementById('pageInfo').textContent = `Halaman ${currentPage} dari ${totalPages}`;
		document.getElementById('prevPage').disabled = currentPage === 1;
		document.getElementById('nextPage').disabled = currentPage === totalPages;
	}

	// Submit banner form (create/update)
	function submitBannerForm() {
		const form = document.getElementById("bannerForm");
		const formData = new FormData(form);
		const bannerId = document.getElementById("bannerId").value;
		const url = bannerId ? `<?= base_url('banner/update') ?>/${bannerId}` : `<?= base_url('banner/store') ?>`;

		fetch(url, {
			method: 'POST',
			body: formData
		})
			.then(response => response.json())
			.then(data => {
				if (data.status === 'success') {
					closeModal();
					fetchBanners();
					showAlert(data.message, 'success');
				} else {
					showAlert(data.message, 'error');
				}
			})
			.catch(error => {
				console.error('Error:', error);
				showAlert('Terjadi kesalahan saat menyimpan data', 'error');
			});
	}

	// Edit banner
	function editBanner(id) {
		fetch(`<?= base_url('banner/get') ?>/${id}`)
			.then(response => response.json())
			.then(data => {
				if (data.status === 'success') {
					const banner = data.data;
					document.getElementById("modalTitle").textContent = "Edit Banner";
					document.getElementById("bannerId").value = banner.id;
					document.getElementById("title").value = banner.title;
					document.getElementById("content").value = banner.content;
					document.getElementById("start_date").value = banner.start_date;
					document.getElementById("end_date").value = banner.end_date;
					document.getElementById("status").value = banner.status;

					// Hide image upload requirement for edit
					document.getElementById("imageUploadContainer").innerHTML = `
						<label class="block text-sm font-medium text-gray-700 mb-1">Gambar Saat Ini</label>
						<img src="<?= base_url() ?>${banner.image_url}" alt="${banner.title}" class="h-20 w-full object-contain mb-2">
						<label class="block text-sm font-medium text-gray-700 mb-1">Ubah Gambar (Opsional)</label>
						<input type="file" name="banner_image" id="banner_image" accept="image/*" 
							class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
						<p class="mt-1 text-sm text-gray-500">Format: JPG, PNG (Max 2MB)</p>
					`;

					document.getElementById("submitButton").textContent = "Update";
					openModal();
				} else {
					showAlert(data.message, 'error');
				}
			})
			.catch(error => {
				console.error('Error:', error);
				showAlert('Terjadi kesalahan saat memuat data', 'error');
			});
	}

	// Confirm delete banner
	function confirmDelete(id) {
		if (confirm('Apakah Anda yakin ingin menghapus banner ini?')) {
			fetch(`<?= base_url('banner/delete') ?>/${id}`, {
				method: 'POST'
			})
				.then(response => response.json())
				.then(data => {
					if (data.status === 'success') {
						fetchBanners();
						showAlert(data.message, 'success');
					} else {
						showAlert(data.message, 'error');
					}
				})
				.catch(error => {
					console.error('Error:', error);
					showAlert('Terjadi kesalahan saat menghapus data', 'error');
				});
		}
	}

	// Show alert message
	function showAlert(message, type) {
		// Implement your alert/notification system here
		// This could be a toast notification or alert div
		alert(`${type.toUpperCase()}: ${message}`);
	}

	// Modal functions
	function openModal() {
		document.getElementById("imageModal").classList.remove("hidden");
	}

	function closeModal() {
		document.getElementById("imageModal").classList.add("hidden");
		resetForm();
	}

	// Reset form after modal close
	function resetForm() {
		document.getElementById("bannerForm").reset();
		document.getElementById("bannerId").value = "";
		document.getElementById("modalTitle").textContent = "Tambah Banner";
		document.getElementById("submitButton").textContent = "Simpan";

		// Reset image upload field
		document.getElementById("imageUploadContainer").innerHTML = `
			<label class="block text-sm font-medium text-gray-700 mb-1">Gambar Banner</label>
			<input type="file" name="banner_image" id="banner_image" accept="image/*" required
				class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
			<p class="mt-1 text-sm text-gray-500">Format: JPG, PNG (Max 2MB)</p>
		`;
	}
</script>