<html lang="id">

<head>
	<meta charset="utf-8" />
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<title><?= $title ?? 'User Registration' ?></title>
	<script src="https://cdn.tailwindcss.com"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
	<style>
		body {
			font-family: 'Inter', sans-serif;
		}
	</style>
</head>

<body class="bg-[#e6f1e9] py-10 px-4 flex justify-center">
	<main class="max-w-6xl w-full bg-white rounded-[40px] flex flex-col md:flex-row overflow-hidden shadow-lg max-h-screen overflow-auto">

		<!-- Left side -->
		<section class="flex flex-col justify-between p-8 md:p-8 w-full md:w-1/2 rounded-t-[40px] md:rounded-tl-[40px] md:rounded-bl-[40px]">
			<div>
				<div class="flex justify-between items-center mb-12">
					<h1 class="text-xl font-semibold text-black">
						Procot
					</h1>
					<div class="flex items-center space-x-1 text-xs text-gray-700 font-semibold select-none">
						<img alt="Indonesian Flag" class="inline-block" height="15" src="https://flagcdn.com/w20/id.png" width="20" />
						<span>ID</span>
						<i class="fas fa-caret-down text-[10px]"></i>
					</div>
				</div>
				<h2 class="text-2xl font-bold text-black mb-2">Daftar Sekarang</h2>
				<p class="text-xs text-gray-500 mb-8 max-w-[320px]">
					Buat akun baru untuk mengakses layanan kesehatan kami
				</p>
				<form class="space-y-4 max-w-[320px]">
					<input class="w-full rounded-lg bg-[#f7f8fa] border border-transparent focus:border-[#3a7a3a] focus:ring-1 focus:ring-[#3a7a3a] text-xs text-gray-700 px-4 py-3 placeholder:text-gray-400 outline-none" placeholder="Full name" required type="text" />
					<input class="w-full rounded-lg bg-[#f7f8fa] border border-transparent focus:border-[#3a7a3a] focus:ring-1 focus:ring-[#3a7a3a] text-xs text-gray-700 px-4 py-3 placeholder:text-gray-400 outline-none" placeholder="Email address" required type="email" />
					<!-- Password -->
					<div class="relative w-full mb-4">
						<input id="password" type="password" placeholder="Password"
							class="w-full rounded-lg bg-[#f7f8fa] border border-transparent focus:border-[#3a7a3a] focus:ring-1 focus:ring-[#3a7a3a] text-xs text-gray-700 px-4 py-3 placeholder:text-gray-400 outline-none" required />

						<button type="button" onclick="togglePassword('password', this)" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500">
							<!-- Eye open icon -->
							<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
									d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
									d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
							</svg>
						</button>
					</div>

					<!-- Confirm Password -->
					<div class="relative w-full">
						<input id="confirm-password" type="password" placeholder="Confirm Password"
							class="w-full rounded-lg bg-[#f7f8fa] border border-transparent focus:border-[#3a7a3a] focus:ring-1 focus:ring-[#3a7a3a] text-xs text-gray-700 px-4 py-3 placeholder:text-gray-400 outline-none" required />

						<button type="button" onclick="togglePassword('confirm-password', this)" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500">
							<!-- Eye open icon -->
							<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
									d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
									d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
							</svg>
						</button>
					</div>
					<button class="w-full bg-[#3a7a3a] text-white text-[10px] font-semibold rounded-lg py-3 mt-4" type="submit">
						Register
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
					© 2025 Bettrise Technologies. All rights reserved.
				</p>
			</div>
		</section>

		<!-- Right side -->
		<section class="relative w-full md:w-1/2 flex items-center justify-center bg-[#d9d9d9]">
			<img alt="Healthcare registration illustration" class="object-cover w-full h-full rounded-tr-[40px] rounded-br-[40px]" height="600" src="https://i.pinimg.com/736x/bd/bf/88/bdbf88cba1a26787647f3b3903f53f3f.jpg" width="600" />
			<div class="absolute bg-white bg-opacity-30 backdrop-blur-md rounded-xl p-6 max-w-[320px] top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
				<div class="mb-4">
					<i class="fas fa-user-plus text-white text-lg"></i>
				</div>
				<h3 class="text-white text-lg font-semibold mb-2 leading-snug">
					Register now for a better healthcare experience
				</h3>
				<p class="text-white text-xs leading-tight">
					Daftarkan diri Anda hari ini dan mulai kelola layanan kesehatan dengan mudah / Sign up today and start managing your healthcare effortlessly.
				</p>
			</div>
		</section>
	</main>
	<script>
		function togglePassword(id, btn) {
			const input = document.getElementById(id);
			const isPassword = input.type === 'password';
			input.type = isPassword ? 'text' : 'password';

			// Ganti ikon
			btn.innerHTML = isPassword ?
				`<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.27-2.944-9.543-7a10.05 10.05 0 012.379-3.763M6.7 6.7a10.012 10.012 0 015.3-1.7c4.478 0 8.27 2.944 9.543 7a10.05 10.05 0 01-1.668 3.043M3 3l18 18" />
        </svg>` :
				`<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
        </svg>`;
		}
	</script>
</body>

</html>
