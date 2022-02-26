<?php

namespace App\Modules\BattleModule\BattleInvitation\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Notifications\Action;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class PrepareBattleNotification extends Notification
{
    use Queueable;

    public function __construct(private Collection $invitation_items)
    {
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        $message = (new MailMessage);
        $styles = "background-color:#44c767;border-radius:28px;border:1px solid #18ab29;display:inline-block;cursor:pointer;
	                color:#ffffff;font-family:Arial;font-size:12px;padding:10px 21px;text-decoration:none;text-shadow:0px 1px 0px #2f6627;";

        foreach ($this->invitation_items as $item) {
            $btn = '<a href="' . route('invitation.reject', $item->token) . '" style="display:block;text-align:center">
             <button style="' . $styles . '">Reject</button>
                </a>';

            $img_link = "https://www.usr.ro/wp-content/uploads/2021/01/depositphotos_39258143-stock-illustration-businessman-avatar-profile-picture.jpg";

            $img = '<img src=' . $img_link . ' alt="profile_img" width="50" height="50"></img>';
            $message->line(new HtmlString($img));
            $message->line($item->battleable->finalModel->name . ' virtue score: ' . $item->battleable->finalModel->virtue_score);
            $message->line(new HtmlString($btn));
        }
        return $message;
//        return (new MailMessage)
//            ->view('emails.prepare_battle', ['invitation_items' => $this->invitation_items, 'princess' => $notifiable]);
    }
}
