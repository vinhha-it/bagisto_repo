<?php

namespace Webkul\SAASCustomizer\Database\Seeders\CMS;

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
        $this->call(PagesTableSeeder::class, false, ['parameters' => $parameters]);
    }
}
