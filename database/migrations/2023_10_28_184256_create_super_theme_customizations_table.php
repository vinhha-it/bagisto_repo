<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (! Schema::hasTable('super_themes')) {
            Schema::create('super_themes', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('channel_id')->unsigned()->default(1);
                $table->string('type');
                $table->string('name');
                $table->integer('sort_order');
                $table->boolean('status')->default(0);
                $table->timestamps();
            });

        $now = Carbon::now();

        DB::table('super_themes')
            ->insert([
                [
                    'id'         => 1,
                    'type'       => 'image_carousel',
                    'name'       => 'Image Slider',
                    'sort_order' => 1,
                    'status'     => 1,
                    'created_at' => $now,
                    'updated_at' => $now,
                ], [
                    'id'         => 2,
                    'type'       => 'services_content',
                    'name'       => 'Features',
                    'sort_order' => 2,
                    'status'     => 1,
                    'created_at' => $now,
                    'updated_at' => $now,
                ], [
                    'id'         => 3,
                    'type'       => 'static_content',
                    'name'       => 'Easy Customization',
                    'sort_order' => 3,
                    'status'     => 1,
                    'created_at' => $now,
                    'updated_at' => $now,
                ], [
                    'id'         => 4,
                    'type'       => 'static_content',
                    'name'       => 'Manage Store',
                    'sort_order' => 4,
                    'status'     => 1,
                    'created_at' => $now,
                    'updated_at' => $now,
                ], [
                    'id'         => 5,
                    'type'       => 'static_content',
                    'name'       => 'Benefit Of Selling',
                    'sort_order' => 5,
                    'status'     => 1,
                    'created_at' => $now,
                    'updated_at' => $now,
                ], [
                    'id'         => 6,
                    'type'       => 'static_content',
                    'name'       => 'Registration Steps',
                    'sort_order' => 6,
                    'status'     => 1,
                    'created_at' => $now,
                    'updated_at' => $now,
                ], [
                    'id'         => 7,
                    'type'       => 'footer_links',
                    'name'       => 'Footer Links',
                    'sort_order' => 7,
                    'status'     => 1,
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('super_themes');
    }
};
