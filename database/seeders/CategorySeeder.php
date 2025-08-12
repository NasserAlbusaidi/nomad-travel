<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['Culture', 'Adventure', 'Sea', 'Desert', 'Sports'];
        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'slug' => strtolower($category),
            ]);
        }
    }
}

