<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TourController extends Controller
{
    /**
     * Display a listing of all tours.
     * The main page for the admin tour management.
     */
    public function index()
    {
        // Fetch all tours, order by the newest, and paginate
        $tours = Tour::latest()->paginate(10);
        return view('admin.tours.index', compact('tours'));
    }

    /**
     * Show the form for creating a new tour.
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        // We pass an empty Tour model to the form partial for consistency
        return view('admin.tours.create', ['tour' => new Tour(), 'categories' => $categories]);
    }

    /**
     * Store a newly created tour in the database.
     */
    public function store(Request $request)
    {
        $validatedData = $this->validateTour($request);

        // --- HANDLE MAIN IMAGE UPLOAD FOR NEW TOUR ---
        if ($request->hasFile('image_url')) {
            // Store the file and update the path in our validated data array
            $path = $request->file('image_url')->store('tours/main', 'public');
            $validatedData['image_url'] = $path;
        }

        $tour = Tour::create($validatedData);

        // Handle Gallery Images (can only be done after tour is created)
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $file) {
                $path = $file->store('tours/gallery', 'public');
                $tour->galleryImages()->create(['image_url' => $path]);
            }
        }

        return redirect()->route('admin.tours.index')->with('success', 'Tour created successfully!');
    }


    /**
     * Show the form for editing the specified tour.
     * We use Route Model Binding here to automatically find the tour.
     */
    public function edit(Tour $tour)
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.tours.edit', compact('tour', 'categories'));
    }

    /**
     * Update the specified tour in the database.
     */
    public function update(Request $request, Tour $tour)
    {
        $validatedData = $this->validateTour($request);

        // --- HANDLE MAIN IMAGE UPDATE ---
        if ($request->hasFile('image_url')) {
            // 1. Delete the old image file to save space
            if ($tour->image_url) {
                Storage::disk('public')->delete($tour->image_url);
            }

            // 2. Store the new image file
            $path = $request->file('image_url')->store('tours/main', 'public');

            // 3. Update the path in our validated data array
            $validatedData['image_url'] = $path;
        }

        $tour->update($validatedData);

        // Handle Gallery Image uploads (logic is the same as before)
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $file) {
                $path = $file->store('tours/gallery', 'public');
                // dd($path, ['image_url' => $path]);
                $tour->galleryImages()->create(['image_url' => $path]);
            }
        }

        return redirect()->route('admin.tours.index')->with('success', 'Tour updated successfully!');
    }
    /**
     * Remove the specified tour from the database.
     */
    public function destroy(Tour $tour)
    {
        $tour->delete();
        return redirect()->back()->with('success', 'Tour deleted successfully!');
    }

    /**
     * A private helper method to handle validation for both store and update.
     */
    private function validateTour(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'short_description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'price_omr' => 'required|numeric|min:0',
            'duration_days' => 'required|integer|min:1',
            'group_size' => 'required|integer|min:1',
            'difficulty_level' => 'nullable|string|max:50',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // 2MB Max
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'included_items' => 'nullable|string',
            'excluded_items' => 'nullable|string',
            // Add validation to ensure the itinerary is valid JSON
            'itinerary' => 'nullable|json',
        ]);

        // Handle checkbox for boolean value
        $validated['has_free_cancellation'] = $request->has('has_free_cancellation');

        // Handle comma-separated strings for array fields
        if (!empty($validated['included_items'])) {
            $validated['included_items'] = array_map('trim', explode(',', $validated['included_items']));
        }
        if (!empty($validated['excluded_items'])) {
            $validated['excluded_items'] = array_map('trim', explode(',', $validated['excluded_items']));
        }



        // *** THIS IS THE NEW PART ***
        // Decode the JSON string from the itinerary textarea into an array
        // The 'json' validation rule ensures this will not fail
        if (!empty($validated['itinerary'])) {
            $validated['itinerary'] = json_decode($validated['itinerary'], true);
        }



        return $validated;
    }
}
