<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('global_settings', function (Blueprint $table) {

            if (!Schema::hasColumn('global_settings', 'footer_columns')) {
                $table->json('footer_columns')->nullable()->after('instagram');
            }

            if (!Schema::hasColumn('global_settings', 'copyright_text')) {
                $table->string('copyright_text')->nullable()->after('footer_columns');
            }

        });
    }

    public function down(): void
    {
        Schema::table('global_settings', function (Blueprint $table) {

            if (Schema::hasColumn('global_settings', 'footer_columns')) {
                $table->dropColumn('footer_columns');
            }

            if (Schema::hasColumn('global_settings', 'copyright_text')) {
                $table->dropColumn('copyright_text');
            }

        });
    }
};
