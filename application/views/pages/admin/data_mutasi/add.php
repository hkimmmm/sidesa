<div class="max-w-6xl mx-auto">
	<div class="flex justify-between items-center mb-8">
		<h1 class="text-2xl font-bold text-gray-800">Tambah Data Mutasi</h1>
		<a href="#" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">
			Kembali
		</a>
	</div>

	<div class="bg-white rounded-lg shadow-md p-6">
		<form method="post" action="#" class="space-y-6">
			<div>
				<label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
				<input type="text" name="nama" id="nama" required
					class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
					placeholder="Masukkan nama individu">
			</div>
			<div>
				<label for="jenis_mutasi" class="block text-sm font-medium text-gray-700">Jenis Mutasi</label>
				<select name="jenis_mutasi" id="jenis_mutasi" required
					class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
					<option value="" disabled selected>Pilih jenis mutasi</option>
					<option value="Pindah Masuk">Pindah Masuk</option>
					<option value="Pindah Keluar">Pindah Keluar</option>
				</select>
			</div>
			<div>
				<label for="tanggal_mutasi" class="block text-sm font-medium text-gray-700">Tanggal Mutasi</label>
				<input type="text" name="tanggal_mutasi" id="tanggal_mutasi" required
					class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm flatpickr"
					placeholder="Pilih tanggal mutasi">
			</div>
			<div>
				<label for="alamat" class="block text-sm font-medium text-gray-700">Alamat Asal/Tujuan</label>
				<textarea name="alamat" id="alamat" rows="3" required
					class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
					placeholder="Masukkan alamat asal atau tujuan"></textarea>
			</div>
			<div>
				<label for="alasan" class="block text-sm font-medium text-gray-700">Alasan</label>
				<input type="text" name="alasan" id="alasan" required
					class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
					placeholder="Masukkan alasan mutasi">
			</div>
			<div class="flex justify-end space-x-3">
				<a href="#" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">
					Kembali
				</a>
				<button type="submit"
					class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
					Simpan
				</button>
			</div>
		</form>
	</div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
	document.addEventListener('DOMContentLoaded', function () {
		flatpickr('.flatpickr', {
			dateFormat: 'Y-m-d',
			altInput: true,
			altFormat: 'F j, Y',
			allowInput: false,
			maxDate: 'today'
		});
	});
</script>