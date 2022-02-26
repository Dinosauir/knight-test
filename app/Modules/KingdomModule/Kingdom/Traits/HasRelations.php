<?php

namespace App\Modules\KingdomModule\Kingdom\Traits;

use App\Modules\BattleModule\Battleable\Battleable;
use App\Modules\PrincessModule\Princess\Princess;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property Princess $princess
 * @property Collection $battleables
 */
trait HasRelations
{
    public function princess(): HasOne
    {
        return $this->hasOne(Princess::class);
    }

    public function battleables(): HasMany
    {
        return $this->hasMany(Battleable::class);
    }
}
