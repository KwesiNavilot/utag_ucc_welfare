<?php

namespace App\Listeners;

use App\Events\BenefitRequestEvent;
use App\Models\Admin;
use App\Notifications\Executives\NewBenefitRequestNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class NotifyExecsOfNewRequest implements ShouldQueue
{
    public $delay = 60;

    public $tries = 5;

    public $queue = 'bulk-execs-email';

    /**
     * Handle the event.
     *
     * @return void
     */
    public function handle(BenefitRequestEvent $event)
    {
        Notification::send(Admin::all(), new NewBenefitRequestNotification($event->request));
    }
}
