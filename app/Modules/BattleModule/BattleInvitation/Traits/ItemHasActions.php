<?php

namespace App\Modules\BattleModule\BattleInvitation\Traits;

trait ItemHasActions
{
    public function reject(): void
    {
        $this->status = self::STATUSES['rejected'];
        $this->save();
    }

    public function accept(): void
    {
        $this->status = self::STATUSES['accepted'];
        $this->save();
    }
}
