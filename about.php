<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - DriveEasy</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <div class="min-h-screen bg-gradient-to-b from-[#1A1F2C] to-[#2E2A4A] text-white">
        <!-- Header/Navbar -->
        <?php include 'components/navbar.php'; ?>

        <!-- About Hero Section -->
        <section class="py-12 md:py-20 relative">
          <div class="container mx-auto px-6">
            <div class="text-center mb-12">
              <h1 class="text-4xl md:text-6xl font-bold leading-tight">Tentang <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-blue-500">DriveEasy</span></h1>
              <p class="text-lg md:text-xl text-gray-300 mt-4 max-w-3xl mx-auto">Layanan penyewaan mobil premium Anda yang berdedikasi untuk menyediakan kendaraan luar biasa dan pengalaman pelanggan yang istimewa.</p>
            </div>
          </div>
          
          <!-- Decorative elements -->
          <div class="absolute top-1/4 right-0 w-64 h-64 bg-purple-600 rounded-full filter blur-3xl opacity-10"></div>
          <div class="absolute bottom-0 left-10 w-72 h-72 bg-blue-600 rounded-full filter blur-3xl opacity-10"></div>
        </section>

        <!-- Our Story Section -->
        <section class="py-16 bg-gray-900 bg-opacity-30">
          <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-12 items-center">
              <div class="rounded-lg overflow-hidden shadow-2xl">
                <img src="https://images.unsplash.com/photo-1580273916550-e323be2ae537?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Kantor Penyewaan Mobil" class="w-full h-auto" />
              </div>
              <div class="space-y-6">
                <h2 class="text-3xl font-bold">Kisah Kami</h2>
                <p class="text-gray-300">Didirikan pada tahun 2015, DriveEasy memulai dengan misi sederhana: merevolusi pengalaman penyewaan mobil dengan menggabungkan kendaraan premium dengan layanan pelanggan yang luar biasa.</p>
                <p class="text-gray-300">Berawal dari armada kecil mobil mewah, kini telah berkembang menjadi koleksi kendaraan beragam yang sesuai dengan setiap kebutuhan dan preferensi. Dari hibrida ramah lingkungan hingga mobil sport bertenaga dan SUV yang luas, kami telah memperluas penawaran kami sambil tetap menjaga komitmen terhadap kualitas dan layanan.</p>
                <p class="text-gray-300">Saat ini, DriveEasy beroperasi di beberapa lokasi di seluruh negeri, melayani ribuan pelanggan puas yang kembali kepada kami untuk kebutuhan transportasi mereka berulang kali.</p>
              </div>
            </div>
          </div>
        </section>

        <!-- Vision & Mission Section -->
        <section class="py-16">
          <div class="container mx-auto px-6">
            <div class="text-center mb-12">
              <h2 class="text-3xl font-bold">Visi & Misi Kami</h2>
              <p class="text-gray-300 mt-2">Menggerakkan masa depan penyewaan mobil premium</p>
            </div>
            
            <div class="grid md:grid-cols-2 gap-8">
              <div class="bg-gray-800 bg-opacity-50 rounded-lg p-8 border border-gray-700 hover:border-purple-500 transition-colors">
                <div class="flex items-center justify-center w-16 h-16 bg-gradient-to-r from-purple-600 to-blue-500 rounded-full mb-6 mx-auto">
                  <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                  </svg>
                </div>
                <h3 class="text-xl font-bold text-center mb-4">Visi Kami</h3>
                <p class="text-gray-300 text-center">Menjadi layanan penyewaan mobil premium terkemuka, yang dikenal karena armada luar biasa, solusi inovatif, dan pendekatan berpusat pada pelanggan. Kami membayangkan dunia di mana menyewa mobil bukan hanya kebutuhan, tetapi pengalaman yang dinantikan.</p>
              </div>
              
              <div class="bg-gray-800 bg-opacity-50 rounded-lg p-8 border border-gray-700 hover:border-purple-500 transition-colors">
                <div class="flex items-center justify-center w-16 h-16 bg-gradient-to-r from-purple-600 to-blue-500 rounded-full mb-6 mx-auto">
                  <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                  </svg>
                </div>
                <h3 class="text-xl font-bold text-center mb-4">Misi Kami</h3>
                <p class="text-gray-300 text-center">Menyediakan pelanggan kami dengan kendaraan dan layanan berkualitas tinggi, memastikan setiap pengalaman penyewaan berjalan lancar, menyenangkan, dan melebihi ekspektasi. Kami berkomitmen pada inovasi, keberlanjutan, dan menciptakan nilai bagi pelanggan, karyawan, dan komunitas kami.</p>
              </div>
            </div>
          </div>
        </section>
    </div>
</body>
</html>