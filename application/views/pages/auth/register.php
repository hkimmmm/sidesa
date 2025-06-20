<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $title ?? 'Registrasi Admin Desa' ?></title>
	<script src="https://cdn.tailwindcss.com"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
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
		<!-- Left side - Registration Form -->
		<section class="flex flex-col justify-between p-8 md:p-10 w-full">
			<div>
				<div class="flex justify-between items-center mb-8">
					<div class="flex items-center">
						<img src="<?php echo base_url('assets/images/logo/kabupaten_tegal.png'); ?>" alt="Logo Desa"
							class="h-10 w-10 mr-3">
						<h1 class="text-xl font-semibold text-gray-800">
							<span class="text-desa">Registrasi</span> Admin Desa
						</h1>
					</div>
					<div class="flex items-center space-x-1 text-xs text-gray-700 font-semibold select-none">
						<img alt="Indonesian Flag" class="inline-block" height="15" src="https://flagcdn.com/w20/id.png"
							width="20" />
						<span>ID</span>
					</div>
				</div>

				<h2 class="text-2xl font-bold text-gray-800 mb-2">Buat Akun Baru</h2>
				<p class="text-sm text-gray-600 mb-6">
					Silakan isi formulir berikut untuk mendaftar sebagai admin desa
				</p>

				<!-- Error messages -->
				<?php if ($this->session->flashdata('error')): ?>
					<div class="bg-red-100 text-red-600 p-3 rounded mb-4 text-sm">
						<?= $this->session->flashdata('error') ?>
					</div>
				<?php endif; ?>

				<form class="space-y-4" action="<?= site_url('auth/register') ?>" method="post">
					<div>
						<label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
						<input
							class="w-full rounded-lg bg-gray-50 border <?= form_error('nama') ? 'border-red-500' : 'border-gray-200' ?> focus:border-desa focus:ring-1 focus:ring-desa text-sm text-gray-700 px-4 py-2.5 outline-none"
							placeholder="Masukkan nama lengkap" name="nama" id="nama" type="text"
							value="<?= set_value('nama') ?>" />
						<?= form_error('nama', '<small class="text-red-500 text-xs">', '</small>') ?>
					</div>

					<div>
						<label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
						<input
							class="w-full rounded-lg bg-gray-50 border <?= form_error('email') ? 'border-red-500' : 'border-gray-200' ?> focus:border-desa focus:ring-1 focus:ring-desa text-sm text-gray-700 px-4 py-2.5 outline-none"
							placeholder="Masukkan email" name="email" id="email" type="email"
							value="<?= set_value('email') ?>" />
						<?= form_error('email', '<small class="text-red-500 text-xs">', '</small>') ?>
					</div>

					<div>
						<label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
						<input
							class="w-full rounded-lg bg-gray-50 border <?= form_error('username') ? 'border-red-500' : 'border-gray-200' ?> focus:border-desa focus:ring-1 focus:ring-desa text-sm text-gray-700 px-4 py-2.5 outline-none"
							placeholder="Masukkan username" name="username" id="username" type="text"
							value="<?= set_value('username') ?>" />
						<?= form_error('username', '<small class="text-red-500 text-xs">', '</small>') ?>
					</div>

					<div>
						<label for="no_telp" class="block text-sm font-medium text-gray-700 mb-1">No. Telepon
							(WhatsApp Aktif)</label>
						<input
							class="w-full rounded-lg bg-gray-50 border <?= form_error('no_telp') ? 'border-red-500' : 'border-gray-200' ?> focus:border-desa focus:ring-1 focus:ring-desa text-sm text-gray-700 px-4 py-2.5 outline-none"
							placeholder="Contoh: 6281234567890" name="no_telp" id="no_telp" type="text"
							value="<?= set_value('no_telp') ?>" />
						<?= form_error('no_telp', '<small class="text-red-500 text-xs">', '</small>') ?>
					</div>

					<div>
						<label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
						<input
							class="w-full rounded-lg bg-gray-50 border <?= form_error('password') ? 'border-red-500' : 'border-gray-200' ?> focus:border-desa focus:ring-1 focus:ring-desa text-sm text-gray-700 px-4 py-2.5 outline-none"
							placeholder="Masukkan password" name="password" id="password" type="password" />
						<?= form_error('password', '<small class="text-red-500 text-xs">', '</small>') ?>
					</div>

					<div>
						<label for="password_conf" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi
							Password</label>
						<input
							class="w-full rounded-lg bg-gray-50 border <?= form_error('password_conf') ? 'border-red-500' : 'border-gray-200' ?> focus:border-desa focus:ring-1 focus:ring-desa text-sm text-gray-700 px-4 py-2.5 outline-none"
							placeholder="Masukkan kembali password" name="password_conf" id="password_conf"
							type="password" />
						<?= form_error('password_conf', '<small class="text-red-500 text-xs">', '</small>') ?>
					</div>

					<button
						class="w-full bg-desa text-white text-sm font-medium rounded-lg py-3 mt-2 hover:bg-green-700 transition"
						type="submit">
						Daftar Sekarang
					</button>
				</form>
				<div class="text-center mt-4 text-sm text-gray-600">
					Sudah punya akun? <a href="<?= site_url('auth/login') ?>"
						class="text-desa font-medium hover:underline">Masuk disini</a>
				</div>
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
	</main>
</body>

</html>
