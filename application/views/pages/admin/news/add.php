<div class="bg-white p-6 rounded-lg shadow mb-8">
    <h2 class="text-xl font-bold text-gray-800 mb-6">Tambah Berita Baru</h2>
    
    <form method="post" action="<?= site_url('news/add') ?>" enctype="multipart/form-data">
        <div class="mb-4">
            <label for="judul" class="block text-sm font-medium text-gray-700 mb-1">Judul Berita</label>
            <input type="text" name="judul" id="judul" value="<?= set_value('judul') ?>" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            <?= form_error('judul', '<p class="mt-1 text-sm text-red-600">', '</p>') ?>
        </div>
        
        <div class="mb-4">
            <label for="isi" class="block text-sm font-medium text-gray-700 mb-1">Isi Berita</label>
            <textarea name="isi" id="isi" rows="10" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"><?= set_value('isi') ?></textarea>
            <?= form_error('isi', '<p class="mt-1 text-sm text-red-600">', '</p>') ?>
        </div>
        
        <div class="mb-4">
            <label for="gambar" class="block text-sm font-medium text-gray-700 mb-1">Gambar</label>
            <input type="file" name="gambar" id="gambar" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
        </div>
        
        <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
            <select name="status" id="status" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                <option value="publish" <?= set_select('status', 'publish') ?>>Publik</option>
                <option value="draft" <?= set_select('status', 'draft', TRUE) ?>>Draft</option>
                <option value="archive" <?= set_select('status', 'archive') ?>>Arsip</option>
            </select>
            <?= form_error('status', '<p class="mt-1 text-sm text-red-600">', '</p>') ?>
        </div>
        
        <div class="flex justify-end">
            <a href="<?= site_url('news') ?>" class="mr-3 px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">Batal</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Simpan</button>
        </div>
    </form>
</div>
