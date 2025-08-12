<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TourSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'tour_id',
        'name',          // e.g., "Half Day - Morning", "Full Day"
        'price_omr',     // The specific price for this session
        'start_time',    // e.g., "09:00"
        'end_time',      // e.g., "13:00"
        'is_active',
    ];

    /**
     * Get the tour this session belongs to.
     */
    public function tour(): BelongsTo
    {
        return $this->belongsTo(Tour::class);
    }
}
