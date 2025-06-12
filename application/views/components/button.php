<?php
$defaultClass = 'px-4 py-2 rounded-md font-medium transition';
$types = [
	'primary' => 'bg-blue-600 text-white hover:bg-blue-700',
	'secondary' => 'bg-gray-200 text-gray-800 hover:bg-gray-300',
	'danger' => 'bg-red-600 text-white hover:bg-red-700'
];
?>

<button
	type="<?= $type ?? 'button' ?>"
	class="<?= $defaultClass ?> <?= $types[$style ?? 'primary'] ?> <?= $class ?? '' ?>"
	<?= isset($attr) ? $attr : '' ?>>

	<?php if (isset($icon)): ?>
		<i class="fas fa-<?= $icon ?> <?= isset($text) ? 'mr-2' : '' ?>"></i>
	<?php endif; ?>

	<?= $text ?? '' ?>
</button>