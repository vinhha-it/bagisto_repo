<?php

namespace Webkul\SAASCustomizer\Database\Seeders\Super;

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
        $this->call(LocalesTableSeeder::class, false, ['parameters' => $parameters]);
        $this->call(CurrencyTableSeeder::class, false, ['parameters' => $parameters]);
        $this->call(ChannelTableSeeder::class, false, ['parameters' => $parameters]);
    }
}
