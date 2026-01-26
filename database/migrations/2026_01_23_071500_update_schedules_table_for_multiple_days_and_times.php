<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->dropColumn(['day', 'start_time', 'end_time']);
        });

        Schema::table('schedules', function (Blueprint $table) {
            $table->json('days')->after('unit_id');
            $table->json('time_slots')->after('days');
        });
    }

    public function down(): void
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->dropColumn(['days', 'time_slots']);
        });

        Schema::table('schedules', function (Blueprint $table) {
            $table->enum('day', ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'])->after('unit_id');
            $table->time('start_time')->after('day');
            $table->time('end_time')->after('start_time');
        });
    }
};
