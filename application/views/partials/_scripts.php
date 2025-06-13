<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script> Inisialisasi grafik dengan data awal const ctx = document.getElementById('statistikChart').getContext('2d'); const statistikChart = new Chart(ctx, { type: 'bar', data: { labels: , datasets: [{ label: 'Pengajuan', data: , backgroundColor: 'rgba(75, 192, 192, 0.6)', borderColor: 'rgba(75, 192, 192, 1)', borderWidth: 1 }, { label: 'Pengaduan', data: , backgroundColor: 'rgba(255, 99, 132, 0.6)', borderColor: 'rgba(255, 99, 132, 1)', borderWidth: 1 }] }, options: { scales: { y: { beginAtZero: true, title: { display: true, text: 'Jumlah' } }, x: { title: { display: true, text: 'Status' } } }, plugins: { legend: { position: 'top' }, title: { display: true, text: 'Statistik Pengajuan & Pengaduan Tahun ' } } } }); Event listener untuk dropdown tahun document.getElementById('tahunFilter').addEventListener('change', function () { const newTahun = this.value; fetch(`/${newTahun}`).then(response => response.json()).then(data => { statistikChart.data.labels = data.labels; statistikChart.data.datasets[0].data = data.pengajuan_data; statistikChart.data.datasets[1].data = data.pengaduan_data; statistikChart.options.plugins.title.text = `Statistik Pengajuan & Pengaduan Tahun ${newTahun}`; statistikChart.update(); }).catch(error => console.error('Error fetching data:', error)); }); </script>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Bootstrap JS Bundle (dengan Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- jQuery Easing -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

<!-- Custom Script (jika perlu) -->
<?php if (file_exists(FCPATH . 'js/admin.min.js')): ?>
	<script src="<?= base_url('js/admin.min.js') ?>"></script>
<?php endif; ?>
