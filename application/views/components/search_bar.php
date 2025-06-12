<div class="search-bar">
	<form action="<?= $url ?>" method="get" class="flex flex-col sm:flex-row gap-3">
		<!-- Search Input -->
		<div class="relative flex-grow">
			<div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
				<i class="fas fa-search text-gray-400"></i>
			</div>
			<input
				type="text"
				name="q"
				class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
				placeholder="<?= $placeholder ?? 'Cari...' ?>"
				value="<?= $this->input->get('q') ?? '' ?>">
		</div>

		<!-- Filter Dropdown -->
		<?php if (isset($filters) && !empty($filters)): ?>
			<select name="status" class="block w-full sm:w-40 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
				<option value="">Semua Status</option>
				<?php foreach ($filters as $value => $label): ?>
					<option value="<?= $value ?>" <?= ($this->input->get('status') == $value) ? 'selected' : '' ?>>
						<?= $label ?>
					</option>
				<?php endforeach; ?>
			</select>
		<?php endif; ?>

		<!-- Action Buttons -->
		<div class="flex gap-3">
			<button type="submit" class="btn-primary whitespace-nowrap">
				<i class="fas fa-search mr-2"></i> Cari
			</button>
			<?php if ($this->input->get('q') || $this->input->get('status')): ?>
				<a href="<?= $url ?>" class="btn-secondary whitespace-nowrap">
					<i class="fas fa-times mr-2"></i> Reset
				</a>
			<?php endif; ?>
		</div>
	</form>
</div>