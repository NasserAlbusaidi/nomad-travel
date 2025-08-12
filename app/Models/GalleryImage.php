<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GalleryImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'tour_id',
        'image_url',
        'alt_text',
    ];

    /**
     * Get the tour this image belongs to.
     */
    public function tour(): BelongsTo
    {
        return $this->belongsTo(Tour::class);
    }
}
