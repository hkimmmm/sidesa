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
				<a href="<?php echo base_url('kepala'); ?>"
					class="flex items-center p-2 rounded-lg hover:bg-green-600 group">
					<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
						<path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
						<path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
					</svg>
					<span class="ml-3">Dashboard</span>
				</a>
			</li>

			<!-- Pengajuan -->
			<li>
				<a href="<?php echo base_url('kepala/pengajuan'); ?>"
					class="flex items-center p-2 rounded-lg hover:bg-green-600 group">
					<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
						<path fill-rule="evenodd"
							d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
							clip-rule="evenodd"></path>
					</svg>
					<span class="ml-3">Pengajuan</span>
				</a>
			</li>

			<!-- Pengaduan -->
			<li>
				<a href="<?php echo base_url('kepala/pengaduan'); ?>"
					class="flex items-center p-2 rounded-lg hover:bg-green-600 group">
					<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
						<path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z"></path>
						<path
							d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z">
						</path>
					</svg>
					<span class="ml-3">Pengaduan</span>
				</a>
			</li>
		</ul>
	</nav>

	<!-- Footer Sidebar (Fixed di bawah) -->
	<div class="p-4 border-t border-green-600 flex-shrink-0">
		<div class="flex items-center">
			<img class="w-8 h-8 rounded-full" src="https://via.placeholder.com/40" alt="User photo">
			<div class="ml-3">
				<p class="text-sm font-medium">Kepala Desa</p>
				<p class="text-xs text-green-200">Administrator</p>
			</div>
		</div>
		<a href="<?php echo base_url('logout'); ?>"
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