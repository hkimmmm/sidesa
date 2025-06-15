<div class="max-w-6xl mx-auto">
	<div class="flex justify-between items-center mb-8">
		<h1 class="text-2xl font-bold text-gray-800">Daftar Mutasi Penduduk</h1>
		<div class="flex space-x-2">
			<a href="#" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
				Tambah Mutasi
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
						placeholder="Cari nama atau alasan mutasi">
				</div>
			</div>
			<div class="relative">
				<label for="filter_movement" class="sr-only">Jenis Mutasi</label>
				<select name="filter_movement" id="filter_movement"
					class="block w-full pl-3 pr-10 py-2 border border-gray-300 rounded-lg leading-5 bg-white focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
					<option value="">Semua Jenis Mutasi</option>
					<option value="Pindah Masuk">Pindah Masuk</option>
					<option value="Pindah Keluar">Pindah Keluar</option>
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
							class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis
							Mutasi</th>
						<th scope="col"
							class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
							Tanggal Mutasi</th>
						<th scope="col"
							class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
							Alamat Asal/Tujuan</th>
						<th scope="col"
							class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
							Alasan</th>
						<th scope="col"
							class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi
						</th>
					</tr>
				</thead>
				<tbody class="bg-white divide-y divide-gray-200" id="movementTable">
					<!-- Semua data berda di <script></script> yaaaah pid -->
				</tbody>
			</table>
		</div>
		<div class="px-6 py-4 bg-gray-50 border across border-gray-200 flex justify-between items-center">
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
	// Dummy data for population movement
	const movements = [
		{ id: 1, nama: "Budi Santoso", jenis_mutasi: "Pindah Masuk", tanggal_mutasi: "2025-01-10", alamat: "Jl. Merdeka No. 10, Jakarta", alasan: "Pekerjaan" },
		{ id: 2, nama: "Siti Aminah", jenis_mutasi: "Pindah Keluar", tanggal_mutasi: "2025-02-15", alamat: "Jl. Sudirman No. 5, Bandung", alasan: "Menikah" },
		{ id: 3, nama: "Andi Pratama", jenis_mutasi: "Pindah Masuk", tanggal_mutasi: "2025-03-20", alamat: "Jl. Gatot Subroto No. 20, Surabaya", alasan: "Pendidikan" },
		{ id: 4, nama: "Rina Lestari", jenis_mutasi: "Pindah Keluar", tanggal_mutasi: "2025-04-05", alamat: "Jl. Thamrin No. 15, Yogyakarta", alasan: "Keluarga" },
		{ id: 5, nama: "Dewi Sartika", jenis_mutasi: "Pindah Masuk", tanggal_mutasi: "2025-05-12", alamat: "Jl. Diponegoro No. 8, Medan", alasan: "Pekerjaan" },
		{ id: 6, nama: "Eko Prasetyo", jenis_mutasi: "Pindah Keluar", tanggal_mutasi: "2025-06-18", alamat: "Jl. Ahmad Yani No. 12, Semarang", alasan: "Pindah Domisili" },
		{ id: 7, nama: "Fitri Rahayu", jenis_mutasi: "Pindah Masuk", tanggal_mutasi: "2025-07-22", alamat: "Jl. Pahlawan No. 25, Makassar", alasan: "Pendidikan" },
		{ id: 8, nama: "Gilang Ramadhan", jenis_mutasi: "Pindah Keluar", tanggal_mutasi: "2025-08-30", alamat: "Jl. Veteran No. 30, Denpasar", alasan: "Pekerjaan" },
		{ id: 9, nama: "Hani Suryani", jenis_mutasi: "Pindah Masuk", tanggal_mutasi: "2025-09-14", alamat: "Jl. Asia Afrika No. 7, Bandung", alasan: "Keluarga" },
		{ id: 10, nama: "Iwan Setiawan", jenis_mutasi: "Pindah Keluar", tanggal_mutasi: "2025-10-20", alamat: "Jl. Imam Bonjol No. 9, Jakarta", alasan: "Pindah Domisili" },
		{ id: 11, nama: "Joko Widodo", jenis_mutasi: "Pindah Masuk", tanggal_mutasi: "2025-11-01", alamat: "Jl. Solo No. 1, Solo", alasan: "Pekerjaan" },
		{ id: 12, nama: "Kurnia Sari", jenis_mutasi: "Pindah Keluar", tanggal_mutasi: "2025-12-10", alamat: "Jl. Malioboro No. 3, Yogyakarta", alasan: "Menikah" },
	];

	const perPage = 10;
	let currentPage = 1;

	function renderTable(page) {
		const start = (page - 1) * perPage;
		const end = start + perPage;
		const paginatedData = movements.slice(start, end);
		const tbody = document.getElementById('movementTable');
		tbody.innerHTML = '';

		paginatedData.forEach((item, index) => {
			const row = `
				<tr>
					<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${start + index + 1}</td>
					<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">${item.nama}</td>
					<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${item.jenis_mutasi}</td>
					<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${item.tanggal_mutasi}</td>
					<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${item.alamat}</td>
					<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${item.alasan}</td>
					<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
						<a href="#" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
						<a href="#" class="text-red-600 hover:text-red-900" onclick="confirmDelete(${item.id})">Hapus</a>
					</td>
				</tr>
			`;
			tbody.innerHTML += row;
		});

		const totalPages = Math.ceil(movements.length / perPage);
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
		if (confirm('Apakah Anda yakin ingin menghapus data mutasi ini?')) {
			alert(`Data mutasi dengan ID ${id} telah dihapus.`);
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
			if (currentPage < Math.ceil(movements.length / perPage)) {
				currentPage++;
				renderTable(currentPage);
			}
		});
	});
</script>