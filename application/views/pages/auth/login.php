<html lang="fr">

<head>
	<meta charset="utf-8" />
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<title><?= $title ?? 'Admin Login' ?></title>
	<script src="https://cdn.tailwindcss.com"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;display=swap" rel="stylesheet" />
	<style>
		body {
			font-family: 'Inter', sans-serif;
		}
	</style>
</head>

<body class="bg-[#e6f1e9] min-h-screen flex items-center justify-center p-4">
	<main class="max-w-6xl w-full bg-white rounded-[40px] flex flex-col md:flex-row overflow-hidden shadow-lg">
		<!-- Left side -->
		<section
			class="flex flex-col justify-between p-8 md:p-10 w-full md:w-1/2 rounded-t-[40px] md:rounded-tl-[40px] md:rounded-bl-[40px]">
			<div>
				<div class="flex justify-between items-center mb-12">
					<h1 class="text-xl font-semibold text-black">
						Bon
						<span class="text-[#3a7a3a]">Santé</span>
					</h1>
					<div class="flex items-center space-x-1 text-xs text-gray-700 font-semibold select-none">
						<img alt="French Flag" class="inline-block" height="15" src="https://flagcdn.com/w20/fr.png"
							width="20" />
						<span>Fr</span>
						<i class="fas fa-caret-down text-[10px]"></i>
					</div>
				</div>
				<h2 class="text-2xl font-bold text-black mb-2">Hello, Selamat Datang!</h2>
				<p class="text-xs text-gray-500 mb-8 max-w-[320px]">
					To access your account
				</p>
				<!-- Tampilkan pesan error jika ada -->
				<?php if ($this->session->flashdata('error')): ?>
					<div class="bg-red-100 text-red-600 p-3 rounded mb-4 text-xs">
						<?= $this->session->flashdata('error') ?>
					</div>
				<?php endif; ?>

				<!-- Tampilkan pesan sukses logout jika ada -->
				<?php if ($this->session->flashdata('message')): ?>
					<div class="bg-green-100 text-green-600 p-3 rounded mb-4 text-xs">
						<?= $this->session->flashdata('message') ?>
					</div>
				<?php endif; ?>

				<form class="space-y-4 max-w-[320px]" action="<?= base_url('auth/login') ?>" method="post">
					<input
						class="w-full rounded-lg bg-[#f7f8fa] border border-transparent focus:border-[#3a7a3a] focus:ring-1 focus:ring-[#3a7a3a] text-xs text-gray-700 px-4 py-3 placeholder:text-gray-400 outline-none"
						placeholder="Your username" required type="text" name="username"
						value="<?= set_value('username') ?>" />
					<?= form_error('username', '<small class="text-red-500 text-xs">', '</small>') ?>

					<input
						class="w-full rounded-lg bg-[#f7f8fa] border border-transparent focus:border-[#3a7a3a] focus:ring-1 focus:ring-[#3a7a3a] text-xs text-gray-700 px-4 py-3 placeholder:text-gray-400 outline-none"
						placeholder="Your password" required type="password" name="password" />
					<?= form_error('password', '<small class="text-red-500 text-xs">', '</small>') ?>

					<a class="text-[10px] text-[#3a7a3a] font-semibold hover:underline inline-block" href="#">
						Forgot password?
					</a>

					<button class="w-full bg-black text-white text-[10px] font-semibold rounded-lg py-3 mt-4"
						type="submit">
						Next Step
					</button>
				</form>
			</div>
			<div class="text-[9px] text-gray-400 mt-12 max-w-[320px]">
				<p class="text-center">
					Need help?
					<br />
					<a class="text-[#3a7a3a] font-semibold hover:underline" href="mailto:support@bonsante.com">
						support@bonsante.com
					</a>
				</p>
				<p class="mt-6 text-center text-[8px] text-gray-300">
					All rights reserved Bettrise Technologies 2025
				</p>
			</div>
		</section>
		<!-- Right side -->
		<section class="relative w-full md:w-1/2 flex items-center justify-center bg-[#d9d9d9]">
			<img alt="Green plant in wooden pots on white table with gray background"
				class="object-cover w-full h-full rounded-tr-[40px] rounded-br-[40px]" height="600"
				src="https://storage.googleapis.com/a1aa/image/dd557fe9-8066-487b-3de9-0a883d995474.jpg" width="600" />
			<div
				class="absolute bg-white bg-opacity-30 backdrop-blur-md rounded-xl p-6 max-w-[320px] top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
				<div class="mb-4">
					<i aria-hidden="true" class="fas fa-circle-notch fa-spin text-white text-lg"></i>
				</div>
				<h3 class="text-white text-lg font-semibold mb-2 leading-snug">
					Pengobatan kanker kini lebih presisi - Cancer treatment is now more precise
				</h3>
				<p class="text-white text-xs leading-tight">
					Laporan interaktif mencakup informasi terbaru tentang perawatan yang disetujui atau sedang diuji
					untuk setiap pasien / The interactive report includes updated information about approved or
					investigational treatments for each patient.
				</p>
			</div>
		</section>
	</main>
</body>

</html>