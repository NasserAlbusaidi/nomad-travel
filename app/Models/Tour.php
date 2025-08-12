<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
