<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tour_id',
        'tour_session_id', // Links to a specific session (e.g., morning/full-day)
        'booking_date',
        'num_adults',
        'num_children',
        'total_price',
        'status', // e.g., 'confirmed', 'pending', 'cancelled'
        'payment_gateway',
        'transaction_id',
    ];

    protected $casts = [
        'booking_date' => 'date',
    ];

    /**
     * Get the user that made the booking.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the tour that was booked.
     */
    public function tour(): BelongsTo
    {
        return $this->belongsTo(Tour::class);
    }

    /**
     * Get the specific session that was booked.
     */
    public function tourSession(): BelongsTo
    {
        return $this->belongsTo(TourSession::class);
    }
}
