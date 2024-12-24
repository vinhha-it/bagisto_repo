<?php

namespace Webkul\SAASCustomizer\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewCompanyNotificationToTenant extends Mailable
{
    use Queueable, SerializesModels;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        public $company, 
        public $agent
    ) {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->company->email)
                ->subject(trans('saas::app.tenant.emails.new-company-register-tenant.subject'))
                ->view('saas::emails.new-tenant-register')->with('company', $this->company);
    }
}