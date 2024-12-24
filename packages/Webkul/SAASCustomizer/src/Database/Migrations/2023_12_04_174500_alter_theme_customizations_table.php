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

        DB::table('theme_customizations')->delete();
        DB::table('theme_customization_translations')->delete();

        // theme_customizations Table's Foreign Key Added.
        if (! Schema::hasColumn('theme_customizations', 'company_id')) {

            Schema::table('theme_customizations', function (Blueprint $table) {
                $table->integer('company_id')->unsigned()->after('id');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            });
        }

        // theme_customization_translations Table's Foreign Key Added.
        if (! Schema::hasColumn('theme_customization_translations', 'company_id')) {
            
            Schema::table('theme_customization_translations', function (Blueprint $table) {
                $table->integer('company_id')->unsigned()->after('theme_customization_id');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
                
                $table->dropForeign(['theme_customization_id']);
                $table->dropUnique('theme_customization_translations_theme_customization_id_foreign');

                $table->foreign('theme_customization_id')->references('id')->on('theme_customizations')->onDelete('cascade');

                $table->unique(['theme_customization_id', 'company_id', 'locale'], 'theme_customization_id_company_id_locale_unique_index');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('theme_customizations', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropColumn('company_id');
        });

        Schema::table('theme_customization_translations', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropColumn('company_id');
            $table->foreign('theme_customization_id')->references('id')->on('theme_customizations')->onDelete('cascade');
            $table->unique(['theme_customization_id'], 'theme_customization_translations_theme_customization_id_foreign');
        });

    }
};
