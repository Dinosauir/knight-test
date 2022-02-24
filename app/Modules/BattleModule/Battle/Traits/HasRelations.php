<?php


namespace App\Modules\BattleModule\Battle\Traits;

use App\Modules\BattleModule\Battle\BattleLog;
use App\Modules\BattleModule\BattleInvitation\BattleInvitation;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property BattleInvitation $invitation
 * @property Collection $logs
 */
trait HasRelations
{
    public function invitation(): BelongsTo
    {
        return $this->belongsTo(BattleInvitation::class, 'battle_invitation_id', 'id');
    }

    public function logs(): HasMany
    {
        return $this->hasMany(BattleLog::class);
    }
}
