<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-display text-3xl font-bold text-ocean-blue">
            Create New Tour
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto">
        <form action="{{ route('admin.tours.store') }}" method="POST">
            @csrf

            @include('admin.tours._form')

            <!-- Action Buttons -->
            <div class="flex items-center justify-end mt-8 gap-4">
                <a href="{{ route('admin.tours.index') }}" class="font-semibold text-gray-600 hover:text-charcoal">Cancel</a>
                <button type="submit" class="px-6 py-3 bg-ocean-blue text-white font-semibold rounded-lg shadow-md hover:bg-opacity-90 transition-all">
                    Save Tour
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
