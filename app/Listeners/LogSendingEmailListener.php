<?php

namespace App\Listeners;

use Illuminate\Mail\Events\MessageSending;

class LogSendingEmailListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(MessageSending $event)
    {
        $event->data['message'] = trim(strip_tags($event->message->getHtmlBody()));

        if (isset($event->message->mailable)) {
            $event->data['mailable'] = $event->message->mailable;
        }

        foreach ($event->message->getTo() as $mail) {
            activity()
                ->withProperties($event->data)
                ->event('mail')
                ->log("Email trying to sending ... Re: {$event->message->getSubject()} (To: {$mail->getAddress()})");
        }

        foreach ($event->message->getCc() as $mail) {
            activity()
                ->withProperties($event->data)
                ->event('mail')
                ->log("Email trying to sending ... Re: {$event->message->getSubject()} (Cc: {$mail->getAddress()})");
        }

        foreach ($event->message->getBcc() as $mail) {
            activity()
                ->withProperties($event->data)
                ->event('mail')
                ->log("Email trying to sending ... Re: {$event->message->getSubject()} (Bcc: {$mail->getAddress()})");
        }
    }
}
