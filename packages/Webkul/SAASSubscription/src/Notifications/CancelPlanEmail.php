<?php

namespace Webkul\SAASSubscription\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Registration Mail class
 *
 * @copyright 2018 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
class CancelPlanEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new PlanChangedEmail instance
     *
     * @param  \Webkul\SAASCustomizer\Models\Company  $company
     * @param  \Webkul\SAASSubscription\Models\Plan  $plan
     * @return void
     */
    public function __construct(protected $company, protected $plan)
    {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->company->email)
            ->subject(trans('saas_subscription::app.admin.plans.cancel-plan'))
            ->view('saassubscription::emails.admin.plan-cancel')->with(['company' => $this->company, 'plan' => $this->plan]);
    }
}
