<div class="container mx-auto px-4">
	<h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-6">Dashboard Kepala Desa</h1>

	<!-- Stats Cards -->
	<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
		<!-- Anggaran Desa -->
		<div class="bg-white p-6 rounded-lg shadow">
			<div class="flex items-center justify-between">
				<div>
					<p class="text-gray-500 text-sm">Anggaran Desa</p>
					<h3 class="text-2xl font-bold text-gray-800">Rp 1,2M</h3>
				</div>
				<div class="p-3 rounded-full bg-green-100 text-green-600">
					<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
						<path
							d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z">
						</path>
						<path fill-rule="evenodd"
							d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z"
							clip-rule="evenodd"></path>
					</svg>
				</div>
			</div>
			<p class="text-green-500 text-sm mt-2">67% terealisasi</p>
		</div>

		<!-- Pengajuan Menunggu -->
<div class="bg-white p-6 rounded-lg shadow">
    <div class="flex items-center justify-between">
        <div>
            <p class="text-gray-500 text-sm">Pengajuan Menunggu</p>
            <h3 class="text-2xl font-bold text-gray-800"><?= $total_pengajuan_belum_disetujui ?: '0' ?></h3>
        </div>
        <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                    clip-rule="evenodd"></path>
            </svg>
        </div>
    </div>
    <p class="text-yellow-500 text-sm mt-2">Perlu persetujuan</p>
