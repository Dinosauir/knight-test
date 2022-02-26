<?php

namespace App\Modules\BattleModule\Battleable\Traits;

use App\Modules\AttributeModule\Attribute\Attribute;
use App\Modules\BattleModule\Battleable\Battleable;
use App\Modules\KingdomModule\Kingdom\Kingdom;
use App\Modules\VirtueModule\Virtue\Virtue;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * @property Battleable $battleable
 * @property Kingdom|null $kingdom
 * @property Collection $virtues
 * @property Collection $attributes
 */
trait CanBattleRelations
{
    public function battleable(): MorphOne
    {
        return $this->morphOne(Battleable::class, 'battleable');
    }

    public function kingdom(): BelongsTo
    {
        return $this->battleable?->kingdom();
    }

    public function virtues(): BelongsToMany
    {
        return $this->belongsToMany(Virtue::class)->withPivot('value');
    }

    public function attributes(): BelongsToMany
    {
        return $this->belongsToMany(Attribute::class)->withPivot('value');
    }
}
