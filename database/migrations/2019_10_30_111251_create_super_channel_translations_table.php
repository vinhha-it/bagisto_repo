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
        if (! Schema::hasTable('super_channel_translations')) {
            Schema::create('super_channel_translations', function (Blueprint $table) {
                $table->id();
                $table->integer('super_channel_id')->unsigned();
                $table->string('locale')->index();
                $table->string('name');
                $table->text('description')->nullable();
                $table->json('home_seo')->nullable();
                $table->timestamps();

                $table->unique(['super_channel_id', 'locale']);
                $table->foreign('super_channel_id')->references('id')->on('super_channels')->onDelete('cascade');
            });
        }

        if (Schema::hasColumn('super_channel', 'name')) {
            Schema::table('super_channel', function (Blueprint $table) {
                $table->dropColumn('name');
                $table->dropColumn('home_seo');
                $table->dropColumn('home_page_content');
                $table->dropColumn('footer_page_content');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('super_channel_translations');
    }
};
