<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-800">Buat Pengaduan Baru</h1>
        <p class="text-gray-600">Sampaikan keluhan atau masalah Anda kepada pemerintah desa</p>
    </div>

    <?php if ($this->session->flashdata('error')): ?>
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline"><?php echo $this->session->flashdata('error'); ?></span>
        </div>
    <?php endif; ?>

    <form method="post" action="<?php echo base_url('pengaduan/add'); ?>" enctype="multipart/form-data" class="bg-white rounded-lg shadow-md p-6">
        <div class="mb-8">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">1. Kategori Pengaduan</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Jenis Pengaduan</label>
                    <select name="jenis_pengaduan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        <option value="" selected disabled>Pilih jenis pengaduan</option>
                        <option value="infrastruktur" <?php echo set_select('jenis_pengaduan', 'infrastruktur'); ?>>Infrastruktur (Jalan, Jembatan, Drainase)</option>
                        <option value="sampah" <?php echo set_select('jenis_pengaduan', 'sampah'); ?>>Pengelolaan Sampah</option>
                        <option value="air" <?php echo set_select('jenis_pengaduan', 'air'); ?>>Air Bersih dan Sanitasi</option>
                        <option value="administrasi" <?php echo set_select('jenis_pengaduan', 'administrasi'); ?>>Pelayanan Administrasi</option>
                        <option value="lainnya" <?php echo set_select('jenis_pengaduan', 'lainnya'); ?>>Lainnya</option>
                    </select>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Prioritas</label>
                    <select name="prioritas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="rendah" <?php echo set_select('prioritas', 'rendah'); ?>>Rendah</option>
                        <option value="sedang" <?php echo set_select('prioritas', 'sedang', true); ?>>Sedang</option>
                        <option value="tinggi" <?php echo set_select('prioritas', 'tinggi'); ?>>Tinggi</option>
                        <option value="darurat" <?php echo set_select('prioritas', 'darurat'); ?>>Darurat</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="mb-8">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">2. Detail Pengaduan</h2>
            <div class="space-y-4">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Judul Pengaduan</label>
                    <input type="text" name="judul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: Jalan Rusak di RT 05" value="<?php echo set_value('judul'); ?>" required>
                    <?php echo form_error('judul', '<p class="mt-1 text-sm text-red-600">', '</p>'); ?>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Deskripsi Lengkap</label>
                    <textarea name="deskripsi" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Jelaskan secara detail masalah yang Anda laporkan" required><?php echo set_value('deskripsi'); ?></textarea>
                    <?php echo form_error('deskripsi', '<p class="mt-1 text-sm text-red-600">', '</p>'); ?>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Lokasi Kejadian</label>
                        <input type="text" name="lokasi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="RT/RW, Nama Jalan, Dusun" value="<?php echo set_value('lokasi'); ?>" required>
                        <?php echo form_error('lokasi', '<p class="mt-1 text-sm text-red-600">', '</p>'); ?>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Tanggal Kejadian</label>
                        <input type="date" name="tanggal_kejadian" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="<?php echo set_value('tanggal_kejadian', date('Y-m-d')); ?>" required>
                        <?php echo form_error('tanggal_kejadian', '<p class="mt-1 text-sm text-red-600">', '</p>'); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-8">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">3. Lampiran</h2>
            <div class="flex items-center justify-center w-full">
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                        </svg>
                        <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Klik untuk upload</span> atau drag and drop</p>
                        <p class="text-xs text-gray-500">Format: JPG, PNG, PDF (Maks. 5MB)</p>
                    </div>
                    <input id="dropzone-file" type="file" name="lampiran[]" class="hidden" multiple />
                </label>
            </div>
            <div id="file-list" class="mt-2 space-y-2"></div>
        </div>

        <div class="mb-8">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">4. Data Pelapor</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Nama Lengkap</label>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="<?php echo $this->session->userdata('nama'); ?>" readonly>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">No. HP</label>
                    <input type="tel" name="no_hp_pelapor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="0812-3456-7890" value="<?php echo set_value('no_hp_pelapor'); ?>" required>
                    <?php echo form_error('no_hp_pelapor', '<p class="mt-1 text-sm text-red-600">', '</p>'); ?>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Alamat</label>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="<?php echo $this->session->userdata('alamat'); ?>" readonly>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Email (opsional)</label>
                    <input type="email" name="email_pelapor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="email@contoh.com" value="<?php echo set_value('email_pelapor'); ?>">
                </div>
            </div>
            <div class="mt-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" class="form-checkbox h-4 w-4 text-blue-600" required>
                    <span class="ml-2 text-sm text-gray-700">Saya menyatakan bahwa data yang diisi adalah benar</span>
                </label>
            </div>
        </div>

        <div class="flex justify-between mt-8 pt-6 border-t border-gray-200">
            <button type="button" onclick="window.history.back()" class="px-6 py-2 text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
                Kembali
            </button>
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                Kirim Pengaduan
            </button>
        </div>
    </form>

    <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4">
        <div class="flex">
            <svg class="flex-shrink-0 w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
            </svg>
            <div class="ml-3">
                <h3 class="text-sm font-medium text-blue-800">Proses Pengaduan</h3>
                <div class="mt-2 text-sm text-blue-700">
                    <ul class="list-disc pl-5 space-y-1">
                        <li>Pengaduan akan diverifikasi dalam 1x24 jam</li>
                        <li>Anda akan menerima nomor tiket pengaduan via SMS/WhatsApp</li>
                        <li>Status pengaduan dapat dilacak melalui menu Status Pengaduan</li>
                        <li>Pengaduan anonim tidak akan mendapatkan update status</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fileInput = document.getElementById('dropzone-file');
        const fileList = document.getElementById('file-list');

        fileInput.addEventListener('change', function(e) {
            fileList.innerHTML = '';

            if (fileInput.files.length > 0) {
                Array.from(fileInput.files).forEach(file => {
                    const fileItem = document.createElement('div');
                    fileItem.className = 'flex items-center p-2 bg-gray-50 rounded-lg';
                    fileItem.innerHTML = `
                        <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                        <span class="text-sm text-gray-700 truncate flex-1">${file.name}</span>
                        <span class="text-xs text-gray-500">${(file.size / 1024 / 1024).toFixed(2)} MB</span>
                    `;
                    fileList.appendChild(fileItem);
                });
            }
        });
    });
</script>