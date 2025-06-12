<div class="bg-white p-6 rounded-lg shadow-md mb-10">
    <div class="mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Tambah Data Potensi</h2>
        <p class="text-gray-600 text-sm">Isi form berikut untuk menambahkan potensi baru.</p>
    </div>

    <?php if (!empty($error)): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <?= $error ?>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('potensi/add') ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
        <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="md:col-span-2">
                <label for="judul" class="block text-sm font-medium text-gray-700">Judul Potensi</label>
                <input type="text" name="judul" id="judul" value="<?= set_value('judul') ?>" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-600 focus:ring-blue-600 sm:text-sm">
                <?= form_error('judul', '<p class="mt-1 text-sm text-red-600">', '</p>') ?>
            </div>
            <div>
                <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                <select name="kategori" id="kategori" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-600 focus:ring-blue-600 sm:text-sm">
                    <option value="">Pilih Kategori</option>
                    <option value="wisata" <?= set_select('kategori', 'wisata') ?>>Wisata</option>
                    <option value="ekonomi" <?= set_select('kategori', 'ekonomi') ?>>Ekonomi Kreatif</option>
                    <option value="pertanian" <?= set_select('kategori', 'pertanian') ?>>Pertanian</option>
                    <option value="perikanan" <?= set_select('kategori', 'perikanan') ?>>Perikanan</option>
                </select>
                <?= form_error('kategori', '<p class="mt-1 text-sm text-red-600">', '</p>') ?>
            </div>
            <div>
                <label for="lokasi" class="block text-sm font-medium text-gray-700">Lokasi</label>
                <input type="text" name="lokasi" id="lokasi" value="<?= set_value('lokasi') ?>" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-600 focus:ring-blue-600 sm:text-sm">
                <?= form_error('lokasi', '<p class="mt-1 text-sm text-red-600">', '</p>') ?>
            </div>
            <div>
                <label for="penanggung_jawab" class="block text-sm font-medium text-gray-700">Penanggung Jawab</label>
                <input type="text" name="penanggung_jawab" id="penanggung_jawab" value="<?= set_value('penanggung_jawab') ?>" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-600 focus:ring-blue-600 sm:text-sm">
                <?= form_error('penanggung_jawab', '<p class="mt-1 text-sm text-red-600">', '</p>') ?>
            </div>
            <div>
                <label for="kontak" class="block text-sm font-medium text-gray-700">Kontak Penanggung Jawab</label>
                <input type="text" name="kontak" id="kontak" value="<?= set_value('kontak') ?>" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-600 focus:ring-blue-600 sm:text-sm">
                <p class="text-sm text-gray-500 mt-1">Nomor HP/WhatsApp</p>
                <?= form_error('kontak', '<p class="mt-1 text-sm text-red-600">', '</p>') ?>
            </div>
            <div class="md:col-span-2">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi Potensi</label>
                <textarea name="deskripsi" id="deskripsi" rows="4"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-600 focus:ring-blue-600 sm:text-sm"><?= set_value('deskripsi') ?></textarea>
                <?= form_error('deskripsi', '<p class="mt-1 text-sm text-red-600">', '</p>') ?>
            </div>
            <div class="md:col-span-2">
                <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar Potensi</label>
                <input type="file" name="gambar" id="gambar" accept="image/*" required
                    class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                <p class="text-sm text-gray-500 mt-1">Format gambar: JPG, PNG. Maksimal ukuran 2MB.</p>
                <?= form_error('gambar', '<p class="mt-1 text-sm text-red-600">', '</p>') ?>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Status</label>
                <div class="mt-2 space-y-2">
                    <div class="flex items-center">
                        <input type="radio" id="aktif" name="status" value="aktif" checked
                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                        <label for="aktif" class="ml-2 text-sm text-gray-700">Aktif</label>
                    </div>
                    <div class="flex items-center">
                        <input type="radio" id="nonaktif" name="status" value="nonaktif"
                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                        <label for="nonaktif" class="ml-2 text-sm text-gray-700">Nonaktif</label>
                    </div>
                </div>
                <?= form_error('status', '<p class="mt-1 text-sm text-red-600">', '</p>') ?>
            </div>
        </div>
        <div class="flex justify-end gap-3 mt-4">
            <a href="<?= site_url('potensi') ?>"
                class="px-4 py-2 rounded-md border border-gray-300 text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                Batal
            </a>
            <button type="submit"
                class="px-4 py-2 rounded-md text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Simpan Data
            </button>
        </div>
    </form>
</div>
