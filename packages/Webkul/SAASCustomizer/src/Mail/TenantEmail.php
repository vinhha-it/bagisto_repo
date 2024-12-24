<?php

namespace Webkul\SAASCustomizer\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TenantEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $emailData;

    /**
     * Create a mailable instance
     * 
     * @param  array  $emailData
     */
    public function __construct($emailData)
    {
        $this->emailData = $emailData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.name'))
            ->to($this->emailData['email'])
            ->subject($this->emailData['subject'])
            ->html($this->emailData['body']);
    }
}