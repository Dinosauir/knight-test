<?php

namespace App\Modules\PrincessModule\Princess\Traits;

use App\Modules\KingdomModule\Kingdom\Kingdom;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property Kingdom $kingdom
 */
trait HasRelations
{
    public function kingdom(): BelongsTo
    {
        return $this->belongsTo(Kingdom::class, 'kingdom_id', 'id');
    }
}
