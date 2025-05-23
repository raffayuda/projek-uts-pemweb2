<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id'])
?>

<header class="fixed w-full z-50 bg-[#1A1F2C]" id="header">
  <nav class="container mx-auto px-6 py-4">
    <div class="flex items-center justify-between">
      <div class="flex items-center">
        <span class="text-2xl font-bold">DriveEasy</span>
      </div>

      <!-- {/* Desktop Navigation */} -->
      <?php
      $current_page = basename($_SERVER['PHP_SELF']);
      ?>
      <div class="hidden lg:flex space-x-8">
        <a href="index.php" class="hover:text-purple-300 transition-colors <?= ($current_page == 'index.php') ? 'text-purple-500 font-bold' : '' ?>">Home</a>
        <a href="vehicles.php" class="hover:text-purple-300 transition-colors <?= ($current_page == 'vehicles.php') ? 'text-purple-500 font-bold' : '' ?>">Vehicles</a>
        <a href="location.php" class="hover:text-purple-300 transition-colors <?= ($current_page == 'location.php') ? 'text-purple-500 font-bold' : '' ?>">Locations</a>
        <a href="about.php" class="hover:text-purple-300 transition-colors <?= ($current_page == 'about.php') ? 'text-purple-500 font-bold' : '' ?>">About Us</a>
        <a href="contact.php" class="hover:text-purple-300 transition-colors <?= ($current_page == 'contact.php') ? 'text-purple-500 font-bold' : '' ?>">Contact</a>
      </div>

      <div class="hidden lg:flex items-center space-x-4">
        <?php if ($isLoggedIn) {
          echo '
                    <a href="auth/logout.php" class="px-4 py-2 border border-purple-400 rounded-lg hover:bg-purple-400 hover:text-gray-900 transition-colors">Logout</a>
                  ';
        } else {
          echo '
                    <a href="auth/login.php" class="px-4 py-2 border border-purple-400 rounded-lg hover:bg-purple-400 hover:text-gray-900 transition-colors">Login</a>
                    <a href="auth/register.php" class="px-4 py-2 bg-gradient-to-r from-purple-600 to-blue-500 rounded-lg hover:opacity-90 transition-opacity">Register</a>
                    ';
        }
        ?>

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
        <a href="index.php" class="hover:text-purple-300 transition-colors <?= ($current_page == 'index.php') ? 'text-purple-500 font-bold' : '' ?>">Home</a>
        <a href="vehicles.php" class="hover:text-purple-300 transition-colors <?= ($current_page == 'vehicles.php') ? 'text-purple-500 font-bold' : '' ?>">Vehicles</a>
        <a href="location.php" class="hover:text-purple-300 transition-colors <?= ($current_page == 'location.php') ? 'text-purple-500 font-bold' : '' ?>">Locations</a>
        <a href="about.php" class="hover:text-purple-300 transition-colors <?= ($current_page == 'about.php') ? 'text-purple-500 font-bold' : '' ?>">About Us</a>
        <a href="contact.php" class="hover:text-purple-300 transition-colors <?= ($current_page == 'contact.php') ? 'text-purple-500 font-bold' : '' ?>">Contact</a>
        <?php if ($isLoggedIn) {
          echo '
                    <a href="auth/login.php" class="px-4 py-2 border border-purple-400 rounded-lg hover:bg-purple-400 hover:text-gray-900 transition-colors text-center">Sign In</a>
                  ';
        } else {
          echo '
                    <a href="auth/login.php" class="px-4 py-2 border border-purple-400 rounded-lg hover:bg-purple-400 hover:text-gray-900 transition-colors text-center">Sign In</a>
                    <a href="auth/register.php" class="px-4 py-2 bg-gradient-to-r from-purple-600 to-blue-500 rounded-lg hover:opacity-90 transition-opacity text-center">Register</a>
                    ';
        }
        ?>

      </div>
    </div>
  </nav>
</header>