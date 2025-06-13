<div class="container mx-auto px-4 ">
	<h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-6">Dashboard Administrasi Desa</h1>

	<!-- Stats Cards -->
	<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
		<div class="bg-white p-6 rounded-lg shadow">
			<div class="flex items-center justify-between">
				<div>
					<p class="text-gray-500 text-sm">Total Penduduk</p>
					<h3 class="text-2xl font-bold text-gray-800">2,543</h3>
				</div>
				<div class="p-3 rounded-full bg-blue-100 text-blue-600">
					<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
						<path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
							clip-rule="evenodd"></path>
					</svg>
				</div>
			</div>
			<p class="text-green-500 text-sm mt-2">+5.2% dari tahun lalu</p>
		</div>

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

		<div class="bg-white p-6 rounded-lg shadow">
			<div class="flex items-center justify-between">
				<div>
					<p class="text-gray-500 text-sm">Pengajuan Surat</p>
					<h3 class="text-2xl font-bold text-gray-800">24</h3>
				</div>
				<div class="p-3 rounded-full bg-purple-100 text-purple-600">
					<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
						<path fill-rule="evenodd"
							d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
							clip-rule="evenodd"></path>
					</svg>
				</div>
			</div>
			<p class="text-yellow-500 text-sm mt-2">8 menunggu verifikasi</p>
		</div>

		<div class="bg-white p-6 rounded-lg shadow">
			<div class="flex items-center justify-between">
				<div>
					<p class="text-gray-500 text-sm">Pengaduan Warga</p>
					<h3 class="text-2xl font-bold text-gray-800">15</h3>
				</div>
				<div class="p-3 rounded-full bg-red-100 text-red-600">
					<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
						<path fill-rule="evenodd"
							d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
							clip-rule="evenodd"></path>
					</svg>
				</div>
			</div>
			<p class="text-red-500 text-sm mt-2">3 prioritas tinggi</p>
		</div>
	</div>

	<!-- Charts and Tables Section -->
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

		<!-- Recent Activity -->
		<div class="bg-white p-6 rounded-lg shadow">
			<h2 class="text-lg font-semibold text-gray-800 mb-4">Aktivitas Terkini</h2>
			<div class="space-y-4">
				<?php if (!empty($terbaru)): ?>
					<?php foreach ($terbaru as $item): ?>
						<div class="flex items-start">
							<div class="flex-shrink-0 mt-1">
								<?php if ($item->tipe === 'pengajuan'): ?>
									<!-- Ikon untuk pengajuan -->
									<div class="h-8 w-8 rounded-full bg-green-100 flex items-center justify-center text-green-600">
										<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
											<path fill-rule="evenodd"
												d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
												clip-rule="evenodd"></path>
										</svg>
									</div>
								<?php elseif ($item->tipe === 'pengaduan'): ?>
									<!-- Ikon untuk pengaduan -->
									<div
										class="h-8 w-8 rounded-full bg-purple-100 flex items-center justify-center text-purple-600">
										<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
											<path fill-rule="evenodd"
												d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
												clip-rule="evenodd"></path>
										</svg>
									</div>
								<?php endif; ?>
							</div>
							<div class="ml-3">
								<p class="text-sm font-medium text-gray-900">
									<?php echo $item->tipe === 'pengajuan' ? 'Pengajuan Surat' : 'Pengaduan Baru'; ?>
								</p>
								<p class="text-sm text-gray-500">
									<?php if ($item->tipe === 'pengajuan'): ?>
										<?php echo htmlspecialchars($item->nama_surat); ?>
									<?php elseif ($item->tipe === 'pengaduan'): ?>
										<?php echo htmlspecialchars($item->kode_pengaduan . ' - ' . $item->jenis_pengaduan); ?>
									<?php endif; ?>
								</p>
								<p class="text-xs text-gray-400 mt-1">
									<?php echo htmlspecialchars($item->waktu_relatif); ?>
								</p>
							</div>
						</div>
					<?php endforeach; ?>
				<?php else: ?>
					<p class="text-sm text-gray-500">Belum ada aktivitas terbaru.</p>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<!-- Recent Pengajuan Table -->
	<div class="bg-white p-6 rounded-lg shadow">
		<div class="flex items-center justify-between mb-6">
			<h2 class="text-lg font-semibold text-gray-800">Pengajuan Terbaru</h2>
			<a href="<?= base_url('pengajuan') ?>" class="text-sm text-blue-600 hover:text-blue-800">Lihat Semua</a>
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
			fetch('<?= base_url('admin/get_statistik') ?>/' + tahun, {
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