<div class="bg-off-white p-6 sm:p-8 rounded-2xl shadow-lg">
    <h3 class="font-display text-2xl font-bold text-ocean-blue">Image Gallery</h3>
    <p class="text-sm text-gray-500 mt-1">Upload additional images for this tour.</p>

    <!-- Display Existing Images -->
    <div class="mt-6 grid grid-cols-2 md:grid-cols-4 gap-4">
        @forelse ($tour->galleryImages as $image)
            <div class="relative group">
                <img src="{{ Storage::url($image->image_url) }}" alt="Tour Gallery Image" class="w-full h-32 object-cover rounded-lg shadow-md">
                <!-- Delete Button -->
                <form action="{{ route('admin.gallery-images.destroy', $image) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this image?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="absolute top-1 right-1 bg-terracotta text-white rounded-full p-1.5 shadow-lg opacity-0 group-hover:opacity-100 transition-opacity">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </form>
            </div>
        @empty
            <p class="col-span-full text-sm text-gray-500">No gallery images have been uploaded yet.</p>
        @endforelse
    </div>

    <!-- Upload New Images -->
    <div class="mt-8 border-t pt-6">
        <label for="gallery_images" class="block text-sm font-bold text-ocean-blue tracking-wide">Upload New Images</label>
        <input type="file" name="gallery_images[]" id="gallery_images" multiple
               class="mt-2 block w-full text-sm text-charcoal file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-ocean-blue/10 file:text-ocean-blue hover:file:bg-ocean-blue/20">
        <p class="text-xs text-gray-500 mt-1">You can select multiple files at once.</p>
    </div>
</div>
