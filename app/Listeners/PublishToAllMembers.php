<?php

namespace App\Listeners;

use App\Events\BenefitRequestEvent;
use App\Models\User;
use App\Notifications\MembersAdInterimAnnouncement;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class PublishToAllMembers implements ShouldQueue
{
    public $delay = 60;

    public $tries = 5;

    public $queue = 'bulk-members-email';

    public $request;

    /**
     * Handle the event.
     *
     * @return void
     */
    public function handle(BenefitRequestEvent $event)
    {
        $this->request = $event->request;

        //send the broadcast message to all members except the benefit requester
//        Notification::send(User::all()->except($event->request->staff_id),
//            (new MembersAdInterimAnnouncement($this->request))->delay(60)
//        );

        //send the broadcast message to all members including the benefit requester
        Notification::send(User::all(),
            (new MembersAdInterimAnnouncement($this->request))->delay(60)
        );
    }

    /**
     * Do not send a broadcast if it is a Child Birth request
     * @param BenefitRequestEvent $event
     * @return bool
     */
    public function shouldQueue(BenefitRequestEvent $event)
    {
        return $event->request->request_type !== 'Child Birth';
    }
}
