<div class="max-w-6xl mx-auto">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-bold text-gray-800">Tambah Anggota Organisasi</h1>
        <a href="<?= site_url('organisasi') ?>" class="text-blue-600 hover:text-blue-800">Kembali</a>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <form method="post" action="<?= site_url('organisasi/create') ?>" enctype="multipart/form-data">
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" name="nama" id="nama" value="<?= set_value('nama') ?>"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    <?= form_error('nama', '<p class="mt-1 text-sm text-red-600">', '</p>') ?>
                </div>
                
                <div>
                    <label for="jabatan" class="block text-sm font-medium text-gray-700">Jabatan</label>
                    <input type="text" name="jabatan" id="jabatan" value="<?= set_value('jabatan') ?>"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    <?= form_error('jabatan', '<p class="mt-1 text-sm text-red-600">', '</p>') ?>
                </div>
                
                <div>
                    <label for="urutan" class="block text-sm font-medium text-gray-700">Urutan</label>
                    <input type="number" name="urutan" id="urutan" value="<?= set_value('urutan', 0) ?>"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    <?= form_error('urutan', '<p class="mt-1 text-sm text-red-600">', '</p>') ?>
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
