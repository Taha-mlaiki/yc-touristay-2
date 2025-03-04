<x-app-layout>
    <x-slot name="header">
        <div class="flex w-full items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('My Announcements') }}
            </h2>
            <x-announcement_modal />
        </div>
    </x-slot>

    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-16">
            @foreach ($announcements as $announcement)
                <div class="bg-white flex flex-col justify-between rounded-lg overflow-hidden shadow-lg  property-card">
                    <div class="overflow-hidden relative">
                        @if (empty($announcement->images->first()->path))
                            <div class="w-full h-56 bg-black"></div>
                        @else
                            <img class="w-full h-56 object-cover property-img"
                                src={{ asset('storage/' . $announcement->images->first()->path) }} alt="Luxury Villa">
                        @endif
                    </div>
                    <div class="px-6 py-4 relative">
                        <h3 class="text-xl font-bold text-gray-800 mb-2 w-[90%]">{{ $announcement->title }}</h3>
                        <p class="text-gray-600 mb-4">{{ $announcement->description }}</p>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-2xl font-bold text-blue-600">${{ $announcement->price }}</span>
                            @if ($announcement->type == 'For Sale')
                                <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">
                                    {{ $announcement->type }}
                                </span>
                            @else
                                <span class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded">
                                    {{ $announcement->type }}
                                </span>
                            @endif
                        </div>
                        <div class="flex justify-between text-gray-500 mb-4">
                            <div class="flex items-center">
                                <i class="fas fa-map-marker-alt mr-1"></i>
                                <span>{{ $announcement->city }}</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-calendar-alt mr-1"></i>
                                <span>
                                    {{ \Carbon\Carbon::parse($announcement->start_date)->format('M d') }} -
                                    {{ \Carbon\Carbon::parse($announcement->end_date)->format('M d') }}
                                </span>
                            </div>
                        </div>
                        <div class="flex justify-between text-gray-500">
                            <div class="flex items-center">
                                <i class="fas fa-bed mr-1"></i>
                                <span>{{ $announcement->Beds }} Beds</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-bath mr-1"></i>
                                <span>{{ $announcement->Baths }} Baths</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-ruler-combined mr-1"></i>
                                <span>{{ $announcement->sqft }} sqft</span>
                            </div>
                        </div>
                        @if (in_array($announcement->id, $favoritedIds))
                            <form action={{ route('favorites.delete') }} method="POST">
                                @csrf
                                <input type="hidden" value="0" name="heart">
                                <input type="hidden" value={{ $announcement->id }} name="announcement_id">
                                <button type="submit" class="w-10 h-10 absolute top-2 right-2 cursor-pointer">
                                    <img src={{ asset('storage/assets/filledHeart.png') }} alt=""
                                        class="w-10 h-10 absolute top-2 right-2 cursor-pointer">
                                </button>
                            </form>
                        @else
                            <form action={{ route('favorites.create') }} method="POST">
                                @csrf
                                <input type="hidden" value="0" name="heart">
                                <input type="hidden" value={{ $announcement->id }} name="announcement_id">
                                <button type="submit" class="w-10 h-10 absolute top-2 right-2 cursor-pointer">
                                    <img src={{ asset('storage/assets/heart.svg') }} alt=""
                                        class="w-10 h-10 absolute top-2 right-2 cursor-pointer">
                                </button>
                            </form>
                        @endif
                    </div>
                    <div class="px-6 py-4 pb-5">
                        <a href="/announcements/{{ $announcement->id }}">
                            <button class="p-2 w-full bg-blue-500 text-white rounded-lg mt-4">
                                View Details
                            </button>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
