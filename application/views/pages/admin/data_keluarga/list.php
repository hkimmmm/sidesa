<div class="max-w-6xl mx-auto">
	<div class="flex justify-between items-center mb-8">
		<h1 class="text-2xl font-bold text-gray-800">Struktur Keluarga</h1>
		<div class="flex space-x-2">
			<a href="#" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
				Tambah Anggota Keluarga
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
						placeholder="Cari nama atau status">
				</div>
			</div>
			<div class="relative">
				<select name="filter_status" id="filter_status"
					class="block w-full pl-3 pr-10 py-2 border border-gray-300 rounded-lg leading-5 bg-white focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
					<option value="">Semua Status</option>
					<option value="Ayah">Ayah</option>
					<option value="Ibu">Ibu</option>
					<option value="Anak">Anak</option>
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
							class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
						</th>
						<th scope="col"
							class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
							Status
						</th>
						<th scope="col"
							class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Foto
						</th>
						<th scope="col"
							class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi
						</th>
					</tr>
				</thead>
				<tbody class="bg-white divide-y divide-gray-200">
					<tr>
						<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">1</td>
						<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">Budi Santoso</td>
						<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Ayah</td>
						<td class="px-6 py-4 whitespace-nowrap">
							<div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center">
								<svg class="h-6 w-6 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
									<path
										d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
								</svg>
							</div>
						</td>
						<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
							<a href="#" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
							<a href="#" class="text-red-600 hover:text-red-900" onclick="confirmDelete(1)">Hapus</a>
						</td>
					</tr>
					<tr>
						<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">2</td>
						<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">Siti Aminah</td>
						<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Ibu</td>
						<td class="px-6 py-4 whitespace-nowrap">
							<div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center">
								<svg class="h-6 w-6 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
									<path
										d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
								</svg>
							</div>
						</td>
						<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
							<a href="#" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
							<a href="#" class="text-red-600 hover:text-red-900" onclick="confirmDelete(2)">Hapus</a>
						</td>
					</tr>
					<tr>
						<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">3</td>
						<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">Andi Pratama</td>
						<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Anak</td>
						<td class="px-6 py-4 whitespace-nowrap">
							<div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center">
								<svg class="h-6 w-6 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
									<path
										d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
								</svg>
							</div>
						</td>
						<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
							<a href="#" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
							<a href="#" class="text-red-600 hover:text-red-900" onclick="confirmDelete(3)">Hapus</a>
						</td>
					</tr>
					<tr>
						<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">4</td>
						<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">Rina Lestari</td>
						<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Anak</td>
						<td class="px-6 py-4 whitespace-nowrap">
							<div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center">
								<svg class="h-6 w-6 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
									<path
										d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
								</svg>
							</div>
						</td>
						<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
							<a href="#" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
							<a href="#" class="text-red-600 hover:text-red-900" onclick="confirmDelete(4)">Hapus</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-between items-center">
			<a href="#"
				class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors disabled:bg-gray-400 disabled:cursor-not-allowed"
				id="prevPage" disabled>Sebelumnya</a>
			<span class="text-sm text-gray-700">Halaman 1 dari 3</span>
			<a href="#" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors"
				id="nextPage">Selanjutnya</a>
		</div>
	</div>
</div>

<script>
	function confirmDelete(id) {
		if (confirm('Apakah Anda yakin ingin menghapus data anggota keluarga ini?')) {
			alert('Data anggota keluarga dengan ID ' + id + ' telah dihapus.');
			// Simulasi penghapusan, dalam aplikasi nyata ini akan mengirimkan request ke server
			window.location.reload();
		}
	}

	// Simulasi logika untuk tombol Sebelumnya dan Selanjutnya
	document.addEventListener('DOMContentLoaded', function () {
		const prevPage = document.getElementById('prevPage');
		const nextPage = document.getElementById('nextPage');
		let currentPage = 1;
		const totalPages = 3;

		function updatePagination() {
			prevPage.disabled = currentPage === 1;
			nextPage.disabled = currentPage === totalPages;
			prevPage.classList.toggle('disabled:bg-gray-400', prevPage.disabled);
			prevPage.classList.toggle('disabled:cursor-not-allowed', prevPage.disabled);
			document.querySelector('.text-sm.text-gray-700').textContent = `Halaman ${currentPage} dari ${totalPages}`;
		}

		prevPage.addEventListener('click', function (e) {
			e.preventDefault();
			if (currentPage > 1) {
				currentPage--;
				updatePagination();
				// Dalam aplikasi nyata, tambahkan logika untuk memuat data halaman sebelumnya
			}
		});

		nextPage.addEventListener('click', function (e) {
			e.preventDefault();
			if (currentPage < totalPages) {
				currentPage++;
				updatePagination();
				// Dalam aplikasi nyata, tambahkan logika untuk memuat data halaman berikutnya
			}
		});

		updatePagination();
	});
</script>