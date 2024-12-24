<?php

namespace Webkul\MarketplaceSaaS\Console\Commands;

use Illuminate\Console\Command;
use Webkul\MarketplaceSaaS\Listeners\MarketplaceSaasDataSeeder;

class InstallMarketplaceSaas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'marketplace-saas:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Marketplace Saas Module';

    /**
     * Install and configure Marketplace.
     */
    public function handle()
    {
        $this->warn('Step 1: Migrating all tables into database (will take a while)...');
        $this->call('migrate');

        $this->warn('Step 2: Seeding data into database tables...');
        $this->info(app(MarketplaceSaasDataSeeder::class)->setCompaniessdefaultConfiguration());

        $this->warn('Step 3: Publishing Assets and Configurations...');
        $this->info($this->call('vendor:publish', [
            '--provider' => \Webkul\Marketplace\Providers\MarketplaceServiceProvider::class,

        ]));
        $this->info($this->call('vendor:publish', [
            '--provider' => \Webkul\MarketplaceSaaS\Providers\MarketplaceSAASServiceProvider::class,
        ]));

        $this->warn('Step 4: Clearing cached bootstrap files...');
        $this->call('optimize:clear');
    }
}
