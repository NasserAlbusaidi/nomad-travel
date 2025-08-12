<!-- Validation Errors -->
@if ($errors->any())
    <div class="mb-6 bg-red-50 border-l-4 border-terracotta text-red-800 p-4 rounded-r-lg shadow-sm" role="alert">
        <p class="font-bold">Please correct the errors below:</p>
        <ul class="mt-2 list-disc list-inside text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Main Form Card -->
<div class="bg-off-white p-6 sm:p-8 rounded-2xl shadow-lg">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
        <!-- Category (Full Span on Small Screens) -->
        <div class="md:col-span-2">
            <label for="category_id" class="block text-sm font-bold text-ocean-blue tracking-wide">Category</label>
            <select name="category_id" id="category_id"
                class="mt-1 block w-full pl-3 pr-10 py-2.5 text-base border-gray-300 focus:outline-none focus:ring-ocean-blue focus:border-ocean-blue sm:text-sm rounded-md shadow-sm"
                required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $tour->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Title -->
        <div>
            <label for="title" class="block text-sm font-bold text-ocean-blue tracking-wide">Title</label>
            <input type="text" name="title" id="title" class="mt-1 block w-full form-input"
                value="{{ old('title', $tour->title) }}" required>
        </div>

        <!-- Location -->
        <div>
            <label for="location" class="block text-sm font-bold text-ocean-blue tracking-wide">Location</label>
            <input type="text" name="location" id="location" class="mt-1 block w-full form-input"
                value="{{ old('location', $tour->location) }}" required>
        </div>

        <!-- Price (OMR) -->
        <div>
            <label for="price_omr" class="block text-sm font-bold text-ocean-blue tracking-wide">Price (OMR)</label>
            <input type="number" name="price_omr" id="price_omr" class="mt-1 block w-full form-input"
                value="{{ old('price_omr', $tour->price_omr) }}" required step="0.001">
        </div>

        <!-- Duration (Days) -->
        <div>
            <label for="duration_days" class="block text-sm font-bold text-ocean-blue tracking-wide">Duration
                (Days)</label>
            <input type="number" name="duration_days" id="duration_days" class="mt-1 block w-full form-input"
                value="{{ old('duration_days', $tour->duration_days) }}" required>
        </div>

        <!-- Group Size -->
        <div>
            <label for="group_size" class="block text-sm font-bold text-ocean-blue tracking-wide">Max Group Size</label>
            <input type="number" name="group_size" id="group_size" class="mt-1 block w-full form-input"
                value="{{ old('group_size', $tour->group_size) }}" required>
        </div>

        <!-- Difficulty -->
        <div>
            <label for="difficulty_level"
                class="block text-sm font-bold text-ocean-blue tracking-wide">Difficulty</label>
            <input type="text" name="difficulty_level" id="difficulty_level" class="mt-1 block w-full form-input"
                value="{{ old('difficulty_level', $tour->difficulty_level) }}">
        </div>

        <!-- Primary Image (Full Span) -->
        <div class="md:col-span-2">
            <label for="image_url" class="block text-sm font-bold text-ocean-blue tracking-wide">Primary Image</label>

            <!-- Current Image Preview -->
            @if ($tour->image_url)
                <div class="mt-2">
                    <img src="{{ Storage::url($tour->image_url) }}" alt="Current Image"
                        class="w-48 h-auto rounded-md shadow-sm">
                    <p class="text-xs text-gray-500 mt-1">Current image. Uploading a new file will replace this one.</p>
                </div>
            @endif

            <input type="file" name="image_url" id="image_url"
                class="mt-2 block w-full text-sm text-charcoal file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-ocean-blue/10 file:text-ocean-blue hover:file:bg-ocean-blue/20">
        </div>

        <!-- Short Description (Full Span) -->
        <div class="md:col-span-2">
            <label for="short_description" class="block text-sm font-bold text-ocean-blue tracking-wide">Short
                Description</label>
            <textarea name="short_description" id="short_description" rows="4" class="mt-1 block w-full form-textarea">{{ old('short_description', $tour->short_description) }}</textarea>
        </div>

        <!-- Included Items (Full Span) -->
        <div class="md:col-span-2">
            <label for="included_items" class="block text-sm font-bold text-ocean-blue tracking-wide">Included Items
                (comma-separated)</label>
            <textarea name="included_items" id="included_items" rows="3" class="mt-1 block w-full form-textarea">{{ old('included_items', is_array($tour->included_items) ? implode(', ', $tour->included_items) : $tour->included_items) }}</textarea>
        </div>

        <!-- Excluded Items (Full Span) -->
        <div class="md:col-span-2">
            <label for="excluded_items" class="block text-sm font-bold text-ocean-blue tracking-wide">Excluded Items
                (comma-separated)</label>
            <textarea name="excluded_items" id="excluded_items" rows="3" class="mt-1 block w-full form-textarea">{{ old('excluded_items', is_array($tour->excluded_items) ? implode(', ', $tour->excluded_items) : $tour->excluded_items) }}</textarea>
        </div>
    </div>

    <!-- Itinerary Repeater (already styled, should be placed here) -->
    <div class="mt-8 border-t pt-6">
        @include('admin.tours._itinerary-repeater') {{-- We will move the repeater code here --}}
    </div>

    <!-- Free Cancellation Checkbox -->
    <div class="mt-6 border-t pt-6">
        <label for="has_free_cancellation" class="flex items-center">
            <input id="has_free_cancellation" type="checkbox"
                class="h-5 w-5 rounded border-gray-300 text-ocean-blue shadow-sm focus:ring-ocean-blue"
                name="has_free_cancellation" value="1" @if (old('has_free_cancellation', $tour->has_free_cancellation)) checked @endif>
            <span class="ml-3 text-sm font-medium text-charcoal">Free Cancellation Available</span>
        </label>
    </div>
</div>

{{-- Helper class for styling all form inputs consistently --}}
<style>
    .form-input,
    .form-textarea,
    .form-select {
        @apply border-gray-300 focus:border-ocean-blue focus:ring focus:ring-ocean-blue/50 rounded-md shadow-sm transition-colors;
    }
</style>
