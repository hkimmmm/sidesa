<div class="max-w-6xl mx-auto">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-bold text-gray-800">Daftar Prasarana</h1>
        <div class="flex space-x-2">
            <a href="#"
                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                Tambah Prasarana
            </a>
        </div>
    </div>

    <div class="mb-6 bg-white rounded-lg shadow-md p-4">
        <form method="get" action="#"
            class="flex flex-col md:flex-row md:items-center space-y-2 md:space-y-0 md:space-x-4">
            <div class="flex-1">
                <label for="search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="text" name="search" id="search"
                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        placeholder="Cari nama atau jenis prasarana">
                </div>
            </div>
            <button type="submit"
                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                Cari
            </button>
        </form>
    </div>

    <!-- Data sementara -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Prasarana</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lokasi</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Foto</th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Data 1 -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">1</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">Gedung Serbaguna</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Bangunan</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Jl. Utama No. 1</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <img src="https://images.unsplash.com/photo-1564501049412-61c2a3083791?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&h=100&q=80" 
                                 alt="Gedung Serbaguna"
                                 class="h-10 w-10 rounded-md object-cover">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                            <a href="#" class="text-red-600 hover:text-red-900" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</a>
                        </td>
                    </tr>
                    
                    <!-- Data 2 -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">2</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">Lapangan Basket</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Olahraga</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Belakang Gedung A</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <img src="https://images.unsplash.com/photo-1546519638-68e109498ffc?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&h=100&q=80" 
                                 alt="Lapangan Basket"
                                 class="h-10 w-10 rounded-md object-cover">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                            <a href="#" class="text-red-600 hover:text-red-900" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</a>
                        </td>
                    </tr>
                    
                    <!-- Data 3 -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">3</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">Lab Komputer</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Pendidikan</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Gedung B Lantai 2</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <img src="https://images.unsplash.com/photo-1551269901-5c5e14c25df7?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&h=100&q=80" 
                                 alt="Lab Komputer"
                                 class="h-10 w-10 rounded-md object-cover">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                            <a href="#" class="text-red-600 hover:text-red-900" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</a>
                        </td>
                    </tr>
                    
                    <!-- Data 4 -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">4</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">Perpustakaan</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Pendidikan</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Gedung C Lantai 1</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <img src="https://images.unsplash.com/photo-1589998059171-988d887df646?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&h=100&q=80" 
                                 alt="Perpustakaan"
                                 class="h-10 w-10 rounded-md object-cover">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                            <a href="#" class="text-red-600 hover:text-red-900" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</a>
                        </td>
                    </tr>
                    
                    <!-- Data 5 -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">5</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">Taman Parkir</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Parkir</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Area Timur Kampus</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <img src="https://images.unsplash.com/photo-1586521995568-39abaa0c2311?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&h=100&q=80" 
                                 alt="Taman Parkir"
                                 class="h-10 w-10 rounded-md object-cover">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                            <a href="#" class="text-red-600 hover:text-red-900" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
