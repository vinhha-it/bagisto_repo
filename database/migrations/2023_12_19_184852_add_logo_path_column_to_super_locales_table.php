<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (! Schema::hasColumn('super_locales', 'logo_path')) {
            Schema::table('super_locales', function (Blueprint $table) {
                $table->string('logo_path')->nullable()->after('direction');
            });

            // DB::table('super_locales')->whereNull('logo_path')->update(['logo_path'=> DB::raw('CONCAT("super-locales/", code, ".png")')]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('super_locales', 'logo_path')) {
            Schema::dropColumns('super_locales', 'logo_path');
        }
    }
};
