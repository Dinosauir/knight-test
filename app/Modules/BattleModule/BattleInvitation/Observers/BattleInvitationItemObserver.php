<?php

namespace App\Modules\BattleModule\BattleInvitation\Observers;

use App\Modules\BattleModule\BattleInvitation\BattleinvitationItem;
use Illuminate\Support\Facades\DB;

class BattleInvitationItemObserver
{
    public function creating(BattleinvitationItem $item): void
    {
        $item->setPendingStatus();
        $item->generateToken();
    }

    public function updated(BattleinvitationItem $item): void
    {
        DB::transaction(static function () use ($item) {
            $remaining_items = $item->parent->children()->pending()
                ->where('id', '<>', $item->id)
                ->get();

            foreach ($remaining_items as $child) {
                $child->setAcceptStatus();
            }

            $item->parent->setReadyStatus();
        });
    }
}
