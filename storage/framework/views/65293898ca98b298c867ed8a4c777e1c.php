<!-- Trigger Button (unchanged) -->
<button id="openModal" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-300">
    Create Announcement
</button>

<!-- Modal (unchanged structure) -->
<div id="modal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center p-4 z-50">
    <div
        class="bg-white rounded-xl shadow-2xl w-full max-w-2xl transform transition-all duration-300 scale-95 max-h-[90vh] overflow-y-auto">
        <!-- Modal Header (unchanged) -->
        <div class="p-6 border-b border-gray-200 flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-800">New Announcement</h2>
            <button id="closeModal" class="text-gray-500 hover:text-gray-700 text-2xl">×</button>
        </div>

        <!-- Modal Body -->
        <form id="announcementForm" class="p-6 space-y-6" method="POST" action="<?php echo e(route('announcements.create')); ?>"
            enctype="multipart/form-data">
            <!-- Title -->
            <?php echo csrf_field(); ?>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                <input type="text" name="title"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                <span class="error text-red-500 text-sm mt-1 hidden"></span>
            </div>

            <!-- Description -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea name="description" rows="4"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                <span class="error text-red-500 text-sm mt-1 hidden"></span>
            </div>

            <!-- Address -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                <input type="text" name="address"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                <span class="error text-red-500 text-sm mt-1 hidden"></span>
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
                    <input type="number" name="beds" min="0"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <span class="error text-red-500 text-sm mt-1 hidden"></span>
                </div>

                <!-- Baths -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Baths</label>
                    <input type="number" name="baths" min="0"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <span class="error text-red-500 text-sm mt-1 hidden"></span>
                </div>

                <!-- Square Feet -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Square Feet</label>
                    <input type="number" name="sqft" min="0"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <span class="error text-red-500 text-sm mt-1 hidden"></span>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Start date</label>
                    <input type='date' name="start_date"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <span class="error text-red-500 text-sm mt-1 hidden"></span>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">End date</label>
                    <input type='date' name="end_date"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <span class="error text-red-500 text-sm mt-1 hidden"></span>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">City</label>
                    <input type='text' name="city"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <span class="error text-red-500 text-sm mt-1 hidden"></span>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Price</label>
                    <input type='number' name="price" step="0.01"
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
                    <option value="For Sale">For Sale</option>
                    <option value="For Rent">For Rent</option>
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
    // Modal Toggle (unchanged)
    const modal = document.getElementById('modal');
    const openModal = document.getElementById('openModal');
    const closeModal = document.getElementById('closeModal');

    openModal.addEventListener('click', () => {
        modal.classList.remove('hidden');
        modal.querySelector('div').classList.remove('scale-95');
        modal.querySelector('div').classList.add('scale-100');
    });

    closeModal.addEventListener('click', () => {
        modal.querySelector('div').classList.remove('scale-100');
        modal.querySelector('div').classList.add('scale-95');
        setTimeout(() => modal.classList.add('hidden'), 200);
    });

    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            closeModal.click();
        }
    });

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

        // Validate images
        if (!images || images.length === 0) {
            showError('images[]', 'At least one image is required');
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
<?php /**PATH C:\Users\hp\Desktop\TA\yc-touristay-2\resources\views/components/announcement_modal.blade.php ENDPATH**/ ?>