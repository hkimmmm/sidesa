<div class="bg-white p-6 rounded-lg shadow mb-8">
	<div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
		<h2 class="text-xl font-bold text-gray-800">Daftar Potensi</h2>
		<a href="<?= site_url('potensi/add') ?>" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 mt-4 md:mt-0">
			<svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
				<path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
			</svg>
			Tambah Potensi
		</a>
	</div>

	<div class="mb-6">
		<form method="get" action="<?= site_url('potensi') ?>">
			<div class="flex flex-col md:flex-row md:items-center space-y-4 md:space-y-0 md:space-x-4">
				<div class="relative flex-grow">
					<div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
						<svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
							<path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
						</svg>
					</div>
					<input type="text" name="search" value="<?= $search ?>" placeholder="Cari nama atau lokasi potensi..." class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
				</div>
				<select name="status" class="block w-full md:w-auto pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
					<option value="">Semua Status</option>
					<option value="aktif" <?= $status === 'aktif' ? 'selected' : '' ?>>Aktif</option>
					<option value="nonaktif" <?= $status === 'nonaktif' ? 'selected' : '' ?>>Nonaktif</option>
				</select>
				<button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Cari</button>
				<a href="<?= site_url('potensi') ?>" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">Reset</a>
			</div>
		</form>
	</div>

	<div class="overflow-x-auto">
		<table class="min-w-full divide-y divide-gray-200">
			<thead class="bg-gray-50">
				<tr>
					<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
					<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gambar</th>
					<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Potensi</th>
					<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
					<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lokasi</th>
					<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
					<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
					<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Penanggung Jawab</th>
					<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
				</tr>
			</thead>
			<tbody class="bg-white divide-y divide-gray-200">
				<?php foreach ($potensi as $index => $item): ?>
					<tr>
						<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= $index + 1 ?></td>
						<td class="px-6 py-4 whitespace-nowrap">
							<?php if ($item['gambar']): ?>
								<img class="h-10 w-10 rounded-md object-cover" src="<?= base_url('uploads/potensi/' . $item['gambar']) ?>" alt="<?= $item['judul'] ?>">
							<?php else: ?>
								<div class="h-10 w-10 rounded-md bg-gray-200 flex items-center justify-center text-gray-500">
									<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
										<path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path>
									</svg>
								</div>
							<?php endif; ?>
						</td>
						<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?= $item['judul'] ?></td>
						<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
							<?= ucfirst($item['kategori']) ?>
						</td>
						<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= $item['lokasi'] ?></td>
						<td class="px-6 py-4 whitespace-nowrap">
							<?php
							$statusClasses = [
								'aktif' => 'bg-green-100 text-green-800',
								'nonaktif' => 'bg-red-100 text-red-800'
							];
							$class = $statusClasses[$item['status']] ?? 'bg-gray-100 text-gray-800';
							?>
							<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full <?= $class ?>">
								<?= ucfirst($item['status']) ?>
							</span>
						</td>
						<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= date('Y-m-d', strtotime($item['created_at'])) ?></td>
						<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= $item['penanggung_jawab'] ?></td>
						<td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
							<a href="<?= site_url('potensi/edit/' . $item['id']) ?>" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
							<a href="<?= site_url('potensi/delete/' . $item['id']) ?>" class="text-red-600 hover:text-red-900" onclick="return confirm('Apakah Anda yakin ingin menghapus potensi ini?')">Hapus</a>
						</td>
					</tr>
				<?php endforeach; ?>
				<?php if (empty($potensi)): ?>
					<tr>
						<td colspan="9" class="px-6 py-4 text-center text-sm text-gray-500">
							Tidak ada data potensi yang ditemukan.
						</td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</div>

	<?php if (isset($pagination) && $pagination['totalPages'] > 1): ?>
		<div class="mt-6 flex justify-center">
			<nav class="inline-flex rounded-md shadow-sm" aria-label="Pagination">
				<a href="<?= ($pagination['currentPage'] > 1) ? site_url('news?page=' . ($pagination['currentPage'] - 1)) : '#' ?>"
					class="px-3 py-2 border rounded-l-md <?= ($pagination['currentPage'] <= 1) ? 'text-gray-300 cursor-not-allowed bg-white border-gray-300' : 'text-gray-500 hover:bg-gray-50 border-gray-300' ?>"
					<?= ($pagination['currentPage'] <= 1) ? 'aria-disabled="true"' : '' ?>>
					&laquo;
				</a>
				<?php for ($i = 1; $i <= $pagination['totalPages']; $i++): ?>
					<a href="<?= site_url('news?page=' . $i) ?>"
						class="px-4 py-2 border-t border-b <?= ($i === $pagination['currentPage']) ? 'bg-blue-50 border-blue-500 text-blue-600 font-semibold' : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50' ?>">
						<?= $i ?>
					</a>
				<?php endfor; ?>
				<a href="<?= ($pagination['currentPage'] < $pagination['totalPages']) ? site_url('news?page=' . ($pagination['currentPage'] + 1)) : '#' ?>"
					class="px-3 py-2 border rounded-r-md <?= ($pagination['currentPage'] >= $pagination['totalPages']) ? 'text-gray-300 cursor-not-allowed bg-white border-gray-300' : 'text-gray-500 hover:bg-gray-50 border-gray-300' ?>"
					<?= ($pagination['currentPage'] >= $pagination['totalPages']) ? 'aria-disabled="true"' : '' ?>>
					&raquo;
				</a>
			</nav>
		</div>
	<?php endif; ?>
</div>
