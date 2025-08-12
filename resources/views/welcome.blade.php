<x-app-layout>
    <!-- Hero Section -->
    <div class="relative h-[60vh] bg-cover bg-center" style="background-image: url('https://placehold.co/1920x1080/212529/F4EAD5?text=Omani+Mountains');">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-black opacity-50"></div>

        <!-- Content -->
        <div class="relative z-10 flex flex-col items-center justify-center h-full text-center text-white px-4">
            <h1 class="font-display text-4xl md:text-6xl font-bold leading-tight">Unforgettable Adventures Await</h1>
            <p class="mt-4 text-lg md:text-xl max-w-2xl font-sans">
                Discover the soul of Oman with our curated cultural, sea, and desert tours.
            </p>
            <a href="#" class="mt-8 inline-block bg-terracotta text-white font-bold font-display tracking-wide uppercase px-8 py-3 rounded-md hover:bg-opacity-90 transition duration-300">
                Explore Tours
            </a>
        </div>
    </div>

    <!-- Featured Tours Section -->
    <div class="bg-sandstone">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="font-display text-3xl font-bold text-charcoal">Featured Tours</h2>
                <p class="mt-2 text-lg text-gray-600">Handpicked experiences you won't want to miss.</p>
            </div>

            <div class="mt-10 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($tours as $tour)
                    <x-tour-card :tour="$tour" />
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
