<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WithdrawalConfirmationNotification extends Notification
{
    use Queueable;
    public $withdraw_code;


    /**
     * Create a new notification instance.
     */
    public function __construct($withdraw_code)
    {
        $this->withdraw_code = $withdraw_code;
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
                    ->line(__('locale.code_confirm_withdraw') .": ". $this->withdraw_code)
                    ->line(__('locale.thanks') .'!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'withdraw_code' => $this->withdraw_code
        ];
    }
}
