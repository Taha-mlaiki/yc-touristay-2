<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

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
                <p class="text-3xl font-bold text-gray-800">{{ $announcementCount }}</p>
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
                <p class="text-3xl font-bold text-gray-800">{{ $usersCount }}</p>
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
                <p class="text-3xl font-bold text-gray-800">${{ $AverageRentingPrice }}</p>
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
                <p class="text-3xl font-bold text-gray-800">${{ $AverageSellingPrice }}</p>
                <p class="text-sm text-red-500 mt-2">
                </p>
            </div>
        </div>
    </div>
    <div class="bg-gray-100 container mx-auto">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            @if (session('success'))
                <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 my-2">
                    <p>{{ session('success') }}</p>
                </div>
            @endif
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
                        @foreach ($announcements as $announcement)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="font-medium text-gray-900">{{ $announcement->title }}</div>
                                </td>
                                <td class="px-6 py-4 text-gray-600">{{ $announcement->city }}</td>
                                <td class="px-6 py-4 text-gray-600">{{ date("d-m-Y", strtotime($announcement->start_date)) }}</td>
                                <td class="px-6 py-4 text-gray-600">{{ date("d-m-Y", strtotime($announcement->end_date)) }}</td>
                                <td class="px-6 py-4 text-center">
                                    <form action={{ route('announcement_disable') }} method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="announcement_id" value='{{ $announcement->id }}'>
                                        <button type="submit"
                                            class="text-red-500 hover:text-red-700 hover:bg-red-50 rounded-full p-2 transition-colors">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
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


</x-app-layout>
