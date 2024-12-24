<?php

namespace Webkul\SAASCustomizer\Database\Seeders;

use Illuminate\Database\Seeder;
use Webkul\SAASCustomizer\Database\Seeders\Super\DatabaseSeeder as SuperSeeder;
use Webkul\SAASCustomizer\Database\Seeders\Agent\DatabaseSeeder as AgentSeeder;
use Webkul\SAASCustomizer\Database\Seeders\CMS\DatabaseSeeder as CMSSeeder;
use Webkul\SAASCustomizer\Database\Seeders\Company\DatabaseSeeder as CompanySeeder;

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
        $this->call(SuperSeeder::class, false, ['parameters' => $parameters]);
        $this->call(AgentSeeder::class, false, ['parameters' => $parameters]);
        $this->call(CMSSeeder::class, false, ['parameters' => $parameters]);
        $this->call(CompanySeeder::class, false, ['parameters' => $parameters]);
    }
}
