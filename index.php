
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
</head>

<body>
  <div class="min-h-screen bg-gradient-to-b from-[#1A1F2C] to-[#2E2A4A] text-white">
    <!-- {/* Header/Navbar */} -->
    <?php include 'components/navbar.php'; ?>

   <!-- Hero Section -->
   <section class="py-12 md:pt-34 md:py-20 relative pt-28">
      <div class="container mx-auto px-6">
        <div class="grid md:grid-cols-2 gap-12 items-center">
          <div class="space-y-6">
            <h1 class="text-4xl md:text-6xl font-bold leading-tight">Wujudkan Perjalanan Impian Anda <?= $isLoggedIn ?  "<button>tes</button>" :  '' ?><span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-blue-500">Sekarang</span></h1>
            <p class="text-lg md:text-xl text-gray-300">Nikmati pengalaman sewa mobil premium dengan pemesanan yang mudah dan layanan luar biasa. Perjalanan Anda dimulai di sini.</p>
            <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
              <a href="#booking-section" class="px-8 py-3 bg-gradient-to-r from-purple-600 to-blue-500 rounded-lg text-center font-medium hover:opacity-90 transition-opacity">Pesan Sekarang</a>
              <a href="#" class="px-8 py-3 border border-purple-400 rounded-lg text-center font-medium hover:bg-purple-400 hover:text-gray-900 transition-colors">Lihat Armada</a>
            </div>
          </div>
          <div class="rounded-lg shadow-2xl ">
            <img src="https://www.assarent.co.id/upload/image/home_1.png" alt="Mobil Premium" class="w-full h-auto transform hover:scale-105 transition-transform duration-300" />
          </div>
        </div>
      </div>

      <!-- Decorative elements -->
      <div class="absolute top-1/4 right-0 w-64 h-64 bg-purple-600 rounded-full filter blur-3xl opacity-10"></div>
      <div class="absolute bottom-0 left-10 w-72 h-72 bg-blue-600 rounded-full filter blur-3xl opacity-10"></div>
    </section>

     <!-- Featured Vehicles Section -->
     <section class="py-16 bg-gray-900 bg-opacity-30" id="vehicles">
      <div class="container mx-auto px-6">
        <div class="text-center mb-12">
          <h2 class="text-3xl font-bold">Kendaraan Unggulan</h2>
          <p class="text-gray-300 mt-2">Jelajahi pilihan kendaraan premium kami</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <!-- Vehicle Card 1 -->
          <div class="vehicle-card bg-gray-800 bg-opacity-50 rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300 border border-gray-700 hover:border-purple-500 cursor-pointer">
            <div class="relative">
              <div class="absolute top-0 right-0 bg-gradient-to-l from-purple-600 to-blue-500 text-white px-4 py-1 rounded-bl-lg font-medium">Premium</div>
              <img src="https://images.unsplash.com/photo-1620891549027-942fdc95d3f5?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8dGVzbGF8ZW58MHx8MHx8fDA%3D" alt="Mobil Mewah" class="w-full h-48 object-cover" />
            </div>
            <div class="p-6">
              <h3 class="text-xl font-bold">Tesla Model S</h3>
              <div class="flex items-center mt-2">
                <div class="flex text-yellow-400">
                  <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                  </svg>
                  <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                  </svg>
                  <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                  </svg>
                  <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                  </svg>
                  <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3 .921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784 .57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.8 8.937c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                  </svg>
                </div>
                <span class="ml-2 text-gray-300">(48 ulasan)</span>
              </div>
              <div class="mt-4 flex justify-between items-center">
                <span class="text-gray-300">Listrik • Otomatis</span>
                <span class="font-bold text-xl">Rp 1.800.000/hari</span>
              </div>
              <div class="mt-4 grid grid-cols-2 gap-2">
                <div class="bg-gray-700 bg-opacity-50 rounded p-2 text-center text-sm">
                  <span class="block text-gray-300">Jarak Tempuh</span>
                  <span class="font-medium">480 km</span>
                </div>
                <div class="bg-gray-700 bg-opacity-50 rounded p-2 text-center text-sm">
                  <span class="block text-gray-300">Kursi</span>
                  <span class="font-medium">5</span>
                </div>
              </div>
              <button class="mt-6 w-full py-2 bg-gradient-to-r from-purple-600 to-blue-500 rounded-lg hover:opacity-90 transition-opacity font-medium">Sewa Sekarang</button>
            </div>
          </div>

          <!-- Vehicle Card 2 -->
          <div class="vehicle-card bg-gray-800 bg-opacity-50 rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300 border border-gray-700 hover:border-purple-500 cursor-pointer">
            <div class="relative">
              <div class="absolute top-0 right-0 bg-gradient-to-l from-green-600 to-teal-500 text-white px-4 py-1 rounded-bl-lg font-medium">Eco</div>
              <img src="https://images.unsplash.com/photo-1638618164682-12b986ec2a75?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8dG95b3RhJTIwcHJpdXN8ZW58MHx8MHx8fDA%3D" alt="Mobil Eco" class="w-full h-48 object-cover" />
            </div>
            <div class="p-6">
              <h3 class="text-xl font-bold">Toyota Prius</h3>
              <div class="flex items-center mt-2">
                <div class="flex text-yellow-400">
                  <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3 .921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784 .57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.8 8.937c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                  </svg>
                  <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3 .921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784 .57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.8 8.937c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                  </svg>
                  <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3 .921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784 .57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.8 8.937c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                  </svg>
                  <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3 .921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784 .57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.8 8.937c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                  </svg>
                  <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3 .921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784 .57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.8 8.937c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                  </svg>
                </div>
                <span class="ml-2 text-gray-300">(36 ulasan)</span>
              </div>
              <div class="mt-4 flex justify-between items-center">
                <span class="text-gray-300">Hibrida • Otomatis</span>
                <span class="font-bold text-xl">Rp 1.125.000/hari</span>
              </div>
              <div class="mt-4 grid grid-cols-2 gap-2">
                <div class="bg-gray-700 bg-opacity-50 rounded p-2 text-center text-sm">
                  <span class="block text-gray-300">Konsumsi BBM</span>
                  <span class="font-medium">23 km/l</span>
                </div>
                <div class="bg-gray-700 bg-opacity-50 rounded p-2 text-center text-sm">
                  <span class="block text-gray-300">Kursi</span>
                  <span class="font-medium">5</span>
                </div>
              </div>
              <button class="mt-6 w-full py-2 bg-gradient-to-r from-purple-600 to-blue-500 rounded-lg hover:opacity-90 transition-opacity font-medium">Sewa Sekarang</button>
            </div>
          </div>

          <!-- Vehicle Card 3 -->
          <div class="vehicle-card bg-gray-800 bg-opacity-50 rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300 border border-gray-700 hover:border-purple-500 cursor-pointer">
            <div class="relative">
              <div class="absolute top-0 right-0 bg-gradient-to-l from-red-600 to-orange-500 text-white px-4 py-1 rounded-bl-lg font-medium">Sport</div>
              <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Mobil Sport" class="w-full h-48 object-cover" />
            </div>
            <div class="p-6">
              <h3 class="text-xl font-bold">Porsche 911</h3>
              <div class="flex items-center mt-2">
                <div class="flex text-yellow-400">
                  <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3 .921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784 .57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.8 8.937c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                  </svg>
                  <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3 .921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784 .57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.8 8.937c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                  </svg>
                  <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3 .921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784 .57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.8 8.937c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                  </svg>
                  <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3 .921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784 .57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.8 8.937c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                  </svg>
                  <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3 .921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784 .57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.8 8.937c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                  </svg>
                </div>
                <span class="ml-2 text-gray-300">(52 ulasan)</span>
              </div>
              <div class="mt-4 flex justify-between items-center">
                <span class="text-gray-300">Bensin • Manual</span>
                <span class="font-bold text-xl">Rp 2.700.000/hari</span>
              </div>
              <div class="mt-4 grid grid-cols-2 gap-2">
                <div class="bg-gray-700 bg-opacity-50 rounded p-2 text-center text-sm">
                  <span class="block text-gray-300">0-100 km/j</span>
                  <span class="font-medium">3.2s</span>
                </div>
                <div class="bg-gray-700 bg-opacity-50 rounded p-2 text-center text-sm">
                  <span class="block text-gray-300">Kursi</span>
                  <span class="font-medium">2</span>
                </div>
              </div>
              <button class="mt-6 w-full py-2 bg-gradient-to-r from-purple-600 to-blue-500 rounded-lg hover:opacity-90 transition-opacity font-medium">Sewa Sekarang</button>
            </div>
          </div>
        </div>

        <div class="text-center mt-12">
          <a href="vehicles.php" class="px-8 py-3 border border-purple-400 rounded-lg font-medium hover:bg-purple-400 hover:text-gray-900 transition-colors inline-block">Lihat Semua Kendaraan</a>
        </div>
      </div>
    </section>

    <!-- Booking Section -->
    <section id="booking-section" class="py-16 relative">
      <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto bg-gray-800 bg-opacity-50 rounded-xl p-8 shadow-2xl border border-gray-700 relative z-20">
          <div class="text-center mb-10">
            <h2 class="text-3xl font-bold">Pesan Mobil Impian Anda</h2>
            <p class="text-gray-300 mt-2">Lengkapi langkah-langkah di bawah ini untuk memesan kendaraan Anda</p>
          </div>

          <!-- Progress Bar -->
          <div class="mb-10">
            <div class="flex justify-between items-center">
              <div class="w-full flex items-center">
                <div class="relative flex flex-col items-center">
                  <div class="progress-step active w-10 h-10 flex items-center justify-center rounded-full bg-gradient-to-r from-purple-600 to-blue-500 z-10 text-white font-medium">1</div>
                  <div class="text-sm mt-2">Lokasi</div>
                </div>
                <div class="flex-1 h-1 bg-gray-700">
                  <div class="h-full bg-gradient-to-r from-purple-600 to-blue-500 w-1/3"></div>
                </div>
                <div class="relative flex flex-col items-center">
                  <div class="progress-step w-10 h-10 flex items-center justify-center rounded-full bg-gray-700 z-10 text-white font-medium">2</div>
                  <div class="text-sm mt-2">Kendaraan</div>
                </div>
                <div class="flex-1 h-1 bg-gray-700">
                  <div class="h-full bg-gradient-to-r from-purple-600 to-blue-500 w-0"></div>
                </div>
                <div class="relative flex flex-col items-center">
                  <div class="progress-step w-10 h-10 flex items-center justify-center rounded-full bg-gray-700 z-10 text-white font-medium">3</div>
                  <div class="text-sm mt-2">Detail</div>
                </div>
                <div class="flex-1 h-1 bg-gray-700">
                  <div class="h-full bg-gradient-to-r from-purple-600 to-blue-500 w-0"></div>
                </div>
                <div class="relative flex flex-col items-center">
                  <div class="progress-step w-10 h-10 flex items-center justify-center rounded-full bg-gray-700 z-10 text-white font-medium">4</div>
                  <div class="text-sm mt-2">Konfirmasi</div>
                </div>
              </div>
            </div>
          </div>

          <!-- Form Steps -->
          <form id="booking-form" method="post" action="process_booking.php" enctype="multipart/form-data">
            <div class="form-step">
              <h3 class="text-xl font-semibold mb-6">Pilih Lokasi Penjemputan & Pengembalian</h3>

              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                  <label class="block mb-2 text-gray-300">Lokasi Penjemputan</label>
                  <select name="pickup_location" id="pickup_location" class="w-full p-3 rounded-lg bg-gray-700 text-white border border-gray-600 focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50 relative z-30" required>
                    <option value="">Pilih Lokasi Penjemputan</option>
                    <?php
                    include 'get_locations.php';
                    if (!empty($pickup_locations)) {
                      foreach ($pickup_locations as $location) {
                        echo "<option value='{$location['id']}'>{$location['nama']}</option>";
                      }
                    }
                    ?>
                  </select>
                </div>
                <div>
                  <label class="block mb-2 text-gray-300">Lokasi Pengembalian</label>
                  <select name="return_location" id="return_location" class="w-full p-3 rounded-lg bg-gray-700 text-white border border-gray-600 focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50 relative z-30" required>
                    <option value="">Pilih Lokasi Pengembalian</option>
                    <?php
                    if (!empty($return_locations)) {
                      foreach ($return_locations as $location) {
                        echo "<option value='{$location['id']}'>{$location['nama']}</option>";
                      }
                    }
                    ?>
                  </select>
                </div>
                <div>
                  <label class="block mb-2 text-gray-300">Tanggal Penjemputan</label>
                  <input type="date" name="pickup_date" id="pickup_date" class="w-full p-3 rounded-lg bg-gray-700 text-white border border-gray-600 focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50 relative z-30" required min="<?php echo date('Y-m-d'); ?>" />
                </div>
                <div>
                  <label class="block mb-2 text-gray-300">Tanggal Pengembalian</label>
                  <input type="date" name="return_date" id="return_date" class="w-full p-3 rounded-lg bg-gray-700 text-white border border-gray-600 focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50 relative z-30" required />
                </div>
                <div>
                  <label class="block mb-2 text-gray-300">Waktu Penjemputan</label>
                  <input type="time" name="pickup_time" id="pickup_time" class="w-full p-3 rounded-lg bg-gray-700 text-white border border-gray-600 focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50 relative z-30" required />
                </div>
                <div>
                  <label class="block mb-2 text-gray-300">Waktu Pengembalian</label>
                  <input type="time" name="return_time" id="return_time" class="w-full p-3 rounded-lg bg-gray-700 text-white border border-gray-600 focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50 relative z-30" required />
                </div>
              </div>
              <div class="mt-8 flex justify-end">
                <?php if($isLoggedIn){
                  echo '
                  <button type="button" class="next-step px-8 py-3 bg-gradient-to-r from-purple-600 to-blue-500 rounded-lg hover:opacity-90 transition-opacity font-medium">Langkah Berikutnya</button>
                  ';
                }else{
                  echo '
                  <a href="auth/login.php" class=" px-8 py-3 bg-gradient-to-r from-purple-600 to-blue-500 rounded-lg hover:opacity-90 transition-opacity font-medium">Masuk</a>
                  ';
                }
                ?>
              </div>
            </div>

            <div class="form-step hidden">
              <h3 class="text-xl font-semibold mb-6">Pilih Kendaraan Anda</h3>
              <div class="grid grid-cols-1 md:grid-cols-2 gap-6" id="vehicle-container">
                <?php
                include 'get_vehicles.php';
                foreach ($vehicles as $vehicle) {
                  $jenis_class = '';
                  $jenis_color = '';

                  switch ($vehicle['jenis_nama']) {
                    case 'Premium':
                      $jenis_class = 'from-purple-600 to-blue-500';
                      break;
                    case 'Eco':
                      $jenis_class = 'from-green-600 to-teal-500';
                      break;
                    case 'Sport':
                      $jenis_class = 'from-red-600 to-orange-500';
                      break;
                    case 'SUV':
                      $jenis_class = 'from-yellow-600 to-amber-500';
                      break;
                  }

                  echo "<div class='vehicle-card bg-gray-700 bg-opacity-50 rounded-lg p-4 cursor-pointer hover:bg-gray-600 transition-colors border border-gray-600 hover:border-purple-500' data-vehicle-id='{$vehicle['id']}'>
                  <div class='flex items-center'>
                    <img src='dashboard/uploads/armada/{$vehicle['gambar']}' alt='{$vehicle['merk']}' class='w-24 h-24 object-cover rounded-lg' />
                    <div class='ml-4'>
                      <div class='flex justify-between items-center'>
                        <h4 class='font-semibold'>{$vehicle['merk']}</h4>
                        <span class='px-2 py-1 text-xs bg-gradient-to-r {$jenis_class} rounded-full text-white'>{$vehicle['jenis_nama']}</span>
                      </div>
                      <div class='flex items-center mt-1 text-yellow-400'>
                        <svg class='w-4 h-4' fill='currentColor' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'>
                          <path d='M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3 .921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784 .57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.8 8.937c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z'></path>
                        </svg>
                        <span class='ml-1'>{$vehicle['rating']}</span>
                      </div>
                      <p class='text-gray-300 text-sm mt-1'>{$vehicle['deskripsi']}</p>
                      <div class='font-bold mt-1'>Rp {$vehicle['harga']}/hari</div>
                    </div>
                  </div>
                </div>";
                }
                ?>
                <input type="hidden" name="vehicle_id" id="selected_vehicle_id" required>
              </div>
              <div class="mt-8 flex justify-between">
                <button type="button" class="prev-step px-8 py-3 border border-purple-400 rounded-lg hover:bg-purple-400 hover:text-gray-900 transition-colors font-medium">Sebelumnya</button>
                <button type="button" class="next-step px-8 py-3 bg-gradient-to-r from-purple-600 to-blue-500 rounded-lg hover:opacity-90 transition-opacity font-medium">Langkah Berikutnya</button>
              </div>
            </div>

            <div class="form-step hidden">
              <h3 class="text-xl font-semibold mb-6">Informasi Pribadi</h3>
              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                  <label class="block mb-2 text-gray-300">Nama Depan</label>
                  <input type="text" name="first_name" id="first_name" class="w-full p-3 rounded-lg bg-gray-700 text-white border border-gray-600 focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50 relative z-30" placeholder="John" required />
                </div>
                <div>
                  <label class="block mb-2 text-gray-300">Nama Belakang</label>
                  <input type="text" name="last_name" id="last_name" class="w-full p-3 rounded-lg bg-gray-700 text-white border border-gray-600 focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50 relative z-30" placeholder="Doe" required />
                </div>
                <div>
                  <label class="block mb-2 text-gray-300">Foto KTP</label>
                  <input type="file" name="ktp_image" id="ktp_image" accept="image/*" class="w-full p-3 rounded-lg bg-gray-700 text-white border border-gray-600 focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50 relative z-30" required />
                  <p class="mt-1 text-sm text-gray-400">Unggah foto KTP yang jelas dan tidak buram</p>
                </div>
                <div>
                  <label class="block mb-2 text-gray-300">Nomor Telepon</label>
                  <input type="tel" name="phone" id="phone" class="w-full p-3 rounded-lg bg-gray-700 text-white border border-gray-600 focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50 relative z-30" placeholder="+62 812 3456 7890" required />
                </div>
                <div class="md:col-span-2">
                  <label class="block mb-2 text-gray-300">Keperluan Sewa</label>
                  <select name="purpose" id="purpose" class="w-full p-3 rounded-lg bg-gray-700 text-white border border-gray-600 focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50 relative z-30" required>
                    <option value="">Pilih Keperluan</option>
                    <option value="Perjalanan Bisnis">Perjalanan Bisnis</option>
                    <option value="Liburan">Liburan</option>
                    <option value="Pernikahan">Pernikahan</option>
                    <option value="Sesi Foto/Video">Sesi Foto/Video</option>
                    <option value="Perjalanan Keluarga">Perjalanan Keluarga</option>
                    <option value="Lainnya">Lainnya</option>
                  </select>
                </div>
                <div class="md:col-span-2">
                  <label class="block mb-2 text-gray-300">Komentar/Permintaan Khusus</label>
                  <textarea
                    name="comments"
                    id="comments"
                    class="w-full p-3 rounded-lg bg-gray-700 text-white border border-gray-600 focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50 relative z-30"
                    rows="4"
                    placeholder="Masukkan permintaan khusus atau informasi tambahan tentang kebutuhan sewa Anda..."></textarea>
                </div>
                <div class="md:col-span-2">
                  <label class="flex items-center">
                    <input type="checkbox" name="terms" id="terms" class="w-5 h-5 rounded text-purple-600 focus:ring-purple-500" required />
                    <span class="ml-2 text-gray-300">Saya setuju dengan <a href="#" class="text-purple-400 hover:underline">syarat dan ketentuan</a>.</span>
                  </label>
                </div>
              </div>
              <div class="mt-8 flex justify-between">
                <button type="button" class="prev-step px-8 py-3 border border-purple-400 rounded-lg hover:bg-purple-400 hover:text-gray-900 transition-colors font-medium">Sebelumnya</button>
                <button type="button" class="next-step px-8 py-3 bg-gradient-to-r from-purple-600 to-blue-500 rounded-lg hover:opacity-90 transition-opacity font-medium">Langkah Berikutnya</button>
              </div>
            </div>

            <div class="form-step hidden">
              <h3 class="text-xl font-semibold mb-6">Ringkasan Pemesanan</h3>
              <div class="bg-gray-700 bg-opacity-50 rounded-lg p-6 mb-6">
                <div class="flex items-center justify-between mb-4">
                  <h4 class="text-lg font-semibold" id="summary-vehicle-name">Pilih kendaraan</h4>
                  <span class="px-4 py-1 bg-gradient-to-r from-purple-600 to-blue-500 rounded-full text-sm font-medium" id="summary-vehicle-type">-</span>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                  <div>
                    <div class="text-gray-300 mb-1">Lokasi Penjemputan</div>
                    <div class="font-medium" id="summary-pickup-location">-</div>
                  </div>
                  <div>
                    <div class="text-gray-300 mb-1">Lokasi Pengembalian</div>
                    <div class="font-medium" id="summary-return-location">-</div>
                  </div>
                  <div>
                    <div class="text-gray-300 mb-1">Tanggal & Waktu Penjemputan</div>
                    <div class="font-medium" id="summary-pickup-datetime">-</div>
                  </div>
                  <div>
                    <div class="text-gray-300 mb-1">Tanggal & Waktu Pengembalian</div>
                    <div class="font-medium" id="summary-return-datetime">-</div>
                  </div>
                </div>
                <div class="h-px bg-gray-600 my-6"></div>
                <div class="space-y-2">
                  <div class="flex justify-between">
                    <span class="text-gray-300" id="summary-days">- hari × Rp -/hari</span>
                    <span class="font-medium" id="summary-subtotal">Rp 0</span>
                  </div>
                  <div class="h-px bg-gray-600 my-2"></div>
                  <div class="flex justify-between text-lg font-bold">
                    <span>Total</span>
                    <span id="summary-total">Rp 0</span>
                  </div>
                </div>
              </div>
              <div class="bg-gray-700 bg-opacity-50 rounded-lg p-6">
                <h4 class="text-lg font-semibold mb-4">Informasi Pembayaran</h4>
                <p class="text-gray-300 mb-4">Pembayaran akan dilakukan saat pengambilan kendaraan.</p>
                <div class="p-4 bg-gray-800 rounded-lg">
                  <div class="flex items-center">
                    <svg class="w-6 h-6 text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-gray-300">Anda dapat membayar dengan tunai, kartu kredit, atau transfer bank saat pengambilan kendaraan.</p>
                  </div>
                </div>
              </div>
              <div class="mt-8 flex justify-between">
                <button type="button" class="prev-step px-8 py-3 border border-purple-400 rounded-lg hover:bg-purple-400 hover:text-gray-900 transition-colors font-medium">Sebelumnya</button>
                <button type="submit" id="complete-booking" class="px-8 py-3 bg-gradient-to-r from-purple-600 to-blue-500 rounded-lg hover:opacity-90 transition-opacity font-medium">Selesaikan Pemesanan</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 bg-gray-900 bg-opacity-30">
      <div class="container mx-auto px-6">
        <div class="text-center mb-12">
          <h2 class="text-3xl font-bold">Mengapa Memilih Kami</h2>
          <p class="text-gray-300 mt-2">Rasakan keunggulan DriveEasy</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
          <div class="flex flex-col items-center text-center p-6 bg-gray-800 bg-opacity-50 rounded-lg hover:bg-opacity-70 transition-colors border border-gray-700 hover:border-purple-500">
            <div class="w-16 h-16 rounded-full bg-gradient-to-r from-purple-600 to-blue-500 flex items-center justify-center mb-4">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
            </div>
            <h3 class="text-xl font-semibold mb-2">Dukungan 24/7</h3>
            <p class="text-gray-300">Tim layanan pelanggan kami tersedia sepanjang waktu untuk membantu Anda dengan pertanyaan atau masalah apa pun.</p>
          </div>

          <div class="flex flex-col items-center text-center p-6 bg-gray-800 bg-opacity-50 rounded-lg hover:bg-opacity-70 transition-colors border border-gray-700 hover:border-purple-500">
            <div class="w-16 h-16 rounded-full bg-gradient-to-r from-purple-600 to-blue-500 flex items-center justify-center mb-4">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
              </svg>
            </div>
            <h3 class="text-xl font-semibold mb-2">Asuransi Komprehensif</h3>
            <p class="text-gray-300">Berkendara dengan tenang mengetahui Anda dilindungi oleh opsi asuransi komprehensif kami.</p>
          </div>

          <div class="flex flex-col items-center text-center p-6 bg-gray-800 bg-opacity-50 rounded-lg hover:bg-opacity-70 transition-colors border border-gray-700 hover:border-purple-500">
            <div class="w-16 h-16 rounded-full bg-gradient-to-r from-purple-600 to-blue-500 flex items-center justify-center mb-4">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M5 13l4 4L19 7"></path>
              </svg>
            </div>
            <h3 class="text-xl font-semibold mb-2">Tanpa Biaya Tersembunyi</h3>
            <p class="text-gray-300">Harga transparan tanpa kejutan. Apa yang Anda lihat adalah yang Anda bayar.</p>
          </div>

          <div class="flex flex-col items-center text-center p-6 bg-gray-800 bg-opacity-50 rounded-lg hover:bg-opacity-70 transition-colors border border-gray-700 hover:border-purple-500">
            <div class="w-16 h-16 rounded-full bg-gradient-to-r from-purple-600 to-blue-500 flex items-center justify-center mb-4">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
            </div>
            <h3 class="text-xl font-semibold mb-2">Kendaraan Premium</h3>
            <p class="text-gray-300">Armada kami terdiri dari kendaraan premium yang terawat baik untuk memastikan pengalaman berkendara yang mewah.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- {/* Testimonials Section */} -->
    <section class="py-16 relative">
      <div class="container mx-auto px-6">
        <div class="text-center mb-12">
          <h2 class="text-3xl font-bold">What Our Customers Say</h2>
          <p class="text-gray-300 mt-2">Real experiences from satisfied clients</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <div class="bg-gray-800 bg-opacity-50 rounded-lg p-6 shadow-lg border border-gray-700">
            <div class="flex items-center mb-4">
              <div class="w-12 h-12 rounded-full bg-purple-600 flex items-center justify-center text-white font-bold text-lg">JD</div>
              <div class="ml-4">
                <h4 class="font-medium">John Doe</h4>
                <div class="flex text-yellow-400">
                  <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                  </svg>
                  <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                  </svg>
                  <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                  </svg>
                  <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                  </svg>
                  <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                  </svg>
                </div>
              </div>
            </div>
            <p class="text-gray-300">"The service was exceptional from start to finish. The car was in pristine condition and the whole rental process was seamless. Will definitely use DriveEasy again!"</p>
          </div>

          <div class="bg-gray-800 bg-opacity-50 rounded-lg p-6 shadow-lg border border-gray-700">
            <div class="flex items-center mb-4">
              <div class="w-12 h-12 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold text-lg">SJ</div>
              <div class="ml-4">
                <h4 class="font-medium">Sarah Johnson</h4>
                <div class="flex text-yellow-400">
                  <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                  </svg>
                  <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                  </svg>
                  <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                  </svg>
                  <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                  </svg>
                  <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                  </svg>
                </div>
              </div>
            </div>
            <p class="text-gray-300">"I rented a Tesla Model S for a weekend trip and was blown away by how easy the process was. The booking platform is intuitive and the staff were incredibly helpful. Highly recommend!"</p>
          </div>

          <div class="bg-gray-800 bg-opacity-50 rounded-lg p-6 shadow-lg border border-gray-700">
            <div class="flex items-center mb-4">
              <div class="w-12 h-12 rounded-full bg-green-600 flex items-center justify-center text-white font-bold text-lg">MT</div>
              <div class="ml-4">
                <h4 class="font-medium">Michael Thompson</h4>
                <div class="flex text-yellow-400">
                  <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                  </svg>
                  <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                  </svg>
                  <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                  </svg>
                  <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                  </svg>
                  <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                  </svg>
                </div>
              </div>
            </div>
            <p class="text-gray-300">"As a frequent business traveler, I've used many car rental services, but DriveEasy stands out for their premium fleet and outstanding customer service. They've become my go-to rental company."</p>
          </div>
        </div>
      </div>

      <!-- {/* Decorative element */} -->
      <div class="absolute bottom-1/2 left-0 w-72 h-72 bg-purple-600 rounded-full filter blur-3xl opacity-10"></div>
    </section>

    <!-- {/* Footer Section */} -->
    <footer class="py-12 bg-gray-900 bg-opacity-70">
      <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
          <div>
            <h4 class="text-xl font-bold mb-4">DriveEasy</h4>
            <p class="text-gray-300 mb-4">Premium car rentals for all your needs. Experience luxury and convenience.</p>
            <div class="flex space-x-4">
              <a href="#" class="text-gray-300 hover:text-white transition-colors">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" />
                </svg>
              </a>
              <a href="#" class="text-gray-300 hover:text-white transition-colors">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20zm4.923 7.416c0 .109 0 .22-.005.329a7.23 7.23 0 0 1-7.255 7.255 7.21 7.21 0 0 1-3.908-1.147 5.15 5.15 0 0 0 3.798-1.063 2.56 2.56 0 0 1-2.387-1.775 2.56 2.56 0 0 0 1.152-.044 2.57 2.57 0 0 1-2.055-2.515v-.033c.346.192.739.305 1.159.319a2.57 2.57 0 0 1-.794-3.428 7.29 7.29 0 0 0 5.295 2.687 2.56 2.56 0 0 1 4.366-2.334 5.13 5.13 0 0 0 1.628-.621 2.57 2.57 0 0 1-1.126 1.417 5.12 5.12 0 0 0 1.475-.4 5.2 5.2 0 0 1-1.278 1.327c.006.11.006.22.006.33z" />
                </svg>
              </a>
              <a href="#" class="text-gray-300 hover:text-white transition-colors">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20zm0 3.802c2.067 0 2.31.007 3.127.045.752.034 1.16.16 1.43.265.36.14.613.307.882.576.269.269.436.522.576.882.105.27.23.678.265 1.43.038.817.045 1.06.045 3.127s-.007 2.31-.045 3.127c-.034.753-.16 1.162-.265 1.43-.14.36-.307.613-.576.882-.269.27-.522.436-.882.576-.27.105-.678.231-1.43.265-.817.038-1.06.045-3.127.045s-2.31-.007-3.127-.045c-.753-.034-1.162-.16-1.43-.265a2.392 2.392 0 0 1-.882-.576 2.392 2.392 0 0 1-.576-.882c-.105-.268-.231-.677-.265-1.43-.038-.817-.045-1.06-.045-3.127s.007-2.31.045-3.127c.034-.752.16-1.16.265-1.43.14-.36.307-.613.576-.882a2.392 2.392 0 0 1 .882-.576c.268-.105.677-.231 1.43-.265.817-.038 1.06-.045 3.127-.045z" />
                </svg>
              </a>
              <a href="#" class="text-gray-300 hover:text-white transition-colors">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-5 15v-3.5c0-1.1-.9-2-2-2h-1.5v-2h1.5c2.2 0 4 1.8 4 4V18h-2m-2-7h-1.5V9H14c1.2 0 2 .8 2 2s-.8 2-2 2m-5-4h-3v2h3v1.5h-2c-1.1 0-2 .9-2 2V18h5v-1.5h-3v-1h3V7z" />
                </svg>
              </a>
            </div>
          </div>

          <div>
            <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
            <ul class="space-y-2">
              <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Home</a></li>
              <li><a href="#" class="text-gray-300 hover:text-white transition-colors">About Us</a></li>
              <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Vehicles</a></li>
              <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Pricing</a></li>
              <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Contact</a></li>
            </ul>
          </div>

          <div>
            <h4 class="text-lg font-semibold mb-4">Contact Info</h4>
            <ul class="space-y-2 text-gray-300">
              <li class="flex items-start">
                <svg class="w-5 h-5 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                  <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                <span>123 Car Street, Cityville, ST 12345</span>
              </li>
              <li class="flex items-start">
                <svg class="w-5 h-5 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                </svg>
                <span>+1 (555) 123-4567</span>
              </li>
              <li class="flex items-start">
                <svg class="w-5 h-5 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                <span>info@driveeasy.com</span>
              </li>
            </ul>
          </div>

          <div>
            <h4 class="text-lg font-semibold mb-4">Newsletter</h4>
            <p class="text-gray-300 mb-4">Subscribe to our newsletter to receive updates and special offers.</p>
            <form class="flex flex-col space-y-2">
              <input type="email" placeholder="Your email address" class="p-3 rounded-lg bg-gray-700 text-white border border-gray-600 focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50" />
              <button type="submit" class="p-3 bg-gradient-to-r from-purple-600 to-blue-500 rounded-lg hover:opacity-90 transition-opacity font-medium">Subscribe</button>
            </form>
          </div>
        </div>

        <div class="border-t border-gray-700 mt-10 pt-6 flex flex-col md:flex-row justify-between items-center">
          <p class="text-gray-300 mb-4 md:mb-0">&copy; 2025 DriveEasy. All rights reserved.</p>
          <div class="flex space-x-6">
            <a href="#" class="text-gray-300 hover:text-white transition-colors">Privacy Policy</a>
            <a href="#" class="text-gray-300 hover:text-white transition-colors">Terms of Service</a>
            <a href="#" class="text-gray-300 hover:text-white transition-colors">FAQ</a>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <script src="script.js"></script>

  <!-- Script untuk menangani proses booking -->
  <script>
    // Menampilkan pesan sukses jika booking berhasil
    document.addEventListener('DOMContentLoaded', function() {
      // Cek apakah ada parameter booking_success di URL
      const urlParams = new URLSearchParams(window.location.search);
      if (urlParams.get('booking_success') === 'true') {
        alert('Booking berhasil! Kendaraan Anda telah dipesan.');
        // Hapus parameter dari URL
        window.history.replaceState({}, document.title, window.location.pathname);
      }

      // Inisialisasi form booking
      initBookingForm();
    });

    function initBookingForm() {
      // Mengatur pemilihan kendaraan
      const vehicleCards = document.querySelectorAll('.vehicle-card');
      const selectedVehicleInput = document.getElementById('selected_vehicle_id');

      vehicleCards.forEach(card => {
        card.addEventListener('click', function() {
          // Hapus kelas selected dari semua kartu
          vehicleCards.forEach(c => c.classList.remove('selected', 'border-purple-500', 'border-2'));
          // Tambahkan kelas selected ke kartu yang dipilih
          this.classList.add('selected', 'border-purple-500', 'border-2');
          // Simpan ID kendaraan yang dipilih
          selectedVehicleInput.value = this.getAttribute('data-vehicle-id');
        });
      });

      // Validasi sebelum pindah ke langkah berikutnya
      const nextButtons = document.querySelectorAll('.next-step');
      nextButtons.forEach((button, index) => {
        button.addEventListener('click', function() {
          // Validasi langkah pertama (lokasi dan tanggal)
          if (index === 0) {
            const pickupLocation = document.getElementById('pickup_location').value;
            const returnLocation = document.getElementById('return_location').value;
            const pickupDate = document.getElementById('pickup_date').value;
            const returnDate = document.getElementById('return_date').value;
            const pickupTime = document.getElementById('pickup_time').value;
            const returnTime = document.getElementById('return_time').value;

            if (!pickupLocation || !returnLocation || !pickupDate || !returnDate || !pickupTime || !returnTime) {
              alert('Silakan lengkapi semua field lokasi dan tanggal.');
              return;
            }

            // Validasi tanggal
            const today = new Date();
            today.setHours(0, 0, 0, 0);
            const pickup = new Date(pickupDate);
            const returnD = new Date(returnDate);

            if (pickup < today) {
              alert('Tanggal pengambilan tidak boleh kurang dari hari ini.');
              return;
            }

            if (returnD < pickup) {
              alert('Tanggal pengembalian tidak boleh kurang dari tanggal pengambilan.');
              return;
            }
          }

          // Validasi langkah kedua (pemilihan kendaraan)
          if (index === 1) {
            if (!selectedVehicleInput.value) {
              alert('Silakan pilih kendaraan.');
              return;
            }

            // Perbarui ringkasan booking
            updateBookingSummary();
          }

          // Validasi langkah ketiga (informasi personal)
          if (index === 2) {
            const firstName = document.getElementById('first_name').value;
            const lastName = document.getElementById('last_name').value;
            const ktp = document.getElementById('ktp').value;
            const phone = document.getElementById('phone').value;
            const purpose = document.getElementById('purpose').value;
            const terms = document.getElementById('terms').checked;

            if (!firstName || !lastName || !ktp || !phone || !purpose) {
              alert('Silakan lengkapi semua informasi personal.');
              return;
            }

            if (ktp.length !== 16) {
              alert('Nomor KTP harus terdiri dari 16 digit.');
              return;
            }

            if (!terms) {
              alert('Anda harus menyetujui syarat dan ketentuan.');
              return;
            }

            // Perbarui ringkasan booking
            updateBookingSummary();
          }
        });
      });

      // Menangani submit form
      const bookingForm = document.getElementById('booking-form');
      bookingForm.addEventListener('submit', function(e) {
        e.preventDefault();

        // Validasi final
        if (!selectedVehicleInput.value) {
          alert('Silakan pilih kendaraan.');
          return;
        }

        // Kirim data form menggunakan AJAX
        const formData = new FormData(bookingForm);

        fetch('process_booking.php', {
            method: 'POST',
            body: formData
          })
          .then(response => response.json())
          .then(data => {
            if (data.status === 'success') {
              window.location.href = data.redirect;
            } else {
              alert('Error: ' + data.message);
            }
          })
          .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat memproses booking. Silakan coba lagi.');
          });
      });
    }
  </script>
  <script src="booking-summary.js"></script>
</body>

</html>