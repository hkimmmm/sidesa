<!-- Sticky Header -->
<style>
	/* #main-header {
		position: fixed;
		width: 100%;
		top: 0;
		transition: background-color 0.3s ease, backdrop-filter 0.3s ease;
		z-index: 999;
		background-color: rgba(255, 255, 255, 0.8);
		backdrop-filter: blur(10px);
	} */

	#main-header.transparent {
		background-color: rgba(255, 255, 255, 0.2);
		backdrop-filter: blur(10px);
	}

	#main-header.scrolled {
		background-color: rgba(255, 255, 255, 0.95);
		backdrop-filter: blur(10px);
		box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
	}

	#main-header {
		background-color: transparent !important;
		backdrop-filter: none !important;
		box-shadow: none important !important;
		transition: all 0.03s ease;
		color: white;
	}

	#main-header .logo-text>div {
		color: white !important;
		transition: color 0.03s ease;
	}

	#main-header nav>a,
	#main-header nav>div>button,
	#main-header nav>div>button span,
	#main-header nav>div>button i {
		color: white !important;
		transition: color 0.03s ease;
	}

	#main-header.scrolled {
		background-color: rgba(255, 255, 255, 0.7) !important;
		backdrop-filter: blur(10px) !important;
		box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1) !important;
		color: #00305A;
	}

	#main-header.scrolled nav>a,
	#main-header.scrolled nav>div>button,
	#main-header.scrolled nav>div>button span,
	#main-header.scrolled nav>div>button i {
		color: #00305A !important;
	}

	#main-header.scrolled .absolute a {
		color: #00305A !important;
	}

	#main-header.scrolled .absolute a:hover {
		background-color: #f0f0f0;

	}

	#main-header.scrolled .logo-text>div {
		color: #00305A !important;
	}
</style>


<header id="main-header" class="fixed top-0 left-0 w-full z-[50] transition-all duration-300">
	<div class="max-w-[1200px] mx-auto flex items-center justify-between px-6 py-6 md:py-9">
		<div class="flex items-center space-x-3">
			<img alt="Logo Kabupaten Tegal" class="w-10 h-10 object-contain"
				src="<?php echo base_url('assets/images/logo/kabupaten_tegal.png'); ?>" />
			<div class="text-xs leading-tight text-gray-700 logo-text">
				<div class="uppercase font-semibold tracking-widest text-[9px]">SISTEM INFORMASI KELURAHAN</div>
				<div class="font-extrabold text-[13px] leading-none">PROCOT</div>
			</div>
		</div>

		<nav class="hidden md:flex space-x-8 text-sm text-[#00305A] font-semibold">
			<a class="hover:underline font-medium" href="<?= base_url('welcome') ?>">Beranda</a>

			<div class="relative group">
				<button class="flex items-center space-x-1 hover:underline font-medium">
					<span>Profil</span>
					<i class="fas fa-chevron-down text-[10px]"></i>
				</button>
				<div
					class="absolute hidden group-hover:block bg-white border border-gray-200 rounded shadow mt-1 py-1 min-w-[120px] z-10">
					<a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 font-normal"
						href="<?= base_url('kelurahan/sejarah') ?>">Sejarah Kelurahan</a>
					<a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 font-normal"
						href="<?= base_url('kelurahan/visi_misi') ?>">Visi dan Misi</a>
					<a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 font-normal" href="#">Struktur
						Organisasi</a>
					<a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 font-normal" href="#">Potensi
						Kelurahan</a>
				</div>
			</div>

			<div class="relative group">
				<button class="flex items-center space-x-1 hover:underline font-medium">
					<span>Sarana Prasarana</span>
					<i class="fas fa-chevron-down text-[10px]"></i>
				</button>
				<div
					class="absolute hidden group-hover:block bg-white border border-gray-200 rounded shadow mt-1 py-1 min-w-[140px] z-10">
					<a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 font-normal" href="#">Sarana 1</a>
					<a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 font-normal" href="#">Sarana 2</a>
				</div>
			</div>

			<a class="hover:underline font-medium" href="<?= base_url('news/list') ?>">Berita</a>

			<div class="relative group">
				<button class="flex items-center space-x-1 hover:underline font-medium">
					<span>Layanan Publik</span>
					<i class="fas fa-chevron-down text-[10px]"></i>
				</button>
				<div
					class="absolute hidden group-hover:block bg-white border border-gray-200 rounded shadow mt-1 py-1 min-w-[140px] z-10">
					<a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 font-normal" href="#">Pengaduan
						Masyarakat</a>
					<a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 font-normal" href="#">Pelayanan
						Pengajuan Surat</a>
				</div>
			</div>

		</nav>

		<!-- Mobile Toggle Button -->
		<button id="mobile-menu-button"
			class="md:hidden text-[#00305A] p-2 rounded border border-[#00305A] focus:outline-none">
			<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
			</svg>
		</button>
	</div>
