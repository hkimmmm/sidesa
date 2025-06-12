<section id="quick" class="bg-white rounded-lg p-7 w-full max-w-[370px] shadow-lg">
	<div class="mb-3 text-lg font-bold text-gray-900">Akses Cepat</div>
	<div class="mb-6 text-base font-normal text-gray-600">Dapatkan kemudahan akses yang disoroti</div>

	<div class="space-y-5">
		<?php
		$quick_links = [
			[
				'icon' => 'fa-user-friends',
				'text' => 'Kependudukan',
				'url' => '#'
			],
			[
				'icon' => 'fa-hands-helping',
				'text' => 'Sosial',
				'url' => '#'
			],
			[
				'icon' => 'fa-plus',
				'text' => 'Kesehatan',
				'url' => '#'
			]
		];

		foreach ($quick_links as $link):
		?>
			<a class="flex items-center justify-between border-2 border-gray-200 rounded-xl px-5 py-4 hover:shadow-lg transition-all duration-200" href="<?= $link['url'] ?>">
				<div class="flex items-center space-x-5">
					<div class="w-11 h-11 rounded-full bg-[#0D7A3F] flex items-center justify-center text-white text-base">
						<i class="fas <?= $link['icon'] ?>"></i>
					</div>
					<span class="text-base font-semibold text-gray-900"><?= $link['text'] ?></span>
				</div>
				<i class="fas fa-arrow-up-right-from-square text-[#0D7A3F] text-base"></i>
			</a>
		<?php endforeach; ?>
	</div>
</section>
