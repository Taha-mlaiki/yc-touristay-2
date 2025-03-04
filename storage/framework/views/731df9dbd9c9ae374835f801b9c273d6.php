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
     <?php $__env->slot('header', null, []); ?> 
        <div class="flex w-full items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <?php echo e(__('My Announcements')); ?>

            </h2>
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
     <?php $__env->endSlot(); ?>

    <div class="container mx-auto">
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
    </div>
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
<?php /**PATH C:\Users\hp\Desktop\TA\touristay\resources\views/owner/announcements.blade.php ENDPATH**/ ?>