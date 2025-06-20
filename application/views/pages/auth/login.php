<html lang="id">

<head>
	<meta charset="utf-8" />
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<title><?= $title ?? 'Login Admin Desa' ?></title>
	<script src="https://cdn.tailwindcss.com"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;display=swap" rel="stylesheet" />
	<style>
		body {
			font-family: 'Inter', sans-serif;
			background-color: #f0f7f4;
		}

		.bg-desa {
			background-color: #2b8a3e;
		}

		.text-desa {
			color: #2b8a3e;
		}

		.border-desa {
			border-color: #2b8a3e;
		}
	</style>
</head>

<body class="min-h-screen flex items-center justify-center p-4">
	<main class="max-w-4xl w-full bg-white rounded-xl flex flex-col md:flex-row overflow-hidden shadow-lg">
		<!-- Left side - Login Form -->
		<section class="flex flex-col justify-between p-8 md:p-10 w-full md:w-1/2">
			<div>
				<div class="flex justify-between items-center mb-8">
					<div class="flex items-center">
						<img src="<?php echo base_url('assets/images/logo/kabupaten_tegal.png'); ?>" alt="Logo Desa"
							class="h-10 w-10 mr-3">
						<h1 class="text-xl font-semibold text-gray-800">
							<span class="text-desa">Sistem</span> Administrasi Desa
						</h1>
					</div>
					<div class="flex items-center space-x-1 text-xs text-gray-700 font-semibold select-none">
						<img alt="Indonesian Flag" class="inline-block" height="15" src="https://flagcdn.com/w20/id.png"
							width="20" />
						<span>ID</span>
					</div>
				</div>

				<h2 class="text-2xl font-bold text-gray-800 mb-2">Selamat Datang</h2>
				<p class="text-sm text-gray-600 mb-6">
					Silakan masuk untuk mengakses sistem administrasi desa
				</p>

				<!-- Error messages -->
				<?php if ($this->session->flashdata('error')): ?>
					<div class="bg-red-100 text-red-600 p-3 rounded mb-4 text-sm">
						<?= $this->session->flashdata('error') ?>
					</div>
				<?php endif; ?>

				<?php if ($this->session->flashdata('message')): ?>
					<div class="bg-green-100 text-green-600 p-3 rounded mb-4 text-sm">
						<?= $this->session->flashdata('message') ?>
					</div>
				<?php endif; ?>

				<form class="space-y-4" action="<?= base_url('auth/login') ?>" method="post">
					<div>
						<label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
						<input
							class="w-full rounded-lg bg-gray-50 border border-gray-200 focus:border-desa focus:ring-1 focus:ring-desa text-sm text-gray-700 px-4 py-2.5 placeholder:text-gray-400 outline-none transition"
							placeholder="Masukkan username" required type="text" name="username" id="username"
							value="<?= set_value('username') ?>" />
						<?= form_error('username', '<small class="text-red-500 text-xs">', '</small>') ?>
					</div>

					<div>
						<label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
						<input
							class="w-full rounded-lg bg-gray-50 border border-gray-200 focus:border-desa focus:ring-1 focus:ring-desa text-sm text-gray-700 px-4 py-2.5 placeholder:text-gray-400 outline-none transition"
							placeholder="Masukkan password" required type="password" name="password" id="password" />
						<?= form_error('password', '<small class="text-red-500 text-xs">', '</small>') ?>
					</div>

					<div class="flex items-center justify-between">
						<div class="flex items-center">
							<input id="remember" name="remember" type="checkbox"
								class="h-4 w-4 text-desa focus:ring-desa border-gray-300 rounded">
							<label for="remember" class="ml-2 block text-sm text-gray-700">Ingat saya</label>
						</div>
						<a class="text-sm text-desa font-medium hover:underline" href="#">
							Lupa password?
						</a>
					</div>

					<button
						class="w-full bg-desa text-white text-sm font-medium rounded-lg py-3 mt-2 hover:bg-green-700 transition"
						type="submit">
						Masuk
					</button>
				</form>
			</div>
			<div class="text-xs text-gray-500 mt-8">
				<p class="text-center">
					Butuh bantuan? Hubungi <a class="text-desa font-medium hover:underline"
						href="mailto:admin@desa.id">admin@desa.id</a>
				</p>
				<p class="mt-4 text-center text-xs text-gray-400">
					© <?= date('Y') ?> Sistem Administrasi Desa. All rights reserved.
				</p>
			</div>
		</section>

		<!-- Right side - Image -->
		<section class="relative w-full md:w-1/2 flex items-center justify-center bg-gray-100 hidden md:flex">
			<img alt="Pemandangan desa dengan sawah dan gunung" class="object-cover w-full h-full"
				src="<?php echo base_url('assets/images/kel_procot.png'); ?>" />
			<div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center p-6">
				<div class="text-white text-center">
					<h3 class="text-xl font-bold mb-3">Selamat Datang di Sistem Administrasi Desa</h3>
					<p class="text-sm">
						Sistem terpadu untuk mengelola administrasi, kependudukan, dan pelayanan desa secara digital.
					</p>
				</div>
			</div>
		</section>
	</main>
</body>

</html>
