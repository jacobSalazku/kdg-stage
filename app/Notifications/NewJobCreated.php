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

    /**
     * Create a new notification instance.
     */
    public function __construct($title, $company, $contact)
    {
        $this->title = $title;
        $this->company = $company;
        $this->contact = $contact;
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
            ->subject('New job Created')
            ->line('A new job has been created and needs review.')
            ->line('Job Title: '.$this->title)
            ->line('Company: '.$this->company)
            ->line('Contact: '.$this->contact)
            ->action('Review jobs', url('/nova/resources/jobs'));
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
