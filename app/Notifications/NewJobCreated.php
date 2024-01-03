<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewJobCreated extends Notification
{
    use Queueable;

    protected $title;

    protected $company;

    protected $contact;

    protected $jobId;

    /**
     * Create a new notification instance.
     */
    public function __construct($title, $company, $contact, $jobId)
    {
        $this->title = $title;
        $this->company = $company;
        $this->contact = $contact;
        $this->jobId = $jobId;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Nieuwe vacature aangemaakt')
            ->line('Er werd zojuist een nieuwe vacature aangemaakt en deze moet nog gecontroleerd worden.')
            ->line('Titel: '.$this->title)
            ->line('Bedrijf: '.$this->company)
            ->line('Contactpersoon: '.$this->contact)
            ->action('Vacature controleren', url('/nova/resources/jobs/'.$this->jobId));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
