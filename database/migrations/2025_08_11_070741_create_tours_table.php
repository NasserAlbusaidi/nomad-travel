<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('location');
            $table->text('short_description');
            $table->decimal('price_omr', 8, 3);
            $table->integer('duration_days')->default(1);
            $table->enum('difficulty_level', ['Easy', 'Moderate', 'Strenuous', 'Expert']);
            $table->string('image_url');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
