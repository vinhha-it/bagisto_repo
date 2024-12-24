<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAssignModulesColumnToSaasSubscriptionRecurringProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Extension Assignment
        Schema::table('saas_subscription_recurring_profiles', function (Blueprint $table) {
            $table->json('assign_modules')->nullable()->after('next_due_date');
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
            $table->dropColumn('assign_modules');
        });
    }
}
