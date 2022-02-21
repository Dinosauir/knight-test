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
 * @property Collection $virtues
 * @property Collection $attributes
 * @property Kingdom $kingdom
 */
trait HasRelations
{
    public function virtues(): BelongsToMany
    {
        return $this->belongsToMany(Virtue::class)->withPivot('value');
    }

    public function attributes(): BelongsToMany
    {
        return $this->belongsToMany(Attribute::class)->withPivot('value');
    }

    public function kingdom(): BelongsTo
    {
        return $this->belongsTo(Kingdom::class, 'kingdom_id', 'id');
    }
}
