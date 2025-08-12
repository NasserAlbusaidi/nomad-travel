<x-app-layout>
    <!--
        Recommended: Add these brand colors to your tailwind.config.js for theme consistency.
        theme: {
          extend: {
            colors: {
              'brand-green': '#28a745',
              'brand-blue': '#2c5b6d',
              'brand-light-gray': '#f8f9fa',
              'brand-terracotta': '#e67e22', // Example color for Book Now button
            },
          },
        },
    -->

    <div class="bg-brand-light-gray" x-data="{ activeSession: 'morning' }">
        <div class="max-w-7xl mx-auto py-8 sm:py-12 px-4 sm:px-6 lg:px-8">

            <!-- Header Section -->
            <div class="flex justify-between items-center mb-4">
                <div>
                    <!-- Main Tour Title -->
                    <h1 class="text-2xl sm:text-3xl font-bold text-gray-800">{{ $tour->title }}</h1>

                    <!-- Review Count -->
                    <div class="flex items-center space-x-2 mt-1 text-sm text-gray-600">
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <span>{{ $tour->average_rating }} ({{ $tour->review_count }} {{ Str::plural('review', $tour->review_count) }})</span>
                    </div>
                </div>
                <a href="#gallery" class="hidden md:inline-flex items-center space-x-2 px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                    <span>Gallery</span>
                </a>
            </div>

            <!-- Main Content Grid -->
            <div class="lg:grid lg:grid-cols-3 lg:gap-12">

                <!-- ================================================ -->
                <!-- ==           LEFT COLUMN (Details)            == -->
                <!-- ================================================ -->
                <div class="lg:col-span-2">
                    <!-- Image Gallery -->
                    <div id="gallery" class="rounded-xl overflow-hidden shadow-lg">
                        <img class="w-full h-auto object-cover" src="{{ $tour->image_url }}" alt="Hero image of {{ $tour->title }}">
                    </div>

                    <!-- NOTE: Your model has one `image_url`. For a gallery, you'd typically have a relationship, e.g., a `galleryImages()` method on your Tour model returning many images. -->
                    <div class="mt-2 grid grid-cols-3 sm:grid-cols-5 gap-2">
                        {{-- @foreach($tour->galleryImages as $image)
                            <img src="{{ $image->url }}" alt="Tour gallery image" class="rounded-lg object-cover w-full h-24 cursor-pointer hover:opacity-80 transition"/>
                        @endforeach --}}
                        <!-- Placeholder gallery images -->
                        <img src="{{ $tour->image_url }}" alt="Tour gallery image" class="rounded-lg object-cover w-full h-24 opacity-50"/>
                        <img src="{{ $tour->image_url }}" alt="Tour gallery image" class="rounded-lg object-cover w-full h-24 opacity-50"/>
                        <img src="{{ $tour->image_url }}" alt="Tour gallery image" class="rounded-lg object-cover w-full h-24 opacity-50"/>
                        <img src="{{ $tour->image_url }}" alt="Tour gallery image" class="rounded-lg object-cover w-full h-24 opacity-50"/>
                        <a href="#" class="rounded-lg bg-gray-100 flex items-center justify-center text-sm text-gray-600 hover:bg-gray-200">View More &rarr;</a>
                    </div>

                    <!-- Info Block -->
                    <!-- NOTE: The design shows "3.5 Hours", but your model has `duration_days`. I've used `duration_days` here. You might want to add a `duration_hours` field to your model. -->
                    <div class="mt-8 p-4 bg-white rounded-xl shadow-sm border border-gray-200 grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
                        <div>
                            <p class="font-bold text-brand-blue">Duration</p>
                            <p class="text-gray-700">{{ $tour->duration_days }} {{ Str::plural('Day', $tour->duration_days) }}</p>
                        </div>
                        <div>
                            <p class="font-bold text-brand-blue">Max Capacity</p>
                            <p class="text-gray-700">{{ $tour->group_size }}</p>
                        </div>
                        <div>
                            <p class="font-bold text-brand-blue">Adult</p>
                            <p class="text-gray-700">(age 12-90)</p>
                        </div>
                         <div>
                            <p class="font-bold text-brand-blue">Child</p>
                            <p class="text-gray-700">(age 3-11)</p>
                        </div>
                    </div>

                    <!-- Description & Cruise Type -->
                    <div class="mt-8 p-6 bg-white rounded-xl shadow-sm border border-gray-200">
                        <h2 class="font-display text-2xl font-bold text-charcoal">Description</h2>
                        <div class="mt-4 prose max-w-none text-gray-700">
                            <p>{{ $tour->short_description }}</p>
                        </div>

                        <!-- NOTE: This section implies multiple sessions. Your model has one price. To make this fully functional, you'd need a separate 'TourSession' model with its own prices, related to this tour. -->
                        <div class="mt-6">
                            <h3 class="text-lg font-semibold text-gray-800">Type of Cruise</h3>
                            <p class="text-sm text-gray-500">Infants (under 4 years old) enter free of charge.</p>
                            <div class="mt-4 grid sm:grid-cols-3 gap-4">
                                <button @click="activeSession = 'morning'" :class="{'bg-brand-blue text-white ring-2 ring-brand-blue/50': activeSession === 'morning', 'bg-gray-100 hover:bg-gray-200': activeSession !== 'morning'}" class="p-4 rounded-lg text-left transition">
                                    <span class="block font-semibold">Half Day - Morning</span>
                                    <span class="block text-sm">From OMR {{ number_format($tour->price_omr, 2) }}</span>
                                </button>
                                <button @click="activeSession = 'afternoon'" :class="{'bg-brand-blue text-white ring-2 ring-brand-blue/50': activeSession === 'afternoon', 'bg-gray-100 hover:bg-gray-200': activeSession !== 'afternoon'}" class="p-4 rounded-lg text-left transition">
                                    <span class="block font-semibold">Half Day - Afternoon</span>
                                    <span class="block text-sm">From OMR {{ number_format($tour->price_omr, 2) }}</span>
                                </button>
                                <button @click="activeSession = 'full'" :class="{'bg-brand-blue text-white ring-2 ring-brand-blue/50': activeSession === 'full', 'bg-gray-100 hover:bg-gray-200': activeSession !== 'full'}" class="p-4 rounded-lg text-left transition">
                                    <span class="block font-semibold">Full Day</span>
                                    <span class="block text-sm">From OMR {{ number_format($tour->price_omr + 2, 2) }}</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Meeting and Pickup -->
                    @if(!empty($tour->itinerary))
                    <div class="mt-8 p-6 bg-white rounded-xl shadow-sm border border-gray-200">
                        <h2 class="font-display text-2xl font-bold text-charcoal">Meeting and Pickup</h2>
                        <div class="mt-4 grid md:grid-cols-2 gap-4">
                           <div>
                                <h3 class="font-semibold text-gray-800">Meeting point</h3>
                                <p class="text-gray-600">{{ $tour->itinerary[0]['description'] ?? 'Not specified' }}</p>
                           </div>
                           <div>
                                <h3 class="font-semibold text-gray-800">End point</h3>
                                <p class="text-gray-600">{{ $tour->end_point_description }}</p>

                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Included & Excluded Section -->
                    @if(!empty($tour->included_items) || !empty($tour->excluded_items))
                    <div class="mt-8 p-6 bg-white rounded-xl shadow-sm border border-gray-200">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            @if(!empty($tour->included_items))
                            <div>
                                <h3 class="font-display text-xl font-bold text-charcoal mb-4">Included</h3>
                                <ul class="space-y-3">
                                    @foreach($tour->included_items as $item)
                                    <li class="flex items-center">
                                        <svg class="h-6 w-6 text-brand-green flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                        <span class="ml-2 text-gray-700">{{ $item }}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            @if(!empty($tour->excluded_items))
                            <div>
                                <h3 class="font-display text-xl font-bold text-charcoal mb-4">Excluded</h3>
                                <ul class="space-y-3">
                                    @foreach($tour->excluded_items as $item)
                                    <li class="flex items-center">
                                        <svg class="h-6 w-6 text-red-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                                        <span class="ml-2 text-gray-700">{{ $item }}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endif

                    <!-- Travel Itinerary Section -->
                    @if(!empty($tour->itinerary))
                    <div class="mt-8 p-6 bg-white rounded-xl shadow-sm border border-gray-200">
                        <h3 class="font-display text-2xl font-bold text-charcoal">Travel Itinerary</h3>
                        <div class="mt-6 flow-root">
                            <ul class="-mb-8">
                                @foreach($tour->itinerary as $item)
                                <li>
                                    <div class="relative pb-8">
                                        @if (!$loop->last)
                                        <span class="absolute left-4 top-4 -ml-px h-full w-0.5 bg-gray-200"></span>
                                        @endif
                                        <div class="relative flex items-center space-x-3">
                                            <div class="h-8 w-8 bg-brand-blue rounded-full ring-4 ring-white flex items-center justify-center flex-shrink-0">
                                                <svg class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.414-1.415L11 9.586V6z" clip-rule="evenodd" /></svg>
                                            </div>
                                            <div class="min-w-0 flex-1">
                                                <p class="font-semibold text-gray-800">{{ $item['time'] }} - {{ $item['title'] }}</p>
                                                <p class="text-sm text-gray-600">{{ $item['description'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- ================================================ -->
                <!-- ==        RIGHT COLUMN (Booking Widget)       == -->
                <!-- ================================================ -->
                <div class="mt-8 lg:mt-0">
                    <div class="sticky top-8 bg-white p-6 rounded-xl shadow-lg border border-gray-200" x-data="{ adults: 1, children: 0 }">
                        <h2 class="text-xl font-bold text-charcoal leading-tight">{{ $tour->title }}</h2>

                        @if($tour->has_free_cancellation)
                        <div class="mt-4 p-3 flex items-center bg-green-50 border border-green-200 rounded-lg">
                            <svg class="h-6 w-6 text-brand-green flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            <div class="ml-3">
                                <p class="font-semibold text-brand-green">Free cancellation available</p>
                                <p class="text-xs text-green-700">Cancel for free 48 hours before the trip</p>
                            </div>
                        </div>
                        @endif

                        <div class="mt-4 text-right">
                            <p class="text-sm text-gray-500">From</p>
                            <p class="text-3xl font-bold text-brand-blue">{{ number_format($tour->price_omr, 3) }} <span class="text-lg font-medium text-gray-700">OMR</span></p>
                        </div>

                        <div class="mt-6 space-y-4">
                            <div>
                                <label for="booking-date" class="block text-sm font-medium text-gray-700">Select Date</label>
                                <input type="date" id="booking-date" name="booking-date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-brand-blue focus:border-brand-blue">
                            </div>

                            <div>
                                <p class="block text-sm font-medium text-gray-700">Person Info</p>
                                <div class="mt-2 space-y-3">
                                    <!-- Adults Counter -->
                                    <div class="flex justify-between items-center">
                                        <label for="adults-counter" class="text-gray-600">Adults</label>
                                        <div class="flex items-center space-x-3">
                                            <button @click="adults = Math.max(1, adults - 1)" class="h-7 w-7 rounded-full border border-gray-300 text-gray-600 hover:bg-gray-100 disabled:opacity-50" :disabled="adults <= 1">-</button>
                                            <span x-text="adults" id="adults-counter" class="font-semibold w-4 text-center"></span>
                                            <button @click="adults++" class="h-7 w-7 rounded-full border border-gray-300 text-gray-600 hover:bg-gray-100">+</button>
                                        </div>
                                    </div>
                                    <!-- Children Counter -->
                                     <div class="flex justify-between items-center">
                                        <label for="children-counter" class="text-gray-600">Children</label>
                                        <div class="flex items-center space-x-3">
                                            <button @click="children = Math.max(0, children - 1)" class="h-7 w-7 rounded-full border border-gray-300 text-gray-600 hover:bg-gray-100 disabled:opacity-50" :disabled="children <= 0">-</button>
                                            <span x-text="children" id="children-counter" class="font-semibold w-4 text-center"></span>
                                            <button @click="children++" class="h-7 w-7 rounded-full border border-gray-300 text-gray-600 hover:bg-gray-100">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6">
                            <button class="w-full text-center bg-brand-terracotta text-white font-bold tracking-wide uppercase px-8 py-3 rounded-lg hover:bg-opacity-90 transition duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-terracotta">
                                Book Now
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
