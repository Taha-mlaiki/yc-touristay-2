<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="min-h-screen container mx-auto">
        <div class="flex my-10 items-center justify-between">
            <h1 class="text-2xl font-extrabold">Announcements</h1>
            <?php if (isset($component)) { $__componentOriginal6dfdb11e77edf4711bb734da15a36bbb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6dfdb11e77edf4711bb734da15a36bbb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.announcement_modal','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('announcement_modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6dfdb11e77edf4711bb734da15a36bbb)): ?>
<?php $attributes = $__attributesOriginal6dfdb11e77edf4711bb734da15a36bbb; ?>
<?php unset($__attributesOriginal6dfdb11e77edf4711bb734da15a36bbb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6dfdb11e77edf4711bb734da15a36bbb)): ?>
<?php $component = $__componentOriginal6dfdb11e77edf4711bb734da15a36bbb; ?>
<?php unset($__componentOriginal6dfdb11e77edf4711bb734da15a36bbb); ?>
<?php endif; ?>
        </div>
        <div class="flex items-start justify-between">
            <div class="bg-white p-4 mt-10 rounded-lg w-fit shadow-lg mb-8">
                <form action=<?php echo e(route('announcements')); ?> method="GET" class="flex gap-x-4">
                    <div class="col-span-1">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="location">City</label>
                        <input placeholder="city"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600"
                            type="text" name="city" value="<?php echo e(request('city')); ?>">
                    </div>
                    <div class="col-span-1">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="location">Search by date</label>
                        <input
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600"
                            type="date" id="date" name="date" value="<?php echo e(request('date')); ?>" placeholder="">
                    </div>
                    <div class="col-span-1 flex items-end">
                        <button
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition"
                            type="submit">
                            Search
                        </button>
                    </div>
                </form>
            </div>
            <div>
                <h4 class="font-bold text-lg">Pagination slots :</h4>
                <div class="flex gap-4">
                    <form action=<?php echo e(route('announcements')); ?> method="GET" class="w-20 ">
                        <input type="hidden" value="4" name="slots">
                        <button
                            class="rounded-xl py-1 font-bold w-full <?php echo e(request('slots') == 4 ? 'text-black bg-white' : 'bg-black text-white'); ?>">
                            4
                        </button>
                    </form>
                    <form action=<?php echo e(route('announcements')); ?> method="GET" class="w-20 ">
                        <input type="hidden" value="10" name="slots">
                        <button
                            class="rounded-xl py-1 font-bold w-full <?php echo e(request('slots') == 10 ? 'text-black bg-white' : 'bg-black w-full text-white'); ?>">
                            10
                        </button>
                    </form>
                    <form action=<?php echo e(route('announcements')); ?> method="GET" class="w-20 ">
                        <input type="hidden" value="25" name="slots">
                        <button
                            class="rounded-xl py-1 font-bold w-full <?php echo e(request('slots') == 25 ? 'text-black bg-white' : 'bg-black w-full text-white'); ?> ">
                            25
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <?php if(session('success')): ?>
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 my-2">
                <p><?php echo e(session('success')); ?></p>
            </div>
        <?php endif; ?>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-16">
            <?php $__currentLoopData = $announcements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $announcement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white flex flex-col justify-between rounded-lg overflow-hidden shadow-lg  property-card">
                    <div class="overflow-hidden relative">
                        <?php if(empty($announcement->images->first()->path)): ?>
                            <div class="w-full h-56 bg-black"></div>
                        <?php else: ?>
                            <img class="w-full h-56 object-cover property-img"
                                src=<?php echo e(asset('storage/' . $announcement->images->first()->path)); ?> alt="Luxury Villa">
                        <?php endif; ?>
                    </div>
                    <div class="px-6 py-4 relative">
                        <h3 class="text-xl font-bold text-gray-800 mb-2 w-[90%]"><?php echo e($announcement->title); ?></h3>
                        <p class="text-gray-600 mb-4"><?php echo e($announcement->description); ?></p>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-2xl font-bold text-blue-600">$<?php echo e($announcement->price); ?></span>
                            <?php if($announcement->type == 'For Sale'): ?>
                                <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">
                                    <?php echo e($announcement->type); ?>

                                </span>
                            <?php else: ?>
                                <span class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded">
                                    <?php echo e($announcement->type); ?>

                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="flex justify-between text-gray-500 mb-4">
                            <div class="flex items-center">
                                <i class="fas fa-map-marker-alt mr-1"></i>
                                <span><?php echo e($announcement->city); ?></span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-calendar-alt mr-1"></i>
                                <span>
                                    <?php echo e(\Carbon\Carbon::parse($announcement->start_date)->format('M d')); ?> -
                                    <?php echo e(\Carbon\Carbon::parse($announcement->end_date)->format('M d')); ?>

                                </span>
                            </div>
                        </div>
                        <div class="flex justify-between text-gray-500">
                            <div class="flex items-center">
                                <i class="fas fa-bed mr-1"></i>
                                <span><?php echo e($announcement->Beds); ?> Beds</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-bath mr-1"></i>
                                <span><?php echo e($announcement->Baths); ?> Baths</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-ruler-combined mr-1"></i>
                                <span><?php echo e($announcement->sqft); ?> sqft</span>
                            </div>
                        </div>
                        <?php if(in_array($announcement->id, $favoritedIds)): ?>
                            <form action=<?php echo e(route('favorites.delete')); ?> method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" value="0" name="heart">
                                <input type="hidden" value=<?php echo e($announcement->id); ?> name="announcement_id">
                                <button type="submit" class="w-10 h-10 absolute top-2 right-2 cursor-pointer">
                                    <img src=<?php echo e(asset('storage/assets/filledHeart.png')); ?> alt=""
                                        class="w-10 h-10 absolute top-2 right-2 cursor-pointer">
                                </button>
                            </form>
                        <?php else: ?>
                            <form action=<?php echo e(route('favorites.create')); ?> method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" value="0" name="heart">
                                <input type="hidden" value=<?php echo e($announcement->id); ?> name="announcement_id">
                                <button type="submit" class="w-10 h-10 absolute top-2 right-2 cursor-pointer">
                                    <img src=<?php echo e(asset('storage/assets/heart.svg')); ?> alt=""
                                        class="w-10 h-10 absolute top-2 right-2 cursor-pointer">
                                </button>
                            </form>
                        <?php endif; ?>
                    </div>
                    <div class="px-6 py-4 pb-5">
                        <a href="/announcements/<?php echo e($announcement->id); ?>">
                            <button class="p-2 w-full bg-blue-500 text-white rounded-lg mt-4">
                                View Details
                            </button>
                        </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
        <div class="flex items-center my-10 justify-center">
            <?php echo e($announcements->appends(request()->query())->links()); ?>

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

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\Users\hp\Desktop\TA\touristay\resources\views/announcements.blade.php ENDPATH**/ ?>