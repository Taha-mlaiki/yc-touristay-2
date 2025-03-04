<x-app-layout>
    <div class="min-h-screen container mx-auto">
        <div class="flex my-10 items-center justify-between">
            <h1 class="text-2xl font-extrabold">Favorites</h1>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 my-2">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        @if (count($favorites) == 0 || $favorites == null)
            <h1 class="text-center justify-center text-xl font-bold mt-24">No favorites exists :(</h1>
        @endif
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-16">
            @foreach ($favorites as $announcement)
                <div class="bg-white flex flex-col justify-between rounded-lg overflow-hidden shadow-lg property-card">
                    <div class="overflow-hidden">
                        @if (empty($announcement->images->first()))
                            <div class="w-full h-56 bg-black"></div>
                        @else
                            <img class="w-full h-56 object-cover property-img"
                                src={{ asset('storage/' . $announcement->images->first()->path) }} alt="Luxury Villa">
                        @endif
                    </div>
                    <div class="px-6 py-4 relative">
                        <h3 class="text-xl font-bold text-gray-800 mb-2  w-[90%]">{{ $announcement->title }}</h3>
                        <p class="text-gray-600 mb-4">{{ $announcement->description }}</p>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-2xl font-bold text-blue-600">${{ $announcement->price }}</span>
                            @if ($announcement->type == 'For Sale')
                                <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">
                                    {{ $announcement->type }}
                                </span>
                            @else
                                <span class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded">
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
                        <form action={{ route('favorites.delete') }} method="POST">
                            @csrf
                            <input type="hidden" value="0" name="heart">
                            <input type="hidden" value={{ $announcement->id }} name="announcement_id">
                            <button type="submit" class="w-10 h-10 absolute top-2 right-2 cursor-pointer">
                                <img src={{ asset('storage/assets/filledHeart.png') }} alt=""
                                    class="w-10 h-10 absolute top-2 right-2 cursor-pointer">
                            </button>
                        </form>
                    </div>
                    <div class="px-6 py-4 pb-5">
                        <a href="/announcements/{{ $announcement->id }}">
                            <button class="p-2 w-full bg-blue-500 text-white rounded-lg mt-4">
                                View Details
                            </button>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
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
