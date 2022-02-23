<?php

namespace App\Modules\KnightModule\Knight\Traits;

use App\Modules\AttributeModule\Attribute\Attribute;
use App\Modules\KingdomModule\Kingdom\Kingdom;
use App\Modules\VirtueModule\Virtue\Virtue;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
