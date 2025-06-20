<header class="bg-white shadow-sm w-full">
	<div class="flex items-center justify-between p-3 md:p-5">
		<!-- Mobile menu button -->
		<button id="sidebar-toggle" class="md:hidden text-gray-500 hover:text-gray-600">
			<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
			</svg>
		</button>

		<!-- Search bar -->
		<div class="hidden md:block flex-1 max-w-md mx-4">
			<div class="relative">
				<div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
					<svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
						<path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
					</svg>
				</div>
				<input type="text" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Search...">
			</div>
		</div>

		<!-- User profile and notifications -->
		<div class="flex items-center space-x-4">
			<button class="p-1 text-gray-500 hover:text-gray-600 focus:outline-none">
				<svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
				</svg>
			</button>

			<div class="relative">
				<button id="user-menu-button" class="flex items-center space-x-2 focus:outline-none">
					<span class="hidden md:inline-block text-sm font-medium text-gray-700"><?= $this->session->userdata('nama') ?? 'Pengguna' ?></span>
				</button>
			</div>
		</div>
	</div>
</header>
