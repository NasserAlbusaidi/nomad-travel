<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;
use App\Models\Tour;

class TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $culture = Category::where('slug', 'culture')->first();
        $adventure = Category::where('slug', 'adventure')->first();
        $sea = Category::where('slug', 'sea')->first();
        $desert = Category::where('slug', 'desert')->first();

        $tours = [
            [
                'category_id' => $adventure->id,
                'title' => 'Wadi Shab Adventure',
                'location' => 'Tiwi, Ash Sharqiyah',
                'short_description' => 'A breathtaking journey through turquoise pools and waterfalls, leading to a hidden cave.',
                'price_omr' => 55.000,
                'included_items' => ['Lunch', 'Snorkeling Gear'],
                'excluded_items' => ['Personal Expenses'],
                'itinerary' => [
                    [
                        'time' => '08:00 AM',
                        'title' => 'Departure from Muscat',
                        'description' => 'Meet at the designated pickup point...'
                    ],
                    [
                        'time' => '09:00 AM',
                        'title' => 'Arrival at Wadi Shab',
                        'description' => 'Begin the adventure with a safety briefing...'
                    ],
                    [
                        'time' => '09:30 AM',
                        'title' => 'Start of Trek',
                        'description' => 'Begin the trek through the stunning landscapes...'
                    ],
                    [
                        'time' => '12:00 PM',
                        'title' => 'Lunch Break',
                        'description' => 'Enjoy a packed lunch amidst the beautiful scenery...'
                    ],
                    [
                        'time' => '01:00 PM',
                        'title' => 'Continue Trekking',
                        'description' => 'Resume the trek and explore more breathtaking views...'
                    ],
                    [
                        'time' => '04:00 PM',
                        'title' => 'Return Hike',
                        'description' => 'Begin the hike back to the starting point...'
                    ],
                    [
                        'time' => '05:30 PM',
                        'title' => 'Departure for Muscat',
                        'description' => 'Leave Wadi Shab and head back to Muscat...'
                    ],
                    [
                        'time' => '07:00 PM',
                        'title' => 'Arrival in Muscat',
                        'description' => 'Drop off at the designated location in Muscat...'
                    ]
                ],
                'duration_days' => 1,
                'difficulty_level' => 'Moderate',
                'group_size' => 12,
                'image_url' => 'https://placehold.co/400x300/0A4D68/FFFFFF?text=Wadi+Shab',
                'average_rating' => 4.8,
                'review_count' => 112,
                'has_free_cancellation' => true,
            ],
            [
                'category_id' => $adventure->id,
                'title' => 'Jebel Shams Balcony Walk',
                'location' => 'Al Hamra, Ad Dakhiliyah',
                'short_description' => "Hike along the edge of Oman's 'Grand Canyon'.",
                'price_omr' => 65.000,
                'included_items' => ['Lunch', 'Water Bottle'],
                'excluded_items' => ['Personal Expenses'],
                'itinerary' => [
                    [
                        'time' => '08:00 AM',
                        'title' => 'Departure from Muscat',
                        'description' => 'Meet at the designated pickup point...'
                    ],
                    [
                        'time' => '09:00 AM',
                        'title' => 'Arrival at Wadi Shab',
                        'description' => 'Begin the adventure with a safety briefing...'
                    ],
                    [
                        'time' => '09:30 AM',
                        'title' => 'Start of Trek',
                        'description' => 'Begin the trek through the stunning landscapes...'
                    ],
                    [
                        'time' => '12:00 PM',
                        'title' => 'Lunch Break',
                        'description' => 'Enjoy a packed lunch amidst the beautiful scenery...'
                    ],
                    [
                        'time' => '01:00 PM',
                        'title' => 'Continue Trekking',
                        'description' => 'Resume the trek and explore more breathtaking views...'
                    ],
                    [
                        'time' => '04:00 PM',
                        'title' => 'Return Hike',
                        'description' => 'Begin the hike back to the starting point...'
                    ],
                    [
                        'time' => '05:30 PM',
                        'title' => 'Departure for Muscat',
                        'description' => 'Leave Wadi Shab and head back to Muscat...'
                    ],
                    [
                        'time' => '07:00 PM',
                        'title' => 'Arrival in Muscat',
                        'description' => 'Drop off at the designated location in Muscat...'
                    ]
                ],
                'duration_days' => 1,
                'difficulty_level' => 'Moderate',
                'group_size' => 12,
                'image_url' => 'https://placehold.co/400x300/0A4D68/FFFFFF?text=Wadi+Shab',
                'average_rating' => 4.8,
                'review_count' => 112,
                'has_free_cancellation' => true,
            ],
            [
                'category_id' => $adventure->id,
                'title' => 'Jebel Shams Balcony Walk',
                'location' => 'Al Hamra, Ad Dakhiliyah',
                'short_description' => "Hike along the edge of Oman's 'Grand Canyon'.",
                'price_omr' => 65.000,
                'included_items' => ['Lunch', 'Water Bottle'],
                'average_rating' => 4.9,
                'review_count' => 98,
                'has_free_cancellation' => true,
                    'image_url' => 'https://placehold.co/400x300/0A4D68/FFFFFF?text=Jebel+Shams',
            ],
            [
                'category_id' => $desert->id,
                'title' => 'Wahiba Sands Desert Safari',
                'location' => 'Bidiya, Ash Sharqiyah',
                'short_description' => 'Experience the magic of the desert with dune bashing and a camel ride.',
                'price_omr' => 120.000,
                'included_items' => ['Dinner', 'Camel Ride'],
                'excluded_items' => ['Personal Expenses'],
                'itinerary' => [
                    [
                        'time' => '3:00 PM',
                        'title' => 'Meet at the designated location',
                        'description' => 'Gather at the meeting point for a briefing...'
                    ],
                    [
                        'time' => '3:30 PM',
                        'title' => 'Depart for Wahiba Sands',
                        'description' => 'Travel to the desert in a 4x4 vehicle...'
                    ],
                    [
                        'time' => '5:00 PM',
                        'title' => 'Arrive at Wahiba Sands and begin dune bashing',
                        'description' => 'Experience thrilling dune bashing in the desert...'
                    ],
                    [
                        'time' => '7:00 PM',
                        'title' => 'Camel ride and sunset viewing',
                        'description' => 'Enjoy a camel ride while watching the sunset...'
                    ],
                    [
                        'time' => '8:00 PM',
                        'title' => 'Dinner under the stars',
                        'description' => 'Savor a traditional Omani dinner in the desert...'
                    ],
                    [
                        'time' => '10:00 PM',
                        'title' => 'Return to camp',
                        'description' => "Head back to the camp after a memorable evening..."
                    ]
                ],
                'duration_days' => 2,
                'difficulty_level' => 'Easy',
                'group_size' => 16,
                'image_url' => 'https://placehold.co/400x300/F4EAD5/000000?text=Wahiba+Sands',
                'average_rating' => 4.7,
                'review_count' => 254,
                'has_free_cancellation' => false,
            ],
            [
                'category_id' => $sea->id,
                'title' => 'Daymaniyat Islands Snorkeling',
                'location' => 'Muscat',
                'included_items' => ['Lunch', 'Snorkeling Gear'],
                'excluded_items' => ['Personal Expenses'],
                'itinerary' => [
                    [
                        'time' => '8:00 AM',
                        'title' => 'Meet at the designated location',
                        'description' => 'Gather at the meeting point for a briefing...'
                    ],
                    [
                        'time' => '8:30 AM',
                        'title' => 'Depart for Daymaniyat Islands',
                        'description' => 'Travel to the islands by boat...'
                    ],
                    [
                        'time' => '10:00 AM',
                        'title' => 'Arrive at Daymaniyat Islands and begin snorkeling',
                        'description' => 'Explore the underwater world with our guides...'
                    ],
                    [
                        'time' => '12:30 PM',
                        'title' => 'Lunch on the beach',
                        'description' => 'Enjoy a packed lunch on the pristine beach...'
                    ],
                    [
                        'time' => '1:30 PM',
                        'title' => 'Continue snorkeling and exploring',
                        'description' => 'More time to discover the marine life...'
                    ],
                    [
                        'time' => '4:00 PM',
                        'title' => 'Return to the boat',
                        'description' => 'Head back to the boat for departure...'
                    ],
                    [
                        'time' => '5:30 PM',
                        'title' => 'Depart for Muscat',
                        'description' => 'Relax on the boat as we return...'
                    ],
                    [
                        'time' => '7:00 PM',
                        'title' => 'Arrive back in Muscat',
                        'description' => 'End of the tour, drop-off at the meeting point...'
                    ]
                ],
                'short_description' => 'Discover vibrant coral reefs and swim with turtles in this protected nature reserve.',
                'price_omr' => 45.000,
                'duration_days' => 1,
                'difficulty_level' => 'Easy',
                'group_size' => 15,
                'image_url' => 'https://placehold.co/400x300/1E88E5/FFFFFF?text=Snorkeling',
                'average_rating' => 4.9,
                'review_count' => 180,
                'has_free_cancellation' => true,
            ],
        ];

        foreach ($tours as $tourData) {
            Tour::create($tourData);
        }
    }
}
