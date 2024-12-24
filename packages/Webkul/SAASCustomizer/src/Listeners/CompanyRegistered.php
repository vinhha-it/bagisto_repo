<?php

namespace Webkul\SAASCustomizer\Listeners;

use Illuminate\Support\Facades\Mail;
use Webkul\SAASCustomizer\Notifications\NewCompanyNotification;
use Webkul\SAASCustomizer\Notifications\NewCompanyNotificationToTenant;
use Webkul\SAASCustomizer\Repositories\Super\AgentRepository;
use Webkul\SAASCustomizer\Facades\Company;

class CompanyRegistered
{
    /**
     * Create a new listener instance.
     *
     * @param  Webkul\SAASCustomizer\Repositories\Super\AgentRepository  $agentRepository
     * @return void
     */
    public function __construct(protected AgentRepository $agentRepository)
    {
    }

    /**
     * Send emails to super agent.
     *
     * @return void
     */
    public function handle()
    {
        $agent = $this->agentRepository->all()->first();

        $company = Company::getCurrent();

        foreach(config('purge-pool') as $pool) {
            $poolInstance = app($pool);

            try {
                $poolInstance->handle($company->id);
            } catch (\Exception $e) {
                continue;
            }
        }

        try {
            /**
             * Email to agent of super admin.
             */
            Mail::queue(new NewCompanyNotification($company, $agent));
            
            /**
             * Email to newly created tenant.
             */
            Mail::queue(new NewCompanyNotificationToTenant($company, $agent));
        } catch (\Exception $e) {
            report($e);
        }
    }
}