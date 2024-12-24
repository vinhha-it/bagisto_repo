<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('saas_subscription_recurring_profiles', function (Blueprint $table) {
            $table->unsignedBigInteger('saas_subscription_plan_id')->nullable(true)->after('company_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('saas_subscription_recurring_profiles', function (Blueprint $table) {
            $table->dropColumn('saas_subscription_plan_id');
        });
    }
};
