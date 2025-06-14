<div class="max-w-6xl mx-auto">
	<div class="flex justify-between items-center mb-8">
		<h1 class="text-2xl font-bold text-gray-800">Daftar Pengajuan</h1>
		<div class="flex space-x-2">
			<a href="<?= site_url('pengajuan') ?>"
				class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">
				Tampilan User
			</a>
		</div>
	</div>

	<div class="mb-6 bg-white rounded-lg shadow-md p-4">
		<form method="get" action="<?= site_url('pengajuan/admin') ?>"
			class="flex flex-col md:flex-row md:items-center space-y-2 md:space-y-0 md:space-x-4">
			<div class="flex-1">
				<label for="search" class="sr-only">Search</label>
				<div class="relative">
					<div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
						<svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
							<path fill-rule="evenodd"
								d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
								clip-rule="evenodd"></path>
						</svg>
					</div>
					<input type="text" name="search" id="search"
						class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
						placeholder="Cari no. pengajuan atau nama pemohon">
				</div>
			</div>
			<div>
				<label for="status" class="sr-only">Status</label>
				<select id="status" name="status"
					class="block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-lg">
					<option value="">Semua Status</option>
					<option value="pending" <?= $status == 'pending' ? 'selected' : '' ?>>Pending</option>
					<option value="proses" <?= $status == 'proses' ? 'selected' : '' ?>>Proses</option>
					<option value="disetujui" <?= $status == 'disetujui' ? 'selected' : '' ?>>Disetujui</option>
					<option value="ditolak" <?= $status == 'ditolak' ? 'selected' : '' ?>>Ditolak</option>
					<option value="selesai" <?= $status == 'selesai' ? 'selected' : '' ?>>Selesai</option>
				</select>
			</div>
			<div>
				<label for="jenis_surat" class="sr-only">Jenis Surat</label>
				<select id="jenis_surat" name="jenis_surat"
					class="block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-lg">
					<option value="">Semua Jenis Surat</option>
					<?php foreach ($jenis_surat as $js): ?>
						<option value="<?= $js->id ?>" <?= $jenis_surat_id == $js->id ? 'selected' : '' ?>>
							<?= $js->nama_surat ?>
						</option>
					<?php endforeach; ?>
				</select>
			</div>
			<div>
				<label for="tanggal" class="sr-only">Tanggal</label>
				<input type="text" name="tanggal" id="tanggal"
					class="block w-full pl-3 pr-3 py-2 border border-gray-300 rounded-lg leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
					placeholder="Pilih rentang tanggal" value="<?= $tanggal ?? '' ?>">
			</div>
			<button type="submit"
				class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
				Filter
			</button>
		</form>
	</div>

	<?php if (empty($pengajuan)): ?>
		<div class="bg-white rounded-lg shadow-md p-6 text-center">
			<p class="text-gray-600">Tidak ada data pengajuan</p>
		</div>
	<?php else: ?>
		<div class="bg-white rounded-lg shadow-md overflow-hidden">
			<div class="overflow-x-auto">
				<table class="min-w-full divide-y divide-gray-200">
					<thead class="bg-gray-50">
						<tr>
							<th scope="col"
								class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No.
								Pengajuan</th>
							<th scope="col"
								class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis
								Surat</th>
							<th scope="col"
								class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
								Pemohon</th>
							<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Dokumen</th>
							<th scope="col"
								class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
								Tanggal</th>
							<th scope="col"
								class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
								Status</th>
							<th scope="col"
								class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi
							</th>
						</tr>
					</thead>
					<tbody class="bg-white divide-y divide-gray-200">
						<?php foreach ($pengajuan as $item): ?>
							<tr>
								<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
									<?= $item['no_pengajuan'] ?>
								</td>
								<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= $item['nama_surat'] ?></td>
								<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= $item['nama_pemohon'] ?></td>
								<td class="px-6 py-4 text-sm text-gray-500">
									<?php if (!empty($item['dokumen'])): ?>
										<a href="<?= base_url('uploads/' . $item['dokumen']) ?>" target="_blank"
											class="text-blue-600 hover:text-blue-800 underline">
											Lihat Dokumen
										</a>
									<?php else: ?>
										<span class="text-gray-400">Tidak ada dokumen</span>
									<?php endif; ?>
								</td>
								<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
									<?= date('d M Y', strtotime($item['created_at'])) ?>
								</td>
								<td class="px-6 py-4 whitespace-nowrap">
									<?php
									$status_class = [
										'pending' => 'bg-yellow-100 text-yellow-800',
										'proses' => 'bg-blue-100 text-blue-800',
										'disetujui' => 'bg-green-100 text-green-800',
										'ditolak' => 'bg-red-100 text-red-800',
										'selesai' => 'bg-purple-100 text-purple-800'
									];
									?>
									<span
										class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full <?= $status_class[$item['status']] ?>">
										<?= ucfirst($item['status']) ?>
									</span>
								</td>
								<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
									<div class="flex justify-end space-x-2">
										<?php if ($item['status'] == 'pending' || $item['status'] == 'proses'): ?>
											<form method="post"
												action="<?= site_url('pengajuan/update_status/' . $item['pengajuan_id']) ?>">
												<input type="hidden" name="status" value="disetujui">
												<button type="submit"
													class="px-3 py-1 bg-green-600 text-white rounded-md hover:bg-green-700 transition-colors text-sm">
													Disetujui
												</button>
											</form>
											<form method="post"
												action="<?= site_url('pengajuan/update_status/' . $item['pengajuan_id']) ?>">
												<input type="hidden" name="status" value="ditolak">
												<button type="submit"
													class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700 transition-colors text-sm">
													Ditolak
												</button>
											</form>
										<?php endif; ?>
									</div>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	<?php endif; ?>
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<!-- JS Flatpickr -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
	document.addEventListener('DOMContentLoaded', function () {
		flatpickr('#tanggal', {
			mode: 'range',
			dateFormat: 'Y-m-d',
			altInput: true,
			altFormat: 'F j, Y',
			allowInput: false
		});
	});
</script>
