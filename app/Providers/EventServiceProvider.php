<?php

namespace App\Providers;

use App\Events\BenefitRequestEvent;
use App\Listeners\NotifyExecsOfNewRequest;
use App\Listeners\PublishToAllMembers;
use App\Listeners\SendRequestAcknowledgementNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        BenefitRequestEvent::class => [
            SendRequestAcknowledgementNotification::class,
            NotifyExecsOfNewRequest::class,
            PublishToAllMembers::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
