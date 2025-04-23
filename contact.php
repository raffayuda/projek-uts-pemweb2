<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - DriveEasy</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <div class="min-h-screen bg-gradient-to-b from-[#1A1F2C] to-[#2E2A4A] text-white">
        <!-- Header/Navbar -->
        <?php include 'components/navbar.php'; ?>

        <!-- Contact Hero Section -->
        <section class="py-12 md:py-20 relative">
          <div class="container mx-auto px-6">
            <div class="text-center mb-12">
              <h1 class="text-4xl md:text-6xl font-bold leading-tight">Get in <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-blue-500">Touch</span></h1>
              <p class="text-lg md:text-xl text-gray-300 mt-4 max-w-3xl mx-auto">Have questions or need assistance? We're here to help you with all your car rental needs.</p>
            </div>
          </div>
          
          <!-- Decorative elements -->
          <div class="absolute top-1/4 right-0 w-64 h-64 bg-purple-600 rounded-full filter blur-3xl opacity-10"></div>
          <div class="absolute bottom-0 left-10 w-72 h-72 bg-blue-600 rounded-full filter blur-3xl opacity-10"></div>
        </section>

        <!-- Contact Information and Form Section -->
        <section class="py-12 relative">
          <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-12">
              <!-- Contact Information -->
              <div class="bg-gray-800 bg-opacity-50 rounded-lg p-8 border border-gray-700">
                <h2 class="text-2xl font-bold mb-6">Contact Information</h2>
                
                <div class="space-y-6">
                  <!-- Headquarters -->
                  <div class="flex items-start">
                    <svg class="w-6 h-6 text-purple-400 mt-1 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                    <div>
                      <h3 class="text-lg font-semibold mb-1">Headquarters</h3>
                      <p class="text-gray-300">Jl. Sudirman No. 123<br>Jakarta Pusat, 10220<br>Indonesia</p>
                    </div>
                  </div>
                  
                  <!-- Customer Service -->
                  <div class="flex items-start">
                    <svg class="w-6 h-6 text-purple-400 mt-1 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                    <div>
                      <h3 class="text-lg font-semibold mb-1">Customer Service</h3>
                      <p class="text-gray-300">+62 21 5555 6789<br>Toll-free: 0800-123-4567</p>
                    </div>
                  </div>
                  
                  <!-- Email Support -->
                  <div class="flex items-start">
                    <svg class="w-6 h-6 text-purple-400 mt-1 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    <div>
                      <h3 class="text-lg font-semibold mb-1">Email Support</h3>
                      <p class="text-gray-300">info@driveeasy.com<br>support@driveeasy.com</p>
                    </div>
                  </div>
                  
                  <!-- Business Hours -->
                  <div class="flex items-start">
                    <svg class="w-6 h-6 text-purple-400 mt-1 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div>
                      <h3 class="text-lg font-semibold mb-1">Business Hours</h3>
                      <p class="text-gray-300">Monday - Friday: 8AM - 8PM<br>Saturday: 9AM - 6PM<br>Sunday: 10AM - 4PM</p>
                    </div>
                  </div>
                </div>
                
                <!-- Social Media Links -->
                <div class="mt-8">
                  <h3 class="text-lg font-semibold mb-3">Connect With Us</h3>
                  <div class="flex space-x-4">
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-700 flex items-center justify-center hover:bg-purple-600 transition-colors">
                      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"></path>
                      </svg>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-700 flex items-center justify-center hover:bg-purple-600 transition-colors">
                      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                      </svg>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-700 flex items-center justify-center hover:bg-purple-600 transition-colors">
                      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"></path>
                      </svg>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-700 flex items-center justify-center hover:bg-purple-600 transition-colors">
                      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"></path>
                      </svg>
                    </a>
                  </div>
                </div>
              </div>
              
              <!-- Contact Form -->
              <div class="bg-gray-800 bg-opacity-50 rounded-lg p-8 border border-gray-700">
                <h2 class="text-2xl font-bold mb-6">Send Us a Message</h2>
                <form class="space-y-6">
                  <div class="grid md:grid-cols-2 gap-6">
                    <div>
                      <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Your Name</label>
                      <input type="text" id="name" name="name" class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" placeholder="John Doe">
                    </div>
                    <div>
                      <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email Address</label>
                      <input type="email" id="email" name="email" class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" placeholder="john@example.com">
                    </div>
                  </div>
                  
                  <div>
                    <label for="phone" class="block text-sm font-medium text-gray-300 mb-2">Phone Number</label>
                    <input type="tel" id="phone" name="phone" class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" placeholder="+62 xxx-xxxx-xxxx">
                  </div>
                  
                  <div>
                    <label for="subject" class="block text-sm font-medium text-gray-300 mb-2">Subject</label>
                    <select id="subject" name="subject" class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                      <option value="" disabled selected>Select a subject</option>
                      <option value="reservation">Reservation Inquiry</option>
                      <option value="support">Customer Support</option>
                      <option value="feedback">Feedback</option>
                      <option value="partnership">Business Partnership</option>
                      <option value="other">Other</option>
                    </select>
                  </div>
                  
                  <div>
                    <label for="message" class="block text-sm font-medium text-gray-300 mb-2">Your Message</label>
                    <textarea id="message" name="message" rows="5" class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" placeholder="How can we help you?"></textarea>
                  </div>
                  
                  <div class="flex items-center">
                    <input id="terms" name="terms" type="checkbox" class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-500 rounded">
                    <label for="terms" class="ml-2 block text-sm text-gray-300">I agree to the <a href="#" class="text-purple-400 hover:text-purple-300">Privacy Policy</a> and <a href="#" class="text-purple-400 hover:text-purple-300">Terms of Service</a></label>
                  </div>
                  
                  <button type="submit" class="w-full py-3 px-4 bg-gradient-to-r from-purple-600 to-blue-500 text-white font-medium rounded-lg hover:opacity-90 transition-opacity focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">Send Message</button>
                </form>
              </div>
            </div>
          </div>
        </section>


        <!-- FAQ Section -->
        <section class="py-12">
          <div class="container mx-auto px-6">
            <div class="text-center mb-12">
              <h2 class="text-3xl font-bold">Frequently Asked Questions</h2>
              <p class="text-gray-300 mt-2">Find answers to common questions about our services</p>
            </div>
            
            <div class="max-w-4xl mx-auto space-y-6">
              <!-- FAQ Item 1 -->
              <div class="bg-gray-800 bg-opacity-50 rounded-lg border border-gray-700 overflow-hidden">
                <button class="w-full flex items-center justify-between p-6 focus:outline-none">
                  <span class="text-lg font-medium">What documents do I need to rent a car?</span>
                  <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                  </svg>
                </button>
                <div class="px-6 pb-6">
                  <p class="text-gray-300">To rent a car with DriveEasy, you'll need a valid driver's license, a credit card in your name, and a valid ID or passport. International customers may need an International Driving Permit depending on their country of origin.</p>
                </div>
              </div>
              
              <!-- FAQ Item 2 -->
              <div class="bg-gray-800 bg-opacity-50 rounded-lg border border-gray-700 overflow-hidden">
                <button class="w-full flex items-center justify-between p-6 focus:outline-none">
                  <span class="text-lg font-medium">What is your cancellation policy?</span>
                  <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                  </svg>
                </button>
                <div class="px-6 pb-6">
                  <p class="text-gray-300">We offer free cancellation up to 48 hours before your scheduled pickup time. Cancellations made within 48 hours may be subject to a fee equivalent to one day's rental. No-shows will be charged the full rental amount.</p>
                </div>
              </div>
              
              <!-- FAQ Item 3 -->
              <div class="bg-gray-800 bg-opacity-50 rounded-lg border border-gray-700 overflow-hidden">
                <button class="w-full flex items-center justify-between p-6 focus:outline-none">
                  <span class="text-lg font-medium">Is insurance included in the rental price?</span>
                  <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                  </svg>
                </button>
                <div class="px-6 pb-6">
                  <p class="text-gray-300">Basic insurance coverage is included in all our rental prices. This includes collision damage waiver (CDW) and theft protection. Additional coverage options such as personal accident insurance, roadside assistance, and reduced excess are available for an extra fee.</p>
                </div>
              </div>
              
              <!-- FAQ Item 4 -->
              <div class="bg-gray-800 bg-opacity-50 rounded-lg border border-gray-700 overflow-hidden">
                <button class="w-full flex items-center justify-between p-6 focus:outline-none">
                  <span class="text-lg font-medium">Can I return the car to a different location?</span>
                  <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                  </svg>
                </button>
                <div class="px-6 pb-6">
                  <p class="text-gray-300">Yes, we offer one-way rentals between our locations. Additional fees may apply depending on the distance between pickup and drop-off locations. Please specify your drop-off location when making your reservation.</p>
                </div>
              </div>
              
              <!-- FAQ Item 5 -->
              <div class="bg-gray-800 bg-opacity-50 rounded-lg border border-gray-700 overflow-hidden">
                <button class="w-full flex items-center justify-between p-6 focus:outline-none">
                  <span class="text-lg font-medium">What if I need to extend my rental period?</span>
                  <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                  </svg>
                </button>
                <div class="px-6 pb-6">
                  <p class="text-gray-300">You can extend your rental period by contacting our customer service at least 24 hours before your scheduled return time. Extensions are subject to vehicle availability and may require an updated rental agreement.</p>
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
                      <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                    </svg>
                  </a>
                </div>
              </div>
              
              <div>
                <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                <ul class="space-y-2">
                  <li><a href="index.html" class="text-gray-300 hover:text-purple-400 transition-colors">Home</a></li>
                  <li><a href="#" class="text-gray-300 hover:text-purple-400 transition-colors">Vehicles</a></li>
                  <li><a href="location.html" class="text-gray-300 hover:text-purple-400 transition-colors">Locations</a></li>
                  <li><a href="about.html" class="text-gray-300 hover:text-purple-400 transition-colors">About Us</a></li>
                  <li><a href="contact.html" class="text-gray-300 hover:text-purple-400 transition-colors">Contact</a></li>
                </ul>
              </div>
              
              <div>
                <h3 class="text-lg font-semibold mb-4">Services</h3>
                <ul class="space-y-2">
                  <li><a href="#" class="text-gray-300 hover:text-purple-400 transition-colors">Car Rental</a></li>
                  <li><a href="#" class="text-gray-300 hover:text-purple-400 transition-colors">Long-term Rental</a></li>
                  <li><a href="#" class="text-gray-300 hover:text-purple-400 transition-colors">Airport Transfer</a></li>
                  <li><a href="#" class="text-gray-300 hover:text-purple-400 transition-colors">Chauffeur Service</a></li>
                  <li><a href="#" class="text-gray-300 hover:text-purple-400 transition-colors">Corporate Solutions</a></li>
                </ul>
              </div>
              
              <div>
                <h3 class="text-lg font-semibold mb-4">Newsletter</h3>
                <p class="text-gray-300 mb-4">Subscribe to our newsletter for the latest updates and offers.</p>
                <form class="flex">
                  <input type="email" placeholder="Your email address" class="flex-1 bg-gray-700 border border-gray-600 rounded-l-lg px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                  <button type="submit" class="bg-gradient-to-r from-purple-600 to-blue-500 rounded-r-lg px-4 py-2 text-white font-medium hover:opacity-90 transition-opacity">Subscribe</button>
                </form>
              </div>
            </div>
            
            <div class="border-t border-gray-700 mt-12 pt-8 text-center text-gray-400">
              <p>&copy; 2023 DriveEasy. All rights reserved.</p>
            </div>
          </div>
        </footer>

        <!-- Mobile Menu Toggle Script -->
        <script>
          const mobileMenuButton = document.getElementById('mobile-menu-button');
          const mobileMenu = document.getElementById('mobile-menu');
          
          mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
          });
        </script>
    </div>
</body>
</html>