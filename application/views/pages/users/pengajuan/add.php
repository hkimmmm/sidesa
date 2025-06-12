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
                            <option value="<?= $js['id'] ?>" data-jenis="<?= $js['nama_surat'] ?>"><?= $js['nama_surat'] ?>
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

    <!-- Dynamic Personal Data Section -->
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
            <!-- Default fields (common for all types) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Nama sesuai KTP">
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">NIK</label>
                    <input type="text" name="nik"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Nomor Induk Kependudukan">
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

        // Dynamic form fields based on letter type
        jenisSuratSelect.addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];
            const jenisSurat = selectedOption.getAttribute('data-jenis');

            // Show personal data section
            personalDataSection.style.display = 'block';
            stepNumber.textContent = '3';

            // Clear previous dynamic fields
            dynamicFields.innerHTML = '';

            // Add fields based on letter type
            switch (jenisSurat) {
                case 'Surat Keterangan Tidak Mampu':
                    addSKTMFields();
                    break;
                case 'Surat Pindah Domisili':
                    addPindahDomisiliFields();
                    break;
                case 'Surat Kematian':
                    addKematianFields();
                    break;
                case 'Surat Slip Gaji Orang Tua':
                    addSlipGajiFields();
                    break;
                case 'Surat Pengantar Nikah':
                    addPengantarNikahFields();
                    break;
                case 'Surat Talak, Cerai, Rujuk':
                    addTalakCeraiFields();
                    break;
                case 'Surat Pengantar Pembuatan KK Baru':
                    addKKBaruFields();
                    break;
                case 'Surat Pengantar KTP':
                    addPengantarKTPFields();
                    break;
            }
        });

        function addSKTMFields() {
            const html = `
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Nomor KK</label>
                        <input type="text" name="no_kk" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nomor Kartu Keluarga">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Tempat, Tanggal Lahir</label>
                        <input type="text" name="ttl" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: Jakarta, 17 Agustus 1945">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Alamat Lengkap</label>
                        <textarea name="alamat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" rows="2" placeholder="Alamat sesuai KTP"></textarea>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Pekerjaan</label>
                        <input type="text" name="pekerjaan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Pekerjaan saat ini">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Nama Orang Tua</label>
                        <input type="text" name="nama_ortu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Jika pemohon pelajar/mahasiswa">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Tujuan Penggunaan</label>
                        <input type="text" name="tujuan_sktm" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: untuk beasiswa, sekolah, dll">
                    </div>
                </div>
            `;
            dynamicFields.innerHTML = html;
        }

        function addPindahDomisiliFields() {
            const html = `
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Nomor KK</label>
                        <input type="text" name="no_kk" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nomor Kartu Keluarga">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Tempat, Tanggal Lahir</label>
                        <input type="text" name="ttl" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: Jakarta, 17 Agustus 1945">
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-4 mb-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Alamat Lama</label>
                        <textarea name="alamat_lama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" rows="2" placeholder="Alamat saat ini"></textarea>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Alamat Tujuan Pindah</label>
                        <textarea name="alamat_baru" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" rows="2" placeholder="Alamat baru yang dituju"></textarea>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Jumlah Anggota Keluarga yang Ikut Pindah</label>
                        <input type="number" name="jumlah_anggota_pindah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" min="1" value="1">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Alasan Pindah</label>
                        <input type="text" name="alasan_pindah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: pekerjaan, pendidikan, dll">
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900">Daftar Anggota Keluarga yang Pindah</label>
                    <div id="anggota-keluarga-list">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-2">
                            <div>
                                <label class="block mb-1 text-xs font-medium text-gray-700">Nama Lengkap</label>
                                <input type="text" name="anggota_nama[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            </div>
                            <div>
                                <label class="block mb-1 text-xs font-medium text-gray-700">NIK</label>
                                <input type="text" name="anggota_nik[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            </div>
                        </div>
                    </div>
                    <button type="button" id="tambah-anggota" class="mt-2 text-sm text-blue-600 hover:text-blue-800">+ Tambah Anggota Keluarga</button>
                </div>
            `;
            dynamicFields.innerHTML = html;

            // Add functionality to add more family members
            document.getElementById('tambah-anggota').addEventListener('click', function () {
                const anggotaList = document.getElementById('anggota-keluarga-list');
                const newAnggota = document.createElement('div');
                newAnggota.className = 'grid grid-cols-1 md:grid-cols-2 gap-4 mb-2';
                newAnggota.innerHTML = `
                    <div>
                        <label class="block mb-1 text-xs font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" name="anggota_nama[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                    <div>
                        <label class="block mb-1 text-xs font-medium text-gray-700">NIK</label>
                        <input type="text" name="anggota_nik[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                `;
                anggotaList.appendChild(newAnggota);
            });
        }

        function addKematianFields() {
            const html = `
                <h4 class="text-md font-medium text-gray-900 mb-3">Data Almarhum/Almarhumah</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Nama Lengkap</label>
                        <input type="text" name="nama_alm" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nama almarhum/almarhumah">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Nomor KK</label>
                        <input type="text" name="no_kk_alm" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nomor KK almarhum/almarhumah">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Tempat, Tanggal Lahir</label>
                        <input type="text" name="ttl_alm" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: Jakarta, 17 Agustus 1945">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Jenis Kelamin</label>
                        <select name="jk_alm" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Agama</label>
                        <input type="text" name="agama_alm" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Agama almarhum/almarhumah">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Pekerjaan</label>
                        <input type="text" name="pekerjaan_alm" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Pekerjaan terakhir">
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-4 mb-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Alamat Terakhir</label>
                        <textarea name="alamat_alm" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" rows="2" placeholder="Alamat terakhir almarhum/almarhumah"></textarea>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Tanggal Kematian</label>
                        <input type="date" name="tanggal_kematian" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Waktu Kematian</label>
                        <input type="time" name="waktu_kematian" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Sebab Kematian</label>
                        <input type="text" name="sebab_kematian" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Jika diketahui">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Tempat Kematian</label>
                        <input type="text" name="tempat_kematian" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Rumah sakit, rumah, dll">
                    </div>
                </div>
                
                <h4 class="text-md font-medium text-gray-900 mb-3 mt-6">Data Pelapor</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Nama Lengkap Pelapor</label>
                        <input type="text" name="nama_pelapor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nama pelapor">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">NIK Pelapor</label>
                        <input type="text" name="nik_pelapor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nomor Induk Kependudukan">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Hubungan dengan yang Meninggal</label>
                        <input type="text" name="hubungan_pelapor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Anak, saudara, dll">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Alamat Pelapor</label>
                        <input type="text" name="alamat_pelapor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Alamat pelapor">
                    </div>
                </div>
            `;
            dynamicFields.innerHTML = html;
        }

        function addSlipGajiFields() {
            const html = `
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Nomor KK</label>
                        <input type="text" name="no_kk" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nomor Kartu Keluarga">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Tempat, Tanggal Lahir</label>
                        <input type="text" name="ttl" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: Jakarta, 17 Agustus 1945">
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-4 mb-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Alamat Lengkap</label>
                        <textarea name="alamat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" rows="2" placeholder="Alamat sesuai KTP"></textarea>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Pekerjaan</label>
                        <input type="text" name="pekerjaan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Pekerjaan saat ini">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Estimasi Penghasilan per Bulan</label>
                        <input type="text" name="penghasilan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Dalam Rupiah">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Jumlah Tanggungan</label>
                        <input type="number" name="jumlah_tanggungan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" min="0" value="0">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Nama Anak yang Mengajukan (jika untuk beasiswa/sekolah)</label>
                        <input type="text" name="nama_anak" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                </div>
            `;
            dynamicFields.innerHTML = html;
        }

        function addPengantarNikahFields() {
            const html = `
                <h4 class="text-md font-medium text-gray-900 mb-3">Data Calon Pengantin Pria</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Nama Lengkap</label>
                        <input type="text" name="nama_pria" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nama calon pengantin pria">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">NIK</label>
                        <input type="text" name="nik_pria" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nomor Induk Kependudukan">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Tempat, Tanggal Lahir</label>
                        <input type="text" name="ttl_pria" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: Jakarta, 17 Agustus 1945">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Alamat Lengkap</label>
                        <input type="text" name="alamat_pria" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Status Pernikahan</label>
                        <select name="status_pria" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="Lajang">Lajang</option>
                            <option value="Duda">Duda</option>
                        </select>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Agama</label>
                        <input type="text" name="agama_pria" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900">Nama Orang Tua/Wali</label>
                    <input type="text" name="ortu_pria" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
                
                <h4 class="text-md font-medium text-gray-900 mb-3 mt-6">Data Calon Pengantin Wanita</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Nama Lengkap</label>
                        <input type="text" name="nama_wanita" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nama calon pengantin wanita">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">NIK</label>
                        <input type="text" name="nik_wanita" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nomor Induk Kependudukan">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Tempat, Tanggal Lahir</label>
                        <input type="text" name="ttl_wanita" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: Jakarta, 17 Agustus 1945">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Alamat Lengkap</label>
                        <input type="text" name="alamat_wanita" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Status Pernikahan</label>
                        <select name="status_wanita" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="Lajang">Lajang</option>
                            <option value="Janda">Janda</option>
                        </select>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Agama</label>
                        <input type="text" name="agama_wanita" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900">Nama Orang Tua/Wali</label>
                    <input type="text" name="ortu_wanita" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
                
                <div class="mt-6 bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                    <div class="flex">
                        <svg class="flex-shrink-0 w-5 h-5 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                        </svg>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-yellow-800">Dokumen yang Perlu Disiapkan</h3>
                            <div class="mt-2 text-sm text-yellow-700">
                                <ul class="list-disc pl-5 space-y-1">
                                    <li>Fotokopi KK dan KTP masing-masing calon pengantin</li>
                                    <li>Surat pengantar dari RT/RW setempat</li>
                                    <li>Pas foto 3x4 (latar merah) masing-masing 2 lembar</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            dynamicFields.innerHTML = html;
        }

        function addTalakCeraiFields() {
            const html = `
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Nama Suami</label>
                        <input type="text" name="nama_suami" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nama lengkap suami">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">NIK Suami</label>
                        <input type="text" name="nik_suami" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nomor Induk Kependudukan">
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-4 mb-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Alamat Suami</label>
                        <textarea name="alamat_suami" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" rows="2"></textarea>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Nama Istri</label>
                        <input type="text" name="nama_istri" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nama lengkap istri">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">NIK Istri</label>
                        <input type="text" name="nik_istri" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nomor Induk Kependudukan">
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-4 mb-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Alamat Istri</label>
                        <textarea name="alamat_istri" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" rows="2"></textarea>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Tanggal Pernikahan</label>
                        <input type="date" name="tanggal_nikah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Nomor Akta Nikah</label>
                        <input type="text" name="no_akta_nikah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                </div>
                
                <div class="grid grid-cols-1 gap-4 mb-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Alasan Talak/Cerai/Rujuk</label>
                        <textarea name="alasan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" rows="3"></textarea>
                    </div>
                </div>
                
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900">Data Anak (jika ada)</label>
                    <div id="anak-list">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-2">
                            <div>
                                <label class="block mb-1 text-xs font-medium text-gray-700">Nama Anak</label>
                                <input type="text" name="nama_anak[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            </div>
                            <div>
                                <label class="block mb-1 text-xs font-medium text-gray-700">Umur</label>
                                <input type="text" name="umur_anak[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            </div>
                        </div>
                    </div>
                    <button type="button" id="tambah-anak" class="mt-2 text-sm text-blue-600 hover:text-blue-800">+ Tambah Data Anak</button>
                </div>
                
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900">Data Saksi (bila diperlukan)</label>
                    <div id="saksi-list">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-2">
                            <div>
                                <label class="block mb-1 text-xs font-medium text-gray-700">Nama Saksi</label>
                                <input type="text" name="nama_saksi[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            </div>
                            <div>
                                <label class="block mb-1 text-xs font-medium text-gray-700">NIK Saksi</label>
                                <input type="text" name="nik_saksi[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            </div>
                        </div>
                    </div>
                    <button type="button" id="tambah-saksi" class="mt-2 text-sm text-blue-600 hover:text-blue-800">+ Tambah Saksi</button>
                </div>
            `;
            dynamicFields.innerHTML = html;

            // Add functionality to add more children
            document.getElementById('tambah-anak').addEventListener('click', function () {
                const anakList = document.getElementById('anak-list');
                const newAnak = document.createElement('div');
                newAnak.className = 'grid grid-cols-1 md:grid-cols-2 gap-4 mb-2';
                newAnak.innerHTML = `
                    <div>
                        <label class="block mb-1 text-xs font-medium text-gray-700">Nama Anak</label>
                        <input type="text" name="nama_anak[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                    <div>
                        <label class="block mb-1 text-xs font-medium text-gray-700">Umur</label>
                        <input type="text" name="umur_anak[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                `;
                anakList.appendChild(newAnak);
            });

            // Add functionality to add more witnesses
            document.getElementById('tambah-saksi').addEventListener('click', function () {
                const saksiList = document.getElementById('saksi-list');
                const newSaksi = document.createElement('div');
                newSaksi.className = 'grid grid-cols-1 md:grid-cols-2 gap-4 mb-2';
                newSaksi.innerHTML = `
                    <div>
                        <label class="block mb-1 text-xs font-medium text-gray-700">Nama Saksi</label>
                        <input type="text" name="nama_saksi[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                    <div>
                        <label class="block mb-1 text-xs font-medium text-gray-700">NIK Saksi</label>
                        <input type="text" name="nik_saksi[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                `;
                saksiList.appendChild(newSaksi);
            });
        }

        function addKKBaruFields() {
            const html = `
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Nama Kepala Keluarga</label>
                        <input type="text" name="nama_kepala_keluarga" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nama lengkap kepala keluarga">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">NIK Kepala Keluarga</label>
                        <input type="text" name="nik_kepala_keluarga" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nomor Induk Kependudukan">
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-4 mb-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Alamat Domisili</label>
                        <textarea name="alamat_domisili" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" rows="2"></textarea>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-4 mb-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Alasan Pembuatan KK</label>
                        <select name="alasan_pembuatan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="Baru">Baru (Keluarga baru)</option>
                            <option value="Pindah">Pindah Domisili</option>
                            <option value="Pecah">Pecah KK</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                </div>
                
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900">Daftar Anggota Keluarga</label>
                    <div id="anggota-kk-list">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-2">
                            <div>
                                <label class="block mb-1 text-xs font-medium text-gray-700">Nama Lengkap</label>
                                <input type="text" name="anggota_kk_nama[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            </div>
                            <div>
                                <label class="block mb-1 text-xs font-medium text-gray-700">NIK</label>
                                <input type="text" name="anggota_kk_nik[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            </div>
                            <div>
                                <label class="block mb-1 text-xs font-medium text-gray-700">Hubungan</label>
                                <input type="text" name="anggota_kk_hubungan[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Anak, istri, dll">
                            </div>
                        </div>
                    </div>
                    <button type="button" id="tambah-anggota-kk" class="mt-2 text-sm text-blue-600 hover:text-blue-800">+ Tambah Anggota Keluarga</button>
                </div>
                
                <div class="mt-6 bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                    <div class="flex">
                        <svg class="flex-shrink-0 w-5 h-5 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                        </svg>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-yellow-800">Dokumen yang Perlu Disiapkan</h3>
                            <div class="mt-2 text-sm text-yellow-700">
                                <ul class="list-disc pl-5 space-y-1">
                                    <li>Fotokopi KTP kepala keluarga</li>
                                    <li>Fotokopi KK lama (jika ada)</li>
                                    <li>Surat nikah/akta cerai (jika diperlukan)</li>
                                    <li>Surat keterangan pindah (jika karena pindah domisili)</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            dynamicFields.innerHTML = html;

            // Add functionality to add more family members
            document.getElementById('tambah-anggota-kk').addEventListener('click', function () {
                const anggotaList = document.getElementById('anggota-kk-list');
                const newAnggota = document.createElement('div');
                newAnggota.className = 'grid grid-cols-1 md:grid-cols-3 gap-4 mb-2';
                newAnggota.innerHTML = `
                    <div>
                        <label class="block mb-1 text-xs font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" name="anggota_kk_nama[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                    <div>
                        <label class="block mb-1 text-xs font-medium text-gray-700">NIK</label>
                        <input type="text" name="anggota_kk_nik[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                    <div>
                        <label class="block mb-1 text-xs font-medium text-gray-700">Hubungan</label>
                        <input type="text" name="anggota_kk_hubungan[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Anak, istri, dll">
                    </div>
                `;
                anggotaList.appendChild(newAnggota);
            });
        }

        function addPengantarKTPFields() {
            const html = `
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Tempat, Tanggal Lahir</label>
                        <input type="text" name="ttl" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: Jakarta, 17 Agustus 1945">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Alamat Lengkap</label>
                        <textarea name="alamat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" rows="2"></textarea>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Alasan Pengajuan</label>
                        <select name="alasan_pengajuan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="Baru">Baru (Pertama kali)</option>
                            <option value="Hilang">Hilang</option>
                            <option value="Rusak">Rusak</option>
                            <option value="Ganti Status">Ganti Status (Menikah/Cerai)</option>
                            <option value="Perubahan Data">Perubahan Data</option>
                        </select>
                    </div>
                    <div id="ktp-lama-field" style="display: none;">
                        <label class="block mb-2 text-sm font-medium text-gray-900">Nomor KTP Lama</label>
                        <input type="text" name="no_ktp_lama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900">Status Pernikahan</label>
                    <select name="status_pernikahan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="Belum Menikah">Belum Menikah</option>
                        <option value="Menikah">Menikah</option>
                        <option value="Cerai Hidup">Cerai Hidup</option>
                        <option value="Cerai Mati">Cerai Mati</option>
                    </select>
                </div>
                
                <div class="mt-6 bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                    <div class="flex">
                        <svg class="flex-shrink-0 w-5 h-5 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                        </svg>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-yellow-800">Dokumen yang Perlu Disiapkan</h3>
                            <div class="mt-2 text-sm text-yellow-700">
                                <ul class="list-disc pl-5 space-y-1">
                                    <li>Fotokopi KK</li>
                                    <li>Surat pengantar RT/RW</li>
                                    <li>Fotokopi akta kelahiran</li>
                                    <li>Surat nikah/cerai (jika karena perubahan status)</li>
                                    <li>Surat keterangan kehilangan dari kepolisian (jika KTP hilang)</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            dynamicFields.innerHTML = html;

            // Show/hide KTP lama field based on reason
            document.querySelector('select[name="alasan_pengajuan"]').addEventListener('change', function () {
                const ktpLamaField = document.getElementById('ktp-lama-field');
                if (this.value === 'Hilang' || this.value === 'Rusak' || this.value === 'Ganti Status' || this.value === 'Perubahan Data') {
                    ktpLamaField.style.display = 'block';
                } else {
                    ktpLamaField.style.display = 'none';
                }
            });
        }
    });
</script>

<!-- Load SweetAlert2 -->
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
