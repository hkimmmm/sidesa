<div class="max-w-6xl mx-auto">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-bold text-gray-800">Detail Prasarana</h1>
        <a href="<?= site_url('prasarana') ?>" class="text-blue-600 hover:text-blue-800">Kembali</a>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="md:col-span-2">
                    <h2 class="text-xl font-semibold text-gray-800"><?= htmlspecialchars($prasarana->nama_prasarana) ?></h2>
                    <div class="mt-4 space-y-4">
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Jenis Prasarana</h3>
                            <p class="mt-1 text-sm text-gray-900"><?= htmlspecialchars($prasarana->nama_jenis) ?></p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Lokasi</h3>
                            <p class="mt-1 text-sm text-gray-900"><?= htmlspecialchars($prasarana->lokasi) ?></p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Deskripsi</h3>
                            <p class="mt-1 text-sm text-gray-900"><?= nl2br(htmlspecialchars($prasarana->deskripsi ?: '-')) ?></p>
                        </div>
                    </div>
                </div>
                
                <div>
                    <h3 class="text-sm font-medium text-gray-500">Foto</h3>
                    <?php if ($prasarana->foto): ?>
                        <img src="<?= base_url($prasarana->foto) ?>" alt="<?= htmlspecialchars($prasarana->nama_prasarana) ?>"
                            class="mt-2 w-full h-64 object-cover rounded-md">
                    <?php else: ?>
                        <div class="mt-2 w-full h-64 bg-gray-200 rounded-md flex items-center justify-center">
                            <svg class="h-16 w-16 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 16h8v2H8zm0-4h8v2H8zm6-10H6c-1.1 0-2 .9-2 2v16c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm4 18H6V4h7v5h5v11z"/>
                            </svg>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="mt-6 flex justify-end space-x-3">
                <a href="<?= site_url('prasarana/edit/' . $prasarana->id) ?>"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                    Edit
                </a>
                <a href="<?= site_url('prasarana') ?>"
                    class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-colors">
                    Kembali
                </a>
            </div>
        </div>
    </div>
</div>
