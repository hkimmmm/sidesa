<div class="max-w-6xl mx-auto">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-bold text-gray-800">Tambah Prasarana</h1>
        <a href="<?= site_url('prasarana') ?>" class="text-blue-600 hover:text-blue-800">Kembali</a>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <form method="post" action="<?= site_url('prasarana/create') ?>" enctype="multipart/form-data">
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label for="nama_prasarana" class="block text-sm font-medium text-gray-700">Nama Prasarana *</label>
                    <input type="text" name="nama_prasarana" id="nama_prasarana" value="<?= set_value('nama_prasarana') ?>"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    <?= form_error('nama_prasarana', '<p class="mt-1 text-sm text-red-600">', '</p>') ?>
                </div>
                
                <div>
                    <label for="jenis_id" class="block text-sm font-medium text-gray-700">Jenis Prasarana *</label>
                    <select name="jenis_id" id="jenis_id"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Pilih Jenis Prasarana</option>
                        <?php foreach ($jenis_prasarana as $jenis): ?>
                            <option value="<?= $jenis->id ?>" <?= set_select('jenis_id', $jenis->id) ?>>
                                <?= htmlspecialchars($jenis->nama_jenis) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('jenis_id', '<p class="mt-1 text-sm text-red-600">', '</p>') ?>
                </div>
                
                <div>
                    <label for="lokasi" class="block text-sm font-medium text-gray-700">Lokasi *</label>
                    <input type="text" name="lokasi" id="lokasi" value="<?= set_value('lokasi') ?>"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    <?= form_error('lokasi', '<p class="mt-1 text-sm text-red-600">', '</p>') ?>
                </div>
                
                <div>
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="3"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"><?= set_value('deskripsi') ?></textarea>
                </div>
                
                <div>
                    <label for="foto" class="block text-sm font-medium text-gray-700">Foto</label>
                    <input type="file" name="foto" id="foto"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    <p class="mt-1 text-sm text-gray-500">Format: JPG/PNG, maksimal 2MB</p>
                </div>
                
                <div class="flex justify-end">
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                        Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
