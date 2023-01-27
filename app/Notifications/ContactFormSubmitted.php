<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactFormSubmitted extends Notification
{
    use Queueable;

    public string $messageBody;
    public string $subject;
    public User $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, string $message, string $subject)
    {
        $this->messageBody = $message;
        $this->subject = $subject;
        $this->user = $user;
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
                    ->from('noreply@thesoapdish.app')
                    ->replyTo($this->user->email, $this->user->name)
                    ->bcc($this->user->email)
                    ->subject($this->subject)
                    ->greeting('Hello!')
                    ->line('A new issue has been reported!')
                    ->view('emails.contact-form', [
                        'user' => $this->user,
                        'subject' => $this->subject,
                        'messageBody' => $this->messageBody,
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
}
