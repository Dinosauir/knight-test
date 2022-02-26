<?php

namespace App\Modules\BattleModule\BattleInvitation\Traits;

use Illuminate\Support\Str;

trait ItemHasActions
{
    public function setRejectStatus(): void
    {
        $this->status = self::STATUSES['rejected'];
        $this->save();
    }

    public function setAcceptStatus(): void
    {
        $this->status = self::STATUSES['accepted'];
        $this->save();
    }

    public function setPendingStatus(): void
    {
        $this->status = self::STATUSES['pending'];
    }

    public function generateToken(): void
    {
        $this->token = Str::uuid()->toString();
    }
}
