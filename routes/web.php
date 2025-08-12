<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Tour;
use App\Http\Controllers\TourController;
use App\Http\Controllers\Admin\TourController as AdminTourController;
use App\Http\Controllers\Admin\GalleryImageController;

Route::get('/', function () {
    // Now we fetch the real data from the database
    $tours = Tour::where('is_active', true)->take(6)->get();
    return view('welcome', ['tours' => $tours]);
});


Route::get('/tours', [TourController::class, 'index'])->name('tours.index');
Route::get('/tours/{tour}', [TourController::class, 'show'])->name('tours.show');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// --- ADMIN ROUTES ---
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // This single line creates all the necessary routes for tour CRUD
    // e.g., admin.tours.index, admin.tours.create, etc.
    Route::resource('tours', AdminTourController::class);
    Route::delete('gallery-images/{galleryImage}', [GalleryImageController::class, 'destroy'])->name('gallery-images.destroy');

    // You can add other admin routes here later (e.g., for bookings, users)
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
