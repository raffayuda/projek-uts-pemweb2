<header class="fixed w-full z-50">
          <nav class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
              <div class="flex items-center">
                <span class="text-2xl font-bold">DriveEasy</span>
              </div>
              
              <!-- {/* Desktop Navigation */} -->
              <div class="hidden lg:flex space-x-8">
                <a href="index.php" class="hover:text-purple-300 transition-colors">Home</a>
                <a href="#vehicles" class="hover:text-purple-300 transition-colors">Vehicles</a>
                <a href="location.php" class="hover:text-purple-300 transition-colors">Locations</a>
                <a href="about.php" class="hover:text-purple-300 transition-colors">About Us</a>
                <a href="contact.php" class="hover:text-purple-300 transition-colors">Contact</a>
              </div>
              
              <div class="hidden lg:flex items-center space-x-4">
                <a href="#" class="px-4 py-2 border border-purple-400 rounded-lg hover:bg-purple-400 hover:text-gray-900 transition-colors">Sign In</a>
                <a href="#" class="px-4 py-2 bg-gradient-to-r from-purple-600 to-blue-500 rounded-lg hover:opacity-90 transition-opacity">Register</a>
              </div>
              
              <!-- {/* Mobile menu button */} -->
              <div class="lg:hidden">
                <button id="mobile-menu-button" class="text-white focus:outline-none">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                  </svg>
                </button>
              </div>
            </div>
            
            <!-- {/* Mobile Menu */} -->
            <div id="mobile-menu" class="lg:hidden hidden mt-4 bg-gray-800 bg-opacity-90 rounded-lg p-4">
              <div class="flex flex-col space-y-4">
                <a href="#" class="hover:text-purple-300 transition-colors">Home</a>
                <a href="#" class="hover:text-purple-300 transition-colors">Vehicles</a>
                <a href="#" class="hover:text-purple-300 transition-colors">Locations</a>
                <a href="#" class="hover:text-purple-300 transition-colors">About Us</a>
                <a href="#" class="hover:text-purple-300 transition-colors">Contact</a>
                <a href="#" class="px-4 py-2 border border-purple-400 rounded-lg hover:bg-purple-400 hover:text-gray-900 transition-colors text-center">Sign In</a>
                <a href="#" class="px-4 py-2 bg-gradient-to-r from-purple-600 to-blue-500 rounded-lg hover:opacity-90 transition-opacity text-center">Register</a>
              </div>
            </div>
          </nav>
        </header>