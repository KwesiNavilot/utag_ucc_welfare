<?php

namespace App\Notifications;

use App\Models\BenefitRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MembersAdInterimAnnouncement extends Notification
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
        return (new MailMessage)
            ->subject('Interim Announcement!')
            ->markdown('notifications.members.adinterimannouncement', [
                'name' => $this->request->user->firstname . " " . $this->request->user->lastname,
                'relative' => $this->relation($this->request->request_type, $this->request->relation)
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

    public function relation($request_type, $relation)
    {
        if ($request_type == "Death of Parent" && $relation == "mother") {
            return "mother";
        } elseif ($request_type == "Death of Parent" && $relation == "father") {
            return "father";
        } elseif ($request_type == "Death of Spouse") {
            return "spouse";
        }
    }
}
