<?php

namespace App\Modules\BattleModule\Battleable\Traits;

use App\Modules\BattleModule\Battle\BattleLog;
use App\Modules\BattleModule\Battleable\Contracts\InterfaceCanBattle;
use App\Modules\KingdomModule\Kingdom\Kingdom;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @property Kingdom $kingdom
 * @property InterfaceCanBattle $finalModel
 * @property Collection $battles
 */
trait HasRelations
{
    public function kingdom(): BelongsTo
    {
        return $this->belongsTo(Kingdom::class, 'kingdom_id', 'id');
    }

    public function finalModel(): MorphTo
    {
        return $this->morphTo(null, 'battleable_type', 'battleable_id');
    }

    public function battles(): HasMany
    {
        return $this->hasMany(BattleLog::class);
    }
}
