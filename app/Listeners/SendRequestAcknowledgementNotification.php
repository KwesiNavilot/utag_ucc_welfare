<?php

namespace App\Listeners;

use App\Events\BenefitRequestEvent;
use App\Notifications\NewRequestAcknowledgement;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendRequestAcknowledgementNotification implements ShouldQueue
{
    public $delay = 10;

    public $tries = 5;

    public $queue = 'single-email';

    /**
     * @var mixed
     */
    public $request_type;

    /**
     * Handle the event.
     *
     * @param BenefitRequestEvent $event
     * @return void
     */
    public function handle(BenefitRequestEvent $event)
    {
        $event->request->user->notify(new NewRequestAcknowledgement($event->request));
    }
}
