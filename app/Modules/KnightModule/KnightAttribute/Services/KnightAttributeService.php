<?php

namespace App\Modules\KnightModule\KnightAttribute\Services;

use App\Modules\AttributeModule\Attribute\Attribute;
use Exception;
use RuntimeException;

class KnightAttributeService extends BaseKnightAttributeService
{
    /**
     * @throws Exception
     */
    public function generateAttributes(int $age): array
    {
        if (!Attribute::first()) {
            throw new RuntimeException('There are no attributes created!');
        }
        if (Attribute::query()->whereIn('name', ['strength', 'battle', 'defense'])->count() !== 3) {
            throw new RuntimeException('Strength,Battle,Defense attributes are mandatory!');
        }

        return Attribute::all()->mapWithKeys(function ($item) use ($age) {
            return [$item->id => ['value' => $this->getStrategyClass($item->name)->generateAttribute($age)]];
        })->toArray();
    }
}
