<x-app-layout>

    <!-- Hero Section -->
    <section class="pt-24 md:pt-0 relative flex items-center h-screen bg-cover bg-center"
        style="background-image: url('https://themewagon.github.io/findstate/images/bg_2.jpg');">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-xl">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight mb-6">Find Your Dream Home
                    Today</h1>
                <p class="text-xl text-white mb-8">Discover the perfect property that fits your lifestyle and budget.</p>

                <!-- Search Form -->
                <div class="bg-white p-4 rounded-lg shadow-lg mb-8">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div class="col-span-1">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="location">Location</label>
                            <input
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600"
                                type="text" id="location" placeholder="City, Zip Code...">
                        </div>
                        <div class="col-span-1">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="type">Property
                                Type</label>
                            <select
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600"
                                id="type">
                                <option>Any Type</option>
                                <option>House</option>
                                <option>Apartment</option>
                                <option>Condo</option>
                                <option>Land</option>
                            </select>
                        </div>
                        <div class="col-span-1">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="price">Price Range</label>
                            <select
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600"
                                id="price">
                                <option>Any Price</option>
                                <option>$100k - $200k</option>
                                <option>$200k - $300k</option>
                                <option>$300k - $500k</option>
                                <option>$500k+</option>
                            </select>
                        </div>
                        <div class="col-span-1 flex items-end">
                            <button
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition"
                                type="button">
                                Search
                            </button>
                        </div>
                    </div>
                </div>

                <button
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg inline-flex items-center transition">
                    Browse Properties
                    <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>
        </div>
    </section>

    <!-- Featured Properties Section -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Featured Properties</h2>
                <p class="text-gray-600 max-w-lg mx-auto">Explore our hand-picked selection of premium properties
                    available for you right now.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($announcements as $announcement)
                    <div class="bg-white rounded-lg overflow-hidden shadow-lg property-card">
                        <div class="overflow-hidden">
                            @if (empty($announcement->images->first()->path))
                                <div class="w-full h-56 bg-black"></div>
                            @else
                                <img class="w-full h-56 object-cover property-img"
                                    src={{ asset('storage/' . $announcement->images->first()->path) }} alt="Luxury Villa">
                            @endif
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $announcement->title }}</h3>
                            <p class="text-gray-600 mb-4">{{ $announcement->description }}</p>
                            <div class="flex justify-between items-center mb-4">
                                <span class="text-2xl font-bold text-blue-600">${{ $announcement->price }}</span>
                                @if ($announcement->type == 'For Sale')
                                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">
                                        {{ $announcement->type }}
                                    </span>
                                @else
                                    <span
                                        class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded">
                                        {{ $announcement->type }}
                                    </span>
                                @endif
                            </div>
                            <div class="flex justify-between text-gray-500 mb-4">
                                <div class="flex items-center">
                                    <i class="fas fa-map-marker-alt mr-1"></i>
                                    <span>{{ $announcement->city }}</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-calendar-alt mr-1"></i>
                                    <span>
                                        {{ \Carbon\Carbon::parse($announcement->start_date)->format('M d') }} - 
                                        {{ \Carbon\Carbon::parse($announcement->end_date)->format('M d') }}
                                    </span>
                                </div>
                            </div>
                            <div class="flex justify-between text-gray-500">
                                <div class="flex items-center">
                                    <i class="fas fa-bed mr-1"></i>
                                    <span>{{ $announcement->Beds }} Beds</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-bath mr-1"></i>
                                    <span>{{ $announcement->Baths }} Baths</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-ruler-combined mr-1"></i>
                                    <span>{{ $announcement->sqft }} sqft</span>
                                </div>
                            </div>
                            <div class="px-6 py-4 pb-5">
                                <a href="/announcements/{{ $announcement->id }}">
                                    <button class="p-2 w-full bg-blue-500 text-white rounded-lg mt-4">
                                        View Details
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-12">
                <a href={{ route('announcements') }}
                    class="inline-flex items-center text-blue-600 font-semibold hover:text-blue-800 transition">
                    View All Properties
                    <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="flex flex-wrap items-center">
                <div class="w-full lg:w-1/2 mb-12 lg:mb-0">
                    <img src="https://themewagon.github.io/findstate/images/about.jpg" alt="About Us"
                        class="rounded-lg shadow-xl">
                </div>
                <div class="w-full lg:w-1/2 lg:pl-12">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">About Elite Homes</h2>
                    <p class="text-gray-600 mb-8">With over 20 years of experience in the real estate market, Elite
                        Homes has been dedicated to finding the perfect match between properties and people. We believe
                        in creating lasting relationships with our clients based on trust, integrity, and results.</p>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div class="text-center">
                            <div
                                class="bg-blue-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                                <i class="fas fa-award text-blue-600 text-2xl"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">20+ Years</h3>
                            <p class="text-gray-600">Of Experience</p>
                        </div>

                        <div class="text-center">
                            <div
                                class="bg-blue-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                                <i class="fas fa-home text-blue-600 text-2xl"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">2,500+</h3>
                            <p class="text-gray-600">Properties Sold</p>
                        </div>

                        <div class="text-center">
                            <div
                                class="bg-blue-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                                <i class="fas fa-users text-blue-600 text-2xl"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">1,800+</h3>
                            <p class="text-gray-600">Happy Clients</p>
                        </div>
                    </div>

                    <a href="#"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg inline-flex items-center transition">
                        Learn More About Us
                        <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>


    <!-- Call to Action -->
    <section class="py-20 bg-blue-600">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold text-white mb-6">Ready to Find Your Dream Home?</h2>
            <p class="text-white text-lg mb-8 max-w-md mx-auto">Join thousands of satisfied clients who have found
                their perfect property with Elite Homes.</p>
            <div class="flex flex-col md:flex-row justify-center space-y-4 md:space-y-0 md:space-x-4">
                <a href="#"
                    class="bg-white text-blue-600 hover:bg-gray-100 font-bold py-3 px-8 rounded-lg inline-block transition">Browse
                    Properties</a>
                <a href="#"
                    class="bg-transparent text-white hover:bg-blue-700 border border-white font-bold py-3 px-8 rounded-lg inline-block transition">Contact
                    Us</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white">
        <div class="container mx-auto px-6 pt-16 pb-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                <!-- Company Info -->
                <div>
                    <h3 class="text-xl font-bold mb-4">Elite Homes</h3>
                    <p class="text-gray-400 mb-4">Your trusted partner in finding the perfect property that matches
                        your lifestyle and requirements.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-xl font-bold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Home</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Properties</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">About Us</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Contact</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Blog</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Careers</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h3 class="text-xl font-bold mb-4">Contact Us</h3>
                    <ul class="space-y-2">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-3 text-blue-500"></i>
                            <span class="text-gray-400">123 Property Lane, Real Estate City, 10001</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone-alt mr-3 text-blue-500"></i>
                            <span class="text-gray-400">(555) 123-4567</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-3 text-blue-500"></i>
                            <span class="text-gray-400">info@elitehomes.com</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-clock mr-3 text-blue-500"></i>
                            <span class="text-gray-400">Mon-Fri: 9AM - 6PM</span>
                        </li>
                    </ul>
                </div>

                <!-- Newsletter -->
                <div>
                    <h3 class="text-xl font-bold mb-4">Newsletter</h3>
                    <p class="text-gray-400 mb-4">Subscribe to our newsletter for the latest property updates and
                        market insights.</p>
                    <form class="flex flex-col space-y-3">
                        <input
                            class="bg-gray-800 text-white px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                            type="email" placeholder="Your Email">
                        <button
                            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition">Subscribe</button>
                    </form>
                </div>
            </div>

            <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 mb-4 md:mb-0">© 2025 Elite Homes. All rights reserved.</p>
                <div class="flex space-x-6">
                    <a href="#" class="text-gray-400 hover:text-white transition">Privacy Policy</a>
                    <a href="#" class="text-gray-400 hover:text-white transition">Terms of Service</a>
                    <a href="#" class="text-gray-400 hover:text-white transition">Sitemap</a>
                </div>
            </div>
        </div>
    </footer>

</x-app-layout>
