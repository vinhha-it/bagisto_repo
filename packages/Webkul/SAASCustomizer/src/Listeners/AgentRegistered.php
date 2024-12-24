<?php

namespace Webkul\SAASCustomizer\Listeners;

use Illuminate\Support\Facades\Mail;
use Webkul\SAASCustomizer\Notifications\AgentRegistrationEmail;

class AgentRegistered
{
    /**
     * Send agent registration mail.
     *
     * @return void
     */
    public function handle()
    {
        try {
            /**
             * Email to agent of super admin.
             */
            Mail::queue(new AgentRegistrationEmail(request()->all()));
        } catch (\Exception $e) {
            report($e);
        }
    }
}