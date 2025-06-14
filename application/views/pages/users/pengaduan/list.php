<div class="max-w-4xl mx-auto">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-bold text-gray-800">Status Pengaduan</h1>
        <a href="<?php echo base_url('pengaduan/add'); ?>" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
            Buat Pengaduan Baru
        </a>
    </div>

    <!-- Filter Section -->
    <form method="get" action="<?php echo base_url('pengaduan'); ?>" class="bg-white rounded-lg shadow-md p-4 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700">Status</label>
                <select name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                    <option value="">Semua Status</option>
                    <option value="diterima" <?php echo $this->input->get('status') == 'diterima' ? 'selected' : ''; ?>>Diterima</option>
                    <option value="proses" <?php echo $this->input->get('status') == 'proses' ? 'selected' : ''; ?>>Dalam Proses</option>
                    <option value="selesai" <?php echo $this->input->get('status') == 'selesai' ? 'selected' : ''; ?>>Selesai</option>
                    <option value="ditolak" <?php echo $this->input->get('status') == 'ditolak' ? 'selected' : ''; ?>>Ditolak</option>
                </select>
            </div>
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700">Jenis Pengaduan</label>
                <select name="jenis" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                    <option value="">Semua Jenis</option>
                    <option value="infrastruktur" <?php echo $this->input->get('jenis') == 'infrastruktur' ? 'selected' : ''; ?>>Infrastruktur</option>
                    <option value="sampah" <?php echo $this->input->get('jenis') == 'sampah' ? 'selected' : ''; ?>>Sampah</option>
                    <option value="air" <?php echo $this->input->get('jenis') == 'air' ? 'selected' : ''; ?>>Air Bersih</option>
                    <option value="administrasi" <?php echo $this->input->get('jenis') == 'administrasi' ? 'selected' : ''; ?>>Administrasi</option>
                </select>
            </div>
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700">Dari Tanggal</label>
                <input type="date" name="dari_tanggal" value="<?php echo $this->input->get('dari_tanggal'); ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
            </div>
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700">Sampai Tanggal</label>
                <input type="date" name="sampai_tanggal" value="<?php echo $this->input->get('sampai_tanggal'); ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
            </div>
        </div>
        <div class="flex justify-end mt-4 space-x-2">
            <a href="<?php echo base_url('pengaduan'); ?>" class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-100 transition-colors">
                Reset
            </a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                Terapkan Filter
            </button>
        </div>
    </form>

    <!-- Complaint List -->
    <div class="space-y-4">
        <?php if (empty($pengaduan)): ?>
            <div class="bg-white rounded-lg shadow-md p-6 text-center">
                <p class="text-gray-600">Tidak ada pengaduan yang ditemukan.</p>
                <a href="<?php echo base_url('pengaduan/add'); ?>" class="mt-4 inline-block px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                    Buat Pengaduan Baru
                </a>
            </div>
        <?php else: ?>
            <?php foreach ($pengaduan as $item): ?>
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="p-5 border-b border-gray-200">
                        <div class="flex justify-between items-start">
                            <div>
                                <div class="flex items-center">
                                    <?php if ($item->status == 'diterima'): ?>
                                        <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded mr-2">Diterima</span>
                                    <?php elseif ($item->status == 'proses'): ?>
                                        <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs font-medium rounded mr-2">Dalam Proses</span>
                                    <?php elseif ($item->status == 'selesai'): ?>
                                        <span class="px-2 py-1 bg-green-100 text-green-800 text-xs font-medium rounded mr-2">Selesai</span>
                                    <?php elseif ($item->status == 'ditolak'): ?>
                                        <span class="px-2 py-1 bg-red-100 text-red-800 text-xs font-medium rounded mr-2">Ditolak</span>
                                    <?php endif; ?>
                                    <span class="text-xs text-gray-500"><?php echo $item->kode_pengaduan; ?></span>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-800 mt-1"><?php echo $item->judul; ?></h3>
                                <p class="text-sm text-gray-600 mt-1"><?php echo ucfirst($item->jenis_pengaduan); ?> - Prioritas: <?php echo ucfirst($item->prioritas); ?></p>
                            </div>
                            <span class="text-xs text-gray-500">Dikirim: <?php echo date('d M Y', strtotime($item->tanggal_pengaduan)); ?></span>
                        </div>
                    </div>
                    <div class="p-5">
                        <p class="text-gray-700 mb-3"><?php echo nl2br($item->deskripsi); ?></p>

                        <div class="flex items-center text-sm text-gray-500 mb-4">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                            </svg>
                            <span><?php echo $item->lokasi; ?></span>
                        </div>

                        <?php if ($item->status == 'ditolak'): ?>
                            <!-- Rejection Reason -->
                            <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-4">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <h3 class="text-sm font-medium text-red-800">Alasan Penolakan</h3>
                                        <div class="mt-2 text-sm text-red-700">
                                            <p><?php echo $item->alasan_ditolak; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="mt-6 flex justify-end space-x-3">
                            <a href="<?php echo base_url('pengaduan/detail/' . $item->id); ?>" class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                                Lihat Detail
                            </a>
                            <?php if ($item->status == 'ditolak'): ?>
                                <a href="<?php echo base_url('pengaduan/ajukan_kembali/' . $item->id); ?>" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                                    Ajukan Kembali
                                </a>
                            <?php elseif ($item->status == 'selesai'): ?>
                                <button class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                                    Beri Rating
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <!-- Pagination -->
    <div class="mt-6 flex justify-center">
        <nav class="inline-flex rounded-md shadow">
            <a href="#" class="px-3 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">Previous</a>
            <a href="#" class="px-3 py-2 border-t border-b border-gray-300 bg-white text-sm font-medium text-blue-600 hover:bg-blue-50">1</a>
            <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">2</a>
            <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">3</a>
            <a href="#" class="px-3 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">Next</a>
        </nav>
    </div>
</div>
