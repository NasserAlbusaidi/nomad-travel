<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'location',
        'short_description',
        'category_id',
        'price_omr',
        'duration_days',
        'difficulty_level',
        'image_url',
        'is_active',
        'included_items',
        'excluded_items',
        'average_rating',
        'group_size',
        'review_count',
        'itinerary',
        'has_free_cancellation',
    ];

    protected $casts = [
        'itinerary' => 'array',
        'included_items' => 'array',
        'excluded_items' => 'array',
    ];



    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the description of the final itinerary point.
     *
     * @return string
     */
    public function getEndPointDescriptionAttribute(): string
    {
        if (empty($this->itinerary)) {
            return 'Not specified';
        }

        $lastItem = collect($this->itinerary)->last();

        return $lastItem['description'] ?? 'Not specified';
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * Get the reviews for the tour.
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Get the gallery images for the tour.
     */
    public function galleryImages(): HasMany
    {
        return $this->hasMany(GalleryImage::class);
    }

    /**
     * Get the different sessions available for the tour.
     * This allows for "Half Day - Morning", "Full Day", etc., with different prices.
     */
    public function sessions(): HasMany
    {
        return $this->hasMany(TourSession::class);
    }
}
