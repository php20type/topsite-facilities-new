<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserNotification extends Notification
{
    use Queueable;

    public $email;
    public $message;
    public $senderId;
    public $desiredUrl;

    /**
     * Create a new notification instance.
     */
    public function __construct($email, $message, $senderId, $desiredUrl)
    {
        $this->email = $email;
        $this->message = $message;
        $this->senderId = $senderId;
        $this->desiredUrl = $desiredUrl;

    }
    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Notification Subject')
            ->line("Email: {$this->email}")
            ->line("Message: {$this->message}")
            ->line("Sender ID: {$this->senderId}")
            ->action('View Notification', $this->desiredUrl);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'email' => $this->email,
            'message' => $this->message,
            'sender_id' => $this->senderId,
            'desired_url' => $this->desiredUrl,
        ];
    }
}
