<!-- Section: Carousel -->
<section id="carousel" class="relative w-full overflow-hidden mt-20 mb-20">
	<div id="carousel-images" class="flex transition-transform duration-700 ease-in-out">
		<img src="https://images.unsplash.com/photo-1671080749889-19f8a69deb2b?w=1920&auto=format&fit=crop&q=80" class="w-full h-[60vh] sm:h-[70vh] lg:h-[80vh] object-cover flex-shrink-0" />
		<img src="https://images.unsplash.com/photo-1674648043880-f22292b4e1bd?w=1920&auto=format&fit=crop&q=80" class="w-full h-[60vh] sm:h-[70vh] lg:h-[80vh] object-cover flex-shrink-0" />
		<img src="https://images.unsplash.com/photo-1621525408631-18c0c8cccd13?w=1920&auto=format&fit=crop&q=80" class="w-full h-[60vh] sm:h-[70vh] lg:h-[80vh] object-cover flex-shrink-0" />
	</div>
</section>

<script>
	const carousel = document.getElementById('carousel-images');
	let currentIndex = 0;
	const totalSlides = carousel.children.length;

	setInterval(() => {
		currentIndex = (currentIndex + 1) % totalSlides;
		carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
	}, 3000);
</script>