<?php

namespace Webkul\SAASCustomizer\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AgentRegistrationEmail extends Mailable
{
    use Queueable, SerializesModels;
    
    public function __construct(public $data)
    {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->data['email'])
                ->subject(trans('saas::app.super-user.mail.agent-registration'))
                ->view('saas::emails.super-admin.agent-registration')->with('agent', $this->data);
    }
}