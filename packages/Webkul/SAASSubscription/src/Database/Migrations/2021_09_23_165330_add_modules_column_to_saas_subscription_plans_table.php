<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddModulesColumnToSaasSubscriptionPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Extension Assignment
        Schema::table('saas_subscription_plans', function (Blueprint $table) {
            $table->json('modules')->nullable()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('saas_subscription_plans', function (Blueprint $table) {
            $table->dropColumn('modules');
        });
    }
}
