<aside id="sidebar"
	class="w-64 fixed h-screen bg-gradient-to-b from-green-700 to-green-800 shadow-md transition-all duration-300 z-50 md:relative text-white flex flex-col">
	<!-- Header Sidebar -->
	<div class="p-4 border-b border-green-600 flex-shrink-0">
		<h1 class="text-xl font-bold">SIDESA</h1>
		<p class="text-xs text-green-200">Sistem Informasi Desa</p>
	</div>

	<!-- Menu Navigasi (Scrollable Content) -->
	<nav class="p-4 overflow-y-auto flex-grow">
		<ul class="space-y-2">
			<!-- Dashboard -->
			<li>
				<a href="<?php echo base_url('admin'); ?>"
					class="flex items-center p-2 rounded-lg hover:bg-green-600 group">
					<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
						<path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
						<path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
					</svg>
					<span class="ml-3">Dashboard</span>
				</a>
			</li>

			<li>
				<a href="<?php echo base_url('news'); ?>"
					class="flex items-center p-2 rounded-lg hover:bg-green-600 group">
					<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
						<path
							d="M19 3H5a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2V5a2 2 0 00-2-2zM7 17v-2h10v2H7zm0-4v-2h10v2H7zm0-4V7h10v2H7z">
						</path>
					</svg>
					<span class="ml-3">Berita</span>
				</a>
			</li>

			<!-- Menu Penduduk -->
			<li>
				<button type="button" class="flex items-center w-full p-2 rounded-lg hover:bg-green-600 group"
					aria-controls="dropdown-penduduk" data-collapse-toggle="dropdown-penduduk">
					<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
						<path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
							clip-rule="evenodd"></path>
					</svg>
					<span class="flex-1 ml-3 text-left whitespace-nowrap">Data Penduduk</span>
					<svg class="w-4 h-4 transition-transform" fill="currentColor" viewBox="0 0 20 20"
						xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd"
							d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
							clip-rule="evenodd"></path>
					</svg>
				</button>
				<ul id="dropdown-penduduk" class="hidden py-2 space-y-2 pl-11">
					<li>
						<a href="#" class="flex items-center p-2 text-sm rounded-lg hover:bg-green-600">Data
							Keluarga</a>
					</li>
					<li>
						<a href="#" class="flex items-center p-2 text-sm rounded-lg hover:bg-green-600">Data
							Individu</a>
					</li>
					<li>
						<a href="#" class="flex items-center p-2 text-sm rounded-lg hover:bg-green-600">Mutasi
							Penduduk</a>
					</li>
					<li>
						<a href="#" class="flex items-center p-2 text-sm rounded-lg hover:bg-green-600">Statistik
							Penduduk</a>
					</li>
				</ul>
			</li>


			<!-- Menu Pembangunan -->
			<li>
				<button type="button" class="flex items-center w-full p-2 rounded-lg hover:bg-green-600 group"
					aria-controls="dropdown-pembangunan" data-collapse-toggle="dropdown-pembangunan">
					<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
						<path
							d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z">
						</path>
					</svg>
					<span class="flex-1 ml-3 text-left whitespace-nowrap">Pembangunan</span>
					<svg class="w-4 h-4 transition-transform" fill="currentColor" viewBox="0 0 20 20"
						xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd"
							d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
							clip-rule="evenodd"></path>
					</svg>
				</button>
				<ul id="dropdown-pembangunan" class="hidden py-2 space-y-2 pl-11">
					<li>
						<a href="#" class="flex items-center p-2 text-sm rounded-lg hover:bg-green-600">Program
							Pembangunan</a>
					</li>
					<li>
						<a href="#" class="flex items-center p-2 text-sm rounded-lg hover:bg-green-600">Dokumen
							Perencanaan</a>
					</li>
					<li>
						<a href="#" class="flex items-center p-2 text-sm rounded-lg hover:bg-green-600">Progress
							Fisik</a>
					</li>
					<li>
						<a href="#" class="flex items-center p-2 text-sm rounded-lg hover:bg-green-600">Galeri
							Pembangunan</a>
					</li>
				</ul>
			</li>

			<!-- Menu Layanan Publik -->
			<li>
				<button type="button" class="flex items-center w-full p-2 rounded-lg hover:bg-green-600 group"
					aria-controls="dropdown-layanan" data-collapse-toggle="dropdown-layanan">
					<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
						<path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z"></path>
						<path
							d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z">
						</path>
					</svg>
					<span class="flex-1 ml-3 text-left whitespace-nowrap">Layanan Publik</span>
					<svg class="w-4 h-4 transition-transform" fill="currentColor" viewBox="0 0 20 20"
						xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd"
							d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
							clip-rule="evenodd"></path>
					</svg>
				</button>
				<ul id="dropdown-layanan" class="hidden py-2 space-y-2 pl-11">
					<li>
						<a href="<?php echo base_url('pengaduan/admin'); ?>"
							class="flex items-center p-2 text-sm rounded-lg hover:bg-green-600">Pengaduan Masyarakat</a>
					</li>
					<li>
						<a href="<?php echo base_url('pengajuan/admin'); ?>"
							class="flex items-center p-2 text-sm rounded-lg hover:bg-green-600">Pengajuan
							Masyarakat</a>
					</li>
					<li>
						<a href="#" class="flex items-center p-2 text-sm rounded-lg hover:bg-green-600">Jadwal
							Layanan</a>
					</li>
					<li>
						<a href="#" class="flex items-center p-2 text-sm rounded-lg hover:bg-green-600">FAQ</a>
					</li>
				</ul>
			</li>

			<!-- Menu BUMDes -->
			<li>
				<a href="#" class="flex items-center p-2 rounded-lg hover:bg-green-600 group">
					<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
						<path fill-rule="evenodd"
							d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
							clip-rule="evenodd"></path>
					</svg>
					<span class="ml-3">BUMDes</span>
				</a>
			</li>

			<li>
				<a href="<?php echo base_url('organisasi'); ?>"
					class="flex items-center p-2 rounded-lg hover:bg-green-600 group">
					<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
						<path fill-rule="evenodd"
							d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
							clip-rule="evenodd"></path>
					</svg>
					<span class="ml-3">Struktur Organisasi</span>
				</a>
			</li>

			<li>
				<a href="<?php echo base_url('prasarana'); ?>"
					class="flex items-center p-2 rounded-lg hover:bg-green-600 group">
					<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
						<path fill-rule="evenodd"
							d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
							clip-rule="evenodd"></path>
					</svg>
					<span class="ml-3">Sarana Prasarana</span>
				</a>
			</li>

			<li>
				<a href="<?php echo base_url('potensi'); ?>"
					class="flex items-center p-2 rounded-lg hover:bg-green-600 group">
					<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
						<path fill-rule="evenodd"
							d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
							clip-rule="evenodd"></path>
					</svg>
					<span class="ml-3">Potensi</span>
				</a>
			</li>

			<!-- Menu Pengaturan -->
			<li>
				<a href="#" class="flex items-center p-2 rounded-lg hover:bg-green-600 group">
					<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
						<path fill-rule="evenodd"
							d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
							clip-rule="evenodd"></path>
					</svg>
					<span class="ml-3">Pengaturan</span>
				</a>
			</li>
		</ul>
	</nav>

	<!-- Footer Sidebar (Fixed di bawah) -->
	<div class="p-4 border-t border-green-600 flex-shrink-0">
		<div class="flex items-center">
			<img class="w-8 h-8 rounded-full" src="https://via.placeholder.com/40" alt="User photo">
			<div class="ml-3">
				<p class="text-sm font-medium">Admin Desa</p>
				<p class="text-xs text-green-200">Super Admin</p>
			</div>
		</div>
		<a href="<?= base_url('auth/logout') ?>"
			class="flex items-center mt-3 p-2 text-sm rounded-lg hover:bg-green-600">
			<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
				<path fill-rule="evenodd"
					d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
					clip-rule="evenodd"></path>
			</svg>
			<span class="ml-3">Keluar</span>
		</a>
	</div>
</aside>

<!-- Script untuk dropdown -->
<script>
	document.querySelectorAll('[data-collapse-toggle]').forEach(button => {
		button.addEventListener('click', () => {
			const targetId = button.getAttribute('data-collapse-toggle');
			const target = document.getElementById(targetId);
			target.classList.toggle('hidden');

			// Rotate arrow icon
			const arrow = button.querySelector('svg:last-child');
			arrow.classList.toggle('rotate-180');
		});
	});
</script>