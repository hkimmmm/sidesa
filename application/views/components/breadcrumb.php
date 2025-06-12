<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<?php
		$breadcrumbs = $data['breadcrumbs'] ?? [
			['title' => 'Home', 'url' => base_url('admin/dashboard')]
		];

		foreach ($breadcrumbs as $index => $crumb):
			$is_last = ($index === count($breadcrumbs) - 1);
		?>
			<li class="breadcrumb-item <?= $is_last ? 'active' : '' ?>">
				<?php if (!$is_last): ?>
					<a href="<?= $crumb['url'] ?>"><?= $crumb['title'] ?></a>
				<?php else: ?>
					<?= $crumb['title'] ?>
				<?php endif; ?>
			</li>
		<?php endforeach; ?>
	</ol>
</nav>