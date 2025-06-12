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
		<a href="<?php echo base_url('pengaduan'); ?>"
			class="inline-flex items-center text-blue-600 hover:text-blue-800">
			<svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
				</path>
			</svg>
			Kembali ke Daftar Pengaduan
		</a>
	</div>

	<div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
		<div class="p-5 border-b border-gray-200">
			<div class="flex justify-between items-start">
				<div>
					<div class="flex items-center">
						<?php if ($pengaduan->status == 'diterima'): ?>
							<span
								class="px-2 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded mr-2">Diterima</span>
						<?php elseif ($pengaduan->status == 'proses'): ?>
							<span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs font-medium rounded mr-2">Dalam
								Proses</span>
						<?php elseif ($pengaduan->status == 'selesai'): ?>
							<span
								class="px-2 py-1 bg-green-100 text-green-800 text-xs font-medium rounded mr-2">Selesai</span>
						<?php elseif ($pengaduan->status == 'ditolak'): ?>
							<span class="px-2 py-1 bg-red-100 text-red-800 text-xs font-medium rounded mr-2">Ditolak</span>
						<?php endif; ?>
						<span class="text-xs text-gray-500"><?php echo $pengaduan->kode_pengaduan; ?></span>
					</div>
					<h1 class="text-xl font-bold text-gray-800 mt-1"><?php echo $pengaduan->judul; ?></h1>
					<p class="text-sm text-gray-600 mt-1">
						<?php echo ucfirst($pengaduan->jenis_pengaduan); ?> -
						Prioritas: <?php echo ucfirst($pengaduan->prioritas); ?>
					</p>
				</div>
				<span class="text-xs text-gray-500">Dikirim:
					<?php echo date('d M Y H:i', strtotime($pengaduan->tanggal_pengaduan)); ?></span>
			</div>
		</div>

		<div class="p-5">
			<div class="mb-6">
				<h2 class="text-lg font-semibold text-gray-900 mb-2">Deskripsi Pengaduan</h2>
				<p class="text-gray-700"><?php echo nl2br($pengaduan->deskripsi); ?></p>
			</div>

			<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
				<div>
					<h2 class="text-lg font-semibold text-gray-900 mb-2">Lokasi Kejadian</h2>
					<div class="flex items-center text-gray-700">
						<svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
							<path fill-rule="evenodd"
								d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
								clip-rule="evenodd"></path>
						</svg>
						<span><?php echo $pengaduan->lokasi; ?></span>
					</div>
				</div>

				<div>
					<h2 class="text-lg font-semibold text-gray-900 mb-2">Tanggal Kejadian</h2>
					<p class="text-gray-700"><?php echo date('d M Y', strtotime($pengaduan->tanggal_kejadian)); ?></p>
				</div>
			</div>

			<?php if (!empty($pengaduan->lampiran)): ?>
				<div class="mb-6">
					<h2 class="text-lg font-semibold text-gray-900 mb-2">Lampiran</h2>
					<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
						<?php foreach ($pengaduan->lampiran as $lampiran): ?>
							<div class="border rounded-lg p-3 flex items-center">
								<?php if (strpos($lampiran->tipe_file, 'image') !== false): ?>
									<svg class="w-8 h-8 text-blue-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
											d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
										</path>
									</svg>
								<?php elseif ($lampiran->tipe_file == 'application/pdf'): ?>
									<svg class="w-8 h-8 text-red-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
											d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z">
										</path>
									</svg>
								<?php else: ?>
									<svg class="w-8 h-8 text-gray-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
											d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
										</path>
									</svg>
								<?php endif; ?>

								<div class="flex-1 min-w-0">
									<p class="text-sm font-medium text-gray-900 truncate"><?php echo $lampiran->nama_file; ?>
									</p>
									<p class="text-xs text-gray-500"><?php echo round($lampiran->ukuran / 1024, 2); ?> KB</p>
								</div>

								<a href="<?php echo base_url($lampiran->path); ?>" target="_blank"
									class="ml-3 text-blue-600 hover:text-blue-800">
									<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
											d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
											d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
										</path>
									</svg>
								</a>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			<?php endif; ?>

			<div class="mb-6">
				<h2 class="text-lg font-semibold text-gray-900 mb-4">Progres Pengaduan</h2>

				<div class="relative pt-4">
					<div class="absolute left-4 top-0 h-full w-0.5 bg-gray-200" style="height: calc(100% - 1rem);">
					</div>

					<div class="space-y-6">
						<?php foreach ($pengaduan->progress as $progress): ?>
							<div class="flex items-start">
								<div class="flex-shrink-0">
									<div class="flex items-center justify-center w-8 h-8 rounded-full 
										<?php echo $progress->status == 'diterima' ? 'bg-green-500' : ''; ?>
										<?php echo $progress->status == 'verifikasi' ? 'bg-blue-500' : ''; ?>
										<?php echo $progress->status == 'penanganan' ? 'bg-blue-500' : ''; ?>
										<?php echo $progress->status == 'selesai' ? 'bg-green-500' : ''; ?>
										<?php echo $progress->status == 'ditolak' ? 'bg-red-500' : ''; ?>
										text-white">
										<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
											<?php if ($progress->status == 'ditolak'): ?>
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
													d="M6 18L18 6M6 6l12 12"></path>
											<?php elseif ($progress->status == 'selesai' || $progress->status == 'diterima'): ?>
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
													d="M5 13l4 4L19 7"></path>
											<?php else: ?>
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
													d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
											<?php endif; ?>
										</svg>
									</div>
								</div>
								<div class="ml-4">
									<h3 class="text-sm font-medium text-gray-900">
										<?php
										echo ucfirst($progress->status);
										if ($progress->status == 'diterima')
											echo ' Pengaduan';
										if ($progress->status == 'verifikasi')
											echo ' oleh Petugas';
										if ($progress->status == 'penanganan')
											echo ' Masalah';
										?>
									</h3>
									<?php if ($progress->keterangan): ?>
										<p class="text-sm text-gray-500"><?php echo $progress->keterangan; ?></p>
									<?php endif; ?>
									<p class="text-xs text-gray-400 mt-1">
										<?php echo date('d M Y H:i', strtotime($progress->tanggal)); ?>
									</p>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>

			<?php if ($pengaduan->status == 'ditolak'): ?>
				<div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6">
					<div class="flex">
						<div class="flex-shrink-0">
							<svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
								<path fill-rule="evenodd"
									d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
									clip-rule="evenodd"></path>
							</svg>
						</div>
						<div class="ml-3">
							<h3 class="text-sm font-medium text-red-800">Alasan Penolakan</h3>
							<div class="mt-2 text-sm text-red-700">
								<p><?php echo $pengaduan->alasan_ditolak; ?></p>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>

			<div class="flex justify-end space-x-3 pt-4 border-t border-gray-200">
				<?php if ($pengaduan->status == 'diterima'): ?>
					<a href="<?php echo base_url('pengaduan/edit/' . $pengaduan->id); ?>"
						class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition-colors">
						Edit Pengaduan
					</a>
					<a href="<?php echo base_url('pengaduan/delete/' . $pengaduan->id); ?>"
						class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors"
						onclick="return confirm('Apakah Anda yakin ingin menghapus pengaduan ini?')">
						Hapus Pengaduan
					</a>
				<?php elseif ($pengaduan->status == 'ditolak'): ?>
					<a href="<?php echo base_url('pengaduan/ajukan_kembali/' . $pengaduan->id); ?>"
						class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
						Ajukan Kembali
					</a>
				<?php elseif ($pengaduan->status == 'selesai'): ?>
					<button class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
						Beri Rating & Ulasan
					</button>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<!-- Status Update Form -->
	<div class="mt-8 pt-6 border-t border-gray-200">
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