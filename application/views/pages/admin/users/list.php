<div class="max-w-6xl mx-auto p-4">
	<div class="flex justify-between items-center mb-8">
		<h1 class="text-2xl font-bold text-gray-800">Daftar Pengguna</h1>
		<div class="flex space-x-2">
			<a href="<?= base_url('user/create') ?>"
				class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
				Tambah Pengguna
			</a>
		</div>
	</div>

	<!-- Tabel User -->
	<div class="bg-white rounded-lg shadow-md overflow-hidden">
		<div class="overflow-x-auto">
			<table class="min-w-full divide-y divide-gray-200">
				<thead class="bg-gray-50">
					<tr>
						<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
						<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
						<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
						<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nomor Telepon</th>
						<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Role</th>
						<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
						<th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Aksi</th>
					</tr>
				</thead>
				<tbody class="bg-white divide-y divide-gray-200">
					<?php foreach ($users as $index => $user): ?>
						<tr>
							<td class="px-6 py-4"><?= $index + 1 ?></td>
							<td class="px-6 py-4"><?= htmlspecialchars($user->nama) ?></td>
							<td class="px-6 py-4"><?= htmlspecialchars($user->email) ?></td>
							<td class="px-6 py-4"><?= htmlspecialchars($user->no_telp) ?></td>
							<td class="px-6 py-4"><?= $user->role ?></td>
							<td class="px-6 py-4">
								<span
									class="px-2 py-1 text-xs rounded-full <?= $user->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' ?>">
									<?= $user->is_active ? 'Aktif' : 'Nonaktif' ?>
								</span>
							</td>
							<td class="px-6 py-4 text-right">
								<a href="<?= base_url('user/edit/' . $user->id) ?>"
									class="text-blue-600 hover:text-blue-900">Edit</a>
								<button onclick="confirmDelete(<?= $user->id ?>)"
									class="text-red-600 hover:text-red-900 ml-2">Hapus</button>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>

		<!-- Pagination -->
		<div class="px-6 py-4 bg-gray-50">
			<?= $pagination ?>
		</div>
	</div>
</div>

<script>
	function confirmDelete(id) {
		if (confirm('Yakin ingin menghapus pengguna ini?')) {
			window.location.href = `<?= base_url('user/delete/') ?>${id}`;
		}
	}
</script>
