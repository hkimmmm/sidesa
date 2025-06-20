<div class="max-w-4xl mx-auto">
	<div class="mb-8">
		<h1 class="text-2xl font-bold text-gray-800">Buat Pengajuan Baru</h1>
		<p class="text-gray-600">Isi formulir berikut untuk mengajukan surat keterangan</p>
	</div>

	<?php echo form_open_multipart('pengajuan/create', ['class' => 'bg-white rounded-lg shadow-md p-6']); ?>
	<div class="mb-8">
		<div class="flex items-center">
			<div class="flex items-center justify-center w-8 h-8 rounded-full bg-blue-600 text-white">
				<span>1</span>
			</div>
			<div class="ml-4">
				<h3 class="text-lg font-medium text-gray-900">Pilih Jenis Surat</h3>
			</div>
		</div>
		<div class="mt-4 ml-4 pl-4 border-l-2 border-gray-200">
			<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
				<div>
					<label class="block mb-2 text-sm font-medium text-gray-900">Jenis Surat</label>
					<select name="jenis_surat_id" id="jenis_surat"
						class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
						required>
						<option value="" selected disabled>Pilih jenis surat</option>
						<?php foreach ($jenis_surat as $js): ?>
							<option value="<?= $js->id ?>" data-jenis="<?= $js->nama_surat ?>"><?= $js->nama_surat ?>
							</option>
						<?php endforeach; ?>
					</select>
					<?= form_error('jenis_surat_id', '<small class="text-red-600">', '</small>'); ?>
				</div>
				<div>
					<label class="block mb-2 text-sm font-medium text-gray-900">Keperluan</label>
					<input type="text" name="keperluan"
						class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
						placeholder="Contoh: Pengajuan beasiswa" required>
					<?= form_error('keperluan', '<small class="text-red-600">', '</small>'); ?>
				</div>
			</div>
		</div>
	</div>

	<div class="mb-8" id="personal-data-section" style="display: none;">
		<div class="flex items-center">
			<div class="flex items-center justify-center w-8 h-8 rounded-full bg-blue-600 text-white">
				<span>2</span>
			</div>
			<div class="ml-4">
				<h3 class="text-lg font-medium text-gray-900">Data Pribadi</h3>
			</div>
		</div>
		<div class="mt-4 ml-4 pl-4 border-l-2 border-gray-200">
			<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
				<div>
					<label class="block mb-2 text-sm font-medium text-gray-900">Nama Lengkap</label>
					<input type="text" name="nama_lengkap"
						class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
						placeholder="Nama sesuai KTP">
				</div>
				<div>
					<label class="block mb-2 text-sm font-medium text-gray-900">NIK</label>
					<input type="text" id="nikInput" name="nik"
						class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
						placeholder="Nomor Induk Kependudukan">
					<p id="nikWarning" class="mt-1 text-sm text-red-600 hidden">NIK harus terdiri dari 16 digit angka.
					</p>
				</div>
			</div>

			<!-- Dynamic fields will be inserted here -->
			<div id="dynamic-fields"></div>
		</div>
	</div>

	<div class="mb-8">
		<div class="flex items-center">
			<div class="flex items-center justify-center w-8 h-8 rounded-full bg-blue-600 text-white">
				<span id="step-number">3</span>
			</div>
			<div class="ml-4">
				<h3 class="text-lg font-medium text-gray-900">Upload Dokumen Pendukung</h3>
			</div>
		</div>
		<div class="mt-4 ml-4 pl-4 border-l-2 border-gray-200">
			<div class="mb-4">
				<label class="block mb-2 text-sm font-medium text-gray-900">Dokumen (Max 2MB per file)</label>
				<div class="flex items-center justify-center w-full">
					<label for="dokumen"
						class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
						<div class="flex flex-col items-center justify-center pt-5 pb-6">
							<svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true"
								xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
								<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
									stroke-width="2"
									d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
							</svg>
							<p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Klik untuk upload</span>
								atau drag and drop</p>
							<p class="text-xs text-gray-500">Format: JPG, PNG, PDF, DOC (Max 2MB)</p>
						</div>
						<input id="dokumen" name="dokumen[]" type="file" class="hidden" multiple />
					</label>
				</div>
				<div id="file-list" class="mt-2 text-sm text-gray-500"></div>
			</div>
		</div>
	</div>

	<div class="flex justify-between mt-8 pt-6 border-t border-gray-200">
		<a href="<?= site_url('pengajuan') ?>"
			class="px-6 py-2 text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
			Kembali
		</a>
		<button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
			Kirim Pengajuan
		</button>
	</div>
	<?php echo form_close(); ?>

	<div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4">
		<div class="flex">
			<svg class="flex-shrink-0 w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
				<path fill-rule="evenodd"
					d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
					clip-rule="evenodd"></path>
			</svg>
			<div class="ml-3">
				<h3 class="text-sm font-medium text-blue-800">Informasi Penting</h3>
				<div class="mt-2 text-sm text-blue-700">
					<ul class="list-disc pl-5 space-y-1">
						<li>Pastikan data yang diisi sesuai dengan dokumen resmi</li>
						<li>Proses verifikasi membutuhkan waktu 1-3 hari kerja</li>
						<li>Anda akan menerima notifikasi via SMS/WhatsApp ketika pengajuan selesai</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	document.addEventListener('DOMContentLoaded', function () {
		const fileInput = document.getElementById('dokumen');
		const fileList = document.getElementById('file-list');
		const jenisSuratSelect = document.getElementById('jenis_surat');
		const personalDataSection = document.getElementById('personal-data-section');
		const dynamicFields = document.getElementById('dynamic-fields');
		const stepNumber = document.getElementById('step-number');

		fileInput.addEventListener('change', function () {
			fileList.innerHTML = '';

			if (this.files.length > 0) {
				const list = document.createElement('ul');
				list.className = 'space-y-1';

				for (let i = 0; i < this.files.length; i++) {
					const item = document.createElement('li');
					item.className = 'flex items-center';

					const icon = document.createElement('span');
					icon.className = 'mr-2';
					icon.innerHTML = '<svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>';

					const fileName = document.createElement('span');
					fileName.textContent = this.files[i].name;

					item.appendChild(icon);
					item.appendChild(fileName);
					list.appendChild(item);
				}

				fileList.appendChild(list);
			}
		});

		jenisSuratSelect.addEventListener('change', function () {
			const selectedOption = this.options[this.selectedIndex];
			const jenisSurat = selectedOption.getAttribute('data-jenis');
			personalDataSection.style.display = 'block';
			stepNumber.textContent = '3';
			dynamicFields.innerHTML = '';
			switch (jenisSurat) {
				case 'Surat Keterangan Tidak Mampu':
					addSKTMFields();
					break;
				case 'Surat Keterangan Domisili Perorangan':
					addDomisiliPeroranganFields();
					break;
				case 'Surat Keterangan Domisili Usaha':
					addDomisiliUsahaFields();
					break;
				case 'Surat Izin Hajatan':
					addIzinHajatanFields();
					break;
				case 'Surat Keterangan Penghasilan':
					addKeteranganPenghasilanFields();
					break;
				case 'Surat Keterangan Umum':
					addKeteranganUmumFields();
					break;
			}
		});

		function addSKTMFields() {
			const html = `
				<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">Nama Orang Tua/Wali</label>
						<input type="text" name="nama_ortu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nama lengkap orang tua atau wali">
					</div>
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">NIK Orang Tua/Wali</label>
						<input type="text" name="nik_ortu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="NIK sesuai KTP">
					</div>
				</div>
				<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">Tempat, Tanggal Lahir Orang Tua</label>
						<input type="text" name="ttl_ortu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: Tegal, 21 Juni 1970">
					</div>
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">Jenis Kelamin Orang Tua</label>
						<select name="jenis_kelamin_ortu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
							<option value="">-- Pilih --</option>
							<option value="Laki-laki">Laki-laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
				</div>
				<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">Pekerjaan</label>
						<input type="text" name="pekerjaan_ortu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: Petani, Buruh, dll">
					</div>
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">Agama</label>
						<input type="text" name="agama_ortu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: Islam, Kristen">
					</div>
				</div>
				<div class="mb-4">
					<label class="block mb-2 text-sm font-medium text-gray-900">Alamat</label>
					<textarea name="alamat_ortu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" rows="2" placeholder="Alamat sesuai KTP"></textarea>
				</div>

				<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">RT</label>
						<input type="text" name="rt" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
					</div>
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">RW</label>
						<input type="text" name="rw" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
					</div>
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">Nomor Surat Pengantar RT</label>
						<input type="text" name="nomor_pengantar" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
					</div>
				</div>
				<div class="mb-4">
					<label class="block mb-2 text-sm font-medium text-gray-900">Tanggal Surat Pengantar</label>
					<input type="date" name="tanggal_pengantar" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
				</div>

				<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">Penghasilan per Bulan (Rp)</label>
						<input type="number" name="penghasilan_perbulan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 1000000">
					</div>
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">Jumlah Tanggungan Keluarga</label>
						<input type="number" name="jumlah_tanggungan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 4">
					</div>
				</div>

				<hr class="my-4">

				<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">Nama Pemohon (Anak)</label>
						<input type="text" name="nama_anak" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
					</div>
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">NIK Pemohon</label>
						<input type="text" name="nik_anak" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
					</div>
				</div>
				<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">Tempat, Tanggal Lahir Pemohon</label>
						<input type="text" name="ttl_anak" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
					</div>
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">Jenis Kelamin Pemohon</label>
						<select name="jenis_kelamin_anak" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
							<option value="">-- Pilih --</option>
							<option value="Laki-laki">Laki-laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
				</div>
				<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">Agama Pemohon</label>
						<input type="text" name="agama_anak" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
					</div>
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">Alamat Pemohon</label>
						<textarea name="alamat_anak" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" rows="2"></textarea>
					</div>
				</div>
			`;
			dynamicFields.innerHTML = html;
		}

		function addDomisiliPeroranganFields() {
			const html = `
				<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">Tempat, Tanggal Lahir</label>
						<input type="text" name="tempat_tanggal_lahir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: Purbalingga, 04 Februari 1984">
					</div>
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">Kewarganegaraan</label>
						<input type="text" name="kewarganegaraan" value="Indonesia" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
					</div>
				</div>

				<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">Agama</label>
						<input type="text" name="agama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: Islam">
					</div>
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">Jenis Kelamin</label>
						<select name="jenis_kelamin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
							<option value="">-- Pilih --</option>
							<option value="Laki-laki">Laki-laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
				</div>

				<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">Status Perkawinan</label>
						<input type="text" name="status_perkawinan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: Cerai Belum Tercatat">
					</div>
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">Pekerjaan</label>
						<input type="text" name="pekerjaan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: Buruh Harian Lepas">
					</div>
				</div>

				<div class="mb-4">
					<label class="block mb-2 text-sm font-medium text-gray-900">Alamat KTP (Alamat Terdaftar)</label>
					<textarea name="alamat_ktp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" rows="2" placeholder="Contoh: RT 017 / RW 009 Kel. Metenggeng Kec. Bojongsari"></textarea>
				</div>

				<div class="mb-4">
					<label class="block mb-2 text-sm font-medium text-gray-900">Alamat Domisili Saat Ini</label>
					<textarea name="alamat_domisili" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" rows="2" placeholder="Contoh: Jl. Mangga RT.002/RW.004 Kel. Procot Kec. Slawi Kab. Tegal"></textarea>
				</div>
			`;
			dynamicFields.innerHTML = html;
		}

		function addDomisiliUsahaFields() {
			const html = `
				<h4 class="text-md font-medium text-gray-900 mb-3">Data Usaha</h4>

				<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">Nama Usaha</label>
						<input type="text" name="nama_usaha" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: Warung Sembako Pak Joko">
					</div>
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">Jenis Usaha</label>
						<input type="text" name="jenis_usaha" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: Sembako, bengkel, warteg, dll">
					</div>
				</div>

				<div class="mb-4">
					<label class="block mb-2 text-sm font-medium text-gray-900">Alamat Usaha</label>
					<textarea name="alamat_usaha" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" rows="2" placeholder="Alamat lengkap tempat usaha dijalankan"></textarea>
				</div>

				<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">Lama Usaha Berjalan</label>
						<input type="text" name="lama_usaha" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 2 tahun, 6 bulan, dll">
					</div>
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">Status Tempat Usaha</label>
						<select name="status_tempat_usaha" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
							<option value="">-- Pilih --</option>
							<option value="Milik Sendiri">Milik Sendiri</option>
							<option value="Sewa">Sewa</option>
							<option value="Pinjam">Pinjam</option>
						</select>
					</div>
				</div>

				<div class="mb-4">
					<label class="block mb-2 text-sm font-medium text-gray-900">Keterangan Tambahan</label>
					<textarea name="keterangan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" rows="2" placeholder="Opsional: misalnya usaha untuk pengajuan UMKM, bank, dll."></textarea>
				</div>
			`;
			dynamicFields.innerHTML = html;
		}

		function addIzinHajatanFields() {
			const html = `
				<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">Tempat, Tanggal Lahir</label>
						<input type="text" name="ttl" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: Tegal, 12 Desember 1956">
					</div>
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">Pekerjaan</label>
						<input type="text" name="pekerjaan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: Wiraswasta">
					</div>
				</div>

				<div class="mb-4">
					<label class="block mb-2 text-sm font-medium text-gray-900">Alamat Lengkap</label>
					<textarea name="alamat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" rows="2" placeholder="Contoh: RT 001 / RW 004 Kelurahan Procot, Kecamatan Slawi, Kabupaten Tegal"></textarea>
				</div>

				<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">Jenis Hajatan</label>
						<input type="text" name="jenis_hajatan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: Khajatan Pernikahan">
					</div>
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">Hari Acara</label>
						<input type="text" name="hari_acara" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: RABU s.d. KAMIS">
					</div>
				</div>

				<div class="mb-4">
					<label class="block mb-2 text-sm font-medium text-gray-900">Tanggal Acara</label>
					<input type="text" name="tanggal_acara" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 13 s.d. 14 April 2016">
				</div>
			`;
			dynamicFields.innerHTML = html;
		}

		function addKeteranganPenghasilanFields() {
			const html = `
				<h4 class="text-md font-medium text-gray-900 mb-3">Data Ayah/Wali</h4>
				<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">Nama Ayah/Wali</label>
						<input type="text" name="nama_ayah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
					</div>
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">NIK Ayah/Wali</label>
						<input type="text" name="nik_ayah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
					</div>
				</div>
				<div class="grid grid-cols-1 gap-4 mb-4">
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">Alamat Ayah/Wali</label>
						<textarea name="alamat_ayah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" rows="2"></textarea>
					</div>
				</div>
				<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">Pekerjaan Utama</label>
						<input type="text" name="pekerjaan_ayah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
					</div>
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">Penghasilan Utama (Rp)</label>
						<input type="text" name="penghasilan_utama_ayah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
					</div>
				</div>
				<div class="mb-4">
					<label class="block mb-2 text-sm font-medium text-gray-900">Penghasilan Tambahan (Rp)</label>
					<input type="text" name="penghasilan_tambahan_ayah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
				</div>
				<div class="mb-4">
					<label class="block mb-2 text-sm font-medium text-gray-900">Rincian Penghasilan Tambahan Ayah/Wali</label>
					<textarea name="rincian_tambahan_ayah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" rows="2" placeholder="Contoh: Ojek - Rp 500.000, Bertani - Rp 1.000.000"></textarea>
				</div>

				<h4 class="text-md font-medium text-gray-900 mb-3 mt-6">Data Ibu</h4>
				<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">Nama Ibu</label>
						<input type="text" name="nama_ibu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
					</div>
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">NIK Ibu</label>
						<input type="text" name="nik_ibu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
					</div>
				</div>
				<div class="grid grid-cols-1 gap-4 mb-4">
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">Alamat Ibu</label>
						<textarea name="alamat_ibu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" rows="2"></textarea>
					</div>
				</div>
				<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">Pekerjaan Utama</label>
						<input type="text" name="pekerjaan_ibu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
					</div>
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">Penghasilan Utama (Rp)</label>
						<input type="text" name="penghasilan_utama_ibu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
					</div>
				</div>
				<div class="mb-4">
					<label class="block mb-2 text-sm font-medium text-gray-900">Penghasilan Tambahan (Rp)</label>
					<input type="text" name="penghasilan_tambahan_ibu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
				</div>
				<div class="mb-4">
					<label class="block mb-2 text-sm font-medium text-gray-900">Rincian Penghasilan Tambahan Ibu</label>
					<textarea name="rincian_tambahan_ibu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" rows="2" placeholder="Contoh: Jualan - Rp 300.000, Menjahit - Rp 700.000"></textarea>
				</div>

				<h4 class="text-md font-medium text-gray-900 mb-3 mt-6">Data Anak (Pemohon)</h4>
				<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
						<input type="text" name="nama_anak" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
					</div>
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">NIK</label>
						<input type="text" name="nik_anak" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
					</div>
				</div>
				<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">Tempat, Tanggal Lahir</label>
						<input type="text" name="ttl_anak" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
					</div>
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">Pekerjaan</label>
						<input type="text" name="pekerjaan_anak" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
					</div>
				</div>
				<div class="mb-4">
					<label class="block mb-2 text-sm font-medium text-gray-900">Alamat</label>
					<textarea name="alamat_anak" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" rows="2"></textarea>
				</div>
			`;
			dynamicFields.innerHTML = html;
		}

		function addKeteranganUmumFields() {
			const html = `
				<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">Tempat, Tanggal Lahir</label>
						<input type="text" name="ttl" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: Tegal, 25 April 2003">
					</div>
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">Jenis Kelamin</label>
						<select name="jenis_kelamin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
							<option value="Laki-Laki">Laki-Laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
				</div>

				<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">Pekerjaan</label>
						<input type="text" name="pekerjaan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: Mahasiswa, Wiraswasta, dst.">
					</div>
					<div>
						<label class="block mb-2 text-sm font-medium text-gray-900">Alamat</label>
						<textarea name="alamat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" rows="2" placeholder="Alamat lengkap sesuai KTP"></textarea>
					</div>
				</div>
			`;
			dynamicFields.innerHTML = html;
		}
	});

	const nikInput = document.getElementById('nikInput');
	const nikWarning = document.getElementById('nikWarning');

	nikInput.addEventListener('input', () => {
		const value = nikInput.value;

		nikInput.value = value.replace(/\D/g, '');

		if (value.length !== 16) {
			nikWarning.classList.remove('hidden');
		} else {
			nikWarning.classList.add('hidden');
		}
	});
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if ($this->session->flashdata('validation_errors')): ?>
		<script>
			Swal.fire({
				icon: 'error',
				title: 'Validasi Gagal',
				html: `<ul style="text-align: left; padding-left: 20px; margin: 0;">
				<?= str_replace(['<p>', '</p>'], ['<li>', '</li>'], $this->session->flashdata('validation_errors')); ?>
			</ul>`,
				confirmButtonText: 'Perbaiki'
			});
		</script>
<?php endif; ?>

<?php if ($this->session->flashdata('success')): ?>
		<script>
			Swal.fire({
				icon: 'success',
				title: 'Berhasil',
				text: '<?= $this->session->flashdata('success'); ?>',
				timer: 3000,
				showConfirmButton: false
			});
		</script>
<?php endif; ?>
