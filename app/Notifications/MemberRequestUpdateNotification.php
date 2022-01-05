<?php

namespace App\Notifications;

use App\Models\BenefitRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MemberRequestUpdateNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $request;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(BenefitRequest $request)
    {
        $this->request = $request;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if ($this->request->request_type == 'Child Birth'){
            $view = route('childbirth.show', $this->request->request_id);
        } elseif ($this->request->request_type == 'Death of Spouse') {
            $view = route('deathofspouse.show', $this->request->request_id);
        } else {
            $view = route('deathofparent.show', $this->request->request_id);
        }

        return (new MailMessage)
                    ->subject('Your Request Has Been Approved!')
                    ->markdown('notifications.members.requestapproved', [
                        'name' => $this->request->user->firstname . " " . $this->request->user->lastname,
                        'request_type' => $this->request->request_type,
                        'view' => $view
                    ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

    public function viaQueues()
    {
        return [
            'mail' => 'single-email',
//            'sms' => 'single-sms',
        ];
    }
}
