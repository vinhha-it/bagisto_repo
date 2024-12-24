<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CreateSuperCmsPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('super_cms_pages')) {
            Schema::create('super_cms_pages', function (Blueprint $table) {
                $table->increments('id');
                $table->string('layout')->nullable();

                $table->timestamps();
            });

            $now = Carbon::now();

            DB::table('super_cms_pages')
                ->insert([
                    [
                        'id'         => 1,
                        'layout'     => NULL,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ], [
                        'id'         => 2,
                        'layout'     => NULL,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ], [
                        'id'         => 3,
                        'layout'     => NULL,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ], [
                        'id'         => 4,
                        'layout'     => NULL,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ], [
                        'id'         => 5,
                        'layout'     => NULL,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ], [
                        'id'         => 6,
                        'layout'     => NULL,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ], [
                        'id'         => 7,
                        'layout'     => NULL,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ], [
                        'id'         => 8,
                        'layout'     => NULL,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ], [
                        'id'         => 9,
                        'layout'     => NULL,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ], [
                        'id'         => 10,
                        'layout'     => NULL,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ], [
                        'id'         => 11,
                        'layout'     => NULL,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('super_cms_pages');
    }
}
