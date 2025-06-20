<!-- Section: Banner Carousel -->
<section id="banner-carousel" class="relative w-full overflow-hidden mt-20">
	<div id="banner-images" class="flex transition-transform duration-700 ease-in-out">
		<!-- Banner akan diisi oleh JavaScript -->
	</div>

	<!-- Navigation Dots -->
	<div id="banner-dots" class="absolute bottom-4 left-0 right-0 flex justify-center space-x-2 z-10">
		<!-- Dots akan diisi oleh JavaScript -->
	</div>

	<!-- Navigation Arrows -->
	<button id="prev-banner"
		class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/30 hover:bg-white/50 rounded-full p-2 transition-all z-10">
		<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
		</svg>
	</button>
	<button id="next-banner"
		class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/30 hover:bg-white/50 rounded-full p-2 transition-all z-10">
		<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
		</svg>
	</button>
</section>

<script>
	document.addEventListener('DOMContentLoaded', function () {
		const carousel = document.getElementById('banner-images');
		const dotsContainer = document.getElementById('banner-dots');
		const prevBtn = document.getElementById('prev-banner');
		const nextBtn = document.getElementById('next-banner');
		let currentIndex = 0;
		let intervalId;

		// Data banner dari PHP (tanpa AJAX)
		const banners = <?= json_encode($active_banners) ?>;

		function renderCarousel() {
			// Clear existing content
			carousel.innerHTML = '';
			dotsContainer.innerHTML = '';

			// Add banners to carousel
			banners.forEach((banner, index) => {
				const bannerItem = document.createElement('div');
				bannerItem.className = 'min-w-full h-[60vh] sm:h-[70vh] lg:h-[80vh] relative flex-shrink-0';
				bannerItem.innerHTML = `
					<img src="<?= base_url() ?>${banner.image_url}" 
						 alt="${banner.title}" 
						 class="w-full h-full object-cover object-center">
					<div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent text-white p-6">
						<div class="max-w-4xl mx-auto">
							<h3 class="text-2xl sm:text-3xl lg:text-4xl font-bold mb-2">${banner.title}</h3>
							<p class="text-sm sm:text-base">${banner.content}</p>
						</div>
					</div>
				`;
				carousel.appendChild(bannerItem);

				// Add dot for each banner
				const dot = document.createElement('button');
				dot.className = `w-3 h-3 rounded-full transition-all ${index === 0 ? 'bg-white w-6' : 'bg-white/50'}`;
				dot.addEventListener('click', () => goToSlide(index));
				dotsContainer.appendChild(dot);
			});
		}

		function goToSlide(index) {
			currentIndex = index;
			updateCarousel();
		}

		function updateCarousel() {
			carousel.style.transform = `translateX(-${currentIndex * 100}%)`;

			// Update active dot
			const dots = dotsContainer.children;
			for (let i = 0; i < dots.length; i++) {
				dots[i].className = i === currentIndex
					? 'w-3 h-3 rounded-full transition-all bg-white w-6'
					: 'w-3 h-3 rounded-full transition-all bg-white/50';
			}
		}

		function nextSlide() {
			currentIndex = (currentIndex + 1) % banners.length;
			updateCarousel();
		}

		function prevSlide() {
			currentIndex = (currentIndex - 1 + banners.length) % banners.length;
			updateCarousel();
		}

		function startAutoSlide() {
			if (banners.length > 1) {
				intervalId = setInterval(nextSlide, 5000);
			}
		}

		function stopAutoSlide() {
			clearInterval(intervalId);
		}

		// Initialize
		if (banners && banners.length > 0) {
			renderCarousel();
			startAutoSlide();

			// Event listeners for navigation
			nextBtn.addEventListener('click', () => {
				stopAutoSlide();
				nextSlide();
				startAutoSlide();
			});

			prevBtn.addEventListener('click', () => {
				stopAutoSlide();
				prevSlide();
				startAutoSlide();
			});

			// Pause on hover
			carousel.addEventListener('mouseenter', stopAutoSlide);
			carousel.addEventListener('mouseleave', startAutoSlide);
		} else {
			carousel.innerHTML = `
				<div class="min-w-full h-[60vh] sm:h-[70vh] lg:h-[80vh] flex items-center justify-center bg-gray-100">
					<p class="text-gray-500">Tidak ada banner aktif</p>
				</div>
			`;
		}
	});
</script>