<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            {{-- Use your "display" font for a stylish heading --}}
            <h2 class="font-display text-3xl font-bold text-ocean-blue">
                Manage Tours
            </h2>
            {{-- We will style this button next --}}
            <a href="{{ route('admin.tours.create') }}"
                class="px-5 py-2.5 bg-brand-green text-white font-semibold rounded-lg shadow-sm hover:bg-opacity-90 transition-colors">
                Create New Tour
            </a>
        </div>
    </x-slot>
    @if (session('success'))
        <div class="mb-6 bg-green-50 border-l-4 border-brand-green text-green-800 p-4 rounded-r-lg shadow-sm"
            role="alert">
            <p class="font-bold">Success</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <!-- Main Content Card -->
    <div class="bg-off-white overflow-hidden rounded-2xl shadow-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        class="px-6 py-4 text-left text-xs font-display font-bold text-ocean-blue uppercase tracking-widest">
                        Title
                    </th>
                    <th scope="col"
                        class="px-6 py-4 text-left text-xs font-display font-bold text-ocean-blue uppercase tracking-widest">
                        Category
                    </th>
                    <th scope="col"
                        class="px-6 py-4 text-left text-xs font-display font-bold text-ocean-blue uppercase tracking-widest">
                        Price (OMR)
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Actions</span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($tours as $tour)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-charcoal">{{ $tour->title }}</div>
                            <div class="text-xs text-gray-500">{{ $tour->location }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                            {{ $tour->category->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-charcoal font-mono">
                            {{ number_format($tour->price_omr, 3) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-4">
                            <a href="{{ route('admin.tours.edit', $tour) }}"
                                class="text-ocean-blue hover:text-blue-700 transition-colors">Edit</a>
                            <form action="{{ route('admin.tours.destroy', $tour) }}" method="POST" class="inline-block"
                                onsubmit="return confirm('Are you sure you want to delete this tour?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-terracotta hover:text-red-800 transition-colors">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 whitespace-nowrap text-sm text-gray-500 text-center">
                            <div class="font-display text-lg">No tours found.</div>
                            <p class="mt-1">Click "Create New Tour" to get started.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination -->
        @if ($tours->hasPages())
            <div class="p-4 bg-gray-50 border-t">
                {{ $tours->links() }}
            </div>
        @endif
    </div>
</x-admin-layout>
