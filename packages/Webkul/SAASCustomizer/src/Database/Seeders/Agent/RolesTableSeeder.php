<?php

namespace Webkul\SAASCustomizer\Database\Seeders\Agent;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @param  array  $parameters
     * @return void
     */
    public function run($parameters = [])
    {
        DB::table('super_admins')->delete();

        DB::table('super_roles')->delete();

        $defaultLocale = $parameters['default_locale'] ?? config('app.locale');

        DB::table('super_roles')->insert([
            'id'              => 1,
            'name'            => trans('installer::app.seeders.user.roles.name', [], $defaultLocale),
            'description'     => trans('installer::app.seeders.user.roles.description', [], $defaultLocale),
            'permission_type' => 'all',
        ]);
    }
}
