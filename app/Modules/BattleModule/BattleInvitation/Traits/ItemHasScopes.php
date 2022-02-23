<?php

namespace App\Modules\BattleModule\BattleInvitation\Traits;

use Illuminate\Database\Eloquent\Builder;

/**
 * @method static pending()
 * @method static accepted()
 */
trait ItemHasScopes
{
    public function scopePending(Builder $query): Builder
    {
        return $query->where('status', self::STATUSES['pending']);
    }

    public function scopeAccepted(Builder $query): Builder
    {
        return $query->where('status', self::STATUSES['accepted']);
    }
}
