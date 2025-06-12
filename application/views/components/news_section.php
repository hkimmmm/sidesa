<?php
$latest_news = isset($latest_news) ? $latest_news : [];
$popular_news = isset($popular_news) ? $popular_news : [];
?>

<section id="news" class="max-w-4xl mx-auto border border-gray-200 rounded-lg p-4 sm:p-6 space-y-8 mt-16">
	<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4">
		<h2 class="text-base sm:text-lg font-bold text-gray-900">
			Berita Terkini
		</h2>
		<a href="<?= site_url('news') ?>"
			class="mt-3 sm:mt-0 inline-flex items-center bg-green-600 hover:bg-green-700 text-white text-xs font-medium px-4 py-1.5 rounded transition">
			Lihat Semua Berita
			<i class="fas fa-arrow-up-right ml-2"></i>
		</a>
	</div>

	<div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
		<?php foreach ($latest_news as $news): ?>
			<a href="<?= site_url('news/view/' . $news['slug']) ?>" class="relative rounded-lg overflow-hidden shadow hover:shadow-md transition">
				<img
					alt="<?= html_escape($news['judul']) ?>"
					class="w-full h-40 sm:h-44 object-cover"
					src="<?= base_url('uploads/news/' . $news['gambar']) ?>"
					width="600"
					height="300" />
				<div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-2.5">
					<h3 class="text-white font-medium text-sm leading-snug">
						<?= html_escape($news['judul']) ?>
					</h3>
					<p class="text-white text-xs mt-0.5 font-normal">
						<?= timespan(strtotime($news['created_at']), time()) ?> yang lalu
					</p>
				</div>
			</a>
		<?php endforeach; ?>

		<?php if (empty($latest_news)): ?>
			<div class="col-span-3 text-center py-8 text-gray-500">
				Tidak ada berita terkini
			</div>
		<?php endif; ?>
	</div>

	<div class="border border-gray-200 rounded-lg p-4 sm:p-6">
		<div class="flex items-center space-x-2 mb-4 text-gray-700 font-medium text-sm sm:text-base">
			<i class="fas fa-book-open text-green-600"></i>
			<span>Berita Populer</span>
		</div>
		<hr class="border-gray-300 mb-4" />
		<div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-gray-800 text-sm">
			<?php foreach ($popular_news as $index => $news): ?>
				<div class="flex space-x-3 items-start">
					<div class="w-6 h-6 flex items-center justify-center font-bold text-green-600 select-none text-sm">
						<?= $index + 1 ?>
					</div>
					<div>
						<h4 class="font-medium leading-snug text-sm">
							<a href="<?= site_url('news/view/' . $news['slug']) ?>" class="hover:text-green-600">
								<?= html_escape($news['judul']) ?>
							</a>
						</h4>
						<div class="flex flex-wrap gap-2 mt-1 text-gray-600 text-xs">
							<span><?= isset($news['view_count']) ? $news['view_count'] . ' Kunjungan' : '0 Kunjungan' ?></span>
							<span><?= date('D, d M Y', strtotime($news['created_at'])) ?></span>
						</div>
					</div>
				</div>
			<?php endforeach; ?>

			<?php if (empty($popular_news)): ?>
				<div class="col-span-3 text-center py-4 text-gray-500">
					Tidak ada berita populer
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>