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
        // Using raw statement because change() doesn't support the USING clause needed for PGSQL
        \Illuminate\Support\Facades\DB::statement('ALTER TABLE roles ALTER COLUMN permissions TYPE jsonb USING permissions::jsonb');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        \Illuminate\Support\Facades\DB::statement('ALTER TABLE roles ALTER COLUMN permissions TYPE json USING permissions::json');
    }
};
