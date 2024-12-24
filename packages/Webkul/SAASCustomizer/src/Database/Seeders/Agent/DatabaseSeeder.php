<?php

namespace Webkul\SAASCustomizer\Database\Seeders\Agent;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @param  array  $parameters
     * @return void
     */
    public function run($parameters = [])
    {
        $this->call(RolesTableSeeder::class, false, ['parameters' => $parameters]);
        $this->call(AgentsTableSeeder::class, false, ['parameters' => $parameters]);
    }
}
