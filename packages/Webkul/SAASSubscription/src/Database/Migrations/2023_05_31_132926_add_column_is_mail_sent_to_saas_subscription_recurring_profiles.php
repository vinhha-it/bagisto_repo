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
            $table->boolean('is_mail_sent')->default(0)->nullable()->after('cycle_expired_on');
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
            $table->dropColumn('is_mail_sent');
        });
    }
};
