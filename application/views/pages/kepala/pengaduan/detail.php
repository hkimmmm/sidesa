<?php
function slugify($text)
{
	$text = strtolower(trim($text));
	$text = preg_replace('/\s+/', '_', $text);
	$text = preg_replace('/[^a-z0-9_]/', '', $text);
	return $text;
}
$status_class = [
	'proses' => 'bg-blue-200 text-blue-800',
	'diterima' => 'bg-green-200 text-green-800',
	'ditolak' => 'bg-red-200 text-red-800',
	'selesai' => 'bg-purple-200 text-purple-800'
];
?>
<div class="max-w-4xl mx-auto">
	<div class="mb-6">
		<a href="<?php echo base_url('kepala/pengaduan'); ?>"
			class="inline-flex items-center text-blue-600 hover:text-blue-800">
			<svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
				</path>
			</svg>
			Kembali ke Daftar Pengaduan
		</a>
	</div>

	<div class="bg-white rounded-lg shadow-md p-6 mb-6">
		<div class="flex justify-between items-start mb-6">
			<div>
				<h1 class="text-2xl font-bold text-gray-800">Detail Pengaduan</h1>
				<p class="text-gray-600">No. Pengaduan: <?= $pengaduan->kode_pengaduan ?></p>
			</div>
			<span class="px-3 py-1 <?= $status_class[$pengaduan->status] ?> rounded-full text-sm font-medium">
				<?= ucfirst($pengaduan->status) ?>
			</span>
		</div>

		<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
			<div>
				<h3 class="text-lg font-medium text-gray-900 mb-2">Informasi Pengaduan</h3>
				<div class="space-y-2">
					<p><span class="font-medium text-gray-700">Judul:</span> <?= $pengaduan->judul ?></p>
					<p><span class="font-medium text-gray-700">Jenis:</span> <?= ucfirst($pengaduan->jenis_pengaduan) ?>
					</p>
					<p><span class="font-medium text-gray-700">Prioritas:</span> <?= ucfirst($pengaduan->prioritas) ?>
					</p>
					<p><span class="font-medium text-gray-700">Tanggal Pengaduan:</span>
						<?= date('d F Y, H:i', strtotime($pengaduan->tanggal_pengaduan)) ?></p>
					<?php if ($pengaduan->status == 'ditolak' && $pengaduan->alasan_ditolak): ?>
						<p><span class="font-medium text-gray-700">Alasan Penolakan:</span>
							<?= $pengaduan->alasan_ditolak ?></p>
					<?php endif; ?>
				</div>
			</div>

			<div>
				<h3 class="text-lg font-medium text-gray-900 mb-2">Detail Kejadian</h3>
				<div class="space-y-2">
					<p><span class="font-medium text-gray-700">Lokasi:</span> <?= $pengaduan->lokasi ?></p>
					<p><span class="font-medium text-gray-700">Tanggal Kejadian:</span>
						<?= date('d F Y', strtotime($pengaduan->tanggal_kejadian)) ?></p>
				</div>
			</div>
		</div>

		<div class="mb-6">
			<h3 class="text-lg font-medium text-gray-900 mb-2">Deskripsi Pengaduan</h3>
			<p class="text-gray-700"><?= nl2br($pengaduan->deskripsi) ?></p>
		</div>

		<?php if (!empty($pengaduan->lampiran)): ?>
			<h3 class="text-lg font-medium text-gray-900 mb-4">Lampiran</h3>
			<div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
				<?php foreach ($pengaduan->lampiran as $lampiran): ?>
					<div class="border rounded-lg p-3">
						<div class="flex items-center">
							<?php if (strpos($lampiran->tipe_file, 'image') !== false): ?>
								<svg class="w-6 h-6 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
										d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
									</path>
								</svg>
							<?php elseif ($lampiran->tipe_file == 'application/pdf'): ?>
								<svg class="w-6 h-6 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
										d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z">
									</path>
								</svg>
							<?php else: ?>
								<svg class="w-6 h-6 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
										d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
									</path>
								</svg>
							<?php endif; ?>
							<span class="text-sm text-gray-700"><?= $lampiran->nama_file ?></span>
						</div>
						<a href="<?= base_url($lampiran->path) ?>" target="_blank"
							class="mt-2 inline-block text-sm text-blue-600 hover:text-blue-800">
							Lihat Lampiran
						</a>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<h3 class="text-lg font-medium text-gray-900 mb-4">Progres Pengaduan</h3>
		<div class="relative pt-6">
			<div class="space-y-8">
				<?php foreach ($pengaduan->progress as $progress): ?>
					<?php
					$bg_color = '';
					$icon = '';

					if ($progress->status == 'diterima') {
						$bg_color = 'bg-green-100';
						$icon = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>';
					} elseif ($progress->status == 'verifikasi' || $progress->status == 'penanganan') {
						$bg_color = 'bg-blue-100';
						$icon = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>';
					} elseif ($progress->status == 'ditolak') {
						$bg_color = 'bg-red-100';
						$icon = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>';
					} elseif ($progress->status == 'selesai') {
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
							<h3 class="text-lg font-medium text-gray-900">
								<?= ucfirst($progress->status) ?>
								<?= ($progress->status == 'diterima') ? ' Pengaduan' : '' ?>
								<?= ($progress->status == 'verifikasi') ? ' oleh Petugas' : '' ?>
								<?= ($progress->status == 'penanganan') ? ' Masalah' : '' ?>
							</h3>
							<?php if ($progress->keterangan): ?>
								<p class="text-gray-600"><?= $progress->keterangan ?></p>
							<?php endif; ?>
							<p class="text-sm text-gray-500 mt-1">
								<?= date('d F Y, H:i', strtotime($progress->tanggal)) ?>
							</p>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>

	<div class="bg-white rounded-lg shadow-md p-6">
		<h3 class="text-lg font-medium text-gray-900 mb-4">Update Status Pengaduan</h3>
		<?php echo form_open('pengaduan/update_status/' . $pengaduan->id); ?>
		<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
			<div>
				<label class="block mb-2 text-sm font-medium text-gray-900">Status</label>
				<select name="status" id="statusSelect"
					class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
					required>
					<option value="proses" <?= $pengaduan->status == 'proses' ? 'selected' : '' ?>>Proses</option>
					<option value="diterima" <?= $pengaduan->status == 'diterima' ? 'selected' : '' ?>>Diterima</option>
					<option value="ditolak" <?= $pengaduan->status == 'ditolak' ? 'selected' : '' ?>>Ditolak</option>
					<option value="selesai" <?= $pengaduan->status == 'selesai' ? 'selected' : '' ?>>Selesai</option>
				</select>
			</div>
			<div id="alasanDitolakContainer" style="display: none;">
				<label class="block mb-2 text-sm font-medium text-gray-900">Alasan Ditolak</label>
				<textarea name="alasan_ditolak" rows="2"
					class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"><?= isset($pengaduan->alasan_ditolak) ? $pengaduan->alasan_ditolak : '' ?></textarea>
			</div>
		</div>
		<button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
			Update Status
		</button>
		<?php echo form_close(); ?>
	</div>
</div>

<script>
	document.addEventListener('DOMContentLoaded', function () {
		const statusSelect = document.getElementById('statusSelect');
		const alasanDitolakContainer = document.getElementById('alasanDitolakContainer');

		function toggleAlasanDitolak() {
			if (statusSelect.value === 'ditolak') {
				alasanDitolakContainer.style.display = 'block';
			} else {
				alasanDitolakContainer.style.display = 'none';
			}
		}
		toggleAlasanDitolak();

		statusSelect.addEventListener('change', toggleAlasanDitolak);
	});
</script>