<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Category;


class TourController extends Controller
{
   public function index(Request $request)
    {
        $query = Tour::query()->where('is_active', true);

        // Search Filter
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('location', 'like', '%' . $request->search . '%');
            });
        }

        // Category Filter
        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // Price Filter
        if ($request->filled('min_price')) {
            $query->where('price_omr', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price_omr', '<=', $request->max_price);
        }

        // Duration Filter
        if ($request->filled('duration')) {
            $query->whereIn('duration_days', $request->duration);
        }

        // Sorting
        if ($request->input('sort') === 'price_asc') {
            $query->orderBy('price_omr', 'asc');
        } elseif ($request->input('sort') === 'price_desc') {
            $query->orderBy('price_omr', 'desc');
        } else {
            $query->latest();
        }

        $tours = $query->paginate(9)->withQueryString();
        $categories = Category::all();

        // Get min and max prices for the filter slider
        $minPrice = Tour::min('price_omr') ?? 0;
        $maxPrice = Tour::max('price_omr') ?? 1000;

        return view('tours.index', [
            'tours' => $tours,
            'categories' => $categories,
            'minPrice' => floor($minPrice),
            'maxPrice' => ceil($maxPrice),
        ]);
    }

    public function show(Tour $tour)
    {
        return view('tours.show', ['tour' => $tour]);
    }
}
