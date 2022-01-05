<?php

namespace App\Listeners;

use App\Events\ContactUsEvent;
use App\Models\Admin;
use App\Notifications\Executives\ContactUsNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class SendExecsContactUsInfo implements ShouldQueue
{
    public $delay = 60;

    public $tries = 5;

    public $queue = 'bulk-execs-email';

    /**
     * Handle the event.
     *
     * @param  \App\Events\ContactUsEvent  $event
     * @return void
     */
    public function handle(ContactUsEvent $event)
    {
        Notification::send(Admin::all(), new ContactUsNotification($event->data));
    }
}
