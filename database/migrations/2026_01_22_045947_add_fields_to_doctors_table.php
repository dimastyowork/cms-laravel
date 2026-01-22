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
        Schema::table('doctors', function (Blueprint $table) {
            $table->string('status')->default('available'); // available, busy, offline
            $table->integer('experience_years')->default(0);
            $table->decimal('rating', 3, 1)->default(5.0);
            $table->integer('reviews_count')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->dropColumn(['status', 'experience_years', 'rating', 'reviews_count']);
        });
    }
};
