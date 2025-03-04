<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update announcement') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-10">
        <div class="bg-white mt-10 rounded-xl shadow-lg w-full max-w-3xl mx-auto ">
            @if (session('success'))
                <div class="bg-green-100 m-3 mt-10   border-l-4 border-green-500 text-green-700 p-4 my-2">
                    <p>{{ session('success') }}</p>
                </div>
            @endif
            <!-- Modal Body -->
            <form id="announcementForm" class="p-6 space-y-6" method="POST" action="{{ route('announcement_update') }}"
                enctype="multipart/form-data">
                <input type="hidden" name="announcement_id" value="{{ $announcement->id }}">
                <!-- Title -->
                @method('PUT')
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                    <input type="text" name="title" value="{{ $announcement->title }}"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <span class="error text-red-500 text-sm mt-1 hidden"></span>
                </div>

                <!-- Description -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea name="description" rows="4"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">{{ $announcement->description }}</textarea>
                    <span class="error text-red-500 text-sm mt-1 hidden"></span>
                </div>

                <!-- Address -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                    <input type="text" name="address" value="{{ $announcement->address }}"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <span class="error text-red-500 text-sm mt-1 hidden"></span>
                </div>

                <div class="flex items-center my-4 gap-3">
                    @foreach ($announcement->images as $image)
                        <img src="{{ asset("storage/$image->path") }}" alt=""
                            class='w-40 aspect-video rounded-lg bg-cover'>
                    @endforeach
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
                        <input type="number" name="Beds" min="0" value='{{ $announcement->Beds }}'
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <span class="error text-red-500 text-sm mt-1 hidden"></span>
                    </div>

                    <!-- Baths -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Baths</label>
                        <input type="number" name="Baths" min="0" value='{{ $announcement->Baths }}'
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <span class="error text-red-500 text-sm mt-1 hidden"></span>
                    </div>

                    <!-- Square Feet -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Square Feet</label>
                        <input type="number" name="sqft" min="0" value='{{ $announcement->sqft }}'
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <span class="error text-red-500 text-sm mt-1 hidden"></span>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Start date</label>
                        <input type='date' name="start_date" value='{{ $announcement->start_date }}'
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <span class="error text-red-500 text-sm mt-1 hidden"></span>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">End date</label>
                        <input type='date' name="end_date" value='{{ $announcement->end_date }}'
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <span class="error text-red-500 text-sm mt-1 hidden"></span>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">City</label>
                        <input type='text' name="city" value='{{ $announcement->city }}'
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <span class="error text-red-500 text-sm mt-1 hidden"></span>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Price</label>
                        <input type='number' name="price" step="0.01" value='{{ $announcement->price }}'
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
                        <option value="For Sale" {{ $announcement->type == 'For Sale' ? 'selected' : '' }}>For Sale
                        </option>
                        <option value="For Rent" {{ $announcement->type == 'For Rent' ? 'selected' : '' }}>For Rent
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
</x-app-layout>
