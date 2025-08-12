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
        Schema::table('tours', function (Blueprint $table) {
            $table->decimal('average_rating', 2, 1)->default(0.0)->after('image_url');
            $table->integer('review_count')->default(0)->after('average_rating');
            $table->boolean('has_free_cancellation')->default(false)->after('review_count');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->dropColumn(['average_rating', 'review_count', 'has_free_cancellation']);
        });
    }
};
