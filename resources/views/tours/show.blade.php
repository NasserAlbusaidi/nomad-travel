<x-app-layout>
    {{--
        ENHANCEMENTS:
        - Increased vertical padding on the main container (py-12).
        - Increased main content gap (gap-12).
    --}}
    <div class="bg-brand-light-gray" x-data="{ activeSession: 'morning' }">
        <div class="max-w-7xl mx-auto py-8 sm:py-12 px-4 sm:px-6 lg:px-8">

            <!-- ================================================ -->
            <!-- ==          ENHANCED Header Section           == -->
            <!-- ================================================ -->
            <div class="flex justify-between items-start mb-8">
                <div>
                    <!-- Main Tour Title: Made larger and bolder -->
                    <h1 class="text-4xl sm:text-5xl font-extrabold text-gray-900 leading-tight">{{ $tour->title }}</h1>

                    <!-- Review Count: Increased font size and improved visual hierarchy -->
                    <div class="flex items-center space-x-2 mt-3 text-base text-gray-700">
                        <svg class="w-6 h-6 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <span class="font-semibold">{{ $tour->average_rating }}</span>
                        <span class="text-gray-500">({{ $tour->review_count }} {{ Str::plural('review', $tour->review_count) }})</span>
                    </div>
                </div>
                <!-- Gallery Button: Styled to be more prominent with hover effect -->
                <a href="#gallery" class="hidden md:inline-flex items-center space-x-2 px-5 py-3 border border-transparent rounded-full shadow-sm text-base font-medium text-white bg-brand-blue hover:bg-opacity-90 transition-transform transform hover:scale-105">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                    <span>Gallery</span>
                </a>
            </div>

            <!-- Main Content Grid -->
            <div class="lg:grid lg:grid-cols-3 lg:gap-16">

                <!-- ================================================ -->
                <!-- ==           LEFT COLUMN (Details)            == -->
                <!-- ================================================ -->
                <div class="lg:col-span-2 space-y-12">
                    <div>
                        <!-- Image Gallery: Larger radius, more prominent shadow -->
                        <div id="gallery" class="rounded-2xl overflow-hidden shadow-2xl">
                            <img class="w-full h-auto object-cover" src="{{ Storage::url($tour->image_url) }}" alt="Hero image of {{ $tour->title }}">
                        </div>

                        <!-- Thumbnails: Added hover effect, larger radius and size -->
                        <div class="mt-4 grid grid-cols-3 sm:grid-cols-5 gap-4">
                            @foreach($tour->galleryImages as $image)
                                <img src="{{ Storage::url($image->image_url) }}" alt="Tour gallery image" class="rounded-xl object-cover w-full h-28 cursor-pointer hover:opacity-90 transition-all duration-300 transform hover:scale-105"/>
                            @endforeach

                            <a href="#" class="rounded-xl bg-gray-200 flex items-center justify-center text-base text-gray-700 hover:bg-gray-300 transition-all duration-300">
                                <span>More &rarr;</span>
                            </a>
                        </div>
                    </div>

                    <!-- Info Block: Increased padding, larger fonts, and softer radius/shadow -->
                    <div class="p-6 bg-white rounded-2xl shadow-lg border border-gray-200 grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                        <div>
                            <p class="font-bold text-lg text-brand-blue">Duration</p>
                            <p class="text-gray-800 text-base">{{ $tour->duration_days }} {{ Str::plural('Day', $tour->duration_days) }}</p>
                        </div>
                        <div>
                            <p class="font-bold text-lg text-brand-blue">Max Capacity</p>
                            <p class="text-gray-800 text-base">{{ $tour->group_size }}</p>
                        </div>
                        <div>
                            <p class="font-bold text-lg text-brand-blue">Adult</p>
                            <p class="text-gray-600 text-base">(age 12-90)</p>
                        </div>
                         <div>
                            <p class="font-bold text-lg text-brand-blue">Child</p>
                            <p class="text-gray-600 text-base">(age 3-11)</p>
                        </div>
                    </div>

                    <!-- Description & Cruise Type: Enhanced typography, padding, and button styles -->
                    <div class="p-8 bg-white rounded-2xl shadow-lg border border-gray-200">
                        <h2 class="font-display text-3xl font-bold text-charcoal">Description</h2>
                        <div class="mt-4 prose-lg max-w-none text-gray-700 leading-relaxed">
                            <p>{{ $tour->short_description }}</p>
                        </div>

                        <div class="mt-8">
                            <h3 class="text-2xl font-semibold text-gray-900">Type of Cruise</h3>
                            <p class="text-base text-gray-600 mt-1">Infants (under 4 years old) enter free of charge.</p>
                            <!-- Session Buttons: Made larger, added scaling hover effect and ring focus for active state -->
                            <div class="mt-5 grid sm:grid-cols-3 gap-4">
                                <button @click="activeSession = 'morning'" :class="{'bg-brand-blue text-white ring-4 ring-brand-blue/30': activeSession === 'morning', 'bg-gray-100 hover:bg-gray-200 text-gray-800': activeSession !== 'morning'}" class="p-5 rounded-xl text-left transition-all duration-300 transform hover:scale-105">
                                    <span class="block font-semibold text-lg">Half Day - Morning</span>
                                    <span class="block text-base mt-1">From OMR {{ number_format($tour->price_omr, 2) }}</span>
                                </button>
                                <button @click="activeSession = 'afternoon'" :class="{'bg-brand-blue text-white ring-4 ring-brand-blue/30': activeSession === 'afternoon', 'bg-gray-100 hover:bg-gray-200 text-gray-800': activeSession !== 'afternoon'}" class="p-5 rounded-xl text-left transition-all duration-300 transform hover:scale-105">
                                    <span class="block font-semibold text-lg">Half Day - Afternoon</span>
                                    <span class="block text-base mt-1">From OMR {{ number_format($tour->price_omr, 2) }}</span>
                                </button>
                                <button @click="activeSession = 'full'" :class="{'bg-brand-blue text-white ring-4 ring-brand-blue/30': activeSession === 'full', 'bg-gray-100 hover:bg-gray-200 text-gray-800': activeSession !== 'full'}" class="p-5 rounded-xl text-left transition-all duration-300 transform hover:scale-105">
                                    <span class="block font-semibold text-lg">Full Day</span>
                                    <span class="block text-base mt-1">From OMR {{ number_format($tour->price_omr + 2, 2) }}</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Meeting and Pickup: Larger fonts and more spacing -->
                    @if(!empty($tour->itinerary))
                    <div class="p-8 bg-white rounded-2xl shadow-lg border border-gray-200">
                        <h2 class="font-display text-3xl font-bold text-charcoal">Meeting and Pickup</h2>
                        <div class="mt-6 grid md:grid-cols-2 gap-8">
                           <div>
                                <h3 class="font-semibold text-xl text-gray-900">Meeting point</h3>
                                <p class="text-gray-700 text-lg mt-1">{{ $tour->itinerary[0]['description'] ?? 'Not specified' }}</p>
                           </div>
                           <div>
                                <h3 class="font-semibold text-xl text-gray-900">End point</h3>
                                <p class="text-gray-700 text-lg mt-1">{{ $tour->end_point_description }}</p>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Included & Excluded Section: Larger icons, text, and better alignment -->
                    @if(!empty($tour->included_items) || !empty($tour->excluded_items))
                    <div class="p-8 bg-white rounded-2xl shadow-lg border border-gray-200">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                            @if(!empty($tour->included_items))
                            <div>
                                <h3 class="font-display text-2xl font-bold text-charcoal mb-5">Included</h3>
                                <ul class="space-y-4">
                                    @foreach($tour->included_items as $item)
                                    <li class="flex items-start">
                                        <svg class="h-7 w-7 text-brand-green flex-shrink-0 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                        <span class="ml-3 text-lg text-gray-800">{{ $item }}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            @if(!empty($tour->excluded_items))
                            <div>
                                <h3 class="font-display text-2xl font-bold text-charcoal mb-5">Excluded</h3>
                                <ul class="space-y-4">
                                    @foreach($tour->excluded_items as $item)
                                    <li class="flex items-start">
                                        <svg class="h-7 w-7 text-red-600 flex-shrink-0 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                                        <span class="ml-3 text-lg text-gray-800">{{ $item }}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endif

                    <!-- Travel Itinerary Section: Redesigned for a more modern timeline look -->
                    @if(!empty($tour->itinerary))
                    <div class="p-8 bg-white rounded-2xl shadow-lg border border-gray-200">
                        <h3 class="font-display text-3xl font-bold text-charcoal">Travel Itinerary</h3>
                        <div class="mt-8 flow-root">
                            <ul class="-mb-8">
                                @foreach($tour->itinerary as $item)
                                <li>
                                    <div class="relative pb-10">
                                        @if (!$loop->last)
                                        <span class="absolute left-5 top-5 -ml-px h-full w-0.5 bg-gray-300"></span>
                                        @endif
                                        <div class="relative flex items-start space-x-4">
                                            <div class="h-10 w-10 bg-brand-blue rounded-full ring-8 ring-white flex items-center justify-center flex-shrink-0">
                                                <svg class="h-6 w-6 text-white" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.414-1.415L11 9.586V6z" clip-rule="evenodd" /></svg>
                                            </div>
                                            <div class="min-w-0 flex-1">
                                                <p class="font-semibold text-xl text-gray-900">{{ $item['time'] }} - {{ $item['title'] }}</p>
                                                <p class="text-lg text-gray-700 mt-1">{{ $item['description'] }}</p>
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
                <!-- ==   RIGHT COLUMN (ENHANCED Booking Widget)   == -->
                <!-- ================================================ -->
                <div class="mt-10 lg:mt-0">
                    <div class="sticky top-10 bg-white p-8 rounded-2xl shadow-2xl border border-gray-200" x-data="{ adults: 1, children: 0 }">
                        <h2 class="text-2xl font-bold text-charcoal leading-tight">{{ $tour->title }}</h2>

                        @if($tour->has_free_cancellation)
                        <div class="mt-5 p-4 flex items-center bg-green-50 border border-green-200 rounded-xl">
                            <svg class="h-8 w-8 text-brand-green flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            <div class="ml-4">
                                <p class="font-semibold text-lg text-brand-green">Free cancellation</p>
                                <p class="text-sm text-green-800">Cancel up to 48 hours in advance for a full refund.</p>
                            </div>
                        </div>
                        @endif

                        <div class="mt-6 text-right">
                            <p class="text-base text-gray-600">From</p>
                            <p class="text-4xl font-extrabold text-brand-blue">{{ number_format($tour->price_omr, 3) }} <span class="text-2xl font-semibold text-gray-800">OMR</span></p>
                        </div>

                        <div class="mt-8 space-y-6">
                            <div>
                                <label for="booking-date" class="block text-base font-medium text-gray-800">Select Date</label>
                                <input type="date" id="booking-date" name="booking-date" class="mt-2 block w-full border-gray-300 rounded-xl shadow-sm focus:ring-brand-blue focus:border-brand-blue text-lg p-3">
                            </div>

                            <div>
                                <p class="block text-base font-medium text-gray-800">Travelers</p>
                                <div class="mt-3 space-y-4">
                                    <!-- Adults Counter: Modernized look, larger buttons -->
                                    <div class="flex justify-between items-center">
                                        <label for="adults-counter" class="text-lg text-gray-700">Adults</label>
                                        <div class="flex items-center space-x-4">
                                            <button @click="adults = Math.max(1, adults - 1)" class="h-9 w-9 rounded-full border border-gray-400 text-gray-700 hover:bg-gray-200 disabled:opacity-50 transition-all" :disabled="adults <= 1">-</button>
                                            <span x-text="adults" id="adults-counter" class="font-semibold text-xl w-6 text-center"></span>
                                            <button @click="adults++" class="h-9 w-9 rounded-full border border-gray-400 text-gray-700 hover:bg-gray-200 transition-all">+</button>
                                        </div>
                                    </div>
                                     <div class="flex justify-between items-center">
                                        <label for="children-counter" class="text-lg text-gray-700">Children</label>
                                        <div class="flex items-center space-x-4">
                                            <button @click="children = Math.max(0, children - 1)" class="h-9 w-9 rounded-full border border-gray-400 text-gray-700 hover:bg-gray-200 disabled:opacity-50 transition-all" :disabled="children <= 0">-</button>
                                            <span x-text="children" id="children-counter" class="font-semibold text-xl w-6 text-center"></span>
                                            <button @click="children++" class="h-9 w-9 rounded-full border border-gray-400 text-gray-700 hover:bg-gray-200 transition-all">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8">
                            <button class="w-full text-center bg-brand-terracotta text-white font-bold tracking-wider uppercase px-8 py-4 rounded-xl hover:bg-opacity-90 transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-offset-2 focus:ring-brand-terracotta/50">
                                Book Now
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
