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
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Update announcement')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="container mx-auto py-10">
        <div class="bg-white mt-10 rounded-xl shadow-lg w-full max-w-3xl mx-auto ">
            <?php if(session('success')): ?>
                <div class="bg-green-100 m-3 mt-10   border-l-4 border-green-500 text-green-700 p-4 my-2">
                    <p><?php echo e(session('success')); ?></p>
                </div>
            <?php endif; ?>
            <!-- Modal Body -->
            <form id="announcementForm" class="p-6 space-y-6" method="POST" action="<?php echo e(route('announcement_update')); ?>"
                enctype="multipart/form-data">
                <input type="hidden" name="announcement_id" value="<?php echo e($announcement->id); ?>">
                <!-- Title -->
                <?php echo method_field('PUT'); ?>
                <?php echo csrf_field(); ?>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                    <input type="text" name="title" value="<?php echo e($announcement->title); ?>"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <span class="error text-red-500 text-sm mt-1 hidden"></span>
                </div>

                <!-- Description -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea name="description" rows="4"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"><?php echo e($announcement->description); ?></textarea>
                    <span class="error text-red-500 text-sm mt-1 hidden"></span>
                </div>

                <!-- Address -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                    <input type="text" name="address" value="<?php echo e($announcement->address); ?>"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <span class="error text-red-500 text-sm mt-1 hidden"></span>
                </div>

                <div class="flex items-center my-4 gap-3">
                    <?php $__currentLoopData = $announcement->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <img src="<?php echo e(asset("storage/$image->path")); ?>" alt=""
                            class='w-40 aspect-video rounded-lg bg-cover'>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <!-- Images -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Images</label>
                    <input type="file" name="images[]" accept="image/*" multiple
                        class="w-full p-3 border border-gray-300 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                    <span class="error text-red-500 text-sm mt-1 hidden"></span>
                </div>

                <!-- Property Details Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Beds -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Beds</label>
                        <input type="number" name="Beds" min="0" value='<?php echo e($announcement->Beds); ?>'
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <span class="error text-red-500 text-sm mt-1 hidden"></span>
                    </div>

                    <!-- Baths -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Baths</label>
                        <input type="number" name="Baths" min="0" value='<?php echo e($announcement->Baths); ?>'
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <span class="error text-red-500 text-sm mt-1 hidden"></span>
                    </div>

                    <!-- Square Feet -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Square Feet</label>
                        <input type="number" name="sqft" min="0" value='<?php echo e($announcement->sqft); ?>'
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <span class="error text-red-500 text-sm mt-1 hidden"></span>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Start date</label>
                        <input type='date' name="start_date" value='<?php echo e($announcement->start_date); ?>'
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <span class="error text-red-500 text-sm mt-1 hidden"></span>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">End date</label>
                        <input type='date' name="end_date" value='<?php echo e($announcement->end_date); ?>'
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <span class="error text-red-500 text-sm mt-1 hidden"></span>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">City</label>
                        <input type='text' name="city" value='<?php echo e($announcement->city); ?>'
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <span class="error text-red-500 text-sm mt-1 hidden"></span>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Price</label>
                        <input type='number' name="price" step="0.01" value='<?php echo e($announcement->price); ?>'
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <span class="error text-red-500 text-sm mt-1 hidden"></span>
                    </div>
                </div>

                <!-- Type -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Type</label>
                    <select name="type"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">Select Type</option>
                        <option value="For Sale" <?php echo e($announcement->type == 'For Sale' ? 'selected' : ''); ?>>For Sale
                        </option>
                        <option value="For Rent" <?php echo e($announcement->type == 'For Rent' ? 'selected' : ''); ?>>For Rent
                        </option>
                    </select>
                    <span class="error text-red-500 text-sm mt-1 hidden"></span>
                </div>

                <!-- Submit Button (unchanged) -->
                <div class="flex justify-end pt-4">
                    <button type="submit"
                        class="bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition duration-300 shadow-md">
                        Submit Announcement
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Form Validation and Submission
        const form = document.getElementById('announcementForm');

        // Function to clear all errors
        const clearErrors = () => {
            form.querySelectorAll('.error').forEach(error => {
                error.classList.add('hidden');
                error.textContent = '';
            });
        };

        // Function to show error
        const showError = (fieldName, message) => {
            const input = form.querySelector(`[name="${fieldName}"]`) || form.querySelector(`[name="${fieldName}[]"]`);
            const errorSpan = input.nextElementSibling;
            errorSpan.textContent = message;
            errorSpan.classList.remove('hidden');
        };

        form.addEventListener('submit', (e) => {
            e.preventDefault();

            // Clear previous errors
            clearErrors();

            // Get form values
            const formData = new FormData(form);
            const data = Object.fromEntries(formData);
            const images = form.querySelector('input[name="images[]"]').files;

            data.beds = Number(data.beds) || 0;
            data.baths = Number(data.baths) || 0;
            data.sqft = Number(data.sqft) || 0;
            data.price = Number(data.price) || 0;

            // Validation flags
            let isValid = true;

            // Validate each field
            if (!data.title.trim()) {
                showError('title', 'Title is required');
                isValid = false;
            }

            if (!data.description.trim()) {
                showError('description', 'Description is required');
                isValid = false;
            }

            if (!data.address.trim()) {
                showError('address', 'Address is required');
                isValid = false;
            }


            if (data.beds < 0) {
                showError('beds', 'Beds cannot be negative');
                isValid = false;
            }

            if (data.baths < 0) {
                showError('baths', 'Baths cannot be negative');
                isValid = false;
            }

            if (data.sqft < 0) {
                showError('sqft', 'Square feet cannot be negative');
                isValid = false;
            }
            if (data.price < 0) {
                showError('price', 'price cannot be negative');
                isValid = false;
            }

            if (!data.type) {
                showError('type', 'Please select a type');
                isValid = false;
            }

            // If all validations pass, submit the form
            if (isValid) {
                form.submit();
            }
        });
    </script>
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
<?php /**PATH C:\Users\hp\Desktop\TA\touristay\resources\views/owner/announcement_edit.blade.php ENDPATH**/ ?>