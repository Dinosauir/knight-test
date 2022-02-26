<?php

namespace App\Modules\BattleModule\BattleInvitation\Observers;

use App\Modules\BattleModule\BattleInvitation\BattleInvitation;

class BattleInvitationObserver
{
    public function creating(BattleInvitation $battleInvitation): void
    {
        $battleInvitation->setPendingStatus();
    }
}
