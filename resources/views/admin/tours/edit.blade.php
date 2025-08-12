<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-display text-3xl font-bold text-ocean-blue">
            Edit: {{ $tour->title }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto">
        {{-- IMPORTANT: Add enctype for file uploads --}}
        <form action="{{ route('admin.tours.update', $tour) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @include('admin.tours._form')

            {{-- We are adding the gallery management UI here --}}
            <div class="mt-8">
                @include('admin.tours._gallery-manager')
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-end mt-8 gap-4">
                <a href="{{ route('admin.tours.index') }}" class="font-semibold text-gray-600 hover:text-charcoal">Cancel</a>
                <button type="submit" class="px-6 py-3 bg-ocean-blue text-white font-semibold rounded-lg shadow-md hover:bg-opacity-90 transition-all">
                    Update Tour & Upload Images
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
