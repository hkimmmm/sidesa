<!-- Di bagian head atau sebelum </body> -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Script khusus untuk halaman ini -->
<script>
	// Chart.js Initialization
	function initCharts() {
		const ctx = document.getElementById('anggaranChart')?.getContext('2d');
		if (ctx) {
			new Chart(ctx, {
				type: 'pie',
				data: {
					labels: ['Pendidikan', 'Kesehatan', 'Infrastruktur'],
					datasets: [{
						data: [40, 30, 30],
						backgroundColor: ['#3B82F6', '#10B981', '#F59E0B']
					}]
				}
			});
		}
	}

	// Scroll Header Effect
	function setupHeaderScroll() {
		const header = document.getElementById("mainHeader");
		if (!header) return;

		window.addEventListener("scroll", () => {
			if (window.scrollY > 50) {
				header.classList.add("bg-white", "shadow-md");
				header.classList.remove("bg-transparent");
			} else {
				header.classList.remove("bg-white", "shadow-md");
				header.classList.add("bg-transparent");
			}
		});
	}

	// Main Initialization
	document.addEventListener('DOMContentLoaded', () => {
		console.log('Dashboard Kepala Desa loaded');
		initCharts();
		setupHeaderScroll();
	});
</script>