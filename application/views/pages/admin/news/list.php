<div class="bg-white p-6 rounded-lg shadow mb-8">
	<div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
		<h2 class="text-xl font-bold text-gray-800">Daftar Berita</h2>
		<a href="<?= site_url('news/add') ?>" class="inline-flex items-center px-4 py-2 mt-4 md:mt-0 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
			<svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
				<path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
			</svg>
			Tambah Berita
		</a>
	</div>

	<div class="mb-6">
		<div class="flex flex-col md:flex-row md:items-center gap-4">
			<div class="relative flex-grow">
				<div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
					<svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
						<path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
					</svg>
				</div>
				<input type="text" placeholder="Cari judul atau isi berita..." class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md text-sm placeholder-gray-500 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
			</div>
			<select class="w-full md:w-auto px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
				<option value="">Semua Status</option>
				<option value="publish">Publik</option>
				<option value="draft">Draft</option>
				<option value="archive">Arsip</option>
			</select>
		</div>
	</div>

	<div class="overflow-x-auto">
		<table class="min-w-full divide-y divide-gray-200 text-sm">
			<thead class="bg-gray-50">
				<tr>
					<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
					<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gambar</th>
					<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
					<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
					<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
					<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Penulis</th>
					<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
				</tr>
			</thead>
			<tbody class="bg-white divide-y divide-gray-200">
				<?php foreach ($news as $index => $item): ?>
					<tr>
						<td class="px-6 py-4 text-gray-500"><?= $index + 1 ?></td>
						<td class="px-6 py-4">
							<img class="h-10 w-10 rounded-md object-cover" src="<?= base_url('uploads/news/' . $item['gambar']) ?>" alt="<?= $item['judul'] ?>">
						</td>
						<td class="px-6 py-4 font-medium text-gray-900"><?= $item['judul'] ?></td>
						<td class="px-6 py-4">
							<?php
							$statusClasses = [
								'publish' => 'bg-green-100 text-green-800',
								'draft' => 'bg-yellow-100 text-yellow-800',
								'archive' => 'bg-gray-100 text-gray-800'
							];
							$class = $statusClasses[$item['status']] ?? 'bg-gray-100 text-gray-800';
							?>
							<span class="px-2 inline-flex text-xs font-semibold rounded-full <?= $class ?>">
								<?= ucfirst($item['status']) ?>
							</span>
						</td>
						<td class="px-6 py-4 text-gray-500"><?= date('Y-m-d', strtotime($item['created_at'])) ?></td>
						<td class="px-6 py-4 text-gray-500"><?= $item['author_name'] ?></td>
						<td class="px-6 py-4 font-medium">
							<a href="<?= site_url('news/edit/' . $item['id']) ?>" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
							<a href="<?= site_url('news/delete/' . $item['id']) ?>" class="text-red-600 hover:text-red-900" onclick="return confirm('Yakin ingin menghapus berita ini?')">Hapus</a>
						</td>
					</tr>
				<?php endforeach; ?>
				<?php if (empty($news)): ?>
					<tr>
						<td colspan="7" class="px-6 py-4 text-center text-gray-500">Tidak ada data berita yang ditemukan.</td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</div>

	<?php if (isset($pagination) && $pagination['totalPages'] > 1): ?>
		<div class="mt-6 flex justify-center">
			<nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
				<a href="<?= ($pagination['currentPage'] > 1) ? site_url('news?page=' . ($pagination['currentPage'] - 1)) : '#' ?>"
					class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium <?= ($pagination['currentPage'] <= 1) ? 'text-gray-300 cursor-not-allowed' : 'text-gray-500 hover:bg-gray-50' ?>"
					<?= ($pagination['currentPage'] <= 1) ? 'aria-disabled="true"' : '' ?>>
					<span class="sr-only">Previous</span>
					<svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
						<path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
					</svg>
				</a>
				<?php for ($i = 1; $i <= $pagination['totalPages']; $i++): ?>
					<a href="<?= site_url('news?page=' . $i) ?>"
						class="<?= ($i == $pagination['currentPage']) ? 'z-10 bg-blue-50 border-blue-500 text-blue-600' : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50' ?> relative inline-flex items-center px-4 py-2 border text-sm font-medium"
						aria-current="<?= ($i == $pagination['currentPage']) ? 'page' : 'false' ?>">
						<?= $i ?>
					</a>
				<?php endfor; ?>
				<a href="<?= ($pagination['currentPage'] < $pagination['totalPages']) ? site_url('news?page=' . ($pagination['currentPage'] + 1)) : '#' ?>"
					class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium <?= ($pagination['currentPage'] >= $pagination['totalPages']) ? 'text-gray-300 cursor-not-allowed' : 'text-gray-500 hover:bg-gray-50' ?>"
					<?= ($pagination['currentPage'] >= $pagination['totalPages']) ? 'aria-disabled="true"' : '' ?>>
					<span class="sr-only">Next</span>
					<svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
						<path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
					</svg>
				</a>

			</nav>
		</div>
	<?php endif; ?>
</div>