<div class="max-w-6xl mx-auto">
	<div class="flex justify-between items-center mb-8">
		<h1 class="text-2xl font-bold text-gray-800">Tambah Banner</h1>
		<a href="#" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">
			Kembali
		</a>
	</div>

	<div class="bg-white rounded-lg shadow-md p-6">
		<form method="post" action="#" enctype="multipart/form-data" class="space-y-6">
			<div>
				<label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
				<input type="text" name="judul" id="judul" required
					class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
					placeholder="Masukkan judul banner">
			</div>
			<div>
				<label for="tanggal_publikasi" class="block text-sm font-medium text-gray-700">Tanggal Publikasi</label>
				<input type="text" name="tanggal_publikasi" id="tanggal_publikasi" required
					class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm flatpickr"
					placeholder="Pilih tanggal publikasi">
			</div>
			<div>
				<label for="tanggal_berakhir" class="block text-sm font-medium text-gray-700">Tanggal Berakhir</label>
				<input type="text" name="tanggal_berakhir" id="tanggal_berakhir" required
					class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm flatpickr"
					placeholder="Pilih tanggal berakhir">
			</div>
			<div>
				<label for="isi" class="block text-sm font-medium text-gray-700">Isi Banner</label>
				<textarea name="isi" id="isi" rows="5" required
					class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
					placeholder="Masukkan isi banner"></textarea>
			</div>
			<div>
				<label for="gambar" class="block text-sm font-medium text-gray-700">Gambar Banner</label>
				<input type="file" name="gambar" id="gambar" accept="image/*" required
					class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
			</div>
			<div>
				<label for="status" class="block text-sm font-medium text-gray-700">Status</label>
				<select name="status" id="status" required
					class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
					<option value="Aktif">Aktif</option>
					<option value="Nonaktif">Nonaktif</option>
				</select>
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
			allowInput: false
		});
	});
</script>