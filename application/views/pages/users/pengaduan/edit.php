<div class="max-w-4xl mx-auto">
    <div class="mb-6">
        <a href="<?php echo base_url('pengaduan/detail/' . $pengaduan->id); ?>" class="inline-flex items-center text-blue-600 hover:text-blue-800">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali ke Detail Pengaduan
        </a>
    </div>

    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-800">Edit Pengaduan</h1>
        <p class="text-gray-600">Perbarui informasi pengaduan Anda</p>
    </div>

    <?php if ($this->session->flashdata('error')): ?>
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline"><?php echo $this->session->flashdata('error'); ?></span>
        </div>
    <?php endif; ?>

    <form method="post" action="<?php echo base_url('pengaduan/edit/' . $pengaduan->id); ?>" enctype="multipart/form-data" class="bg-white rounded-lg shadow-md p-6">
        <div class="mb-8">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">1. Kategori Pengaduan</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Jenis Pengaduan</label>
                    <select name="jenis_pengaduan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        <option value="infrastruktur" <?php echo set_select('jenis_pengaduan', 'infrastruktur', $pengaduan->jenis_pengaduan == 'infrastruktur'); ?>>Infrastruktur (Jalan, Jembatan, Drainase)</option>
                        <option value="sampah" <?php echo set_select('jenis_pengaduan', 'sampah', $pengaduan->jenis_pengaduan == 'sampah'); ?>>Pengelolaan Sampah</option>
                        <option value="air" <?php echo set_select('jenis_pengaduan', 'air', $pengaduan->jenis_pengaduan == 'air'); ?>>Air Bersih dan Sanitasi</option>
                        <option value="administrasi" <?php echo set_select('jenis_pengaduan', 'administrasi', $pengaduan->jenis_pengaduan == 'administrasi'); ?>>Pelayanan Administrasi</option>
                        <option value="lainnya" <?php echo set_select('jenis_pengaduan', 'lainnya', $pengaduan->jenis_pengaduan == 'lainnya'); ?>>Lainnya</option>
                    </select>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Prioritas</label>
                    <select name="prioritas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="rendah" <?php echo set_select('prioritas', 'rendah', $pengaduan->prioritas == 'rendah'); ?>>Rendah</option>
                        <option value="sedang" <?php echo set_select('prioritas', 'sedang', $pengaduan->prioritas == 'sedang'); ?>>Sedang</option>
                        <option value="tinggi" <?php echo set_select('prioritas', 'tinggi', $pengaduan->prioritas == 'tinggi'); ?>>Tinggi</option>
                        <option value="darurat" <?php echo set_select('prioritas', 'darurat', $pengaduan->prioritas == 'darurat'); ?>>Darurat</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="mb-8">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">2. Detail Pengaduan</h2>
            <div class="space-y-4">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Judul Pengaduan</label>
                    <input type="text" name="judul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="<?php echo set_value('judul', $pengaduan->judul); ?>" required>
                    <?php echo form_error('judul', '<p class="mt-1 text-sm text-red-600">', '</p>'); ?>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Deskripsi Lengkap</label>
                    <textarea name="deskripsi" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required><?php echo set_value('deskripsi', $pengaduan->deskripsi); ?></textarea>
                    <?php echo form_error('deskripsi', '<p class="mt-1 text-sm text-red-600">', '</p>'); ?>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Lokasi Kejadian</label>
                        <input type="text" name="lokasi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="<?php echo set_value('lokasi', $pengaduan->lokasi); ?>" required>
                        <?php echo form_error('lokasi', '<p class="mt-1 text-sm text-red-600">', '</p>'); ?>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Tanggal Kejadian</label>
                        <input type="date" name="tanggal_kejadian" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="<?php echo set_value('tanggal_kejadian', $pengaduan->tanggal_kejadian); ?>" required>
                        <?php echo form_error('tanggal_kejadian', '<p class="mt-1 text-sm text-red-600">', '</p>'); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-8">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">3. Lampiran</h2>
            
            <?php if (!empty($pengaduan->lampiran)): ?>
                <div class="mb-4">
                    <h3 class="text-md font-medium text-gray-900 mb-2">Lampiran Saat Ini</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <?php foreach ($pengaduan->lampiran as $lampiran): ?>
                            <div class="border rounded-lg p-3 flex items-center">
                                <?php if (strpos($lampiran->tipe_file, 'image') !== false): ?>
                                    <svg class="w-8 h-8 text-blue-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                <?php elseif ($lampiran->tipe_file == 'application/pdf'): ?>
                                    <svg class="w-8 h-8 text-red-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                    </svg>
                                <?php else: ?>
                                    <svg class="w-8 h-8 text-gray-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                <?php endif; ?>
                                
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate"><?php echo $lampiran->nama_file; ?></p>
                                    <p class="text-xs text-gray-500"><?php echo round($lampiran->ukuran / 1024, 2); ?> KB</p>
                                </div>
                                
                                <a href="<?php echo base_url($lampiran->path); ?>" target="_blank" class="ml-3 text-blue-600 hover:text-blue-800">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
            
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
                    <input type="tel" name="no_hp_pelapor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="<?php echo set_value('no_hp_pelapor', $pengaduan->no_hp_pelapor); ?>" required>
                    <?php echo form_error('no_hp_pelapor', '<p class="mt-1 text-sm text-red-600">', '</p>'); ?>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Alamat</label>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="<?php echo $this->session->userdata('alamat'); ?>" readonly>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Email (opsional)</label>
                    <input type="email" name="email_pelapor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="<?php echo set_value('email_pelapor', $pengaduan->email_pelapor); ?>">
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
            <a href="<?php echo base_url('pengaduan/detail/' . $pengaduan->id); ?>" class="px-6 py-2 text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
                Batal
            </a>
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                Simpan Perubahan
            </button>
        </div>
    </form>
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