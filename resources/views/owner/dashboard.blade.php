<x-app-layout>
    <x-slot name="header" class="flex">
        <div class="flex items-center gap-x-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <h2 class="font-semibold text-xl ms-5 text-gray-800 leading-tight">
                <x-nav-link :href="route('owner.reservations')" :active="request()->routeIs('owner.reservations')">
                    {{ __('Reservations') }}
                </x-nav-link>
            </h2>

        </div>
    </x-slot>

   
</x-app-layout>
