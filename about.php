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

        <footer class="py-12 bg-gray-900 bg-opacity-50 mt-12">
          <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
              <div class="md:col-span-1">
                <h3 class="text-xl font-bold mb-4">DriveEasy</h3>
                <p class="text-gray-300 mb-4">Your premium car rental service dedicated to providing exceptional vehicles and outstanding customer experiences.</p>
                <div class="flex space-x-4">
                  <a href="#" class="text-gray-300 hover:text-purple-400 transition-colors">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"></path>
                    </svg>
                  </a>
                  <a href="#" class="text-gray-300 hover:text-purple-400 transition-colors">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"></path>
                    </svg>
                  </a>
                  <a href="#" class="text-gray-300 hover:text-purple-400 transition-colors">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                    </svg>
                  </a>
                </div>
              </div>
              
              <div>
                <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                <ul class="space-y-2">
                  <li><a href="index.html" class="text-gray-300 hover:text-purple-400 transition-colors">Home</a></li>
                  <li><a href="#" class="text-gray-300 hover:text-purple-400 transition-colors">Vehicles</a></li>
                  <li><a href="location.html" class="text-purple-400 transition-colors">Locations</a></li>
                  <li><a href="about.html" class="text-gray-300 hover:text-purple-400 transition-colors">About Us</a></li>
                  <li><a href="#" class="text-gray-300 hover:text-purple-400 transition-colors">Contact</a></li>
                </ul>
              </div>
              
              <div>
                <h4 class="text-lg font-semibold mb-4">Services</h4>
                <ul class="space-y-2">
                  <li><a href="#" class="text-gray-300 hover:text-purple-400 transition-colors">Car Rental</a></li>
                  <li><a href="#" class="text-gray-300 hover:text-purple-400 transition-colors">Chauffeur Service</a></li>
                  <li><a href="#" class="text-gray-300 hover:text-purple-400 transition-colors">Airport Transfer</a></li>
                  <li><a href="#" class="text-gray-300 hover:text-purple-400 transition-colors">Long Term Rental</a></li>
                  <li><a href="#" class="text-gray-300 hover:text-purple-400 transition-colors">Corporate Solutions</a></li>
                </ul>
              </div>
              
              <div>
                <h4 class="text-lg font-semibold mb-4">Newsletter</h4>
                <p class="text-gray-300 mb-4">Subscribe to our newsletter for the latest updates and offers.</p>
                <form class="flex flex-col sm:flex-row gap-2">
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
</body>
</html>