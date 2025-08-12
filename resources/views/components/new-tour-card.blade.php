@props(['tour'])

<div class="rounded-xl overflow-hidden shadow-md bg-white hover:shadow-xl transition-shadow duration-300 group">
    <div class="relative h-48 flex items-center justify-center
        @switch($tour->category->slug ?? 'default')
            @case('sea') bg-brand-sky @break
            @case('desert') bg-brand-sand @break
            @default bg-brand-blue
        @endswitch">

        <!-- Use this if you want an actual image instead of a solid color -->
        <!-- <img src="{{ $tour->imageUrl }}" alt="{{ $tour->title }}" class="absolute h-full w-full object-cover"> -->
        <!-- <div class="absolute inset-0 bg-black/30"></div> -->

        <h3 class="text-white text-3xl font-bold text-center z-10">{{ $tour->title }}</h3>

        <button class="absolute top-3 right-3 h-10 w-10 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center text-white hover:bg-white/40 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 016.364 0L12 7.636l1.318-1.318a4.5 4.5 0 016.364 6.364L12 20.364l-7.682-7.682a4.5 4.5 0 010-6.364z" /></svg>
        </button>
    </div>
    <div class="p-5">
        <div class="flex items-center space-x-2">
            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
            <span class="font-bold text-gray-700">4.8</span>
            <span class="text-sm text-gray-500">(112 reviews)</span>
        </div>

        <h4 class="text-lg font-bold text-gray-800 mt-3 truncate">{{ $tour->sub_title }}</h4>
        <p class="text-sm text-gray-500">{{ $tour->location }}</p>

        <div class="mt-3">
            <span class="flex items-center text-sm text-brand-green font-semibold">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                Free cancellation available
            </span>
        </div>

        <div class="border-t my-4"></div>

        <div class="flex justify-between items-center">
            <span class="flex items-center text-sm text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                1 Day
            </span>
            <span class="font-bold text-xl text-brand-blue">55.000 <span class="text-sm font-medium text-gray-500">OMR</span></span>
        </div>
    </div>
</div>
