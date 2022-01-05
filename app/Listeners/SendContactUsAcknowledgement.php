<?php

namespace App\Listeners;

use App\Events\ContactUsEvent;
use App\Notifications\ContactUsAcknowledgement;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class SendContactUsAcknowledgement implements ShouldQueue
{
    public $delay = 10;

    public $tries = 5;

    public $queue = 'single-email';

    /**
     * Handle the event.
     *
     * @param  \App\Events\ContactUsEvent  $event
     * @return void
     */
    public function handle(ContactUsEvent $event)
    {
//        dd($event);
        Notification::route('mail', $event->data['email'])
                      ->notify(new ContactUsAcknowledgement($event->data));
    }
}
