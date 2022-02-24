<?php

namespace App\Modules\BattleModule\BattleInvitation\Traits;

use App\Modules\BattleableModule\Battleable\Battleable;
use App\Modules\BattleModule\BattleInvitation\BattleInvitation;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property BattleInvitation $parent
 * @property Battleable $battleable
 */
trait ItemHasRelations
{
    public function parent(): BelongsTo
    {
        return $this->belongsTo(BattleInvitation::class, 'battle_invitation_id', 'id');
    }

    public function battleable(): BelongsTo
    {
        return $this->belongsTo(Battleable::class, 'battleable_id', 'id');
    }
}
