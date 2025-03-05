<x-app-layout>
    <x-slot name="header" class="flex">
        <div class="flex items-center gap-x-4">
            <h2 class="font-semibold text-xl ms-5 text-gray-800 leading-tight">
                <x-nav-link :href="route('admin.reservations')" :active="request()->routeIs('admin.reservations')">
                    {{ __('Reservations') }}
                </x-nav-link>
            </h2>

        </div>
    </x-slot>

    <div class="container mx-auto my-10 bg-white shadow-lg shadow-red-300">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-100 text-left text-gray-600 uppercase text-xs tracking-wider">
                        <th class="px-6 py-4">User</th>
                        <th class="px-6 py-4">email</th>
                        <th class="px-6 py-4">property Name</th>
                        <th class="px-6 py-4">Start Date</th>
                        <th class="px-6 py-4">End Date</th>
                        <th class="px-6 py-4">price</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($reservations as $reservation)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="font-medium text-gray-900">{{ $reservation->user->name }}</div>
                            </td>
                            <td class="px-6 py-4 text-gray-600">{{ $reservation->user->email }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ $reservation->announcement->title }}</td>
                            <td class="px-6 py-4 text-gray-600">
                                {{ date('d-m-Y', strtotime($reservation->start_date)) }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ date('d-m-Y', strtotime($reservation->end_date)) }}
                            </td>
                            <td class="px-6 py-4 text-gray-600">${{ $reservation->announcement->price }}
                            </td>

                        </tr>
                    @endforeach
                    <!-- Row 1 -->



                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
