<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locations - DriveEasy</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <div class="min-h-screen bg-gradient-to-b from-[#1A1F2C] to-[#2E2A4A] text-white">
        <!-- Header/Navbar -->
        <?php include 'components/navbar.php'; ?>

        <!-- Location Hero Section -->
        <section class="py-12 md:py-20 relative">
          <div class="container mx-auto px-6">
            <div class="text-center mb-12">
              <h1 class="text-4xl md:text-6xl font-bold leading-tight">Our <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-blue-500">Locations</span></h1>
              <p class="text-lg md:text-xl text-gray-300 mt-4 max-w-3xl mx-auto">Find DriveEasy rental offices across the country, ready to serve your transportation needs.</p>
            </div>
          </div>
          
          <!-- Decorative elements -->
          <div class="absolute top-1/4 right-0 w-64 h-64 bg-purple-600 rounded-full filter blur-3xl opacity-10"></div>
          <div class="absolute bottom-0 left-10 w-72 h-72 bg-blue-600 rounded-full filter blur-3xl opacity-10"></div>
        </section>

        

        <!-- Location Listings Section -->
        <section class="py-16">
          <div class="container mx-auto px-6">
            
            <!-- Location Cards -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
              <!-- Location Card 1 -->
              <div class="bg-gray-800 bg-opacity-50 rounded-lg overflow-hidden border border-gray-700 hover:border-purple-500 transition-colors">
                <div class="p-6">
                  <h3 class="text-xl font-bold mb-2">Jakarta Downtown</h3>
                  <div class="flex items-start mb-4">
                    <svg class="w-5 h-5 text-purple-400 mt-1 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <p class="text-gray-300">Jl. Sudirman No. 123<br>Jakarta Pusat, 10220</p>
                  </div>
                  <div class="flex items-start mb-4">
                    <svg class="w-5 h-5 text-purple-400 mt-1 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                    <p class="text-gray-300">+62 21 5555 6789</p>
                  </div>
                  <div class="flex items-start mb-4">
                    <svg class="w-5 h-5 text-purple-400 mt-1 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-gray-300">Mon-Fri: 8AM-8PM<br>Sat-Sun: 9AM-6PM</p>
                  </div>
                  <a href="#" class="block w-full py-3 text-center bg-gradient-to-r from-purple-600 to-blue-500 rounded-lg hover:opacity-90 transition-opacity font-medium">Get Directions</a>
                </div>
              </div>
              
              <!-- Location Card 2 -->
              <div class="bg-gray-800 bg-opacity-50 rounded-lg overflow-hidden border border-gray-700 hover:border-purple-500 transition-colors">
                <div class="p-6">
                  <h3 class="text-xl font-bold mb-2">Bandung City Center</h3>
                  <div class="flex items-start mb-4">
                    <svg class="w-5 h-5 text-purple-400 mt-1 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <p class="text-gray-300">Jl. Asia Afrika No. 45<br>Bandung, 40112</p>
                  </div>
                  <div class="flex items-start mb-4">
                    <svg class="w-5 h-5 text-purple-400 mt-1 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                    <p class="text-gray-300">+62 22 4444 5678</p>
                  </div>
                  <div class="flex items-start mb-4">
                    <svg class="w-5 h-5 text-purple-400 mt-1 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-gray-300">Mon-Fri: 8AM-8PM<br>Sat-Sun: 9AM-6PM</p>
                  </div>
                  <a href="#" class="block w-full py-3 text-center bg-gradient-to-r from-purple-600 to-blue-500 rounded-lg hover:opacity-90 transition-opacity font-medium">Get Directions</a>
                </div>
              </div>
              
              <!-- Location Card 3 -->
              <div class="bg-gray-800 bg-opacity-50 rounded-lg overflow-hidden border border-gray-700 hover:border-purple-500 transition-colors">
                <div class="p-6">
                  <h3 class="text-xl font-bold mb-2">Surabaya Branch</h3>
                  <div class="flex items-start mb-4">
                    <svg class="w-5 h-5 text-purple-400 mt-1 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <p class="text-gray-300">Jl. Pemuda No. 78<br>Surabaya, 60271</p>
                  </div>
                  <div class="flex items-start mb-4">
                    <svg class="w-5 h-5 text-purple-400 mt-1 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                    <p class="text-gray-300">+62 31 3333 4567</p>
                  </div>
                  <div class="flex items-start mb-4">
                    <svg class="w-5 h-5 text-purple-400 mt-1 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-gray-300">Mon-Fri: 8AM-8PM<br>Sat-Sun: 9AM-6PM</p>
                  </div>
                  <a href="#" class="block w-full py-3 text-center bg-gradient-to-r from-purple-600 to-blue-500 rounded-lg hover:opacity-90 transition-opacity font-medium">Get Directions</a>
                </div>
              </div>
              
              <!-- Location Card 4 -->
              <div class="bg-gray-800 bg-opacity-50 rounded-lg overflow-hidden border border-gray-700 hover:border-purple-500 transition-colors">
                <div class="p-6">
                  <h3 class="text-xl font-bold mb-2">Bali - Denpasar</h3>
                  <div class="flex items-start mb-4">
                    <svg class="w-5 h-5 text-purple-400 mt-1 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <p class="text-gray-300">Jl. Sunset Road No. 99<br>Denpasar, Bali 80361</p>
                  </div>
                  <div class="flex items-start mb-4">
                    <svg class="w-5 h-5 text-purple-400 mt-1 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                    <p class="text-gray-300">+62 361 222 3456</p>
                  </div>
                  <div class="flex items-start mb-4">
                    <svg class="w-5 h-5 text-purple-400 mt-1 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-gray-300">Mon-Sun: 7AM-10PM<br>Open Daily</p>
                  </div>
                  <a href="#" class="block w-full py-3 text-center bg-gradient-to-r from-purple-600 to-blue-500 rounded-lg hover:opacity-90 transition-opacity font-medium">Get Directions</a>
                </div>
              </div>
              
              <!-- Location Card 5 -->
              <div class="bg-gray-800 bg-opacity-50 rounded-lg overflow-hidden border border-gray-700 hover:border-purple-500 transition-colors">
                <div class="p-6">
                  <h3 class="text-xl font-bold mb-2">Yogyakarta</h3>
                  <div class="flex items-start mb-4">
                    <svg class="w-5 h-5 text-purple-400 mt-1 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <p class="text-gray-300">Jl. Malioboro No. 56<br>Yogyakarta, 55213</p>
                  </div>
                  <div class="flex items-start mb-4">
                    <svg class="w-5 h-5 text-purple-400 mt-1 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                    <p class="text-gray-300">+62 274 111 2345</p>
                  </div>
                  <div class="flex items-start mb-4">
                    <svg class="w-5 h-5 text-purple-400 mt-1 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-gray-300">Mon-Fri: 8AM-8PM<br>Sat-Sun: 9AM-6PM</p>
                  </div>
                  <a href="#" class="block w-full py-3 text-center bg-gradient-to-r from-purple-600 to-blue-500 rounded-lg hover:opacity-90 transition-opacity font-medium">Get Directions</a>
                </div>
              </div>
              
              <!-- Location Card 6 -->
              <div class="bg-gray-800 bg-opacity-50 rounded-lg overflow-hidden border border-gray-700 hover:border-purple-500 transition-colors">
                <div class="p-6">
                  <h3 class="text-xl font-bold mb-2">Medan</h3>
                  <div class="flex items-start mb-4">
                    <svg class="w-5 h-5 text-purple-400 mt-1 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <p class="text-gray-300">Jl. Diponegoro No. 34<br>Medan, 20152</p>
                  </div>
                  <div class="flex items-start mb-4">
                    <svg class="w-5 h-5 text-purple-400 mt-1 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                    <p class="text-gray-300">+62 61 7777 8901</p>
                  </div>
                  <div class="flex items-start mb-4">
                    <svg class="w-5 h-5 text-purple-400 mt-1 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-gray-300">Mon-Fri: 8AM-8PM<br>Sat-Sun: 9AM-6PM</p>
                  </div>
                  <a target="_blank" href="https://maps.app.goo.gl/BWCzFL7jdo5RtHJB8" class="block w-full py-3 text-center bg-gradient-to-r from-purple-600 to-blue-500 rounded-lg hover:opacity-90 transition-opacity font-medium">Get Directions</a>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- Footer -->
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