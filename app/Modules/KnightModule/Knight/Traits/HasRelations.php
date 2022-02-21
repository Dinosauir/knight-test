<?php

namespace App\Modules\KnightModule\Knight\Traits;

use App\Modules\KnightModule\Attribute\KnightAttribute;
use App\Modules\KnightModule\Virtue\KnightVirtue;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property Collection $virtues
 * @property Collection $attributes
 */
trait HasRelations
{
    public function virtues(): HasMany
    {
        return $this->hasMany(KnightVirtue::class);
    }

    public function attributes(): HasMany
    {
        return $this->hasMany(KnightAttribute::class);
    }
}
