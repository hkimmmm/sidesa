<div class="max-w-4xl mx-auto">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-bold text-gray-800">Statistik Penduduk</h1>
        <a href="#" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
            Unduh Laporan
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Distribusi Jenis Kelamin</h2>
        <canvas id="genderChart" class="w-full h-64"></canvas>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Distribusi Kelompok Umur</h2>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kelompok Umur</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Persentase</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">0-17 Tahun</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">300</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">30%</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">18-40 Tahun</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">400</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">40%</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">41-60 Tahun</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">200</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">20%</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">>60 Tahun</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">100</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">10%</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Distribusi Pekerjaan</h2>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pekerjaan</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Persentase</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Petani</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">250</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">25%</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">PNS</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">150</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">15%</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Wirausaha</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">300</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">30%</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Lainnya</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">300</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">30%</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('genderChart').getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Laki-laki', 'Perempuan'],
                datasets: [{
                    data: [550, 450],
                    backgroundColor: ['#3B82F6', '#EF4444'],
                    borderColor: ['#ffffff', '#ffffff'],
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.label || '';
                                let value = context.parsed || 0;
                                let total = context.dataset.data.reduce((a, b) => a + b, 0);
                                let percentage = ((value / total) * 100).toFixed(1);
                                return `${label}: ${value} (${percentage}%)`;
                            }
                        }
                    }
                }
            }
        });
    });
</script>
