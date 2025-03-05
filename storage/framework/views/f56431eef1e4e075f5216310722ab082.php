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
     <?php $__env->slot('header', null, ['class' => 'flex']); ?> 
        <div class="flex items-center gap-x-4">
            <h2 class="font-semibold text-xl ms-5 text-gray-800 leading-tight">
                <?php if (isset($component)) { $__componentOriginalc295f12dca9d42f28a259237a5724830 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc295f12dca9d42f28a259237a5724830 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nav-link','data' => ['href' => route('admin.reservations'),'active' => request()->routeIs('admin.reservations')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.reservations')),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.reservations'))]); ?>
                    <?php echo e(__('Reservations')); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc295f12dca9d42f28a259237a5724830)): ?>
<?php $attributes = $__attributesOriginalc295f12dca9d42f28a259237a5724830; ?>
<?php unset($__attributesOriginalc295f12dca9d42f28a259237a5724830); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc295f12dca9d42f28a259237a5724830)): ?>
<?php $component = $__componentOriginalc295f12dca9d42f28a259237a5724830; ?>
<?php unset($__componentOriginalc295f12dca9d42f28a259237a5724830); ?>
<?php endif; ?>
            </h2>

        </div>
     <?php $__env->endSlot(); ?>

    <div class="bg-gray-100 container mx-auto p-4 md:p-8">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Active Listings Card -->
            <div class="bg-white rounded-lg shadow-md p-6 transition duration-300 hover:shadow-lg">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold text-gray-700">Active Announcements</h2>
                    <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center">
                        <i class="fas fa-home text-blue-500 text-xl"></i>
                    </div>
                </div>
                <p class="text-3xl font-bold text-gray-800"><?php echo e($announcementCount); ?></p>
                <p class="text-sm text-green-500 mt-2">
                </p>
            </div>

            <!-- Total Users Card -->
            <div class="bg-white rounded-lg shadow-md p-6 transition duration-300 hover:shadow-lg">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold text-gray-700">Total Users</h2>
                    <div class="w-12 h-12 rounded-full bg-purple-100 flex items-center justify-center">
                        <i class="fas fa-users text-purple-500 text-xl"></i>
                    </div>
                </div>
                <p class="text-3xl font-bold text-gray-800"><?php echo e($usersCount); ?></p>
                <p class="text-sm text-green-500 mt-2">
                </p>
            </div>


            <!-- Average Price Card -->
            <div class="bg-white rounded-lg shadow-md p-6 transition duration-300 hover:shadow-lg">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold text-gray-700">Average Renting Price</h2>
                    <div class="w-12 h-12 rounded-full bg-yellow-100 flex items-center justify-center">
                        <i class="fas fa-tag text-yellow-500 text-xl"></i>
                    </div>
                </div>
                <p class="text-3xl font-bold text-gray-800">$<?php echo e($AverageRentingPrice); ?></p>
                <p class="text-sm text-red-500 mt-2">
                </p>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6 transition duration-300 hover:shadow-lg">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold text-gray-700">Average Selling Price</h2>
                    <div class="w-12 h-12 rounded-full bg-yellow-100 flex items-center justify-center">
                        <i class="fas fa-tag text-yellow-500 text-xl"></i>
                    </div>
                </div>
                <p class="text-3xl font-bold text-gray-800">$<?php echo e($AverageSellingPrice); ?></p>
                <p class="text-sm text-red-500 mt-2">
                </p>
            </div>
        </div>
    </div>
    <div class="bg-gray-100 container mx-auto">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <?php if(session('success')): ?>
                <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 my-2">
                    <p><?php echo e(session('success')); ?></p>
                </div>
            <?php endif; ?>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-100 text-left text-gray-600 uppercase text-xs tracking-wider">
                            <th class="px-6 py-4">Title</th>
                            <th class="px-6 py-4">City</th>
                            <th class="px-6 py-4">Start Date</th>
                            <th class="px-6 py-4">End Date</th>
                            <th class="px-6 py-4 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php $__currentLoopData = $announcements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $announcement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="font-medium text-gray-900"><?php echo e($announcement->title); ?></div>
                                </td>
                                <td class="px-6 py-4 text-gray-600"><?php echo e($announcement->city); ?></td>
                                <td class="px-6 py-4 text-gray-600">
                                    <?php echo e(date('d-m-Y', strtotime($announcement->start_date))); ?></td>
                                <td class="px-6 py-4 text-gray-600">
                                    <?php echo e(date('d-m-Y', strtotime($announcement->end_date))); ?></td>
                                <td class="px-6 py-4 text-center">
                                    <form action=<?php echo e(route('announcement_disable')); ?> method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <input type="hidden" name="announcement_id" value='<?php echo e($announcement->id); ?>'>
                                        <button type="submit"
                                            class="text-red-500 hover:text-red-700 hover:bg-red-50 rounded-full p-2 transition-colors">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <!-- Row 1 -->



                    </tbody>
                </table>
            </div>
        </div>

        <!-- Responsive behavior note -->
        <p class="text-sm text-gray-500 mt-4">
            <i class="fas fa-info-circle mr-1"></i> The table will scroll horizontally on smaller screens.
        </p>
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
<?php /**PATH C:\Users\hp\Desktop\TA\yc-touristay-2\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>