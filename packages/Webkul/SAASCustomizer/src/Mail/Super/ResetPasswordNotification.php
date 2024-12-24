<?php

namespace Webkul\SAASCustomizer\Mail\Super;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\ResetPassword;

class ResetPasswordNotification extends ResetPassword
{
    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $this->token);
        }

        return (new MailMessage)
            ->from(config('mail.from.address'), config('mail.from.name'))
            ->view('saas::emails.super-admin.forget-password', [
                'user_name' => $notifiable->name,
                'token' => $this->token
            ]);
    }
}
