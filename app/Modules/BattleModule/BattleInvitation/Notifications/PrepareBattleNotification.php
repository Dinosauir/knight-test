<?php

namespace App\Modules\BattleModule\BattleInvitation\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PrepareBattleNotification extends Notification
{
    use Queueable;

    public function __construct(private Collection $invitations)
    {
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->view('emails.prepare_battle', ['invitations' => $this->invitations, 'princess' => $notifiable]);
    }
}
