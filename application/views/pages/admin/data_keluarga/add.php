<div class="max-w-6xl mx-auto">
	<div class="flex justify-between items-center mb-8">
		<h1 class="text-2xl font-bold text-gray-800">Tambah Data Keluarga</h1>
		<a href="#" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">
			Kembali
		</a>
	</div>

	<div class="bg-white rounded-lg shadow-md p-6">
		<form method="post" action="#" class="space-y-6">
			<div>
				<label for="nama_kepala" class="block text-sm font-medium text-gray-700">Nama Kepala Keluarga</label>
				<input type="text" name="nama_kepala" id="nama_kepala" required
					class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
					placeholder="Masukkan nama kepala keluarga">
			</div>
			<div>
				<label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
				<textarea name="alamat" id="alamat" rows="3" required
					class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
					placeholder="Masukkan alamat lengkap"></textarea>
			</div>
			<div>
				<label for="jumlah_anggota" class="block text-sm font-medium text-gray-700">Jumlah Anggota
					Keluarga</label>
				<input type="number" name="jumlah_anggota" id="jumlah_anggota" min="1" required
					class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
					placeholder="Masukkan jumlah anggota keluarga">
			</div>
			<div>
				<label for="nomor_telepon" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
				<input type="text" name="nomor_telepon" id="nomor_telepon" required
					class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
					placeholder="Masukkan nomor telepon">
			</div>
			<div>
				<label for="status_ekonomi" class="block text-sm font-medium text-gray-700">Status Ekonomi</label>
				<select name="status_ekonomi" id="status_ekonomi" required
					class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
					<option value="" disabled selected>Pilih status ekonomi</option>
					<option value="Mampu">Mampu</option>
					<option value="Kurang Mampu">Kurang Mampu</option>
					<option value="Tidak Mampu">Tidak Mampu</option>
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