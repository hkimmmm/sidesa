<?php
function slugify($text)
{
	$text = strtolower(trim($text));
	$text = preg_replace('/\s+/', '_', $text);
	$text = preg_replace('/[^a-z0-9_]/', '', $text);
	return $text;
}
$status_class = [
	'pending' => 'bg-yellow-200 text-yellow-800',
	'proses' => 'bg-blue-200 text-blue-800',
	'disetujui' => 'bg-green-200 text-green-800',
	'ditolak' => 'bg-red-200 text-red-800',
	'selesai' => 'bg-purple-200 text-purple-800'
];
?>
<div class="max-w-4xl mx-auto">
	<div class="bg-white rounded-lg shadow-md p-6 mb-6">
		<div class="flex justify-between items-start mb-6">
			<div>
				<h1 class="text-2xl font-bold text-gray-800">Detail Pengajuan</h1>
				<p class="text-gray-600">No. Pengajuan: <?= $pengajuan['no_pengajuan'] ?></p>
			</div>
			<span data-status="<?= ucfirst($pengajuan['status']) ?>" id="spanStatus"
				class="px-3 py-1 <?= $status_class[$pengajuan['status']] ?> rounded-full text-sm font-medium">
				<?= ucfirst($pengajuan['status']) ?>
			</span>
		</div>

		<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
			<div>
				<h3 class="text-lg font-medium text-gray-900 mb-2">Informasi Pengajuan</h3>
				<div class="space-y-2">
					<p><span class="font-medium text-gray-700">Jenis Surat:</span> <?= $pengajuan['nama_surat'] ?></p>
					<p><span class="font-medium text-gray-700">Keperluan:</span> <?= $pengajuan['keperluan'] ?></p>
					<p><span class="font-medium text-gray-700">Tanggal Pengajuan:</span>
						<?= date('d F Y, H:i', strtotime($pengajuan['created_at'])) ?></p>
					<?php if ($pengajuan['status'] == 'ditolak' && $pengajuan['catatan']): ?>
						<p><span class="font-medium text-gray-700">Alasan Penolakan:</span> <?= $pengajuan['catatan'] ?></p>
					<?php endif; ?>
				</div>
			</div>

			<div>
				<h3 class="text-lg font-medium text-gray-900 mb-2">Data Pemohon</h3>
				<div class="space-y-2">
					<p><span class="font-medium text-gray-700">Nama:</span> <?= $pengajuan['nama_lengkap'] ?></p>
					<p><span class="font-medium text-gray-700">NIK:</span> <?= $pengajuan['nik'] ?></p>
				</div>
			</div>
		</div>

		<h3 class="text-lg font-medium text-gray-900 mb-4">Dokumen Pendukung</h3>
		<?php if (empty($dokumen)): ?>
			<p class="text-gray-600">Tidak ada dokumen pendukung</p>
		<?php else: ?>
			<div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
				<?php foreach ($dokumen as $doc): ?>
					<div class="border rounded-lg p-3">
						<div class="flex items-center">
							<svg class="w-6 h-6 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
									d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z">
								</path>
							</svg>
							<span class="text-sm text-gray-700"><?= $doc['nama_dokumen'] ?></span>
						</div>
						<a href="<?= base_url($doc['file_path']) ?>" target="_blank"
							class="mt-2 inline-block text-sm text-blue-600 hover:text-blue-800">
							Lihat Dokumen
						</a>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<h3 class="text-lg font-medium text-gray-900 mb-4">Status Pengajuan</h3>
		<div class="relative pt-6">
			<div class="space-y-8">
				<?php foreach ($tracking as $track): ?>
					<?php
					$bg_color = '';
					$icon = '';

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
							<h3 id="h3Status" class="text-lg font-medium text-gray-900"><?= ucfirst($track['status']) ?>
							</h3>
							<p class="text-gray-600"><?= $track['keterangan'] ?></p>
							<p class="text-sm text-gray-500 mt-1"><?= date('d F Y, H:i', strtotime($track['created_at'])) ?>
							</p>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
			<div id="cetakUser" class="mt-5 hidden">

				<form id="formCetak" action="<?= base_url('cetak/cetak_surat') ?>" method="post" target="_blank">
					<input type="hidden" name="status" value="<?= $track['status'] ?>">
					<input type="hidden" name="jenis_surat" value="<?= htmlspecialchars($pengajuan['nama_surat']) ?>">
					<input type="hidden" name="nama" value="<?= htmlspecialchars($pengajuan['nama_lengkap']) ?>">
					<input type="hidden" name="nik" value="<?= htmlspecialchars($pengajuan['nik']) ?>">
					<input type="hidden" name="no_pengajuan"
						value="<?= htmlspecialchars($pengajuan['no_pengajuan']) ?>">
					<input type="hidden" name="ttl" value="<?= htmlspecialchars($pengajuan['ttl']) ?>">
					<input type="hidden" name="pekerjaan" value="<?= htmlspecialchars($pengajuan['pekerjaan']) ?>">

					<button type="submit"
						class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors inline-block">
						Cetak
					</button>
				</form>
			</div>
		</div>

		<div class="mt-8 pt-6 border-t border-gray-200">
			<h3 class="text-lg font-medium text-gray-900 mb-4">Update Status Pengajuan</h3>
			<?php echo form_open('pengajuan/update_status/' . $pengajuan['pengajuan_id']); ?>
			<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
				<div>
					<label class="block mb-2 text-sm font-medium text-gray-900">Status</label>
					<select name="status"
						class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
						required>
						<option value="proses" <?= $pengajuan['status'] == 'pending' ? 'selected' : '' ?>>Proses</option>
						<option value="disetujui" <?= $pengajuan['status'] == 'disetujui' ? 'selected' : '' ?>>Disetujui
						</option>
						<option value="ditolak" <?= $pengajuan['status'] == 'ditolak' ? 'selected' : '' ?>>Ditolak</option>
						<option value="selesai" <?= $pengajuan['status'] == 'selesai' ? 'selected' : '' ?>>Selesai</option>
					</select>
				</div>
				<div>
					<label class="block mb-2 text-sm font-medium text-gray-900">Catatan (Opsional)</label>
					<textarea name="catatan" rows="2"
						class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"><?= $pengajuan['catatan'] ?></textarea>
				</div>
			</div>
			<button type="submit"
				class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
				Update Status
			</button>
			<?php
			$jenis_surat = slugify($pengajuan['nama_surat']);
			$nama_pemohon = slugify($pengajuan['nama_lengkap']);
			$keperluan = slugify($pengajuan['keperluan']);
			?>

			<button onclick="formCetakSubmit()"
				class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors inline-block">
				Cetak
			</button>
		</div>

	</div>
</div>

<script>
	const statusTerkini = document.getElementById('spanStatus');
	const cetakUser = document.getElementById('cetakUser');
	if (statusTerkini.dataset.status == 'Selesai') {
		cetakUser.classList.remove('hidden');
	}

	function formCetakSubmit() {
		document.getElementById('formCetak').submit();
	}
</script>