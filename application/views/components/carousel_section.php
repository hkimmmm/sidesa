<!-- Section: Carousel -->
<section id="carousel" class="relative w-full overflow-hidden mt-20 mb-20">
	<div id="carousel-images" class="flex transition-transform duration-700 ease-in-out">
		<!-- Gambar akan diisi oleh JavaScript -->
	</div>

	<!-- Navigation Dots -->
	<div id="carousel-dots" class="absolute bottom-4 left-0 right-0 flex justify-center space-x-2">
		<!-- Dots akan diisi oleh JavaScript -->
	</div>
</section>

<script>
	document.addEventListener('DOMContentLoaded', function () {
		const carousel = document.getElementById('carousel-images');
		const dotsContainer = document.getElementById('carousel-dots');
		let currentIndex = 0;
		let intervalId;
		let banners = [];

		// Fungsi untuk mengambil data banner dari API
		async function fetchBanners() {
			try {
				const response = await fetch('<?php echo site_url("banner/get_active"); ?>');
				const data = await response.json();

				if (data.status === 'success') {
					banners = data.banners;
					renderCarousel();
				} else {
					console.error('Error fetching banners:', data.message);
				}
			} catch (error) {
				console.error('Error fetching banners:', error);
			}
		}

		// Render carousel
		function renderCarousel() {
			// Kosongkan carousel dan dots
			carousel.innerHTML = '';
			dotsContainer.innerHTML = '';

			// Jika tidak ada banner, tampilkan pesan atau gambar default
			if (banners.length === 0) {
				const defaultImg = document.createElement('img');
				defaultImg.src = 'assets/images/default-banner.jpg';
				defaultImg.className = 'w-full h-[60vh] sm:h-[70vh] lg:h-[80vh] object-cover flex-shrink-0';
				defaultImg.alt = 'Default Banner';
				carousel.appendChild(defaultImg);
				return;
			}

			// Tambahkan gambar ke carousel
			banners.forEach((banner, index) => {
				const imgElement = document.createElement('img');
				imgElement.src = '<?php echo base_url(); ?>' + banner.image_url;
				imgElement.className = 'w-full h-[60vh] sm:h-[70vh] lg:h-[80vh] object-cover flex-shrink-0';
				imgElement.alt = banner.title || `Banner ${index + 1}`;
				carousel.appendChild(imgElement);

				// Tambahkan dot navigasi
				const dot = document.createElement('button');
				dot.className = `w-3 h-3 rounded-full ${index === 0 ? 'bg-white' : 'bg-white/50'}`;
				dot.addEventListener('click', () => goToSlide(index));
				dotsContainer.appendChild(dot);
			});

			// Atur lebar carousel berdasarkan jumlah gambar
			carousel.style.width = `${banners.length * 100}%`;

			// Mulai auto slide jika ada lebih dari 1 banner
			if (banners.length > 1) {
				startAutoSlide();
			}
		}

		function goToSlide(index) {
			currentIndex = index;
			updateCarousel();
		}

		function updateCarousel() {
			carousel.style.transform = `translateX(-${currentIndex * (100 / banners.length)}%)`;

			// Update dot aktif
			const dots = dotsContainer.children;
			for (let i = 0; i < dots.length; i++) {
				dots[i].className = i === currentIndex ? 'w-3 h-3 rounded-full bg-white' : 'w-3 h-3 rounded-full bg-white/50';
			}
		}

		function nextSlide() {
			if (banners.length === 0) return;
			currentIndex = (currentIndex + 1) % banners.length;
			updateCarousel();
		}

		function startAutoSlide() {
			if (intervalId) clearInterval(intervalId);
			intervalId = setInterval(nextSlide, 3000);

			// Pause on hover
			carousel.addEventListener('mouseenter', () => clearInterval(intervalId));
			carousel.addEventListener('mouseleave', () => {
				intervalId = setInterval(nextSlide, 3000);
			});
		}

		// Inisialisasi dengan mengambil data banner
		fetchBanners();
	});
</script>