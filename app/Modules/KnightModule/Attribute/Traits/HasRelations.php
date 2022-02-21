<?php

namespace App\Modules\KnightModule\Attribute\Traits;

use App\Modules\KnightModule\Knight\Knight;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property Knight $knight
 */
trait HasRelations
{
    public function knight(): BelongsTo
    {
        return $this->belongsTo(Knight::class, 'knight_id', 'id');
    }
}
