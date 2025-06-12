<div class="max-w-4xl mx-auto">
	<div class="flex justify-between items-center mb-8">
		<h1 class="text-2xl font-bold text-gray-800">Status Pengajuan</h1>
		<a href="<?= site_url('pengajuan/add') ?>" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
			Buat Pengajuan Baru
		</a>
	</div>

	<?php if (empty($pengajuan)): ?>
		<div class="bg-white rounded-lg shadow-md p-6 text-center">
			<p class="text-gray-600">Anda belum memiliki pengajuan</p>
			<a href="<?= site_url('pengajuan/add') ?>" class="mt-4 inline-block px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
				Buat Pengajuan Baru
			</a>
		</div>
	<?php else: ?>
		<?php foreach ($pengajuan as $item): ?>
			<div class="bg-white rounded-lg shadow-md p-6 mb-6">
				<div class="flex justify-between items-start mb-4">
					<div>
						<h2 class="text-xl font-semibold text-gray-800"><?= $item['nama_surat'] ?></h2>
						<p class="text-gray-600">No. Pengajuan: <?= $item['no_pengajuan'] ?></p>
						<p class="text-gray-600">Keperluan: <?= $item['keperluan'] ?></p>
					</div>
					<?php
					$status_class = [
						'pending' => 'bg-yellow-100 text-yellow-800',
						'proses' => 'bg-blue-100 text-blue-800',
						'disetujui' => 'bg-green-100 text-green-800',
						'ditolak' => 'bg-red-100 text-red-800',
						'selesai' => 'bg-purple-100 text-purple-800'
					];
					?>
					<span class="px-3 py-1 <?= $status_class[$item['status']] ?> rounded-full text-sm font-medium">
						<?= ucfirst($item['status']) ?>
					</span>
				</div>

				<div class="relative pt-6">
					<div class="space-y-8">
						<?php
						$tracking = $this->Pengajuan_model->get_tracking($item['pengajuan_id']);
						foreach ($tracking as $track):
							$bg_color = '';
							$icon = '';
							$text_color = '';

							if ($track['status'] == 'pending') {
								$bg_color = 'bg-yellow-100';
								$icon = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>';
							} elseif ($track['status'] == 'proses') {
								$bg_color = 'bg-blue-100';
								$icon = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>';
							} elseif ($track['status'] == 'disetujui') {
								$bg_color = 'bg-green-100';
								$icon = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>';
							} elseif ($track['status'] == 'ditolak') {
								$bg_color = 'bg-red-100';
								$icon = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>';
							} elseif ($track['status'] == 'selesai') {
								$bg_color = 'bg-purple-100';
								$icon = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>';
							}
						?>
							<div class="flex items-start">
								<div class="flex-shrink-0">
									<div class="flex items-center justify-center w-8 h-8 rounded-full <?= $bg_color ?> text-white">
										<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
											<?= $icon ?>
										</svg>
									</div>
								</div>
								<div class="ml-4">
									<h3 class="text-lg font-medium text-gray-900"><?= ucfirst($track['status']) ?></h3>
									<p class="text-gray-600"><?= $track['keterangan'] ?></p>
									<p class="text-sm text-gray-500 mt-1"><?= date('d F Y, H:i', strtotime($track['created_at'])) ?></p>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>

				<div class="mt-6 flex justify-end">
					<a href="<?= site_url('pengajuan/detail/' . $item['pengajuan_id']) ?>" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
						Lihat Detail
					</a>
				</div>
			</div>
		<?php endforeach; ?>
	<?php endif; ?>
</div>