</header>

<!-- Mobile Menu -->
<div id="mobile-menu" class="hidden md:hidden bg-white shadow-lg z-40">
	<div class="max-w-[1200px] mx-auto px-6 py-2 space-y-2">
		<a class="block px-4 py-2 text-sm text-[#00305A] hover:bg-gray-100 rounded" href="#">Beranda</a>

		<div class="dropdown">
			<button
				class="flex items-center justify-between w-full px-4 py-2 text-sm text-[#00305A] hover:bg-gray-100 rounded">
				<span>Profil</span>
				<i class="fas fa-chevron-down text-[10px]"></i>
			</button>
			<div class="hidden dropdown-content pl-4">
				<a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded" href="#">Profil 1</a>
				<a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded" href="#">Profil 2</a>
			</div>
		</div>

		<div class="dropdown">
			<button
				class="flex items-center justify-between w-full px-4 py-2 text-sm text-[#00305A] hover:bg-gray-100 rounded">
				<span>Sarana Prasarana</span>
				<i class="fas fa-chevron-down text-[10px]"></i>
			</button>
			<div class="hidden dropdown-content pl-4">
				<a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded" href="#">Sarana 1</a>
				<a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded" href="#">Sarana 2</a>
			</div>
		</div>

		<a class="block px-4 py-2 text-sm text-[#00305A] hover:bg-gray-100 rounded" href="#">Berita</a>

		<div class="dropdown">
			<button
				class="flex items-center justify-between w-full px-4 py-2 text-sm text-[#00305A] hover:bg-gray-100 rounded">
				<span>Layanan Publik</span>
				<i class="fas fa-chevron-down text-[10px]"></i>
			</button>
			<div class="hidden dropdown-content pl-4">
				<a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded" href="#">Layanan 1</a>
				<a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded" href="#">Layanan 2</a>
			</div>
		</div>

		<div class="dropdown">
			<button
				class="flex items-center justify-between w-full px-4 py-2 text-sm text-[#00305A] hover:bg-gray-100 rounded">
				<span>Statistik</span>
				<i class="fas fa-chevron-down text-[10px]"></i>
			</button>
			<div class="hidden dropdown-content pl-4">
				<a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded" href="#">Statistik 1</a>
				<a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded" href="#">Statistik 2</a>
			</div>
		</div>
	</div>
</div>

<!-- JS for Mobile Menu & Sticky Background -->
<script>
	// Toggle mobile menu
	document.getElementById('mobile-menu-button').addEventListener('click', function () {
		document.getElementById('mobile-menu').classList.toggle('hidden');
	});

	// Dropdown toggle in mobile
	document.querySelectorAll('.dropdown button').forEach(button => {
		button.addEventListener('click', function () {
			const dropdownContent = this.nextElementSibling;
			dropdownContent.classList.toggle('hidden');

			const icon = this.querySelector('i');
			icon.classList.toggle('fa-chevron-down');
			icon.classList.toggle('fa-chevron-up');
		});
	});

	window.addEventListener('scroll', function () {
		const header = document.getElementById('main-header');
		const hero = document.getElementById('hero-section');
		const heroHeight = hero ? hero.offsetHeight : 0;

		// Jika scroll lebih dari 3% dari tinggi hero (atau 0)
		if (window.scrollY > heroHeight * 0.03) {
			header.classList.add('scrolled');
			header.classList.remove('transparent');
		} else {
			// Jika ada hero, buat transparan
			if (hero) {
				header.classList.remove('scrolled');
				header.classList.add('transparent');
			}
		}
	});

	window.addEventListener('load', function () {
		const header = document.getElementById('main-header');
		const hero = document.getElementById('hero-section');
		const heroHeight = hero ? hero.offsetHeight : 0;

		if (window.scrollY > heroHeight * 0.03) {
			header.classList.add('scrolled');
			header.classList.remove('transparent');
		} else {
			if (hero) {
				header.classList.remove('scrolled');
				header.classList.add('transparent');
			}
		}
	});
</script>
