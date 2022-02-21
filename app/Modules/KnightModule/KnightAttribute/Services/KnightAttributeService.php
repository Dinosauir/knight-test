<?php

namespace App\Modules\KnightModule\KnightAttribute\Services;

use App\Modules\AttributeModule\Attribute\Attribute;

class KnightAttributeService extends BaseKnightAttributeService
{
    public function generateAttributes(int $age): array
    {
        return Attribute::all()->mapWithKeys(function ($item) use ($age) {
            return [$item->id => ['value' => $this->getStrategyClass($item->name)->generateAttribute($age)]];
        })->toArray();
    }
}
