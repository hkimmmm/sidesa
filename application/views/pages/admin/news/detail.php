<section class="py-8 bg-white">
	<div class="max-w-6xl mx-auto px-4">
		<div class="flex flex-col lg:flex-row gap-8">
			<!-- Main Content (Left) -->
			<div class="lg:w-2/3 mt-24">
				<!-- Article Header -->
				<div class="mb-8">
					<h1 class="text-3xl md:text-4xl font-bold text-[#0D7A3F] mb-4 leading-tight"><?= $news['judul']; ?></h1>

					<!-- Meta Info -->
					<div class="flex flex-wrap items-center gap-4 mb-6 text-gray-500">
						<div class="flex items-center">
							<i class="far fa-calendar-alt mr-2 text-sm"></i>
							<span class="text-sm"><?= date('l, d F Y', strtotime($news['created_at'])); ?></span>
						</div>
						<div class="flex items-center">
							<i class="far fa-user mr-2 text-sm"></i>
							<span class="text-sm"><?= $news['author'] ?? 'Admin'; ?></span>
						</div>
						<?php if (!empty($news['views'])): ?>
							<div class="flex items-center">
								<i class="far fa-eye mr-2 text-sm"></i>
								<span class="text-sm"><?= number_format($news['views']); ?>x dilihat</span>
							</div>
						<?php endif; ?>
					</div>

					<!-- Featured Image -->
					<?php if (!empty($news['gambar'])): ?>
						<div class="rounded-xl overflow-hidden mb-6 shadow-md">
							<img src="<?= base_url('uploads/news/' . $news['gambar']) ?>" alt="<?= $news['judul'] ?>" class="w-full h-auto max-h-96 object-cover">
						</div>
					<?php endif; ?>
				</div>

				<!-- Article Content -->
				<article class="prose max-w-none text-gray-700 mb-8">
					<?= $news['isi']; ?>
				</article>

				<!-- Tags -->
				<?php if (!empty($news['kategori'])): ?>
					<div class="flex flex-wrap gap-2 mb-8">
						<span class="inline-flex items-center bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm">
							<i class="fas fa-tag mr-1 text-[#0D7A3F]"></i> <?= $news['kategori']; ?>
						</span>
					</div>
				<?php endif; ?>
			</div>

			<!-- Sidebar (Right) -->
			<div class="lg:w-1/3 mt-24">
				<div class="sticky top-4">
					<!-- Related News -->
					<div class="bg-gray-50 p-6 rounded-xl shadow-sm border border-gray-100">
						<h3 class="text-xl font-bold text-[#0D7A3F] mb-6 pb-2 border-b border-gray-200">Berita Lainnya</h3>

						<div class="space-y-4">
							<?php foreach ($related_news as $related): ?>
								<a href="<?= base_url('berita/' . $related['slug']) ?>" class="group block">
									<div class="flex gap-3">
										<?php if (!empty($related['gambar'])): ?>
											<div class="flex-shrink-0 w-20 h-20 rounded-lg overflow-hidden">
												<img src="<?= base_url('uploads/news/' . $related['gambar']) ?>" alt="<?= $related['judul'] ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform">
											</div>
										<?php endif; ?>
										<div>
											<h4 class="font-medium text-gray-800 group-hover:text-[#0D7A3F] mb-1 line-clamp-2 leading-snug"><?= $related['judul'] ?></h4>
											<div class="text-xs text-gray-500">
												<?= date('d M Y', strtotime($related['created_at'])) ?>
											</div>
										</div>
									</div>
								</a>
							<?php endforeach; ?>
						</div>

						<a href="<?= base_url('berita') ?>" class="inline-flex items-center mt-6 text-[#0D7A3F] text-sm font-semibold hover:underline">
							Lihat Semua Berita <i class="fas fa-arrow-right ml-2"></i>
						</a>
					</div>

					<!-- Contact Info -->
					<div class="mt-6 bg-gray-50 p-6 rounded-xl shadow-sm border border-gray-100">
						<h3 class="text-xl font-bold text-[#0D7A3F] mb-4">Kontak Kelurahan</h3>
						<div class="space-y-3">
							<div class="flex items-start">
								<i class="fas fa-map-marker-alt text-[#0D7A3F] mt-1 mr-3"></i>
								<p class="text-gray-700 text-sm">Jl. Raya Procot No. 56, Slawi, Kab. Tegal</p>
							</div>
							<div class="flex items-start">
								<i class="fas fa-phone-alt text-[#0D7A3F] mt-1 mr-3"></i>
								<p class="text-gray-700 text-sm">(0283) 491234</p>
							</div>
							<div class="flex items-start">
								<i class="fas fa-envelope text-[#0D7A3F] mt-1 mr-3"></i>
								<p class="text-gray-700 text-sm">procot@slawi.go.id</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
