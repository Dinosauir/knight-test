<?php

namespace App\Modules\VirtueModule\Virtue\Traits;

use App\Modules\KnightModule\Knight\Knight;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property Collection $knights
 */
trait HasRelations
{
    public function knights(): BelongsToMany
    {
        return $this->belongsToMany(Knight::class);
    }
}
