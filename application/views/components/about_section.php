<div class="max-w-4xl mx-auto border border-gray-200 rounded-lg p-4 sm:p-6 space-y-8 mt-16">
	<h2 class="text-center text-sm font-semibold mb-1">
		Seputar Kelurahan
	</h2>
	<p class="text-center text-xs-custom text-gray-600 mb-6">
		Mari ketahui informasi-informasi terkait Kelurahan Procot
	</p>
	<div class="bg-white border border-gray-300 rounded-md p-6">
		<div class="flex justify-center mb-6 space-x-3">
			<button class="text-xs px-3 py-1 rounded-full bg-green-600 text-white border border-green-600 hover:bg-green-700">
				Potensi Kelurahan
			</button>
		</div>
		<h3 class="text-sm font-semibold mb-4">
			Potensi
		</h3>

		<?php if (empty($potensi)): ?>
			<div class="text-center py-8 text-gray-500">
				Tidak ada data potensi yang tersedia
			</div>
		<?php else: ?>
			<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mb-6">
				<?php foreach ($potensi as $item): ?>
					<div class="relative rounded-md overflow-hidden shadow hover:shadow-md transition">
						<img
							alt="<?= html_escape($item['judul']) ?>"
							class="w-full h-40 object-cover"
							src="<?= $item['gambar'] ? base_url('uploads/potensi/' . $item['gambar']) : 'https://via.placeholder.com/400x200?text=No+Image' ?>"
							height="200"
							width="400" />
						<div class="absolute bottom-3 left-3 bg-black bg-opacity-50 rounded-md px-2 py-1 text-xs text-white font-semibold">
							<?= html_escape($item['judul']) ?>
						</div>
						<a
							href="<?= site_url('potensi/detail/' . $item['slug']) ?>"
							class="absolute bottom-3 right-3 text-xs border border-green-600 text-green-600 rounded-md px-2 py-0.5 hover:bg-green-600 hover:text-white transition">
							Selengkapnya
						</a>
					</div>
				<?php endforeach; ?>
			</div>

			<div class="flex justify-center">
				<a
					href="<?= site_url('potensi/semua') ?>"
					class="text-xs border border-green-600 text-green-600 rounded-md px-4 py-1 hover:bg-green-600 hover:text-white transition flex items-center space-x-1">
					<span>Lihat Selengkapnya</span>
					<i class="fas fa-arrow-right"></i>
				</a>
			</div>
		<?php endif; ?>
	</div>
</div>