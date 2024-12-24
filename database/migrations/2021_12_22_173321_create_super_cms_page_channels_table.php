<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateSuperCmsPageChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('super_cms_page_channels')) {
            Schema::create('super_cms_page_channels', function (Blueprint $table) {
                $table->integer('super_cms_page_id')->unsigned();
                $table->integer('super_channel_id')->unsigned();

                $table->unique(['super_cms_page_id', 'super_channel_id'], 'super_cms_page_channel_id_unique_index');
                $table->foreign('super_cms_page_id')->references('id')->on('super_cms_pages')->onDelete('cascade');
                $table->foreign('super_channel_id')->references('id')->on('super_channels')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('super_cms_page_channels');
    }
}
