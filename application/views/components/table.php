<div class="table-container">
	<?php if (!empty($data)): ?>
		<table class="min-w-full divide-y divide-gray-200">
			<thead class="bg-gray-50">
				<tr>
					<?php foreach ($headers as $header): ?>
						<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
							<?= htmlspecialchars($header) ?>
						</th>
					<?php endforeach; ?>
				</tr>
			</thead>
			<tbody class="bg-white divide-y divide-gray-200">
				<?php foreach ($data as $index => $row): ?>
					<tr>
						<?php foreach ($columns as $column): ?>
							<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
								<?php
								if (is_array($column)):
									$field = $column['field'];
									$format = isset($column['format']) ? $column['format'] : null;
								?>
									<?php if (isset($column['badge'])): ?>
										<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full <?=
																													htmlspecialchars($column['badge'][$row[$field]] ?? 'bg-gray-100 text-gray-800') ?>">
											<?= htmlspecialchars($row[$field]) ?>
										</span>
									<?php elseif ($format === 'date'): ?>
										<?= !empty($row[$field]) ? date('d/m/Y', strtotime($row[$field])) : '-' ?>
									<?php elseif ($format === 'datetime'): ?>
										<?= !empty($row[$field]) ? date('d/m/Y H:i', strtotime($row[$field])) : '-' ?>
									<?php elseif (isset($column['template'])): ?>
										<?php $this->load->view('components/' . $column['template'], [
											'id' => $row[$field],
											'data' => $row
										]); ?>
									<?php else: ?>
										<?= htmlspecialchars($row[$field]) ?>
									<?php endif; ?>
								<?php elseif ($column === 'number'): ?>
									<?= ($index + 1) + ($page_offset ?? 0) ?>
								<?php else: ?>
									<?= isset($row[$column]) ? htmlspecialchars($row[$column]) : '-' ?>
								<?php endif; ?>
							</td>
						<?php endforeach; ?>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	<?php else: ?>
		<div class="text-center py-8 bg-white rounded-lg border border-gray-200">
			<i class="fas fa-inbox text-4xl text-gray-400 mb-2"></i>
			<p class="text-gray-500"><?= htmlspecialchars($empty_message ?? 'Tidak ada data yang tersedia') ?></p>
		</div>
	<?php endif; ?>
</div>