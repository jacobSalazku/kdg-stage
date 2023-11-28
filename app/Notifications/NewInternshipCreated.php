<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewInternshipCreated extends Notification
{
    use Queueable;

    protected $company;

    protected $contact;

    /**
     * Create a new notification instance.
     */
    public function __construct($company, $contact)
    {
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
            ->subject('New internship Created')
            ->line('A new internship has been created and needs review.')
            ->line('Company: '.$this->company)
            ->line('Contact: '.$this->contact)
            ->action('Review internships', url('/nova/resources/internships'));
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
