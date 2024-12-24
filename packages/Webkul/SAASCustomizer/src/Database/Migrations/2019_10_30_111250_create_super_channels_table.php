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
        Schema::create('super_channels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hostname')->unique();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('code')->unique();
            $table->string('theme')->nullable();
        
            $table->integer('default_locale_id')->unsigned();
            $table->foreign('default_locale_id')->references('id')->on('super_locales');

            $table->integer('base_currency_id')->unsigned();
            $table->foreign('base_currency_id')->references('id')->on('super_currencies');
            $table->timestamps();
        });

        Schema::create('super_channel_locales', function (Blueprint $table) {
            $table->integer('super_channel_id')->unsigned();
            $table->integer('super_locale_id')->unsigned();

            $table->primary(['super_channel_id', 'super_locale_id']);
            $table->foreign('super_channel_id')->references('id')->on('super_channels')->onDelete('cascade');
            $table->foreign('super_locale_id')->references('id')->on('super_locales')->onDelete('cascade');
        });

        Schema::create('super_channel_currencies', function (Blueprint $table) {
            $table->integer('super_channel_id')->unsigned();
            $table->integer('super_currency_id')->unsigned();
            
            $table->primary(['super_channel_id', 'super_currency_id']);
            $table->foreign('super_channel_id')->references('id')->on('super_channels')->onDelete('cascade');
            $table->foreign('super_currency_id')->references('id')->on('super_currencies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('super_channels');
        Schema::dropIfExists('super_channel_locales');
        Schema::dropIfExists('super_channel_currencies');
    }
};
