<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - DriveEasy</title>
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
              <h1 class="text-4xl md:text-6xl font-bold leading-tight">About <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-blue-500">DriveEasy</span></h1>
              <p class="text-lg md:text-xl text-gray-300 mt-4 max-w-3xl mx-auto">Your premium car rental service dedicated to providing exceptional vehicles and outstanding customer experiences.</p>
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
                <img src="https://images.unsplash.com/photo-1580273916550-e323be2ae537?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Car Rental Office" class="w-full h-auto" />
              </div>
              <div class="space-y-6">
                <h2 class="text-3xl font-bold">Our Story</h2>
                <p class="text-gray-300">Founded in 2015, DriveEasy began with a simple mission: to revolutionize the car rental experience by combining premium vehicles with exceptional customer service.</p>
                <p class="text-gray-300">What started as a small fleet of luxury cars has grown into a diverse collection of vehicles to suit every need and preference. From eco-friendly hybrids to powerful sports cars and spacious SUVs, we've expanded our offerings while maintaining our commitment to quality and service.</p>
                <p class="text-gray-300">Today, DriveEasy operates in multiple locations across the country, serving thousands of satisfied customers who return to us for their transportation needs time and again.</p>
              </div>
            </div>
          </div>
        </section>

        <!-- Vision & Mission Section -->
        <section class="py-16">
          <div class="container mx-auto px-6">
            <div class="text-center mb-12">
              <h2 class="text-3xl font-bold">Our Vision & Mission</h2>
              <p class="text-gray-300 mt-2">Driving the future of premium car rentals</p>
            </div>
            
            <div class="grid md:grid-cols-2 gap-8">
              <div class="bg-gray-800 bg-opacity-50 rounded-lg p-8 border border-gray-700 hover:border-purple-500 transition-colors">
                <div class="flex items-center justify-center w-16 h-16 bg-gradient-to-r from-purple-600 to-blue-500 rounded-full mb-6 mx-auto">
                  <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                  </svg>
                </div>
                <h3 class="text-xl font-bold text-center mb-4">Our Vision</h3>
                <p class="text-gray-300 text-center">To be the leading premium car rental service, recognized for our exceptional fleet, innovative solutions, and customer-centric approach. We envision a world where renting a car is not just a necessity but an experience to look forward to.</p>
              </div>
              
              <div class="bg-gray-800 bg-opacity-50 rounded-lg p-8 border border-gray-700 hover:border-purple-500 transition-colors">
                <div class="flex items-center justify-center w-16 h-16 bg-gradient-to-r from-purple-600 to-blue-500 rounded-full mb-6 mx-auto">
                  <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                  </svg>
                </div>
                <h3 class="text-xl font-bold text-center mb-4">Our Mission</h3>
                <p class="text-gray-300 text-center">To provide our customers with the highest quality vehicles and service, ensuring every rental experience is smooth, enjoyable, and exceeds expectations. We are committed to innovation, sustainability, and creating value for our customers, employees, and communities.</p>
              </div>
            </div>
          </div>
        </section>

        