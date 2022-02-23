<?php

namespace App\Modules\KingdomModule\Kingdom\Traits;

use App\Modules\KnightModule\Knight\Knight;
use App\Modules\PrincessModule\Princess\Princess;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property Princess $princess
 * @property Collection $knights
 */
trait HasRelations
{
    public function princess(): HasOne
    {
        return $this->hasOne(Princess::class);
    }

    public function knights(): HasMany
    {
        return $this->hasMany(Knight::class);
    }
}
