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
        /**
         * Migration Package: Marketing
         */

        /**
         * search_synonyms Table's Foreign Key Added.
         */
        if (! Schema::hasColumn('search_synonyms', 'company_id')) {
            Schema::table('search_synonyms', function (Blueprint $table) {
                $table->integer('company_id')->unsigned()->after('terms');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            });
        }

        /**
         * search_terms Table's Foreign Key Added.
         */
        if (! Schema::hasColumn('search_terms', 'company_id')) {
            Schema::table('search_terms', function (Blueprint $table) {
                $table->integer('company_id')->unsigned()->after('channel_id');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            });
        }

        /**
         * search_terms Table's Foreign Key Added.
         */
        if (! Schema::hasColumn('url_rewrites', 'company_id')) {
            Schema::table('url_rewrites', function (Blueprint $table) {
                $table->integer('company_id')->unsigned()->after('locale');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            });
        }

        /**
         * Migration Package: DataTransfer
         */

        /**
         * imports Table's Foreign Key Added.
         */
        if (! Schema::hasColumn('imports', 'company_id')) {
            Schema::table('imports', function (Blueprint $table) {
                $table->integer('company_id')->unsigned()->after('id');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            });
        }

        /**
         * import_batches Table's Foreign Key Added.
         */
        if (! Schema::hasColumn('import_batches', 'company_id')) {
            Schema::table('import_batches', function (Blueprint $table) {
                $table->integer('company_id')->unsigned()->after('id');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        /**
         * Reverse Migration Package: Marketing
         */
        Schema::table('search_synonyms', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropColumn('company_id');
        });

        Schema::table('search_terms', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropColumn('company_id');
        });
        
        Schema::table('url_rewrites', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropColumn('company_id');
        });

        /**
         * Reverse Migration Package: DataTransfer
         */
        Schema::table('imports', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropColumn('company_id');
        });
        
        Schema::table('import_batches', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropColumn('company_id');
        });
    }
};
