
@props(['reservations', 'announcement_id'])
<div id="openModalBtn" class="mt-4 pt-4 border-t border-blue-400 border-opacity-30">
    <button
        class="w-full bg-white text-blue-700 hover:bg-blue-50 font-bold py-3 px-6 rounded-lg transition duration-300 flex items-center justify-center gap-2">
        Reserve now
    </button>
</div>

<!-- Modal Container -->
<div id="reservationModal"
    class="modal-backdrop bg-black/50 fixed inset-0 flex items-center justify-center z-50 hidden opacity-0">
    <!-- Modal Content -->
    <div class="modal-content fixed  bg-white rounded-lg shadow-xl w-full max-w-md mx-auto">
        <!-- Modal Header -->
        <div class="p-5 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <h3 class="text-xl font-semibold text-gray-800">Reserve a Property</h3>
                <button id="closeModalBtn" class="text-gray-400 hover:text-gray-500 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Modal Body -->
        <div class="p-5">
            <form action={{ route("create_reservation") }} method="POST" id="reservationForm">
                @csrf
                <!-- Date Inputs -->
                <input type="hidden" name="announcement_id" value='{{ $announcement_id }}'>
                <div class="mb-4">
                    <label for="start_date" class="block text-sm font-medium text-gray-700 mb-1">Check-in Date*</label>
                    <input type="text" id="start_date" name="start_date" placeholder="Select check-in date"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        required>
                    <p id="start_date_error" class="mt-1 text-sm text-red-600 hidden">Please select a check-in date</p>
                </div>

                <div class="mb-6">
                    <label for="end_date" class="block text-sm font-medium text-gray-700 mb-1">Check-out Date*</label>
                    <input type="text" id="end_date" name="end_date" placeholder="Select check-out date"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        required>
                    <p id="end_date_error" class="mt-1 text-sm text-red-600 hidden">Please select a check-out date</p>
                    <p id="date_range_error" class="mt-1 text-sm text-red-600 hidden">Check-out date must be after
                        check-in date</p>
                </div>

                <!-- Form Footer with Buttons -->
                <div class="flex flex-col-reverse sm:flex-row sm:justify-end gap-3">
                    <button type="button" id="cancelBtn"
                        class="w-full sm:w-auto px-4 py-2 border border-gray-300 rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm transition duration-300 ease-in-out">
                        Cancel
                    </button>
                    <button type="submit" id="reserveBtn"
                        class="w-full sm:w-auto px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-300 ease-in-out">
                        Reserve Now
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Elements
        const modal = document.getElementById('reservationModal');
        const modalContent = modal.querySelector('.modal-content');
        const openModalBtn = document.getElementById('openModalBtn');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const cancelBtn = document.getElementById('cancelBtn');
        const form = document.getElementById('reservationForm');

        // Date error elements
        const startDateError = document.getElementById('start_date_error');
        const endDateError = document.getElementById('end_date_error');
        const dateRangeError = document.getElementById('date_range_error');

        let disabledDates = @json($reservations) ? @json($reservations).map(res => ({
            from: res.start_date,
            to: res.end_date
        })) : [];
        // Initialize Flatpickr for start date
        const startDatePicker = flatpickr("#start_date", {
            dateFormat: "Y-m-d",
            minDate: "today",
            onChange: function(selectedDates) {
                // Update the minimum date for end date picker
                if (selectedDates[0]) {
                    const nextDay = new Date(selectedDates[0]);
                    nextDay.setDate(nextDay.getDate() + 1);
                    endDatePicker.set('minDate', nextDay);

                    // Clear error if it was shown
                    startDateError.classList.add('hidden');
                    validateDates();
                }
            },
            disable: disabledDates
        });

        // Initialize Flatpickr for end date
        const endDatePicker = flatpickr("#end_date", {
            dateFormat: "Y-m-d",
            minDate: new Date().fp_incr(1), // Default to tomorrow
            onChange: function(selectedDates) {
                if (selectedDates[0]) {
                    // Clear error if it was shown
                    endDateError.classList.add('hidden');
                    validateDates();
                }
            },
            disable: disabledDates
        });

        // Function to validate dates
        function validateDates() {
            const startDate = document.getElementById('start_date').value;
            const endDate = document.getElementById('end_date').value;

            if (startDate && endDate) {
                const start = new Date(startDate);
                const end = new Date(endDate);

                if (end <= start) {
                    dateRangeError.classList.remove('hidden');
                    return false;
                } else {
                    dateRangeError.classList.add('hidden');
                    return true;
                }
            }
            return true; // No validation needed if one of the dates is empty
        }

        // Open modal function
        function openModal() {
            modal.classList.remove('hidden');
            // Trigger reflow to ensure transitions work
            void modal.offsetWidth;
            modal.classList.remove('modal-enter');
            modal.classList.remove('modal-leave');
            modal.style.opacity = '1';
        }

        // Close modal function
        function closeModal() {
            modal.classList.add('modal-leave');
            setTimeout(() => {
                modal.classList.add('hidden');
                modal.style.opacity = '0';
                // Reset form
                form.reset();
                startDateError.classList.add('hidden');
                endDateError.classList.add('hidden');
                dateRangeError.classList.add('hidden');
            }, 300);
        }

        // Event Listeners
        openModalBtn.addEventListener('click', openModal);
        closeModalBtn.addEventListener('click', closeModal);
        cancelBtn.addEventListener('click', closeModal);

        // Close on outside click
        modal.addEventListener('click', function(event) {
            if (event.target === modal) {
                closeModal();
            }
        });

        // Close on Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape' && !modal.classList.contains('hidden')) {
                closeModal();
            }
        });

        // Form submission
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            // Get form values
            const startDate = document.getElementById('start_date').value;
            const endDate = document.getElementById('end_date').value;

            // Validate required fields
            let isValid = true;

            if (!startDate) {
                startDateError.classList.remove('hidden');
                isValid = false;
            } else {
                startDateError.classList.add('hidden');
            }

            if (!endDate) {
                endDateError.classList.remove('hidden');
                isValid = false;
            } else {
                endDateError.classList.add('hidden');
            }

            // Validate date range
            if (isValid && !validateDates()) {
                isValid = false;
            }

            if (isValid) {
                form.submit()
                closeModal();
            }
        });

        // Add modal-enter class for animation when page loads
        modal.classList.add('modal-enter');
    });
</script>
