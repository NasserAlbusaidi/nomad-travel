<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryImageController extends Controller
{
    public function destroy(GalleryImage $galleryImage)
    {
        // Delete the physical file from storage
        Storage::disk('public')->delete($galleryImage->image_url);

        // Delete the database record
        $galleryImage->delete();

        return back()->with('success', 'Image deleted successfully!');
    }
}
