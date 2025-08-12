<x-app-layout>
    <div class="bg-gray-50/50">
        <div class="max-w-screen-xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-4 lg:gap-8">

                <!-- ================================================ -->
                <!-- ==       FILTER & SORT SIDEBAR (LEFT)         == -->
                <!-- ================================================ -->
                <aside class="lg:col-span-1">
                    <!-- The sticky container ensures the filters stay visible on scroll -->
                    <div class="sticky top-8 bg-white p-6 rounded-lg shadow-sm">
                        <h3 class="text-lg font-bold text-gray-800 pb-2 border-b border-gray-200">Filter & Sort by:</h3>

                        <form id="filter-form" action="{{ route('tours.index') }}" method="GET" class="mt-6 space-y-6">
                            <input type="hidden" name="search" value="{{ request('search') }}">
                            <input type="hidden" name="category" value="{{ request('category') }}">

                            <!-- Sort By -->
                            <div>
                                <label for="sort-desktop" class="block text-sm font-semibold text-gray-700 mb-2">Sort
                                    By</label>
                                <select name="sort" id="sort-desktop"
                                    onchange="document.getElementById('filter-form').submit()"
                                    class="block w-full pl-3 pr-10 py-2.5 text-gray-700 bg-white border-gray-300 focus:outline-none focus:ring-1 focus:ring-brand-blue focus:border-brand-blue sm:text-sm rounded-lg shadow-sm">
                                    <option value="latest" @selected(request('sort') == 'latest')>Default</option>
                                    <option value="price_asc" @selected(request('sort') == 'price_asc')>Price: Low to High</option>
                                    <option value="price_desc" @selected(request('sort') == 'price_desc')>Price: High to Low</option>
                                </select>
                            </div>

                            <!-- Price Range (CORRECTED & FUNCTIONAL) -->
                            <div>
                                <label for="min_price" class="block text-sm font-semibold text-gray-700 mb-2">Price
                                    Range (OMR)</label>
                                <div class="flex items-center space-x-2">
                                    <!-- Min Price Input -->
                                    <input type="number" id="min_price" name="min_price" placeholder="Min"
                                        value="{{ request('min_price') }}"
                                        class="w-1/2 block pl-3 pr-2 py-2 text-base border-gray-300 focus:outline-none focus:ring-1 focus:ring-brand-blue focus:border-brand-blue sm:text-sm rounded-lg shadow-sm">

                                    <span class="text-gray-400">-</span>

                                    <!-- Max Price Input -->
                                    <input type="number" id="max_price" name="max_price" placeholder="Max"
                                        value="{{ request('max_price') }}"
                                        class="w-1/2 block pl-3 pr-2 py-2 text-base border-gray-300 focus:outline-none focus:ring-1 focus:ring-brand-blue focus:border-brand-blue sm:text-sm rounded-lg shadow-sm">
                                </div>
                            </div>

                            <!-- Duration -->
                            <div>
                                <h4 class="text-sm font-semibold text-gray-700 mb-2">Duration</h4>
                                <div class="space-y-3">
                                    <label class="flex items-center space-x-3 font-light text-gray-600">
                                        <input type="checkbox" name="duration[]" value="short"
                                            class="h-4 w-4 rounded border-gray-300 text-brand-blue focus:ring-brand-blue/50"
                                            onchange="this.form.submit()" @checked(in_array('short', request('duration', [])))>
                                        <span>Short (1-3 hours)</span>
                                    </label>
                                    <label class="flex items-center space-x-3 font-light text-gray-600">
                                        <input type="checkbox" name="duration[]" value="half"
                                            class="h-4 w-4 rounded border-gray-300 text-brand-blue focus:ring-brand-blue/50"
                                            onchange="this.form.submit()" @checked(in_array('half', request('duration', [])))>
                                        <span>Half Day (4-6 hours)</span>
                                    </label>
                                    <!-- Add other duration options as needed -->
                                </div>
                            </div>

                            <!-- Tour Type -->
                            <div>
                                <h4 class="text-sm font-semibold text-gray-700 mb-2">Tour Type</h4>
                                <div class="space-y-3">
                                    <label class="flex items-center space-x-3 font-light text-gray-600">
                                        <input type="checkbox" name="tour_type[]" value="private"
                                            class="h-4 w-4 rounded border-gray-300 text-brand-blue focus:ring-brand-blue/50"
                                            onchange="this.form.submit()" @checked(in_array('private', request('tour_type', [])))>
                                        <span>Private</span>
                                    </label>
                                    <label class="flex items-center space-x-3 font-light text-gray-600">
                                        <input type="checkbox" name="tour_type[]" value="shared"
                                            class="h-4 w-4 rounded border-gray-300 text-brand-blue focus:ring-brand-blue/50"
                                            onchange="this.form.submit()" @checked(in_array('shared', request('tour_type', [])))>
                                        <span>Shared</span>
                                    </label>
                                    <label class="flex items-center space-x-3 font-light text-gray-600">
                                        <input type="checkbox" name="tour_type[]" value="family"
                                            class="h-4 w-4 rounded border-gray-300 text-brand-blue focus:ring-brand-blue/50"
                                            onchange="this.form.submit()" @checked(in_array('family', request('tour_type', [])))>
                                        <span>Family</span>
                                    </label>
                                </div>
                            </div>

                            <div class="pt-4">
                                <!-- Submit button for price, or users can just press Enter -->
                                <button type="submit"
                                    class="w-full text-center bg-brand-blue text-white font-semibold py-2.5 px-4 rounded-lg hover:bg-brand-blue/90 transition">Apply
                                    Price</button>
                                <a href="{{ route('tours.index') }}"
                                    class="w-full text-center block text-gray-600 font-medium py-2 px-4 mt-2">Clear
                                    All</a>
                            </div>
                        </form>
                    </div>
                </aside>

                <!-- ================================================ -->
                <!-- ==        MAIN CONTENT (RIGHT)              == -->
                <!-- ================================================ -->
                <main class="lg:col-span-3 mt-8 lg:mt-0">
                    <!-- Search Bar -->
                    <div class="max-w-xl mx-auto mb-10 text-center">
                        <h2 class="font-bold text-2xl text-gray-800 mb-3">Search</h2>
                        <form action="{{ route('tours.index') }}" method="GET">
                            <label for="search-main" class="sr-only">Title or Location...</label>
                            <input type="text" id="search-main" name="search" placeholder="Title or Location..."
                                value="{{ request('search') }}"
                                class="w-full px-5 py-3 text-base border-gray-300 rounded-full shadow-sm focus:border-brand-blue focus:ring-1 focus:ring-brand-blue">
                        </form>
                    </div>

                    <!-- Category Filters -->
                    <div class="flex justify-center items-start space-x-6 md:space-x-8 mb-12">
                        <a href="{{ route('tours.index', ['sort' => request('sort'), 'search' => request('search')]) }}"
                            class="flex flex-col items-center space-y-2 group">
                            @php $isAllActive = !request('category'); @endphp
                            <div
                                class="text-gray-500 group-hover:text-brand-blue {{ $isAllActive ? 'text-brand-blue' : '' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2h8a2 2 0 002-2v-1a2 2 0 012-2h1.945M7.8 14.996l.001.001M16.2 14.996l.001.001M12 21a9 9 0 110-18 9 9 0 010 18z" />
                                </svg>
                            </div>
                            <span
                                class="text-sm font-medium text-gray-500 group-hover:text-brand-blue {{ $isAllActive ? 'text-brand-blue' : '' }}">All
                                Tours</span>
                        </a>
                        @foreach ($categories as $category)
                            <a href="{{ route('tours.index', ['category' => $category->slug, 'sort' => request('sort'), 'search' => request('search')]) }}"
                                class="flex flex-col items-center space-y-2 group">
                                @php $isActive = request('category') == $category->slug; @endphp
                                <div
                                    class="text-gray-500 group-hover:text-brand-blue {{ $isActive ? 'text-brand-blue' : '' }}">
                                    @switch($category->slug)
                                        @case('culture')
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                                            </svg>
                                        @break

                                        @case('adventure')
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        @break

                                        @case('sea')
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                                <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                                <path
                                                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-5.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 14l9-5-9-5-9 5 9 5zm0 0v7" />
                                            </svg>
                                        @break

                                        @case('desert')
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                                            </svg>
                                        @break

                                        @case('sports')
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                        </svg> @break>
                                    @endswitch
                                </div>
                                <span
                                    class="text-sm text-gray-500 group-hover:text-brand-blue {{ $isActive ? 'text-brand-blue' : '' }}">{{ $category->name }}</span>
                            </a>
                        @endforeach
                    </div>

                    <!-- Tour Grid -->
                    <div>
                        <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                            @forelse ($tours as $tour)
                                <!-- This is where you would place the new tour card component -->
                                <x-tour-card :tour="$tour" />
                            @empty
                                <div
                                    class="md:col-span-2 xl:col-span-3 text-center py-20 px-6 bg-white rounded-lg shadow-sm">
                                    <h2 class="font-display text-2xl font-bold text-gray-800">No Tours Found</h2>
                                    <p class="mt-3 text-gray-600">Try adjusting your search or filters.</p>
                                </div>
                            @endforelse
                        </div>
                        <div class="mt-12">
                            {{ $tours->links() }}
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</x-app-layout>
