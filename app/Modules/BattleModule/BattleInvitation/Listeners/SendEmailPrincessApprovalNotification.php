<?php

namespace App\Modules\BattleModule\BattleInvitation\Listeners;

use App\Modules\BattleModule\BattleInvitation\Events\PrepareBattle;
use App\Modules\BattleModule\BattleInvitation\Notifications\PrepareBattleNotification;

class SendEmailPrincessApprovalNotification
{
    public function handle(PrepareBattle $event): void
    {
        $princess = $event->invitation->princess;

        $princess->notify(new PrepareBattleNotification($event->invitation->children));
    }
}
