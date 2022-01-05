<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Storage;

class EventAnnouncement extends Notification
{
    use Queueable;

    private $announcement;
    private $request;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($announcement, $request)
    {
        $this->announcement = $announcement;
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
        if ($this->announcement->attach === 'yes') {
            return (new MailMessage)
                ->subject($this->announcement->title)
                ->markdown('notifications.members.eventannouncement', ['message' => $this->announcement->message])
                ->attach(storage_path('app/public/' . $this->request[0]->media));
        } else {
            return (new MailMessage)
                ->subject($this->announcement->title)
                ->markdown('notifications.members.eventannouncement', [
                    'message' => $this->announcement->message
                ]);
        }
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
            'mail' => 'bulk-members-email',
//            'sms' => 'single-sms',
        ];
    }
}
