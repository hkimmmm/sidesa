<div class="max-w-6xl mx-auto">
	<div class="flex justify-between items-center mb-8">
		<h1 class="text-2xl font-bold text-gray-800">Daftar Individu</h1>
		<div class="flex space-x-2">
			<a href="#" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
				Tambah Individu
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
						placeholder="Cari nama atau nomor telepon">
				</div>
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
							Tanggal Lahir</th>
						<th scope="col"
							class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
							Alamat</th>
						<th scope="col"
							class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nomor
							Telepon</th>
						<th scope="col"
							class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi
						</th>
					</tr>
				</thead>
				<tbody class="bg-white divide-y divide-gray-200" id="individualTable">
					<!-- Semua data berda di <script></script> yaaaah pid -->
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
	// Dummy data for individuals
	const individuals = [
		{ id: 1, nama: "Budi Santoso", tanggal_lahir: "1975-03-15", alamat: "Jl. Merdeka No. 10, Jakarta", telepon: "081234567890" },
		{ id: 2, nama: "Siti Aminah", tanggal_lahir: "1980-06-22", alamat: "Jl. Sudirman No. 5, Bandung", telepon: "082345678901" },
		{ id: 3, nama: "Andi Pratama", tanggal_lahir: "2000-09-10", alamat: "Jl. Gatot Subroto No. 20, Surabaya", telepon: "083456789012" },
		{ id: 4, nama: "Rina Lestari", tanggal_lahir: "2003-12-05", alamat: "Jl. Thamrin No. 15, Yogyakarta", telepon: "084567890123" },
		{ id: 5, nama: "Dewi Sartika", tanggal_lahir: "1990-01-25", alamat: "Jl. Diponegoro No. 8, Medan", telepon: "085678901234" },
		{ id: 6, nama: "Eko Prasetyo", tanggal_lahir: "1985-07-30", alamat: "Jl. Ahmad Yani No. 12, Semarang", telepon: "086789012345" },
		{ id: 7, nama: "Fitri Rahayu", tanggal_lahir: "1995-04-18", alamat: "Jl. Pahlawan No. 25, Makassar", telepon: "087890123456" },
		{ id: 8, nama: "Gilang Ramadhan", tanggal_lahir: "1998-11-11", alamat: "Jl. Veteran No. 30, Denpasar", telepon: "088901234567" },
		{ id: 9, nama: "Hani Suryani", tanggal_lahir: "1988-02-14", alamat: "Jl. Asia Afrika No. 7, Bandung", telepon: "089012345678" },
		{ id: 10, nama: "Iwan Setiawan", tanggal_lahir: "1978-08-20", alamat: "Jl. Imam Bonjol No. 9, Jakarta", telepon: "081112345678" },
		{ id: 11, nama: "Joko Widodo", tanggal_lahir: "1961-06-21", alamat: "Jl. Solo No. 1, Solo", telepon: "081223344556" },
		{ id: 12, nama: "Kurnia Sari", tanggal_lahir: "1992-03-12", alamat: "Jl. Malioboro No. 3, Yogyakarta", telepon: "082334455667" },
	];

	const perPage = 10;
	let currentPage = 1;

	function renderTable(page) {
		const start = (page - 1) * perPage;
		const end = start + perPage;
		const paginatedData = individuals.slice(start, end);
		const tbody = document.getElementById('individualTable');
		tbody.innerHTML = '';

		paginatedData.forEach((item, index) => {
			const row = `
				<tr>
					<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${start + index + 1}</td>
					<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">${item.nama}</td>
					<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${item.tanggal_lahir}</td>
					<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${item.alamat}</td>
					<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${item.telepon}</td>
					<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
						<a href="#" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
						<a href="#" class="text-red-600 hover:text-red-900" onclick="confirmDelete(${item.id})">Hapus</a>
					</td>
				</tr>
			`;
			tbody.innerHTML += row;
		});

		const totalPages = Math.ceil(individuals.length / perPage);
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
		if (confirm('Apakah Anda yakin ingin menghapus data individu ini?')) {
			alert(`Data individu dengan ID ${id} telah dihapus.`);
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
			if (currentPage < Math.ceil(individuals.length / perPage)) {
				currentPage++;
				renderTable(currentPage);
			}
		});
	});
</script>