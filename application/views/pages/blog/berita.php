<section class="py-12 bg-gray-50">
	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
		<div class="flex flex-col md:flex-row gap-8">
			<!-- Main News Content -->
			<div class="md:w-2/3 mt-20">
				<!-- Latest News Section -->
				<div class="grid gap-8 mb-8">
					<?php if (!empty($get_latest)): ?>
						<?php foreach ($get_latest as $index => $list): ?>
							<!-- Jika index 0, tampilkan sebagai Featured -->
							<?php if ($index === 0): ?>
								<div class="bg-white rounded-lg shadow-md overflow-hidden">
									<img src="<?= base_url('uploads/news/' . $list['gambar']); ?>" alt="<?= $list['judul']; ?>"
										class="w-full h-64 object-cover">
									<div class="p-6">
										<div class="flex items-center text-sm text-gray-500 mb-2">
											<span class="bg-[#0D7A3F] text-white px-2 py-1 rounded mr-3">TERBARU</span>
											<span><i class="far fa-calendar-alt mr-1"></i>
												<?= date('d F Y', strtotime($list['created_at'])); ?></span>
										</div>
										<h3 class="text-xl font-bold text-gray-800 mb-3"><?= $list['judul']; ?></h3>
										<p class="text-gray-600 mb-4"><?= character_limiter(strip_tags($list['isi']), 150); ?></p>
										<a href="<?= base_url('news/view/' . $list['slug']); ?>"
											class="text-[#0D7A3F] font-semibold hover:underline flex items-center">
											Baca Selengkapnya <i class="fas fa-arrow-right ml-2 text-sm"></i>
										</a>
									</div>
								</div>
								<!-- Grid untuk berita lainnya -->
								<div class="grid md:grid-cols-2 gap-6">
								<?php else: ?>
									<div class="bg-white rounded-lg shadow-md overflow-hidden">
										<img src="<?= base_url('uploads/news/' . $list['gambar']); ?>" alt="<?= $list['judul']; ?>"
											class="w-full h-48 object-cover">
										<div class="p-4">
											<div class="text-xs text-gray-500 mb-2"><i class="far fa-calendar-alt mr-1"></i>
												<?= date('d F Y', strtotime($list['created_at'])); ?></div>
											<h4 class="font-bold text-gray-800 mb-2"><?= $list['judul']; ?></h4>
											<p class="text-sm text-gray-600 mb-3">
												<?= character_limiter(strip_tags($list['isi']), 100); ?>
											</p>
											<a href="<?= base_url('news/view/' . $list['slug']); ?>"
												class="text-[#0D7A3F] text-sm font-semibold hover:underline">
												Baca Selengkapnya
											</a>
										</div>
									</div>
								<?php endif; ?>
							<?php endforeach; ?>
						</div> <!-- penutup grid md:grid-cols-2 -->
					<?php else: ?>
						<p class="text-gray-600">Belum ada berita tersedia.</p>
					<?php endif; ?>
				</div>

				<!-- Popular News Section -->
				<div class="mb-8">
					<h2 class="text-2xl font-bold text-[#0D7A3F] border-b-2 border-[#0D7A3F] pb-2 mb-6">Berita Populer
					</h2>
					<div class="grid md:grid-cols-3 gap-6">
						<!-- Popular News 1 -->
						<div class="bg-white rounded-lg shadow-md overflow-hidden">
							<div class="relative">
								<img src="<?= base_url('assets/images/news/popular1.jpg') ?>" alt="Popular News 1"
									class="w-full h-40 object-cover">
								<span
									class="absolute top-2 left-2 bg-red-500 text-white text-xs px-2 py-1 rounded">POPULER</span>
							</div>
							<div class="p-4">
								<div class="text-xs text-gray-500 mb-1"><i class="far fa-calendar-alt mr-1"></i> 1 Juni
									2023</div>
								<h4 class="font-bold text-gray-800 mb-2">Festival Kuliner Procot 2023</h4>
								<a href="#" class="text-[#0D7A3F] text-sm font-semibold hover:underline">Baca
									Selengkapnya</a>
							</div>
						</div>

						<!-- Popular News 2 -->
						<div class="bg-white rounded-lg shadow-md overflow-hidden">
							<div class="relative">
								<img src="<?= base_url('assets/images/news/popular2.jpg') ?>" alt="Popular News 2"
									class="w-full h-40 object-cover">
								<span
									class="absolute top-2 left-2 bg-red-500 text-white text-xs px-2 py-1 rounded">POPULER</span>
							</div>
							<div class="p-4">
								<div class="text-xs text-gray-500 mb-1"><i class="far fa-calendar-alt mr-1"></i> 25 Mei
									2023</div>
								<h4 class="font-bold text-gray-800 mb-2">Pelatihan UMKM Gratis</h4>
								<a href="#" class="text-[#0D7A3F] text-sm font-semibold hover:underline">Baca
									Selengkapnya</a>
							</div>
						</div>

						<!-- Popular News 3 -->
						<div class="bg-white rounded-lg shadow-md overflow-hidden">
							<div class="relative">
								<img src="<?= base_url('assets/images/news/popular3.jpg') ?>" alt="Popular News 3"
									class="w-full h-40 object-cover">
								<span
									class="absolute top-2 left-2 bg-red-500 text-white text-xs px-2 py-1 rounded">POPULER</span>
							</div>
							<div class="p-4">
								<div class="text-xs text-gray-500 mb-1"><i class="far fa-calendar-alt mr-1"></i> 18 Mei
									2023</div>
								<h4 class="font-bold text-gray-800 mb-2">Gotong Royong Bersih Desa</h4>
								<a href="#" class="text-[#0D7A3F] text-sm font-semibold hover:underline">Baca
									Selengkapnya</a>
							</div>
						</div>
					</div>
				</div>

				<!-- News Categories -->
				<div class="flex flex-wrap gap-2 mb-8">
					<a href="#" class="bg-[#0D7A3F] text-white px-4 py-2 rounded-full text-sm">Semua Berita</a>
					<a href="#"
						class="bg-white border border-[#0D7A3F] text-[#0D7A3F] px-4 py-2 rounded-full text-sm">Pemerintahan</a>
					<a href="#"
						class="bg-white border border-[#0D7A3F] text-[#0D7A3F] px-4 py-2 rounded-full text-sm">Pembangunan</a>
					<a href="#"
						class="bg-white border border-[#0D7A3F] text-[#0D7A3F] px-4 py-2 rounded-full text-sm">Kegiatan</a>
					<a href="#"
						class="bg-white border border-[#0D7A3F] text-[#0D7A3F] px-4 py-2 rounded-full text-sm">Pengumuman</a>
				</div>
			</div>

			<!-- News Sidebar -->
			<div class="md:w-1/3 mt-20">
				<div class="bg-white p-6 rounded-lg shadow-md sticky top-6">
					<h3 class="text-xl font-bold text-[#0D7A3F] border-b-2 border-[#0D7A3F] pb-2 mb-4">Berita Terkini
					</h3>

					<!-- Recent News List -->
					<div class="space-y-4">
						<!-- News Item 1 -->
						<div class="flex gap-3 pb-3 border-b border-gray-100">
							<img src="<?= base_url('assets/images/news/side1.jpg') ?>" alt="Side News 1"
								class="w-20 h-16 object-cover rounded">
							<div>
								<div class="text-xs text-gray-500 mb-1">14 Juni 2023</div>
								<a href="#" class="text-sm font-medium text-gray-800 hover:text-[#0D7A3F]">Rapat
									Koordinasi RT/RW</a>
							</div>
						</div>

						<!-- News Item 2 -->
						<div class="flex gap-3 pb-3 border-b border-gray-100">
							<img src="<?= base_url('assets/images/news/side2.jpg') ?>" alt="Side News 2"
								class="w-20 h-16 object-cover rounded">
							<div>
								<div class="text-xs text-gray-500 mb-1">10 Juni 2023</div>
								<a href="#" class="text-sm font-medium text-gray-800 hover:text-[#0D7A3F]">Pendaftaran
									Bantuan Sosial</a>
							</div>
						</div>

						<!-- News Item 3 -->
						<div class="flex gap-3 pb-3 border-b border-gray-100">
							<img src="<?= base_url('assets/images/news/side3.jpg') ?>" alt="Side News 3"
								class="w-20 h-16 object-cover rounded">
							<div>
								<div class="text-xs text-gray-500 mb-1">5 Juni 2023</div>
								<a href="#" class="text-sm font-medium text-gray-800 hover:text-[#0D7A3F]">Jadwal
									Perbaikan Jalan</a>
							</div>
						</div>

						<!-- News Item 4 -->
						<div class="flex gap-3 pb-3 border-b border-gray-100">
							<img src="<?= base_url('assets/images/news/side4.jpg') ?>" alt="Side News 4"
								class="w-20 h-16 object-cover rounded">
							<div>
								<div class="text-xs text-gray-500 mb-1">2 Juni 2023</div>
								<a href="#" class="text-sm font-medium text-gray-800 hover:text-[#0D7A3F]">Pelaksanaan
									Vaksinasi</a>
							</div>
						</div>

						<!-- News Item 5 -->
						<div class="flex gap-3">
							<img src="<?= base_url('assets/images/news/side5.jpg') ?>" alt="Side News 5"
								class="w-20 h-16 object-cover rounded">
							<div>
								<div class="text-xs text-gray-500 mb-1">28 Mei 2023</div>
								<a href="#" class="text-sm font-medium text-gray-800 hover:text-[#0D7A3F]">Lomba 17-an
									Tingkat Kelurahan</a>
							</div>
						</div>
					</div>

					<!-- Newsletter Subscription -->
					<div class="mt-8 p-4 bg-gray-50 rounded-lg">
						<h4 class="font-bold text-gray-800 mb-3">Berlangganan Berita</h4>
						<p class="text-sm text-gray-600 mb-3">Dapatkan update berita terbaru langsung ke email Anda</p>
						<form class="space-y-3">
							<input type="email" placeholder="Alamat Email"
								class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-[#0D7A3F]">
							<button type="submit"
								class="w-full bg-[#0D7A3F] text-white py-2 rounded hover:bg-[#0a6935] transition">Berlangganan</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
