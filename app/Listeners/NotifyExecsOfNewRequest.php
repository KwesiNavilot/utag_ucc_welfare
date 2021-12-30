<?php

namespace App\Listeners;

use App\Events\BenefitRequestEvent;
use App\Models\Admin;
use App\Notifications\Executives\NewBenefitRequest;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class NotifyExecsOfNewRequest implements ShouldQueue
{
    public $delay = 10;

    public $tries = 5;

    /**
     * Handle the event.
     *
     * @return void
     */
    public function handle(BenefitRequestEvent $event)
    {
        Notification::send(Admin::all(), new NewBenefitRequest($event->request));
    }
}
