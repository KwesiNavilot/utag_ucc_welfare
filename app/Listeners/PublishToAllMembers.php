<?php

namespace App\Listeners;

use App\Events\BenefitRequestEvent;
use App\Models\User;
use App\Notifications\PublishToMembersAdInterim;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class PublishToAllMembers implements ShouldQueue
{
    public $delay = 15;

    public $tries = 5;

    public $request;

    /**
     * Handle the event.
     *
     * @return void
     */
    public function handle(BenefitRequestEvent $event)
    {
        $this->request = $event->request;

        Notification::send(User::all()->except($event->request->staff_id), new PublishToMembersAdInterim($this->request));
    }

//    /**
//     * @param BenefitRequestEvent $event
//     * @return bool
//     */
//    public function shouldQueue(BenefitRequestEvent $event)
//    {
//        return $event->request->publish == 'yes';
//    }
}
