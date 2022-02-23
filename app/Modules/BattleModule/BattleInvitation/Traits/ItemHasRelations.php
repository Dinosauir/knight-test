<?php

namespace App\Modules\BattleModule\BattleInvitation\Traits;

use App\Modules\BattleModule\BattleInvitation\BattleInvitation;
use App\Modules\KnightModule\Knight\Knight;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property BattleInvitation $parent
 * @property Knight $knight
 */
trait ItemHasRelations
{
    public function parent(): BelongsTo
    {
        return $this->belongsTo(BattleInvitation::class, 'battle_invitation_id', 'id');
    }

    public function knight(): BelongsTo
    {
        return $this->belongsTo(Knight::class, 'knight_id', 'id');
    }
}
