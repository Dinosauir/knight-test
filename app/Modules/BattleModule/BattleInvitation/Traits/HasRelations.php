<?php

namespace App\Modules\BattleModule\BattleInvitation\Traits;

use App\Modules\BattleModule\BattleInvitation\BattleInvitationItem;
use App\Modules\PrincessModule\Princess\Princess;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property Collection $children
 * @property Princess $princess
 */
trait HasRelations
{
    public function children(): HasMany
    {
        return $this->hasMany(BattleInvitationItem::class);
    }

    public function princess(): BelongsTo
    {
        return $this->belongsTo(Princess::class, 'princess_id', 'id');
    }
}
