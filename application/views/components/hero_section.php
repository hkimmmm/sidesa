<section id="hero-section"
	class="relative z-0 bg-[#0D7A3F] overflow-hidden min-h-screen flex items-center justify-center">
	<img alt="Pattern background" class="absolute inset-0 w-full object-[90%_25%] object h-full object-cover"
		src="<?php echo base_url('assets/images/kel_procot.png'); ?>">
	<div class="absolute inset-0 bg-gradient-to-r from-[#0D7A3F]/70 via-transparent to-transparent z-0"></div>

	<div
		class="max-w-[1200px] w-full mx-auto px-6 py-10 flex flex-col md:flex-row gap-10 relative z-10 items-center md:items-start justify-between">
		<div class="max-w-lg text-white text-center md:text-left mt-20 md:mt-32 ml-4 md:ml-8">
			<h1 class="font-serif font-bold text-4xl md:text-5xl leading-tight mb-4">
				<span class="block my-4">Sistem Informasi</span>
				<span class="block">Kelurahan Procot</span>
			</h1>
			<p class="text-xs font-semibold mb-10">Pantau informasi terkini seputar Kelurahan Procot</p>
			<div class="flex justify-center md:justify-start">
				<a class="inline-flex items-center bg-white text-[#0D7A3F] text-xs font-semibold rounded px-6 py-4 hover:bg-gray-100 transition"
					href="<?= base_url('kelurahan/profile') ?>">
					<span>Tentang Kelurahan</span>
					<i class="fas fa-arrow-right ml-2 text-xs"></i>
				</a>
			</div>
		</div>
		<?php $this->load->view('components/quick_access'); ?>
	</div>
</section>
