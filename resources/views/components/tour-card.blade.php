@props(['tour'])

<div class="bg-off-white rounded-lg shadow-md overflow-hidden group flex flex-col">
    <a href="{{ route('tours.show', $tour) }}" class="block">
        <div class="relative">
            <img class="w-full h-52 object-cover" src="{{ $tour->image_url }}" alt="Image of {{ $tour->title }}">
            <!-- Favorite Icon -->
            <button class="absolute top-3 right-3 bg-white/80 backdrop-blur-sm p-2 rounded-full text-gray-600 hover:text-terracotta hover:bg-white transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 016.364 0L12 7.5l1.318-1.182a4.5 4.5 0 116.364 6.364L12 20.25l-7.682-7.682a4.5 4.5 0 010-6.364z" /></svg>
            </button>
        </div>
    </a>
    <div class="p-4 flex flex-col flex-grow">
        <div class="flex items-center text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
            </svg>
            <span class="ml-1 text-gray-600 font-bold">{{ $tour->average_rating }}</span>
            <span class="ml-1 text-gray-500">({{ $tour->review_count }} reviews)</span>
        </div>

        <h3 class="font-display text-lg font-bold text-charcoal mt-2 group-hover:text-ocean-blue transition">{{ $tour->title }}</h3>
        <p class="text-sm text-gray-500 mt-1">{{ $tour->location }}</p>

        <!-- THE FIX IS HERE -->
        @if($tour->has_free_cancellation)
            <p class="mt-3 text-xs font-bold text-green-700">✓ Free cancellation available</p>
        @else
            <!-- This invisible placeholder keeps the card height consistent -->
            <p class="mt-3 text-xs font-bold invisible">✓</p>
        @endif

        <!-- This spacer div pushes the footer to the bottom -->
        <div class="flex-grow"></div>

        <div class="mt-4 pt-4 border-t border-gray-200 flex justify-between items-center">
            <div class="flex items-center text-sm text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                {{ $tour->duration_days }} {{ Str::plural('Day', $tour->duration_days) }}
            </div>
            <p class="font-display text-lg font-bold text-ocean-blue">{{ number_format($tour->price_omr, 3) }} <span class="text-xs font-medium">OMR</span></p>
        </div>
    </div>
</div>
