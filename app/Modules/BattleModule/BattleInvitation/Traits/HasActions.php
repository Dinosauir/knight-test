<?php

namespace App\Modules\BattleModule\BattleInvitation\Traits;

trait HasActions
{
    public function setReadyStatus(): void
    {
        $this->status = self::STATUSES['ready'];
        $this->save();
    }

    public function setPendingStatus(): void
    {
        $this->status = self::STATUSES['pending'];
    }
}