</div>
		<!-- Pengaduan Prioritas -->
		<div class="bg-white p-6 rounded-lg shadow">
			<div class="flex items-center justify-between">
				<div>
					<p class="text-gray-500 text-sm">Pengaduan Belum Disetujui</p>
					<h3 class="text-2xl font-bold text-gray-800"><?= $total_pengaduan_belum_disetujui ?></h3>
				</div>
				<div class="p-3 rounded-full bg-gray-100 text-gray-600">
					<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
						<path fill-rule="evenodd"
							d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
							clip-rule="evenodd"></path>
					</svg>
				</div>
			</div>
			<p class="text-gray-500 text-sm mt-2">Menunggu persetujuan</p>
		</div>

		<!-- Proyek Desa -->
		<div class="bg-white p-6 rounded-lg shadow">
			<div class="flex items-center justify-between">
				<div>
					<p class="text-gray-500 text-sm">Proyek Desa</p>
					<h3 class="text-2xl font-bold text-gray-800">5</h3>
				</div>
				<div class="p-3 rounded-full bg-blue-100 text-blue-600">
					<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
						<path fill-rule="evenodd"
							d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z"
							clip-rule="evenodd"></path>
						<path
							d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z">
						</path>
					</svg>
				</div>
			</div>
			<p class="text-blue-500 text-sm mt-2">2 sedang berjalan</p>
		</div>
	</div>

	<!-- Charts and Priority Section -->
	<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
		<div class="bg-white p-6 rounded-lg shadow lg:col-span-2">
			<div class="flex items-center justify-between mb-4">
				<h2 class="text-lg font-semibold text-gray-800">Statistik Pengajuan dan Pengaduan</h2>
				<select id="tahun-select"
					class="text-sm border border-gray-300 rounded-md px-3 py-1 focus:outline-none focus:ring-1 focus:ring-blue-500">
					<option value="2024">Tahun 2024</option>
					<option value="2025" selected>Tahun 2025</option>
				</select>
			</div>
			<canvas id="statistikChart" class="w-full" style="max-height: 300px;"></canvas>
		</div>


		<!-- Pengaduan Prioritas -->
		<div class="bg-white p-6 rounded-lg shadow">
			<h2 class="text-lg font-semibold text-gray-800 mb-4">Pengaduan Prioritas</h2>
			<div class="space-y-4">
				<?php if (!empty($pengaduan_prioritas)): ?>
					<?php foreach ($pengaduan_prioritas as $item): ?>
						<?php
						// Tentukan warna berdasarkan status atau waktu relatif (misalnya, status 'proses' = merah, 'diterima' = oranye, lainnya = kuning)
						$border_color = 'border-yellow-500';
						$bg_color = 'bg-yellow-100';
						$text_color = 'text-yellow-600';
						$hover_color = 'hover:text-yellow-800';

						if ($item->status === 'proses') {
							$border_color = 'border-red-500';
							$bg_color = 'bg-red-100';
							$text_color = 'text-red-600';
							$hover_color = 'hover:text-red-800';
						} elseif ($item->status === 'diterima') {
							$border_color = 'border-orange-500';
							$bg_color = 'bg-orange-100';
							$text_color = 'text-orange-600';
							$hover_color = 'hover:text-orange-800';
						}
						?>
						<div class="flex items-start border-l-4 <?php echo $border_color; ?> pl-3">
							<div class="flex-shrink-0 mt-1">
								<div
									class="h-8 w-8 rounded-full <?php echo $bg_color; ?> flex items-center justify-center <?php echo $text_color; ?>">
									<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
										<path fill-rule="evenodd"
											d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
											clip-rule="evenodd"></path>
									</svg>
								</div>
							</div>
							<div class="ml-3">
								<p class="text-sm font-medium text-gray-900"><?php echo htmlspecialchars($item->judul); ?></p>
								<p class="text-sm text-gray-500"><?php echo htmlspecialchars($item->deskripsi); ?></p>
								<p class="text-xs text-gray-400 mt-1"><?php echo htmlspecialchars($item->waktu_relatif); ?></p>
								<a href="<?php echo site_url('kepala/pengaduan/' . $item->id); ?>"
									class="text-xs <?php echo $text_color . ' ' . $hover_color; ?> mt-1 inline-block">Tinjau
									Sekarang</a>
							</div>
						</div>
					<?php endforeach; ?>
				<?php else: ?>
					<p class="text-sm text-gray-500">Belum ada pengaduan prioritas.</p>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<!-- Pengajuan Butuh Persetujuan -->
	<div class="bg-white p-6 rounded-lg shadow">
		<div class="flex items-center justify-between mb-6">
			<h2 class="text-lg font-semibold text-gray-800">Pengajuan Butuh Persetujuan</h2>
			<a href="<?= base_url('kepala/pengajuan') ?>" class="text-sm text-blue-600 hover:text-blue-800">Lihat
				Semua</a>
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
									class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
									No. Pengajuan</th>
								<th scope="col"
									class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
									Jenis Surat</th>
								<th scope="col"
									class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
									Pemohon</th>
								<th scope="col"
									class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
									Tanggal</th>
								<th scope="col"
									class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
									Status</th>
								<th scope="col"
									class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
									Aksi</th>
							</tr>
						</thead>
						<tbody class="bg-white divide-y divide-gray-200">
							<?php foreach (array_slice($pengajuan, 0, 3) as $index => $item): ?>
								<tr>
									<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
										<?= $item['no_pengajuan'] ?>
									</td>
									<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= $item['nama_surat'] ?>
									</td>
									<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= $item['nama_pemohon'] ?>
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
									<td class="px-6 py-4 text-sm text-right">
										<a href="<?= site_url('pengajuan/detail/' . $item['pengajuan_id']) ?>"
											class="text-blue-600 hover:text-blue-900">Detail</a>
										<?php if ($item['status'] == 'pending'): ?>
											<a href="<?= site_url('pengajuan/setujui/' . $item['pengajuan_id']) ?>"
												class="text-green-600 hover:text-green-900 ml-3">Setujui</a>
											<a href="<?= site_url('pengajuan/tolak/' . $item['pengajuan_id']) ?>"
												class="text-red-600 hover:text-red-900 ml-3">Tolak</a>
										<?php endif; ?>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>

					</table>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
	document.addEventListener("DOMContentLoaded", function () {
		const ctx = document.getElementById('statistikChart').getContext('2d');
		let chart;

		function renderChart(labels, pengajuanData, pengaduanData) {
			if (chart) chart.destroy(); // Hancurkan grafik lama jika ada

			const data = {
				labels: labels,
				datasets: [
					{
						label: 'Pengajuan',
						data: pengajuanData,
						backgroundColor: 'rgba(59, 130, 246, 0.2)',
						borderColor: 'rgba(59, 130, 246, 1)',
						borderWidth: 2,
						fill: true, // Mengisi area di bawah garis
						tension: 0.4 // Membuat garis sedikit melengkung
					},
					{
						label: 'Pengaduan',
						data: pengaduanData,
						backgroundColor: 'rgba(234, 88, 12, 0.2)',
						borderColor: 'rgba(234, 88, 12, 1)',
						borderWidth: 2,
						fill: true, // Mengisi area di bawah garis
						tension: 0.4 // Membuat garis sedikit melengkung
					}
				]
			};

			const config = {
				type: 'line', // Ubah dari 'bar' ke 'line'
				data: data,
				options: {
					responsive: true,
					maintainAspectRatio: false,
					scales: {
						y: {
							beginAtZero: true,
							title: {
								display: true,
								text: 'Jumlah'
							}
						},
						x: {
							title: {
								display: true,
								text: 'Status'
							}
						}
					},
					plugins: {
						legend: {
							display: true,
							position: 'top'
						}
					}
				}
			};

			chart = new Chart(ctx, config);
		}

		// Render grafik awal dengan data dari controller
		const initialLabels = <?= json_encode($stats['labels'] ?? []) ?>;
		const initialPengajuan = <?= json_encode($stats['pengajuan_data'] ?? []) ?>;
		const initialPengaduan = <?= json_encode($stats['pengaduan_data'] ?? []) ?>;

		if (initialLabels.length && initialPengajuan.length && initialPengaduan.length) {
			renderChart(initialLabels, initialPengajuan, initialPengaduan);
		} else {
			console.error('Data awal untuk grafik kosong atau tidak valid.');
		}

		// Event listener untuk dropdown tahun
		document.getElementById('tahun-select').addEventListener('change', function () {
			const tahun = this.value;
			fetch('<?= base_url('kepala/get_statistik') ?>/' + tahun, {
				method: 'GET'
			})
				.then(response => response.json())
				.then(data => {
					if (data.labels && data.pengajuan_data && data.pengaduan_data) {
						renderChart(data.labels, data.pengajuan_data, data.pengaduan_data);
					} else {
						console.error('Data dari server tidak valid:', data);
					}
				})
				.catch(error => console.error('Error fetching data:', error));
		});
	});
</script>
