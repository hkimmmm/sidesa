<div class="max-w-6xl mx-auto">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-bold text-gray-800">Edit Prasarana</h1>
        <a href="<?= site_url('prasarana') ?>" class="text-blue-600 hover:text-blue-800">Kembali</a>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <form method="post" action="<?= site_url('prasarana/edit/' . $prasarana->id) ?>" enctype="multipart/form-data">
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label for="nama_prasarana" class="block text-sm font-medium text-gray-700">Nama Prasarana *</label>
                    <input type="text" name="nama_prasarana" id="nama_prasarana" 
                        value="<?= set_value('nama_prasarana', $prasarana->nama_prasarana) ?>"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    <?= form_error('nama_prasarana', '<p class="mt-1 text-sm text-red-600">', '</p>') ?>
                </div>
                
                <div>
                    <label for="jenis_id" class="block text-sm font-medium text-gray-700">Jenis Prasarana *</label>
                    <select name="jenis_id" id="jenis_id"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Pilih Jenis Prasarana</option>
                        <?php foreach ($jenis_prasarana as $jenis): ?>
                            <option value="<?= $jenis->id ?>" 
                                <?= set_select('jenis_id', $jenis->id, $jenis->id == $prasarana->jenis_id) ?>>
                                <?= htmlspecialchars($jenis->nama_jenis) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('jenis_id', '<p class="mt-1 text-sm text-red-600">', '</p>') ?>
                </div>
                
                <div>
                    <label for="lokasi" class="block text-sm font-medium text-gray-700">Lokasi *</label>
                    <input type="text" name="lokasi" id="lokasi" 
                        value="<?= set_value('lokasi', $prasarana->lokasi) ?>"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    <?= form_error('lokasi', '<p class="mt-1 text-sm text-red-600">', '</p>') ?>
                </div>
                
                <div>
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="3"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"><?= set_value('deskripsi', $prasarana->deskripsi) ?></textarea>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700">Foto Saat Ini</label>
                    <?php if ($prasarana->foto): ?>
                        <img src="<?= base_url($prasarana->foto) ?>" alt="<?= htmlspecialchars($prasarana->nama_prasarana) ?>"
                            class="h-20 w-20 rounded-md object-cover mt-2">
                    <?php else: ?>
                        <div class="h-20 w-20 rounded-md bg-gray-200 flex items-center justify-center mt-2">
                            <svg class="h-10 w-10 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 16h8v2H8zm0-4h8v2H8zm6-10H6c-1.1 0-2 .9-2 2v16c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm4 18H6V4h7v5h5v11z"/>
                            </svg>
                        </div>
                    <?php endif; ?>
                </div>
                
                <div>
                    <label for="foto" class="block text-sm font-medium text-gray-700">Ganti Foto</label>
                    <input type="file" name="foto" id="foto"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    <p class="mt-1 text-sm text-gray-500">Biarkan kosong jika tidak ingin mengganti foto</p>
                </div>
                
                <div class="flex justify-end">
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                        Simpan Perubahan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
