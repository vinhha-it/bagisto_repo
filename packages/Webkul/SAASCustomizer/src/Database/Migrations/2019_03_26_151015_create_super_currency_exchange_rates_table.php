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
        if (! Schema::hasTable('super_currency_exchange_rates')) {
            Schema::create('super_currency_exchange_rates', function (Blueprint $table) {
                $table->increments('id');
                $table->decimal('rate', 24, 12);
                $table->integer('target_currency')->unique()->unsigned();
                $table->foreign('target_currency')->references('id')->on('super_currencies')->onDelete('cascade');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('super_currency_exchange_rates');
    }
};
